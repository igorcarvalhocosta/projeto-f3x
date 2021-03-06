<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtigosFormRequest extends FormRequest
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
            'titulo' => 'required | min:2',
            'texto' => 'required | min:5',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute precisa ter pelo menos 2 caracteres.'
        ];
    }
}
