<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Peminjaman;
use App\Models\TempatRental;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index($user_id) {
        $peminjaman = Peminjaman::where('user_id', $user_id)->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create(Mobil $mobil, $id, $id_mobil) {
        // dd([$id, $id_mobil]);
        // dd($id_mobil);
        $tempatRental = TempatRental::where('id', $id)->get();
        $dataMobil = $mobil->where('id', $id_mobil)->get();
        return view('peminjaman.create', compact('tempatRental','dataMobil'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'mobil_id' => 'required',
            'tanggal_pinjam' => 'required',
            'jam_pinjam' => 'required',
            'rencana_tanggal_kembali' => 'required',
            'rencana_jam_kembali' => 'required',
            'denda_waktu' => 'required',
            'denda_kondisi' => 'required',
            'status' => 'required',
        ]);

        $mobil = Mobil::find($request->mobil_id);
        $mobil->stok -= 1;
        $mobil->save();

        Peminjaman::create($request->all());
        return redirect()->route('dashboard');
    }
}
