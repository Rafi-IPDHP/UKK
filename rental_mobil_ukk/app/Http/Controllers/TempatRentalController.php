<?php

namespace App\Http\Controllers;

use App\Models\TempatRental;
use App\Models\Mobil;
use Illuminate\Http\Request;

class TempatRentalController extends Controller
{
    public function all() {
        $tempat_rentals = TempatRental::all();
        return view('tempat_rental.index', compact('tempat_rentals'));
    }

    public function index() {
        $tempat_rentals = TempatRental::latest()->take(3)->get();
        $mobils = Mobil::orderBy('stok', 'desc')->take(3)->get();
        return view('beranda', compact('tempat_rentals', 'mobils'));
    }

    public function create() {
        return view('tempat_rental.create');
    }

    public function store(Request $request, TempatRental $tempatRental) {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'images' => 'required',
        ]);
        $image = $request->file('images');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

        $tempatRental->create([
            'nama' => $request->input('nama'),
            'no_telp' => $request->input('no_telp'),
            'alamat' => $request->input('alamat'),
            'images' => $result->getSecurePath(),
        ]);

        return redirect()->route('tempat-rental.all');
    }

    public function show(Request $request, $tempatRental) {
        $tempat_rental = TempatRental::where('id', $tempatRental)->get();
        // $mobil = mobil::where('tempat_rental_id', $tempatRental)->get();
        return view('tempat_rental.show', compact('tempat_rental'));
    }

    public function edit(TempatRental $tempatRental, $id) {
        $dataRental = $tempatRental->where('id', $id)->get();
        return view('tempat_rental.edit', compact('dataRental'));
    }

    public function update(Request $request, $id) {
        $tempatRental = TempatRental::where('id', $id)->get();
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'images' => 'sometimes',
        ]);
        // dd($request);

        $file = $request->file('images');
        if ($file) {
            $result = CloudinaryStorage::replace($tempatRental[0]->image, $file->getRealPath(), $file->getClientOriginalName());
            $tempatRental[0]->update([
                'images' => $result->getSecurePath(),
            ]);
        }
        // $result = CloudinaryStorage::replace($tempatRental->image, $file->getRealPath(), $file->getClientOriginalName());
        $tempatRental[0]->update([
            'nama' => $request->input('nama'),
            'no_telp' => $request->input('no_telp'),
            'alamat' => $request->input('alamat'),
            // 'images' => $result->getSecurePath(),
        ]);

        return redirect()->route('tempat-rental.all');
    }

    public function destroy(TempatRental $tempatRental) {
        $tempatRental->delete();
        return redirect()->route('tempat-rental.all');
    }
}
