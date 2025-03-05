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
        Schema::create('laporan_kondisi_lapangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_tani_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('komoditas_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('penyuluh_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kondisi_lapangans');
    }
};
