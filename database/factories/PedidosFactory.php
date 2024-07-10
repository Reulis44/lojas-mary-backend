<?php

namespace Database\Factories;

use App\Models\Pedidos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PedidosFactory extends Factory
{
    protected $model = Pedidos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_pedido' => Str::random(10),
            'status' => $this->faker->randomElement(['pendente', 'concluido', 'cancelado']),
            'valor_total' => $this->faker->randomFloat(2, 10, 1000),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
