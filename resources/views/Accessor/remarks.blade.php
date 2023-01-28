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

            <div class="mb-3">
                <span style="color: red">**Click button below to add remarks by accesor</span>
            </div>
            

            <div class="d-flex justify-content-around">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks1Modal">
                    Remarks page 1
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks2Modal">
                    Remarks page 2
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarks3Modal">
                    Remarks page 3
                </button>


            </div>




        </div>
    </div>



    {{-- Remarks 1 --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleRemarks_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Example remarks by accesor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="" src="{{ URL::asset('assets/img/report/remarks_1.png') }}" alt="logo"
                        style="width: 100%; height: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Remarks 2 --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleRemarks2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="" src="{{ URL::asset('assets/img/report/remarks_2.png') }}"
                        alt="logo"style="width: 100%; height: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Remarks 3 --}}



    <!-- Modal -->
    <div class="modal fade" id="exampleRemarks3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="" src="{{ URL::asset('assets/img/report/remarks_3.png') }}"
                        alt="logo"style="width: 100%; height: 100%;">
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
                    <h1 class="modal-title fs-5" id="remarks1ModalLabel">Remarks page 1</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleRemarks_1">
                        Show example
                    </button><br>
                    




                    <form action="{{ route('Remup1') }}" method="POST" id="elementId">


                        @csrf

                        <input type="hidden" value="{{ $user->id }}" name="uid">
                        @if ($count > 0)
                            @foreach ($rem1 as $rem)
                                <div class="mb-3">
                                    {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                                    <textarea maxlength='80' class='form-control color-black' id='rem1inputId' name='value[]' placeholder='remarks'
                                        rows='2'>{{ $rem }}</textarea>

                                </div>
                            @endforeach
                        @else
                            <div class="mb-3">


                                <textarea maxlength="80" class="form-control color-black" name="value[]" id="exampleFormControlTextarea1"
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
                    <h1 class="modal-title fs-5" id="remarks2ModalLabel">Remarks page 2</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleRemarks2">
                        Show Example
                    </button>
                    
                    <form action="{{ route('Remup2') }}" method="POST" id="elementId2">
                        @csrf

                        <input type="hidden" value="{{ $user->id }}" name="uid">
                        @if ($count > 0)
                            @foreach ($rem2 as $rem)
                                <div class="mb-3">
                                    {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                                    <textarea maxlength='80' class='form-control color-black' id='rem2inputId' name='value[]' placeholder='remarks'
                                        rows='2'>{{ $rem }}</textarea>

                                </div>
                            @endforeach
                        @else
                            <div class="mb-3">


                                <textarea maxlength="80" class="form-control color-black" id="exampleFormControlTextarea1" rows="2"
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
                    <h1 class="modal-title fs-5" id="remarks3ModalLabel">Remarks page 3</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleRemarks3">
                        Show Example
                    </button>
                   
                    <form action="{{ route('Remup3') }}" method="POST" id="elementId3">
                        @csrf

                        <input type="hidden" value="{{ $user->id }}" name="uid">
                        @if ($count > 0)
                            @foreach ($rem3 as $rem)
                                <div class="mb-3">
                                    {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                                    <textarea maxlength='80' class='form-control color-black' id='rem3inputId' name='value[]' placeholder='remarks'
                                        rows='2'>{{ $rem }}</textarea>

                                </div>
                            @endforeach
                        @else
                            <div class="mb-3">


                                <textarea maxlength="80" class="form-control color-black" id="exampleFormControlTextarea1" rows="2"
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
