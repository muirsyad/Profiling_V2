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
            margin: 0;
            padding: 0; // you can set margin and padding 0
        }

        
        /* @font-face {
            font-family: "RobotoCondensed-Regular";
            src: url("{{ public_path('fonts/RobotoCondensed-Regular.ttf') }}") format("truetype");
        } */

        body {
            font-family: Arial, Helvetica, sans-serif;
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
            width: 793px;
            height: 7%;
            padding: 12px;
            border: 1px solid #000000;
            background-color: rgb(101, 185, 101);

        }

        .header-sub {
            background-color: #05572f;
            width: 793px;
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
            /* display: block; */
        }

        .text-center {
            text-align: center;
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
            /* border: 1px solid black; */
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

        .inline {
            display: inline;
        }

        .mb-8 {
            margin-bottom: 80px;
        }

        .inline-block {
            display: inline-block;


        }

        .block {
            display: block;

        }

        .center-block {
            position: absolute;
            left: 4%;
        }

        .img-graphs2 {
            width: 300px;
            border: 1px solid #000000;
            display: block;
            margin-left: 8%;
        }

        .img-center {
            width: 300px;
            margin-left: 200px;
            border: 1px solid #000000;
        }

        .img-small {

            /* margin-left: 40px; */
            border: 1px solid #000000;

        }

        .img-three {

            border: 1px solid #000000;
        }

        .divt {
            width: 390px;
            border: 1px solid #000000;
            margin-left: 1px;

        }

        .lcen {
            margin-left: 200px;
        }

        /* table,
        th,
        td {
            border: 1px solid #000000;
            border-collapse: collapse;
        } */

        .p-10 {
            padding: 10px;
        }

        .textbox-l {
            border: 1px solid #000000;
            width: 750px;
        }

        .textbox2-l {
            border: 1px solid #000000;
            width: 370px;
        }

        .textbox2-r {
            position: relative;
            width: 370px;
            left: 400px;
            top: -163px;
            border: 1px solid #000000;
        }

        .textbox3-r {
            position: relative;
            width: 370px;
            left: 400px;
            top: -150px;
            border: 1px solid #000000;
        }

        .m-boxl {
            margin-left: 20px;
        }

        table.sum {
            /* border-collapse: separate;
            border-spacing: 50px 0; */
            background: rgb(212, 244, 215);
            border: 1px solid #000000;
            margin: 12px;
            width: 97%;
            text-align: center;

        }

        td.sum {
            padding: 10px;
            background: rgb(255, 255, 255);
            width: 48.5%;
            border: 1px solid #000000;
            /* Remove this line to disable grey background color */
        }

        table.flot-r {
            float: left;
            margin-top: -10px;
        }

        .font-sm {
            font-size: 12px;
        }

        table.footnote {
            margin-top: 35px;
            border: 1px solid #000000;
        }

        tr.footnote {
            color: rgb(0, 0, 0);
        }

        table.remarks {

            margin-left: 410px;
            border: 1px solid #000000;
            width: 370px;

        }

        span.remarks {
            margin-left: 30px;

        }

        hr {
            margin: 30px;
        }

        .report-name {
            position: absolute;
            width: 203px;
            height: 14px;
            left: 100px;
            top: 760px;
        }

        .report-position {
            position: absolute;
            width: 203px;
            height: 14px;
            left: 100px;
            top: 800px;
        }

        .report-company {
            position: absolute;
            width: 203px;
            height: 14px;
            left: 500px;
            top: 760px;
        }

        .report-date {
            position: absolute;
            width: 203px;
            height: 14px;
            left: 500px;
            top: 800px;
        }

        .size-18 {
            font-size: 24px
        }

        .name {
            position: absolute;
            top: 80%;
            left: 4%;
        }

        .department {
            position: absolute;
            top: 82%;
            left: 4%;
        }

        .big-text {
            font-size: 50px;
            font-weight: 900;
        }

        .sm-text {
            font-size: 18px;
        }

        .smm-text {
            font-size: 12px;
        }

        .text-bold {
            font-weight: bold;
            font-family: 'Roboto', sans-serif;
        }

        .text-bolder {
            font-weight: bolder
        }
    </style>
    {{-- page 1     --}}
    <div class="page-break">
        <img src="{{ public_path('assets/img/report/1.png') }}" width="800px" height="1100px">
        <span class="name text-bolder" style="color: #05572f">{{ $users->name }}</span>
        <span class="department text-bolder" style="color: #05572f">{{ $users->department }}</span>

    </div>

    @yield('content')

</body>

</html>
