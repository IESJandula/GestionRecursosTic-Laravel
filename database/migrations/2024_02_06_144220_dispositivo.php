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
            $table->integer('tipo_dispositivo');
            $table->string('num_serie');
            $table->string('modelo');
            $table->string('marca');
            $table->date('fecha_adquisicion');
            $table->string('estado');
            $table->text('observaciones');
            $table->integer('ubicacion_id');
            $table->string('cod_barras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
