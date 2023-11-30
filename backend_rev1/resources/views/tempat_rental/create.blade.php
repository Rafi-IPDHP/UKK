<form action="{{ route('tempat-rental.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama" placeholder="nama">
    <input type="number" name="no_telp" placeholder="no_telp">
    <textarea name="alamat" cols="30" rows="10" placeholder="alamat"></textarea>
    <input type="file" name="images" id="images">
    <button type="submit">KIRIM</button>
</form>
<a href="{{ route('dashboard') }}">Back</a>
