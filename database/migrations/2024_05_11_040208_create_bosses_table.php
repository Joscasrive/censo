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
        Schema::create('bosses', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique();
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->string('codigo');
            $table->string('serial');
            $table->string('sexo');
            $table->unsignedInteger('mercado')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bosses');
    }
};
