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
        Schema::create('detalle_contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_volatil')->nullable();
            $table->unsignedBigInteger('id_contacto');
            $table->string('tipo')->nullable();
            
            $table->foreign('id_contacto')->references('id')->on('contactos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_contactos');
    }
};
