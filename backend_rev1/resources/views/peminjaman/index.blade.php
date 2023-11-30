<table border="1">
    <thead>
        <th>ID Peminjaman</th>
        <th>Nama Mobil</th>
        <th>Jenis Mobil</th>
        <th>Foto Mobil</th>
        <th>Nama Rental Mobil</th>
        <th>Tanggal Pinjam</th>
        <th>Jam Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Jam Kembali</th>
        <th>Status</th>
        <th>Harga</th>
    </thead>
    <tbody>
        @foreach ($peminjaman as $peminjaman)
            <tr>
                <td>{{ $peminjaman->id }}</td>
            @forelse ($peminjaman->mobil as $mobil)
                <td>{{ $mobil->nama }}</td>
                <td>{{ $mobil->jenis_mobil }}</td>
                <td><img src="{{ $mobil->images }}" alt="..." style="width: 200px"></td>
                    @forelse ($mobil->tempatRental as $tempatRental)
                        <td>{{ $tempatRental->nama }}</td>
                    @empty
                        kooosong
                    @endforelse
                @empty
                    <td>lahhh koosoongggg</td>
                @endforelse
                <td>{{ $peminjaman->tanggal_pinjam }}</td>
                <td>{{ $peminjaman->jam_pinjam }}</td>
                <td>{{ $peminjaman->rencana_tanggal_kembali }}</td>
                <td>{{ $peminjaman->rencana_jam_kembali }}</td>
                <td>{{ $peminjaman->status }}</td>
                @forelse ($peminjaman->mobil as $mobil)
                @php
                    $tanggalMulai = \Carbon\Carbon::parse($peminjaman->tanggal_pinjam);
                    $tanggalSelesai = \Carbon\Carbon::parse($peminjaman->rencana_tanggal_kembali);

                    $hargaPerHari = $mobil->harga;
                    $selisihHari = $tanggalSelesai->diffInDays($tanggalMulai);
                    $totalHarga = $selisihHari * $hargaPerHari;
                @endphp
                @empty
                kosong
                @endforelse
                    <td>Rp. {{ number_format($totalHarga) }}</td>
            </tr>
        @endforeach
        @empty($peminjaman->tanggal_pinjam)
            <td colspan="11" style="text-align: center">kosoongg</td>
        @endempty
    </tbody>
</table>
<a href="{{ route('dashboard') }}">Back</a>
