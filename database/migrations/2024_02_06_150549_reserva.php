<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->unsignedBigInteger('dispositivo_id');
            $table->dateTime('fecha_reserva');
            $table->text('motivo_reserva');
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('dispositivo_id')->references('id')->on('dispositivos');
        });
    }

    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign(['dispositivo_id']);
        });

        Schema::dropIfExists('reservas');
    }
};
