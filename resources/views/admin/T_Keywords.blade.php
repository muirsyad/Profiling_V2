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
    <h4 class="title2 mb-3"><i class="fas fa-home"></i> <a href="{{ route('ad_index') }}">Dashboard</a> / <a href="{{ route('template') }}"> Template</a> / <a
            href="{{ route('key') }}">Keywords</a></h4>

    {{-- start form --}}
        <div class="d-flex justify-content-evenly mb-3">
            <button id="btn-D" type="button" class="btn btn-primary">Show D</button>
            <button id="btn-i" type="button" class="btn btn-primary">Show i</button>
            <button id="btn-S" type="button" class="btn btn-primary">Show S</button>
            <button id="btn-C" type="button" class="btn btn-primary">Show C</button>
        </div>
    <form action="{{ route('keywordsstore') }}" method="post" id="form_template">
        @csrf
        <div id="tab-D" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Keywords Template</h3>
            </div>

            <div class="card-body">

                <h3 class="text-primary mb-3">Dominance (D)</h3>
                <div class="row">
                    <div class="col">
                        <p>High</p>
                        <input type="hidden" name="style" value="D">
                        <div id="inputcon" class="exampleD">

                            <span id="ch">{{ $count_kd }}</span>
                            @foreach ($keyD as $i=>$keyD )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $keyD }}" class="form-control" id="keyD{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">
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


                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>


            </div>
        </div>
    </form>

    <form action="{{ route('keywordsstore') }}" method="post" id="form_template">
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
                        <input type="hidden" name="style" value="I">
                        <div id="inputcon" class="exampleD">
                            <span id="ch">{{ $count_ki }}</span>
                            @foreach ($keyI as $i=>$keyI )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $keyI }}" class="form-control" id="keyI{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">
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


                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save template</button>
                    </div>
                </div>


            </div>
        </div>
    </form>

    <form action="{{ route('keywordsstore') }}" method="post" id="form_template">
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
                            <input type="hidden" name="style" value="S">

                            <span id="ch">{{ $count_ks }}</span>
                            @foreach ($keyS as $i=>$keyS )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $keyS }}" class="form-control" id="keyS{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">
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



                    </div>
                    <div class="p-4">
                        <button type="submit" class="btn btn-primary">Save template</button>
                    </div>
                </div>


            </div>
        </div>
    </form>

    <form action="{{ route('keywordsstore') }}" method="post" id="form_template">
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
                            <input type="hidden" name="style" value="C">

                            <span id="ch">{{ $count_kc }}</span>
                            @foreach ($keyC as $i=>$keyC )
                                @if($i>4)
                                    @break
                                @endif
                            <div class="mb-3">
                                <input type="text" value="{{ $keyC }}" class="form-control" id="keyC{{ $i+1 }}"
                                    placeholder="soalan" name="value[]">
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
