<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalArmazenamentoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "local" => 'required',
            "cnpj" => 'required',
            "telefone" => 'required',
            "email" => 'required',
            "cep" => 'required',
            "logradouro" => 'required',
            "numero" => 'required',
            "complemento" => 'required',
            "bairro" => 'required',
            "cidade" => 'required',
            "estado" => 'required',
            "pais" => 'required'
        ];
    }
}