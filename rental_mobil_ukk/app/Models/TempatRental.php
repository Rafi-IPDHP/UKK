<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatRental extends Model
{
    use HasFactory;
    protected $table = 'tempat_rentals';
    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'images',
    ];

    public function mobil() {
        return $this->hasMany(Mobil::class, 'tempat_rental_id');
    }
}
