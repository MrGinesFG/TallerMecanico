<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'    => ['required', 'string', 'max:255'],
            'apellido'  => ['required', 'string', 'max:255'],
            'telefono'  => ['nullable', 'string', 'max:20'],
            'email'     => ['required', 'email', Rule::unique('clientes', 'email')->ignore($this->cliente)],
            'direccion' => ['nullable', 'string', 'max:255'],
        ];
    }
}
