<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets_mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('dispositivo_id');
            $table->unsignedBigInteger('ubicacion_id');
            $table->dateTime('fecha_solicitud');
            $table->text('descripcion_problema');
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('id')->references('id')->on('administradores');
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo');
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
        });
    }

    public function down()
    {
        Schema::table('tickets_mantenimientos', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['dispositivo_id']);
            $table->dropForeign(['ubicacion_id']);
        });

        Schema::dropIfExists('tickets_mantenimientos');
    }
};
