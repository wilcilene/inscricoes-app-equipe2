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
        Schema::create('inscricao', function (Blueprint $table) {

            $table->id();

            $table->string('caminho_fica_inscricao',255);

            $table->string('caminho_identidade',255);

            $table->string('caminho_diploma',255);

            $table->string('caminho_curriculo_lattes',255);

            $table->string('caminho_comprovante_eleitoral',255);

            $table->string('caminho_certificado_militar',255);

            $table->tinyInteger('vaga_pcd');

            $table->tinyInteger('vaga_pniq');

            $table->unsignedBigInteger('edital_id');

            $table->unsignedBigInteger('candidato_id');

            $table->foreign('edital_id')
                ->references('id')
                ->on('edital');
        
            $table->foreign('candidato_id')
                ->references('id')
                ->on('candidato');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricao');
    }
};
