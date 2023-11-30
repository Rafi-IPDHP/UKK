<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalians';
    protected $fillable = [
        'user_id',
        'penyewa_id',
        'mobil_id',
        'peminjaman_id',
        'tanggal_kembali',
        'jam_kembali',
    ];

    public function user() {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    public function penyewa() {
        return $this->hasMany(Penyewa::class, 'penyewa_id', 'id');
    }
    public function mobil() {
        return $this->hasMany(Mobil::class, 'mobil_id', 'id');
    }
}
