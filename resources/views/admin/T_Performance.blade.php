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
            href="{{ route('key') }}">Performance  </a></h4>

    {{-- start form --}}
        <div class="d-flex justify-content-evenly mb-3">
            <button id="btn-D" type="button" class="btn btn-primary">Show D</button>
            <button id="btn-i" type="button" class="btn btn-primary">Show i</button>
            <button id="btn-S" type="button" class="btn btn-primary">Show S</button>
            <button id="btn-C" type="button" class="btn btn-primary">Show C</button>
        </div>
    {{-- <form action="{{ route('keywordsstore') }}" method="post" id="form_template">
        @csrf --}}
        <div id="tab-D" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Performance Template</h3>

            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                    <button id="btn-motivate" type="button" class="btn btn-primary">Personal Improvement</button>
                    <button id="btn-best" type="button" class="btn btn-primary">Others Can Work Better</button>
                    <button id="btn-demotivate" type="button" class="btn btn-primary">Others Should Avoid</button>
                    <button id="btn-worst" type="button" class="btn btn-primary">Working Environment</button>
                </div>

                <h3 class="text-primary mb-3">Dominance (D)</h3>
                
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>

                <div id="tab-motivate">
                    <h4 class="text-primary mb-3">Personal Improvement</h4>
                    {{-- <div id="d_charNum_im"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="A_improve">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $perD[0] as $i =>$improve )
                        <div class="mb-3">
                            {{-- <p class="dlimit_im{{$i+1}}">(0/100)</p> --}}
                            <div class="d_count_im">
                            <input type="textbox" value="{{ $improve }}" class="form-control" id="d_im{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best" style="display: none">
                    <h4 class="text-primary mb-3">Others can works better</h4>
                    {{-- <div id="d_charNum_bet"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_better">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $perD[1] as $i =>$better )
                        <div class="mb-3">
                            {{-- <p class="dlimit_bet{{$i+1}}">(0/100)</p> --}}
                            <div class="d_count_bet">
                            <input type="textbox" value="{{ $better }}" class="form-control" id="d_bet{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110" >
                                </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate" style="display: none">
                    <h4 class="text-primary mb-3">Others shloud avoid</h4>
                    {{-- <div id="d_charNum_avo"></div> --}}

                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_avoid">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $perD[2] as $i =>$avoid )
                        <div class="mb-3">
                            {{-- <p class="dlimit_avo{{$i+1}}">(0/100)</p> --}}
                            <div class="d_count_avo">
                            <input type="textbox" value="{{ $avoid }}" class="form-control" id="d_avo{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110" >
                                </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst" style="display: none">
                    <h4 class="text-primary mb-3">Working Environment</h4>
                    {{-- <div id="d_charNum_env"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Y_environment">
                        <input type="hidden" name="style" value="D">
                        @foreach ( $perD[3] as $i =>$env )
                        <div class="mb-3">
                            {{-- <p class="dlimit_env{{$i+1}}">(0/100)</p> --}}
                            <div class="d_count_env">
                            <input type="textbox" value="{{ $env }}" class="form-control" id="d_env{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                                </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

        <div style="display: none" id="tab-i" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Performance Template</h3>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                   <button id="btn-motivate1" type="button" class="btn btn-primary">Personal Improvement</button>
                    <button id="btn-best1" type="button" class="btn btn-primary">Others Can Work Better</button>
                    <button id="btn-demotivate1" type="button" class="btn btn-primary">Others Should Avoid</button>
                    <button id="btn-worst1" type="button" class="btn btn-primary">Working Environment</button>
                </div>

                <h3 class="text-primary mb-3">Influance (i)</h3>
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>

                <div id="tab-motivate1"  >
                    <h4 class="text-primary mb-3">Personal Improvement</h4>
                    {{-- <div id="i_charNum_im"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="A_improve">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $perI[0] as $i =>$improve )
                        <div class="mb-3">
                            {{-- <p class="ilimit_im{{$i+1}}">(0/100)</p> --}}
                            <div class="i_count_im">
                            <input type="textbox" value="{{ $improve }}" class="form-control" id="i_im{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best1" style="display: none">
                    <h4 class="text-primary mb-3">Others can works better</h4>
                    {{-- <div id="i_charNum_bet"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_better">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $perI[1] as $i =>$better )
                        <div class="mb-3">
                            {{-- <p class="ilimit_bet{{$i+1}}">(0/100)</p> --}}
                            <div class="i_count_bet">
                            <input type="textbox" value="{{ $better }}" class="form-control" id="i_bet{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate1" style="display: none">
                    <h4 class="text-primary mb-3">Others shloud avoid</h4>
                    {{-- <div id="i_charNum_avo"></div> --}}

                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_avoid">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $perI[2] as $i =>$avoid )
                        <div class="mb-3">
                            {{-- <p class="ilimit_avo{{$i+1}}">(0/100)</p> --}}
                            <div class="i_count_avo">
                            <input type="textbox" value="{{ $avoid }}" class="form-control" id="i_avo{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst1" style="display: none">
                    <h4 class="text-primary mb-3">Working Environment</h4>
                    {{-- <div id="i_charNum_env"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Y_environment">
                        <input type="hidden" name="style" value="I">
                        @foreach ( $perI[3] as $i =>$env )
                        <div class="mb-3">
                            {{-- <p class="ilimit_env{{$i+1}}">(0/100)</p> --}}
                            <div class="i_count_env">
                            <input type="text" value="{{ $env }}" class="form-control" id="i_env{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

        <div style="display: none" id="tab-S" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Performance Template</h3>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                    <button id="btn-motivate2" type="button" class="btn btn-primary">Personal Improvement</button>
                    <button id="btn-best2" type="button" class="btn btn-primary">Others Can Work Better</button>
                    <button id="btn-demotivate2" type="button" class="btn btn-primary">Others Should Avoid</button>
                    <button id="btn-worst2" type="button" class="btn btn-primary">Working Environment</button>
                </div>

                <h3 class="text-primary mb-3">Steadiness (S)</h3>
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>

                <div id="tab-motivate2">
                    <h4 class="text-primary mb-3">Personal Improvement</h4>
                    {{-- <div id="s_charNum_im"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="A_improve">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $perS[0] as $i =>$improve )
                        <div class="mb-3">
                            {{-- <p id="slimit_im{{$i+1}}">(0/100)</p> --}}
                            <div class="s_count_im">
                                <input type="textbox" value="{{ $improve }}" class="form-control" id="s_im{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                            
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best2" style="display: none">
                    <h4 class="text-primary mb-3">Others can works better</h4>
                    {{-- <div id="s_charNum_bet"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_better">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $perS[1] as $i =>$better )
                        <div class="mb-3">
                            {{-- <p id="slimit_bet{{$i+1}}">(0/100)</p> --}}
                            <div class="s_count_bet">
                            <input type="textbox" value="{{ $better }}" class="form-control" id="s_bet{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate2" style="display: none">
                    <h4 class="text-primary mb-3">Others shloud avoid</h4>
                    {{-- <div id="s_charNum_avo"></div> --}}

                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_avoid">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $perS[2] as $i =>$avoid )
                        <div class="mb-3">
                            {{-- <p id="slimit_avo{{$i+1}}">(0/100)</p> --}}
                            <div class="s_count_avo">
                            <input type="textbox" value="{{ $avoid }}" class="form-control" id="s_avo{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst2" style="display: none">
                    <h4 class="text-primary mb-3">Working Environment</h4>
                    {{-- <div id="s_charNum_env"></div> --}}

                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Y_environment">
                        <input type="hidden" name="style" value="S">
                        @foreach ( $perS[3] as $i =>$env )
                        <div class="mb-3">
                            {{-- <p id="slimit_env{{$i+1}}">(0/100)</p> --}}
                            <div class="s_count_env">
                            <input type="textbox" value="{{ $env }}" class="form-control" id="s_env{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

        <div style="display: none" id="tab-C" class="card title2 col-10 mx-auto mb-3">
            <div class="card-header">
                <h3 class="text-primary">Performance Template</h3>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-evenly mb-3">
                    <button id="btn-motivate3" type="button" class="btn btn-primary">Personal Improvement</button>
                    <button id="btn-best3" type="button" class="btn btn-primary">Others Can Work Better</button>
                    <button id="btn-demotivate3" type="button" class="btn btn-primary">Others Should Avoid</button>
                    <button id="btn-worst3" type="button" class="btn btn-primary">Working Environment</button>
                </div>

                <h3 class="text-primary mb-3">Compliance (C)</h3>
                <span style="color: red;" ><sup>*</sup>Please save first before edit other value tab</span>

                <div id="tab-motivate3">
                    <h4 class="text-primary mb-3">Personal Improvement</h4>
                    {{-- <div id="c_charNum_im"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf

                        <input type="hidden" name="valuef" value="A_improve">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $perC[0] as $i =>$improve )
                        <div class="mb-3">
                            {{-- <p id='climit_im{{$i+1}}'>(0 / 100)</p> --}}
                            <div class="c_count_im">
                                <input maxlength="100" type="textbox" value="{{ $improve }}" class="form-control" id="c_im{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                            
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-best3" style="display: none">
                    <h4 class="text-primary mb-3">Others can works better</h4>
                    {{-- <div id="c_charNum_bet"></div> --}}
                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_better">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $perC[1] as $i =>$better )
                        <div class="mb-3">
                            {{-- <p id='climit_bet{{$i+1}}'>(0 / 100)</p> --}}
                            <div class="c_count_bet">
                                <input type="textbox" value="{{ $better }}" class="form-control" id="c_bet{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                            
                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-demotivate3" style="display: none">
                    <h4 class="text-primary mb-3">Others shloud avoid</h4>
                    {{-- <div id="c_charNum_avo"></div> --}}

                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="O_avoid">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $perC[2] as $i =>$avoid )
                        <div class="mb-3">
                            {{-- <p id='climit_avo{{$i+1}}'>(0 / 100)</p> --}}

                            <div class="c_count_avo">
                                <input type="textbox" value="{{ $avoid }}" class="form-control" id="c_avo{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>

                        </div>
                        @endforeach



                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>

                <div id="tab-worst3" style="display: none">
                    <h4 class="text-primary mb-3">Working Environment</h4>
                    {{-- <div id="c_charNum_env"></div> --}}

                    <form action="{{ route('performancestore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="valuef" value="Y_environment">
                        <input type="hidden" name="style" value="C">
                        @foreach ( $perC[3] as $i =>$env )
                        <div class="mb-3">
                            {{-- <p id='climit_env{{$i+1}}'>(0 / 100)</p> --}}
                            <div class="c_count_env">
                                <input type="textbox" value="{{ $env }}" class="form-control" id="c_env{{$i+1}}"
                                placeholder="soalan" name="value[]" maxlength="110">
                            </div>
                            
                        </div>
                        @endforeach


                        <span></span>
                        <div class="p-4">
                            <button type="submit" class="btn btn-primary">Save template11</button>
                        </div>


                    </form>
                </div>



            </div>
        </div>

    <script src="{{ URL::asset('assets/js/funnew.js') }}"></script>


@endsection
