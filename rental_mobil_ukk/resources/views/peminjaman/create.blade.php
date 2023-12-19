@extends('template.master')
@section('title', '| Penyewaan')
@push('css')
<style>
    .rencana_jam_kembali {
        background-color: #952323;
        color: #ffffff;
        height: 50px;
    }

    .rencana_jam_kembali::placeholder {
        color: #ffffff;
    }

    .rencana_jam_kembali:focus {
        background-color: #952323;
        color: #ffffff;
    }

    .rencana_jam_kembali:disabled {
        background-color: rgba(149, 35, 35, 0.8);
    }

    .myNav {
        background: transparent;
        transition: 0.3s ease-in-out;
        position: sticky;
    }

    .nav-active {
        background: rgba(218, 212, 181, 0.93);
        border-radius: 0px 0px 10px 10px;
    }

    .navbar-nav {
        background-color: #952323;
        font-family: 'poppins';
    }

    @media (max-width: 960px) {
        .navbar-nav {
            background: transparent;
        }

        .nav-item {
            background-color: #952323;
            padding: 5px;
            padding-left: 10px;
            border-radius: 10px;
        }
    }

    .scale-up-center {
        -webkit-animation: scale-up-center 0.3s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
            animation: scale-up-center 0.3s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
    }

    @-webkit-keyframes scale-up-center {
        0% {
            -webkit-transform: scale(0.5);
                    transform: scale(0.5);
        }
        100% {
            -webkit-transform: scale(1);
                    transform: scale(1);
        }
    }
    @keyframes scale-up-center {
        0% {
            -webkit-transform: scale(0.5);
                transform: scale(0.5);
        }
        100% {
            -webkit-transform: scale(1);
                transform: scale(1);
        }
    }
</style>
@endpush
@section('content')
    <!-- navbar start -->
    @include('template.components.navbar')
  <!-- navbar end -->

  <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-5">
            <p class="fs-3 py-3 rounded-3 text-white text-center fw-semibold mt-5" style="background-color: #952323; font-family: 'poppins';">Form Penyewaan</p>
        </div>
        <form action="{{ route('sewa.store', ['id' => $tempatRental[0]->id, 'id_mobil' => $dataMobil[0]->id]) }}" method="post">
            @csrf
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
            <input type="text" name="mobil_id" value="{{ $dataMobil[0]->id }}" hidden>
            <div class="col-md-12 col-sm-5 mb-3 d-flex flex-column justify-content-center align-items-center">
                <label for="tanggal_pinjam" class="form-label text-center fs-5 fw-semibold" style="color: #952323;">Tanggal Sewa</label>
                <input type="date" name="tanggal_pinjam" class="form-control w-75" style="background-color: #952323; color: #ffffff; color-scheme: dark; height: 50px;" id="tanggal_pinjam" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" onchange="gantiTanggal()">
            </div>
            <div class="col-md-12 col-sm-5 mb-3 d-flex flex-column justify-content-center align-items-center">
                <label for="jam_pinjam" class="form-label text-center fs-5 fw-semibold" style="color: #952323;">Jam Sewa</label>
                <select name="jam_pinjam" class="form-select w-75" style="height: 50px; background-color: #952323; color: #ffffff; background-image: none;" id="jam_pinjam" onchange="rencanaJamKembali()" required>
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
            </div>
            <div class="col-md-12 col-sm-5 mb-3 d-flex flex-column justify-content-center align-items-center">
                <label for="rencana_tanggal_kembali" class="form-label text-center fs-5 fw-semibold" style="color: #952323;">Tanggal Kembali</label>
                <input type="date" name="rencana_tanggal_kembali" class="form-control w-75" style="background-color: #952323; color: #ffffff; color-scheme: dark; height: 50px;" id="rencana_tanggal_kembali" onchange="gantiTanggal()" required>
            </div>
            <div class="col-md-12 col-sm-5 mb-3 d-flex flex-column justify-content-center align-items-center">
                <label for="balik" class="form-label text-center fs-5 fw-semibold" style="color: #952323;">Jam Kembali</label>
                <input type="text" class="form-control rencana_jam_kembali w-75" id="balik" placeholder="00:00:00" disabled>
            </div>
            <div class="col-md-12 col-sm-5 mb-3 d-flex flex-column justify-content-center align-items-center">
                <label for="harga" class="form-label text-center fs-5 fw-semibold" style="color: #952323;">Harga</label>
                <input type="text" class="form-control rencana_jam_kembali w-75" id="harga" placeholder="Rp. 0" disabled>
            </div>
            <select name="rencana_jam_kembali" id="rencana_jam_kembali" onchange="rencanaJamKembali()" hidden>
                <option disabled>pilih jam pinjam</option>
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
            <input type="number" name="denda_waktu" value="0" hidden>
            <input type="number" name="denda_kondisi" value="0" hidden>
            <input type="text" name="status" value="belum dikembalikan" hidden>
            <p id="hargaPhp" hidden>{{ $dataMobil[0]->harga }}</p>
            <div class="col-md-12 col-sm-5 my-5 d-flex flex-column justify-content-center align-items-center">
                <button type="submit" class="btn text-white fw-semibold px-5 py-2 fs-5" style="background-color: #952323; font-family: 'poppins';">Sewa</button>
            </div>
        </form>
      </div>
  </div>
@endsection
@push('script')
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script>
    const navbar = document.querySelector('.myNav');

    window.onscroll = () => {
        if (window.scrollY > 10) {
            navbar.classList.add('nav-active');
        } else {
            navbar.classList.remove('nav-active');
        }
    };
    bgShow = () => {
        navbar.classList.toggle('nav-active');
    }

    const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
        }).format(number);
    }

    let currentHour = new Date().getHours();
    let hour = currentHour + 1
    let today = new Date()
    let year = today.getFullYear();
    let month = String(today.getMonth() + 1).padStart(2, '0');
    let day = String(today.getDate()).padStart(2, '0');
    let hariIni = `${year}-${month}-${day}`

    let harga = document.getElementById('harga');
    let hargaPhp = document.getElementById('hargaPhp').innerHTML;
    let jamPinjamSelect = document.getElementById('jam_pinjam');
    let tanggalPinjamInput = document.getElementById('tanggal_pinjam');
    let jamKembali = document.getElementById('rencana_jam_kembali')
    let tanggalKembali = document.getElementById('rencana_tanggal_kembali')
    let balik = document.getElementById('balik')

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
        console.log(startDate)
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
            harga.value = rupiah(hargaPhp)
        } else if(diffDays > 0) {
            harga.value = rupiah(hargaPhp * diffDays)
        } else {
            harga.value = 0
        }
    }

    rencanaJamKembali = () => {
        for (let i = 0; i < jamPinjamSelect.options.length; i++) {
            if(jamKembali.options[i].value == jamPinjamSelect.value) {
                jamKembali.options[i].selected = true
                balik.value = jamKembali.options[i].value
            }
            console.log(jamKembali.options[i].value)
        }
        // jamKembali.value = jamPinjamSelect.value
    }

    gantiTanggal()
</script>
@endpush
