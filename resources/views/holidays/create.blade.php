@extends('layouts.app')

@section('title')
    Create Holiday
@endsection

@section('content')
    <h3 class="my-3">
        Create Holiday
    </h3>
    <hr>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('holidays.store') }}" method="post">
                        @csrf
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
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input
                                type="date"
                                class="form-control  @error('start_date') is-invalid @enderror"
                                name="start_date"
                                id="start_date"
                                aria-describedby="helpId"
                                value="{{ old('start_date') }}"
                            />
                            @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input
                                type="date"
                                class="form-control  @error('end_date') is-invalid @enderror"
                                name="end_date"
                                id="end_date"
                                aria-describedby="helpId"
                                value="{{ old('end_date') }}"
                            />
                            @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea
                                rows="5"
                                cols="30"
                                class="form-control @error('notes') is-invalid @enderror"
                                name="notes"
                                id="notes"
                                aria-describedby="helpId"
                                placeholder="Notes"
                            >{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">
                            Save Holiday
                        </button>
                        <a href="{{ route('holidays.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

