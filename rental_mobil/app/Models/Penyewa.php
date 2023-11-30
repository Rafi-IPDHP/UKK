<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    use HasFactory;
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

    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }
    public function pengembalian() {
        return $this->hasMany(Pengembalian::class);
    }
}
