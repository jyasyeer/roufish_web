<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/vendor/roufish-ui/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-primary navbar-roufish">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"> <img src="/vendor/roufish-ui/images/logo.png"
                    alt="Bootstrap" width="60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}"
                            href="{{ route('produk.index') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('lelang.*') ? 'active' : '' }}"
                            href="{{ route('lelang.index') }}">Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}"
                            href="{{ route('tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}"
                            href="{{ route('faq') }}">FAQ</a>
                    </li>
                </ul>
                @auth
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (auth()->user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @endif
                            @if (auth()->user()->role == 'penjual')
                                <li><a class="dropdown-item" href="{{ route('penjual.dashboard') }}">Dashboard</a></li>
                            @endif

                            @if (auth()->user()->role != 'admin' && auth()->user()->role != 'penjual')
                                <li><a class="dropdown-item" href="{{ route('riwayat-order.index') }}">Riwayat
                                        Pembelian</a></li>
                                <li><a class="dropdown-item" href="{{ route('riwayat-lelang.index') }}">Riwayat Lelang</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('profil.index') }}">Profil</a></li>

                                <!-- Modal -->
                                </li>
                            @endif
                            <li>
                                <!-- Button trigger modal -->
                                <a type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Log out
                                </a>
                        </ul>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ready to Leave?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Select "Logout" below if you are ready to end your current session.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex gap-2">
                        <a href="{{ route('login', 'as=pembeli') }}" class="btn btn-light">Masuk</a>
                        <a href="{{ route('register', 'as=pembeli') }}" class="btn btn-primary text-light">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="fw-bold mb-4">About Us</h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center gap-3 mb-4">
                            <div class="social-icon"><i class="bi bi-instagram"></i>
                            </div>
                            Instagram
                        </li>
                        <li class="d-flex align-items-center gap-3 mb-4">
                            <div class="social-icon"><i class="bi bi-twitter-x"></i>
                            </div>
                            Twitter / X
                        </li>
                        <li class="d-flex align-items-center gap-3">
                            <div class="social-icon"><i class="bi bi-whatsapp"></i>
                            </div>
                            Whatsapp
                        </li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <h5 class="fw-bold mb-4">Contact Information</h5>
                    <ul class="list-unstyled">
                        <li class="mb-4">
                            <h6 class="fw-semibold">Alamat</h6>
                            <p>Jl. Talang Tembaga, Margadadi, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45212</p>
                        </li>
                        <li class="mb-4">
                            <h6 class="fw-semibold">Telephone</h6>
                            <p>0823192834</p>
                        </li>
                        <li class="">
                            <h6 class="fw-semibold">Email</h6>
                            <p>roufish@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-4">Maps</h5>
                    <div class="ratio ratio-16x9">
                        <img src="vendor/roufish-ui/images/maps.png" class="w-100  rounded-5" alt="">
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/roufish-ui/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/roufish-ui/vendor/jquery/jquery.min.js"></script>
</body>

</html>
