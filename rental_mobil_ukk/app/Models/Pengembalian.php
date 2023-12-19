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
        'mobil_id',
        'peminjaman_id',
        'tanggal_kembali',
        'jam_kembali',
        'bukti_pengembalian'
    ];

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function mobil() {
        return $this->hasMany(Mobil::class, 'id', 'mobil_id');
    }
    public function peminjaman() {
        return $this->hasMany(Peminjaman::class, 'id', 'peminjaman_id');
    }
}
