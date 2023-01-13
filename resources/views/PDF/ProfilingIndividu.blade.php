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
        .top-1{
            position: absolute;
            top: 13%;
            left: 5%;
            padding-top: 0;
            /* width: 100px;
            height: 400px; */
            border: 1px solid rgb(0, 0, 0);
        }
        .top-2{
            position: absolute;
            top: 13%;
            left: 20%;
            padding-top: 0;
            /* width: 100px;
            height: 400px; */
            border: 1px solid rgb(0, 0, 0);
        }
        .row-1{
            position: absolute;
            top: 20%;
            left: 20%;
            padding-top: 0;
            max-width: 350px;
            word-wrap: break-word;
        }
        .sm-text{
            font-size: 18px;
        }

        
    </style>
    <div class="container page-break">
        <img src="{{ public_path('assets/img/report/2.png') }}" width="800px" height="1122px">
        <img class="top-1" src="{{$companyChart}}" alt="chart">
        {{-- <img class="top-2" src="{{$companyChart}}" alt="chart"> --}}
        <div class="top-left">
            <ul>
                @foreach ($strength as $i =>$str)

                <li class="sm-text">{{$str}}</li>
                @if ($i >3)
                    @break
                @endif
                    
                @endforeach
                
            </ul>
        </div>

        <div class="top-right">
            <ul>
                @foreach ($motivate as $i =>$motivate)

                <li class="sm-text">{{$motivate}}</li>
                @if ($i >1)
                    @break
                @endif
                    
                @endforeach
            </ul>
        </div>

        <div class="bot-left">
            <ul>
                @foreach ($improve as $i =>$improve)

                <li class="sm-text">{{$improve}}</li>
                @if ($i >1)
                    @break
                @endif
                    
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container page-break">
        <img src="{{ public_path('assets/img/report/3.png') }}" width="800px" height="1122px">
        <div class="row-1">
            <ul>
                <li>Test</li>
                <li>test</li>
                <li>Tes</li>
                <li>test</li>
            </ul>
        </div>

    </div>
    <div class="container page-break">
        <img src="{{ public_path('assets/img/report/2.png') }}" width="800px" height="1122px">
    </div>
@endsection
