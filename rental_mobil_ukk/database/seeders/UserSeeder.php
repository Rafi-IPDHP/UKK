<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'NIK' => '1092109',
                'nama' => 'penyewa',
                'username' => 'penyewa',
                'email' => 'penyewa@gmail.com',
                'password' => bcrypt('penyewa'),
                'alamat' => 'disini',
                'no_telp' => '08212121',
                'no_telp_darurat' => '08909090',
                'role' => 'penyewa'
            ],
            [
                'NIK' => '2929108',
                'nama' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'alamat' => 'disitu',
                'no_telp' => '2121271',
                'no_telp_darurat' => '7171721',
                'role' => 'admin'
            ],
            [
                'NIK' => '7777777',
                'nama' => 'petugas',
                'username' => 'petugas',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('petugas'),
                'alamat' => 'disono',
                'no_telp' => '888888',
                'no_telp_darurat' => '999999',
                'role' => 'petugas'
            ],
        ];
        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
