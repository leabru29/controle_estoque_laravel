<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnidadeMedida>
 */
class UnidadeMedidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unidade = fake()->name();
        $sigla = substr($unidade, 0, 2);

        return [
            'unidade' => $unidade,
            'sigla' => strtoupper($sigla),
            'ativo' => fake()->boolean()
        ];
    }
}