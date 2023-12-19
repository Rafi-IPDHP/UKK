<?php

namespace App\Http\Controllers;

use App\Models\TempatRental;
use Illuminate\Http\Request;

class TempatRentalController extends Controller
{
    public function index() {
        $tempat_rentals = TempatRental::all();
        return view('tempat_rental.index', compact('tempat_rentals'));
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

        return redirect()->route('tempat-rental.index');
    }

    public function show(Request $request, TempatRental $tempatRental) {
        return view('tempat_rental.show', compact('tempatRental'));
    }

    public function edit(TempatRental $tempatRental) {
        return view('tempat_rental.edit', compact('tempatRental'));
    }

    public function update(Request $request, TempatRental $tempatRental) {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'images' => 'sometimes',
        ]);

        $file = $request->file('images');
        if ($file) {
            $result = CloudinaryStorage::replace($tempatRental->image, $file->getRealPath(), $file->getClientOriginalName());
            $tempatRental->update([
                'images' => $result->getSecurePath(),
            ]);
        }
        // $result = CloudinaryStorage::replace($tempatRental->image, $file->getRealPath(), $file->getClientOriginalName());
        $tempatRental->update([
            'nama' => $request->input('nama'),
            'no_telp' => $request->input('no_telp'),
            'alamat' => $request->input('alamat'),
            // 'images' => $result->getSecurePath(),
        ]);

        return redirect()->route('tempat-rental.index');
    }

    public function destroy(TempatRental $tempatRental) {
        $tempatRental->delete();
        return redirect()->route('tempat-rental.index');
    }
}
