<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function() {
    Route::get('admin/login',[UserController::class,'showLoginForm'])->name('login');
    Route::post('admin/auth',[UserController::class,'login'])->name('auth');
});

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('admin/logout',[UserController::class,'logout'])->name('logout');
    Route::resource('employees',EmployeeController::class);
    Route::get('employee/{employee}/pdf',[EmployeeController::class,'download'])->name('employee.pdf');
    Route::post('/employees/import', [EmployeeController::class, 'import'])->name('employees.import');
    Route::get('/employees/export/excel', [EmployeeController::class, 'exportAll'])->name('employees.export');
    Route::resource('attendances',AttendanceController::class)->except(['show']);
    Route::get('/attendances/export', [AttendanceController::class, 'export'])->name('attendances.export');
    Route::resource('holidays',HolidayController::class);
    Route::get('holiday/{holiday}/pdf',[HolidayController::class,'download'])->name('holiday.pdf');
});

