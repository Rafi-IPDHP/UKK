@cannot('isPenyewa')
<a href="{{ route('mobil.create', ['id' => $tempatRental]) }}">Add Mobil</a>
@endcannot
<table border="1">
    <thead>
        <th>foto rental</th>
        <th>nama rental</th>
        <th>alamat rental</th>
    </thead>
    <tbody>
        <tr>
            <td><img src="{{ $tempatRental->images }}" alt="..." style="width: 200px"></td>
            <td>{{ $tempatRental->nama }}</td>
            <td>{{ $tempatRental->alamat }}</td>
        </tr>
    </tbody>
</table>
<br>
@foreach ($tempatRental->mobil as $mobil)
<table border="1">
    <thead>
        <th>foto mobil</th>
        <th>nama mobil</th>
        <th>jenis mobil</th>
        <th>warna mobil</th>
        <th>harga (per hari)</th>
        <th>stok</th>
        <th>sewa</th>
    </thead>
    <tbody>
        <tr>
            <td><img src="{{ $mobil->images }}" alt="..." style="width: 200px"></td>
            <td>{{ $mobil->nama }}</td>
            <td>{{ $mobil->jenis_mobil }}</td>
            <td>{{ $mobil->warna }}</td>
            <td>{{ $mobil->harga }}</td>
            <td>{{ $mobil->stok }}</td>
            <td><a href="{{ route('sewa.create', ['id' => $tempatRental, 'id_mobil' => $mobil->id]) }}">sewa</a></td>
        </tr>
    </tbody>
</table>
@endforeach
@empty($mobil)
    Ga punya mobil bang
@endempty
<br>
<a href="{{ route('dashboard') }}">Back</a>
