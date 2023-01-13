@extends('PDF.in_header')
@section('content')
    <div class="page-break">
        <h1 class="title mb-8">Key Report Summary</h1>


        <table class="center mb-2">
            <tr>
                <th>Personal Graphs</th>
                <th>Team Graphs</th>
                <th>OrganizationGraphs</th>
            </tr>
            <tr>
                <td><img src="{{ $line }}" alt=""></td>
                <td><img src="{{ $teamChart }}" alt=""></td>
                <td><img src="{{ $companyChart }}" alt=""></td>
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
                            @if ($i > 1)
                            @break
                        @endif
                        <li class="font-sm">{{ $srtg }}</li>
                    @endforeach

                </ul>
            </td>


            <td>
                <h4>What Motivates You</h4>

                <ul class="text-size-md2">

                    @foreach ($Wmotivate as $i => $motivate)
                        @if ($i > 1)
                        @break
                    @endif
                    <li class="font-sm">{{ $motivate }}</li>
                @endforeach

            </ul>
            <h4>You are at your best</h4>
            <ul>
                @foreach ($Wbest as $i => $mbest)
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

        @foreach ($A_improve as $i => $improve)
            @if ($i > 1)
            @break
        @endif
        <li class="font-sm">{{ $improve }}</li>
    @endforeach
</ul>
<h4>How Others Can Work Better With You</h4>
<ul>
    @foreach ($O_better as $i => $better)
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
<td><span> x % of person in organization has the same profile as you</span></td>
<td><span>You higest type is x and x that describe you as </span></td>
<td><span>Your main keywords that describe you
    @foreach ($keywords as $i => $key)
        @if ($i > 3)
        @break
    @endif
    <strong style="color: red;">{{ $key }}</strong>
@endforeach
</span></td>
</tr>
<tr>
<span>This page only summary of the report. For details of the report you</span>
</tr>
</table>

</div>

<div class="page-break">
<div class="header-green mb-3">
<div class="text-white">
<h1>Your Behaviour Intelligent Graphs</h1>
</div>
</div>

<img class="log-center mb-3" src="{{ $line }}" width="500" height="300" alt="img">
<div class="text-size-md">
The graphs above portray the DiSC style based on the response to the question. It demonstrates that your
strongest DiSC style is {{ $rank[0] }} , followed by {{ $rank[1] }}, {{ $rank[2] }} and lastly
{{ $rank[3] }} We can
deduce from these graphs that your primary DiSC style is {{ $rank[0] }}. This report will explain the
description of your
DiSC style.
</div>


</div>
{{-- @php
    $b_val = 'D';
@endphp --}}
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR</h2>
</div>
<div class="header-sub">
</div>
<div class="sub-container">
<div class="mb-2">
@if ($b_val == 'D')
<h2 class="subtopic">Dominance - High</h2>
@endif
@if ($b_val == 'I')
<h2 class="subtopic">Influance - High</h2>
@endif
@if ($b_val == 'S')
<h2 class="subtopic">Stediness - High</h2>
@endif
@if ($b_val == 'C')
<h2 class="subtopic">Compliace - High</h2>
@endif

<ul class="text-size-md2">
@foreach ($best as $best)
<li>{{ $best }}</li>
@endforeach
</ul>




</div>

{{-- @switch($Behaviour_type)
                @case('S')

                @break

                @case('D')
                    <h1>This is D</h1>
                @break

                @default
                <h1 style="color: red">Invalid value</h1>
            @endswitch --}}

{{-- template content --}}
<div class="mb-3">
<h2 class="subtopic ">Keywords</h2>
<table cellpadding="10" style="margin-left: auto;
                    margin-right: auto;   ">
@php
    $i = -1;
@endphp


@foreach ($keywords as $key)
@php
    $i++;
@endphp
@if ($i % 4 == 0)
    <tr>

        <td width=25% class="txtbox">{{ $key }}</td>
    @elseif (($i + 1) % 4 == 0)
        <td width=25% class="txtbox">{{ $key }}</td>

    </tr>
@else
    <td class="txtbox">{{ $key }}</td>
@endif
@endforeach


</table>


</div>
{{-- end template content --}}

</div>

</div>

@if ($b_val == 'D')
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">

<h2 class="subtopic">Influance - {{ $I_hl }}</h2>

<ul class="text-size-md2">
@foreach ($I_value as $I)
<li>{{ $I }}</li>
@endforeach
</ul>
<h2 class="subtopic ">Steadiness - {{ $S_hl }}</h2>
<ul class="text-size-md2">
@foreach ($S_value as $s)
<li>{{ $s }}</li>
@endforeach
</ul>



</div>
</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR22</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">
<h2 class="subtopic ">Compliance - {{ $C_hl }}</h2>
<ul class="text-size-md2">
@foreach ($C_value as $c)
<li>{{ $c }}</li>
@endforeach
</ul>
</div>

</div>
@endif
@if ($b_val == 'I')
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">

<h2 class="subtopic">Dominance - {{ $D_hl }}</h2>

<ul class="text-size-md2">
@foreach ($D_value as $d)
<li>{{ $d }}</li>
@endforeach
</ul>
<h2 class="subtopic ">Steadiness - {{ $S_hl }}</h2>
<ul class="text-size-md2">
@foreach ($S_value as $s)
<li>{{ $s }}</li>
@endforeach
</ul>



</div>
</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR22</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">
<h2 class="subtopic ">Compliance - {{ $C_hl }}</h2>
<ul class="text-size-md2">
@foreach ($C_value as $c)
<li>{{ $c }}</li>
@endforeach
</ul>
</div>

