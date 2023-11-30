@if (Auth::check())
<a href="{{ route('logout') }}">Logout</a>
@else
<a href="{{ route('auth.login') }}">Login</a>
<br>
<a href="{{ route('auth.register') }}">Register</a>
@endif
@can('isAdmin')
<h1>INI ADMIN</h1>
<a href="{{ route('auth.registerPetugas') }}">Register Petugas</a>
<br>
<a href="{{ route('tempat-rental.create') }}">Add Tempat Rental</a>
<br>
<a href="{{ route('pengembalian.index') }}">Form Pengembalian</a>
@elsecan('isPetugas')
<h1>INI PETUGAS</h1>
<a href="{{ route('tempat-rental.create') }}">Add Tempat Rental</a>
<br>
<a href="{{ route('pengembalian.index') }}">Form Pengembalian</a>
@elsecan('isPenyewa')
<h1>INI PENYEWA</h1>
@endcan
<table border="1">
    <thead>
        <tr>
            <th>foto rental</th>
            <th>nama rental</th>
            <th>no telp rental</th>
            <th>alamat rental</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tempat_rentals as $tempat_rental)
        <tr>
            <td><img src="{{ $tempat_rental->images }}" alt="..." style="width: 170px; height: 170px; border-radius: 100px"></td>
            <td>{{ $tempat_rental->nama }}</td>
            <td>{{ $tempat_rental->no_telp }}</td>
            <td>{{ $tempat_rental->alamat }}</td>
            <td>
                <a href="{{ route('tempat-rental.show', $tempat_rental->id) }}">show</a>
                @can('isAdmin')
                <a href="{{ route('tempat-rental.edit', $tempat_rental->id) }}">Edit</a>
                <form action="{{ route('tempat-rental.destroy', $tempat_rental->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
@if (Auth::check())
<a href="{{ route('sewa.index', Auth::user()->id) }}">History Peminjaman</a>
@else
<a href="{{ route('auth.login') }}">Peminjaman Anda</a>
@endif
