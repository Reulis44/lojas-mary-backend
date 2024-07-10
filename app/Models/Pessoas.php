<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "id_profissao", "tipo_cadastro", "nome", "cpf", "data_nascimento", "email", "genero", "estado_civil",
        "rua", "numero", "complemento", "bairro", "cidade", "uf", "cep", "created_at", "updated_at", "deleted_at"
    ];

    public function profissao()
    {
        return $this->hasOne(Profissoes::class, "id", "id_profissao");
    }

    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, "id_pessoa", "id");
    }
}
