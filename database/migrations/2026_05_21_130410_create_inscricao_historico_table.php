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
        Schema::create('inscricao_historico', function (Blueprint $table) {
            $table->id(); 

            $table->string('observacao', 400)->nullable(); 

            $table->foreignId('inscricao_id')
                  ->constrained('inscricao')
                  ->onDelete('cascade'); 

            $table->foreignId('inscricao_status_id')
                  ->constrained('inscricao_status')
                  ->onDelete('restrict'); 

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricao_historico');
    }
};