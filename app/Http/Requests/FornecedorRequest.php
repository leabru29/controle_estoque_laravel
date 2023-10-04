<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'fornecedor' => 'required',
            'email' => 'email|required',
            'telefone' => 'required',
            'cnpj' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'fornecedor.required' => 'O campo Fornecedor é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'Insira um E-mail válido.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
        ];
    }
}