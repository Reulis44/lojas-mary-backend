<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedidos;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cria 50 registros na tabela `pedidos` usando a factory
        Pedidos::factory()->count(50)->create();
    }
}
