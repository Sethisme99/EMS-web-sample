@extends('layouts.app')

@section('title')
    Create Attendance
@endsection

@section('content')
    <h3 class="my-3">
        Create Attendance
    </h3>
    <hr>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('attendances.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input
                                type="date"
                                class="form-control  @error('date') is-invalid @enderror"
                                name="date"
                                id="date"
                                aria-describedby="helpId"
                                value="{{ old('date') }}"
                            />
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="check_in" class="form-label">Check In</label>
                            <input
                                type="time"
                                class="form-control @error('check_in') is-invalid @enderror"
                                name="check_in"
                                id="check_in"
                                aria-describedby="helpId"
                                value="{{ old('check_in') }}"
                            />
                            @error('check_in')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="check_out" class="form-label">Check Out</label>
                            <input
                                type="time"
                                class="form-control @error('check_out') is-invalid @enderror"
                                name="check_out"
                                id="check_out"
                                aria-describedby="helpId"
                                value="{{ old('check_out') }}"
                            />
                            @error('check_out')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee</label>
                            <select
                                class="form-select @error('employee_id') is-invalid @enderror"
                                name="employee_id"
                                id="employee_id"
                            >
                                <option selected value="" disabled>Choose a employee</option>
                                @foreach ($employees as $employee)
                                    <option 
                                        {{ old('employee_id') == $employee->id ? 'selected' : '' }}
                                        value="{{ $employee->id }}">
                                        {{ $employee->first_name }} {{ $employee->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">
                            Save Attendance
                        </button>
                        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

