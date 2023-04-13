<?php

namespace App\Http\Requests\Cargo;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre_cargo'=> 'required|string|min:4'
        ];
    }

    public function messages()
    {
        return [
            'nombre_cargo.required' => 'Este Campo es Requerido',
            'nombre_cargo.string' => 'El Valor no es Correcto',
            'nombre_cargo.min' => 'Como minimo debe tener 4 caracteres',
        ];
    }
}
