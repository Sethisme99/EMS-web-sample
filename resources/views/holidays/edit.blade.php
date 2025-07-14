@extends('layouts.app')

@section('title')
    Edit Holiday
@endsection

@section('content')
    <h3 class="my-3">
        Edit Holiday
    </h3>
    <hr>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('holidays.update',$holiday->id) }}" method="post">
                        @csrf
                        @method('PUT')
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
                                        {{ old('employee_id',$holiday->employee->id) == $employee->id ? 'selected' : '' }}
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
                                value="{{ old('start_date',$holiday->start_date) }}"
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
                                value="{{ old('end_date',$holiday->end_date) }}"
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
                            >{{ old('notes',$holiday->notes) }}</textarea>
                            @error('notes')
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
                                    {{ old('status',$holiday->status) == 'pending' ? 'selected' : '' }}
                                    value="pending">Pending</option>
                                <option 
                                    {{ old('status',$holiday->status) == 'approved' ? 'selected' : '' }}
                                    value="approved">Approved</option>
                                <option 
                                    {{ old('status',$holiday->status) == 'rejected' ? 'selected' : '' }}
                                    value="rejected">Rejected</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">
                            Update Holiday
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

