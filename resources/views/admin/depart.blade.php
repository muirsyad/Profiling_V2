@extends('admin_template')
@section('content')
    <style>
        .scroll {
            height: 500px;
            overflow-y: scroll;
        }

        .tableFixHead {
            height: 500px;
            overflow-y: scroll;
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }
    </style>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bolder text-dark mb-0">List Department</h1>
    </div>
    <div class="d-flex justify-content-end mb-3"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Add departments
        </button></div>

    <div class="tableFixHead">
        <table id="participants" class="participants-view ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Department</th>
                    <th style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $i => $dp)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $dp->department }}</td>
                        <td>

                            <div class="row">
                                <div class="col pe-auto" data-bs-toggle="modal"
                                    data-bs-target="#updatemodel{{ $i }}"><i
                                        class="fas fa-pencil-alt cursor"></i></div>
                                <div class="col"><a href="{{ route('depart_delete', $dp->id) }}"><i
                                            class="fas fa-trash-alt igreen"></i></a></div>
                            </div>

                        </td>
                    </tr>
                    <div class="modal fade" id="updatemodel{{ $i }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Clients {{ $i }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- <form method="post" action="/admin/clients/change/{{ $clients->id }}"> --}}
                                    <form method="post" action="{{ route('depart_update') }}">
                                        @error('depart')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @csrf
                                        <div class="mb-3"><input class="form-control" type="text" id="name-2"
                                                name="depart" placeholder="Name" value="{{ $dp->department }}"></div>
                                        <input type="hidden" name="did" value="{{ $dp->id }}">
                                        <div class="mb-3"></div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->


    <!-- Modal -->
    <form method="post" action="{{ route('depart_add') }}">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @error('depart')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="mb-3"><input class="form-control" type="text" id="name-2" name="depart"
                                placeholder="Name"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
