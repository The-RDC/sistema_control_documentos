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
        Schema::table('regionales', function (Blueprint $table) {
            $table->unsignedBigInteger('id_empresa')
                  ->after('nombre_regional')
                  ->nullable();
            $table->foreign('id_empresa')->references('id')->on('empresas')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regionales', function (Blueprint $table) {
            $table->dropForeign('regionales_id_empresa_foreign');
            $table->dropColumn('id_empresa');
        });
    }
};
