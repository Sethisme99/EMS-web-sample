<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::with(['department', 'position'])->get()->map(function ($employee) {
            return [
                $employee->first_name,
                $employee->last_name,
                $employee->email,
                $employee->phone,
                $employee->address,
                $employee->date_of_birth,
                $employee->hire_date,
                $employee->image,
                $employee->salary,
                optional($employee->department)->name,
                optional($employee->position)->title,
                $employee->status ? 'Active' : 'Inactive',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Address',
            'Date of Birth',
            'Hire Date',
            'Image',
            'Salary',
            'Department',
            'Position',
            'Status',
        ];
    }
}
