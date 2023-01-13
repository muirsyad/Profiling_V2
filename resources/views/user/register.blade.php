@extends('lr_template')
@section('content')
{{--
    <div class="text-center">
        <h4 class="text-dark mb-4">Create an Account!</h4>
    </div>
    <form class="user" action="{{ route('adminR') }}" method="post">
        @csrf
        <div class="mb-3"><input name="name" class= "form-control form-control-user" type="text" placeholder="Name" required="">
        </div>
        <div class="mb-3"><input name="email" class="form-control form-control-user" type="email" id="email"
                placeholder="Email Address" required=""></div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0"><input name="password" class="form-control form-control-user" type="password" id="password"
                    placeholder="Password" required=""></div>
            <div class="col-sm-6"><input name="password2" class="form-control form-control-user" type="password" id="verifyPassword"
                    placeholder="Repeat Password" required=""></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0"><input name="department_id" class="form-control form-control-user" type="text"
                    placeholder="Department" required=""></div>
            <div class="col-sm-6"><input name="client_id" class="form-control form-control-user" type="text" placeholder="Company"
                    required=""></div>
        </div>
        <input type="hidden" name="role_id" value="1">
        <input type="hidden" name="status" value="1">
        <input type="hidden" name="date_created" value="{{ date('Y-m-d') }}">
        <div class="row mb-3">
            <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
            <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Register Account</button>
        <hr>
    </form>
    <div class="text-center"><a class="small" href="login.html">Already have an account? Login!</a></div> --}}

    <div class="card">
        <div class="card-body">
            <h1>Register clinet</h1>
            <form method="POST" action="{{ route('userR') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="example: Muhammad Kasim" name="name">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                    name="email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1"
                        placeholder="************" name="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password confirmation</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1"
                        placeholder="************" name="password_confirmation">
                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">No-tel</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="example: 01782726353" name="no-tel">

                        @error('no-tel')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div> --}}
                <input type="hidden" name="client_id" value="2">
                <input type="hidden" name="department_id" value="2">
                <input type="hidden" name="role_id" value="2">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="created_at" value="{{ date('Y-m-d') }}">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
