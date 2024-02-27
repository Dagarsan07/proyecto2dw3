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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta_txt', 250);
            $table->string('respuesta_1', 50);
            $table->string('respuesta_2', 50);
            $table->string('respuesta_3', 50);
            $table->string('respuesta_4', 50);
            $table->string('res_correcta', 15);
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
