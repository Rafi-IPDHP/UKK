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
        'jenis_mobil',
        'harga',
        'warna',
        'kondisi',
        'stok',
        'total_mobil',
        'images',
        'tempat_rental_id',
    ];

    public function tempatRental() {
        return $this->hasMany(TempatRental::class, 'id', 'tempat_rental_id');
    }
    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }
    public function pengembalian() {
        return $this->hasMany(Pengembalian::class);
    }
}
