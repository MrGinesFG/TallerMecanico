<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'email'     => ['required', 'email', 'unique:clientes,email'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ];
    }
}
