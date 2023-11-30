<form action="{{ route('sewa.store', ['id' => $tempatRental[0]->id, 'id_mobil' => $dataMobil[0]->id]) }}" method="post">
    @csrf
    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
    <input type="text" name="mobil_id" value="{{ $dataMobil[0]->id }}" hidden>
    <label for="tanggal_pinjam">Tanggal pinjam</label>
    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" onchange="gantiTanggal()">
    <br>
    <label for="jam_pinjam">Jam pinjam</label>
    <select name="jam_pinjam" id="jam_pinjam" onchange="rencanaJamKembali()">
        <option disabled selected>pilih jam pinjam</option>
        <option value="00:00:00">00:00:00</option>
        <option value="01:00:00">01:00:00</option>
        <option value="02:00:00">02:00:00</option>
        <option value="03:00:00">03:00:00</option>
        <option value="04:00:00">04:00:00</option>
        <option value="05:00:00">05:00:00</option>
        <option value="06:00:00">06:00:00</option>
        <option value="07:00:00">07:00:00</option>
        <option value="08:00:00">08:00:00</option>
        <option value="09:00:00">09:00:00</option>
        <option value="10:00:00">10:00:00</option>
        <option value="11:00:00">11:00:00</option>
        <option value="12:00:00">12:00:00</option>
        <option value="13:00:00">13:00:00</option>
        <option value="14:00:00">14:00:00</option>
        <option value="15:00:00">15:00:00</option>
        <option value="16:00:00">16:00:00</option>
        <option value="17:00:00">17:00:00</option>
        <option value="18:00:00">18:00:00</option>
        <option value="19:00:00">19:00:00</option>
        <option value="20:00:00">20:00:00</option>
        <option value="21:00:00">21:00:00</option>
        <option value="22:00:00">22:00:00</option>
        <option value="23:00:00">23:00:00</option>
    </select>
    <br>
    <label for="rencana_tanggal_kembali">Tanggal Kembali</label>
    <input type="date" name="rencana_tanggal_kembali" id="rencana_tanggal_kembali" min="" onchange="gantiTanggal()">
    <br>
    <label for="rencana_jam_kembali">Jam Kembali</label>
    <input type="text" name="rencana_jam_kembali" id="rencana_jam_kembali" disabled>
    <br>
    <input type="number" name="denda_waktu" value="0" hidden>
    <input type="number" name="denda_kondisi" value="0" hidden>
    <input type="text" name="status" value="belum dikembalikan" hidden>
    <label for="harga">Harga : <p id="harga"></p></label>
    <p id="hargaPhp" hidden>{{ $dataMobil[0]->harga }}</p>
    <br>
    <br>
    <button type="submit">Sewa</button>
</form>
<a href="{{ route('tempat-rental.show', $tempatRental[0]->id) }}">Back</a>

<script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
<script>
    let harga = document.getElementById('harga');
    let hargaPhp = document.getElementById('hargaPhp').innerHTML;
    let jamPinjamSelect = document.getElementById('jam_pinjam');
    let tanggalPinjamInput = document.getElementById('tanggal_pinjam');
    let jamKembali = document.getElementById('rencana_jam_kembali')
    let tanggalKembali = document.getElementById('rencana_tanggal_kembali')
    let currentHour = new Date().getHours();
    let hour = currentHour + 1

    let today = new Date()
    let year = today.getFullYear();
    let month = String(today.getMonth() + 1).padStart(2, '0');
    let day = String(today.getDate()).padStart(2, '0');
    let hariIni = `${year}-${month}-${day}`

    const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
        }).format(number);
    }

    function disablePastHours() {
        for (let i = 0; i < jamPinjamSelect.options.length; i++) {
            let optionHour = parseInt(jamPinjamSelect.options[i].value.split(':')[0]);
            if (optionHour < hour) {
                jamPinjamSelect.options[i].disabled = true;
            } else {
                jamPinjamSelect.options[i].disabled = false;
            }
        }
    }

    let gantiTanggal = () => {
        if(tanggalPinjamInput.value == hariIni) {
            disablePastHours();
        } else {
            for (let i = 0; i < jamPinjamSelect.options.length; i++) {
                jamPinjamSelect.options[i].disabled = false;
            }
        }

        let startDate = new Date($('#tanggal_pinjam').val());
        let endDate = new Date($('#rencana_tanggal_kembali').val());
        let minEndDate = new Date(startDate);

        minEndDate.setDate(minEndDate.getDate() + 1); // minimal 1 hari setelah startDate
        let minEndDateString = minEndDate.toISOString().split('T')[0];
        tanggalKembali.min = minEndDateString

        if(startDate >= endDate) {
            tanggalKembali.value = minEndDateString
        }

        const diffTime = Math.abs(endDate - startDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        // console.log(diffTime + " milliseconds");
        // console.log(diffDays + " days");

        if(diffDays == 0) {
            harga.innerHTML = rupiah(hargaPhp)
        } else if(diffDays > 0) {
            harga.innerHTML = rupiah(hargaPhp * diffDays)
        } else {
            harga.innerHTML = 0
        }
    }

    let rencanaJamKembali = () => {
        jamKembali.value = jamPinjamSelect.value
    }

    gantiTanggal()
</script>
