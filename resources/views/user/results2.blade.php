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

        .chartb {
            /* width: 20%; */
            /* height: 300px; */
        }

        @media screen and (min-width: 300px) {
            .chartb {
                width: 100%;
                height: 400px;
            }
        }

        @media screen and (min-width: 800px) {
            .chartb {
                width: 50%;
                height: 650px;
            }

        }
        ul.bullet-none{
            list-style-type: none;
        }
        li{
            margin: 20px;
        }
    </style>

    <div class="card mt-3">
        <div class="card-body">
            <p class="text-center display-4 text-dark mb-3"> <strong>Your Results2</strong> </p>
            <div class="row text-center text-dark">
                <hr />

                <div class="col-xl-12 mb-3 ">
                    Name:

                    <label class="px-3">{{ auth()->user()->name }}</label>
                </div>


                <div class="col-xl-12 mb-3">
                    Email Address:
                    <label class="px-3">{{ auth()->user()->email }}</label>
                </div>

                <div class="col-xl-12 mb-3">
                    Higest Behaviour type:
                    <label class="px-3">{{ $high }}</label>
                </div>

                <div class="col-xl-12 mb-3">
                    Department
                    <label class="px-3">{{ $department }}</label>
                </div>
                <hr />

            </div>

            <div class="row">
                <p class="text-center display-4 text-dark mb-3"> <strong>Graphs</strong> </p>
                <div class="d-flex justify-content-center ">



                    <div class="chartb">
                        <canvas id="myChart" class="mb-5">

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



                <div class="col text center">
                    <a href="{{ route('dlpdf') }}" class="btn btn-primary">Download</a>
                    <a href="#" class="btn btn-primary">Home</a>
                </div>
            </div>


        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <p class="text-center display-4 text-dark mb-3"> <strong>New results</strong> </p>
            <ul class="bullet-none text-center h2">
                <li>Name <br> {{ auth()->user()->name }}</li>
                <li>Email <br> {{ auth()->user()->email }}</li>
                <li>Department <br> {{ $department }}</li>
                <li>DiSC Style <br> {{ $high }}</li>
            </ul>
        </div>
    </div>


        {{-- aswer records
        {{ $record->answer_records }} --}}

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
                        }
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
