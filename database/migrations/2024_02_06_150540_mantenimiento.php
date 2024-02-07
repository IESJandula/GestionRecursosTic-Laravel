<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_mantenimiento');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('dispositivo_id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->unsignedBigInteger('asignacion_equipo_mantenimiento_id');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo')->onDelete('cascade');
            $table->foreign('asignacion_equipo_mantenimiento_id')->references('id')->on('asignacion_equipo_mantenimientos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
};

