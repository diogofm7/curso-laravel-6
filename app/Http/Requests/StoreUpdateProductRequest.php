<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|unique:products,name,'.$this->route('product').',id',
            'description' => 'required|min:3|max:10000',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Nome é obrigatório.',
            'name.min' => 'Ops! Nome precisa ter no minimo 3 caracteres.',
            'description.required' => 'Descrição é obrigatória.',
            'price.required' => 'Preço é obrigatório.',
            'price.regex' => 'Formato de Preço inválido.'
        ];
    }
}
