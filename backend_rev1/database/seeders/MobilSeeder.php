<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobils = [
            [
                'nama' => 'mobil 1',
                'jenis_mobil' => 'suv',
                'harga' => 200000,
                'warna' => 'hitam',
                'kondisi' => 'baik',
                'stok' => 2,
                'total_mobil' => 2,
                // 'status' => 'tidak dipinjam',
                // 'denda' => 0,
                // 'denda_kondisi' => 0,
                'images' => 'https://res.cloudinary.com/dtgq4lj3c/image/upload/v1699850786/backend_rev1/2023-11-13_044623_mobil1.webp',
                'tempat_rental_id' => 2,
            ],
            [
                'nama' => 'mobil 2',
                'jenis_mobil' => 'mpv',
                'harga' => 300000,
                'warna' => 'putih',
                'kondisi' => 'baik',
                'stok' => 3,
                'total_mobil' => 3,
                // 'status' => 'tidak dipinjam',
                // 'denda' => 0,
                // 'denda_kondisi' => 0,
                'images' => 'https://res.cloudinary.com/dtgq4lj3c/image/upload/v1699924232/backend_rev1/mobil2_a6nlon.jpg',
                'tempat_rental_id' => 2,
            ],
        ];
        foreach($mobils as $key => $value) {
            Mobil::create($value);
        }
    }
}
