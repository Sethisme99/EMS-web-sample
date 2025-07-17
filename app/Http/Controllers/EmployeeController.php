<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\AddEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index(Request $request)
{
    $query = Employee::query();

    if ($request->filled('employee_id')) {
        $query->where('id', $request->employee_id);
    }

    $employees = $query->with(['department', 'position'])->paginate(20);

    return view('employees.index', compact('employees'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create',compact('departments','positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddEmployeeRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->saveImage($request->file('image'));
        Employee::create($data);
        return to_route('employees.index')->with('success','Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit',compact('departments','positions','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            $this->deleteImage($employee->image);
            $data['image'] = $this->saveImage($request->file('image'));
        }
        $employee->update($data);
        return to_route('employees.index')->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->deleteImage($employee->image);
        $employee->delete();
        return to_route('employees.index')->with('success','Employee deleted successfully');
    }

    /**
     * Will save the employee image
     */
    public function saveImage($image)
    {
        $image_name = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'),$image_name);
        return $image_name;
    }

    /**
     * Will delete the employee image
     */
    public function deleteImage($image)
    {
        if(file_exists(public_path('images/'.$image))) {
            unlink(public_path('images/'.$image));
        }
    }


    public function search(Request $request)
    {
        $query = $request->input('q');
        $employees = \App\Models\Employee::where('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->limit(10)
            ->get(['id', 'first_name', 'last_name']);

        return response()->json($employees);
    }



    /**
     * Download the employee's cv as pdf
     */
    public function download(Employee $employee)
    {
        $employee_name = $employee->first_name.'-'.$employee->last_name;
        $pdf = Pdf::loadView('employees.pdf-employee',compact('employee'));
        return $pdf->download($employee_name.'_cv_'.'.pdf');
    }



public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv',
    ]);

    try {
        Excel::import(new EmployeesImport, $request->file('file'));

        return back()->with('success', 'Employees imported successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Import failed: ' . $e->getMessage());
    }
}


    public function exportAll()
{
    return Excel::download(new EmployeesExport, 'employees.xlsx');
}


//select employee for create attendence:


}
