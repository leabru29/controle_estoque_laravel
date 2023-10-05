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
            $table->string('cod_item', 10)->comment('Codigo do Item');
            $table->string('nome', 100);
            $table->string('descricao')->nullable();
            $table->string('princ_ativo')->nullable()->comment('Principio ativo');
            $table->string('cond_armazenagem')->nullable();
            $table->float('valor', 8, 2)->nullable();

            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')
                  ->references('id')
                  ->on('grupo_produtos')
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