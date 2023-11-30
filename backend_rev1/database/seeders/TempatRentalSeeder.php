<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TempatRental;

class TempatRentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tempat_rental = [
            [
                'nama' => 'rental 1',
                'no_telp' => '00998877',
                'alamat' => 'ini alamat',
                'images' => 'https://res.cloudinary.com/dtgq4lj3c/image/upload/v1699811247/backend_rev1/2023-11-12_174727_hisoka.jpg'
            ],
            [
                'nama' => 'rental 2',
                'no_telp' => '78787878',
                'alamat' => 'dimana aja boleh',
                'images' => 'https://res.cloudinary.com/dtgq4lj3c/image/upload/v1699844105/backend_rev1/2023-11-13_025502_Dazai_Osamu.jpg'
            ],
        ];
        foreach($tempat_rental as $key => $value) {
            TempatRental::create($value);
        }
    }
}
