<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produto' => fake()->name(),
            'quant' => rand(0, 30),
            'validade' => fake()->date('Y-m-d', $min = 'now'),
            'valor' => fake()->randomDigitNotZero(),
            'descricao' => fake()->lastName(),
            'id_grupo' => rand(1, 10),
            'id_un' => rand(1, 3),
            'id_local_armazenamento' => rand(1, 10),
            'id_fornecedor' => rand(1, 10)
        ];
    }
}