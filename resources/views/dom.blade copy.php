<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        .page-break {
            page-break-after: always;
        }
        </style>
<h1 class="page-break">Test dom pdf</h1>
<h2 class="page-break">Anotger page1</h2>
<h2 class="page-break">Anotger page2</h2>
</body>
</html> --}}


{{-- next --}}

{{-- <html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
        //   google.charts.load('current', {'packages':['corechart']});
        //   google.charts.setOnLoadCallback(drawChart);


        function init() {
            google.load('visualization', '1.1', {
                packages: 'corechart',
                callback: 'drawChart'
            });
        }

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                title: 'My Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <style>
        .chartb {
            width: 70%;
            height: 300px;
        }
    </style>
</head>

<body onload="init()">
    <button id="downloadPdf">Download</button>
    <a href="#" id="downloadPdf">download</a>
    <h1>Test</h1>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

    <h2>chartjs</h2>

    <div class="chartb">
    <canvas id="myChart" class="mb-5">
    </canvas>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        // <block:setup:1>
        // const labels = Utils.months({
        //     count: 7
        // });

        const data = {

            labels: ['D', 'I', 'S', 'C'],
            datasets: [{
                    label: 'Behaviour type',
                    data: [3, 10, 22, 25],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'middle',
                    data: [20, 20, 20, 20],
                    fill: false,
                    borderColor: 'rgb(40, 40, 41)',
                    tension: 0.1
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
                maintainAspectRatio: false,

                scales: {
                    y: {
                        beginAtZero: true
                    },

                }
            }
        };
        // </block:config>


        const myChart = new Chart(ctx, config);
    </script>
</body>



</html>


{{-- new test --}}



<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .chartb {
            width: 70%;
            height: 300px;
        }
    </style>
    <script src="{{ URL::asset('assets/js/html2canvas.min.js') }}"></script>
    <script src="http://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- make sure you are using http, and not https --}}


</head>

<body>


    <h2>nest</h2>
    <div id="capture" style="width: 400px; height: 400px;">
        <h1 id="Test">Chartjs</h1>
        <canvas id="myChart" width="200" height="150"></canvas>
        <div id="contentLabel">
            Test
        </div>
    </div>
    {{-- <div id="capture">
        <h1>Test</h1>
    </div> --}}

    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                animation: {
                    duration: 0
                }
            },

        });
        console.log('fired');

        // html2canvas(document.getElementById('screenshot'), {
        //     onrendered: function(canvas) {
        //         document.body.appendChild(canvas);
        //         // canvas is the final rendered <canvas> element
        //     }
        // });
        html2canvas(document.querySelector("#capture")).then(canvas => {
            document.body.appendChild(canvas)
        });
        console.log("abis")
        const Canvas = document.getElementById(myChart); // Id here
        //return Canvas.toDataURL();
        console.log(ctx);
    </script>
</body>

</html>

