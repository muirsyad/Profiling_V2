@extends('admin_template')
@section('content')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session()->get('message') }}',
                icon: 'success',
                confirmButtonText: 'Okey'
            })
        </script>
    @endif

    <h1 class="title2 mb-3"> <i class="fas fa-bookmark"></i> Individual Report Template TESTING</h1>
    <h4 class="title2 mb-3"><i class="fas fa-home"></i> <a href="{{ route('ad_index') }}">Dashboard</a> / <a
            href="{{ route('template') }}"> Template</a> / <a href="{{ route('indTemp') }}">Individual</a></h4>


    <div class="d-flex justify-content-evenly mb-3">
        <button id="btn-D" type="button" class="btn btn-primary">Show D</button>
        <button id="btn-i" type="button" class="btn btn-primary">Show i</button>
        <button id="btn-S" type="button" class="btn btn-primary">Show S</button>
        <button id="btn-C" type="button" class="btn btn-primary">Show C</button>
    </div>

    

    <form action="{{ route('fearstore') }}" method="post" id="form_template">
        @csrf
        <div id="tab-D" class="card title2 col-10 mx-auto mb-3 tab-d">
            <div class="card-header">
                <h3 class="text-primary">Fear & Motivation Template</h3>
            </div>
            <div class="card-body">
                <h3 class="text-primary mb-3">Dominance (D)</h3>
                
                <div class="row">
                    <div class="col">
                        <p>Fear</p>
                        <input type="hidden" name="style" value="D">
                        <div id="inputconDH" class="exampleDH">
                            {{-- <span id="ch">{{ $Dcount }}</span> --}}
                            {{-- <input id="chD" type="hidden" value="{{ $Dcount }}"> --}}
                            @foreach ($Dfear as $i => $Dfear)
                                @if ($i > 4)
                                    @break
                                @endif
                                <p id="diDH{{ $i }}"></p>
                                <div class="mb-3">
                                    <input type="text" value="{{ $Dfear }}" class="form-control inputDH"
                                    id="inDH{{ $i }}" placeholder="soalan" name="valueH[]" maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <p>Motivation</p>
                        <div id="inputconDL" class="exampleDL">
                            {{-- <span id="cl">{{ $Dlcount }}</span> --}}
                            {{-- <input id="clD" type="hidden" value="{{ $Dlcount }}"> --}}
                            @foreach ($Dmot as $j => $Dmot)
                                @if ($j > 4)
                                    @break
                                @endif
                                <p id="diDL{{ $j }}"></p>
                                <div class="mb-3">
                                    <input type="text" value="{{ $Dmot }}" class="form-control inputDL"
                                        id="inDL{{ $j }}" placeholder="soalan" name="valueL[]"
                                        maxlength="100">
                                </div>
                                
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button id="row-DH" type="button" class="btn btn-primary">Add row H</button>
                    <button id="row-DL" type="button" class="btn btn-primary">Add row L</button>
                </div>
                <div class="p-4">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>

        </div>

    </form>

    <form action="{{ route('fearstore') }}" method="post" id="form_template">
        @csrf
        <input type="hidden" name="style" value="I">
        <div style="display: none " id="tab-i" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Fear & Motivation Template</h3>
            </div>
            <div class="card-body">
                <h3 class="text-primary mb-3">Influance (i)</h3>
                
                <div class="row">
                    <div class="col">
                        <p>Fear</p>
                        <div id="inputconIH" class="exampleIH">
                            {{-- <span id="ch">{{ $Icount }}</span>
                            <input id="chI" type="hidden" value="{{ $Icount }}"> --}}
                            @foreach ($Ifear as $i => $Ifear)
                                @if ($i > 4)
                                    @break
                                @endif
                                <p id="diIH{{ $i }}"></p>
                                <div class="mb-3">
                                    <input type="text" value="{{ $Ifear }}" class="form-control inputIH"
                                    id="inIH{{ $i }}" placeholder="soalan" name="valueH[]"
                                    maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <p>Motivation</p>
                        <div id="inputconIL" class="exampleIL">
                            {{-- <span id="cl">{{ $Ilcount }}</span>
                            <input id="clI" type="hidden" value="{{ $Ilcount }}"> --}}

                            @foreach ($Imot as $j => $Imot)
                                    @if ($j > 4)
                                        @break
                                    @endif
                                    <p id="diIL{{ $j }}"></p>
                                    <div class="mb-3">
                                        <input type="text" value="{{ $Imot }}" class="form-control inputIL"
                                        id="inIL{{ $j }}" placeholder="soalan" name="valueL[]"
                                        maxlength="100">
                                    </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button id="row-IH" type="button" class="btn btn-primary">Add row H</button>
                    <button id="row-IL" type="button" class="btn btn-primary">Add row L</button>
                </div>
                <div class="p-4">
                    <button type="submit" class="btn btn-primary">Save template</button>
                </div>

            </div>
        </div>

    </form>

    <form action="{{ route('fearstore') }}" method="post" id="form_template">
        @csrf
        <input type="hidden" name="style" value="S">
        <div style="display: none " id="tab-S" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Fear & Motivation Template</h3>
            </div>
            <div class="card-body">
                <h3 class="text-primary mb-3">Stediness (S)</h3>

                
                <div class="row">
                    <div class="col">
                        <p>Fear</p>
                        <div id="inputconSH" class="exampleSH">
                            {{-- <span id="ch">{{ $Scount }}</span>
                            <input id="chS" type="hidden" value="{{ $Scount }}"> --}}

                            @foreach ($Sfear as $i => $Sfear)
                                @if ($i > 4)
                                    @break
                                @endif
                                <p id="diSH{{ $i }}"></p>
                                <div class="mb-3">
                                    <input type="text" value="{{ $Sfear }}" class="form-control inputSH"
                                    id="inSH{{ $i }}" placeholder="soalan" name="valueH[]"
                                    maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <p>Motivation</p>
                        <div id="inputconSL" class="exampleSL">
                            {{-- <span id="cl">{{ $Slcount }}</span>
                            <input id="clS" type="hidden" value="{{ $Slcount }}"> --}}

                            @foreach ($Smot as $j => $Smot)
                                @if ($j > 4)
                                    @break
                                @endif
                                <p id="diSL{{ $j }}"></p>
                                <div class="mb-3">
                                    <input type="text" value="{{ $Smot }}" class="form-control inputSL"
                                    id="inSL{{ $j }}" placeholder="soalan" name="valueL[]"
                                    maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-between">
                    <button id="row-SH" type="button" class="btn btn-primary">Add row H</button>
                    <button id="row-SL" type="button" class="btn btn-primary">Add row L</button>
                </div>
                <div class="p-4">
                    <button type="submit" class="btn btn-primary">Save template</button>
                </div>

            </div>

        </div>

    </form>
    <form action="{{ route('fearstore') }}" method="post" id="form_template">
        @csrf
        <input type="hidden" name="style" value="C">
        <div style="display: none " id="tab-C" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Fear & Motivation Template</h3>
            </div>
            <div class="card-body">
                <h3 class="text-primary mb-3">Compliance (C)</h3>

                
                <div class="row">
                    <div class="col">
                        <p>Fear</p>
                        <div id="inputconCH" class="exampleCH">
                            {{-- <span id="ch">{{ $Ccount }}</span>
                            <input id="chC" type="hidden" value="{{ $Ccount }}"> --}}

                            @foreach ($Cfear as $i => $Cfear)
                                @if ($i > 4)
                                    @break
                                @endif
                                <p id="diCH{{ $i }}"></p>
                                <div class="mb-3">
                                    <input type="text" value="{{ $Cfear }}" class="form-control inputCH"
                                    id="inCH{{ $i }}" placeholder="soalan" name="valueH[]"
                                    maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <p>Motivation</p>
                        <div id="inputconCL" class="exampleCL">
                            {{-- <span id="cl">{{ $Clcount }}</span>
                            <input id="clC" type="hidden" value="{{ $Clcount }}"> --}}

                            @foreach ($Cmot as $j => $Cmot)
                                @if ($j > 4)
                                    @break
                                @endif
                                <p id="diCL{{ $j }}"></p>
                                <div class="mb-3">
                                    <input type="text" value="{{ $Cmot }}" class="form-control inputCL"
                                    id="inCL{{ $j }}" placeholder="soalan" name="valueL[]"
                                    maxlength="100">
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-between">
                    <button id="row-CH" type="button" class="btn btn-primary">Add row H</button>
                    <button id="row-CL" type="button" class="btn btn-primary">Add row L</button>

                </div>
                <div class="p-4">
                    <button type="submit" class="btn btn-primary">Save template</button>
                </div>

            </div>

        </div>

    </form>
<script src="{{ URL::asset('assets/js/funnew.js') }}"></script>
<script src="{{ URL::asset('assets/js/beh.js') }}"></script>
@endsection
