@extends('PDF.scnd_header')
@section('content')
    <style>
        .container {
            position: relative;
            color: rgb(0, 0, 0);
            text-align: left;

        }

        .top-left {
            position: absolute;
            top: 51%;
            left: 5%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;

        }

        .top-right {
            position: absolute;
            top: 51%;
            left: 54%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;
        }

        .bot-left {
            position: absolute;
            top: 73%;
            left: 5%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;
        }

        .top-1 {
            position: absolute;
            top: 13%;
            left: 5%;
            padding-top: 0;
            /* width: 100px;
                    height: 400px; */
            border: 1px solid rgb(0, 0, 0);
        }

        .top-2 {
            position: absolute;
            top: 13%;
            left: 25%;
            padding-top: 0;
            /* width: 100px;
                    height: 400px; */
            border: 1px solid rgb(0, 0, 0);
        }

        .top-3 {
            position: absolute;
            top: 13%;
            left: 45%;
            padding-top: 0;
            /* width: 100px;
                    height: 400px; */
            border: 1px solid rgb(0, 0, 0);
        }

        .box-number {
            position: absolute;
            top: 23%;
            left: 70%;
            padding-top: 0;
            /* width: 100px;
                    height: 400px; */

        }

        .box-key {
            position: absolute;
            top: 38%;
            left: 66%;
            padding-top: 0;
            /* width: 100px;
                    height: 400px; */


        }

        .row-1 {
            position: absolute;
            top: 20%;
            left: 20%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;
        }

        .row-2 {
            position: absolute;
            top: 39%;
            left: 20%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;
        }

        .row-3 {
            position: absolute;
            top: 58%;
            left: 20%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;
        }

        .row-4 {
            position: absolute;
            top: 76%;
            left: 20%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;
        }

        .rem-1 {
            position: absolute;
            top: 22%;
            left: 69%;
            padding-top: 0;
            width: 230px;
            word-wrap: break-word;
            
        }
        .hl-1 {
            position: absolute;
            top: -1.2%;
            left: 53%;
            font-weight: bold;
            font-size: 17px;
            
        }
        .hl-2 {
            position: absolute;
            top: 10%;
            left: 53%;
            font-weight: bold;
            font-size: 17px;
            color: #d54ce6;
        }
    </style>
    <div class="container page-break">
        @switch($High)
            @case('D')
                <img src="{{ public_path('assets/img/report/D.png') }}" width="800px" height="1122px">
            @break

            @case('I')
                <img src="{{ public_path('assets/img/report/I.png') }}" width="800px" height="1122px">
            @break

            @case('S')
                <img src="{{ public_path('assets/img/report/S.png') }}" width="800px" height="1122px">
            @break

            @case('C')
                <img src="{{ public_path('assets/img/report/CC.png') }}" width="800px" height="1122px">
            @break

            @default
        @endswitch
        {{-- <img src="{{ public_path('assets/img/report/2.png') }}" width="800px" height="1122px"> --}}
        <img class="top-1" src="{{ $personalchart }}" alt="chart">
        <img class="top-2" src="{{ $teamChart }}" alt="chart">
        <img class="top-3" src="{{ $companyChart }}" alt="chart">
        <div class="box-number" style="color: #000000"><span class="big-text">{{$percent}}%</span></div>
        <div class="box-key" style="color: rgb(0, 0, 0)">
            <ul>
                @foreach ($keywords as $i => $key)
                    <li class="smm-text text-bolde" style="color: #000000">{{ $key }}</li>
                    @if ($i > 3)
                    @break
                @endif
            @endforeach
        </ul>
    </div>

    {{-- <img class="top-2" src="{{$companyChart}}" alt="chart"> --}}
    <div class="top-left">
        <ul>
            @foreach ($strength as $i => $str)
                <li class="sm-text">{{ $str }}</li>
                @if ($i > 3)
                @break
            @endif
        @endforeach

    </ul>
</div>

<div class="top-right">
    <ul>
        @foreach ($motivates as $i => $motivate)
            <li class="sm-text">{{ $motivate }}</li>
            @if ($i > 0)
            @break
        @endif
    @endforeach
</ul>
</div>

<div class="bot-left">
<ul>
    @foreach ($improves as $i => $improve)
        <li class="sm-text">{{ $improve }}</li>
        @if ($i > 0)
        @break
    @endif
