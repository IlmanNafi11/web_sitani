<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        'nama',
        'deskripsi',
        'musim',
    ];

    /**
     * Relasi dengan table bibit berkualitas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<BibitBerkualitas, Komoditas>
     */
    public function bibitBerkualitas()
    {
        return $this->hasMany(BibitBerkualitas::class);
    }

    /**
     * Relasi dengan table laporan kondisi lapangan
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<LaporanKondisiLapangan, Komoditas>
     */
    public function laporanKondisiLapangan()
    {
        return $this->hasMany(LaporanKondisiLapangan::class);
    }
}
