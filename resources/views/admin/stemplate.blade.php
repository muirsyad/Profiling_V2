@extends('admin_template')
@section('content')
    <div class="d-flex justify-content-evenly mb-3">
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Behaviour</h1>
                        <h4 class="text-primary">Description</h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('indTemp2') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>
                    </div>

                </div>


            </div>
        </div>
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Keywords</h1>
                        <h4 class="text-primary">Sets </h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('key') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="d-flex justify-content-evenly mb-3">
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Motivation</h1>
                        <h4 class="text-primary">management</h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('motivate') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>
                    </div>

                </div>


            </div>
        </div>
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Performance</h1>
                        <h4 class="text-primary">management </h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('performance') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>

                    </div>
                </div>

            </div>

        </div>
    </div>
    

    <div class="d-flex justify-content-evenly mb-3">
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Strength</h1>
                        <h4 class="text-primary">management</h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('strength') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>
                    </div>

                </div>


            </div>
        </div>
        <div class="card col-5">
            <div class="card-body shadow">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="fw-bold text-primary">Fear & Motivation</h1>
                        <h4 class="text-primary">Small point </h4>
                    </div>
                    <div class="align-self-center">
                        <a href="{{ route('performance') }}"><i class="far fa-eye fa-2x text-gray-300"></i></a>

                    </div>
                </div>

            </div>

        </div>
    </div>
    
@endsection
