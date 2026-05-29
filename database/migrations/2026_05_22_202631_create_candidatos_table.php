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
        Schema::create('candidatos', function (Blueprint $table) {

            $table->id();

            $table->string('cpf',15);
            $table->string('nome_social', 255)->nullable(true);
            $table->string('genero',255);
            $table->string('naturalidade',255);
            $table->string('mae',255);
            $table->string('cep',10);
            $table->string('logradouro',255);
            $table->string('numero',4);
            $table->string('complemento',255)->nullable(true);
            $table->string('bairro',255);
            $table->string('estado',255);
            $table->string('telefone',255)->nullable(true);
            $table->string('cidade',255);       
            
            $table->date('data_nascimento');

            $table->unsignedBigInteger('usuario_id');

            $table->foreign('usuario_id')
                ->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
