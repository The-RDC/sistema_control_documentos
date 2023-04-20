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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('empleado_id')->nullable();
<<<<<<< HEAD
            $table->foreign('empleado_id')->references('id')->on('empleados')->nullOnDelete();
=======
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('set null')->nullOnDelete();
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
        Schema::dropIfExists('users');
    }
};
