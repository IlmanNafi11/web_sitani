<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Filament\Facades\Filament;
use Filament\Models\Contracts\HasName;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasName
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Mendapatkan nama user yang saat ini login
     * 
     * @link https://filamentphp.com/docs/3.x/panels/users#configuring-the-users-name-attribute
     * @return string
     */
    public function getFilamentName(): string
    {
        $user = Filament::auth()->user();
        return $user?->admin?->nama ?? 'User';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi dengan table penyuluh
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Penyuluh, User>
     */
    public function penyuluh()
    {
        return $this->hasOne(Penyuluh::class);
    }

    /**
     * Relasi dengan table admin
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Admin, User>
     */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }
}
