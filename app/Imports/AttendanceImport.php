<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Throwable;
use Illuminate\Support\Facades\Log;
use App\Models\Employee;

class AttendanceImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable;

    public function model(array $row)
    {
        // Check if employee exists
        $employee = Employee::find($row['employee_id']);
        if (!$employee) {
            Log::warning("Skipped row: Employee ID {$row['employee_id']} does not exist.");
            return null; // Skip this row
        }

        return new Attendance([
            'employee_id' => $row['employee_id'],
            'date'        => $row['date'],
            'check_in'    => $row['check_in'],
            'check_out'   => $row['check_out'],
        ]);
    }

    public function onError(Throwable $e)
    {
        Log::error('Skipped due to error: ' . $e->getMessage());
    }
}

