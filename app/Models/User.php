<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    // RELASI MEDIA (FOTO PROFIL)
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'id')
                    ->where('ref_table', 'users');
    }

    // ✅ helper ambil 1 foto profil
    public function photo()
    {
        return $this->media()->orderBy('sort_order')->first();
    }
}
