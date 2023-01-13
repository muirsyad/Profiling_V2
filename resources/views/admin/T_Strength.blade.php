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
            href="{{ route('strength') }}">Strength</a></h4>

    {{-- start form --}}
        <div class="d-flex justify-content-evenly mb-3">
            <button id="btn-D" type="button" class="btn btn-primary">Show D</button>
            <button id="btn-i" type="button" class="btn btn-primary">Show i</button>
            <button id="btn-S" type="button" class="btn btn-primary">Show S</button>
            <button id="btn-C" type="button" class="btn btn-primary">Show C</button>
        </div>
    <form action="{{ route('strengthstore') }}" method="post" id="form_template">
        @csrf
        <div id="tab-D" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Strength Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Dominance (D)</h3>
                <div class="row">
                    <div class="col">

                        <input type="hidden" name="style" value="D">
                        <div id="inputcon" class="exampleD">
                            {{-- <span id="ch">{{ $Dcount }}</span> --}}
                            @foreach ($SD as $i=>$Dhigh )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $Dhigh }}" class="form-control" id="D_High{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">

                            </div>

                            @endforeach
                            <input id="countD" type="hidden" value="{{ $countD }}">



                        </div>


                    </div>

                    <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button id="btn-rowD" type="button" class="btn btn-primary" onclick="addro1('D')">Add row H </button>
                        @else
                            <button id="btn-rowD" disabled type="button" class="btn btn-primary" onclick="addro1('D')">Add row H </button>
                        @endif


                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>


            </div>
        </div>
    </form>
    <form action="{{ route('strengthstore') }}" method="post" id="form_template">
        @csrf
        <div style="display: none" id="tab-i" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Strength Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Influance (i)</h3>
                <div class="row">
                    <div class="col">

                        <div id="inputcon" class="exampleI">
                            <input type="hidden" name="style" value="I">
                            @foreach ($SI as $i=>$Ihigh )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $Ihigh }}" class="form-control" id="I_High{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">

                            </div>
                            @endforeach
                            <input id="countI" type="hidden" value="{{ $countI }}">

                        </div>
                    </div>

                        <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button id="btn-rowI" type="button" class="btn btn-primary" onclick="addro1('I')">Add row H </button>
                        @else
                            <button id="btn-rowI" disabled type="button" class="btn btn-primary" onclick="addro1('I')">Add row H </button>
                        @endif


                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save template</button>
                    </div>
                </div>


            </div>
        </div>
    </form>
    <form action="{{ route('strengthstore') }}" method="post" id="form_template">
        @csrf
        <div style="display: none" id="tab-S" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Strength Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Stediness (S)</h3>
                <div class="row">
                    <div class="col">

                        <div id="inputcon" class="exampleS">
                            {{-- <span id="ch">{{ $Scount }}</span> --}}
                            @foreach ($SS as $i=>$Shigh )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $Shigh }}" class="form-control" id="S_High{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">
                                    <input type="hidden" name="style" value="S">

                            </div>
                            @endforeach
                            <input id="countS" type="hidden" value="{{ $countS }}">

                        </div>
                    </div>

                    <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button id="btn-rowS" type="button" class="btn btn-primary" onclick="addro1('S')">Add row H </button>
                        @else
                            <button id="btn-rowS" disabled type="button" class="btn btn-primary" onclick="addro1('S')">Add row H </button>
                        @endif



                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save template</button>
                    </div>
                </div>


            </div>
        </div>
    </form>
    <form action="{{ route('strengthstore') }}" method="post" id="form_template">
        @csrf
        <div style="display: none" id="tab-C" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Strength Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Compliance (C)</h3>
                <div class="row">
                    <div class="col">

                        <div id="inputcon" class="exampleC">
                            {{-- <span id="ch">{{ $Ccount }}</span> --}}
                            @foreach ($SC as $i=>$Chigh )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $Chigh }}" class="form-control" id="C_High{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">

                                    <input type="hidden" name="style" value="C">

                            </div>
                            @endforeach
                            <input id="countC" type="hidden" value="{{ $countC }}">

                        </div>
                    </div>

                    <div class="d-flex justify-content-between">

                        @if($i <4)
                            <button id="btn-rowC" type="button" class="btn btn-primary" onclick="addro1('C')">Add row H </button>
                        @else
                            <button id="btn-rowC" disabled type="button" class="btn btn-primary" onclick="addro1('C')">Add row H </button>
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

    <script src="{{ URL::asset('assets/js/func2.js') }}"></script>


@endsection
