<form action="{{ route('pengembalian.store', $dataSewa[0]->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
    <input type="text" name="mobil_id" value="{{ $dataSewa[0]->mobil_id }}" hidden>
    <input type="text" name="peminjaman_id" value="{{ $dataSewa[0]->id }}" hidden>
    <input type="date" name="tanggal_kembali" id="tanggal_kembali"  min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d', strtotime('+1 day'))  }}" hidden>
    <input type="time" name="jam_kembali" id="jam_kembali" value="{{ date('H:i:s', strtotime('+7 hours')) }}" hidden>
    <label for="bukti_pengembalian">Upload Bukti Pengembalian</label><br>
    <input type="file" name="bukti_pengembalian" id="bukti_pengembalian" required>
    <br>
    <p id="rencana_tanggal_kembali" hidden>{{ $dataSewa[0]->rencana_tanggal_kembali }}</p>
    <p id="rencana_jam_kembali" hidden>{{ $dataSewa[0]->rencana_jam_kembali }}</p>
    {{-- @php
        $tanggalMulai = \Carbon\Carbon::parse($dataSewa[0]->rencana_tanggal_kembali);
        $tanggalSelesai = \Carbon\Carbon::parse($peminjaman->rencana_tanggal_kembali);
        $hargaPerHari = $mobil->harga;
        $selisihHari = $tanggalSelesai->diffInDays($tanggalMulai);
        $totalHarga = $selisihHari * $hargaPerHari;
    @endphp --}}
    <p>Denda Waktu : Rp. <span id="denda"></span></p>
    <input type="number" name="denda_waktu" id="denda_waktu" value="{{ number_format($dataSewa[0]->denda_waktu) }}" hidden><br>
    <label for="kondisi">Kondisi</label>
    <select name="kondisi" id="kondisi">
        <option disabled>pilih salah satu</option>
        <option value="baik" {{ $dataSewa[0]->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
        <option value="sedang" {{ $dataSewa[0]->kondisi == 'sedang' ? 'selected' : '' }}>Sedang</option>
        <option value="buruk" {{ $dataSewa[0]->kondisi == 'buruk' ? 'selected' : '' }}>Buruk</option>
    </select><br>
    <label for="denda_kondisi">Denda Kondisi</label>
    <input type="number" name="denda_kondisi" id="denda_kondisi"><br>
    <input type="text" value="sudah dikembalikan" name="status" hidden>
    <button type="submit">Submit</button>
</form>
<a href="{{ route('pengembalian.index') }}">Back</a>

<script>
    let tanggalKembali = document.getElementById('tanggal_kembali')
    let jamKembali = document.getElementById('jam_kembali')
    let rencanaTanggalKembali = document.getElementById('rencana_tanggal_kembali')
    let rencanaJamKembali = document.getElementById('rencana_jam_kembali')
    let dendaWaktu = document.getElementById('denda_waktu')
    let denda = document.getElementById('denda')

    if(rencanaTanggalKembali.innerHTML == tanggalKembali.value) {
        if(rencanaJamKembali.innerHTML >= jamKembali.value) {
            dendaWaktu.value = 0
            denda.innerHTML = '0'
        } else {
            dendaWaktu.value = 10000
            denda.innerHTML = '10.000'
        }
    } else if(rencanaTanggalKembali.innerHTML > tanggalKembali.value) {
        dendaWaktu.value = 0
        denda.innerHTML = '0'
    } else {
        let dateTanggalKembali = tanggalKembali.value.split('-')[2]
        let dateRencanaTanggalKembali = rencanaTanggalKembali.innerHTML.split('-')[2]
        let terlambat = dateTanggalKembali - dateRencanaTanggalKembali
        let total = 10000 * terlambat
        if(rencanaJamKembali.innerHTML >= jamKembali.value) {
            dendaWaktu.value = total + 10000
        }
    }
</script>
