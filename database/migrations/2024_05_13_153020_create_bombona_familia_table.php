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
        Schema::create('bombona_familia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bombona_id')->constrained('bombonas')->onDelete('cascade');
            $table->foreignId('familia_id')->constrained('familias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bombona_familia');
    }
};
