@extends('lr_template')
@section('content')
    <style>
        .c-wood {
            background: #dee2fc;
        }

        @media only screen and (max-width: 600px) {
            form {
                margin-top: 45px;

            }

            .card-body {
                padding: 5%;
            }
        }

        @media only screen and (min-width: 1200px) {
            form {
                margin-top: 100px;

            }

            .card-body {
                padding: 5%;
            }
        }
    </style>
    <form method="POST" action="{{ route('adminR') }}">
        @csrf
        <div class="form-body">

            <div class="title  text-white text-center">
                <h1 class="nomar fw-bold">Create an account12</h1>
                <span>Complete registeration to take DiSC Assessment</span>

            </div>

            <form action="#">
                <div class="row ">
                    <div class="col col-lg-6 p-4 mx-auto">
                        <div class="card">
                            <div class="card-body c-wood">
                                {{-- <div class="form-floating mb-3">
                                    <input name="name" type="text" class="form-control" id="floatingPassword"
                                        placeholder="Password">
                                    <label for="floatingPassword">Name</label>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class="form-floating mb-3">
                                    <select name="department_id" class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        @foreach ($dp as $dp)
                                            <option value="{{ $dp->id }}">{{ $dp->department }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Your departments</label>
                                    @error('department_id')
                                        <p class="text-danger">{{ 'Please select your departments' }}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>

                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-floating mb-3">
                                    <input name="password" type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-floating mb-3">
                                    <input name="password_confirmation" type="password" class="form-control"
                                        id="pass" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <span>Show Password</span>
                                </div>
                                <input type="hidden" name="client_id" value='{{ $clients->id }}'>
                                {{-- <input type="hidden" name="department_id" value="1"> --}}

                                <input type="hidden" name="role_id" value="2">
                                <input type="hidden" name="status" value="2">
                                <input type="hidden" name="created_at" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="is_delete" value="0">
                                <div class="d-grid gap-2 col-12 mx-auto">
                                    <button class="btn btn-success" type="submit">Submit</button>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </form>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // function showPass() {
        //     var x = document.getElementById("pass");
        //     if (x.type === "password") {
        //         x.type = "text";
        //     } else {
        //         x.type = "password";
        //     }
        // }

        // function showPass2() {
        //     var x = document.getElementById("pass2");
        //     if (x.type === "password") {
        //         x.type = "text";
        //     } else {
        //         x.type = "password";
        //     }
        // }


        $("#vehicle1").click(function() {
            // console.log("click");
            // $('#floatingPassword').attr('type', 'text');
            if ($(this).is(':checked')) {
                // Changing type attribute
                // $("#password").attr("type", "text");
                console.log('checkked');
                $("#floatingPassword").attr("type", "text");
                $("#pass").attr("type", "text");
            }
            else{
                console.log('unckecked');
                $("#floatingPassword").attr("type", "password");
                $("#pass").attr("type", "password");
            }

        });
    </script>
@endsection
