<?php

namespace App\Repositories;

use App\Models\Pedidos;
use App\Interfaces\ApiCrudInterface;

class PedidosRepository implements ApiCrudInterface
{
    public function all()
    {
        return Pedidos::orderBy('id', 'desc')
                      ->with('itens')
                      ->get();
    }

    public function paginate(int $perPage)
    {
        return Pedidos::orderBy('id', 'desc')
                      ->with('itens')
                      ->paginate($perPage);
    }

    public function find($id)
    {
        return Pedidos::find($id);
    }

    public function create(array $data)
    {
        return Pedidos::create($data);
    }

    public function update($id, array $data)
    {
        $pedido = Pedidos::find($id);
        if($pedido) {
            $pedido->update($data);
            return $pedido;
        }

        return [
            'status' => false,
            'message' => 'Pedido não encontrado'
        ];
    }

    public function delete($id)
    {
        $pedido = Pedidos::find($id);
        if($pedido) {
            return $pedido->delete();
        }

        return [
            'status' => false,
            'message' => 'Pedido não encontrado'
        ];
    }
}
