<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibitBerkualitas extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        'nama',
        'komoditas_id',
        'deskripsi',
    ];
}
