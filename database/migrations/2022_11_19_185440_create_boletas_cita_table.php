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
        Schema::create('boletas_cita', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cita');
            $table->integer('cantidad_pagada');
            $table->string('descripcion',100);
            $table->string('tipo_de_pago',20);
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
        Schema::dropIfExists('boletas_cita');
    }
};
