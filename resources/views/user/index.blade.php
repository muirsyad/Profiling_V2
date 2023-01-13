@extends('U_template')
@section('content')


        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 " style="margin-bottom: 29px;margin-top: 50px;">
            <div class="col offset-md-3 offset-xl-4">
                <div class="card shadow-lg"><img class="card-img-top w-100 d-block border rounded fit-cover"
                        style="height: 200px;" src="{{ asset('/assets/img/quizzzz.jpg') }}" width="400px" height="300">
                    <div class="card-body p-4" style="background: #ffe77a;">
                        <div class="row">
                            <div class="col-12">
                                <h1 style="color: var(--bs-green);text-align: center;">DISC Profiling Quiz</h1>
                            </div>
                            <div class="col-12 offset-0 d-flex justify-content-center"><a
                                    class="btn btn-primary text-center border rounded-pill" role="button"
                                    href="{{ route('quiz') }}"
                                    style="background: var(--bs-success);color: rgb(255,231,122);">Start Quizz</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection
