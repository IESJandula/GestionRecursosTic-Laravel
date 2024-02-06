<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('licencias_software', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_software');
            $table->date('fecha_adquisicion');
            $table->date('fecha_renovacion')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('licencias_software');
    }
};
