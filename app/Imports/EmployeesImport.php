<?php
namespace App\Imports;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $department = Department::where('name', $row['department'])->first();
        $position   = Position::where('title', $row['position'])->first();

        // Optional: skip rows with missing mapping
        if (!$department || !$position) {
            return null; // skip this row
        }

        return new Employee([
            'first_name'    => $row['first_name'],
            'last_name'     => $row['last_name'],
            'email'         => $row['email'],
            'phone'         => $row['phone'],
            'address'       => $row['address'],
            'date_of_birth' => $row['date_of_birth'],
            'hire_date'     => $row['hire_date'],
            'salary'        => $row['salary'],
            'image'         => $row['image'],
            'department_id' => $department->id,
            'position_id'   => $position->id,
            'status'        => $row['status'],
        ]);
    }



    public function rules(): array
{
    return [
        '*.first_name' => ['required'],
        '*.last_name' => ['required'],
        /*'*.email' => ['required', 'email', 'unique:employees,email'],
        '*.department' => ['required', 'exists:departments,name'],
        '*.position' => ['required', 'exists:positions,title'],*/
    ];
}
}
