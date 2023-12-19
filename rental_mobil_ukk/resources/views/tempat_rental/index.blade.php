@extends('template.master')
@section('title', '| Tempat Rental')
@push('css')
<style>
    body {
        background-color: #DAD4B5;
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
    <h1 class="text-center fw-bold my-4" style="font-family: 'poppins'; color: #952323;">Pilih Tempat Rental Mobil</h1>
    @can('isAdmin')
    <div class="row">
        <div class="col mb-2">
            <a href="{{ route('tempat-rental.create') }}" class="btn text-white" style="background-color: #952323">Tambah Tempat Rental</a>
        </div>
    </div>
    @endcan
    <div class="row d-flex flex-column justify-content-center align-items-center">
        @foreach ($tempat_rentals as $tempat_rental)
            <div class="col-md-12 col-sm-5 mb-3">
                <a href="{{ route('tempat-rental.show', $tempat_rental->id) }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 d-flex justify-content-center"><img src="{{ $tempat_rental->images }}" alt="..." style="width: 200px;" class="rounded-2"></div>
                                <div class="col-md-9 d-flex flex-column justify-content-center align-items-center">
                                    <h1 class="fw-bold" style="color: #952323;">{{ $tempat_rental->nama }}</h1>
                                    <p class="fw-semibold mb-0 pb-0" style="color: #952323;">{{ $tempat_rental->alamat }}</p>
                                    <p class="fw-semibold" style="color: #952323;"><img src="{{ asset('assets/icon/call-red.png') }}" alt="..." style="width: 25px;" class="pe-1">{{ $tempat_rental->no_telp }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
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
        navbar.classList.toggle('nav-active');
    }
</script>
@endpush
