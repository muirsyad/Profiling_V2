@extends('U_template')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .chartMenu {
            width: 100vw;
            height: 40px;
            background: #1A1A1A;
            color: rgba(255, 26, 104, 1);
        }

        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }

        .chartCard {
            width: 100vw;
            height: calc(100vh - 40px);
            background: rgba(255, 26, 104, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 700px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(255, 26, 104, 1);
            background: white;
        }

        .chartb {}

        @media screen and (min-width: 300px) {
            .chartb {
                width: 100%;
                height: 400px;
                margin-top: -20%;
            }
        }

        @media screen and (min-width: 800px) {
            .chartb {
                width: 50%;
                height: 650px;
                margin-top: -5%;
            }

        }

        .progress-bar__container {
            width: 80%;
            height: 2rem;
            border-radius: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.5s;
            will-change: transform;
            box-shadow: 0 0 5px #033e13;
            margin-left: auto;
            margin-right: auto;
        }

        .progress-bar {
            position: absolute;
            height: 100%;
            width: 100%;
            content: "";
            background-color: #17c93a;
            top: 0;
            bottom: 0;
            left: -4%;
            border-radius: inherit;
            display: flex;
            justify-content: center;
            /* align-items:center; */
            color: rgb(11, 0, 0);
            font-family: sans-serif;
        }

        span.pro-text {
            text-align: right;
            color: #ffffff;
            margin-right: 77px;
        }

        .color-red {
            background: rgb(7, 113, 188);
        }

        .color-blue {
            background: rgb(221, 141, 13);
        }

        .mt-50 {
            margin-top: 50px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <p class="text-center display-4 text-dark mt-3"> <strong class="text-white">Your Results</strong> </p>

    <div class="d-flex justify-content-around mb-3 text-center">
        <div class="card p-3 color-red fw-bold text-white">

            <label class="px-3 display-1">{{ $Hvalue }}</label>
            DiSC Style:
        </div>
        

    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="row text-center text-dark">


                {{-- <div class="col-xl-12 mb-3 ">
                    Name:

                    <label class="px-3">{{ auth()->user()->name }}</label>
                </div>


                <div class="col-xl-12 mb-3">
                    Email Address:
                    <label class="px-3">{{ auth()->user()->email }}</label>
                </div> --}}



            </div>

            <div class="row">
                <p class="text-center display-4 text-dark"> <strong>Graphs</strong> </p>
                <div class="d-flex justify-content-center ">



                    <div class="chartb">
                        <canvas id="myChart" class="">

                        </canvas>



                        @php
                            $D = $record->D;
                            $I = $record->I;
                            $S = $record->S;
                            $C = $record->C;
                            $plotD = $plot[0];
                            $plotI = $plot[1];
                            $plotS = $plot[2];
                            $plotC = $plot[3];
                            //dd($D, $I, $S, $C);
                        @endphp
                    </div>





                </div>


                {{-- <div class="col-12 mb-3">
                    <span class="h-6 text-danger">* Please wait for 100% to download your PDF report</span>
                    <div class="progress-bar__container mt-3">
                        <div id="progress" class="progress-bar"><span class="pro-text"></span></div>
                    </div>
                </div> --}}


                <div id="link_wrapper">

                </div>
                @if ($percentage >= 100)
                    <div class="col text center">
                        {{-- <a href="{{ route('dlpdf') }}" class="btn btn-primary">Download</a> --}}
                        <a href="#" class="btn btn-primary">Home</a>
                        {{-- <a href="{{ route('inv2') }}" class="btn btn-primary">Download ver 2</a> --}}
                        <a href="{{ route('inv3') }}" class="btn btn-primary" id="ButtonId">Download ver 3</a>

                    </div>
                @else
                    <div class="col text center">

                        <a href="{{ route('Qhome') }}" class="btn btn-primary">Home</a>
                        <a href="{{ route('inv3') }}" class="btn btn-primary">Download Individual</a>

                    </div>
                @endif

            </div>


        </div>

        {{-- aswer records
        {{ $record->answer_records }} --}}

        <script>
            function loadXMLDoc() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.getElementById("link_wrapper").innerHTML =
                        //     this.responseText;

                        var Str = this.responseText;
                        Str = Str.replace('[', '')
                        Str = Str.replace(']', '')
                        Str = parseInt(Str);
                        console.log(Str);


                        var value = 100 - Str;
                        var balance = value;
                        value = "-" + value + "%";
                        console.log("Progress " + value);
                        $(document).ready(function() {
                            $("#progress").css('left', value);
                            console.log("Value :" + balance);
                            if (balance === 0) {
                                console.log("Test in");
                                $("#ButtonId").removeClass('disabled');
                            } else {
                                console.log("Test in");
                                $("#ButtonId").addClass('disabled');
                            }


                        });



                    }
                };
                xhttp.open("GET", "{{ route('comm') }}", true);
                xhttp.send();
            }
            setInterval(function() {
                loadXMLDoc();
                // 30sec
            }, 5000);

            window.onload = loadXMLDoc;
        </script>

        @php
            
            $var = 50;
            // $arr = json_decode($progress, true);
        @endphp



        <script>
            var value = 100 - {{ $percentage }}
            value = "-" + value + "%";
            console.log("Progress " + value);
            $(document).ready(function() {
                $("#progress").css('left', value);


            });
        </script>
        <script>
            var D = <?php echo $D; ?>;
            var I = <?php echo $I; ?>;
            var S = <?php echo $S; ?>;
            var C = <?php echo $C; ?>;

            var pD = <?php echo $plotD; ?>;
            var pI = <?php echo $plotI; ?>;
            var pS = <?php echo $plotS; ?>;
            var pC = <?php echo $plotC; ?>;


            console.log(D);
            console.log(I);
            console.log(S);
            console.log(C);


            const ctx = document.getElementById('myChart').getContext('2d');

            // <block:setup:1>
            // const labels = Utils.months({
            //     count: 7
            // });

            const data = {

                labels: ['', 'D', 'I', 'S', 'C', ''],
                datasets: [{
                        label: 'Behaviour type',
                        data: [null, pD, pI, pS, pC, null],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        pointRadius: 0,
                        borderWidth: 4
                    },
                    {

                        label: 'Behaviour type',
                        data: [20, 20, 20, 20, 20, 20],
                        fill: false,
                        borderColor: 'rgb(40, 40, 41)',
                        tension: 0.1,
                        pointRadius: 0,
                        borderWidth: 1
                    }


                ]
            };
            // </block:setup>

            // <block:config:0>
            const config = {
                type: 'line',
                data: data,
                options: {
                    // responsive: true,

                    
                    plugins: {
                        title: {
                            display: true,
                            text: 'DiSC Profiing Graphs'
                        },
                        legend: {
                        display: false
                    },
                    },
                    maintainAspectRatio: false,
                    layout: {
                        padding: 50
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                display: false,
                            }
                        },

                    }
                }
            };
            // </block:config>


            const myChart = new Chart(ctx, config);
        </script>
    @endsection
