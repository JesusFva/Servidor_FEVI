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
    //Hola Ana y rodri
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100);
            $table->string('ap_p',60);
            $table->string('ap_m',60);
            $table->string('matricula',100)->unique();
            $table->string('seguro_social');
            $table->date('f_nacimiento');
            $table->string('curp',20)->unique();
            $table->string('nacionalidad',20);
            $table->string('tipo_sanguineo',5);
            $table->string('enfermedad',100);
            $table->string('estado_civil',20);
            $table->string('modalidad', 100);
            $table->string('status');
            $table->string('no_cuatrimestre');
            $table->date('f_ingreso');
            $table->date('f_egreso');
            $table->string('url_foto'); 
           // $table->string('url_qr')->nullable(); 


            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_plantel');

            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_carrera')->references('id')->on('carreras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_plantel')->references('id')->on('plantels')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('alumnos');
    }
};
