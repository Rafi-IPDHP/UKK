<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Penyewa extends Model
{
    use HasFactory, HasFactory, Notifiable;
    protected $table = 'penyewas';
    protected $fillable = [
        'NIK',
        'nama',
        'username',
        'email',
        'password',
        'alamat',
        'no_telp',
        'no_telp_darurat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAuthPassword()
    {
     return $this->password;
    }

    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }
    public function pengembalian() {
        return $this->hasMany(Pengembalian::class);
    }
}
