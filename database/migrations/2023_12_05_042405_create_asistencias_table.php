<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_grupo_materia');
            $table->unsignedBigInteger('id_tipo_asistencia');

            //$table->integer('estatus');
            $table->date('fecha');

            $table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_grupo_materia')->references('id')->on('grupo_materias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipo_asistencia')->references('id')->on('tipo_asistencias')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('asistencias');
    }
};
