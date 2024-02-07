<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial_ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dispositivo_id');
            $table->unsignedBigInteger('ubicacion_id');
            $table->dateTime('fecha_asignacion');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo');
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
        });
    }

    public function down()
    {
        Schema::table('historial_ubicaciones', function (Blueprint $table) {
            // Eliminar las claves foráneas antes de eliminar la tabla
            $table->dropForeign(['dispositivo_id']);
            $table->dropForeign(['ubicacion_id']);
        });

        Schema::dropIfExists('historial_ubicaciones');
    }
};
