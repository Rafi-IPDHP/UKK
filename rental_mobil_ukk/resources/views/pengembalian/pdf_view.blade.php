<h1 style="text-align: center">Data Peminjaman</h1><br>
<table border="1" style="border-collapse: collapse; border: 1px solid black;">
    <thead>
        <th>ID Peminjaman</th>
        <th>Penyewa</th>
        <th>No Telp Penyewa</th>
        <th>Nama Mobil</th>
        <th>Jenis Mobil</th>
        <th>Tanggal Pinjam</th>
        <th>Jam Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Jam Kembali</th>
        <th>Status</th>
        <th>Harga</th>
    </thead>
    <tbody>
        @foreach ($data as $peminjaman)
        <tr>
            <td>{{ $peminjaman->id }}</td>
            @forelse ($peminjaman->user as $user)
                <td>{{ $user->nama }}</td>
                <td>{{ $user->no_telp }}</td>
            @empty
                kosong
            @endforelse
            @forelse ($peminjaman->mobil as $mobil)
                <td>{{ $mobil->nama }}</td>
                <td>{{ $mobil->jenis_mobil }}</td>
            @empty
                kosong
            @endforelse
            <td>{{ $peminjaman->tanggal_pinjam }}</td>
            <td>{{ $peminjaman->jam_pinjam }}</td>
            <td>{{ $peminjaman->rencana_tanggal_kembali }}</td>
            <td>{{ $peminjaman->rencana_jam_kembali }}</td>
            <td>{{ $peminjaman->status }}</td>
            @forelse ($peminjaman->mobil as $mobil)
                <td>Rp. {{ number_format($mobil->harga) }}</td>
            @empty
                kosong
            @endforelse
        </tr>
        @endforeach
    </tbody>
</table>
