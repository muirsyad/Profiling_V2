<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DISC Profiling</title>
    <link rel="icon" href="{{URL::asset('assets/img/headlogo.png')}}" type="image/icon type">

    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('jquery\dist\jquery.js') }}"></script>
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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/luden.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
     html {
  height: 100%;
  margin: 0;
  padding: 0;
  min-height: 100%;
  overflow-x:hidden 
  
}
    body{
        height: 100%;
        margin: 0;
    background-image: url("{{ URL::asset('assets/img/back.png') }}");
    /* background: blanchedalmond; */
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    box-sizing: border-box;
    overflow: visible;
   
    
    }

    
</style>
<body>
    

  
    {{-- <div class="container"
        style="position:absolute; left:0; right:0; top: 50%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%);">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-9 col-xxl-7">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5"> --}}


                                @yield('content')
                                @if (session()->has('message'))
                                        <script>
                                            Swal.fire({
                                                title: 'Success!',
                                                text:  '{{ session()->get('message') }}',
                                                icon: 'success',
                                                confirmButtonText: 'Cool'
                                            })
                                        </script>
                                        @endif
                                {{-- </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> --}}

    <script src=" {{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('assets/js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="{{ URL::asset('assets/js/luden1') }}"></script>

    <script src="{{ URL::asset('assets/js/luden') }}"></script>

    <script src="{{ URL::asset('assets/js/theme.js') }}"></script>

</body>

</html>
