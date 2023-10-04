<?php

namespace Database\Seeders;

use App\Models\UnidadeMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnidadeMedida::factory(3)->create();
    }
}