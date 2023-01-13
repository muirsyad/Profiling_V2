@extends('admin_template')
@section('content')


                    <section class="position-relative py-4 py-xl-5">
                        <div class="container position-relative">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                                    <div class="card mb-5">
                                        <div class="card-body p-sm-5">
                                            <h2 class="text-center mb-4">Add New Clients</h2>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form method="post" action="{{ route('Cstore') }}">
                                                @csrf
                                                <div class="mb-3"><input class="form-control" type="text" id="name-2" name="client" placeholder="Name"></div>
                                                <div class="mb-3"><input class="form-control" type="email" id="email-2" name="email" placeholder="Email"></div>
                                                <div class="mb-3"><input class="form-control" type="text" id="address-1" name="address" placeholder="Address"></div>
                                                <input type="hidden" name="link_code" value="{{ $code }}">
                                                <input type="hidden" name="is_delete" value=0>
                                                <div class="mb-3"></div>
                                                <input type="hidden" value="{{ date('Y-m-d') }}" name="created_at">
                                                <div><button class="btn btn-primary d-block w-100" type="submit">Submit</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    @endsection
