@extends('template.master')
@section('title', '| Register')
@push('css')
<style>
    .myNav {
        background: transparent;
        transition: 0.3s ease-in-out;
    }

    .nav-active {
        background: rgba(218, 212, 181, 0.93);
        border-radius: 0px 0px 10px 10px;
    }

    .navbar-nav {
        background-color: #952323;
        font-family: 'poppins';
    }

    .login-page {
        height: 100vh;
    }

    .register-input {
        background-color: #952323;
        border-radius: 15px 15px 15px 15px;
        outline: none;
    }

    .register-input::placeholder {
        color: #ffffff;
        opacity: 0.8;
    }

    .register-input:focus {
        background-color: #952323;
        color: #ffffff;
        outline: none;
    }

    .register-form {
        height: 100vh;
        padding: 390px 0px 50px 0px;
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

        .register-form {
            padding: 350px 0px 50px 0px;
        }
    }

    @media (max-width: 576px) {
        .register-form {
            overflow-y: hidden;
            height: 170vh;
            padding: 0;
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
<div class="login-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-5 d-flex flex-column justify-content-center align-items-center" style="height: 100vh; background-color: rgba(218, 212, 181, 1);">
                <img src="{{ asset('assets/icon/easyCarHire.png') }}" alt="..." style="width: 250px;">
                <h1 class="fw-bold" style="color: #952323; font-family: 'poppins'; font-size: 60px;">EasyCarHire</h1>
            </div>
            <div class="col-md-6 col-sm-5 d-flex flex-column justify-content-center align-items-center overflow-scroll overflow-x-hidden register-form">
                <div class="row d-flex flex-column justify-content-center w-75">
                    <form action="{{ route('auth.store') }}" method="post">
                        @csrf
                        <div class="col">
                            <h1 class="fw-bold text-center mb-2" style="color: #952323;">Daftar</h1>
                        </div>
                        <div class="col mb-1">
                            <label for="NIK" style="color: #952323;" class="form-label fw-semibold ps-3">NIK</label>
                            <div class="input-group" style="height: 50px;">
                                <input type="number" class="form-control text-white register-input border-start-0 fs-5" id="NIK" name="NIK" placeholder="NIK" aria-describedby="NIK" required>
                            </div>
                        </div>
                        <div class="col mb-1">
                            <label for="nama" style="color: #952323;" class="form-label fw-semibold ps-3">Nama Lengkap</label>
                            <div class="input-group" style="height: 50px;">
                                <input type="text" class="form-control text-white register-input fs-5" id="nama" name="nama" placeholder="Nama Lengkap" aria-describedby="nama" required>
                            </div>
                        </div>
                        <div class="col mb-1">
                            <label for="username" style="color: #952323;" class="form-label fw-semibold ps-3">Username</label>
                            <div class="input-group" style="height: 50px;">
                                <input type="text" class="form-control text-white register-input fs-5" id="username" name="username" placeholder="Username" aria-describedby="username" required>
                            </div>
                        </div>
                        <div class="col mb-1">
                            <label for="email" style="color: #952323;" class="form-label fw-semibold ps-3">Email</label>
                            <div class="input-group" style="height: 50px;">
                                <input type="email" class="form-control text-white register-input fs-5" id="email" name="email" placeholder="easycarhire@gmail.com" aria-describedby="email" required>
                            </div>
                        </div>
                        <div class="col mb-1">
                            <label for="password" style="color: #952323;" class="form-label fw-semibold ps-3">Password</label>
                            <div class="input-group" style="height: 50px;">
                                <input type="password" class="form-control text-white register-input fs-5" id="password" name="password" placeholder="Password" aria-describedby="password" required>
                            </div>
                        </div>
                        <div class="col mb-1">
                            <label for="no_telp" style="color: #952323;" class="form-label fw-semibold ps-3">No Telepon</label>
                            <div class="input-group" style="height: 50px;">
                                <input type="number" class="form-control text-white register-input fs-5" id="no_telp" name="no_telp" placeholder="08" aria-describedby="no_telp" required>
                            </div>
                        </div>
                        <div class="col mb-1">
                            <label for="no_telp_darurat" style="color: #952323;" class="form-label fw-semibold ps-3">No Telepon Darurat</label>
                            <div class="input-group" style="height: 50px;">
                                <input type="number" class="form-control text-white register-input fs-5" id="no_telp_darurat" name="no_telp_darurat" placeholder="08" aria-describedby="no_telp_darurat" required>
                            </div>
                        </div>
                        <input type="hidden" value="penyewa" name="role">
                        <div class="col mb-5">
                            <label for="alamat" style="color: #952323;" class="form-label fw-semibold ps-3">Alamat</label>
                            <div class="input-group" style="height: 50px;">
                                <textarea type="text" class="form-control text-white register-input fs-5" id="alamat" name="alamat" placeholder="Alamat" aria-describedby="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn py-2 px-5 fs-5 rounded-3 mt-3" style="background-color: #952323; color: #ffffff;">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    const navbar = document.querySelector('.myNav');
    const registerForm = document.querySelector('.register-form');
    window.onscroll = () => {
        if (window.scrollY > 10) {
            navbar.classList.add('nav-active');
        } else {
            navbar.classList.remove('nav-active');
        }
    };
    bgShow = () => {
        navbar.classList.add('nav-active');
    }
</script>
@endpush
