@extends('layouts.app')

@section('title')
    Holiday Requests
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="my-3">
            Holiday Requests ({{ $holidays->count() }})
        </h3>
        <a href="{{ route('holidays.create') }}" class="btn btn-primary btn-sm">
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
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Notes</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holidays as $key => $holiday)
                                    <tr>
                                        <td scope="col">{{ $key += 1 }}</td>
                                        <td scope="col">
                                            {{ $holiday->employee->first_name }} {{ $holiday->employee->last_name }}
                                        </td>
                                        <td scope="col">
                                            {{ $holiday->start_date }}
                                        </td>
                                        <td scope="col">{{ $holiday->end_date }}</td>
                                        <td scope="col">
                                            @if (!empty($holiday->notes))
                                                {{ Str::limit($holiday->notes,30) }}
                                            @else 
                                                <span class="text-muted">
                                                    No notes!
                                                </span>
                                            @endif
                                        </td>
                                        <td scope="col">
                                            @if ($holiday->status == 'rejected')
                                                <span class="badge bg-danger">
                                                    Rejected
                                                </span>
                                            @elseif ($holiday->status == 'approved')
                                                <span class="badge bg-success">
                                                    Approved
                                                </span>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    Pending
                                                </span>
                                            @endif
                                        </td>
                                        <td scope="col">
                                            <a href="{{ route('holidays.show',$holiday->id) }}" 
                                                class="btn btn-dark btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('holidays.edit',$holiday->id) }}" 
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('holidays.destroy',$holiday->id) }}" 
                                                method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this holiday?')"
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