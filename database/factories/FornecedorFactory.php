<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fornecedor' => fake()->name(),
            'email' => fake()->email(),
            'telefone' => '('. rand(11, 98) .')' . rand(1000, 99999) . '-' . rand(0000, 9999),
            'cnpj' => rand(00000000000000, 99999999999999)
        ];
    }
}