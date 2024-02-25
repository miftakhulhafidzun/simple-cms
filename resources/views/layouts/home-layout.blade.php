<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">


    <title> Welcome Kominfo Surabaya </title>

    <link href="{{ asset("assets/dist/css/bootstrap.min.css") }}" rel="stylesheet">

    {{-- <link href="css/bootstrap-icons.css" rel="stylesheet"> --}}
    <link rel="icon" href="{{ asset("image/bpsdmp_logo.png") }}" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}">



</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="display: flex; align-items: center;">
                    <img src="{{asset("image/bpsdmp_logo.png")}}" alt="Kominfo Logo" style="width: 50px; height: auto; margin-right: 10px;">
                    <span style="font-size: 1.8rem; font-weight: bold;">KOMINFO</span>
                </a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Browse Topics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')

    </main>

    <footer class="site-footer section-padding mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand" href="index.html" style="display: flex; align-items: center;">
                        <img src="{{ asset("image/bpsdmp_logo.png") }}" alt="Kominfo Logo" style="width: 150px; height: auto; margin-right: 10px;">
                        <span style="font-size: 2.5rem; font-weight: bold;">KOMINFO SURABAYA</span>
                    </a>

                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 d-flex flex-column align-items-center ms-auto">
                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024. Kominfo Surabaya.</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset("js/jquery.min.js") }}"></script>

    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/jquery.sticky.js") }}"></script>
    <script src="{{ asset("js/click-scroll.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}"></script>

</body>

</html>