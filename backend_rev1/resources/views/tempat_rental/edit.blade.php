<form action="{{ route('tempat-rental.update', $tempatRental->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nama" value="{{ $tempatRental->nama }}">
    <input type="number" name="no_telp" value="{{ $tempatRental->no_telp }}">
    <textarea name="alamat" cols="30" rows="10">{{ $tempatRental->alamat }}</textarea>
    <img src="{{ $tempatRental->images }}" alt="..." style="width: 150px; height: 150px;">
    <input type="file" name="images" id="images">
    <button type="submit">KIRIM</button>
</form>
<a href="{{ route('dashboard') }}">Back</a>
