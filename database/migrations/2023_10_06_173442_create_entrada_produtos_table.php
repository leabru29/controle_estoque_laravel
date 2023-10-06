<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entrada_produtos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')
                  ->references('id')
                  ->on('produtos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->string('lote', length: 10);
            $table->integer('quantidade', false, false);

            $table->unsignedBigInteger('id_medida');
            $table->foreign('id_medida')
                  ->references('id')
                  ->on('unidade_medidas')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
                  
            $table->float('valor', 8, 2);
            $table->date('dt_fabricacao');
            $table->date('dt_validade');

            $table->unsignedBigInteger('id_fornecedor');
            $table->foreign('id_fornecedor')
                  ->references('id')
                  ->on('fornecedores')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->unsignedBigInteger('id_local_armazenamento');
            $table->foreign('id_local_armazenamento')
                  ->references('id')
                  ->on('local_armazenamentos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada_produtos');
    }
};