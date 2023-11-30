<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peminjaman = [
            [
                'user_id' => 2,
                'mobil_id' => 2,
                'tanggal_pinjam' => '2023-11-18',
                'jam_pinjam' => '12:00:00',
                'rencana_tanggal_kembali' => '2023-11-19',
                'rencana_jam_kembali' => '12:00:00',
                'denda_waktu' => 0,
                'denda_kondisi' => 0,
                'status' => 'belum dikembalikan',
            ],
            [
                'user_id' => 3,
                'mobil_id' => 1,
                'tanggal_pinjam' => '2023-11-20',
                'jam_pinjam' => '18:00:00',
                'rencana_tanggal_kembali' => '2023-11-22',
                'rencana_jam_kembali' => '12:00:00',
                'denda_waktu' => 0,
                'denda_kondisi' => 0,
                'status' => 'belum dikembalikan',
            ],
        ];

        foreach($peminjaman as $key => $value) {
            Peminjaman::create($value);
        }
    }
}
