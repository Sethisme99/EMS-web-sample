<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
            'email' => 'required|email|unique:employees,email|max:64',
            'phone' => 'required|max:20',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'hire_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'salary' => 'required|integer',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'status' => 'boolean'
        ];
    }
}
