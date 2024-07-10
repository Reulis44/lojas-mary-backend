<?php

namespace App\Repositories;

use App\Models\PedidosItens;
use App\Interfaces\ApiCrudInterface;

class PedidosItensRepository implements ApiCrudInterface
{
    public function all()
    {
        return PedidosItens::orderBy('id', 'desc')
                            ->with('produto')
                            ->get();
    }

    public function find($id)
    {
        return PedidosItens::findOrFail($id);
    }

    public function create(array $data)
    {
        return PedidosItens::create($data);
    }

    public function update($id, array $data)
    {
        $entity = PedidosItens::findOrFail($id);
        $entity->update($data);
        return $entity;
    }

    public function delete($id)
    {
        $entity = PedidosItens::findOrFail($id);
        return $entity->delete();
    }
}
