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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique()->nullable();
            $table->string('telefono');
            $table->string('tipo_persona');
            $table->string('codigo');
            $table->string('serial');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->foreignId('familia_id')->constrained('familias')->onDelete('cascade');
            $table->text('observacion')->nullable();
            $table->enum('status',[1,2])->default(1);
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('integrantes');
    }
};
