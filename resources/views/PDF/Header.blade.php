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
        @page {
            size: a4 potrait;
            margin: 0.9;
            padding: 0.9; // you can set margin and padding 0
        }

        :root {
            --ht: 250px;
        }

        .page-break {
            page-break-after: always;
            margin-top: 30px
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

        p {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
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

        .text-green {
            color: rgb(4, 95, 17);
            word-wrap: break-word;
            padding: 1px;

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

        .sub-container2 {
            /* border: 1px solid black; */
            width: 88%;
            margin-top: 6%;
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

        .txtbox {

            color: white;
            background-color: rgb(31, 97, 147);
            height: 30px;
            width: 30px;
            padding: 12px;
            border-radius: 12px;
            text-align: center;

        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        table,
        th,
        td {
            border: 3px solid black;
            border-collapse: collapse;
        }

        .text-red {
            color: red;

        }

        .text-yellow {
            color: yellow;
        }

        .text-blue {
            color: blue;
        }

        .text-grass {
            color: rgb(60, 152, 60);
        }

        .text-lightgreen {
            color: #13852F;
        }

        .text-sub {
            font: 20px;
        }

        .text-style {
            font-size: 50px;
            text-align: center;
        }

        .percent-b {
            color: #000000;
            font-size: 20px;
        }

        .table-con {
            padding: 100px;
        }

        .table-con2 {
            padding: 150px;
        }

        .text-center {
            text-align: center;
        }

        .img-chart {
            width: 50%;
            float: left;
        }

        .img-chart2 {
            width: 50%;
            clear: right;
            margin-bottom: 50px;
        }

        .float-left {
            float: left;
        }

        .clear-right {
            clear: right;
        }

        .col-block {
            float: left;

        }

        .ml-3 {
            margin-left: 90px;
            /* margin-right: auto; */
        }

        .hide {
            color: white;
        }

        .underline {
            text-decoration: underline;

        }

        div.d {
            position: relative;
            width: 350px;
            height: 250px;
            border: 3px solid #73AD21;
        }

        div.i {
            position: relative;
            width: 350px;
            height: 250px;
            border: 3px solid #73AD21;
            left: 355px;
            top: -256px;
        }

        div.s {
            position: relative;
            width: 350px;
            height: 250px;
            border: 3px solid #73AD21;
            top: -260px;

        }

        div.c {
            position: relative;
            width: 350px;
            height: 200px;
            border: 3px solid #73AD21;
            left: 355px;

        }

        img.total {
            position: relative;
            left: 100px;


        }
    </style>
    {{-- front page --}}
    <div class="page-break">



        <h1 class="title">DiSC Profiling Report</h1>
        <img src="C:\xampp\htdocs\New folder\Profiling\public\assets\img\lhi.png" width="300px" height="300px"
            class="log-center" alt="t">
        <hr class="green mb-3">
        <div class="namebox mb-3">
            <h4>Report of {{ $name }}</h4>
            <h4>{{ $num }} people</h4>
            <h4>The report is provided by</h4>
            <h4>LHI Consulting</h4>
            <h4>6-19, Plaza Azalea, Persiaran Selangor, Seksyen 14, 40000 Shah Alam, Selangor</h4>
        </div>
        <hr class="green mb-3">
    </div>
    @yield('content')
</body>

</html>
