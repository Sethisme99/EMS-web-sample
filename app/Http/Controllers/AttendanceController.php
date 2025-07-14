<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendances.index',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddAttendanceRequest $request)
    {
        $exists = Attendance::where([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
        ])->exists();
        //check if attendance already exists
        if($exists) {
            return to_route('attendances.index')->with('error','Attendance for this employee on this date already exists');
        }
        Attendance::create($request->validated());
        return to_route('attendances.index')->with('success','Attendance created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendances.edit',compact('employees','attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update($request->validated());
        return to_route('attendances.index')->with('success','Attendance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return to_route('attendances.index')->with('success','Attendance deleted successfully');
    }
}
