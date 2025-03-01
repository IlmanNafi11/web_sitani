<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyuluh extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     *
     * @var array
     */
    protected $fillable = [
        "user_id",
        "kecamatan_id",
    ];

    /**
     * Relasi dengan table user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Penyuluh>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan table kecamatan
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<kecamatan, Penyuluh>
     */
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class);
    }
}
