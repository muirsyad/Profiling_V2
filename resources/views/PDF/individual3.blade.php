@extends('PDF.in_header')
@section('content')
    <style>
        .topbase {
            position: relative;
            width: 794px;
            height: 82px;
            background: #004718;

        }

        .sub-topbase {
            position: relative;
            width: 794px;
            height: 33px;
            background: #1AFF68
        }

        .text-style1 {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 24px;
            line-height: 29px;
            text-align: center;
            margin-left: 100px;
            margin-top: 100px;

            color: #FFFFFF;
        }

        .box-up-left {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 32px;
            top: 145px;

            background: #D9D9D9;
            border-radius: 20px;
        }
        .box-up-right {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 405px;
            top: 145px;

            background: #D9D9D9;
            border-radius: 20px;
        }
        .box-down-left {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 32px;
            top: 600px;

            background: #D9D9D9;
            border-radius: 20px;
        }
        .box-down-right {
            position: absolute;
            width: 357px;
            height: 446px;
            left: 405px;
            top: 600px;

            background: #D9D9D9;
            border-radius: 20px;
        }
    </style>
    <div class="page-break">
        <h1 class="title">Key Report Summary</h1>


        <table class="center">
            <tr>
                <th>Personal Graphs</th>
               
            </tr>
            <tr>
                <td><img src="{{ $personalchart }}" alt=""></td>
                
            </tr>

        </table>


        <table class="sum">
            <tr>
                <td class="sum">Strength</td>
                <td class="sum">Motivation management</td>
            </tr>

            <tr>
                <td>

                    <ul class="text-size-md2">

                        @foreach ($stg as $i => $srtg)

                        <li class="font-sm">{{ $srtg }}</li>
                    @endforeach

                </ul>
            </td>


            <td>
                <h4>What Motivates You</h4>

                <ul class="text-size-md2">

                    @foreach ($Wmotivates as $i => $motivate)
                        @if ($i > 1)
                        @break
                    @endif
                    <li class="font-sm">{{ $motivate }}</li>
                @endforeach

            </ul>
            <h4>You are at your best</h4>
            <ul>
                @foreach ($Wbests as $i => $mbest)
                    @if ($i > 1)
                    @break
                @endif
                <li class="font-sm"> {{ $mbest }}</li>
            @endforeach
        </ul>
    </td>
</tr>
</table>
<table class="sum flot-r" style="width: 48.5%;">
<tr>
    <td class="sum">Performance Management</td>
</tr>
<tr>
    <h4>Your Personal Improvement</h4>
    <ul>

        @foreach ($A_improves as $i => $improve)
            @if ($i > 1)
            @break
        @endif
        <li class="font-sm">{{ $improve }}</li>
    @endforeach
</ul>
<h4>How Others Can Work Better With You</h4>
<ul>
    @foreach ($O_betters as $i => $better)
        @if ($i > 1)
        @break
    @endif
    <li class="font-sm">{{ $better }}</li>
@endforeach
</ul>
</tr>
<tr>
test
</tr>
</table>
<table class="remarks">
<span class="remarks">Remarks:</span>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
</table>
<table class="footnote">
<span>Notes;</span>
<tr class="footnote">
<td><span>  {{ $same }}% of person in organization has the same profile as you</span></td>
<td><span>You higest type is {{ $b_val }} </span></td>
<td><span>Your main keywords that describe you
    @foreach ($keywords as $i => $key)
        @if ($i > 3)
        @break
    @endif
    <strong style="color: red;">{{ $key }}</strong>
@endforeach
</span></td>
</tr>
</table>

</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
    <div class="box-up-left">
        <h3 class="text-center">{{ $stylebest }} - {{ $highlowbest }}</h3>
        <ul>
            @foreach ($best as $i =>$best)
                @if ($i >4)
                    @break
                @endif
            <li>{{ $best }}</li>
            @endforeach
        </ul>

    </div>
    <div class="box-up-right">
        <h3 class="text-center">{{ $style1 }} - {{ $highlow1 }}</h3>
        <ul>
            @foreach ($values1 as $i =>$value1)
                @if ($i >4)
                    @break
                @endif
            <li>{{ $value1 }}</li>
            @endforeach
    </div>
    <div class="box-down-left">
        <h3 class="text-center">{{ $style2 }} - {{ $highlow2 }}</h3>
        <ul>
            @foreach ($values2 as $i =>$value2)
                @if ($i >4)
                    @break
                @endif
            <li>{{ $value2 }}</li>
            @endforeach
        </ul>

    </div>
    <div class="box-down-right">
        <h3 class="text-center">{{ $style3 }} - {{ $highlow3 }}</h3>
        <ul>
            @foreach ($values3 as $i =>$value3)
                @if ($i >4)
                    @break
                @endif
            <li>{{ $value3 }}</li>
            @endforeach
        </ul>

    </div>

