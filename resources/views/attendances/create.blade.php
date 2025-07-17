@extends('layouts.app')

<style>
    #employee_list {
        display: none;
        background-color: white;
        border: 1px solid #ddd;
    }
    </style>



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



<div class="position-relative" style="max-width: 400px;">
    <input type="text"
           id="employee_search"
           class="form-control @error('employee_id') is-invalid @enderror"
           placeholder="Search employee..."
           autocomplete="on"
           value=""
    >
    <input type="hidden" name="employee_id" id="employee_id">

    <ul class="list-group position-absolute w-100" id="employee_list"
        style="z-index: 1000; display: none; max-height: 200px; overflow-y: auto;">
        {{-- This should be EMPTY initially --}}
    </ul>

    @error('employee_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>






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



    <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('employee_search');
    const hiddenInput = document.getElementById('employee_id');
    const employeeList = document.getElementById('employee_list');

    let timeout = null;

    searchInput.addEventListener('input', function () {
        const query = this.value.trim();

        clearTimeout(timeout);
        if (!query) {
            employeeList.style.display = 'none';
            return;
        }

        // Wait a bit before sending request
        timeout = setTimeout(() => {
            fetch(`/api/employees/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    employeeList.innerHTML = '';
                    if (data.length === 0) {
                        employeeList.style.display = 'none';
                        return;
                    }

                    data.forEach(emp => {
                        const item = document.createElement('li');
                        item.className = 'list-group-item list-group-item-action';
                        item.textContent = `${emp.first_name} ${emp.last_name}`;
                        item.dataset.id = emp.id;

                        item.addEventListener('click', function () {
                            searchInput.value = this.textContent;
                            hiddenInput.value = this.dataset.id;
                            employeeList.style.display = 'none';
                        });

                        employeeList.appendChild(item);
                    });

                    employeeList.style.display = 'block';
                });
        }, 300); // delay to reduce request spam
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('#employee_list') && e.target !== searchInput) {
            employeeList.style.display = 'none';
        }
    });
});
</script>




@endsection

