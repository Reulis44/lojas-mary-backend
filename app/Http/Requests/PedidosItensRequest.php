<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosItensRequest extends FormRequest
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
            'id_pedido' => "required|exists:pedidos,id",
            'id_produto' => "required|exists:produtos,id",
            'valor_unitario' => 'required|numeric',
            'quantidade' => 'required|integer',
            "id"   => "exists:pedidos_itens,id"
        ];
    }

    public function messages()
    {
        return [
            'id_pedido.required' => "id_pedido é obrigatório",
            'id_pedido.exists'    => "Pedido não encontrado",
            'id_produto.required' => "id_produto é obrigatório",
            'id_produto.exists'  => "Produto não encontrado",
            'valor_unitario.required' => "Valor Unitário é obrigatório",
            'valor_unitario.numeric'  => "Valor Unitário deve ser numérico",
            'quantidade.required'     => "Quantidade é obrigatório",
            'quantidade.integer' => "Quantidade deve ser um número",
            "id.exists" => "Pedido item não encontrado"
        ];
    }
}
