<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('input_aspirasi', function (Blueprint $table) {
            $table->integer('id_aspirasi')->nullable()->after('id_pelaporan');
            $table->foreign('id_aspirasi')->references('id_aspirasi')->on('aspirasi')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('input_aspirasi', function (Blueprint $table) {
            $table->dropForeign(['id_aspirasi']);
            $table->dropColumn('id_aspirasi');
        });
    }
};

