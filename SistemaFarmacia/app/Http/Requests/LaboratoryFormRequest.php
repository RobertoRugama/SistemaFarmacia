<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratoryFormRequest extends FormRequest
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
        'name'=>'required',
        'type'=>'required',
        'location'=>'required',
        ];
    }

    public function messages(){
     return [
         'name' => 'este campo debe ser solo numerico',
         'type.min' => 'porfavor verifique el campo',
         'location.max' => 'El campo title no puede tener más de 255 carácteres',
     ];
 }
}
