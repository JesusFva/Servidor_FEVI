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
        Schema::create('c_p_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo',100);
            $table->string('colonia',100);
            $table->string('tipo_asenta',100);
            $table->string('municipio',100);
            $table->string('estado',100);
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
        Schema::dropIfExists('c_p_s');
    }
};
