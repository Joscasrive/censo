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
        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            
            $table->string('codigo')->nullable();
            $table->string('nombre');
            $table->string('municipio');
            $table->string('parroquia');
            $table->string('rif');
            $table->string('clap');
            $table->string('correo');
            $table->string('misiones');
            $table->string('centro');
            $table->string('norte');
            $table->string('sur');
            $table->string('este');
            $table->string('oeste');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos');
    }
};
