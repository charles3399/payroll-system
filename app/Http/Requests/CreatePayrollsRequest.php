<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePayrollsRequest extends FormRequest
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
            'days_work' => 'required',
            'overtime_hrs' => 'required',
            'late' => 'required',
            'absences' => 'required',
            'bonuses' => 'nullable',
            'employees_id' => 'required'
        ];
    }
}
