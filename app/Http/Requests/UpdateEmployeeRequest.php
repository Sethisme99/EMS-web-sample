<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:64|unique:employees,email'.$this->employee->id,
            'phone' => 'required|max:20',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'date',
            'hire_date' => 'date',
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
            'salary' => 'required|integer',
            'department_id' => 'exists:departments,id',
            'position_id' => 'exists:positions,id',
            'status' => 'boolean'
        ];
    }
}
