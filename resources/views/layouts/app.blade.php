<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="generator" content="Hugo 0.84.0">
        <title>KOMINFO Surabaya</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset("assets/dist/css/bootstrap.min.css") }}" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

        
        <!-- Custom styles for this template -->
        <link href="{{ asset("css/dashboard.css") }}" rel="stylesheet">
        <link href="{{ asset("css/bootstrap-icons.css") }}" rel="stylesheet">
        <link href="{{ asset("css/all.min.css") }}" rel="stylesheet">
        <link href="{{ asset("css/jquery-ui.min.css") }}" rel="stylesheet">

        <link rel="icon" href="{{ asset("image/bpsdmp_logo.png") }}" sizes="32x32" type="image/png">

    </head>
    <body>
    
        @include('layouts.header')

        <div class="container-fluid">
            <div class="row">
                @include('layouts.sidebar')

                @yield('content')
            </div>
        </div>


        <script src="{{ asset("assets/dist/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("js/dashboard.js") }}"></script>
        <script src="{{ asset("js/all.min.js") }}"></script>
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <script src="{{ asset("js/jquery-ui.min.js") }}"></script>

    <script>
        $( function() {
            $( "#date" ).datepicker({
                dateFormat: 'dd/mm/yy', // Format tanggal dd/mm/yyyy
                changeMonth: true, // Aktifkan navigasi ke bulan lain
                changeYear: true // Aktifkan navigasi ke tahun lain
            });
        });
    </script>

    </body>

</html>
