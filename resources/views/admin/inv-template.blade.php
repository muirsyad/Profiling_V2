@extends('admin_template')
@section('content')
    <h1 class="title2 mb-3"> <i class="fas fa-bookmark"></i> Individual Report Template</h1>
    <h4 class="title2 mb-3"><i class="fas fa-home"></i> <a href="{{ route('ad_index') }}">Dashboard</a> / <a
            href="{{ route('indTemp') }}">Individual</a></h4>

    {{-- start form --}}
        <div class="d-flex justify-content-evenly mb-3">
            <button id="btn-D" type="button" class="btn btn-primary">Show D</button>
            <button id="btn-i" type="button" class="btn btn-primary">Show i</button>
            <button id="btn-S" type="button" class="btn btn-primary">Show S</button>
            <button id="btn-C" type="button" class="btn btn-primary">Show C</button>
        </div>
    <form action="{{ route('tempstore') }}" method="post" id="form_template">
        @csrf
        <div id="tab-D" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Dominance (D)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <div id="inputcon" class="exampleD">
                            {{-- <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="soalan" name="High1">
                            </div> --}}
                            <span id="chD">{{ $Dcount }}</span>
                            {{-- <input type="text" value="{{ $Dcount }}"> --}}
                            @foreach ($Dhigh as $i=>$Dhigh )
                            <div class="mb-3">
                                <input type="text" value="{{ $Dhigh }}" class="form-control" id="D_HIgh{{ $i+1 }}"
                                    placeholder="soalan" name="D_HIgh{{ $i+1 }}">
                            </div>
                            @endforeach



                        </div>


                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="example2D">
                            <span id="cl">{{ $Dlcount }}</span>
                            {{-- <input type="text" value="{{ $Dcount }}"> --}}
                            @foreach ($DLow as $i=>$DLow )
                            <div class="mb-3">
                                <input type="text" value="{{ $DLow }}" class="form-control" id="D_low{{ $i+1 }}"
                                    placeholder="soalan" name="D_low{{ $i+1 }}">
                            </div>
                            @endforeach



                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <button type="button" class="btn btn-primary" onclick="addro('High','D')">Add row H </button>
                        <button type="button" class="btn btn-primary" onclick="removero('HIgh','D',{{ $Dcount }})">Add row H </button>

                        <button type="button" class="btn btn-primary" onclick="addro('Low','D')">Add row L</button>

                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>


            </div>
        </div>

        <div style="display: none" id="tab-i" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Influance (i)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <div id="inputcon" class="examplei">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="soalan" name="High1">
                            </div>



                        </div>


                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="example2i">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="soalan" name="Low1">
                            </div>



                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <button type="button" class="btn btn-primary" onclick="addro('High','i')">Add row H </button>

                        <button type="button" class="btn btn-primary" onclick="addro('Low','i')">Add row L</button>

                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save template</button>
                    </div>
                </div>


            </div>
        </div>

        <div style="display: none" id="tab-S" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Stediness (S)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <div id="inputcon" class="examplei">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="soalan" name="High1">
                            </div>



                        </div>


                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="example2i">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="soalan" name="Low1">
                            </div>



                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <button type="button" class="btn btn-primary" onclick="addro('High','S')">Add row H </button>

                        <button type="button" class="btn btn-primary" onclick="addro('Low','S')">Add row L</button>

                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save template</button>
                    </div>
                </div>


            </div>
        </div>

        <div style="display: none" id="tab-C" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Influance (i)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <div id="inputcon" class="examplei">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="soalan" name="High1">
                            </div>



                        </div>


                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="example2i">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="soalan" name="Low1">
                            </div>



                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <button type="button" class="btn btn-primary" onclick="addro('High','C')">Add row H </button>

                        <button type="button" class="btn btn-primary" onclick="addro('Low','C')">Add row L</button>

                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save template</button>
                    </div>
                </div>


            </div>
        </div>





        {{-- end form --}}
    </form>


<x-t_function/>

    <script src="{{ URL::asset('assets/js/functionjs.js') }}"></script>


@endsection
