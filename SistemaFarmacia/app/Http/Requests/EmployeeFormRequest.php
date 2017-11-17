<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
            'date_register'=>'required',
            'identification_card'=>'required',
            'first_name'=>'required',
            'second_name'=>'required',
            'first_last_name'=>'required',
            'second_last_name'=>'required',
            'address'=>'required',
            'user'=>'required',
            'previleges'=>'required',
            'charge_id'=>'required',

        ];
    }
}
