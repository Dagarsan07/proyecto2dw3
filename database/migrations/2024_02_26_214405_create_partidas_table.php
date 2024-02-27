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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->integer('aciertos');
            $table->integer('cant_preguntas');
            $table->time('tiempo', );
            $table->bigInteger('puntuacion');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
