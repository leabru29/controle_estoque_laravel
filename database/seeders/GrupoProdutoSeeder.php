<?php

namespace Database\Seeders;

use App\Models\GrupoProduto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GrupoProduto::factory(10)->create();
    }
}