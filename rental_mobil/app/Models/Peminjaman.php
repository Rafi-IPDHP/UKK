<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';
    protected $fillable = [
        'user_id',
        'penyewa_id',
        'mobil_id',
        'tanggal_pinjam',
        'jam_pinjam',
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
