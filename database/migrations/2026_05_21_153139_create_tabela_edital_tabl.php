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
       Schema::create('edital', function (Blueprint $table) {

            $table->id();

            $table->string('nome',255);

            $table->text('descricao');

            $table->date('data_inicio_inscr');

            $table->date('data_fim_inscr');

            $table->date('data_inicio_rev');

            $table->date('data_fim_rev');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('edital');
    }
};
