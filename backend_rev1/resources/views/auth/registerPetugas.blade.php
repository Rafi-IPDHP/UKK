<form action="{{ route('auth.store') }}" method="post">
    @csrf
    <input type="number" name="NIK" id="NIK" placeholder="NIK">
    <br>
    <input type="text" name="nama" id="nama" placeholder="nama">
    <br>
    <input type="text" name="username" id="username" placeholder="username">
    <br>
    <input type="email" name="email" id="email" placeholder="email">
    <br>
    <input type="password" name="password" id="password" placeholder="password">
    <br>
    <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="alamat"></textarea>
    <br>
    <input type="number" name="no_telp" id="no_telp" placeholder="no telp">
    <br>
    <input type="number" name="no_telp_darurat" id="no_telp_darurat" placeholder="no telepon darurat">
    <br>
    <input type="text" name="role" id="role" value="petugas" hidden>
    <br>
    <br>
    <button type="submit">Register</button>
</form>
<a href="{{ route('dashboard') }}">Back</a>
