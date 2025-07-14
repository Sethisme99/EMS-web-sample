@extends('layouts.app')

@section('title')
    Attendances
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="my-3">
            Attendances ({{ $attendances->count() }})
        </h3>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <hr>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table dataTable table-bordered table-striped table-hover"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Check In</th>
                                    <th scope="col">Check Out</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $key => $attendance)
                                    <tr>
                                        <td scope="col">{{ $key += 1 }}</td>
                                        <td scope="col">
                                            {{ $attendance->employee->first_name }} {{ $attendance->employee->last_name }}
                                        </td>
                                        <td scope="col">
                                            {{ $attendance->date }}
                                        </td>
                                        <td scope="col">{{ $attendance->check_in }}</td>
                                        <td scope="col">{{ $attendance->check_out }}</td>
                                        <td scope="col">
                                            <a href="{{ route('attendances.edit',$attendance->id) }}" 
                                                class="btn btn-warning btn-sm my-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('attendances.destroy',$attendance->id) }}" 
                                                method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this attendance?')"
                                                >
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection