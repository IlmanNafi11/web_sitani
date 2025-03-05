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
        Schema::create('laporan_kondisi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_kondisi_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('luas_lahan', 10, 2);
            $table->date('estimasi_panen')->nullable();
            $table->string('jenis_bibit');
            $table->string('foto_bibit');
            $table->string('lokasi_lahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kondisi_lapangan_details');
    }
};
