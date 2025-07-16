<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::all([
            'id', 'employee_id', 'date', 'check_in', 'check_out'
        ]);
    }
    public function headings(): array
    {
        return ['#', 'Employee_Id', 'Date', 'Check In', 'Check Out'];
    }
}
