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
        Schema::create('detalle_domicilios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_volatil')->nullable();
            $table->unsignedBigInteger('id_domicilio');
            $table->string('tipo');
            $table->foreign('id_domicilio')->references('id')->on('domicilios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_domicilios');
    }
};
