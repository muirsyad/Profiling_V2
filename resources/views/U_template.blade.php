<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black&amp;display=swap">
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/Contact-Form-by-Moorcam.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/customcss/cus.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<style>
    body {
        background-image: url("{{ URL::asset('assets/img/back.png') }}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ URL::asset('assets/img/d2logo.png') }}" height="65" class="d-inline-block align-top"
                        alt="">

                </a>
                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                    {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    </ul>
                    <form class="d-flex" method="POST" action="/logout"> --}}
                        {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button> --}}
                        {{-- @csrf
                        {{-- <span>logout</span> --}}
                        {{-- <button class="btn btn-outline-success">Logout</button>  --}}
                    {{-- </form> --}}
                {{-- </div> --}}
                {{-- <form class="d-flex" method="POST" action="/logout">

                    @csrf


                 </form> --}}
                 <a href="{{ route('logout') }}" class="btn btn-outline-success">Logout</a>
                 {{-- <button class="btn btn-outline-success">Logout</button> --}}

            </div>
        </nav>
    </header>
    <div class="container">



        @yield('content')

        @if (session()->has('message'))
            <script>
                Swal.fire({
                    title: 'Success',
                    text: '{{ session()->get('message') }}',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                Swal.fire({
                    title: 'Not Allowed',
                    text: '{{ session()->get('error') }}',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            </script>
        @endif

    </div>
</body>
<script src=" {{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

</html>
