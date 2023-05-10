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
        Schema::create('observacion', function (Blueprint $table) {
            $table->id();
            $table->text("observacion_documento")->nullable();
            $table->unsignedBigInteger('id_registro_documento')->nullable();
            $table->foreign('id_registro_documento')->references('id')->on('registro_documentos')->nullOnDelete();
            $table->unsignedBigInteger('id_estado_documento')->nullable();
            $table->foreign('id_estado_documento')->references('id')->on('estado_documentos')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observacion');
    }
};
