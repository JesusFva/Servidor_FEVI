<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asistencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parcial');
            $table->date('fecha');


            $table->unsignedBigInteger('id_asistencia');
            $table->unsignedBigInteger('id_grupo_materia');
            $table->unsignedBigInteger('id_tipo_asistencia');

            $table->foreign('id_asistencia')->references('id')->on('asistencias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_grupo_materia')->references('id')->on('grupo_materia')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_asistencia');
    }
}
