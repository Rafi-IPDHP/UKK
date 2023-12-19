@extends('template.master')
@section('title', '| Login')
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

    .login-input {
        background-color: #952323;
        border-radius: 0px 15px 15px 0px;
        outline: none;
    }

    .login-input::placeholder {
        color: #ffffff;
        opacity: 0.8;
    }

    .login-input:focus {
        background-color: #952323;
        color: #ffffff;
        outline: none;
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

        .login-page {
            height: 200vh;
        }
    }

    .scale-up-center {
        -webkit-animation: scale-up-center 0.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
            animation: scale-up-center 0.7s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
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
<div class="login-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-5 d-flex flex-column justify-content-center align-items-center" style="height: 100vh; background-color: rgba(218, 212, 181, 1);">
                <img src="{{ asset('assets/icon/easyCarHire.png') }}" alt="..." style="width: 250px;">
                <h1 class="fw-bold" style="color: #952323; font-family: 'poppins'; font-size: 60px;">EasyCarHire</h1>
            </div>
            <div class="col-md-6 col-sm-5 d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
                <div class="row d-flex flex-column justify-content-center w-75">
                    <form action="{{ route('auth.proses') }}" method="post">
                        @csrf
                        <div class="col">
                            <h1 class="fw-bold text-center mb-4" style="color: #952323;">Masuk</h1>
                        </div>
                        <div class="col mb-3">
                            <div class="input-group" style="height: 50px;">
                                <span class="input-group-text" style="background-color: #952323; border-radius: 15px 0px 0px 15px; border-right: none;" id="email"><img src="{{ asset('assets/icon/user.png') }}" alt="..." style="width: 25px;" class="scale-up-center"></span>
                                <input type="email" class="form-control text-white login-input border-start-0 fs-5" id="email" name="email" placeholder="Email" aria-describedby="email" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        @if (session('success'))
                            <div class="alert alert-danger">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col mb-5">
                            <div class="input-group" style="height: 50px;">
                                <span class="input-group-text" style="background-color: #952323; border-radius: 15px 0px 0px 15px; border-right: none;" id="password"><img src="{{ asset('assets/icon/password.png') }}" alt="..." style="width: 25px;" class="scale-up-center"></span>
                                <input type="password" class="form-control text-white login-input border-start-0 fs-5" id="password" name="password" placeholder="Password" aria-describedby="password" required>
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn py-2 px-5 fs-5 rounded-3" style="background-color: #952323; color: #ffffff;">Masuk</button>
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
