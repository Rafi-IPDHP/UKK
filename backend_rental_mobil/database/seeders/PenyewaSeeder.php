<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyewa;

class PenyewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyewa = [
            [
                'NIK' => '1092109',
                'nama' => 'penyewa',
                'username' => 'penyewa',
                'email' => 'penyewa@gmail.com',
                'password' => bcrypt('penyewa'),
                'alamat' => 'disini',
                'no_telp' => '08212121',
                'no_telp_darurat' => '0821219090',
            ],
        ];
        foreach($penyewa as $key => $value) {
            Penyewa::create($value);
        }
    }
}
