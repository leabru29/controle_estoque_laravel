<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LocalArmazenamento>
 */
class LocalArmazenamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'local' => fake()->company(),
            'cnpj' => rand(00000000000000, 99999999999999),
            'telefone' => '('. rand(11, 98) .')' . rand(1000, 99999) . '-' . rand(0000, 9999),
            'email' => fake()->email(),
            'cep' => fake()->postcode(),
            'logradouro' => fake()->streetAddress(),
            'numero' => rand(0, 9999),
            'complemento' => fake()->address(),
            'bairro' => fake()->streetName(),
            'cidade' => fake()->city(),
            'estado' =>fake()->state(),
            'pais' => fake()->country()
        ];
    }
}