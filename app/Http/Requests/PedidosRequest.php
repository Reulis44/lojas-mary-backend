<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_pessoa' => 'required|exists:pessoas,id',
            'valor_total'   => 'required|numeric',
            'id' => 'exists:pedidos,id'
        ];
    }

    public function messages()
    {
        return [
            'id_pessoa.required' => 'id_pessoa é obrigatório',
            'id_pessoa.exists'   => 'pessoa não localizada',
            'valor_total.required' => 'valor_total é obrigatório',
            'valor_total.numeric' => 'valor_total deve ser número',
            'id.exists' => 'pedido não encontrado'
        ];
    }
}