</div>[]
@endif
@if ($b_val == 'S')
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">

<h2 class="subtopic">Dominance - {{ $D_hl }}</h2>

<ul class="text-size-md2">
@foreach ($D_value as $d)
<li>{{ $d }}</li>
@endforeach
</ul>
<h2 class="subtopic ">Influance - {{ $I_hl }}</h2>
<ul class="text-size-md2">
@foreach ($I_value as $I)
<li>{{ $I }}</li>
@endforeach
</ul>



</div>
</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR22</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">
<h2 class="subtopic ">Compliance - {{ $C_hl }}</h2>
<ul class="text-size-md2">
@foreach ($C_value as $c)
<li>{{ $c }}</li>
@endforeach
</ul>
</div>

</div>
@endif
@if ($b_val == 'C')
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">

<h2 class="subtopic">Dominance - {{ $D_hl }}</h2>

<ul class="text-size-md2">
@foreach ($D_value as $d)
<li>{{ $d }}</li>
@endforeach
</ul>
<h2 class="subtopic ">Influance - {{ $I_hl }}</h2>
<ul class="text-size-md2">
@foreach ($I_value as $I)
<li>{{ $I }}</li>
@endforeach
</ul>



</div>
</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">DESCRIPTION BASED ON EACH DIMENSION OF BEHAVIOR22</h2>

</div>
<div class="header-sub">
</div>
<div class="sub-container">
<h2 class="subtopic ">Stediness - {{ $S_hl }}</h2>
<ul class="text-size-md2">
@foreach ($S_value as $s)
<li>{{ $s }}</li>
@endforeach
</ul>
</div>

</div>
@endif





{{-- Start S template --}}
<div class="S">


<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">MOTIVATION MANAGEMENT</h2>


</div>
<div class="header-sub mb-3">
</div>
<div class="sub-container">
<h2 class="subtopic ">What Motivates you</h2>
<ul class="text-size-md2">
@foreach ($Wmotivate as $Wmotivate)
<li>{{ $Wmotivate }}</li>
@endforeach
</ul>
<h2 class="subtopic ">What You are at your Best</h2>
<ul class="text-size-md2">
@foreach ($Wbest as $Wbest)
<li>{{ $Wbest }}</li>
@endforeach
</ul>
</div>

</div>
<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">MOTIVATION MANAGEMENT</h2>


</div>
<div class="header-sub mb-3">
</div>
<div class="sub-container">
<h2 class="subtopic ">What Demotivates you</h2>
<ul class="text-size-md2">
@foreach ($Wdemotive as $dem)
<li>{{ $dem }}</li>
@endforeach
</ul>
<h2 class="subtopic ">What you are at your worst</h2>
<ul class="text-size-md2">


@foreach ($Wworst as $worst)
<li>{{ $worst }}</li>
@endforeach
</ul>
</div>

</div>


<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">PERFORMANCE MANAGEMENT</h2>
</div>
<div class="header-sub mb-3">
</div>
<div class="sub-container">
<h2 class="subtopic ">Your Area For Personal Improvement</h2>
<ul class="text-size-md2">
@foreach ($A_improve as $improve)
<li>{{ $improve }}</li>
@endforeach
</ul>
<h2 class="subtopic ">How Others Can Work Better With You</h2>
<ul class="text-size-md2">
@foreach ($O_better as $O_better)
<li>{{ $O_better }}</li>
@endforeach
</ul>
</div>

</div>

<div class="page-break">
<div class="header-scnd-green">
<h2 class="text-white">PERFORMANCE MANAGEMENT</h2>
</div>
<div class="header-sub mb-3">
</div>
<div class="sub-container">
<h2 class="subtopic ">Things Others Should Avoid</h2>
<ul class="text-size-md2">
@foreach ($O_avoid as $avoid)
<li>{{ $avoid }}</li>
@endforeach
</ul>
<h2 class="subtopic ">Your Preferred Working Environment</h2>
<ul class="text-size-md2">
@foreach ($Y_environment as $env)
<li>{{ $env }}</li>
@endforeach
</ul>
</div>

</div>

</div>
{{-- End S template --}}
{{-- Technical report --}}
    <div>
        <div class="header-scnd-green">
            <h2 class="text-white">TECHNICAL REPORT</h2>
            </div>
            <div class="header-sub mb-3">
            </div>
            <div class="sub-container">
                <h4>Date of Assasment:</h4>
                <h4>Date Report Issued:</h4><br>

                <h4>Your Personal DiSC Style</h4>
                <ul>
                    <li>D:{{ $ystyle[0] }}</li>
                    <li>i: {{ $ystyle[1] }}</li>
                    <li>S:{{ $ystyle[2] }}</li>
                    <li>C:{{ $ystyle[3] }}</li>
                </ul>
                <h4>Your Group DiSC Style</h4>
                <ul>
                    <li>D:{{ $teamvalue[0] }}</li>
                    <li>i: {{ $teamvalue[1] }}</li>
                    <li>S:{{ $teamvalue[2] }}</li>
                    <li>C:{{ $teamvalue[3] }}</li>
                </ul>
                <h4>Your Organization DiSC Style</h4>
                <ul>
                    <li>D:{{ $companyvalue[0] }}</li>
                    <li>i:  {{ $companyvalue[1] }}</li>
                    <li>S:{{ $companyvalue[2] }}</li>
                    <li>C:{{ $companyvalue[3] }}</li>
                </ul>
            </div>

    </div>


{{-- <img src="{{ $img }}" alt="img"> --}}
@endsection
