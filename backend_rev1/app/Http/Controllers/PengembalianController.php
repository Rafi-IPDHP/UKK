<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Mobil;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;

class PengembalianController extends Controller
{
    public function index() {
        $peminjamans = Peminjaman::where('status', 'belum dikembalikan')->get();
        $pengembalians = Pengembalian::all();
        return view('pengembalian.index', compact('peminjamans', 'pengembalians'));
    }

    public function create($sewa_id) {
        $dataSewa = Peminjaman::where('id', $sewa_id)->get();
        return view('pengembalian.create', compact('dataSewa'));
    }

    public function store(Request $request, Pengembalian $pengembalian) {
        $request->validate([
            'user_id' => 'required',
            'mobil_id' => 'required',
            'peminjaman_id' => 'required',
            'tanggal_kembali' => 'required',
            'jam_kembali' => 'required',
            'bukti_pengembalian' => 'required',
            'denda_waktu' => 'required',
            'kondisi' => 'required',
            'denda_kondisi' => 'required',
            'status' => 'required',
        ]);

        $image = $request->file('bukti_pengembalian');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

        $pengembalian->create([
            'user_id' => $request->input('user_id'),
            'mobil_id' => $request->input('mobil_id'),
            'peminjaman_id' => $request->input('peminjaman_id'),
            'tanggal_kembali' => $request->input('tanggal_kembali'),
            'jam_kembali' => $request->input('jam_kembali'),
            'bukti_pengembalian' => $result->getSecurePath(),
        ]);

        $peminjaman = Peminjaman::find($request->peminjaman_id);
        $peminjaman->denda_waktu = $request->denda_waktu;
        $peminjaman->denda_kondisi = $request->denda_kondisi;
        $peminjaman->status = $request->status;
        $peminjaman->save();

        $mobil = Mobil::find($request->mobil_id);
        $mobil->kondisi = $request->kondisi;
        $mobil->stok += 1;
        $mobil->save();

        return redirect()->route('pengembalian.index');
    }

    public function createPDF() {
        // retrieve all records from db
        $data = Peminjaman::all();

        // Convert the collection to an array
        $dataArray = $data->toArray();

        // share data to view
        view()->share('data', $data);

        // Use $dataArray instead of $data
        $pdf = PDF::loadView('pengembalian.pdf_view', $dataArray);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
