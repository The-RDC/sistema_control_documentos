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
        Schema::create('solicitud_vacaciones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados');

            $table->string('fecha_solicitud');
            $table->string('fecha_salida');
            $table->string('fecha_retorno');
            $table->string('aprobacion')->nullable();
            $table->string('observacion')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_vacaciones');
    }
};
