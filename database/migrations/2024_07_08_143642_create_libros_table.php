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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('autor')->nullable();
            $table->integer('anio')->nullable();
            $table->string('editorial')->nullable();
            $table->string('edicion')->nullable();
            $table->string('codigo')->unique()->nullable(); //cambio a los atributos de código de libro
            $table->integer('ejemplar');
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
