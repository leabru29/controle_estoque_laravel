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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('produto')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('quant')->nullable();
            $table->date('validade')->nullable();
            $table->float('valor', 8, 2);
            
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')
                  ->references('id')
                  ->on('grupo_produtos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->unsignedBigInteger('id_un');
            $table->foreign('id_un')
                  ->references('id')
                  ->on('unidade_medidas')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->unsignedBigInteger('id_local_armazenamento');
            $table->foreign('id_local_armazenamento')
                  ->references('id')
                  ->on('local_armazenamentos')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->unsignedBigInteger('id_fornecedor');
            $table->foreign('id_fornecedor')
                  ->references('id')
                  ->on('fornecedores')
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
        Schema::dropIfExists('produtos');
    }
};