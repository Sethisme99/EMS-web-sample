@extends('layouts.app')

@section('title')
    Employee CV - {{ $employee->first_name }} {{ $employee->last_name }}
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="my-3">
            Employee CV - {{ $employee->first_name }} {{ $employee->last_name }}
        </h3>
    </div>
    <hr>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td align="center">
                                <table width="600" cellpadding="10"
                                    style="text-align:left;"
                                > 
                                    <tr>
                                        <td>
                                            <img 
                                                src="{{ asset('images/'.$employee->image) }}"
                                                class="rounded"
                                                alt="{{ $employee->first_name }}" 
                                                with="250"
                                                height="250"    
                                            >
                                        </td>
                                        <td colspan="2" align="center">
                                            <h1>
                                                {{ $employee->first_name }} {{ $employee->last_name }}
                                            </h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h2>
                                                Personal Information
                                            </h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Email
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Phone
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->phone }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Address
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Date of birth
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->date_of_birth }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h2>
                                                Company Information
                                            </h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Hire Date
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->hire_date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Salary
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->salary }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Department
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->department->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Position
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->position->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                Status
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $employee->status ? 'Active' : 'Inactive'}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <a href="{{ route('employee.pdf',$employee->id) }}" class="btn btn-dark">
                                                <i class="fas fa-download"></i>
                                                Download as pdf
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection