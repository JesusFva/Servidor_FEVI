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
        
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('curp');
            $table->string('rfc');
            $table->string('n_cedula');
            $table->string('n_empleado');
            $table->date('f_nacimiento');
            $table->date('f_ingreso');
            $table->date('f_baja');
            $table->string('estatus');
            $table->string('profesion');
            $table->string('url_foto'); 
            $table->unsignedBigInteger('id_puesto');
            
            $table->foreign('id_puesto')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('empleados');
    }
};
