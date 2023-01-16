@extends('acc_template')
@section('content')
    <h1>TEST</h1>

    <div class="card">
        <div class="card-body">
            <h1>Name : {{ $user->name }}</h1>
            <h1>Email : {{ $user->email }}</h1>
            <h1>Department : {{ $user->department }}</h1>
            <h1>Complete Assasment : {{ $user->status }}</h1>
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
    <div class="modal fade" id="remarks1Modal" tabindex="-1" aria-labelledby="remarks1ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="remarks1ModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    Remarks 1
                    @if ($count > 0)
                    <form action="{{ route('Remup1') }}" method="POST" id="elementId">
                    @else
                    <form action="{{ route('Remup1') }}" method="POST" id="elementId">
                    @endif
                    
                        @csrf
                        
                        <input type="hidden" value="{{$user->id}}" name="uid">
                        @if ($count > 0)
                        @foreach ($rem1 as $rem)
                        <div class="mb-3">
                            {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                            <textarea maxlength='110' class='form-control' id='rem1inputId' name='value[]' placeholder='remarks' rows='2'>{{$rem}}</textarea>
                            
                        </div>
                        @endforeach
                        @else
                        <div class="mb-3">
                           

                        <textarea maxlength="110" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="remarks"></textarea>
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
    <div class="modal fade" id="remarks2Modal" tabindex="-1" aria-labelledby="remarks2ModalLabel" aria-hidden="true">
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
                        
                        <input type="hidden" value="{{$user->id}}" name="uid">
                        @if ($count > 0)
                        @foreach ($rem2 as $rem)
                        <div class="mb-3">
                            {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                            <textarea maxlength='110' class='form-control' id='rem2inputId' name='value[]' placeholder='remarks' rows='2'>{{$rem}}</textarea>
                            
                        </div>
                        @endforeach
                        @else
                        <div class="mb-3">
                            

                        <textarea maxlength="110" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="remarks"></textarea>
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
    <div class="modal fade" id="remarks3Modal" tabindex="-1" aria-labelledby="remarks3ModalLabel" aria-hidden="true">
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
                        
                        <input type="hidden" value="{{$user->id}}" name="uid">
                        @if ($count > 0)
                        @foreach ($rem3 as $rem)
                        <div class="mb-3">
                            {{-- <input maxlength="90" value="{{$rem}}" type="text"class="form-control" placeholder="soalan" name="value[]"
                            id="inputId"> --}}
                            <textarea maxlength='110' class='form-control' id='rem3inputId' name='value[]' placeholder='remarks' rows='2'>{{$rem}}</textarea>
                            
                        </div>
                        @endforeach
                        @else
                        <div class="mb-3">
            

                        <textarea maxlength="110" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="remarks"></textarea>
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
