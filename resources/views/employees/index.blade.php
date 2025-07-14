@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="my-3">
            Employees ({{ $employees->total() }})
        </h3>
        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Employee
        </a>
    </div>

    <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
        <div class="d-flex align-items-center gap-2">
            <input type="file" name="file" class="form-control form-control-sm" required>
            <button type="submit" class="btn btn-sm btn-success">Import Excel</button>
        </div>
    </form>

    {{-- Show flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @error('file')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror

    <hr>

    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <form method="GET" action="{{ route('employees.index') }}" class="mb-3 d-flex align-items-center gap-2">
                                <input
                                    type="number"
                                    name="employee_id"
                                    class="form-control form-control-sm"
                                    placeholder="Search by ID"
                                    value="{{ request('employee_id') }}"
                                >
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-search"></i> Search
                                </button>
                                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-secondary">
                                    Reset
                                </a>
                            </form>

                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Date of Birth</th>
                                    <th>Hire Date</th>
                                    <th>Salary</th>
                                    <th>Image</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $key => $employee)
                                    <tr>
                                        <td>{{ $employees->firstItem() + $key }}</td>
                                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->address }}</td>
                                        <td>{{ $employee->date_of_birth }}</td>
                                        <td>{{ $employee->hire_date }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>
                                            <img 
                                                src="{{ asset('images/'.$employee->image) }}"
                                                class="img-fluid rounded"
                                                alt="{{ $employee->first_name }}" 
                                                width="50"
                                                height="50"
                                            >
                                        </td>
                                        <td>{{ $employee->department->name ?? 'N/A' }}</td>
                                        <td>{{ $employee->position->title ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-{{ $employee->status ? 'success' : 'danger' }}">
                                                {{ $employee->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-dark btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm my-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center">No employees found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination and Export -->
            <div class="mt-3 d-flex justify-content-between align-items-center">
                {{ $employees->appends(request()->query())->links() }}
                <a href="{{ route('employees.export') }}" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-file-excel"></i> Download Excel
                </a>
            </div>
        </div>
    </div>
@endsection
