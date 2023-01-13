@extends('admin_template')
@section('content')
    <h1 class="title2 mb-3"> <i class="fas fa-bookmark"></i> Individual Report Template</h1>
    <h4 class="title2 mb-3"><i class="fas fa-home"></i> <a href="{{ route('ad_index') }}">Dashboard</a> / <a href="{{ route('template') }}"> Template</a> /  <a
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
                            <input type="hidden" name="style" value="D">
                            <div id="inputcon" class="exampleD">

                                <span id="ch">{{ $Dcount }}</span>
                                @foreach ($Dhigh as $i=>$Dhigh )
                                    @if($i>4)
                                        @break
                                    @endif
                                <div class="mb-3">
                                    <input type="text" value="{{ $Dhigh }}" class="form-control" id="D_High{{ $i+1 }}"
                                        placeholder="soalan" name="D_High{{ $i+1 }}">
                                </div>
                                @endforeach



                            </div>


                        </div>
                        <div class="col">
                            <p>Low</p>
                            <div id="inputcon" class="example2D">
                                <span id="cl">{{ $Dlcount }}</span>
                                @foreach ($DLow as $j=>$DLow )
                                    <div class="mb-3">
                                        @if($j>4)
                                            @break
                                        @endif
                                        <input type="text" value="{{ $DLow }}" class="form-control" id="D_low{{ $i+1 }}"
                                            placeholder="soalan" name="D_low{{ $j+1 }}">
                                    </div>
                                @endforeach





                            </div>
                        </div>
                        <div class="d-flex justify-content-between">

                            @if($i <4)
                                <button type="button" class="btn btn-primary" onclick="addro('High','D')">Add row H </button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('High','D')">Add row H </button>
                            @endif

                            @if($j <4)
                                <button id="btn-dL" type="button" class="btn btn-primary" onclick="addro('Low','D')">Add row L</button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('Low','D')">Add row L</button>
                            @endif
                        </div>
                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>
        <form action="{{ route('tempstore') }}" method="post" id="form_template">
            @csrf
            <div style="display: none" id="tab-i" class="card title2 col-10 mx-auto mb-3">
                <div class="card-header">
                    <h3 class="text-primary">Behaviour Template</h3>
                </div>

                <div class="card-body">

                    <h3 class="text-primary mb-3">Influance (i)</h3>
                    <div class="row">
                        <div class="col">
                            <p>High</p>
                            <div id="inputcon" class="exampleD">
                                <span id="ch">{{ $Icount }}</span>
                                @foreach ($Ihigh as $i=>$Ihigh )
                                    @if($i>4)
                                        @break
                                    @endif
                                <div class="mb-3">
                                    <input type="text" value="{{ $Ihigh }}" class="form-control" id="I_High{{ $i+1 }}"
                                        placeholder="soalan" name="I_High{{ $i+1 }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col">
                            <p>Low</p>
                            <div id="inputcon" class="example2D">
                                <span id="cl">{{ $Ilcount }}</span>
                                @foreach ($ILow as $j=>$ILow )
                                    <div class="mb-3">
                                        @if($j>4)
                                            @break
                                        @endif
                                        <input type="text" value="{{ $ILow }}" class="form-control" id="I_low{{ $i+1 }}"
                                            placeholder="soalan" name="I_low{{ $j+1 }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                            <div class="d-flex justify-content-between">

                            @if($i <4)
                                <button type="button" class="btn btn-primary" onclick="addro('High','I')">Add row H </button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('High','I')">Add row H </button>
                            @endif

                            @if($j <4)
                                <button id="btn-dL" type="button" class="btn btn-primary" onclick="addro('Low','I')">Add row L</button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('Low','I')">Add row L</button>
                            @endif
                        </div>
                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>
        <form action="{{ route('tempstore') }}" method="post" id="form_template">
            @csrf
            <div style="display: none" id="tab-S" class="card title2 col-10 mx-auto mb-3">
                <div class="card-header">
                    <h3 class="text-primary">Behaviour Template</h3>
                </div>

                <div class="card-body">

                    <h3 class="text-primary mb-3">Stediness (S)</h3>
                    <div class="row">
                        <div class="col">
                            <p>High</p>
                            <div id="inputcon" class="exampleD">
                                <span id="ch">{{ $Scount }}</span>
                                @foreach ($Shigh as $i=>$Shigh )
                                    @if($i>4)
                                        @break
                                    @endif
                                <div class="mb-3">
                                    <input type="text" value="{{ $Shigh }}" class="form-control" id="S_High{{ $i+1 }}"
                                        placeholder="soalan" name="S_High{{ $i+1 }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col">
                            <p>Low</p>
                            <div id="inputcon" class="example2D">
                                <span id="cl">{{ $Slcount }}</span>
                                @foreach ($SLow as $j=>$SLow )
                                    <div class="mb-3">
                                        @if($j>4)
                                            @break
                                        @endif
                                        <input type="text" value="{{ $SLow }}" class="form-control" id="S_low{{ $i+1 }}"
                                            placeholder="soalan" name="S_low{{ $j+1 }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">

                            @if($i <4)
                                <button type="button" class="btn btn-primary" onclick="addro('High','S')">Add row H </button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('High','S')">Add row H </button>
                            @endif

                            @if($j <4)
                                <button id="btn-dL" type="button" class="btn btn-primary" onclick="addro('Low','S')">Add row L</button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('Low','S')">Add row L</button>
                            @endif

                        </div>
                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>
        <form action="{{ route('tempstore') }}" method="post" id="form_template">
            @csrf
            <div style="display: none" id="tab-C" class="card title2 col-10 mx-auto mb-3">
                <div class="card-header">
                    <h3 class="text-primary">Behaviour Template</h3>
                </div>

                <div class="card-body">

                    <h3 class="text-primary mb-3">Compliance (i)</h3>
                    <div class="row">
                        <div class="col">
                            <p>High</p>
                            <div id="inputcon" class="exampleD">
                                <span id="ch">{{ $Ccount }}</span>
                                @foreach ($Chigh as $i=>$Chigh )
                                    @if($i>4)
                                        @break
                                    @endif
                                <div class="mb-3">
                                    <input type="text" value="{{ $Chigh }}" class="form-control" id="C_High{{ $i+1 }}"
                                        placeholder="soalan" name="C_High{{ $i+1 }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col">
                            <p>Low</p>
                            <div id="inputcon" class="example2D">
                                <span id="cl">{{ $Clcount }}</span>
                                @foreach ($CLow as $j=>$CLow )
                                    <div class="mb-3">
                                        @if($j>4)
                                            @break
                                        @endif
                                        <input type="text" value="{{ $CLow }}" class="form-control" id="C_low{{ $i+1 }}"
                                            placeholder="soalan" name="C_low{{ $j+1 }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">

                            @if($i <4)
                                <button type="button" class="btn btn-primary" onclick="addro('High','S')">Add row H </button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('High','S')">Add row H </button>
                            @endif

                            @if($j <4)
                                <button id="btn-dL" type="button" class="btn btn-primary" onclick="addro('Low','S')">Add row L</button>
                            @else
                                <button disabled type="button" class="btn btn-primary" onclick="addro('Low','S')">Add row L</button>
                            @endif

                        </div>
                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>


        {{-- end form --}}



{{-- <x-t_function/> --}}

    <script src="{{ URL::asset('assets/js/funnew.js') }}"></script>


@endsection
