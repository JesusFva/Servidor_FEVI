<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_grupo_materia');
            $table->string('parcial',30);
            $table->string('asis_porcentaje');
            $table->string('pres_porcentaje');
            $table->string('plat_porcentaje');
            $table->string('exa_porcentaje');
            $table->string('calificacion',10);

            

            
            $table->date('fecha');

            $table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_grupo_materia')->references('id')->on('grupo_materias')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('calificaciones');
    }
}
