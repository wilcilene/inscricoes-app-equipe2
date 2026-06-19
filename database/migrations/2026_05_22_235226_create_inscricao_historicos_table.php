<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
       Schema::create('inscricao_historicos', function (Blueprint $table) {
            $table->id(); 

            $table->string('observacao', 400)->nullable(); 

            $table->foreignId('inscricao_id')
                  ->constrained('inscricaos')
                  ->onDelete('cascade'); 

            $table->foreignId('inscricao_status_id')
                  ->constrained('inscricao_statuses')
                  ->onDelete('restrict'); 

            $table->timestamps(); 
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('inscricao_historicos');
    }
};
