<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderFormRequest extends FormRequest
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
        'ruc'=>'required|max:14',
        'name'=>'max:30',
        'address'=>'max:250',

            //

        ];
    }

    public function messages(){
     return [
         'ruc' => 'este campo debe ser solo numerico',
         'name.min' => 'porfavor verifique el campo',
         'address.max' => 'El campo title no puede tener más de 255 carácteres',
     ];
 }
}
