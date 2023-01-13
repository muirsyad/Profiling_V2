<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- <script src="{{ URL::asset('assets/js/html2canvas.min.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script> --}}

    {{-- <script src="http://cdn.jsdelivr.net/npm/chart.js"></script> --}}
</head>

<body>
    <style>
        @page {
            size: a4 potrait;
            margin: 0.9;
            padding: 0.9; // you can set margin and padding 0
        }

        .page-break {
            page-break-after: always;
        }

        .reportGraph {
            width: 850px
        }

        .btn {
            background-color: red;
            border-radius: 12px
        }

        .title {
            text-align: center;
            color: #05572f;
        }

        .log-center {
            margin: auto;
            width: 50%;
            margin-left: 24%
        }

        hr.green {
            border: 5px solid rgb(101, 185, 101);
            width: 90%;


        }

        .mb-3 {
            margin-bottom: 60px;
        }

        .mb-2 {
            margin-bottom: 20px;
        }

        .mt-3 {
            margin-top: 60px;
        }

        .mt-2 {
            margin-top: 20px;
        }

        .namebox {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            padding: 12px;
            text-align: center;
        }

        .header-green {
            border: 1px solid green;
            background-color: rgb(101, 185, 101);
            height: 8%;
            width: 80%;


        }

        .header-scnd-green {
            font-family: Arial, Helvetica, sans-serif;
            width: 70%;
            height: 7%;
            padding: 12px;
            border: 1px solid #000000;
            background-color: rgb(101, 185, 101);

        }

        .header-sub {
            background-color: #05572f;
            width: 73.3%;
            height: 3%;
        }

        .text-white {
            color: white;
            word-wrap: break-word;
            padding: 1px;
            text-align: center;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .text-size-md {

            font-family: Arial, Helvetica, sans-serif;
            word-wrap: break-word;
            font-size: 25px;
            text-align: center;
            margin-left: 35px;
            margin-right: 35px;

        }

        .text-size-md2 {
            font-family: Arial, Helvetica, sans-serif;
            word-wrap: break-word;
            font-size: 19px;
        }

        .subtopic {
            color: #05572f;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
        }

        .sub-container {
            /* border: 1px solid black; */
            width: 88%;
            margin-top: 4%;
            margin-left: auto;
            margin-right: auto;

        }

        .small-box {
            word-wrap: break-word;
            width: auto;
            background-color: #4b8569;
        }

        ul {
            font-size: 20px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
        }

        .point {
            background-color: black;
            border-radius: 23px;
        }
        .txtbox{

            color: white;
            background-color: rgb(31, 97, 147);
            height: 30px;
            width: 30px;
            padding: 12px;
            border-radius: 12px;
            text-align: center;

        }
    </style>
    {{-- <h1 class="page-break">Test dom pdf</h1>
<h2 class="page-break">Anotger page1</h2>
<h2 class="page-break">Anotger page2</h2> --}}


    {{-- page 1     --}}
    <div class="page-break">



        <h1 class="title">DiSC Profiling Report</h1>
        <img src="C:\laragon\www\LHI\Profiling\public\assets\img\lhi.png" width="300px" height="300px" class="log-center" alt="t">

        <hr class="green mb-3">
        <div class="namebox mb-3">
            <h4>Name :{{ $user->name }}</h4>
            <h4>Email: {{ $user->email }}</h4>
            <h4>Department: {{ $user->department }}</h4>
            <h4>Date: {{ $user->created_at }}</h4>
        </div>
        <hr class="green mb-3">
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
            strongest DiSC style is {{ $rank[0] }} , followed by {{ $rank[1] }}, {{ $rank[2] }} and lastly {{ $rank[3] }} We can
            deduce from these graphs that your primary DiSC style is {{ $rank[0] }}. This report will explain the description of your
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
                <table cellpadding="10"
                    style="margin-left: auto;
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

    @if($b_val == 'D')
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
    @if($b_val == 'I')
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
    @if($b_val == 'C')

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



    {{-- <img src="{{ $img }}" alt="img"> --}}




</body>

</html>
