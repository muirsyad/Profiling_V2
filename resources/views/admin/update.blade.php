@extends('admin_template')
@section('content')


                    <section class="position-relative py-4 py-xl-5">
                        <div class="container position-relative">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                                    <div class="card mb-5">
                                        <div class="card-body p-sm-5">
                                            <h2 class="text-center mb-4">Update Clients</h2>
                                            <form method="post" action="/admin/clients/change/{{ $clients->id }}">
                                                @csrf
                                                <div class="mb-3"><input class="form-control" type="text" id="name-2" name="client" placeholder="Name" value="{{ $clients->client }}"></div>
                                                <div class="mb-3"><input class="form-control" type="email" id="email-2" name="email" placeholder="Email" value="{{ $clients->email }}"></div>
                                                <div class="mb-3"><input class="form-control" type="text" id="address-1" name="address" placeholder="Address" value="{{ $clients->address }}"></div>
                                                <div class="mb-3"></div>
                                                <div><button class="btn btn-primary d-block w-100" type="submit">Update</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    @endsection
