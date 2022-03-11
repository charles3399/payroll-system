<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePayrollsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'days_work' => 'required|numeric|max:22',
            'overtime_hrs' => 'required|numeric|max:3',
            'late' => 'required|numeric|max:60',
            'absences' => 'required|numeric|max:3',
            'employees_id' => 'required'
        ];
    }
}
