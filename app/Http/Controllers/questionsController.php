<?php

namespace App\Http\Controllers;

use SPDF;
use QuickChart;
use App\Models\Groups;
use App\Models\Clients;
use App\Models\Questions;
// use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
use App\Models\Departments;

use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\templates_report;
use App\Models\Templates_summary;
use Illuminate\Support\Facades\DB;
use App\Models\Answer_records as record;
use App\Models\User;
use Illuminate\Contracts\View\View;

class questionsController extends Controller
{
    //
    public function index()
    {
        $record = DB::table('answer_records')->where('user_id', auth()->user()->id)->count();

        return view('user.index', [
            ''
        ]);
    }
    public function quiz()
    {
        $record = DB::table('answer_records')->where('user_id', auth()->user()->id)->count();

        if ($record > 0) {
            // return redirect('/home')->with('error', 'Your already answer');
            return redirect(route('results'))->with('error', 'Your already answer and redirected to your results');
        } else {
            return view('user.Bqust');
        }
        dd($record);
    }
    public function quiz2()
    {

        $Question = Questions::all();
        $Groups = Groups::all();
        $Cgroup = $Groups->count();
        //$Cgroup = gettype($Cgroup);
        //dd($Cgroup);
        //xdd($Question);
        return view(
            'user.quizz',
            [
                'questions' => $Question,
                'groups' => $Groups,
                'countG' => $Cgroup,
            ]

        );
    }
    public function Squiz()
    {
        $Question = Questions::all();
        $Groups = Groups::all();
        $Cgroup = $Groups->count();
        //$Cgroup = gettype($Cgroup);
        //dd($Cgroup);
        //xdd($Question);
        return view(
            'user.in',
            [
                'questions' => $Question,
                'groups' => $Groups,
                'countG' => $Cgroup,
            ]

        );
    }

    public function storQ(Request $request)
    {
        //dd($request);

        $formFields = $request->validate(
            [

                'Q1' => 'required',
                'Q2' => 'required',
                'Q3' => 'required',
                'Q4' => 'required',
                'Q5' => 'required',
                'Q6' => 'required',
                'Q7' => 'required',
                'Q8' => 'required',
                'Q9' => 'required',
                'Q10' => 'required',
                'Q11' => 'required',
                'Q12' => 'required',
                'Q13' => 'required',
                'Q14' => 'required',
                'Q15' => 'required',
                'Q16' => 'required',
                'Q17' => 'required',
                'Q18' => 'required',
                'Q19' => 'required',
                'Q20' => 'required',
                'Q21' => 'required',
                'Q22' => 'required',
                'Q23' => 'required',
                'Q24' => 'required',
            ]
        );

        $compile = array();
        $compilevar = array();
        $varD = $varI = $varS = $varC = 0;
        for ($i = 1; $i < 25; $i++) {
            $num = 'Q' . $i;
            //dd($num);
            $Q = $request->$num;


            // if(strcmp($Q,'D')){
            //     $varD++;
            // } else if(strcmp($Q,'I')){
            //     $varI++;
            // } else if(strcmp($Q,'S')){
            //     $varS++;
            // } else if(strcmp($Q,'C')){
            //     $varC++;
            // }

            switch ($Q) {
                case "D":
                    $varD++;
                    break;
                case "I":
                    $varI++;
                    break;
                case "S":
                    $varS++;
                    break;
                case "C":
                    $varC++;
                    break;
                default:
                    break;
            }
            //dd($Q);
            array_push($compile, $Q);
        }
        array_push($compilevar, $varD, $varI, $varS, $varC);


        $str = implode(", ", $compile);
        //dd($varD,$varI,$varS,$varC,$str);

        //dd(auth()->user()->id);
        //$clientid = auth()->user()->client_id;

        $record = new record;
        $record->answer_records = $str;
        $record->created_at = date('Y-m-d');
        $record->user_id = auth()->user()->id;
        $record->client_id = auth()->user()->client_id;
        $record->department_id = auth()->user()->department_id;
        $record->D = $varD;
        $record->I = $varI;
        $record->S = $varS;
        $record->C = $varC;
        $record->plot = "";
        //dd($record);
        $record->save();

        //return redirect('/home')->with('success', 'Your have answer the test');
        return redirect(route('results'))->with('success', 'Your have answer the test');
    }

    public function maxsort($arrbsort)
    {
        for ($i = 0; $i < count($arrbsort); $i++) {

            switch ($arrbsort[$i]) {

                case $copy[0]:
                    $arrbsort[$i] = 'D';
                    break;
                case $copy[1]:
                    $arrbsort[$i] = 'I';
                    break;
                case $copy[2]:
                    $arrbsort[$i] = 'S';
                    break;
                case $copy[3]:
                    $arrbsort[$i] = 'C';
                    break;
                default:
                    dd("error");
            }
        }
    }
    public function results()
    {
        $record = record::where('user_id', auth()->user()->id)->first();
        //dd($record);
        $high = 0;
        $highV = "";
        $val = array();
        array_push($val, $record->D, $record->I, $record->S, $record->C);
        $value = $this->splot($val);

        // $plot = explode(",", $record->plot);

        $max = max($value);


        $b_val = $this->max($value, $max);


        $darray = $value;
        // $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->vsort($darray);

        // dd($sorted, "sorted");

        $deptm = auth()->user()->department_id;
        $splot = join(",", $darray);
        $update = record::where('user_id', $record->user_id)->update(['department_id' => $deptm]);
        $update = record::where('user_id', $record->user_id)->update(['plot' => $splot]);
        $update = record::where('user_id', $record->user_id)->update(['High' => $sorted[0]]);
        $update = record::where('user_id', $record->user_id)->update(['Low' => $sorted[1]]);
        $dept = Departments::find(auth()->user()->department_id);
        $cid = auth()->user()->client_id;


        //update user status
        $status = User::where('id', $record->user_id)->update(['status' => 1]);
        $all = DB::table('users')->where('client_id', $cid)->count();

        $allanswer = DB::table('answer_records')->where('client_id', $cid)->count();
        // $allanswer = 4;
        $percentage = $allanswer / $all * 100;
        //    $percentage = 100;
        $percentage = intval($percentage);

        //    dd($darray,$b_val);






        return view('user.results', [
            'record' => $record,
            'high' => $highV,
            'department' => $dept->department,
            'plot' => $darray,
            'percentage' => $percentage,
            'Hvalue' => $b_val,

        ]);
    }
    public function results2()
    {
        $record = record::where('user_id', auth()->user()->id)->first();
        //dd($record);
        $high = 0;
        $highV = "";

        if ($record->D > $high) {
            $high = $record->D;
            $highV = 'D';
        }
        if ($record->I > $high) {
            $high = $record->I;
            $highV = 'I';
        }
        if ($record->S > $high) {
            $high = $record->S;
            $highV = 'S';
        }
        if ($record->C > $high) {
            $high = $record->C;
            $highV = 'C';
        }
        $plot = array();

        switch ($record->D) {
            case 0;
                array_push($plot, 2);
                break;
            case 1;
                array_push($plot, 5);
                break;
            case 2;
                array_push($plot, 9);
                break;
            case 3;
                array_push($plot, 12);
                break;
            case 4;
                array_push($plot, 14);
                break;
            case 5;
                array_push($plot, 17);
                break;
            case 6;
                array_push($plot, 19);
                break;
            case 7;
                array_push($plot, 21);
                break;
            case 8;
                array_push($plot, 24);
                break;
            case 9;
                array_push($plot, 27);
                break;
            case 10;
                array_push($plot, 32);
                break;
            case 11;
                array_push($plot, 33);
                break;
            case 12;
                array_push($plot, 34);
                break;
            case 13;
                array_push($plot, 36);
                break;
            case 14;
                array_push($plot, 38);
                break;
            case 15;
                array_push($plot, 44);
                break;
            case 16;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->I) {
            case 0;
                array_push($plot, 3);
                break;
            case 1;
                array_push($plot, 6);
                break;
            case 2;
                array_push($plot, 13);
                break;
            case 3;
                array_push($plot, 16);
                break;
            case 4;
                array_push($plot, 23);
                break;
            case 5;
                array_push($plot, 28);
                break;
            case 6;
                array_push($plot, 31);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 40);
                break;
            case 9;
                array_push($plot, 43);
                break;
            case 10;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->S) {
            case 0;
                array_push($plot, 4);
                break;
            case 1;
                array_push($plot, 8);
                break;
            case 2;
                array_push($plot, 10);
                break;
            case 3;
                array_push($plot, 14);
                break;
            case 4;
                array_push($plot, 18);
                break;
            case 5;
                array_push($plot, 22);
                break;
            case 6;
                array_push($plot, 25);
                break;
            case 7;
                array_push($plot, 29);
                break;
            case 8;
                array_push($plot, 31);
                break;
            case 9;
                array_push($plot, 35);
                break;
            case 10;
                array_push($plot, 39);
                break;
            case 11;
                array_push($plot, 42);
                break;
            case 12;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($record->C) {
            case 0;
                array_push($plot, 1);
                break;
            case 1;
                array_push($plot, 7);
                break;
            case 2;
                array_push($plot, 11);
                break;
            case 3;
                array_push($plot, 15);
                break;
            case 4;
                array_push($plot, 23);
                break;
            case 5;
                array_push($plot, 26);
                break;
            case 6;
                array_push($plot, 30);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 41);
                break;
            case 9;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }


        //dd($plot, $record->D,$record->I, $record->S,$record->C);

        //dd($record->D,$record->I,$record->S,$record->C,$high,$highV);
        //dd(auth()->user()->id);

        $darray = $plot;
        // $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->vsort($darray);
        //dd($sorted, "sorted");

        $deptm = auth()->user()->department_id;
        $splot = join(",", $plot);
        $update = record::where('user_id', $record->user_id)->update(['department_id' => $deptm]);
        $update = record::where('user_id', $record->user_id)->update(['plot' => $splot]);
        $update = record::where('user_id', $record->user_id)->update(['High' => $sorted[0]]);
        $update = record::where('user_id', $record->user_id)->update(['Low' => $sorted[1]]);
        $dept = Departments::find(auth()->user()->department_id);
        //dd($dept->department);



        return view('user.results2', [
            'record' => $record,
            'high' => $highV,
            'department' => $dept->department,
            'plot' => $plot,
        ]);
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('dom');

        return $pdf->stream('invoice.pdf');
        return $pdf->download('invoice.pdf');

