<form action="{{ route('mobil.store', $dataRental[0]->id) }}" method="post" enctype="multipart/form-data">
@csrf
<input type="text" name="nama" placeholder="nama mobil">
<br>
<label for="jenis_mobil">Jenis Mobil</label>
<select name="jenis_mobil" id="jenis_mobil">
    <option disabled selected>pilih salah satu</option>
    <option value="suv">SUV</option>
    <option value="mpv">MPV</option>
    <option value="crossover">Crossover</option>
    <option value="hatchback">Hatchback</option>
    <option value="sedan">Sedan</option>
    <option value="convertible">Convertible</option>
</select>
<br>
<input type="number" name="harga" placeholder="harga">
<br>
<input type="text" name="warna" placeholder="warna">
<br>
<label for="kondisi">Kondisi</label>
<select name="kondisi" id="kondisi">
    <option disabled selected>pilih salah satu</option>
    <option value="baik">Baik</option>
    <option value="sedang">Sedang</option>
    <option value="buruk">Buruk</option>
</select>
<br>
<input type="number" name="stok" id="stok" placeholder="stok" onchange="changeTotal()">
<input type="number" name="total_mobil" id="total_mobil" placeholder="total mobil" hidden>
<br>
{{-- <select name="status" id="status" hidden>
    <option value="dipinjam">Dipinjam</option>
    <option value="tidak dipinjam" selected>Tidak Dipinjam</option>
</select> --}}
{{-- <input type="number" name="denda" value="0" hidden>
<input type="number" name="denda_kondisi" value="0" hidden> --}}
<input type="file" name="images">
<input type="hidden" name="tempat_rental_id" value="{{ $dataRental[0]->id }}">
<br>
<br>
<button type="submit">Submit</button>
</form>
<a href="{{ route('tempat-rental.show', $dataRental[0]->id) }}">Back</a>

<script>
    changeTotal = () => {
        let stok = document.getElementById('stok').value;
        document.getElementById('total_mobil').value = stok;
    }
</script>

