<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobils';
    protected $fillable = [
        'nama',
        'jenis',
        'harga',
        'warna',
        'kondisi',
        'stok',
        'kapasitas',
        'status',
        'denda',
        'images',
    ];

    public function tempatRental() {
        return $this->hasMany(TempatRental::class);
    }
    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }
    public function pengembalian() {
        return $this->hasMany(Pengembalian::class);
    }
}
