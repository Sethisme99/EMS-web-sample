@extends('layouts.app')

@section('title')
    Create Employee
@endsection

@section('content')
    <h3 class="my-3">
        Create Employee
    </h3>
    <hr>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input
                                type="text"
                                class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name"
                                id="first_name"
                                aria-describedby="helpId"
                                placeholder="First Name"
                                value="{{ old('first_name') }}"
                            />
                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input
                                type="text"
                                class="form-control  @error('last_name') is-invalid @enderror"
                                name="last_name"
                                id="last_name"
                                aria-describedby="helpId"
                                placeholder="Last Name"
                                value="{{ old('last_name') }}"
                            />
                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control  @error('email') is-invalid @enderror"
                                name="email"
                                id="email"
                                aria-describedby="helpId"
                                placeholder="Email"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input
                                type="phone"
                                class="form-control  @error('phone') is-invalid @enderror"
                                name="phone"
                                id="phone"
                                aria-describedby="helpId"
                                placeholder="Phone"
                                value="{{ old('phone') }}"
                            />
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input
                                type="address"
                                class="form-control @error('address') is-invalid @enderror"
                                name="address"
                                id="address"
                                aria-describedby="helpId"
                                placeholder="Address"
                                value="{{ old('address') }}"
                            />
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input
                                type="date"
                                class="form-control  @error('date_of_birth') is-invalid @enderror"
                                name="date_of_birth"
                                id="date_of_birth"
                                aria-describedby="helpId"
                                value="{{ old('date_of_birth') }}"
                            />
                            @error('date_of_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hire_date" class="form-label">Hire Date</label>
                            <input
                                type="date"
                                class="form-control @error('hire_date') is-invalid @enderror"
                                name="hire_date"
                                id="hire_date"
                                aria-describedby="helpId"
                                value="{{ old('hire_date') }}"
                            />
                            @error('hire_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input
                                type="number"
                                class="form-control @error('salary') is-invalid @enderror"
                                name="salary"
                                id="salary"
                                aria-describedby="helpId"
                                placeholder="Salary"
                                value="{{ old('salary') }}"
                            />
                            @error('salary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input
                                type="file"
                                class="form-control @error('image') is-invalid @enderror"
                                name="image"
                                id="image"
                                aria-describedby="helpId"
                            />
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select
                                class="form-select @error('department_id') is-invalid @enderror"
                                name="department_id"
                                id="department_id"
                            >
                                <option selected value="" disabled>Choose a department</option>
                                @foreach ($departments as $department)
                                    <option 
                                        {{ old('department_id') == $department->id ? 'selected' : '' }}
                                        value="{{ $department->id }}">
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="position_id" class="form-label">Position</label>
                            <select
                                class="form-select @error('position_id') is-invalid @enderror"
                                name="position_id"
                                id="position_id"
                            >
                                <option selected value="" disabled>Choose a position</option>
                                @foreach ($positions as $position)
                                    <option 
                                        {{ old('position_id') == $position->id ? 'selected' : '' }}
                                        value="{{ $position->id }}">
                                        {{ $position->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('position_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select
                                class="form-select @error('status') is-invalid @enderror"
                                name="status"
                                id="status"
                            >
                                <option 
                                    {{ old('status') == '1' ? 'selected' : '' }}
                                    value="1">Active</option>
                                <option 
                                    {{ old('status') == '0' ? 'selected' : '' }}
                                    value="0">Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">
                            Save Employee
                        </button>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

