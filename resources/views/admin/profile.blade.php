@extends('admin_template')
@section('content')



    <style>
        span.field-icon {

            left: 576px;
            position: absolute;
            float: right;
            top: 263px;

        }

        span.field-icon2 {

            left: 1201px;
            position: absolute;
            float: right;
            top: 263px;

        }
    </style>
    <h3 class="text-dark mb-4">Profile</h3>
    <div class="row mb-3">
        <form action="{{ route('profilemodify') }}">
            @csrf

            <div class="col-12 offset-0">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">User Settings</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="email"><strong>Email
                                                Address</strong></label><input class="form-control" type="email"
                                            id="email" placeholder="user@example.com" name="email"
                                            value={{ auth()->user()->email }}>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col"><label class="form-label">Name</label><input class="form-control"
                                        name="name" type="text" value='{{ auth()->user()->name }}'></div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3"><label class="form-label" for="first_name"><strong>Password</strong>
                                        </label><input class="form-control" type="password" id="password"
                                            placeholder="**********" name="password" autocomplete="new-password"> </div>




                                </div>

                                <div class="col-6">

                                    <div class="mb-3"><label class="form-label" for="last_name"><strong>Confirm
                                                password</strong></label> <input
                                            class="form-control" type="password" id="comfirmationpassword" placeholder="**********"
                                            name="comfirmationpassword"></div>


                                </div>

                                <div class="form-floating mb-3">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <span>Show Password</span>
                                </div>

                            </div>
                            <div class="mb-3"></div>
                        </form><button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
                    </div>
                </div>
                <div class="card shadow"></div>
            </div>
        </form>
    </div>
    <div class="card shadow mb-5"></div>
    <script>
        $(document).ready(function() {
            $("#hideshow")
        });

        $("#vehicle1").click(function() {
            // console.log("click");
            // $('#floatingPassword').attr('type', 'text');
            if ($(this).is(':checked')) {
                // Changing type attribute
                // $("#password").attr("type", "text");
                console.log('checkked');
                $("#password").attr("type", "text");
                $("#comfirmationpassword").attr("type", "text");
            }
            else{
                console.log('unckecked');
                $("#password").attr("type", "password");
                $("#comfirmationpassword").attr("type", "password");
            }

        });
    </script>
@endsection
