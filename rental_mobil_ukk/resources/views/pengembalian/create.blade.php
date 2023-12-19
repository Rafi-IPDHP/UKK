@extends('template.master')
@section('title', '| Pengembalian')
@push('css')
<style>
    body {
        background: rgba(218, 212, 181);
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

    .create-input::placeholder {
        color: #952323
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

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
</style>
@endpush
@section('content')
<!-- navbar start -->
@include('template.components.navbar')
<!-- navbar end -->
<div class="container">
    <h1 class="text-center fw-bold my-4" style="font-family: 'poppins'; color: #952323;">Masukkan data pengembalian</h1>
    <form action="{{ route('pengembalian.store', $dataSewa[0]->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
        <input type="text" name="mobil_id" value="{{ $dataSewa[0]->mobil_id }}" hidden>
        <input type="text" name="peminjaman_id" value="{{ $dataSewa[0]->id }}" hidden>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali"  min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d', strtotime('+1 day'))  }}" hidden>
        <input type="time" name="jam_kembali" id="jam_kembali" value="{{ date('H:i:s', strtotime('+7 hours')) }}" hidden>
        <div class="row">
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="bukti_pengembalian" class="form-label fw-semibold fs-5" style="color: #952323">Foto Bukti Pengembalian</label>
                <input type="file" name="bukti_pengembalian" class="form-control form-control-lg create-input" id="bukti_pengembalian" style="color: #952323" required>
            </div>
            <p id="rencana_tanggal_kembali" hidden>{{ $dataSewa[0]->rencana_tanggal_kembali }}</p>
            <p id="rencana_jam_kembali" hidden>{{ $dataSewa[0]->rencana_jam_kembali }}</p>
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="denda" class="form-label text-center fs-5 fw-semibold" style="color: #952323;">Denda Waktu</label>
                <input type="text" class="form-control form-control-lg denda" id="denda" placeholder="Rp. 0" disabled>
            </div>
            <input type="number" name="denda_waktu" id="denda_waktu" value="{{ number_format($dataSewa[0]->denda_waktu) }}" hidden>
            <div class="col-md-12 col-md-5 mb-3">
                <label for="kondisi" class="form-label text-center fs-5 fw-semibold" style="color: #952323;">Kondisi Mobil</label>
                <select name="kondisi" id="kondisi" class="form-select form-select-lg">
                    <option disabled>pilih salah satu</option>
                    <option value="baik" {{ $dataSewa[0]->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="sedang" {{ $dataSewa[0]->kondisi == 'sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="buruk" {{ $dataSewa[0]->kondisi == 'buruk' ? 'selected' : '' }}>Buruk</option>
                </select>
            </div>
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="denda_kondisi" class="form-label fw-semibold fs-5" style="color: #952323">Denda Kondisi</label>
                <input type="number" name="denda_kondisi" class="form-control form-control-lg create-input" id="denda_kondisi" value="0" placeholder="Rp. 0" style="color: #952323" required>
                <input type="text" value="sudah dikembalikan" name="status" hidden>
            </div>
            <div class="col-md-12 col-sm-5 my-3 d-flex justify-content-end">
                <button type="submit" class="btn text-white py-2 px-4 fs-5" style="background-color: #952323">Kirim</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push('script')
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

    let tanggalKembali = document.getElementById('tanggal_kembali')
    let jamKembali = document.getElementById('jam_kembali')
    let rencanaTanggalKembali = document.getElementById('rencana_tanggal_kembali')
    let rencanaJamKembali = document.getElementById('rencana_jam_kembali')
    let dendaWaktu = document.getElementById('denda_waktu')
    let denda = document.getElementById('denda')

    if(rencanaTanggalKembali.innerHTML == tanggalKembali.value) {
        if(rencanaJamKembali.innerHTML >= jamKembali.value) {
            dendaWaktu.value = 0
            denda.value = '0'
        } else {
            dendaWaktu.value = 10000
            denda.value = '10.000'
        }
    } else if(rencanaTanggalKembali.innerHTML > tanggalKembali.value) {
        dendaWaktu.value = 0
        denda.value = '0'
    } else {
        let dateTanggalKembali = tanggalKembali.value.split('-')[2]
        let dateRencanaTanggalKembali = rencanaTanggalKembali.innerHTML.split('-')[2]
        let terlambat = dateTanggalKembali - dateRencanaTanggalKembali
        let total = 10000 * terlambat
        if(rencanaJamKembali.innerHTML >= jamKembali.value) {
            dendaWaktu.value = total + 10000
        }
        dendaWaktu.value = total
        denda.value = total
    }
</script>
@endpush
