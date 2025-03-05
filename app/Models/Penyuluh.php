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
        "penyuluh_terdaftar_id",
        "path_profil",
    ];

    /**
     * Relasi dengan table user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Penyuluh>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
