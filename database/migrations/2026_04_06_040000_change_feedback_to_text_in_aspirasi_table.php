<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            $table->text('feedback')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            $table->integer('feedback')->nullable()->change();
        });
    }
};

