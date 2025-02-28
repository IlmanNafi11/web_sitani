<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        "nama"
    ];

    /**
     * Mutator untuk mengatur attribute nama selalu menggunakan style title case
     * @param mixed $value
     * @return void
     */
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = Str::title($value);
    }

    /**
     * Relasi dengan table desa
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Desa, Kecamatan>
     */
    public function desa()
    {
        return $this->hasOne(Desa::class);
    }

    /**
     * Relasi dengan table kelompok tani
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<KelompokTani, Kecamatan>
     */
    public function kelompokTani()
    {
        return $this->hasMany(KelompokTani::class);
    }
}
