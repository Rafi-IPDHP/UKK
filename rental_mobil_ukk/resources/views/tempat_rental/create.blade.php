@extends('template.master')
@section('title', '| Tempat Rental')
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
        <h1 class="text-center fw-bold my-4" style="font-family: 'poppins'; color: #952323;">Masukkan data tempat rental</h1>
        <form action="{{ route('tempat-rental.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-5 mb-3">
                    <label for="nama" class="form-label fw-semibold fs-5" style="color: #952323">Nama Tempat Rental</label>
                    <input type="text" name="nama" class="form-control form-control-lg create-input" id="nama" placeholder="Rental 1" style="color: #952323" required>
                </div>
                <div class="col-md-12 col-sm-5 mb-3">
                    <label for="no_telp" class="form-label fw-semibold fs-5" style="color: #952323">No Telepon</label>
                    <input type="number" name="no_telp" class="form-control form-control-lg create-input" id="no_telp" placeholder="08..." style="color: #952323" required>
                </div>
                <div class="col-md-12 col-sm-5 mb-3">
                    <label for="alamat" class="form-label fw-semibold fs-5" style="color: #952323">Alamat Tempat Rental</label>
                    <textarea type="text" name="alamat" class="form-control form-control-lg create-input" id="alamat" placeholder="Rental 1" style="color: #952323" required></textarea>
                </div>
                <div class="col-md-12 col-sm-5 mb-5">
                    <label for="images" class="form-label fw-semibold fs-5" style="color: #952323">Foto Tempat Rental</label>
                    <input type="file" name="images" class="form-control form-control-lg create-input" id="images" style="color: #952323" required>
                </div>
                <div class="col-md-12 col-sm-5 mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn fw-semibold text-white px-5 fs-5 py-2" style="background-color: #952323">Kirim</button>
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
</script>
@endpush
