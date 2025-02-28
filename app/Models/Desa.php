<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        "nama",
        "kecamatan_id"
    ];

    /**
     * Relasi dengan table kecamatan
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Kecamatan, Desa>
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    /**
     * Relasi dengan table kelompok tani
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<KelompokTani, Desa>
     */
    public function kelompokTani()
    {
        return $this->hasMany(KelompokTani::class);
    }
}
