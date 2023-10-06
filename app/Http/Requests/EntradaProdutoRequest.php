<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaProdutoRequest extends FormRequest
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
            "id_produto" => 'required',
            "lote" => ['required'],
            "quantidade" => 'required',
            "id_medida" => 'required',
            "valor" => 'required',
            "dt_fabricacao" => 'required',
            "dt_validade" => 'required',
            "id_fornecedor" => 'required',
            "id_local_armazenamento" => 'required',
        ];
    }
}