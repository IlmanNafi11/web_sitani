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
        Schema::table('penyuluhs', function (Blueprint $table) {
            $table->dropForeign(['kecamatan_id']);
            $table->dropColumn('kecamatan_id');
            $table->foreignId('penyuluh_terdaftar_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('path_profil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyuluhs', function (Blueprint $table) {
            $table->foreignId('kecamatan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->dropColumn('penyuluh_terdaftar_id');
            $table->dropColumn('path_profil');
        });
    }
};
