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
        Schema::table('sucursales', function (Blueprint $table) {
            $table->unsignedBigInteger('id_regional')
                  ->after('direccion_sucursal')
                  ->nullable();
            //$table->foreign('id_regional')->references('id')->on('regionales')->nullOnDelete();

            $table->unsignedBigInteger('id_empresa')
                  ->after('id_regional')
                  ->nullable();
            $table->foreign('id_empresa')->references('id')->on('empresas')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sucursales', function (Blueprint $table) {
            //$table->dropForeign('sucursales_id_regional_foreign');
            $table->dropColumn('id_regional');

            $table->dropForeign('sucursales_id_empresa_foreign');
            $table->dropColumn('id_empresa');
        });
    }
};
