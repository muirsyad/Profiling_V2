@extends('admin_template')
@section('content')

            @if (session()->has('message'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text:  '{{ session()->get('message') }}',
                    icon: 'success',
                    confirmButtonText: 'Okey'
                })
            </script>
            @endif
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
                        <div id="inputcon" class="exampleDH">

                            <span id="ch">{{ $Dcount }}</span>
                            <input id="chD" type="hidden" value="{{ $Dcount }}">
                            @foreach ($Dhigh as $i=>$Dhigh )

                            <div class="mb-3">
                                <input type="text" value="{{ $Dhigh }}" class="form-control" id="D_High{{ $i+1 }}"
                                    placeholder="soalan" name="valueH[]" maxlength="100">
                            </div>
                            @endforeach



                        </div>


                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="exampleDL">
                            <span id="cl">{{ $Dlcount }}</span>
                            <input id="clD" type="hidden" value="{{ $Dlcount }}">
                            @foreach ($DLow as $j=>$DLow )
                                <div class="mb-3">
                                    @if($j>4)
                                        @break
                                    @endif
                                    <input type="text" value="{{ $DLow }}" class="form-control" id="D_low{{ $i+1 }}"
                                        placeholder="soalan" name="valueL[]" maxlength="100">
                                </div>
                            @endforeach





                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button id="btnH-rowD" type="button" class="btn btn-primary" onclick="addrow1('High','D')">Add row H </button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('High','D')">Add row H </button>
                        @endif

                        @if($j <4)
                            <button id="btnL-rowD" type="button" class="btn btn-primary" onclick="addrow1('Low','D')">Add row L</button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('Low','D')">Add row L</button>
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
        <input type="hidden" name="style" value="I">
        <div style="display: none" id="tab-i" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Influance (i)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <div id="inputcon" class="exampleIH">
                            <span id="ch">{{ $Icount }}</span>
                            <input id="chI" type="hidden" value="{{ $Icount }}">

                            @foreach ($Ihigh as $i=>$Ihigh )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $Ihigh }}" class="form-control" id="I_High{{ $i+1 }}"
                                    placeholder="soalan" name="valueH[]" maxlength="100">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="exampleIL">
                            <span id="cl">{{ $Ilcount }}</span>
                            <input id="clI" type="hidden" value="{{ $Ilcount }}">

                            @foreach ($ILow as $j=>$ILow )
                                <div class="mb-3">
                                    @if($j>4)
                                        @break
                                    @endif
                                    <input type="text" value="{{ $ILow }}" class="form-control" id="I_low{{ $i+1 }}"
                                        placeholder="soalan" name="valueL[]" maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                        <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button id="btnH-rowI" type="button" class="btn btn-primary" onclick="addrow1('High','I')">Add row H </button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('High','I')">Add row H </button>
                        @endif

                        @if($j <4)
                            <button id="btnL-rowI" type="button" class="btn btn-primary" onclick="addrow1('Low','I')">Add row L</button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('Low','I')">Add row L</button>
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
                <input type="hidden" name="style" value="S">

        <div style="display: none" id="tab-S" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Stediness (S)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <div id="inputcon" class="exampleSH">
                            <span id="ch">{{ $Scount }}</span>
                            <input id="chS" type="hidden" value="{{ $Scount }}">

                            @foreach ($Shigh as $i=>$Shigh )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $Shigh }}" class="form-control" id="S_High{{ $i+1 }}"
                                    placeholder="soalan" name="valueH[]" maxlength="100">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="exampleSL">
                            <span id="cl">{{ $Slcount }}</span>
                            <input id="clS" type="hidden" value="{{ $Slcount }}">

                            @foreach ($SLow as $j=>$SLow )
                                <div class="mb-3">
                                    @if($j>4)
                                        @break
                                    @endif
                                    <input type="text" value="{{ $SLow }}" class="form-control" id="S_low{{ $i+1 }}"
                                        placeholder="soalan" name="valueL[]" maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button id="btnH-rowS" type="button" class="btn btn-primary" onclick="addrow1('High','S')">Add row H </button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('High','S')">Add row H </button>
                        @endif

                        @if($j <4)
                            <button id="btnH-rowS" type="button" class="btn btn-primary" onclick="addrow1('Low','S')">Add row L</button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('Low','S')">Add row L</button>
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
        <input type="hidden" name="style" value="C">

        <div style="display: none" id="tab-C" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Behaviour Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Compliance (C)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <div id="inputcon" class="exampleCH">
                            <span id="ch">{{ $Ccount }}</span>
                            <input id="chC" type="hidden" value="{{ $Ccount }}">

                            @foreach ($Chigh as $i=>$Chigh )

                            <div class="mb-3">
                                <input type="text" value="{{ $Chigh }}" class="form-control" id="C_High{{ $i+1 }}"
                                    placeholder="soalan" name="valueH[]" maxlength="100">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <p>Low</p>
                        <div id="inputcon" class="exampleCL">
                            <span id="cl">{{ $Clcount }}</span>
                            <input id="clC" type="hidden" value="{{ $Clcount }}">

                            @foreach ($CLow as $j=>$CLow )
                                <div class="mb-3">
                                    @if($j>4)
                                        @break
                                    @endif
                                    <input type="text" value="{{ $CLow }}" class="form-control" id="C_low{{ $i+1 }}"
                                        placeholder="soalan" name="valueL[]" maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        @if($i <5)
                            <button id="btnH-rowC" type="button" class="btn btn-primary" onclick="addrow1('High','C')">Add row H </button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('High','C')">Add row H </button>
                        @endif

                        @if($j <5)
                            <button  id="btnL-rowC" type="button" class="btn btn-primary" onclick="addrow1('Low','C')">Add row L</button>
                        @else
                            <button disabled type="button" class="btn btn-primary" onclick="addrow1('Low','C')">Add row L</button>
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
    </form>


{{-- <x-t_function/> --}}

    <script src="{{ URL::asset('assets/js/funnew.js') }}"></script>


@endsection
