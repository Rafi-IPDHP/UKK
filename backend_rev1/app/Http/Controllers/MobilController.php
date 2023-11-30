<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\TempatRental;

class MobilController extends Controller
{
    public function create(TempatRental $tempatRental, $id) {
        $dataRental = $tempatRental->where('id', $id)->get();
        return view('mobil.create', compact('dataRental'));
    }

    public function store(Mobil $mobil, Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'jenis_mobil' => 'required',
            'harga' => 'required',
            'warna' => 'required',
            'kondisi' => 'required',
            'stok' => 'required',
            'total_mobil' => 'required',
            'images' => 'required',
            'tempat_rental_id' => 'required',
        ]);

        $image = $request->file('images');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

        $mobil->create([
            'nama' => $request['nama'],
            'jenis_mobil' => $request['jenis_mobil'],
            'harga' => $request['harga'],
            'warna' => $request['warna'],
            'kondisi' => $request['kondisi'],
            'stok' => $request['stok'],
            'total_mobil' => $request['total_mobil'],
            'images' => $result->getSecurePath(),
            'tempat_rental_id' => $request['tempat_rental_id'],
        ]);

        return redirect()->route('tempat-rental.show', $id);
    }
}
