<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        'presentation'=>'required',
        'description'=>'required',
        'existence'=>'required|numeric',
        'reference'=>'required',
        'provider_id'=>'required',
        'laboratory_id'=>'required',
        'category_id'=>'required',
      
        ];
    }
}
