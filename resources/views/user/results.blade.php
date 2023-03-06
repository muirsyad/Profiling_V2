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

        /* screen mobile < */
        @media screen and (min-width: 320px) {
            .chartb {
                width: 100%;
                height: 500px;
                margin-top: -20%;
            }
        }

        @media screen and (min-width: 360px) {
            .chartb {
                width: 85%;
                height: 500px;
                margin-top: -20%;
            }
        }

        @media screen and (min-width: 375px) {
            .chartb {
                width: 80%;
                height: 500px;
                margin-top: -20%;
            }
        }

        @media screen and (min-width: 393px) {
            .chartb {
                width: 80%;
                height: 500px;
                margin-top: -20%;
            }
        }

        @media screen and (min-width: 425px) {
            .chartb {
                width: 70%;
                height: 500px;
                margin-top: -20%;
            }
        }

        /* screen L */
        @media screen and (min-width: 700px) {
            .chartb {
                width: 50%;
                height: 650px;
                margin-top: -5%;
            }

        }

        /* screen L */
        @media screen and (min-width: 800px) {
            .chartb {
                width: 25%;
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
                {{-- ori version --}}
                {{-- @if ($percentage >= 100)
                    <div class="col text center">
                        <a href="#" class="btn btn-primary">Home</a>
                        <a href="{{ route('inv3') }}" class="btn btn-primary" id="ButtonId">Download ver 3</a>

                    </div>
                @else
                    <div class="col text center">

                        <a href="{{ route('Qhome') }}" class="btn btn-primary">Home</a>
                        <a href="{{ route('report_inv',Auth::id()) }}" class="btn btn-primary" id="ButtonId">Download ver 3</a>

                    </div>
                @endif --}}

                {{-- trial version individual --}}
                <div class="col text center">

                    <a href="{{ route('Qhome') }}" class="btn btn-primary">Home</a>
                    <a href="{{ route('report_trial', Auth::id()) }}" class="btn btn-primary">Download</a>

                </div>

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
            const plugin = {
                id: 'customCanvasBackgroundColor',
                beforeDraw: (chart, args, options) => {
                    const {
                        ctx,
                        chartArea: {
                            top,
                            bottom,
                            left,
                            right,
                            width
                        },
                        scales: {
                            x,
                            y
                        }
                    } = chart;
                    ctx.save();
                    ctx.globalCompositeOperation = 'destination-over';
                    ctx.fillStyle = options.color || '#99ffff';
                    // ctx.fillRect(3, 3, chart.width, chart.height);
                    // ctx.fillRect(left, y.getPixelForValue(48), width, y.getPixelForValue(23));
                    ctx.fillRect(left, y.getPixelForTick(10), width, y.getPixelForTick(0) - y.getPixelForTick(10));

                    ctx.restore();
                }
            };

            const data = {

                labels: ['', 'D', 'I', 'S', 'C', ''],
                datasets: [{
                        label: 'Behaviour type',
                        data: [null, pD, pI, pS, pC, null],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        pointRadius: 5,
                        borderWidth: 4,
                        pointBorderColor: 'rgb(0, 255, 94)'
                    },
                    {

                        label: 'Behaviour type',
                        data: [22, 22, 22, 22, 22, 22],
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

                    backgroundColor: 'black',
                    // chartArea: {
                    //     backgroundColor: 'black',
                    // },
                    // responsive: true,



                    plugins: {
                        title: {
                            display: false,
                            text: 'DiSC Profiing Graphs'
                        },
                        legend: {
                            display: false,
                            // labels: {
                            //     // This more specific font property overrides the global property
                            //     font: {
                            //         size: 30,
                            //     }
                            // },
                        },
                        tooltip: {
                            enabled: false // <-- this option disables tooltips
                        }




                    },
                    maintainAspectRatio: false,
                    layout: {
                        padding: 50
                    },
                    scales: {
                        y: {
                            max: 48,
                            min: 0,
                            display: false,
                            beginAtZero: true,


                            ticks: {
                                display: false,
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 20,
                                    weight: 'bolder',
                                }
                            },

                            weight: 4,
                            position: 'top',
                            grid: {
                                color: 'black',
                                borderColor: 'grey',
                                tickColor: 'grey'
                            },
                            border: {
                                color: 'black',
                            },


                        }


                    }
                },
                plugins: [plugin],
                // plugins: ['chartjs-plugin-annotation'],
            };
            // </block:config>



            const myChart = new Chart(ctx, config);
            window.onload = function() {
                console.log(window.innerWidth);
                Chart.defaults.font.size = 40;
            }
        </script>
    @endsection
