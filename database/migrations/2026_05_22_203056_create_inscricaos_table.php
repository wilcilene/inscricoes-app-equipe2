<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    public function up(): void
    {
        Schema::table("inscricaos", function (Blueprint $table) {
            $table->dropForeign(["edital_id"]);

            $table
                ->foreign("edital_id")
                ->references("id")
                ->on("editals")
                ->onDelete("cascade");
        });
    }

    public function down(): void
    {
        Schema::table("inscricaos", function (Blueprint $table) {
            $table->dropForeign(["edital_id"]);

            $table->foreign("edital_id")->references("id")->on("editals");
        });
    }
    /**
     * Run the migrations.
     */
};