        // return view('dom');
    }

    //start
    public function inv2()
    {
        $uderid = 20;
        $bt = 'C';
        $bvalue = 2;
        $auth = auth()->user()->id;
        //dd($auth);
        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();

        //qury get value depat

        $teamChart = $this->bydepart($join->department_id, 'department_id');
        $teamvalue = $teamChart;

        $teamChart = $this->getURLchart($teamChart);

        $companyChart = $this->bydepart($join->client_id, 'client_id');
        $companyvalue = $companyChart;
        $companyChart = $this->getURLchart($companyChart);

        $u_among = $this->comteam($join->id);
        $u_among = $this->percentageamong($u_among);


        //dd($qury);

        //$intd = intval($ans->plot);
        $darray = explode(',', $ans->plot);
        $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->bsort($integerIDs);
        //your disc
        $ystyle = array();
        array_push($ystyle, $ans->D, $ans->I, $ans->S, $ans->C);


        //$type = gettype($integerIDs);

        //dd($ans,$join,$integerIDs,$type);

        // $dept = $join->department;
        // dd($dept);
        $plot = explode(",", $ans->plot);


        //dd($template,$Behaviour_type,$keywords,$Wmotivate,$Wbest,$Wdemotive,$Wworst,$A_improve,$O_better,$O_avoid,$Y_environment);
        // $pdf = Pdf::loadView('dom');

        // return $pdf->stream('invoice.pdf');
        $qc = new QuickChart(array(
            'width' => 600,
            'height' => 300,
        ));

        $qc->setConfig('{
            type: "line",
            data: {
              labels: ["Hello world", "Test"],
              datasets: [{
                label: "Foo",
                data: [1, 2]
              }]
            }
          }');

        // Print the chart URL

        //dd($qc->getUrl());
        $img = $qc->getUrl();


        // chart
        $qc = new QuickChart(array(
            'width' => 150,
            'height' => 200,
            'version' => '2',
        ));


        //Behaviour value with range

        $v_D = $plot[0];
        $v_I = $plot[1];
        $v_S = $plot[2];
        $v_C = $plot[3];


        //dd($v_D, $v_I, $v_S, $v_C);

        $D_value = $this->assign_minmax($plot[0]);
        $I_value = $this->assign_minmax($plot[1]);
        $S_value = $this->assign_minmax($plot[2]);
        $C_value = $this->assign_minmax($plot[3]);
        //dd($D_value, $I_value, $S_value, $C_value);

        $max = max($plot);
        //get hight behaviour
        $b_val = $this->max($plot, $max);
        //dd($b_val);

        if ($b_val == 'D') {
            $D_value = 2;
        }
        if ($b_val == 'I') {
            $I_value = 2;
        }
        if ($b_val == 'S') {
            $S_value = 2;
        }
        if ($b_val == 'C') {
            $C_value = 2;
        }

        //dd($D_value,$I_value,$S_value,$C_value);
        $valbest = 2;


        switch ($valbest) {
            case $D_value;

                $best = 'D';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $D_hl = '';
                //dd($I_value);
                break;
            case $I_value;
                //dd('I');
                $best = 'I';
                $best = $this->com_best($best);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $I_hl = '';
                break;
            case $S_value;
                //dd('S');
                $best = 'S';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $S_hl = '';
                break;
            case $C_value;
                //dd('C');
                $best = 'C';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $C_hl = '';
                break;

            default:
                dd('unknown value');
        }

        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['','D', 'I', 'S', 'C',''],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [20,20,20, 20, 20, 20],
                    fill: false,
                    pointRadius:0,
                    borderWidth: 1
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [null, $v_D, $v_I, $v_S, $v_C,null],
                    pointRadius:0,
                    borderWidth: 4
                  },
                ],
              },
              options: {
                legend: {
                    display: false,
                },
                title: {
                  display: true,
                  text: 'DiSC Profiling grpahs',
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }

              },
        }");

        //dd($qc->getUrl());
        $template = DB::table('templates_reports')->where('Behaviour_type', $b_val)->first();
        //dd($template);


        //dd($plot);
        $keywords = $template->keywords;
        $Wmotivate = $template->Wmotivate;
        $Wbest = $template->Wbest;
        $Wdemotive = $template->Wdemotive;
        $Wworst = $template->Wworst;
        $A_improve = $template->A_improve;
        $O_better = $template->O_better;
        $O_avoid = $template->O_avoid;
        $Y_environment = $template->Y_environment;
        $Behaviour_type = $template->Behaviour_type;
        $stg = $template->Strength;

        //$keywords = $template->keywords;

        //dd($best, $Wmotivate);
        $keywords = explode(',', $keywords);
        $Wmotivate = explode('.', $Wmotivate);
        $Wbest = explode('.', $Wbest);
        $Wdemotive = explode('.', $Wdemotive);
        $Wworst = explode('.', $Wworst);
        $A_improve = explode('.', $A_improve);
        $O_better = explode('.', $O_better);
        $O_avoid = explode('.', $O_avoid);
        $Y_environment = explode('.', $Y_environment);
        $stg = explode('.', $stg);

        $best = explode('.', $best);
        $D_value = explode('.', $D_value);
        $I_value = explode('.', $I_value);
        $S_value = explode('.', $S_value);
        $C_value = explode('.', $C_value);




        $line = $qc->getUrl();

        $ch = 1;
        $img1 = "https://picsum.photos/200";
        //dd($D_value, $I_value, $S_value, $C_value,$D_hl,$I_hl,$S_hl,$C_hl);


        $pdf = pdf::loadView('PDF.individual', [
            'ansval' => $ans,
            'user'  => $join,
            'rank' => $sorted,
            'ch' => $ch,
            'img' => $img,
            'line' => $line,
            'b_val' => $b_val,
            'best' => $best,
            'D_value' => $D_value,
            'I_value' => $I_value,
            'S_value' => $S_value,
            'C_value' => $C_value,
            'D_hl' => $D_hl,
            'I_hl' => $I_hl,
            'S_hl' => $S_hl,
            'C_hl' => $C_hl,
            'keywords' => $keywords,
            'Wmotivate' => $Wmotivate,
            'Wbest' => $Wbest,
            'Wdemotive' => $Wdemotive,
            'Wworst' => $Wworst,
            'A_improve' => $A_improve,
            'O_better' => $O_better,
            'O_avoid' => $O_avoid,
            'Y_environment' => $Y_environment,
            'Behaviour_type' => $Behaviour_type,
            'stg' => $stg,
            'teamChart' => $teamChart,
            'companyChart' => $companyChart,
            'teamvalue' => $teamvalue,
            'companyvalue' => $companyvalue,
            'ystyle' => $ystyle,

        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('profiling.pdf');
    }
    //end

    //version 3 start
    public function inv3()
    {
        $uderid = 20;
        $bt = 'C';
        $bvalue = 2;
        $auth = auth()->user()->id;

        dd($auth);
        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();

        // $remarks = DB::table('remarks')->where('user_id', $auth)

        //qury get value depat

        // $personchart = $this->getURLchart();
        $teamChart = $this->bydepart($join->department_id, 'department_id');
        $teamvalue = $teamChart;

        $teamChart = $this->getURLchart($teamChart);

        $companyChart = $this->bydepart($join->client_id, 'client_id');
        $companyvalue = $companyChart;
        $companyChart = $this->getURLchart($companyChart);

        $u_among = $this->comteam($join->id);
        $u_among = $this->percentageamong($u_among);



        $darray = explode(',', $ans->plot);
        $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->bsort($integerIDs);
        //your disc
        $ystyle = array();
        array_push($ystyle, $ans->D, $ans->I, $ans->S, $ans->C);



        $plot = explode(",", $ans->plot);



        $qc = new QuickChart(array(
            'width' => 600,
            'height' => 300,
        ));

        $qc->setConfig('{
            type: "line",
            data: {
              labels: ["Hello world", "Test"],
              datasets: [{
                label: "Foo",
                data: [1, 2]
              }]
            }
          }');


        $img = $qc->getUrl();


        // chart
        $qc = new QuickChart(array(
            'width' => 150,
            'height' => 400,
            'version' => '2',
        ));


        //Behaviour value with range

        $v_D = $plot[0];
        $v_I = $plot[1];
        $v_S = $plot[2];
        $v_C = $plot[3];


        //dd($v_D, $v_I, $v_S, $v_C);

        $D_value = $this->assign_minmax($plot[0]);
        $I_value = $this->assign_minmax($plot[1]);
        $S_value = $this->assign_minmax($plot[2]);
        $C_value = $this->assign_minmax($plot[3]);


        $max = max($plot);
        //get hight behaviour
        $b_val = $this->max($plot, $max);
        // dd($b_val);

        if ($b_val == 'D') {
            $D_value = 2;
        }
        if ($b_val == 'I') {
            $I_value = 2;
        }
        if ($b_val == 'S') {
            $S_value = 2;
        }
        if ($b_val == 'C') {
            $C_value = 2;
        }


        $valbest = 2;


        switch ($valbest) {
            case $D_value;

                $best = 'D';
                $stylebest = 'Dominance';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1 = 'Influance';
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = 'Steadiness';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                //dd($I_value);
                break;
            case $I_value;
                //dd('I');
                $best = 'I';
                $stylebest = 'Influance';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($D_value);
                $values1 = $this->com_D($D_value);
                $style1 = 'Dominance';
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = 'Steadiness';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                break;
            case $S_value;
                //dd('S');
                $best = 'S';
                $stylebest = 'Steadiness';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1  = 'Influance';
                $highlow2 = $this->highlow($D_value);
                $values2 = $this->com_D($D_value);
                $style2 = 'Dominance';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                break;
            case $C_value;
                //dd('C');
                $best = 'C';
                $stylebest = "Compliance";
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1 = "Influance";
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = "Steadiness";
                $highlow3 = $this->highlow($D_value);
                $values3 = $this->com_D($D_value);
                $style3 = "Dominance";
                $highlowbest = 'Highest';
                break;

            default:
                dd('unknown value');
        }



        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['','D', 'I', 'S', 'C',''],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [20,20,20, 20, 20, 20],
                    fill: false,
                    pointRadius:0,
                    borderWidth: 1
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [null, $v_D, $v_I, $v_S, $v_C,null],
                    pointRadius:0,
                    borderWidth: 4
                  },
                ],
              },
              options: {
                legend: {
                    display: false,
                },
                title: {
                  display: true,
                  text: 'DiSC Profiling grpahs',
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }

              },
        }");

        //dd($qc->getUrl());
        $template = DB::table('templates_reports')->where('Behaviour_type', $b_val)->first();
        //dd($template);


        //dd($plot);
        $keywords = $template->keywords;
        $Wmotivate = $template->Wmotivate;
        $Wbest = $template->Wbest;
        $Wdemotive = $template->Wdemotive;
        $Wworst = $template->Wworst;
        $A_improve = $template->A_improve;
        $O_better = $template->O_better;
        $O_avoid = $template->O_avoid;
        $Y_environment = $template->Y_environment;
        $Behaviour_type = $template->Behaviour_type;
        $stg = $template->Strength;

        //$keywords = $template->keywords;

        //dd($best, $Wmotivate);
        $keywords = explode(',', $keywords);
        $Wmotivate = explode('.', $Wmotivate);
        $Wbest = explode('.', $Wbest);
        $Wdemotive = explode('.', $Wdemotive);
        $Wworst = explode('.', $Wworst);
        $A_improve = explode('.', $A_improve);
        $O_better = explode('.', $O_better);
        $O_avoid = explode('.', $O_avoid);
        $Y_environment = explode('.', $Y_environment);
        $stg = explode('.', $stg);


        $best = explode('.', $best);
        $values1 = explode('.', $values1);
        $values2 = explode('.', $values2);
        $values3 = explode('.', $values3);




        $bar = $this->barchart(0, 0);

        $line = $qc->getUrl();

        $ch = 1;
        $img1 = "https://picsum.photos/200";


        // $values1 = $D_value;
        // $values2 = $I_value;
        // $values3 = $S_value;
        // $valueBest = $best;
        //technical report value
        //presonal style
        $style_personal = array();
        array_push($style_personal, $ans->D, $ans->I, $ans->S, $ans->C);
        $personalchart = $this->getURLchart($style_personal);

        $dept = auth()->user()->department_id;
        $same = $this->same($dept, $b_val);
        $same = intval($same);



        $pdf = pdf::loadView('PDF.individual3', [
            'ansval' => $ans,
            'user'  => $join,
            'rank' => $sorted,
            'ch' => $ch,
            'img' => $img,
            'line' => $line,
            'b_val' => $b_val,
            'best' => $best,
            'same' => $same,
            // 'D_values' => $D_value,
            // 'I_values' => $I_value,
            // 'S_values' => $S_value,
            // 'C_values' => $C_value,
            'values1' => $values1,
            'values2' => $values2,
            'values3' => $values3,
            'style1' => $style1,
            'style2' => $style2,
            'style3' => $style3,
            'stylebest' => $stylebest,
            // 'D_hl' => $D_hl,
            // 'I_hl' => $I_hl,
            // 'S_hl' => $S_hl,
            // 'C_hl' => $C_hl,
            'highlow1' => $highlow1,
            'highlow2' => $highlow2,
            'highlow3' => $highlow3,
            'highlowbest' => $highlowbest,
            'keywords' => $keywords,
            'Wmotivates' => $Wmotivate,
            'Wbests' => $Wbest,
            'Wdemotives' => $Wdemotive,
            'Wworsts' => $Wworst,
            'A_improves' => $A_improve,
            'O_betters' => $O_better,
            'O_avoids' => $O_avoid,
            'Y_environments' => $Y_environment,
            'Behaviour_type' => $Behaviour_type,
            'stg' => $stg,
            'personalchart' => $personalchart,
            'teamChart' => $teamChart,
            'companyChart' => $companyChart,
            'teamvalue' => $teamvalue,
            'companyvalue' => $companyvalue,
            'style_personal' => $style_personal,
            'ystyle' => $ystyle,
            'bar' => $bar,


        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        // $pdf->setPaper('A4', 'potrait');

        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('profiling.pdf');
    }
    //end


    //version 3 start
    public function report_inv($uid)
    {
        $auth = $uid;
        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();
        $remarks = DB::table('remarks')->where('user_id', $auth)->first();
        $cremarks =  DB::table('remarks')->where('user_id', $auth)->count();
        if ($cremarks > 0) {
            $remarks = $remarks;
            $remarks->rem_1 = explode(".", $remarks->rem_1);
            $remarks->rem_2 = explode(".", $remarks->rem_2);
            $remarks->rem_3 = explode(".", $remarks->rem_3);
        } else {
            $remarks = "";
        }
        // dd($remarks);
        //template query



        $template = DB::table('templates_reports')->where('Behaviour_type', $ans->High)->first();

        $strength = $template->Strength;
        $strength = explode(".", $strength);
        $fear = $template->fear;
        $fear = explode(",", $fear);
        $motS = $template->motivate_sum;
        $motS = explode(",", $motS);


        //fetch motivation management
        $motivate = $template->Wmotivate;
        $motivate = explode(".", $motivate);
        $best = $template->Wbest;
        $best = explode(".", $best);
        $demotive = $template->Wdemotive;
        $demotive = explode(".", $demotive);
        $worst = $template->Wworst;
        $worst = explode(".", $worst);

        //dd($motivate,$best,$demotive,$worst);

        //fetch perfoemance management
        $improve = $template->A_improve;
        $improve = explode(".", $improve);
        $better = $template->O_better;
        $better = explode(".", $better);
        $avoid = $template->O_avoid;
        $avoid = explode(".", $avoid);
        $environment = $template->Y_environment;
        $environment = explode(".", $environment);

        //dd($improve,$better,$avoid,$environment);

        $High = $ans->High;
        $keywords = $template->keywords;
        $keywords = explode(",", $keywords);


        //fetch motivation




        $array_plot = explode(",", $ans->plot);
        $array_plot = array_map('intval', $array_plot);

        //assign high or low the style
        $D_value = $array_plot[0];
        $D_value = $this->compareHL($D_value, "D");
        $I_value = $array_plot[1];
        $I_value = $this->compareHL($I_value, "I");
        $S_value = $array_plot[2];
        $S_value = $this->compareHL($S_value, "S");
        $C_value = $array_plot[3];
        $C_value = $this->compareHL($C_value, "C");

        $higest = 0;
        foreach ($array_plot as $plt) {
            if ($plt > $higest) {
                $higest = $plt;
                
            }
        }

        
        switch ($higest) {
            case $array_plot[0]:
                
                $D_value = 'Higest';
                break;
            case $array_plot[1]:
                
                $I_value = 'Higest';
                break;
            case $array_plot[2]:
                
                $S_value = 'Higest';
                break;
            case $array_plot[3]:
                
                $C_value = 'Higest';
                break;

            default:
                # code...
                break;
        }

        

        
        $HL_D = $D_value;
        $HL_I = $I_value;
        $HL_S = $S_value;
        $HL_C = $C_value;
        


        $D_value = $this->styleTemplate("D", $D_value);
        $I_value = $this->styleTemplate("I", $I_value);
        $S_value = $this->styleTemplate("S", $S_value);
        $C_value = $this->styleTemplate("C", $C_value);
        //assign final value into array so can easily display this for style template high or low
        $D_value = explode(".", $D_value);
        $I_value = explode(".", $I_value);
        $S_value = explode(".", $S_value);
        $C_value = explode(".", $C_value);
        //dd($ans,$array_plot,$D_value,$I_value,$S_value,$C_value);


        // dd($High);







        // dd($join);




        //qury get value depat


        // $personchart = $this->getURLchart();
        // dd($join);

        $personalchart = [];
        array_push($personalchart, $ans->D, $ans->I, $ans->S, $ans->C);
        $pervalue = $personalchart;
        $personalchart = $this->getURLchart($personalchart);





        $teamChart = $this->bydepart($join->department_id, 'department_id', $ans->client_id);
        $teamvalue = $teamChart;



        $teamChart = $this->getURLchart($teamChart);

        $companyChart = $this->byclient($join->client_id, 'client_id');
        $companyvalue = $companyChart;
        // dd($companyvalue);
        $companyChart = $this->getURLchart($companyChart);


        //dd($companyvalue,$teamvalue,$pervalue);





        //dd($ans->D." ". $ans->I." ".$ans->S." ".$ans->C,$teamvalue,$companyvalue);


        $u_among = $this->comteam($join->id);
        // dd($join);
        $cname = DB::table('clients')->where('id', $join->client_id)->first();


        $logo = "images/" . $join->client_id . ".png";

        // dd($logo);





        $best = array_filter($best);
        $motivate = array_filter($motivate);
        $demotive = array_filter($demotive);
        $worst = array_filter($worst);
        $improve = array_filter($improve);
        $better = array_filter($better);
        $avoid = array_filter($avoid);
        $environment = array_filter($environment);
        $date = date('d  M  Y');
        // dd($HL_D, $HL_I, $HL_S, $HL_C);


        // dd($fear,$motS);
        
        $pdf = pdf::loadView('PDF.ProfilingIndividu', [
            'logo' => $logo,
            'personalchart' => $personalchart,
            'teamChart' => $teamChart,
            'companyChart' => $companyChart,
            'strength' => $strength,
            'motivates' => $motivate,
            'bests' => $best,
            'demotives' => $demotive,
            'worsts' => $worst,
            'improves' => $improve,
            'betters' => $better,
            'avoids' => $avoid,
            'environments' => $environment,
            'High' => $High,
            'keywords' => $keywords,
            'users' => $join,
            'Dvalues' => $D_value,
            'Ivalues' => $I_value,
            'Svalues' => $S_value,
            'Cvalues' => $C_value,
            'remarks' => $remarks,
            'cremarks' => $cremarks,
            'percent' => $u_among,
            'HLD' => $HL_D,
            'HLI' => $HL_I,
            'HLS' => $HL_S,
            'HLC' => $HL_C,
            'date' => $date,
            'fear' => $fear,
            'motS' => $motS,


        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        // $pdf->setPaper('A4', 'potrait');
        $docname = 'Profiling Report ' . $join->name . '.pdf';
        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream($docname);
        //return $pdf->download('profiling.pdf');
    }
    //trial
    public function report_trial($uid)
    {
        $auth = $uid;
        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();
        $remarks = DB::table('remarks')->where('user_id', $auth)->first();
        $cremarks =  DB::table('remarks')->where('user_id', $auth)->count();
        if ($cremarks > 0) {
            $remarks = $remarks;
            $remarks->rem_1 = explode(".", $remarks->rem_1);
            $remarks->rem_2 = explode(".", $remarks->rem_2);
            $remarks->rem_3 = explode(".", $remarks->rem_3);
        } else {
            $remarks = "";
        }
        // dd($remarks);
        //template query



        $template = DB::table('templates_reports')->where('Behaviour_type', $ans->High)->first();

        $strength = $template->Strength;
        $strength = explode(".", $strength);
        $fear = $template->fear;
        $fear = explode(",", $fear);
        $motS = $template->motivate_sum;
        $motS = explode(",", $motS);


        //fetch motivation management
        $motivate = $template->Wmotivate;
        $motivate = explode(".", $motivate);
        $best = $template->Wbest;
        $best = explode(".", $best);
        $demotive = $template->Wdemotive;
        $demotive = explode(".", $demotive);
        $worst = $template->Wworst;
        $worst = explode(".", $worst);

        //dd($motivate,$best,$demotive,$worst);

        //fetch perfoemance management
        $improve = $template->A_improve;
        $improve = explode(".", $improve);
        $better = $template->O_better;
        $better = explode(".", $better);
        $avoid = $template->O_avoid;
        $avoid = explode(".", $avoid);
        $environment = $template->Y_environment;
        $environment = explode(".", $environment);

        //dd($improve,$better,$avoid,$environment);

        $High = $ans->High;
        $keywords = $template->keywords;
        $keywords = explode(",", $keywords);


        //fetch motivation




        $array_plot = explode(",", $ans->plot);
        $array_plot = array_map('intval', $array_plot);

        //assign high or low the style
        $D_value = $array_plot[0];
        $D_value = $this->compareHL($D_value, "D");
        $I_value = $array_plot[1];
        $I_value = $this->compareHL($I_value, "I");
        $S_value = $array_plot[2];
        $S_value = $this->compareHL($S_value, "S");
        $C_value = $array_plot[3];
        $C_value = $this->compareHL($C_value, "C");

        $higest = 0;
        foreach ($array_plot as $plt) {
            if ($plt > $higest) {
                $higest = $plt;
                
            }
        }

        
        switch ($higest) {
            case $array_plot[0]:
                
                $D_value = 'Higest';
                break;
            case $array_plot[1]:
                
                $I_value = 'Higest';
                break;
            case $array_plot[2]:
                
                $S_value = 'Higest';
                break;
            case $array_plot[3]:
                
                $C_value = 'Higest';
                break;

            default:
                # code...
                break;
        }

        

        
        $HL_D = $D_value;
        $HL_I = $I_value;
        $HL_S = $S_value;
        $HL_C = $C_value;
        


        $D_value = $this->styleTemplate("D", $D_value);
        $I_value = $this->styleTemplate("I", $I_value);
        $S_value = $this->styleTemplate("S", $S_value);
        $C_value = $this->styleTemplate("C", $C_value);
        //assign final value into array so can easily display this for style template high or low
        $D_value = explode(".", $D_value);
        $I_value = explode(".", $I_value);
        $S_value = explode(".", $S_value);
        $C_value = explode(".", $C_value);
        //dd($ans,$array_plot,$D_value,$I_value,$S_value,$C_value);


        // dd($High);







        // dd($join);




        //qury get value depat


        // $personchart = $this->getURLchart();
        // dd($join);

        $personalchart = [];
        array_push($personalchart, $ans->D, $ans->I, $ans->S, $ans->C);
        $pervalue = $personalchart;
        $personalchart = $this->getURLchart($personalchart);





        $teamChart = $this->bydepart($join->department_id, 'department_id', $ans->client_id);
        $teamvalue = $teamChart;



        $teamChart = $this->getURLchart($teamChart);

        $companyChart = $this->byclient($join->client_id, 'client_id');
        $companyvalue = $companyChart;
        // dd($companyvalue);
        $companyChart = $this->getURLchart($companyChart);


        //dd($companyvalue,$teamvalue,$pervalue);





        //dd($ans->D." ". $ans->I." ".$ans->S." ".$ans->C,$teamvalue,$companyvalue);


        $u_among = $this->comteam($join->id);
        // dd($join);
        $cname = DB::table('clients')->where('id', $join->client_id)->first();


        $logo = "images/" . $join->client_id . ".png";

        // dd($logo);





        $best = array_filter($best);
        $motivate = array_filter($motivate);
        $demotive = array_filter($demotive);
        $worst = array_filter($worst);
        $improve = array_filter($improve);
        $better = array_filter($better);
        $avoid = array_filter($avoid);
        $environment = array_filter($environment);
        $date = date('d  M  Y');
        // dd($HL_D, $HL_I, $HL_S, $HL_C);


        // dd($fear,$motS);
        
        $pdf = pdf::loadView('PDF.ProfilingTrial', [
            'logo' => $logo,
            'personalchart' => $personalchart,
            'teamChart' => $teamChart,
            'companyChart' => $companyChart,
            'strength' => $strength,
            'motivates' => $motivate,
            'bests' => $best,
            'demotives' => $demotive,
            'worsts' => $worst,
            'improves' => $improve,
            'betters' => $better,
            'avoids' => $avoid,
            'environments' => $environment,
            'High' => $High,
            'keywords' => $keywords,
            'users' => $join,
            'Dvalues' => $D_value,
            'Ivalues' => $I_value,
            'Svalues' => $S_value,
            'Cvalues' => $C_value,
            'remarks' => $remarks,
            'cremarks' => $cremarks,
            'percent' => $u_among,
            'HLD' => $HL_D,
            'HLI' => $HL_I,
            'HLS' => $HL_S,
            'HLC' => $HL_C,
            'date' => $date,
            'fear' => $fear,
            'motS' => $motS,


        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        // $pdf->setPaper('A4', 'potrait');
        $docname = 'Profiling Report ' . $join->name . '.pdf';
        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream($docname);
        //return $pdf->download('profiling.pdf');
    }
    //end
    //version 3 start
    public function grv3()
    {
        $uderid = 20;
        $bt = 'C';
        $bvalue = 2;
        $auth = auth()->user()->id;

        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();

        //qury get value depat

        // $personchart = $this->getURLchart();
        $teamChart = $this->bydepart($join->department_id, 'department_id');
        $teamvalue = $teamChart;

        $teamChart = $this->getURLchart($teamChart);

        $companyChart = $this->bydepart($join->client_id, 'client_id');
        $companyvalue = $companyChart;
        $companyChart = $this->getURLchart($companyChart);

        $u_among = $this->comteam($join->id);
        $u_among = $this->percentageamong($u_among);



        $darray = explode(',', $ans->plot);
        $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->bsort($integerIDs);
        //your disc
        $ystyle = array();
        array_push($ystyle, $ans->D, $ans->I, $ans->S, $ans->C);



        $plot = explode(",", $ans->plot);



        $qc = new QuickChart(array(
            'width' => 600,
            'height' => 300,
        ));

        $qc->setConfig('{
            type: "line",
            data: {
              labels: ["Hello world", "Test"],
              datasets: [{
                label: "Foo",
                data: [1, 2]
              }]
            }
          }');


        $img = $qc->getUrl();


        // chart
        $qc = new QuickChart(array(
            'width' => 150,
            'height' => 400,
            'version' => '2',
        ));


        //Behaviour value with range

        $v_D = $plot[0];
        $v_I = $plot[1];
        $v_S = $plot[2];
        $v_C = $plot[3];


        //dd($v_D, $v_I, $v_S, $v_C);

        $D_value = $this->assign_minmax($plot[0]);
        $I_value = $this->assign_minmax($plot[1]);
        $S_value = $this->assign_minmax($plot[2]);
        $C_value = $this->assign_minmax($plot[3]);


        $max = max($plot);
        //get hight behaviour
        $b_val = $this->max($plot, $max);
        // dd($b_val);

        if ($b_val == 'D') {
            $D_value = 2;
        }
        if ($b_val == 'I') {
            $I_value = 2;
        }
        if ($b_val == 'S') {
            $S_value = 2;
        }
        if ($b_val == 'C') {
            $C_value = 2;
        }


        $valbest = 2;


        switch ($valbest) {
            case $D_value;

                $best = 'D';
                $stylebest = 'Dominance';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1 = 'Influance';
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = 'Steadiness';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                //dd($I_value);
                break;
            case $I_value;
                //dd('I');
                $best = 'I';
                $stylebest = 'Influance';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($D_value);
                $values1 = $this->com_D($D_value);
                $style1 = 'Dominance';
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = 'Steadiness';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                break;
            case $S_value;
                //dd('S');
                $best = 'S';
                $stylebest = 'Steadiness';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1  = 'Influance';
                $highlow2 = $this->highlow($D_value);
                $values2 = $this->com_D($D_value);
                $style2 = 'Dominance';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                break;
            case $C_value;
                //dd('C');
                $best = 'C';
                $stylebest = "Compliance";
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1 = "Influance";
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = "Steadiness";
                $highlow3 = $this->highlow($D_value);
                $values3 = $this->com_D($D_value);
                $style3 = "Dominance";
                $highlowbest = 'Highest';
                break;

            default:
                dd('unknown value');
        }



        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['','D', 'I', 'S', 'C',''],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [20,20,20, 20, 20, 20],
                    fill: false,
                    pointRadius:0,
                    borderWidth: 1
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [null, $v_D, $v_I, $v_S, $v_C,null],
                    pointRadius:0,
                    borderWidth: 4
                  },
                ],
              },
              options: {
                legend: {
                    display: false,
                },
                title: {
                  display: true,
                  text: 'DiSC Profiling grpahs',
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }

              },
        }");

        //dd($qc->getUrl());
        $template = DB::table('templates_reports')->where('Behaviour_type', $b_val)->first();
        //dd($template);


        //dd($plot);
        $keywords = $template->keywords;
        $Wmotivate = $template->Wmotivate;
        $Wbest = $template->Wbest;
        $Wdemotive = $template->Wdemotive;
        $Wworst = $template->Wworst;
        $A_improve = $template->A_improve;
        $O_better = $template->O_better;
        $O_avoid = $template->O_avoid;
        $Y_environment = $template->Y_environment;
        $Behaviour_type = $template->Behaviour_type;
        $stg = $template->Strength;

        //$keywords = $template->keywords;

        //dd($best, $Wmotivate);
        $keywords = explode(',', $keywords);
        $Wmotivate = explode('.', $Wmotivate);
        $Wbest = explode('.', $Wbest);
        $Wdemotive = explode('.', $Wdemotive);
        $Wworst = explode('.', $Wworst);
        $A_improve = explode('.', $A_improve);
        $O_better = explode('.', $O_better);
        $O_avoid = explode('.', $O_avoid);
        $Y_environment = explode('.', $Y_environment);
        $stg = explode('.', $stg);


        $best = explode('.', $best);
        $values1 = explode('.', $values1);
        $values2 = explode('.', $values2);
        $values3 = explode('.', $values3);




        $bar = $this->barchart(0, 0);

        $line = $qc->getUrl();

        $ch = 1;
        $img1 = "https://picsum.photos/200";


        // $values1 = $D_value;
        // $values2 = $I_value;
        // $values3 = $S_value;
        // $valueBest = $best;
        //technical report value
        //presonal style
        $style_personal = array();
        array_push($style_personal, $ans->D, $ans->I, $ans->S, $ans->C);
        $personalchart = $this->getURLchart($style_personal);

        $dept = auth()->user()->department_id;
        $same = $this->same($dept, $b_val);
        $same = intval($same);



        $pdf = pdf::loadView('PDF.individual3', [
            'ansval' => $ans,
            'user'  => $join,
            'rank' => $sorted,
            'ch' => $ch,
            'img' => $img,
            'line' => $line,
            'b_val' => $b_val,
            'best' => $best,
            'same' => $same,
            // 'D_values' => $D_value,
            // 'I_values' => $I_value,
            // 'S_values' => $S_value,
            // 'C_values' => $C_value,
            'values1' => $values1,
            'values2' => $values2,
            'values3' => $values3,
            'style1' => $style1,
            'style2' => $style2,
            'style3' => $style3,
            'stylebest' => $stylebest,
            // 'D_hl' => $D_hl,
            // 'I_hl' => $I_hl,
            // 'S_hl' => $S_hl,
            // 'C_hl' => $C_hl,
            'highlow1' => $highlow1,
            'highlow2' => $highlow2,
            'highlow3' => $highlow3,
            'highlowbest' => $highlowbest,
            'keywords' => $keywords,
            'Wmotivates' => $Wmotivate,
            'Wbests' => $Wbest,
            'Wdemotives' => $Wdemotive,
            'Wworsts' => $Wworst,
            'A_improves' => $A_improve,
            'O_betters' => $O_better,
            'O_avoids' => $O_avoid,
            'Y_environments' => $Y_environment,
            'Behaviour_type' => $Behaviour_type,
            'stg' => $stg,
            'personalchart' => $personalchart,
            'teamChart' => $teamChart,
            'companyChart' => $companyChart,
            'teamvalue' => $teamvalue,
            'companyvalue' => $companyvalue,
            'style_personal' => $style_personal,
            'ystyle' => $ystyle,
            'bar' => $bar,


        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        // $pdf->setPaper('A4', 'potrait');

        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('profiling.pdf');
    }
    //end
    //version 3 start
    public function inv4()
    {
        $uderid = 20;
        $bt = 'C';
        $bvalue = 2;
        $auth = auth()->user()->id;

        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();

        //qury get value depat

        // $personchart = $this->getURLchart();
        $teamChart = $this->bydepart($join->department_id, 'department_id');
        $teamvalue = $teamChart;

        $teamChart = $this->getURLchart($teamChart);

        $companyChart = $this->bydepart($join->client_id, 'client_id');
        $companyvalue = $companyChart;
        $companyChart = $this->getURLchart($companyChart);

        $u_among = $this->comteam($join->id);
        $u_among = $this->percentageamong($u_among);



        $darray = explode(',', $ans->plot);
        $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->bsort($integerIDs);
        //your disc
        $ystyle = array();
        array_push($ystyle, $ans->D, $ans->I, $ans->S, $ans->C);



        $plot = explode(",", $ans->plot);



        $qc = new QuickChart(array(
            'width' => 600,
            'height' => 300,
        ));

        $qc->setConfig('{
            type: "line",
            data: {
              labels: ["Hello world", "Test"],
              datasets: [{
                label: "Foo",
                data: [1, 2]
              }]
            }
          }');


        $img = $qc->getUrl();


        // chart
        $qc = new QuickChart(array(
            'width' => 150,
            'height' => 400,
            'version' => '2',
        ));


        //Behaviour value with range

        $v_D = $plot[0];
        $v_I = $plot[1];
        $v_S = $plot[2];
        $v_C = $plot[3];


        //dd($v_D, $v_I, $v_S, $v_C);

        $D_value = $this->assign_minmax($plot[0]);
        $I_value = $this->assign_minmax($plot[1]);
        $S_value = $this->assign_minmax($plot[2]);
        $C_value = $this->assign_minmax($plot[3]);


        $max = max($plot);
        //get hight behaviour
        $b_val = $this->max($plot, $max);
        // dd($b_val);

        if ($b_val == 'D') {
            $D_value = 2;
        }
        if ($b_val == 'I') {
            $I_value = 2;
        }
        if ($b_val == 'S') {
            $S_value = 2;
        }
        if ($b_val == 'C') {
            $C_value = 2;
        }


        $valbest = 2;


        switch ($valbest) {
            case $D_value;

                $best = 'D';
                $stylebest = 'Dominance';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1 = 'Influance';
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = 'Steadiness';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                //dd($I_value);
                break;
            case $I_value;
                //dd('I');
                $best = 'I';
                $stylebest = 'Influance';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($D_value);
                $values1 = $this->com_D($D_value);
                $style1 = 'Dominance';
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = 'Steadiness';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                break;
            case $S_value;
                //dd('S');
                $best = 'S';
                $stylebest = 'Steadiness';
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1  = 'Influance';
                $highlow2 = $this->highlow($D_value);
                $values2 = $this->com_D($D_value);
                $style2 = 'Dominance';
                $highlow3 = $this->highlow($C_value);
                $values3 = $this->com_C($C_value);
                $style3 = 'Compliance';
                $highlowbest = 'Highest';
                break;
            case $C_value;
                //dd('C');
                $best = 'C';
                $stylebest = "Compliance";
                $best = $this->com_best($best);
                $highlow1 = $this->highlow($I_value);
                $values1 = $this->com_I($I_value);
                $style1 = "Influance";
                $highlow2 = $this->highlow($S_value);
                $values2 = $this->com_S($S_value);
                $style2 = "Steadiness";
                $highlow3 = $this->highlow($D_value);
                $values3 = $this->com_D($D_value);
                $style3 = "Dominance";
                $highlowbest = 'Highest';
                break;

            default:
                dd('unknown value');
        }



        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['','D', 'I', 'S', 'C',''],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [20,20,20, 20, 20, 20],
                    fill: false,
                    pointRadius:0,
                    borderWidth: 1
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [null, $v_D, $v_I, $v_S, $v_C,null],
                    pointRadius:0,
                    borderWidth: 4
                  },
                ],
              },
              options: {
                legend: {
                    display: false,
                },
                title: {
                  display: true,
                  text: 'DiSC Profiling grpahs',
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }

              },
        }");

        //dd($qc->getUrl());
        $template = DB::table('templates_reports')->where('Behaviour_type', $b_val)->first();
        //dd($template);


        //dd($plot);
        $keywords = $template->keywords;
        $Wmotivate = $template->Wmotivate;
        $Wbest = $template->Wbest;
        $Wdemotive = $template->Wdemotive;
        $Wworst = $template->Wworst;
        $A_improve = $template->A_improve;
        $O_better = $template->O_better;
        $O_avoid = $template->O_avoid;
        $Y_environment = $template->Y_environment;
        $Behaviour_type = $template->Behaviour_type;
        $stg = $template->Strength;

        //$keywords = $template->keywords;

        //dd($best, $Wmotivate);
        $keywords = explode(',', $keywords);
        $Wmotivate = explode('.', $Wmotivate);
        $Wbest = explode('.', $Wbest);
        $Wdemotive = explode('.', $Wdemotive);
        $Wworst = explode('.', $Wworst);
        $A_improve = explode('.', $A_improve);
        $O_better = explode('.', $O_better);
        $O_avoid = explode('.', $O_avoid);
        $Y_environment = explode('.', $Y_environment);
        $stg = explode('.', $stg);


        $best = explode('.', $best);
        $values1 = explode('.', $values1);
        $values2 = explode('.', $values2);
        $values3 = explode('.', $values3);




        $bar = $this->barchart(0, 0);

        $line = $qc->getUrl();

        $ch = 1;
        $img1 = "https://picsum.photos/200";


        // $values1 = $D_value;
        // $values2 = $I_value;
        // $values3 = $S_value;
        // $valueBest = $best;
        //technical report value
        //presonal style
        $style_personal = array();
        array_push($style_personal, $ans->D, $ans->I, $ans->S, $ans->C);

        // $personalchart = $this->getURLchart($style_personal);
        $personalchart = $this->getURLchart2($style_personal, 'radar');


        $dept = auth()->user()->department_id;
        $same = $this->same($dept, $b_val);
        $same = intval($same);



        $pdf = pdf::loadView('PDF.individual4', [
            'ansval' => $ans,
            'user'  => $join,
            'rank' => $sorted,
            'ch' => $ch,
            'img' => $img,
            'line' => $line,
            'b_val' => $b_val,
            'best' => $best,
            'same' => $same,
            // 'D_values' => $D_value,
            // 'I_values' => $I_value,
            // 'S_values' => $S_value,
            // 'C_values' => $C_value,
            'values1' => $values1,
            'values2' => $values2,
            'values3' => $values3,
            'style1' => $style1,
            'style2' => $style2,
            'style3' => $style3,
            'stylebest' => $stylebest,
            // 'D_hl' => $D_hl,
            // 'I_hl' => $I_hl,
            // 'S_hl' => $S_hl,
            // 'C_hl' => $C_hl,
            'highlow1' => $highlow1,
            'highlow2' => $highlow2,
            'highlow3' => $highlow3,
            'highlowbest' => $highlowbest,
            'keywords' => $keywords,
            'Wmotivates' => $Wmotivate,
            'Wbests' => $Wbest,
            'Wdemotives' => $Wdemotive,
            'Wworsts' => $Wworst,
            'A_improves' => $A_improve,
            'O_betters' => $O_better,
            'O_avoids' => $O_avoid,
            'Y_environments' => $Y_environment,
            'Behaviour_type' => $Behaviour_type,
            'stg' => $stg,
            'personalchart' => $personalchart,
            'teamChart' => $teamChart,
            'companyChart' => $companyChart,
            'teamvalue' => $teamvalue,
            'companyvalue' => $companyvalue,
            'style_personal' => $style_personal,
            'ystyle' => $ystyle,
            'bar' => $bar,


        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        // $pdf->setPaper('A4', 'potrait');

        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('profiling.pdf');
    }
    //end


    public function com_best($best)
    {
        $best = DB::table('templates_reports')->where('Behaviour_type', $best)->pluck('H_temp')->first();
        return $best;
    }
    public function com_D($D_value)
    {
        if ($D_value > 0) {
            $D_value = DB::table('templates_reports')->where('Behaviour_type', 'D')->pluck('H_temp')->first();
        } else {
            $D_value = DB::table('templates_reports')->where('Behaviour_type', 'D')->pluck('L_temp')->first();
        }
        return $D_value;
    }

    public function com_I($I_value)
    {
        if ($I_value > 0) {
            $I_value = DB::table('templates_reports')->where('Behaviour_type', 'I')->pluck('H_temp')->first();
        } else {
            $I_value = DB::table('templates_reports')->where('Behaviour_type', 'I')->pluck('L_temp')->first();
        }
        return $I_value;
    }

    public function com_S($S_value)
    {
        if ($S_value > 0) {
            $S_value = DB::table('templates_reports')->where('Behaviour_type', 'S')->pluck('H_temp')->first();
        } else {
            $S_value = DB::table('templates_reports')->where('Behaviour_type', 'S')->pluck('L_temp')->first();
        }
        return $S_value;
    }

    public function com_C($C_value)
    {
        if ($C_value > 0) {
            $C_value = DB::table('templates_reports')->where('Behaviour_type', 'C')->pluck('H_temp')->first();
        } else {
            $C_value = DB::table('templates_reports')->where('Behaviour_type', 'C')->pluck('L_temp')->first();
        }
        return $C_value;
    }

    public function assign_minmax($value)
    {

        if ($value > 20) {
            $value = 1;
        } else {
            $value = 0;
        }
        return $value;
    }

    public function max($plot, $max)
    {

        $b_val = "";
        if ($plot[0] >= $max) {
            $b_val = 'D';
        }
        if ($plot[1] >= $max) {
            $b_val = 'I';
        }
        if ($plot[2] >= $max) {
            $b_val = 'S';
        }
        if ($plot[3] >= $max) {
            $b_val = 'C';
        }
        // dd($plot, $max,$b_val);

        return $b_val;
    }

    public function highlow($hl)
    {
        if ($hl > 0) {
            $hl = 'High';
        } else {
            $hl = 'Low';
        }
        return $hl;
    }
    public function same($dept, $value)
    {
        $qdept = DB::table('answer_records')
            ->where('department_id', $dept)
            ->get();
        $count = DB::table('answer_records')
            ->where('department_id', $dept)
            ->count();
        $sum = 0;
        foreach ($qdept as $dept) {
            if ($dept->High === $value) {
                $sum = $sum + 1;
            }
        }
        $all = $sum / $count * 100;
        return $all;
    }

    public function removearr($array, $max)
    {

        if (($key = array_search($max, $array)) !== false) {
            unset($array[$key]);
        }
        return $array;
    }
    public function bsort($bsort)
    {
        $max = 0;
        $scnd = 0;
        $third = 0;
        $forth = 0;

        $copy = $bsort;


        //delete element in array by value "green"
        // if (($key = array_search($max, $bsort)) !== false) {
        //     unset($bsort[$key]);
        // }
        $max = max($bsort);
        $bsort = $this->removearr($bsort, $max);
        $scnd = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        $third = max($bsort);
        $bsort = $this->removearr($bsort, $third);
        $forth = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        //$bsort=$this->removearr($bsort,$scnd);

        //$scnd=max($bsort);


        $arrbsort = array();

        array_push($arrbsort, $max, $scnd, $third, $forth);
        $temparr = $arrbsort;


        $copybs = $arrbsort;
        for ($i = 0; $i < count($arrbsort); $i++) {

            switch ($arrbsort[$i]) {

                case $copy[0]:
                    $arrbsort[$i] = 'D';
                    break;
                case $copy[1]:
                    $arrbsort[$i] = 'I';
                    break;
                case $copy[2]:
                    $arrbsort[$i] = 'S';
                    break;
                case $copy[3]:
                    $arrbsort[$i] = 'C';
                    break;
                default:
                    dd("error");
            }
        }
        //dd($copy,$bsort,$max,$scnd,$third,$forth,$copybs,$arrbsort);
        //dd($arrbsort, $temparr);
        return $arrbsort;
    }
    function vsort($bsort)
    {

        //dd("test",$bsort);
        $max = 0;
        $scnd = 0;
        $third = 0;
        $forth = 0;

        $copy = $bsort;


        //delete element in array by value "green"
        // if (($key = array_search($max, $bsort)) !== false) {
        //     unset($bsort[$key]);
        // }
        $max = max($bsort);
        $bsort = $this->removearr($bsort, $max);

        $scnd = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        $third = max($bsort);
        $bsort = $this->removearr($bsort, $third);
        $forth = max($bsort);
        $bsort = $this->removearr($bsort, $scnd);
        //$bsort=$this->removearr($bsort,$scnd);


        //$scnd=max($bsort);


        $arrbsort = array();

        array_push($arrbsort, $max, $scnd, $third, $forth);
        //temp storage value array that been sorted
        $temparr = $arrbsort;



        $copybs = $arrbsort;

        //dd($arrbsort[3]);
        for ($i = 0; $i < count($arrbsort); $i++) {

            switch ($arrbsort[$i]) {

                case $copy[0]:
                    $arrbsort[$i] = 'D';
                    break;
                case $copy[1]:
                    $arrbsort[$i] = 'I';
                    break;
                case $copy[2]:
                    $arrbsort[$i] = 'S';
                    break;
                case $copy[3]:
                    $arrbsort[$i] = 'C';
                    break;
                default:
                    dd("error");
            }
        }
        // dd($arrbsort);
        //dd($copy,$bsort,$max,$scnd,$third,$forth,$copybs,$arrbsort);
        //dd($copybs,"bs");

        // if ($copybs[3] <= 20) {
        //     $lowsort = $arrbsort[3];
        // } else {
        //     $lowsort = "NO";
        // }
        $lowsort = $arrbsort[3];
        $sortmax = $arrbsort[0];
        $maxlow = array();
        array_push($maxlow, $sortmax, $lowsort);
        //dd($arrbsort, $arrbsort[3],$sortmax,$lowsort,$copybs,$maxlow);

        return $maxlow;
    }
    public function tpdf()
    {
        $uderid = 20;
        $bt = 'C';
        $bvalue = 2;
        $auth = auth()->user()->id;
        //dd($auth);
        //get plot value

        $ans = DB::table('answer_records')->where('user_id', $auth)->first();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $auth)
            ->first();

        //$intd = intval($ans->plot);
        $darray = explode(',', $ans->plot);
        $integerIDs = array_map('intval', $darray);
        //sort
        $sorted = $this->bsort($integerIDs);

        //$type = gettype($integerIDs);

        //dd($ans,$join,$integerIDs,$type);

        // $dept = $join->department;
        // dd($dept);
        $plot = explode(",", $ans->plot);


        //dd($template,$Behaviour_type,$keywords,$Wmotivate,$Wbest,$Wdemotive,$Wworst,$A_improve,$O_better,$O_avoid,$Y_environment);
        // $pdf = Pdf::loadView('dom');

        // return $pdf->stream('invoice.pdf');
        $qc = new QuickChart(array(
            'width' => 600,
            'height' => 300,
        ));

        $qc->setConfig('{
            type: "line",
            data: {
              labels: ["Hello world", "Test"],
              datasets: [{
                label: "Foo",
                data: [1, 2]
              }]
            }
          }');

        // Print the chart URL

        //dd($qc->getUrl());
        $img = $qc->getUrl();


        // chart
        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' => '2',
        ));


        //Behaviour value with range

        $v_D = $plot[0];
        $v_I = $plot[1];
        $v_S = $plot[2];
        $v_C = $plot[3];

        //dd($v_D, $v_I, $v_S, $v_C);

        $D_value = $this->assign_minmax($plot[0]);
        $I_value = $this->assign_minmax($plot[1]);
        $S_value = $this->assign_minmax($plot[2]);
        $C_value = $this->assign_minmax($plot[3]);
        //dd($D_value, $I_value, $S_value, $C_value);

        $max = max($plot);
        //get hight behaviour
        $b_val = $this->max($plot, $max);
        //dd($b_val);

        if ($b_val == 'D') {
            $D_value = 2;
        }
        if ($b_val == 'I') {
            $I_value = 2;
        }
        if ($b_val == 'S') {
            $S_value = 2;
        }
        if ($b_val == 'C') {
            $C_value = 2;
        }

        //dd($D_value,$I_value,$S_value,$C_value);
        $valbest = 2;


        switch ($valbest) {
            case $D_value;

                $best = 'D';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $D_hl = '';
                //dd($I_value);
                break;
            case $I_value;
                //dd('I');
                $best = 'I';
                $best = $this->com_best($best);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $I_hl = '';
                break;
            case $S_value;
                //dd('S');
                $best = 'S';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $C_hl = $this->highlow($C_value);
                $C_value = $this->com_C($C_value);
                $S_hl = '';
                break;
            case $C_value;
                //dd('C');
                $best = 'C';
                $best = $this->com_best($best);
                $I_hl = $this->highlow($I_value);
                $I_value = $this->com_I($I_value);
                $S_hl = $this->highlow($S_value);
                $S_value = $this->com_S($S_value);
                $D_hl = $this->highlow($D_value);
                $D_value = $this->com_D($D_value);
                $C_hl = '';
                break;

            default:
                dd('unknown value');
        }
        // if($D_value === $valbest){
        //     //$D_value = $best;

        //     $best = 'D';
        //     $vbest = $best;
        //     dd($D_value,$best);
        //     //$D_value = DB::table('templates_reports')->where('Behaviour_type',$best)->pluck('H_temp');
        //     $best = $this->com_best($best);
        //     $I_value = $this->com_I($I_value);
        //     $S_value = $this->com_S($S_value);
        //     $C_value = $this->com_C($C_value);


        // }
        // if($I_value === $valbest){
        //     //$I_value = $best;
        //     $best = 'I';
        //     dd($D_value,$best);
        //     $vbest = $best;
        //     $best = $this->com_best($best);
        //     $D_value = $this->com_D($D_value);
        //     $S_value = $this->com_S($S_value);
        //     $C_value = $this->com_C($C_value);
        // }
        // if($S_value === $valbest){
        //     //$S_value = $best;
        //     $best = 'S';
        //     $vbest = $best;
        //     $best = $this->com_best($best);
        //     $I_value = $this->com_I($I_value);
        //     $D_value = $this->com_D($D_value);
        //     $C_value = $this->com_C($C_value);
        // }
        // if($C_value > $valbest){
        //     //$C_value = $best;
        //     $best = 'C';
        //     $vbest = $best;
        //     $best = $this->com_best($best);
        //     $I_value = $this->com_I($I_value);
        //     $S_value = $this->com_S($S_value);
        //     $D_value = $this->com_D($D_value);
        // }
        // else {
        //     $best = $best;
        // }



        // $best = DB::table('templates_reports')->where('Behaviour_type','D')->pluck('H_temp');
        // if($I_value = 1){
        //     $I_value = DB::table('templates_reports')->where('Behaviour_type','I')->pluck('H_temp');
        // }
        // else{
        //     $I_value = DB::table('templates_reports')->where('Behaviour_type','I')->pluck('L_temp');
        // }

        // if($S_value = 1){
        //     $S_value = DB::table('templates_reports')->where('Behaviour_type','S')->pluck('H_temp');
        // }
        // else{
        //     $S_value = DB::table('templates_reports')->where('Behaviour_type','S')->pluck('L_temp');
        // }

        // if($C_value = 1){
        //     $C_value = DB::table('templates_reports')->where('Behaviour_type','C')->pluck('H_temp');
        // }
        // else{
        //     $C_value = DB::table('templates_reports')->where('Behaviour_type','C')->pluck('L_temp');
        // }
        //explode array

        //$best = explode('.', $best);
        // $best = explode('.', $best);
        // $D_value = explode('.', $D_value);
        // $I_value = explode('.', $I_value);
        // $S_value = explode('.', $S_value);
        // $C_value = explode('.', $C_value);

        //dd($best,$D_value,$I_value,$S_value,$C_value);

        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['','D', 'I', 'S', 'C',''],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [20,20,20, 20, 20, 20],
                    fill: false,
                    pointRadius:0,
                    borderWidth: 1
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [null, $v_D, $v_I, $v_S, $v_C,null],
                    pointRadius:0,
                    borderWidth: 4
                  },
                ],
              },
              options: {
                legend: {
                    display: false,
                },
                title: {
                  display: true,
                  text: 'DiSC Profiling grpahs',
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                        }
                    }]
                }

              },
        }");

        //dd($qc->getUrl());
        $template = DB::table('templates_reports')->where('Behaviour_type', $b_val)->first();
        //dd($template);


        //dd($plot);
        $keywords = $template->keywords;
        $Wmotivate = $template->Wmotivate;
        $Wbest = $template->Wbest;
        $Wdemotive = $template->Wdemotive;
        $Wworst = $template->Wworst;
        $A_improve = $template->A_improve;
        $O_better = $template->O_better;
        $O_avoid = $template->O_avoid;
        $Y_environment = $template->Y_environment;
        $Behaviour_type = $template->Behaviour_type;
        //$keywords = $template->keywords;

        //dd($best, $Wmotivate);
        $keywords = explode(',', $keywords);
        $Wmotivate = explode('.', $Wmotivate);
        $Wbest = explode('.', $Wbest);
        $Wdemotive = explode('.', $Wdemotive);
        $Wworst = explode('.', $Wworst);
        $A_improve = explode('.', $A_improve);
        $O_better = explode('.', $O_better);
        $O_avoid = explode('.', $O_avoid);
        $Y_environment = explode('.', $Y_environment);

        $best = explode('.', $best);
        $D_value = explode('.', $D_value);
        $I_value = explode('.', $I_value);
        $S_value = explode('.', $S_value);
        $C_value = explode('.', $C_value);



        $line = $qc->getUrl();
        //dd($line);

        // $ch=$qc->getUrl();
        // //dd($ch);

        // $path = "https://picsum.photos/200";
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $data = file_get_contents($path);
        // $pic = 'data:image/'.';base64' . base64_encode($data);
        // $pdf = Pdf::loadView('dom',[
        //     'charts' => $ch,
        // ]);
        // $pdf->set_option('isRemoteEnabled',true);
        // $pdf->setPaper('A4', 'landscape');

        // $content = view('dom');
        // $view = \View::make('dom',[
        //     'img' => $ch,
        // ]);
        // $html_content = $view->render();
        // PDF::SetTitle('Hello World');
        // PDF::AddPage();
        // // PDF::Write(0, $html_content);
        // PDF::writeHTML($html_content, true, false, true, false, '');
        // PDF::Output('hello_world.pdf');
        // return $pdf->stream('invoice.pdf');
        //     return view('dom',
        //       [
        //         'charts' => $qc->getUrl(),
        //       ]
        // );
        $ch = 1;
        $img1 = "https://picsum.photos/200";
        //dd($D_value, $I_value, $S_value, $C_value,$D_hl,$I_hl,$S_hl,$C_hl);

        $pdf = pdf::loadView('dom', [
            'ansval' => $ans,
            'user'  => $join,
            'rank' => $sorted,
            'ch' => $ch,
            'img' => $img,
            'line' => $line,
            'b_val' => $b_val,
            'best' => $best,
            'D_value' => $D_value,
            'I_value' => $I_value,
            'S_value' => $S_value,
            'C_value' => $C_value,
            'D_hl' => $D_hl,
            'I_hl' => $I_hl,
            'S_hl' => $S_hl,
            'C_hl' => $C_hl,
            'keywords' => $keywords,
            'Wmotivate' => $Wmotivate,
            'Wbest' => $Wbest,
            'Wdemotive' => $Wdemotive,
            'Wworst' => $Wworst,
            'A_improve' => $A_improve,
            'O_better' => $O_better,
            'O_avoid' => $O_avoid,
            'Y_environment' => $Y_environment,
            'Behaviour_type' => $Behaviour_type,

        ]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        $pdf->setOption('isRemoteEnabled', true);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('profiling.pdf');
    }



    public function vtpdf()
    {
        return view('dom', [
            'ch' => "ss",
            'img' => "ss",
            'line' => "ss",
        ]);
    }

    public function Chartquick($name, $value)
    {

        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' => '2',
        ));
        $qc->setConfig("{
            type: 'pie',
            data: {
                labels: ['D', 'I', 'S', 'C'],
                datasets: [
                    {
                      data: [$value[0], $value[1], $value[2], $value[3]],
                      backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                      ],
                      label: 'Dataset 1',
                    },
                  ],

              },
            options:{
                title: {
                    display: true,
                    text: '$name'
                }
            }


        }");
        $url = $qc->getUrl();
        //dd('Genereated url : ',$url);
        return $url;
    }
    public function Linequick($name, $value, $width, $height)
    {


        $qc = new QuickChart(array(
            'width' => $width,
            'height' => $height,
            'version' => '2',
        ));
        $qc->setConfig('{
            type: "line",
            data: {
              labels: ["Hello world", "Test"],
              datasets: [{
                label: "Foo",
                data: [1, 2]
              }]
            }
          }');
        $qc->setConfig("{
            type: 'line',
            data: {
                labels: ['','D', 'I', 'S', 'C',''],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [20,20,20, 20, 20, 20],
                    fill: false,
                    pointRadius:0,
                    borderWidth: 1
                  },
                  {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [null, '$value[0]','$value[1]','$value[2]','$value[3]',null],
                    borderWidth: 4,
                    pointStyle: 'circle',
                   pointRadius: 2,
                  pointBorderColor: 'rgb(0, 255, 94)'
                  },
                ],
              },
              options: {
                legend: {
                    display: false,
                },
                title: {
                  display: false,
                  text: 'DiSC Profiling grpahs',
                },
                scales: {
                  
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            display: false,
                            min: 0,
                            max: 50,
                        },
                        gridLines:{
                            display: false,
                          lineWidth:10
                          }
                    }],
                    
                }

              },
        }");

        // Print the chart URL

        //dd($qc->getUrl());
        $img = $qc->getUrl();


        // chart

        $url = $qc->getUrl();
        //dd('Genereated url : ',$url);
        return $url;
    }
    public function barchart($width, $height)
    {

        $qc = new QuickChart(array(
            'width' => 500,
            'height' => 300,
            'version' > '2',
        ));

        $config = <<<EOD
          {
            "type": "horizontalBar",
            "data": {
              "labels": [
                "D",
                "I",
                "S",
                "C",

              ],
              "datasets": [
                {
                  "label": "Dataset 1",
                  "backgroundColor": "rgb(0,128,0) ",
                  "borderColor": "rgb(255, 99, 132)",
                  "borderWidth": 1,
                  "data": [
                  32,
                    62,
                    64,
                    41,

                  ]
                },

              ]
            },
            "options": {
              "elements": {
                "rectangle": {
                  "borderWidth": 2
                }
              },
              "responsive": true,
              "legend": {
                "position": "right"
              },
              "title": {
                "display": true,
                "text": "Chart.js Horizontal Bar Chart"
              }
            }
          }
          EOD;

        // Chart config can be set as a string or as a nested array
        $qc->setConfig($config);

        // Print the chart URL
        $link = $qc->getUrl();
        return $link;
    }
    public function barchart2($width, $height)
    {
        $qc = new QuickChart(array(
            'width' => $width,
            'height' => $height,
            'version' => '2',
        ));

        $config = <<<EOD
          {
            "type": "horizontalBar",
            "data": {
              "datasets": [
                {
                  "label": "Dataset 1",
                  "backgroundColor": "rgba(255, 99, 132, 0.5)",
                  "borderColor": "rgb(255, 99, 132)",
                  "borderWidth": 1,
                  "data": [
                    33,
                    24,
                    54,
                    23
                  ],
                  "fill": false,
                  "spanGaps": false,
                  "lineTension": 0.4,
                  "pointRadius": 3,
                  "pointHoverRadius": 3,
                  "pointStyle": "circle",
                  "borderDash": [
                    0,
                    0
                  ],
                  "barPercentage": 0.9,
                  "categoryPercentage": 0.8,
                  "type": "horizontalBar",
                  "hidden": false
                }
              ],
              "labels": [
                "D",
                "I",
                "S",
                "C"
              ]
            },
            "options": {
              "title": {
                "display": true,
                "text": "Personal Graphs",
                "position": "top",
                "fontSize": 12,
                "fontFamily": "sans-serif",
                "fontColor": "#666666",
                "fontStyle": "bold",
                "padding": 10,
                "lineHeight": 1.2
              },
              "layout": {
                "padding": {
                  "left": 0,
                  "right": 0,
                  "top": 0,
                  "bottom": 0
                }
              },
              "legend": {
                "position": "right",
                "display": false,
                "align": "center",
                "fullWidth": true,
                "reverse": false,
                "labels": {
                  "fontSize": 12,
                  "fontFamily": "sans-serif",
                  "fontColor": "#666666",
                  "fontStyle": "normal",
                  "padding": 10
                }
              },
              "scales": {
                "xAxes": [
                  {
                    "id": "X1",
                    "display": true,
                    "position": "bottom",
                    "type": "linear",
                    "stacked": false,
                    "time": {
                      "unit": false,
                      "stepSize": 1,
                      "displayFormats": {
                        "millisecond": "h:mm:ss.SSS a",
                        "second": "h:mm:ss a",
                        "minute": "h:mm a",
                        "hour": "hA",
                        "day": "MMM D",
                        "week": "ll",
                        "month": "MMM YYYY",
                        "quarter": "[Q]Q - YYYY",
                        "year": "YYYY"
                      }
                    },
                    "distribution": "linear",
                    "gridLines": {
                      "display": false,
                      "color": "rgba(0, 0, 0, 0.1)",
                      "borderDash": [
                        0,
                        0
                      ],
                      "lineWidth": 1,
                      "drawBorder": true,
                      "drawOnChartArea": true,
                      "drawTicks": true,
                      "tickMarkLength": 10,
                      "zeroLineWidth": 1,
                      "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                      "zeroLineBorderDash": [
                        0,
                        0
                      ]
                    },
                    "angleLines": {
                      "display": true,
                      "color": "rgba(0, 0, 0, 0.1)",
                      "borderDash": [
                        0,
                        0
                      ],
                      "lineWidth": 1
                    },
                    "pointLabels": {
                      "display": true,
                      "fontColor": "#666",
                      "fontSize": 10,
                      "fontStyle": "normal"
                    },
                    "ticks": {
                      "display": true,
                      "fontSize": 12,
                      "fontFamily": "sans-serif",
                      "fontColor": "#666666",
                      "fontStyle": "normal",
                      "padding": 0,
                      "stepSize": null,
                      "minRotation": 0,
                      "maxRotation": 50,
                      "mirror": false,
                      "reverse": false
                    },
                    "scaleLabel": {
                      "display": false,
                      "labelString": "Axis label",
                      "lineHeight": 1.2,
                      "fontColor": "#666666",
                      "fontFamily": "sans-serif",
                      "fontSize": 12,
                      "fontStyle": "normal",
                      "padding": 4
                    }
                  }
                ],
                "yAxes": [
                  {
                    "id": "Y1",
                    "display": true,
                    "position": "left",
                    "type": "category",
                    "stacked": false,
                    "time": {
                      "unit": false,
                      "stepSize": 1,
                      "displayFormats": {
                        "millisecond": "h:mm:ss.SSS a",
                        "second": "h:mm:ss a",
                        "minute": "h:mm a",
                        "hour": "hA",
                        "day": "MMM D",
                        "week": "ll",
                        "month": "MMM YYYY",
                        "quarter": "[Q]Q - YYYY",
                        "year": "YYYY"
                      }
                    },
                    "distribution": "linear",
                    "gridLines": {
                      "display": true,
                      "color": "rgba(0, 0, 0, 0.1)",
                      "borderDash": [
                        0,
                        0
                      ],
                      "lineWidth": 1,
                      "drawBorder": true,
                      "drawOnChartArea": true,
                      "drawTicks": true,
                      "tickMarkLength": 10,
                      "zeroLineWidth": 1,
                      "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                      "zeroLineBorderDash": [
                        0,
                        0
                      ]
                    },
                    "angleLines": {
                      "display": true,
                      "color": "rgba(0, 0, 0, 0.1)",
                      "borderDash": [
                        0,
                        0
                      ],
                      "lineWidth": 1
                    },
                    "pointLabels": {
                      "display": true,
                      "fontColor": "#666",
                      "fontSize": 10,
                      "fontStyle": "normal"
                    },
                    "ticks": {
                      "display": true,
                      "fontSize": 12,
                      "fontFamily": "sans-serif",
                      "fontColor": "#666666",
                      "fontStyle": "normal",
                      "padding": 0,
                      "stepSize": null,
                      "minRotation": 0,
                      "maxRotation": 50,
                      "mirror": false,
                      "reverse": false
                    },
                    "scaleLabel": {
                      "display": false,
                      "labelString": "Axis label",
                      "lineHeight": 1.2,
                      "fontColor": "#666666",
                      "fontFamily": "sans-serif",
                      "fontSize": 12,
                      "fontStyle": "normal",
                      "padding": 4
                    }
                  }
                ]
              },
              "plugins": {
                "datalabels": {
                  "display": true,
                  "align": "right",
                  "anchor": "end",
                  "backgroundColor": "#eee",
                  "borderColor": "#ddd",
                  "borderRadius": 0,
                  "borderWidth": 1,
                  "padding": 4,
                  "color": "#666666",
                  "font": {
                    "family": "sans-serif",
                    "size": 14,
                    "style": "bold"
                  }
                },
                "googleSheets": {},
                "airtable": {},
                "tickFormat": ""
              },
              "elements": {
                "rectangle": {
                  "borderWidth": 2
                }
              },
              "responsive": true,
              "cutoutPercentage": 50,
              "rotation": -1.5707963267948966,
              "circumference": 6.283185307179586,
              "startAngle": -1.5707963267948966
            }
          }
          EOD;

        // Chart config can be set as a string or as a nested array
        $qc->setConfig($config);

        // Print the chart URL
        return $qc->getUrl();
    }
    public function getchart($type, $value, $width, $height)
    {
        $qc = new QuickChart(array(
            'width' => $width,
            'height' => $height,
            'version' => '3',
        ));
        $qc->setConfig("{
            type: 'radar',
            data: {
                labels: [
                  ['D','Dominance'],['I','Influance'],['S','Steadiness'],['C','Compliance']
                ],
                datasets: [
                  {
                    label: 'My First dataset',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    data: [$value[0],$value[1],$value[2],$value[3] ],
                  },
                  
                ],
              },
              options: {
                title: {
                  display: true,
                  text: 'DiSC style Radar Chart',
                },
                scales: {
                    r: {
                        min: 0,
                        max: 50,
                        grid: {
                          color: 'black'
                        }
                      }
                  },
                  
                
                },
                
        }");

        // Print the chart URL

        //dd($qc->getUrl());
        $img = $qc->getUrl();


        // chart

        $url = $qc->getUrl();
        //dd('Genereated url : ',$url);

        return $url;
    }
    public function persent($num, $total)
    {
        $num = $num / $total * 100;
        return $num;
    }

    public function chartvalue($join)
    {

        $maxD = 0;
        $maxI = 0;
        $maxS = 0;
        $maxC = 0;


        $countj = count($join);


        foreach ($join as $join) {
            $darray = explode(',', $join->plot);

            $integerIDs = array_map('intval', $darray);
            //sort
            $sorted = $this->bsort($integerIDs);
            $maxb = $sorted[0];
            switch ($maxb) {
                case 'D';
                    $maxD = $maxD + 1;
                    break;
                case 'I';
                    $maxI = $maxI + 1;
                    break;
                case 'S';
                    $maxS = $maxS + 1;
                    break;
                case 'C';
                    $maxC = $maxC + 1;
                    break;
                default:
                    dd('error`');
            }

            //dd($participants,$darray,$sorted,$maxb,$integerIDs,$maxI);


        }

        $myarray = array();
        array_push($myarray, $maxD, $maxI, $maxS, $maxC);





        return $myarray;
    }
    public function valhigh($style)
    {
        $sql = DB::table('answer_records')
            ->where('High', $style)
            ->get();
        return $sql;
    }
    public function vallow($style)
    {
        $sql = DB::table('answer_records')
            ->where('Low', $style)
            ->get();
        return $sql;
    }
    public function qurjoin($style, $client)
    {
        $style = DB::table('answer_records')
            ->join('clients', 'answer_records.client_id', '=', 'clients.id')
            ->join('users', 'answer_records.user_id', '=', 'users.id')
            ->join('departments', 'answer_records.department_id', '=', 'departments.id')
            ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name', 'departments.department')
            ->orderBy('answer_records.department_id', 'asc')
            ->where('answer_records.client_id', $client)
            ->where('High', $style)

            // ->where('users.department_id', 1)
            ->get();

        return $style;
    }
    public function qurjoinlow($style, $client)
    {
        $style = DB::table('answer_records')
            ->join('clients', 'answer_records.client_id', '=', 'clients.id')
            ->join('users', 'answer_records.user_id', '=', 'users.id')
            ->join('departments', 'answer_records.department_id', '=', 'departments.id')
            ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name', 'departments.department')
            ->orderBy('answer_records.department_id', 'asc')
            ->where('answer_records.client_id', $client)
            ->where('Low', $style)

            // ->where('users.department_id', 1)
            ->get();

        return $style;
    }
    public function Gpdf(Clients $clients)
    {


        $participants = DB::table('users')->where('client_id', $clients->id)->count();
        $join = DB::table('answer_records')
            ->join('clients', 'answer_records.client_id', '=', 'clients.id')
            ->join('users', 'answer_records.user_id', '=', 'users.id')
            ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name')
            ->where('answer_records.client_id', $clients->id)
            // ->where('users.department_id', 1)
            ->get();
        $joinall = DB::table('answer_records')
            ->join('clients', 'answer_records.client_id', '=', 'clients.id')
            ->join('users', 'answer_records.user_id', '=', 'users.id')
            ->join('departments', 'answer_records.department_id', '=', 'departments.id')
            ->select('answer_records.*', 'clients.client', 'users.department_id', 'users.name', 'departments.department')
            ->orderBy('answer_records.department_id', 'asc')
            ->where('answer_records.client_id', $clients->id)
            // ->where('users.department_id', 1)
            ->get();
        //dd($joinall);

        $djoin = $this->qurjoin('D', $clients->id);
        $djoinlow = $this->qurjoinlow('D', $clients->id);

        $ijoin = $this->qurjoin('I', $clients->id);
        $ijoinlow = $this->qurjoinlow('I', $clients->id);
        $sjoin = $this->qurjoin('S', $clients->id);
        $sjoinlow = $this->qurjoinlow('S', $clients->id);
        $cjoin = $this->qurjoin('C', $clients->id);
        $cjoinlow = $this->qurjoinlow('C', $clients->id);
        //dd($djoin,$ijoin,$sjoin,$cjoin);

        //dd($djoin,$djoinlow);
        $maxD = 0;
        $maxI = 0;
        $maxS = 0;
        $maxC = 0;

        // $highD=$highI=$highS=$highC=array();

        foreach ($join as $join) {
            $darray = explode(',', $join->plot);

            $integerIDs = array_map('intval', $darray);
            //sort
            $sorted = $this->bsort($integerIDs);
            $maxb = $sorted[0];
            switch ($maxb) {
                case 'D';
                    $maxD = $maxD + 1;

                    break;
                case 'I';
                    $maxI = $maxI + 1;

                    break;
                case 'S';
                    $maxS = $maxS + 1;

                    break;
                case 'C';
                    $maxC = $maxC + 1;

                    break;
                default:
                    dd('error`');
            }

            //dd($participants,$darray,$sorted,$maxb,$integerIDs,$maxI);


        }

        $perD = $this->persent($maxD, $participants);
        $perD = ceil($perD);
        $perI = $this->persent($maxI, $participants);
        $perI = ceil($perI);
        $perS = $this->persent($maxS, $participants);
        $perS = ceil($perS);
        $perC = $this->persent($maxC, $participants);
        $perC = ceil($perC);

        //dd($participants,$darray,$sorted,$maxb,$integerIDs,$maxI);
        $totalval = array();
        array_push($totalval, $maxD, $maxI, $maxS, $maxC);

        //dd($maxD,$maxI,$maxS,$maxC,$totalval);
        // dd($participants,$darray,$sorted,$integerIDs);

        //department value
        $numdepartment = DB::table('departments')->get();
        $storeV = array();
        $s = 0;

        $storeUrl = array();
        foreach ($numdepartment as $dept) {

            $join = DB::table('answer_records')
                ->join('clients', 'answer_records.client_id', '=', 'clients.id')
                ->join('users', 'answer_records.user_id', '=', 'users.id')
                ->select('answer_records.*', 'clients.client', 'users.department_id')
                ->where('answer_records.client_id', $clients->id)
                ->where('users.department_id', $dept->id)
                ->get();

            $counj = count($join);


            if ($counj > 0) {
                $query = $this->chartvalue($join);

                array_push($storeV, $query);

                ${'url' . $dept->id} = $this->Chartquick($dept->department, $query);
                array_push($storeUrl, ${'url' . $dept->id});
            } else {
                $temp = 0;
            }
        }

        $count = count($storeUrl);
        //dd($count);

        //dd($storeUrl);
        //dd($storeV,$url1,$url2);
        // $url1 = $this->Chartquick('chart1');
        // $url2 = $this->Chartquick('chart2');
        // $url3 = $this->Chartquick('chart3');
        // $url4 = $this->Chartquick('chart4');
        $valHd = $this->valhigh('D');
        $vallD = $this->vallow('D');
        $valHi = $this->valhigh('I');
        $valli = $this->vallow('I');
        $valHS = $this->valhigh('S');
        $vallS = $this->vallow('S');
        $valHC = $this->valhigh('C');
        $vallC = $this->vallow('C');

        //dd($valHd,$vallD,$valHi,$valli,$valHS,$vallS,$valHC,$vallC);


        $total = $this->Chartquick("Participants Summary", $totalval);
        //dd($totalval);
        $pdf = pdf::loadView('PDF.Gpdf', [
            'name' => $clients->client,
            'num' => $participants,
            'url1' => $url1,
            'url2' => $url2,
            'url3' => $url3,
            'url' => $storeUrl,
            // 'url' => $storeUrl,
            'total' => $total,
            'maxD' => $maxD,
            'maxI' => $maxI,
            'maxS' => $maxS,
            'maxC' => $maxC,
            'perD' => $perD,
            'perI' => $perI,
            'perS' => $perS,
            'perC' => $perC,
            'dept' => $numdepartment,
            'clients' => $clients,
            'HD' => $valHd,
            'LD' => $vallD,
            'HI' => $valHi,
            'LI' => $valli,
            'HS' => $valHS,
            'LS' => $vallS,
            'HC' => $valHC,
            'LC' => $vallC,
            'djoin' => $djoin,
            'ijoin' => $ijoin,
            'sjoin' => $sjoin,
            'cjoin' => $cjoin,
            'djoinlow' => $djoinlow,
            'ijoinlow' => $ijoinlow,
            'sjoinlow' => $sjoinlow,
            'cjoinlow' => $cjoinlow,
            'joinall' => $joinall,
            'sum' => $totalval,
        ]);
        return $pdf->stream('DiSC Report.pdf');
    }

    //To get averange value from style
    public function bydepart($d_id, $qury, $cid)
    {

        $sumD = 0;
        $sumi = 0;
        $sumS = 0;
        $sumC = 0;

        $qdept = DB::table('answer_records')
            ->where($qury, $d_id)->where('client_id', $cid)
            ->get();
        // dd($qdept);
        $count = count($qdept);
        // dd($count);
        foreach ($qdept as $dept) {
            $user = DB::table('answer_records')
                ->where('user_id', $dept->user_id)
                ->first();

            $sumD = $sumD + $user->D;
            $sumi = $sumi + $user->I;
            $sumS = $sumS + $user->S;
            $sumC = $sumC + $user->C;


            $query = $this->chartvalue($qdept);

            //dd($query);
        }
        //average
        $sumD = intval(round($sumD / $count));
        $sumi = intval(round($sumi / $count));
        $sumS = intval(round($sumS / $count));
        $sumC = intval(round($sumC / $count));

        //dd($sumD,$sumi,$sumS,$sumC);
        $teamvalue = array();
        array_push($teamvalue, $sumD, $sumi, $sumS, $sumC);

        // $plot = $this->splot($sumD,$sumi,$sumS,$sumC);
        // //dd($plot);
        // $teamUrl = $this->Linequick("team" ,$plot,150,200);

        return $teamvalue;
    }

    public function byclient($d_id, $qury)
    {

        $sumD = 0;
        $sumi = 0;
        $sumS = 0;
        $sumC = 0;

        $qdept = DB::table('answer_records')
            ->where($qury, $d_id)
            ->get();
        // dd($qdept);
        $count = count($qdept);
        // dd($count);
        foreach ($qdept as $dept) {
            $user = DB::table('answer_records')
                ->where('user_id', $dept->user_id)
                ->first();

            $sumD = $sumD + $user->D;
            $sumi = $sumi + $user->I;
            $sumS = $sumS + $user->S;
            $sumC = $sumC + $user->C;


            $query = $this->chartvalue($qdept);

            //dd($query);
        }
        // dd($sumD,$sumi,$sumS,$sumC);
        //average
        $sumD = intval(round($sumD / $count));
        $sumi = intval(round($sumi / $count));
        $sumS = intval(round($sumS / $count));
        $sumC = intval(round($sumC / $count));

        //dd($sumD,$sumi,$sumS,$sumC);
        $teamvalue = array();
        array_push($teamvalue, $sumD, $sumi, $sumS, $sumC);

        // $plot = $this->splot($sumD,$sumi,$sumS,$sumC);
        // //dd($plot);
        // $teamUrl = $this->Linequick("team" ,$plot,150,200);
        // dd($teamvalue);

        return $teamvalue;
    }

    //get URL For Chart
    public function getURLchart($plot)
    {
        $url = $this->splot($plot);
        // dump($url);
        $url = $this->Linequick("team", $url, 150, 380);
        return $url;
    }
    public function getURLchart2($plot, $type)
    {

        $url = $this->splot($plot);
        $url = $this->getchart($type, $url, 438, 376);
        return $url;
    }
    public function comteam($uid)
    {
        $sumD = 0;
        $sumi = 0;
        $sumS = 0;
        $sumC = 0;

        $query = DB::table('answer_records')
            ->where('user_id', $uid)
            ->first();

        $H_ish = $query->High;

        $dept = $this->selcom($query->client_id);

        // $dept = $this->seldept($query->department_id);
        $count = count($dept);
        // dd($dept,$count);

        // dd($dept,$count);

        // foreach ($dept as $dept) {
        //     $High = $dept->High;
        //     switch ($High) {
        //         case 'D':
        //             $sumD = $sumD + 1;
        //             break;
        //         case 'I':
        //             $sumi = $sumi + 1;
        //             break;
        //         case 'S':
        //             $sumS = $sumS + 1;
        //             break;
        //         case 'C':
        //             $sumC = $sumC + 1;
        //             break;
        //         default:
        //             dd("some error occured");
        //     }
        //     $value = array();
        //     array_push($value, $sumD, $sumi, $sumS, $sumC);
        // }
        $same = 0;
        // dd($H_ish);
        foreach ($dept as $dept) {
            $High = $dept->High;

            switch ($High) {
                case $H_ish:
                    $same++;
                    break;

                default:
                    $same = $same;
            }
        }
        $same = intval($same / $count * 100);




        return $same;
    }
    public function percentageamong($value, $client, $dept)
    {
    }
    public function seldept($did)
    {
        $dept = DB::table('answer_records')
            ->where('department_id', $did)
            ->get();
        return $dept;
    }

    public function selcom($cid)
    {
        $dept = DB::table('answer_records')
            ->where('client_id', $cid)
            ->get();
        return $dept;
    }

    // public function splot($value)
    // {

    //     $plot = array();

    //     switch ($value[0]) {
    //         case 0;
    //             array_push($plot, 2);
    //             break;
    //         case 1;
    //             array_push($plot, 5);
    //             break;
    //         case 2;
    //             array_push($plot, 9);
    //             break;
    //         case 3;
    //             array_push($plot, 12);
    //             break;
    //         case 4;
    //             array_push($plot, 14);
    //             break;
    //         case 5;
    //             array_push($plot, 17);
    //             break;
    //         case 6;
    //             array_push($plot, 19);
    //             break;
    //         case 7;
    //             array_push($plot, 21);
    //             break;
    //         case 8;
    //             array_push($plot, 24);
    //             break;
    //         case 9;
    //             array_push($plot, 27);
    //             break;
    //         case 10;
    //             array_push($plot, 32);
    //             break;
    //         case 11;
    //             array_push($plot, 33);
    //             break;
    //         case 12;
    //             array_push($plot, 34);
    //             break;
    //         case 13;
    //             array_push($plot, 36);
    //             break;
    //         case 14;
    //             array_push($plot, 38);
    //             break;
    //         case 15;
    //             array_push($plot, 44);
    //             break;
    //         case 16;
    //             array_push($plot, 45);
    //             break;
    //         default:
    //             array_push($plot, 46);
    //     }

    //     switch ($value[1]) {
    //         case 0;
    //             array_push($plot, 3);
    //             break;
    //         case 1;
    //             array_push($plot, 6);
    //             break;
    //         case 2;
    //             array_push($plot, 13);
    //             break;
    //         case 3;
    //             array_push($plot, 16);
    //             break;
    //         case 4;
    //             array_push($plot, 23);
    //             break;
    //         case 5;
    //             array_push($plot, 28);
    //             break;
    //         case 6;
    //             array_push($plot, 31);
    //             break;
    //         case 7;
    //             array_push($plot, 37);
    //             break;
    //         case 8;
    //             array_push($plot, 40);
    //             break;
    //         case 9;
    //             array_push($plot, 43);
    //             break;
    //         case 10;
    //             array_push($plot, 45);
    //             break;
    //         default:
    //             array_push($plot, 46);
    //     }

    //     switch ($value[2]) {
    //         case 0;
    //             array_push($plot, 4);
    //             break;
    //         case 1;
    //             array_push($plot, 8);
    //             break;
    //         case 2;
    //             array_push($plot, 10);
    //             break;
    //         case 3;
    //             array_push($plot, 14);
    //             break;
    //         case 4;
    //             array_push($plot, 18);
    //             break;
    //         case 5;
    //             array_push($plot, 22);
    //             break;
    //         case 6;
    //             array_push($plot, 25);
    //             break;
    //         case 7;
    //             array_push($plot, 29);
    //             break;
    //         case 8;
    //             array_push($plot, 31);
    //             break;
    //         case 9;
    //             array_push($plot, 35);
    //             break;
    //         case 10;
    //             array_push($plot, 39);
    //             break;
    //         case 11;
    //             array_push($plot, 42);
    //             break;
    //         case 12;
    //             array_push($plot, 45);
    //             break;
    //         default:
    //             array_push($plot, 46);
    //     }

    //     switch ($value[3]) {
    //         case 0;
    //             array_push($plot, 1);
    //             break;
    //         case 1;
    //             array_push($plot, 7);
    //             break;
    //         case 2;
    //             array_push($plot, 11);
    //             break;
    //         case 3;
    //             array_push($plot, 15);
    //             break;
    //         case 4;
    //             array_push($plot, 23);
    //             break;
    //         case 5;
    //             array_push($plot, 26);
    //             break;
    //         case 6;
    //             array_push($plot, 30);
    //             break;
    //         case 7;
    //             array_push($plot, 37);
    //             break;
    //         case 8;
    //             array_push($plot, 41);
    //             break;
    //         case 9;
    //             array_push($plot, 45);
    //             break;
    //         default:
    //             array_push($plot, 46);
    //     }


    //     return $plot;
    // }

    public function splot($value)
    {

        $plot = array();

        switch ($value[0]) {
            case 0;
                array_push($plot, 3);
                break;
            case 1;
                array_push($plot, 6);
                break;
            case 2;
                array_push($plot, 10);
                break;
            case 3;
                array_push($plot, 14);
                break;
            case 4;
                array_push($plot, 16);
                break;
            case 5;
                array_push($plot, 18);
                break;
            case 6;
                array_push($plot, 20);
                break;
            case 7;
                array_push($plot, 24);
                break;
            case 8;
                array_push($plot, 27);
                break;
            case 9;
                array_push($plot, 30);
                break;
            case 10;
                array_push($plot, 33);
                break;
            case 11;
                array_push($plot, 34);
                break;
            case 12;
                array_push($plot, 35);
                break;
            case 13;
                array_push($plot, 36);
                break;
            case 14;
                array_push($plot, 38);
                break;
            case 15;
                array_push($plot, 44);
                break;
            case 16;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($value[1]) {
            case 0;
                array_push($plot, 4);
                break;
            case 1;
                array_push($plot, 7);
                break;
            case 2;
                array_push($plot, 15);
                break;
            case 3;
                array_push($plot, 18);
                break;
            case 4;
                array_push($plot, 26);
                break;
            case 5;
                array_push($plot, 31);
                break;
            case 6;
                array_push($plot, 32);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 40);
                break;
            case 9;
                array_push($plot, 43);
                break;
            case 10;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($value[2]) {
            case 0;
                array_push($plot, 5);
                break;
            case 1;
                array_push($plot, 9);
                break;
            case 2;
                array_push($plot, 12);
                break;
            case 3;
                array_push($plot, 16);
                break;
            case 4;
                array_push($plot, 19);
                break;
            case 5;
                array_push($plot, 25);
                break;
            case 6;
                array_push($plot, 28);
                break;
            case 7;
                array_push($plot, 31);
                break;
            case 8;
                array_push($plot, 33);
                break;
            case 9;
                array_push($plot, 35);
                break;
            case 10;
                array_push($plot, 39);
                break;
            case 11;
                array_push($plot, 42);
                break;
            case 12;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }

        switch ($value[3]) {
            case 0;
                array_push($plot, 2);
                break;
            case 1;
                array_push($plot, 8);
                break;
            case 2;
                array_push($plot, 13);
                break;
            case 3;
                array_push($plot, 17);
                break;
            case 4;
                array_push($plot, 26);
                break;
            case 5;
                array_push($plot, 29);
                break;
            case 6;
                array_push($plot, 32);
                break;
            case 7;
                array_push($plot, 37);
                break;
            case 8;
                array_push($plot, 41);
                break;
            case 9;
                array_push($plot, 45);
                break;
            default:
                array_push($plot, 46);
        }


        return $plot;
    }

    // SQL FUNCTION
    // SELECT DEPARTMENT
    public function sel_dep($did)
    {
        $query = DB::table('answer_records')
            ->where('department_id', $did)
            ->get();
    }
    public function sel_cel($cid)
    {
        $query = DB::table('answer_records')
            ->where('client_id', $cid)
            ->get();
    }

    public function fetchcomments()
    {

        // $progress = DB::table('progress')->first();
        $cid = auth()->user()->client_id;
        $comments = 80;
        // return response()->json([
        //     'progress' => $progress,
        // ]);

        $all = DB::table('users')->where('client_id', $cid)->count();

        $allanswer = DB::table('answer_records')->where('client_id', $cid)->count();
        // $allanswer = 4;
        $percentage = $allanswer / $all * 100;
        //    $percentage = 100;
        $percentage = intval($percentage);
        //
        //    dd($percentage);

        //     return $percentage;

        return response()->json([
            '0' => $percentage,
        ]);
    }

    public function compareHL($value, $style)
    {

        if ($value > 22) {
            $value = "High";
        } else {
            $value = "Low";
        }


        return $value;
    }

    public function styleTemplate($style, $rank)
    {
        switch ($rank) {
            case 'Higest':
                $qury = DB::table('templates_reports')->where('Behaviour_type', $style)->first();
                $template = $qury->HH_temp;
                break;
            case 'High':
                $qury = DB::table('templates_reports')->where('Behaviour_type', $style)->first();
                $template = $qury->H_temp;
                break;

            case 'Low':
                $qury = DB::table('templates_reports')->where('Behaviour_type', $style)->first();
                $template = $qury->H_temp;
                break;

            default:
                dd("error");
                break;
        }

        return $template;
    }
}
