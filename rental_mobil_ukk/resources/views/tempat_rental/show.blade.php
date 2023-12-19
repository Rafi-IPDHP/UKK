@extends('template.master')
@section('title', '| Rental')
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
        .myNav {
            position: sticky;
        }

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
    <div class="card my-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-sm-5 d-flex justify-content-center">
                    {{-- {{ dd($tempat_rental[0]->images) }} --}}
                    <img src="{{ $tempat_rental[0]->images }}" alt="..." style="width: 200px; height: 130px" class="rounded-3">
                </div>
                <div class="col-md-9 col-sm-5">
                    <div class="row d-flex flex-column">
                        <div class="col">
                            <h1 class="fw-bold text-center" style="color: #952323; font-family: 'poppins';">{{ $tempat_rental[0]->nama }}</h1>
                        </div>
                        <div class="col">
                            <p class="fw-semibold mb-0 pb-0 text-center" style="color: #952323;">{{ $tempat_rental[0]->alamat }}</p>
                        </div>
                        <div class="col">
                            <p class="fw-semibold text-center" style="color: #952323;"><img src="{{ asset('assets/icon/call-red.png') }}" alt="..." style="width: 25px;" class="pe-1">{{ $tempat_rental[0]->no_telp }}</p>
                        </div>
                        @foreach ($tempat_rental[0]->mobil as $mobil)

                        @endforeach
                        @can('isAdmin')
                        <div class="col gap-3 d-flex justify-content-center">
                            <a href="{{ route('tempat-rental.edit', $tempat_rental[0]->id) }}" class="btn text-white fw-semibold px-4" style="background-color: #952323; font-family: 'poppins';">Update</a>
                            @empty($mobil)
                            <a href="{{ route('tempat-rental.destroy', $tempat_rental[0]->id) }}" class="btn text-white fw-semibold px-4" style="background-color: #952323; font-family: 'poppins';">Hapus</a>
                            @endempty
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-column">
                <div class="col-md-12 d-flex justify-content-between mt-5">
                    <p class="fw-semibold px-4 py-2 rounded-1" style="background-color: #952323; color: #ffffff; font-family: 'poppins';">Unit Tersedia</p>
                    @cannot('isPenyewa')
                    <a href="{{ route('mobil.create', $tempat_rental[0]->id) }}" class="btn fw-semibold text-white px-4 py-2 h-50" style="background-color: #952323">Tambah Mobil</a>
                    @endcannot
                </div>
                {{-- {{ dd($mobil) }} --}}
                @foreach ($tempat_rental[0]->mobil as $mobil)
                <div class="col mb-3">
                    <div class="card" style="background-color: #952323; color: #ffffff; font-family: 'poppins';">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-5 d-flex justify-content-center mb-2">
                                    <img src="{{ $mobil->images }}" alt="..." style="width: 200px; height: 130px;" class="rounded-3">
                                </div>
                                <div class="col-md-7 col-sm-5">
                                    <p class="fs-5 fw-semibold mb-0">Nama Mobil : {{ $mobil->nama }}</p>
                                    <p class="fs-5 fw-semibold mb-0">Jenis Mobil : {{ $mobil->jenis_mobil }}</p>
                                    <p class="fs-5 fw-semibold mb-0">Kondisi Mobil : {{ $mobil->kondisi }}</p>
                                    <p class="fs-5 fw-semibold mb-0">Harga (per hari) : Rp. {{ number_format($mobil->harga) }}</p>
                                    <p class="fs-5 fw-semibold mb-0">Stok : {{ $mobil->stok }}</p>
                                </div>
                                <div class="col-md-2 col-sm-5 d-flex flex-column gap-2 justify-content-center align-items-center">
                                    <a href="{{ route('sewa.create', ['id' => $tempat_rental[0]->id, 'id_mobil' => $mobil->id]) }}" class="btn fw-semibold px-3" style="background-color: #ffffff; color: #952323;">Sewa</a>
                                    @if ($mobil->stok == $mobil->total_mobil)
                                        @cannot('isPenyewa')
                                        <a href="{{ route('mobil.destroy', ['id' => $tempat_rental[0]->id, 'id_mobil' => $mobil->id]) }}" class="btn fw-semibold px-3" style="background-color: #ffffff; color: #952323;">Hapus</a>
                                        @endcannot
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @empty($mobil)
                    <p class="text-center fs-5 fw-semibold" style="color: #952323;">Stok mobil kosong</p>
                @endempty
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
        navbar.classList.toggle('nav-active');
    }
</script>
@endpush
