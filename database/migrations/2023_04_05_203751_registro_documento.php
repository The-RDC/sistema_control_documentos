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
        Schema::create('registro_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_hoja_ruta');
            $table->dateTime('fecha_recepcion');
            $table->dateTime('fecha_entrega');
            $table->dateTime('fecha_final');
            $table->string('observacion');

            $table->unsignedBigInteger('id_tipo_documento');
            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documentos');

            $table->unsignedBigInteger('id_unidad_destino');
            $table->foreign('id_unidad_destino')->references('id')->on('unidades');

            $table->unsignedBigInteger('id_estado_documento');
            $table->foreign('id_estado_documento')->references('id')->on('estado_documentos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_documentos');
    }
};
