<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Leandro Bezerra da Silva',
            'email' => 'leandro_ccb10@hotmail.com',
            'password' => '246891br'
        ]);

        /* $this->call([
            FornecedorSeeder::class,
            GrupoProdutoSeeder::class,
            LocalArmazenamentoSeeder::class,
            UnidadeMedidaSeeder::class,
            ProdutoSeeder::class,
        ]); */
    }
}