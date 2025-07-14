<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\AddHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::all();
        return view('holidays.index',compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('holidays.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddHolidayRequest $request)
    {
        Holiday::create($request->validated());
        return to_route('holidays.index')->with('success','Holiday created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Holiday $holiday)
    {
        return view('holidays.show',compact('holiday'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Holiday $holiday)
    {
        $employees = Employee::all();
        return view('holidays.edit',compact('employees','holiday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
        $holiday->update($request->validated());
        return to_route('holidays.index')->with('success','Holiday updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return to_route('holidays.index')->with('success','Holiday deleted successfully');
    }

    /**
     * Download the holiday request as pdf
     */
    public function download(Holiday $holiday)
    {
        $pdf = Pdf::loadView('holidays.pdf-holiday',compact('holiday'));
        return $pdf->download($holiday->id.'_holiday_request_'.'.pdf');
    }
}
