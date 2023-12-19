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

    public function destroy($tempatRental_id, $mobil_id) {
        $mobil = Mobil::findOrFail($mobil_id);

    // Periksa apakah mobil dimiliki oleh tempat rental yang sesuai
    if ($mobil->tempat_rental_id == $tempatRental_id) {
        // Hapus mobil
        $mobil->delete();

        // Redirect dengan pesan sukses atau sesuaikan sesuai kebutuhan
        return redirect()->route('tempat-rental.show', $tempatRental_id)->with('success', 'Mobil berhasil dihapus.');
    } else {
        // Jika mobil tidak dimiliki oleh tempat rental yang sesuai, mungkin hendaknya ada pesan kesalahan atau tindakan lainnya
        return redirect()->route('tempat-rental.show', $tempatRental_id)->with('error', 'Tidak dapat menghapus mobil. Mobil tidak dimiliki oleh tempat rental yang sesuai.');
    }
    }
}
