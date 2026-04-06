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
    Schema::create('aspirasi', function (Blueprint $table) {
        $table->integer('id_aspirasi')->primary();
        $table->enum('status', ['Menunggu', 'Proses', 'Selesai'])->default('Menunggu');
        $table->integer('id_kategori');
        $table->integer('feedback')->nullable();
        $table->timestamps();

        // Foreign Key Relationship
        $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
    }
};
