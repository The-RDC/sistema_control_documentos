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
        Schema::create('log_estado_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('id_log');
            $table->dateTime('fecha_recepcion');
            $table->dateTime('fecha_entrega');
            $table->dateTime('fecha_final');
            $table->string('observacion');
            $table->tinyInteger('estado')->default(1);

            $table->unsignedBigInteger('id_tipo_documento');
            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documentos');

            $table->unsignedBigInteger('id_unidad_destino');
            $table->foreign('id_unidad_destino')->references('id')->on('unidades');

            $table->unsignedBigInteger('id_estado_documento');
            $table->foreign('id_estado_documento')->references('id')->on('estado_documentos');

            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_estado_documentos');
    }
};
