<h1>Lagi Dipinjam</h1><br>
<table border="1">
    <thead>
        <th>ID Peminjaman</th>
        <th>NIK</th>
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
        <th>Data Penyewa</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($peminjamans as $peminjaman)
        <tr>
            <td>{{ $peminjaman->id }}</td>
            @forelse ($peminjaman->user as $user)
                <td>{{ $user->NIK }}</td>
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
            @forelse ($peminjaman->user as $user)
                <td><a href="{{ route('user', $user->id) }}">Data Penyewa</a></td>
            @empty
                kosong
            @endforelse
            <td><a href="{{ route('pengembalian.create', $peminjaman->id) }}">Pengembalian</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
<h1>Udah Dibalikin</h1><br>
<table border="1">
    <thead>
        <th>Jajal doang</th>
    </thead>
    <tbody>
        @foreach ($pengembalians as $pengembalian)
        <tr>
            <td>{{ $pengembalian->tanggal_kembali }}</td>
        </tr>
        @endforeach
        @empty($pengembalian)
            <td>lahh kosoongg</td>
        @endempty
    </tbody>
</table>
<br>
<a href="{{ route('dashboard') }}">Back</a>
<br>
<a href="{{ URL::to('/pdf') }}">Export to PDF</a>
