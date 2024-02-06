<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispositivo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_dispositivo'); // Define la columna tipo_dispositivo
            $table->foreign('tipo_dispositivo')->references('id')->on('tipoDispositivos');
            $table->string('num_serie');
            $table->string('modelo');
            $table->string('marca');
            $table->date('fecha_adquisicion');
            $table->unsignedBigInteger('estado'); // Define la columna estado
            $table->foreign('estado')->references('id')->on('estadoDispositivo');
            $table->text('observaciones');
            $table->unsignedBigInteger('ubicacion_id'); // Define la columna ubicacion_id
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion');
            $table->string('cod_barras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivo');
    }
};
