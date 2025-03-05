<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * Tambahkan attribute yang dapat dimass assigment kedalam array fillable
     * @var array
     */
    protected $fillable = [
        'name',
        'no_hp',
        'alamat',
        'user_id',
    ];

    /**
     * Relasi dengan table user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Admin>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
