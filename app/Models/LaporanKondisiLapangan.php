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
}