</div>

</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">MOTIVATION MANAGEMENT</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
    <div class="box-up-left">
        <h3 class="text-center">What Motivates You</h3>
        <ul>
            @foreach ($Wmotivates as $i => $Wmotivate)
                @if ($i > 4)
                    @break
                @endif
                <li>{{ $Wmotivate }}</li>
            @endforeach
        </ul>

    </div>
    <div class="box-up-right">
        <h3 class="text-center">What You are at your Best</h3>
        <ul>
            @foreach ($Wbests as $i => $Wbest)
                @if ($i > 4)
                    @break
                @endif
                <li>{{ $Wbest }}</li>
            @endforeach
        </ul>
    </div>
    <div class="box-down-left">
        <h3 class="text-center">What Demotivates you</h3>
        <ul>
            @foreach ($Wdemotives as $i => $Wdemotive)
                @if ($i > 4)
                    @break
                @endif
                <li>{{ $Wdemotive }}</li>
            @endforeach
        </ul>

    </div>
    <div class="box-down-right">
        <h3 class="text-center">What you are at your worst</h3>
        <ul>
            @foreach ($Wworsts as $i => $Wworst)
                @if ($i > 4)
                    @break
                @endif
                <li>{{ $Wworst }}</li>
            @endforeach
        </ul>

    </div>

</div>

</div>
<div class="LAST">
<div class="header-scnd-green">
<h2 class="text-white">PERFORMANCE MANAGEMENT</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
    <div class="box-up-left">
        <h3 class="text-center">Your Area For Personal Improvement</h3>
        <ul>
            @foreach ($A_improves as $i => $improve)
                @if ($i > 4)
                    @break
                @endif
                <li>{{ $improve }}</li>
            @endforeach
        </ul>

    </div>
    <div class="box-up-right">
        <h3 class="text-center">How Others Can Work Better With You</h3>
        <ul>
            @foreach ($O_betters as $i => $better)
            @if ($i > 4)
                @break
            @endif
            <li>{{ $better }}</li>
        @endforeach
        </ul>
    </div>
    <div class="box-down-left">
        <h3 class="text-center">Things Others Should Avoid</h3>
        <ul>
            @foreach ($O_avoids as $i => $avoid)
                @if ($i > 4)
                    @break
                @endif
                <li>{{ $avoid }}</li>
            @endforeach
        </ul>

    </div>
    <div class="box-down-right">
        <h3 class="text-center">Your Preferred Working Environment</h3>
        <ul>
            @foreach ($Y_environments as $i => $env)
                @if ($i > 4)
                    @break
                @endif
                <li>{{ $env }}</li>
            @endforeach
        </ul>

    </div>

</div>

</div>

{{-- <div class="LAST">
<div class="header-scnd-green">
<h2 class="text-white">TECHNICAL REPORT</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">

    <h3>Personal Behaviour style</h3>
    <ul>
        <li>D:{{ $style_personal[0] }}</li>
        <li>i:{{ $style_personal[1] }}</li>
        <li>S:{{ $style_personal[2] }}</li>
        <li>C:{{ $style_personal[3] }}</li>
    </ul>
    <h3>Team Behaviour style</h3>
    <ul>
        <li>D:{{ $teamvalue[0] }}</li>
        <li>i:{{ $teamvalue[1] }}</li>
        <li>S:{{ $teamvalue[2] }}</li>
        <li>C:{{ $teamvalue[3] }}</li>
    </ul>
    <h3>Organization Behaviour style</h3>
    <ul>
        <li>D:{{ $companyvalue[0] }}</li>
        <li>i:{{ $companyvalue[1] }}</li>
        <li>S:{{ $companyvalue[2] }}</li>
        <li>C:{{ $companyvalue[3] }}</li>
    </ul>
</div>

</div> --}}




{{-- <img src="{{ $img }}" alt="img"> --}}
@endsection
