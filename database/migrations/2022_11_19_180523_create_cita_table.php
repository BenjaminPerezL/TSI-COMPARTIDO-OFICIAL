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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_servicio',20);
            $table->date('fecha');
            $table->time('hora');
            $table->string('descripcion',100);
            $table->string('estado',20);
            $table->string('rut_cliente',15);
            $table->timestamps();
            $table->foreign('rut_cliente')->references('rut')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
