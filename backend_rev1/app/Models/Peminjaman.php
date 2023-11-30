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
        'mobil_id',
        'tanggal_pinjam',
        'jam_pinjam',
        'rencana_tanggal_kembali',
        'rencana_jam_kembali',
        'denda_waktu',
        'denda_kondisi',
        'status',
    ];

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function mobil() {
        return $this->hasMany(Mobil::class, 'id', 'mobil_id');
    }
}
