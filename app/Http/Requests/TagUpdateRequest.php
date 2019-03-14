<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagUpdateRequest extends FormRequest
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
            'name' => 'required',

            //Esta validacion verifique que al momento de actualizar ese slug no se verifique el slug que estamos tratando de actualizar ya que de lo contrario nunca sera posible actualizar por que encontrara como duplicado el slug 
            
            'slug' => 'required|unique:tags,slug,'.$this->tag,
        ];
    }
}
