<?php

namespace App\Services;
use App\Http\Requests\PedidosItensRequest;
use App\Repositories\PedidosItensRepository;



class PedidosItensService {

    protected $repo;

    public function __construct(PedidosItensRepository $pedidosItensRepository)
    {
        $this->repo = $pedidosItensRepository;
    }

    public function all()
    {
        $itens = $this->repo->all();

        // ativa append
        foreach ($itens as $item) {
            $item->produto;
        }
        return $itens;
    }

    public function find($id)
    {
        $item = $this->repo->find($id);
        if($item) {
            // Ativar append
            $item->produto;
            $item->pedido;
        }

        return $item;
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete ($id)
    {
        return $this->repo->delete($id);
    }

}
