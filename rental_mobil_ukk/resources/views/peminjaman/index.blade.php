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
    <h1 class="text-center fw-bold my-4" style="font-family: 'poppins'; color: #952323;">History Peminjaman</h1>
    <div class="row d-flex flex-column justify-content-center align-items-center">
        @foreach ($peminjaman as $peminjaman)
            <div class="col-md-12 col-sm-5 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @forelse ($peminjaman->mobil as $mobil)
                            <div class="col-md-3 col-sm-5 d-flex justify-content-center"><img src="{{ $mobil->images }}" alt="..." style="width: 200px; height: 130px" class="rounded-2"></div>
                            <div class="col-md-3 col-sm-5 d-flex flex-column">
                                @forelse ($mobil->tempatRental as $tempatRental)
                                <h1 class="fw-bold" style="color: #952323;">{{ $tempatRental->nama }}</h1>
                                @empty
                                hooh
                                @endforelse
                                <p class="fw-semibold mb-0 pb-0" style="color: #952323;">Nama Mobil : {{ $mobil->nama }}</p>
                            @empty
                            hooh
                            @endforelse
                                <p class="fw-semibold mb-0" style="color: #952323;">Status : {{ $peminjaman->status }}</p>
                                <p class="fw-semibold mb-0" style="color: #952323;">ID Peminjaman : {{ $peminjaman->id }}</p>
                            </div>
                            <div class="col-md-3 col-sm-5 d-flex flex-column">
                                <p class="fw-semibold mb-0" style="color: #952323;">Tanggal Pinjam : {{ $peminjaman->tanggal_pinjam }}</p>
                                <p class="fw-semibold mb-0" style="color: #952323;">Jam Pinjam : {{ $peminjaman->jam_pinjam }}</p>
                                <p class="fw-semibold mb-0" style="color: #952323;">Tanggal Kembali : {{ $peminjaman->rencana_tanggal_kembali }}</p>
                                <p class="fw-semibold mb-0" style="color: #952323;">Jam Kembali : {{ $peminjaman->rencana_jam_kembali }}</p>
                            </div>
                            <div class="col-md-3 col-sm-5 d-flex flex-column">
                                @forelse ($peminjaman->mobil as $mobil)
                                    @php
                                        $tanggalMulai = \Carbon\Carbon::parse($peminjaman->tanggal_pinjam);
                                        $tanggalSelesai = \Carbon\Carbon::parse($peminjaman->rencana_tanggal_kembali);

                                        $hargaPerHari = $mobil->harga;
                                        $selisihHari = $tanggalSelesai->diffInDays($tanggalMulai);
                                        $totalHarga = $selisihHari * $hargaPerHari;

                                        $totalDenda = $peminjaman->denda_waktu + $peminjaman->denda_kondisi
                                    @endphp
                                @empty
                                kosong
                                @endforelse
                                <p class="fw-semibold mb-0" style="color: #952323;">Total Harga : {{ number_format($totalHarga) }}</p>
                                <p class="fw-semibold mb-0" style="color: #952323;">Denda : {{ number_format($totalDenda) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
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
