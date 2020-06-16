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
            'days_work' => 'required|numeric|max:31',
            'overtime_hrs' => 'required|numeric',
            'late' => 'required|numeric',
            'absences' => 'required|numeric|max:31',
            'bonuses' => 'nullable',
            'employees_id' => 'required'
        ];
    }
}
