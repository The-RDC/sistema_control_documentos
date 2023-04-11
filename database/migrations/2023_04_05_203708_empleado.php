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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_regional');

            $table->foreign('id_regional')->references('id')->on('regionales');

            $table->unsignedBigInteger('id_sucursal');

            $table->foreign('id_sucursal')->references('id')->on('sucursales');

            $table->unsignedBigInteger('id_empresa');

            $table->foreign('id_empresa')->references('id')->on('empresas');

            $table->unsignedBigInteger('id_cargo');

            $table->foreign('id_cargo')->references('id')->on('cargos');

            $table->string('nombres')->unique();
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('avatar')->nullable();
            $table->string('nacionalidad');
            $table->string('nro_documento');
            $table->string('tipo_documento');
            $table->string('ext_visa_laboral');
            $table->string('email_personal')->nullable();
            $table->string('email_institucional')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('estado_civil')->nullable();
            $table->string('telf_celular');
            $table->string('telf_fijo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('estado_registro')->nullable();
            $table->string('nom_sis')->nullable();
            $table->string('num_suc')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
