<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id_pessoa', 'codigo_pedido', 'status', 'valor_total', 'created_at', 'updated_at', 'deleted_at'];


    public function itens()
    {
        return $this->hasMany(PedidosItens::class, 'id_pedido', 'id');
    }

    public function cliente()
    {
        return $this->hasOne(Pessoas::class, 'id', 'id_pessoa');
    }
}
