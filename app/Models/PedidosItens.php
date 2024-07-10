<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidosItens extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["id_pedido", "id_produto", "status","valor_unitario", "quantidade", "created_at", "updated_at", "deleted_at"];

    public function pedido ()
    {
        return $this->hasOne(Pedidos::class, "id", "id_pedido");
    }

    public function produto()
    {
        return $this->hasOne(Produtos::class, "id", "id_produto");
    }
}
