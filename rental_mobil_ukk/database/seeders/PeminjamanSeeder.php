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
                'tanggal_pinjam' => '2023-12-11',
                'jam_pinjam' => '12:00:00',
                'rencana_tanggal_kembali' => '2023-12-14',
                'rencana_jam_kembali' => '12:00:00',
                'denda_waktu' => 0,
                'denda_kondisi' => 0,
                'status' => 'belum dikembalikan',
            ],
            [
                'user_id' => 3,
                'mobil_id' => 1,
                'tanggal_pinjam' => '2023-12-12',
                'jam_pinjam' => '12:00:00',
                'rencana_tanggal_kembali' => '2023-12-13',
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
