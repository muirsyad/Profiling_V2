@extends('acc_template')
@section('content')


    <div class="card">
        <div class="card-body">
            <div class="color-black mb-4">
                <h1>Name : {{ $user->name }}</h1>
                <h1>Email : {{ $user->email }}</h1>
                <h1>Department : {{ $user->department }}</h1>
                @if ($user->status === 1)
                    <h1>Complete Assasment : <span class="done">Complete</span> </h1>
                @else
                    <h1>Complete Assasment : <span class="undone">Uncomplete</span> </h1>
                @endif

            </div>

            <!-- Button trigger modal -->

            <div class="d-flex justify-content-around">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks1Modal">
                    Add remarks1
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks2Modal">
                    Add remarks2
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks3Modal">
                    Add remarks3
                </button>


            </div>




        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade color-black" id="remarks1Modal" tabindex="-1" aria-labelledby="remarks1ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="remarks1ModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Example
                    </button>
                    <span>Remarks 1</span>
                    

                    

                    <form action="{{ route('Remup1') }}" method="POST" id="elementId">


                        @csrf

                        <input type="hidden" value="{{ $user->id }}" name="uid">
                        @if ($count > 0)
                            @foreach ($rem1 as $rem)
                                <div class="mb-3">
                                    {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                                    <textarea maxlength='110' class='form-control color-black' id='rem1inputId' name='value[]' placeholder='remarks'
                                        rows='2'>{{ $rem }}</textarea>

                                </div>
                            @endforeach
                        @else
                            <div class="mb-3">


                                <textarea maxlength="110" class="form-control color-black" name="value[]" id="exampleFormControlTextarea1"
                                    rows="2" placeholder="remarks"></textarea>
                            </div>
                        @endif


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="row1">add Row</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade color-black" id="remarks2Modal" tabindex="-1" aria-labelledby="remarks2ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="remarks2ModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Remarks 2
                    <form action="{{ route('Remup2') }}" method="POST" id="elementId2">
                        @csrf

                        <input type="hidden" value="{{ $user->id }}" name="uid">
                        @if ($count > 0)
                            @foreach ($rem2 as $rem)
                                <div class="mb-3">
                                    {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                                    <textarea maxlength='110' class='form-control color-black' id='rem2inputId' name='value[]' placeholder='remarks'
                                        rows='2'>{{ $rem }}</textarea>

                                </div>
                            @endforeach
                        @else
                            <div class="mb-3">


                                <textarea maxlength="110" class="form-control color-black" id="exampleFormControlTextarea1" rows="2"
                                    placeholder="remarks"></textarea>
                            </div>
                        @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="row2">add Row</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade color-black" id="remarks3Modal" tabindex="-1" aria-labelledby="remarks3ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="remarks3ModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Remarks 3
                    <form action="{{ route('Remup3') }}" method="POST" id="elementId3">
                        @csrf

                        <input type="hidden" value="{{ $user->id }}" name="uid">
                        @if ($count > 0)
                            @foreach ($rem3 as $rem)
                                <div class="mb-3">
                                    {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                                    <textarea maxlength='110' class='form-control color-black' id='rem3inputId' name='value[]' placeholder='remarks'
                                        rows='2'>{{ $rem }}</textarea>

                                </div>
                            @endforeach
                        @else
                            <div class="mb-3">


                                <textarea maxlength="110" class="form-control color-black" id="exampleFormControlTextarea1" rows="2"
                                    placeholder="remarks"></textarea>
                            </div>
                        @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="row3">add Row</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('assets/js/acc.js') }}"></script>
@endsection
