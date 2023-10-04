<?php

namespace Database\Seeders;

use App\Models\LocalArmazenamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalArmazenamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LocalArmazenamento::factory(10)->create();
    }
}