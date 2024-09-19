<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('libros_id')->constrained(); //id del libro prestado
            $table->foreignId('estudiantes_id')->constrained(); //id del usuario que solicitó el libro
            $table->foreignId('users_id')->nullable()->constrained(); //id del administrador que atendió la solicitud
            
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_devolucion')->nullable();

            $table->integer('estado_solicitud')->default(0);
            $table->integer('estado_devolucion')->default(0);
            
            /*  Solicitud
            -1 rechazado
            0  pendiente
            1  aceptado
            */ 
            
            /*  Devolución
            0 no prestado
            1 pendiente de devolución
            2 devuelto
            */
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}

