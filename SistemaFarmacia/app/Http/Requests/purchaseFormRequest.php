<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class purchaseFormRequest extends FormRequest
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
            //
        'order_date'=>'required',
        'requiered_date'=>'required',
        'date_of_delivery'=>'required',
        'status'=>'required',
        'provider_id'=>'required',
        'employee_id'=>'required',     
        ];
    }
}
