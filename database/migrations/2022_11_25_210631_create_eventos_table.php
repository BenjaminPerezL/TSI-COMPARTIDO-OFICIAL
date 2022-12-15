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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string("title",30);
            $table->text("descripcion")->null();
            $table->string('rut_cliente',15);
            $table->string('estado',50);

            $table->dateTime("start");
            $table->dateTime("end");
            
            $table->timestamps();
            $table->foreign('rut_cliente')->references('rut')->on('clientes');
            //$table->foreign('title')->references('tipo_servicio')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
