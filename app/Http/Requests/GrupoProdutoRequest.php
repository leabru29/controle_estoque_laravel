<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoProdutoRequest extends FormRequest
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
            'grupo' => 'required|unique:grupo_produtos|max:50',
            'ativo' => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'grupo.required' => 'O nome do Grupo é obrigatório',
        'ativo.required' => 'Status é obrigatório',
    ];
}
}