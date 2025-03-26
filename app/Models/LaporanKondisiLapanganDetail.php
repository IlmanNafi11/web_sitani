<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKondisiLapanganDetail extends Model
{
    protected $table = "laporan_kondisi_details";

    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        'laporan_kondisi_id',
        'luas_lahan',
        'estimasi_panen',
        'jenis_bibit',
        'foto_bibit',
        'lokasi_lahan',
    ];

    protected $casts = [
        'estimasi_panen' => 'date'
    ];

    /**
     * Relasi dengan table laporan kondisi
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<LaporanKondisiLapangan, LaporanKondisiLapanganDetail>
     */
    public function laporanKondisiLapangan()
    {
        return $this->belongsTo(LaporanKondisiLapangan::class);
    }
}
