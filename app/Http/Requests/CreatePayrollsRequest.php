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
            'days_work' => 'required|integer|max:22|min:0',
            'overtime_hrs' => 'required|integer|max:3|min:0',
            'late' => 'required|integer|max:60|min:0',
            'absences' => 'required|integer|max:3|min:0',
            'employees_id' => 'required',
            'bonuses' => 'integer|min:0|nullable'
        ];
    }
}
