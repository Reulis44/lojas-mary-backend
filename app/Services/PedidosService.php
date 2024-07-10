<?php

namespace App\Services;
use App\Models\PedidosItens;
use App\Repositories\PedidosRepository;

class PedidosService {
    protected $repo;
    protected $item;

    public function __construct(PedidosRepository $pedidosRepository)
    {
        $this->repo = $pedidosRepository;
    }

    public function all()
    {
        $pedidos = $this->repo->all();

        // Ativa appends
        foreach ($pedidos as $pedido) {
            $pedido->itens;
        }

        return $pedidos;
    }

    public function find($id)
    {
        $pedido = $this->repo->find($id);

        if($pedido) {
            // Ativa append
            $pedido->itens;
            $pedido->cliente;
        }
        return $pedido;
    }

    public function create (array $data)
    {
        $data['codigo_pedido'] = uuid_create();

        // Criar pedido
        $pedido = $this->repo->create($data);

        // Criar itens do pedido
        PedidosItens::create([
            "id_pedido" => $pedido->id,
            "id_produto" => 1, // Default 1
            "valor_unitario" => $pedido->valor_total,
            "quantidade" => 1
        ]);

        return $pedido;

    }

    public function update ($id, array $data)
    {
        return $this->repo->update($id, $data);
    }
    public function delete($id)
    {
        return $this->repo->delete($id);
    }
}