@endforeach
</ul>
</div>
</div>
<div class="container page-break">
<img src="{{ public_path('assets/img/report/3.png') }}" width="800px" height="1122px">
<div class="rem-1">
    <ul>
        @if ($cremarks > 0)
        @foreach ($remarks->rem_1 as $rem1)
        <li>{{$rem1}}</li>
        @endforeach
        @endif
        
    </ul>
    </div>
<div class="row-1">
    @switch($HLD)
        @case("High")
        <span style="color: #d54ce6;" class="hl-1">High</span>
            @break
        @case("Low")
        <span style="color: #d54ce6;" class="hl-1">Low</span>
            @break
        @default
            
    @endswitch

<ul class="smm-text">
@foreach ($Dvalues as $d)
    <li>{{ $d }}</li>
@endforeach
</ul>
</div>
<div class="row-2">
    @switch($HLI)
        @case("High")
        <span style="color: #ffcc16;" class="hl-1">High</span>
            @break
        @case("Low")
        <span style="color: #ffcc16;" class="hl-1">Low</span>
            @break
        @default
            
    @endswitch
    
<ul class="smm-text">
@foreach ($Ivalues as $I)
    <li>{{ $I }}</li>
@endforeach
</ul>
</div>
<div class="row-3">
    @switch($HLS)
        @case("High")
        <span style="color: #1c8638;" class="hl-1">High</span>
            @break
        @case("Low")
        <span style="color: #1c8638;" class="hl-1">Low</span>
            @break
        @default
            
    @endswitch
    
<ul class="smm-text">
@foreach ($Svalues as $S)
    <li>{{ $S }}</li>
@endforeach
</ul>
</div>
<div class="row-4">
    @switch($HLC)
        @case("High")
        <span style="color: #024cad;" class="hl-1">High</span>
            @break
        @case("Low")
        <span style="color: #024cad;" class="hl-1">Low</span>
            @break
        @default
            
    @endswitch
    
<ul class="smm-text">
@foreach ($Cvalues as $C)
    <li>{{ $C }}</li>
@endforeach
</ul>

</div>

</div>
<div class="container page-break">
<img src="{{ public_path('assets/img/report/4.png') }}" width="800px" height="1122px">
<div class="rem-1">
    <ul>
        @if ($cremarks > 0)
        @foreach ($remarks->rem_2 as $rem2)
        <li>{{$rem2}}</li>
        @endforeach
        @endif
        
    </ul>
    </div>
<div class="row-1">
<ul class="smm-text">
@foreach ($motivates as $motivate)
    <li>{{ $motivate }}</li>
@endforeach
</ul>
</div>
<div class="row-2">
<ul class="smm-text">
@foreach ($bests as $best)
    <li>{{ $best }}</li>
@endforeach
</ul>
</div>
<div class="row-3">
<ul class="smm-text">
@foreach ($demotives as $demotive)
    <li>{{ $demotive }}</li>
@endforeach
</ul>
</div>
<div class="row-4">
<ul class="smm-text">
@foreach ($worsts as $worst)
    <li>{{ $worst }}</li>
@endforeach
</ul>
</div>
</div>
{{-- LAST PAGE --}}
<div class="container">
<img src="{{ public_path('assets/img/report/5.png') }}" width="800px" height="1122px">
<div class="rem-1">
    <ul>
        
        @if ($cremarks > 0)
        @foreach ($remarks->rem_3 as $rem3)
        <li>{{$rem3}}</li>
        @endforeach
        @endif
    </ul>
    </div>
<div class="row-1">
<ul class="smm-text">
@foreach ($improves as $improve)
    <li>{{ $improve }}</li>
@endforeach
</ul>
</div>
<div class="row-2">
<ul class="smm-text">
@foreach ($betters as $better)
    <li>{{ $better }}</li>
@endforeach
</ul>
</div>
<div class="row-3">
<ul class="smm-text">
@foreach ($avoids as $avoid)
    <li>{{ $avoid }}</li>
@endforeach
</ul>
</div>
<div class="row-4">
<ul class="smm-text">
@foreach ($environments as $environment)
    <li>{{ $environment }}</li>
@endforeach
</ul>
</div>
</div>
@endsection
