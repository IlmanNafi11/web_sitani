<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenyuluhTerdaftar extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'kecamatan_id',
    ];
}
