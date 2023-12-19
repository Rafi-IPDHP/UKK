<nav class="navbar navbar-expand-lg fixed-top navbar-light myNav pt-3">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4 scale-up-center" style="font-family: 'poppins'; color: #952323;" href="{{ route('dashboard') }}"><img src="{{ asset('assets/icon/easyCarHire.png') }}" alt="EasyCarHire" style="width: 50px;" class="img-fluid me-2">EasyCarHire</a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation" onclick="bgShow()">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mx-auto mt-2 mt-lg-0 fs-6 rounded-3 py-1 px-3 gap-4">
              <li class="nav-item">
                  <a class="nav-link text-white @if (Request::segment(1) == "")
                    fw-semibold
                  @endif" href="{{ route('dashboard') }}" aria-current="page">Beranda <span class="visually-hidden">(current)</span></a>
              </li>
              @can('isPenyewa')
              <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('dashboard') }}#tentang-kami">Tentang Kami</a>
              </li>
              @endcan
              @if (Auth::check())
                @cannot('isPenyewa')
                <li class="nav-item">
                    <a class="nav-link text-white @if (Request::segment(1) == "pengembalian")
                    fw-semibold
                    @endif" href="{{ route('pengembalian.index') }}">Pengembalian</a>
                </li>
                @endcannot
              @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}#tentang-kami">Tentang Kami</a>
                </li>
              @endif
              <li class="nav-item">
                  <a class="nav-link text-white @if (Request::segment(1) == "tempat-rental")
                      fw-semibold
                  @endif" href="{{ route('tempat-rental.all') }}">Tempat Rental</a>
              </li>
              <li class="nav-item">
                @if (Auth::check())
                    <a class="nav-link text-white @if (Request::segment(1) == "peminjaman")
                    fw-semibold
                    @endif" href="{{ route('sewa.index', Auth::user()->id) }}">Peminjaman</a>
                @else
                    <a class="nav-link text-white" href="{{ route('auth.login') }}">Peminjaman</a>
                @endif
              </li>
          </ul>
          <form class="d-flex my-2 my-lg-0 gap-2" style="font-family: 'poppins';">
            @if (Auth::check())
            <div class="dropdown">
                <button class="border-0 bg-transparent fw-semibold" style="color: #952323" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col">
                            <p class="fs-5 mb-0 pb-0 fw-bold text-end">{{ Auth::user()->username }}</p>
                            <p class="fs-6 mt-0 pt-0">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="col"><img src="{{ asset('assets/icon/dashboard_user.png') }}" alt="..." style="width: 45px;" class="pb-3 scale-up-center"></div>
                    </div>
                </button>
                <ul class="dropdown-menu border-0 justify-content-center" style="background-color: rgba(218, 212, 181, 0.93);">
                  <li class="d-flex justify-content-center"><a href="{{ route('logout') }}" class="btn px-4 my-2 my-sm-0 text-white" style="background-color: #952323;">Logout</a></li>
                  {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
              </div>
            @else
                <a href="{{ route('auth.login') }}" class="btn my-2 my-sm-0 text-white" style="background-color: #952323;">Masuk</a>
                <a href="{{ route('auth.register') }}" class="btn my-2 my-sm-0 text-white" style="background-color: #952323;">Daftar</a>
            @endif
          </form>
      </div>
</div>
</nav>
