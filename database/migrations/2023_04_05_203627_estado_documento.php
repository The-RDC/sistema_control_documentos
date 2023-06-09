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
        Schema::create('estado_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('estado_documento');

            $table->unsignedBigInteger('id_procedencia_documento')->nullable();
            $table->foreign('id_procedencia_documento')->references('id')->on('procedencia_documento')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('estado_documentos');
    }
};
