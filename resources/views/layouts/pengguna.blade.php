<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko &mdash; Tenun</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('pengguna/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/css/style.css') }}">

</head>

<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="{{ route('dashboard') }}" class="js-logo-clone">TOKO TENUN</a>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>

                                    <li>
                                        <a href="{{ route('keranjang') }}" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <span class="count">{{ count(request()->session()->get('cart', [])) }}
                                            </span>
                                            Keranjang
                                        </a>
                                    </li>
                                    @auth

                            <li class="{{ Route::is('riwayat') ? 'active' : '' }}">
                                <a href="{{ route('riwayat') }}"><span class="icon icon-person"></span>Akun
                                    saya</a>
                            </li>
                        @endauth
                                    <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                            class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">

                    
                        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">Home</a>

                        </li>
                        <li class="{{ Route::is('katalog') ? 'active' : '' }}">
                            <a href="{{ route('katalog') }}">Katalog</a>
                        </li>

                        <li class="{{ Route::is('tentangkami') ? 'active' : '' }}">
                            <a href="{{ route('tentangkami') }}">tentangkami</a>
                        </li>


                        @guest
                            <form action="{{ route('login') }}" method="get" class="d-inline-block">
                                @csrf
                                <button class="btn btn-success" type="submit" data-toggle="modal"
                                    data-target="#logoutModal">

                                    Login
                                </button>
                            @else
                                <form action="{{ route('logout') }}" method="post" class="d-inline-block">

                                    @csrf
                                    <button class="btn btn-danger" type="submit" data-toggle="modal"
                                        data-target="#logoutModal">

                                        Keluar
                                    </button>
                                </form>
                            @endguest
                    </ul>
                </div>
            </nav>
        </header>

        {{ $slot }}

        <footer class="site-footer border-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="footer-heading mb-4">Toko Tenun</h3>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('katalog') }}">Produk</a></li>

                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('pengguna/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('pengguna/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('pengguna/js/popper.min.js') }}"></script>
    <script src="{{ asset('pengguna/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('pengguna/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('pengguna/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('pengguna/js/aos.js') }}"></script>
    <script src="{{ asset('pengguna/js/main.js') }}"></script>

    @stack('script')

</body>

</html>
