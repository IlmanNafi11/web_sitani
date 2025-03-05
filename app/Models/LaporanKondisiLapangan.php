<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKondisiLapangan extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        'kelompok_tani_id',
        'komoditas_id',
        'penyuluh_id',
    ];

    /**
     * Relasi dengan table kelompok tani
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<KelompokTani, LaporanKondisiLapangan>
     */
    public function kelompokTani()
    {
        return $this->belongsTo(KelompokTani::class);
    }

    /**
     * Relasi dengan table penyuluh
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Penyuluh, LaporanKondisiLapangan>
     */
    public function penyuluh()
    {
        return $this->belongsTo(Penyuluh::class);
    }

    /**
     * Relasi dengan table komoditas
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Komoditas, LaporanKondisiLapangan>
     */
    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }
}
