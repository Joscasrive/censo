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
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_familiar')->unique();
            $table->string('codigo_gas');
            $table->unsignedBigInteger('manzana_id');
            $table->foreign('manzana_id')->references('id')->on('manzanas')->onDelete('cascade');
            $table->unsignedBigInteger('boss_id');
            $table->foreign('boss_id')->references('id')->on('bosses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familias');
    }
};
