<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        "nama",
        "desa_id",
        "kecamatan_id",
    ];

    /**
     * Relasi dengan table desa
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Desa, KelompokTani>
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    /**
     * Relasi dengan table kecamatan
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Kecamatan, KelompokTani>
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function penyuluhKelompokTani()
    {
        return $this->belongsToMany(PenyuluhTerdaftar::class, 'penyuluh_kelompok_tanis', 'kelompok_tani_id', 'penyuluh_terdaftar_id')
            ->withTimestamps();
    }
}
