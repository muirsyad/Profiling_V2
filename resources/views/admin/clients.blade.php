@extends('admin_template')
@section('content')

    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bolder text-dark mb-0">Clients</h1>
    </div>
    <div class="row row-cols-2">
        <div class="col">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col">
                            <a href="{{ route('Cview') }}">
                            <h3 class="fw-bold text-primary">View</h3><span class="text-primary">Clients</span></a>
                        </div>
                        <div class="col-auto"><i class="far fa-eye fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col">
                            <a href="{{ route('Ccreate') }}">
                            <h3 class="fw-bold text-primary">Add new</h3><span class="text-primary">Clients</span></a>
                        </div>
                        <div class="col-auto"><i class="far fa-eye fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
