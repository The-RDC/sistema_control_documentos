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
            $table->dateTime('fecha_entrega')->nullable();
            $table->dateTime('fecha_final')->nullable();
            $table->string('empresa');
            $table->string('regional');
            $table->string('sucursal');
            $table->string('observacion')->nullable();

            $table->unsignedBigInteger('id_usuario')->nullable();
<<<<<<< HEAD
            $table->foreign('id_usuario')->references('id')->on('users')->nullOnDelete();

            $table->unsignedBigInteger('id_tipo_documento')->nullable();
            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documentos')->nullOnDelete();

            $table->unsignedBigInteger('id_unidad_destino')->nullable();
            $table->foreign('id_unidad_destino')->references('id')->on('unidades')->nullOnDelete();

            $table->unsignedBigInteger('id_estado_documento')->nullable();
            $table->foreign('id_estado_documento')->references('id')->on('estado_documentos')->nullOnDelete();
=======
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('set null')->nullOnDelete();

            $table->unsignedBigInteger('id_tipo_documento')->nullable();
            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documentos')->onDelete('set null')->nullOnDelete();

            $table->unsignedBigInteger('id_unidad_destino')->nullable();
            $table->foreign('id_unidad_destino')->references('id')->on('unidades')->onDelete('set null')->nullOnDelete();

            $table->unsignedBigInteger('id_estado_documento')->nullable();
            $table->foreign('id_estado_documento')->references('id')->on('estado_documentos')->onDelete('set null')->nullOnDelete();
>>>>>>> 7db860f481695d97ec4813df8e7d10936f7db677
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
