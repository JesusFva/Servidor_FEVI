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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');// cambiar por llave foranea de carrera
            $table->boolean('acta_nacimiento');
            $table->boolean('certificado');
            $table->boolean('curp');
            $table->boolean('comprobante_domicilio');
            $table->boolean('certificado_medico');
            $table->boolean('ine');
            $table->boolean('historial_academico')->nullable;
            $table->boolean('fotografias');
            $table->boolean('titulo');
            $table->boolean('cedula');
            // falta relacionar con carta compromiso
            
            
            
            

            
            
            
            
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
        Schema::dropIfExists('documentos');
    }
};
