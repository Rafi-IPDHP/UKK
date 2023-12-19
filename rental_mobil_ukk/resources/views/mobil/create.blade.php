@extends('template.master')
@section('title', '| Tambah Mobil')
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
    <h1 class="text-center fw-bold my-4" style="font-family: 'poppins'; color: #952323;">Masukkan data mobil</h1>
    <form action="{{ route('mobil.store', $dataRental[0]->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="nama" class="form-label fw-semibold fs-5" style="color: #952323">Nama Mobil</label>
                <input type="text" name="nama" class="form-control form-control-lg create-input" id="nama" placeholder="Mobil 1" style="color: #952323" required>
            </div>
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="jenis_mobil" class="form-label fw-semibold fs-5" style="color: #952323">Pilih Jenis Mobil</label>
                <select name="jenis_mobil" id="jenis_mobil" class="form-select form-select-lg" style="color: #952323" required>
                    <option disabled selected>pilih salah satu</option>
                    <option value="suv">SUV</option>
                    <option value="mpv">MPV</option>
                    <option value="crossover">Crossover</option>
                    <option value="hatchback">Hatchback</option>
                    <option value="sedan">Sedan</option>
                    <option value="convertible">Convertible</option>
                </select>
            </div>
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="harga" class="form-label fw-semibold fs-5" style="color: #952323">Harga Mobil (per hari)</label>
                <div class="input-group">
                    <span class="input-group-text" id="harga" style="color: #952323">Rp</span>
                    <input type="number" name="harga" class="form-control form-control-lg create-input" id="harga" placeholder="100000" style="color: #952323" aria-describedby="harga" required>
                </div>
            </div>
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="warna" class="form-label fw-semibold fs-5" style="color: #952323">Warna Mobil</label>
                <input type="text" name="warna" class="form-control form-control-lg create-input" id="warna" placeholder="hitam" style="color: #952323" required>
            </div>
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="kondisi" class="form-label fw-semibold fs-5" style="color: #952323">Pilih Kondisi Mobil</label>
                <select name="kondisi" id="kondisi" class="form-select form-select-lg" style="color: #952323" required>
                    <option disabled selected>pilih salah satu</option>
                    <option value="baik">Baik</option>
                    <option value="sedang">Sedang</option>
                    <option value="buruk">Buruk</option>
                </select>
            </div>
            <div class="col-md-12 col-sm-5 mb-3">
                <label for="stok" class="form-label fw-semibold fs-5" style="color: #952323">Stok Mobil</label>
                <input type="number" name="stok" class="form-control form-control-lg create-input" id="stok" placeholder="10" style="color: #952323" required onchange="changeTotal()">
            </div>
            <input type="number" name="total_mobil" id="total_mobil" hidden>
            <div class="col-md-12 col-sm-5 mb-5">
                <label for="images" class="form-label fw-semibold fs-5" style="color: #952323">Foto Mobil</label>
                <input type="file" name="images" class="form-control form-control-lg create-input" id="images" style="color: #952323" required>
            </div>
            <input type="hidden" name="tempat_rental_id" value="{{ $dataRental[0]->id }}">
            <div class="col-md-12 col-sm-5 mb-5 d-flex justify-content-end">
                <button type="submit" class="btn text-white px-5 py-2 fs-5" style="background-color: #952323">Kirim</button>
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

    changeTotal = () => {
        let stok = document.getElementById('stok').value;
        document.getElementById('total_mobil').value = stok;
    }
</script>
@endpush
