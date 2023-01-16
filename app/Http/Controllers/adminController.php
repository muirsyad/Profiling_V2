<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Clients;
use App\Models\Questions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImport;
use App\Models\Users;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\Signup;
use App\Models\Remarks;
use Illuminate\Support\Facades\Mail;


class adminController extends Controller
{
    //
    public function index()
    {
        $count = Clients::count();
        $mcount = Clients::whereMonth('created_at', date('m'))->count();
        //dd($mcount);
        $recent = DB::table('clients')->orderBy('id', 'desc')->first();
        $participants = DB::table('users')->where('role_id', 2)->count();
        $mothly = $this->monthly();
        $now = date('m');
        $ans = DB::table('answer_records')->whereYear('created_at', '2022')
            ->whereMonth('created_at', date('m'))
            ->get();



        $yearn = $this->yearly();



        //dd(date('Y'),$yearn);



        //$mcount = Clients::whereMonth('created_at', Carbon::parse('01'));

        //dd($recent);
        //dd($count);
        $clients = Clients::all()->where('is_delete', '0');
        $totClients = $clients->count();
        
        foreach ($clients as $i => $client) {
            $userdone = User::where('client_id', $client->id)->where('status', 1)->count();
            $all = User::where('client_id', $client->id)->count();
           
            //change status if all user answer
            if ($userdone == $all) {
                $affected = DB::table('clients')
                    ->where('id', $client->id)
                    ->update(['status' => 1]);
            }else{
                //stay value 0 if not all user answer
                $affected = DB::table('clients')
                    ->where('id', $client->id)
                    ->update(['status' => 0]);
            }
        }
        $clients = Clients::all()->where('is_delete', '0')->where('status', 0);
        $uncomplete = $clients->count();
        $c_complete  = Clients::all()->where('is_delete', '0')->where('status', 1)->count();
        $total = User::where('role_id', 2)->count();
        
        return view(
            'admin.index',
            [
                'count' => $count,
                'mcount' => $mcount,
                'recent' => $recent,
                'monthly' => $mothly,
                'participants' => $participants,
                'year' => $yearn,
                'clients' => $clients,
                'complete' => $c_complete,
                'uncomplete' => $uncomplete,
                'pax' => $total,
                'totClients' => $totClients,

            ]
        );
    }
    public function Chome()
    {
        return view('admin.clients');
    }

    public function vquest()
    {
        return view(
            'admin.question',
            [
                'questions' => Questions::all(),
            ]
        );
    }

    public function create()
    {

        $random = Str::random(8);
        $code = $random;
        $codedb = DB::table('clients')->where('link_code', 'LoUY')->value('link_code');
        //dd($codedb,$code);
        $x = 0;
        $inc = 0;
        while ($code ==  $codedb) {

            $random = Str::random(8);
            $code = $random;
            $x = 1;
        }


        return view('admin.new_clients', [
            'code' => $random,
        ]);
    }

    public function view()
    {
        $select = Clients::all()->where('is_delete', '0');
        //dd($select);
        foreach ($select as $client) {
            $answer_all = DB::table('users')->where('client_id', $client->id)->count();
            $answer = DB::table('users')->where('client_id', $client->id)->where('status', 1)->count();

            if ($answer == $answer_all && $answer > 0) {
                $complete = 1;
                $complete = DB::table('clients')
                    ->where('id', $client->id)
                    ->update(['status' => 1]);
            } else {
                $complete = 0;
                $complete = DB::table('clients')
                    ->where('id', $client->id)
                    ->update(['status' => 0]);
            }
        }
        $random = Str::random(8);
        $code = $random;
        $codedb = DB::table('clients')->where('link_code', 'LoUY')->value('link_code');
        // //dd($codedb,$code);
        $x = 0;
        $inc = 0;
        while ($code ==  $codedb) {

            $random = Str::random(8);
            $code = $random;
            $x = 1;
        }

        return view('admin.view_clients', [
            'clients' => $select,
            'code' => $code,

        ]);
    }

    public function indTemplate()
    {
        $highlow = $this->selBehaviour('D');

        $Dhigh = explode(".", $highlow->H_temp);
        $Dcount = count($Dhigh);
        $DLow = explode(".", $highlow->L_temp);
        $Dlcount = count($DLow);

        return view('admin.inv-template', [
            'Dhigh' => $Dhigh,
            'DLow' => $DLow,
            'Dcount' => $Dcount,
            'Dlcount' => $Dlcount,
        ]);
    }
    public function indTemplate2()
    {
        $highlowD = $this->selBehaviour('D');
        $highlowI = $this->selBehaviour('I');
        $highlowS = $this->selBehaviour('S');
        $highlowC = $this->selBehaviour('C');

        $Dhigh = explode(".", $highlowD->H_temp);
        $Dcount = count($Dhigh);
        $DLow = explode(".", $highlowD->L_temp);
        $Dlcount = count($DLow);

        $Ihigh = explode(".", $highlowI->H_temp);
        $Icount = count($Ihigh);
        $ILow = explode(".", $highlowI->L_temp);
        $Ilcount = count($ILow);

        $Shigh = explode(".", $highlowS->H_temp);
        $Scount = count($Shigh);
        $SLow = explode(".", $highlowS->L_temp);
        $Slcount = count($SLow);

        $Chigh = explode(".", $highlowC->H_temp);
        $Ccount = count($Chigh);
        $CLow = explode(".", $highlowC->L_temp);
        $Clcount = count($CLow);

        return view('admin.inv-template2', [
            'Dhigh' => $Dhigh,
            'DLow' => $DLow,
            'Dcount' => $Dcount,
            'Dlcount' => $Dlcount,
            'Ihigh' => $Ihigh,
            'ILow' => $ILow,
            'Icount' => $Icount,
            'Ilcount' => $Ilcount,
            'Shigh' => $Shigh,
            'SLow' => $SLow,
            'Scount' => $Scount,
            'Slcount' => $Slcount,
            'Chigh' => $Chigh,
            'CLow' => $CLow,
            'Ccount' => $Ccount,
            'Clcount' => $Clcount,
        ]);
    }
    public function indTemplate3()
    {
        $highlowD = $this->selBehaviour('D');
        $highlowI = $this->selBehaviour('I');
        $highlowS = $this->selBehaviour('S');
        $highlowC = $this->selBehaviour('C');

        $Dhigh = explode(".", $highlowD->H_temp);
        $Dcount = count($Dhigh);
        $DLow = explode(".", $highlowD->L_temp);
        $Dlcount = count($DLow);

        $Ihigh = explode(".", $highlowI->H_temp);
        $Icount = count($Ihigh);
        $ILow = explode(".", $highlowI->L_temp);
        $Ilcount = count($ILow);

        $Shigh = explode(".", $highlowS->H_temp);
        $Scount = count($Shigh);
        $SLow = explode(".", $highlowS->L_temp);
        $Slcount = count($SLow);

        $Chigh = explode(".", $highlowC->H_temp);
        $Ccount = count($Chigh);
        $CLow = explode(".", $highlowC->L_temp);
        $Clcount = count($CLow);

        return view('admin.inv-template3', [
            'Dhigh' => $Dhigh,
            'DLow' => $DLow,
            'Dcount' => $Dcount,
            'Dlcount' => $Dlcount,
            'Ihigh' => $Ihigh,
            'ILow' => $ILow,
            'Icount' => $Icount,
            'Ilcount' => $Ilcount,
            'Shigh' => $Shigh,
            'SLow' => $SLow,
            'Scount' => $Scount,
            'Slcount' => $Slcount,
            'Chigh' => $Chigh,
            'CLow' => $CLow,
            'Ccount' => $Ccount,
            'Clcount' => $Clcount,
        ]);
    }
    //keywords template
    public function Template_key()
    {
        $keyD = $this->selkey('D');
        $keyI = $this->selkey('I');
        $keyS = $this->selkey('S');
        $keyC = $this->selkey('C');


        $keyD = explode(",", $keyD->keywords);
        $keyI = explode(",", $keyI->keywords);
        $keyS = explode(",", $keyS->keywords);
        $keyC = explode(",", $keyC->keywords);

        //count
        $Count_kd = count($keyD);
        $Count_ki = count($keyI);
        $Count_ks = count($keyS);
        $Count_kc = count($keyC);








        return view('admin.T_Keywords', [
            'keyD' => $keyD,
            'keyI' => $keyI,
            'keyS' => $keyS,
            'keyC' => $keyC,
            'count_kd' => $Count_kd,
            'count_ki' => $Count_ki,
            'count_ks' => $Count_ks,
            'count_kc' => $Count_kc,
        ]);
    }

    public function Template_motivate()
    {



        $styleD = $this->arrvalue('D');
        $styleI = $this->arrvalue('I');
        $styleS = $this->arrvalue('S');
        $styleC = $this->arrvalue('C');




        $keyI = $this->selkey('I');
        $keyS = $this->selkey('S');
        $keyC = $this->selkey('C');



        $keyI = explode(",", $keyI->keywords);
        $keyS = explode(",", $keyS->keywords);
        $keyC = explode(",", $keyC->keywords);

        //count
        // $Count_kd = count($keyD);
        $Count_ki = count($keyI);
        $Count_ks = count($keyS);
        $Count_kc = count($keyC);








        return view('admin.T_Motivation', [

            'keyI' => $keyI,
            'keyS' => $keyS,
            'keyC' => $keyC,
            // 'count_kd' => $Count_kd,
            'count_ki' => $Count_ki,
            'count_ks' => $Count_ks,
            'count_kc' => $Count_kc,
            'styleD' => $styleD,
            'styleI' => $styleI,
            'styleS' => $styleS,
            'styleC' => $styleC,
        ]);
    }
    public function Template_performance()
    {

        $perD = $this->arrperformance('D');
        $perI = $this->arrperformance('I');
        $perS = $this->arrperformance('S');
        $perC = $this->arrperformance('C');



        return view('admin.T_Performance', [
            'perD' => $perD,
            'perI' => $perI,
            'perS' => $perS,
            'perC' => $perC,
        ]);
    }
    public function Template_strength()
    {
        $sterngthD = $this->arrstrength('D');
        $countD = count($sterngthD);

        $sterngthI = $this->arrstrength('I');
        $countI = count($sterngthI);
        $sterngthS = $this->arrstrength('S');
        $countS = count($sterngthS);
        $sterngthC = $this->arrstrength('C');
        $countC = count($sterngthC);
        // dd($sterngthD);



        return view('admin.T_Strength', [
            'SD' => $sterngthD,
            'SI' => $sterngthI,
            'SS' => $sterngthS,
            'SC' => $sterngthC,
            'countD' => $countD,
            'countI' => $countI,
            'countS' => $countS,
            'countC' => $countC,
        ]);
    }

    //small function in motivate function

    public function arrvalue($style)
    {
        $style = $this->selmotivate($style);
        $motivate = explode('.', $style->Wmotivate);
        $best = explode('.', $style->Wbest);
        $demotivate = explode('.', $style->Wdemotive);
        $worst = explode('.', $style->Wworst);

        $keyDarr = array();
        array_push($keyDarr, $motivate, $best, $demotivate, $worst);

        return $keyDarr;
    }
    public function arrperformance($style)
    {
        $style = $this->selperformance($style);
        $A_improve = explode('.', $style->A_improve);
        $O_better = explode('.', $style->O_better);
        $O_avoid = explode('.', $style->O_avoid);
        $Y_environment = explode('.', $style->Y_environment);

        $keyDarr = array();
        array_push($keyDarr, $A_improve, $O_better, $O_avoid, $Y_environment);

        return $keyDarr;
    }
    public function arrstrength($style)
    {
        $style = $this->selstrengthen($style);
        $strength = explode('.', $style->Strength);


        $keyDarr = array();
        array_push($keyDarr, $strength);

        return $strength;
    }
    public function grpTemplate()
    {
        return view('admin.grp-template');
    }

    public function store(Request $request)
    {

        //dd($request);
        //dd($request);
        $formFields = $request->validate([
            'client' => 'required',
            'email' => ['required', 'unique:clients'],
            'address' => 'required',
            'created_at' => 'required',
            'link_code' => 'required',
            'is_delete' => 'required',
        ]);
        //dd($formFields);
        // Clients::create($formFields);
        $insert = DB::table('clients')->insert([
            'client' => $formFields['client'],
            'email' => $formFields['email'],
            'address' => $formFields['address'],
            'created_at' => $formFields['created_at'],
            'link_code' => $formFields['link_code'],
            'is_delete' => $formFields['is_delete'],
        ]);

        $cid = DB::table('clients')->where('email', $formFields['email'])->first();
        $cid = $cid->id;
        //dd($cid);
        $newUSer = DB::table('users')->insert([
            'name'     => $formFields['client'],
            'email'    => $formFields['email'], 
            'role_id' => 4,
            'status' => 3,
            'client_id' => $cid,
            'created_at' => date("Y-m-d"),
         ]);
         $code = $formFields['link_code'];
         $url = route('link-acc', $code);

         

         Mail::to($formFields['email'])->send(new Signup($code, $url));
        return redirect('/admin/index');
    }
    public function details(Clients $clients)
    {

        dd($clients );
        $clients = DB::table('clients')->where('id', $clients->id)->first();
        $participants = DB::table('users')->where('client_id', $clients->id)->get();
        // $participants = Users::where('client_id', $clients->id)->get();
        //  dd($participants);



        $department = DB::table('departments')->get();
        $countre = DB::table('answer_records')->where('client_id', $clients->id)->count();
        $countall = DB::table('users')->where('client_id', $clients->id)->count();
        $allc = count($participants);
        if ($allc > 0) {
            $progress = $countre / $allc * 100;
            $progress = intval($progress);
        } else {
            $progress = 0;
        }





        //dd($clients,$participants,$department);
        $valuevar = $progress . "%";
        // dd( $participants);
        $update = $this->updatestts($participants);
        //dd($participants);
        return view('admin.details', [
            'client' => $clients,
            'participants' => $participants,
            'department' => $department,
            'countre' => $countre,
            'countall' => $countall,
            'var' => $valuevar,
            'progress' => $progress,
        ]);
    }

    public function ac_index(){
        $current = auth()->user()->client_id;
        // $pax = DB::table('users')->where('client_id', $current)->where('role_id',2)->get();
        $clients = DB::table('clients')->where('id', $current)->first();
        $participants = DB::table('users')->where('client_id', $clients->id)->where('role_id',2)->get();
        



        $department = DB::table('departments')->get();
        $countre = DB::table('answer_records')->where('client_id', $clients->id)->count();
        $countall = DB::table('users')->where('client_id', $clients->id)->where('role_id',2)->count();
        
        $allc = count($participants);
        if ($allc > 0) {
            $progress = $countre / $allc * 100;
            $progress = intval($progress);
        } else {
            $progress = 0;
        }

        //update value statue
        $valuevar = $progress . "%";
        
        $update = $this->updatestts($participants);
       

        return view('Accessor\index',[
            'pax' => $participants,
            'var' => $valuevar,
        ]);
    }

    public function remarks(User $users){
        
        
        //dd($users->id);
        $remarks = DB::table('remarks')->where('user_id', $users->id)->first();
        $count= DB::table('remarks')->where('user_id', $users->id)->count();
        $join = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.department')
            ->where('users.id', $users->id)
            ->first();
        if($count > 0){
        
        $rem1 = $remarks->rem_1;
        $rem1 = explode(".",$rem1);
        $rem1=array_filter($rem1);

        $rem2 = $remarks->rem_2;
        $rem2 = explode(".",$rem2);

        $rem3 = $remarks->rem_3;
        $rem3 = explode(".",$rem3);
        }else{
            $rem1 = "";
       

        $rem2 = "";
        $rem3 = "";
        }


        
           
        
        
        
        

        
        
        return view('Accessor.remarks',
        [
            'rem1' => $rem1,
            'rem2' => $rem2,
            'rem3' => $rem3,
            'user' => $join,
            'count' => $count,
        
        
        ]
    );
     }
    public function updateRemarks1(Request $request){
        // dd($request);
        $value = $request->value;
        $value = implode(".",$value);
        $affected = DB::table('remarks')
              ->where('user_id', $request->uid)
              ->update(['rem_1' => $value]);

        return redirect(route('acindex'));
        

    }
    public function updateRemarks2(Request $request){
        // dd($request);
        $value = $request->value;
        $value = implode(".",$value);
        $affected = DB::table('remarks')
              ->where('user_id', $request->uid)
              ->update(['rem_2' => $value]);

        return redirect(route('acindex'));
        

    }
    public function updateRemarks3(Request $request){
        // dd($request);
        $value = $request->value;
        $value = implode(".",$value);
        $affected = DB::table('remarks')
              ->where('user_id', $request->uid)
              ->update(['rem_3' => $value]);

        return redirect(route('acindex'));
        

    }

    public function updatestts($participants)
    {
        foreach ($participants as $p) {
            $count = DB::table('answer_records')->where('user_id', $p->id)->count();

            // if($count > 0){
            // $update = DB::table('users')->where('id', $p->id)
            // ->update(['status' => 2]);
            // }
        }
    }
    public function invite(Clients $clients)
    {

        $clients = DB::table('clients')->where('id', $clients->id)->first();
        //dd($clients);
        return view('admin.invite', [
            'clients' => $clients,

        ]);
    }

    public function uploadPax(Clients $clients, Request $request)
    {

        // $client = Clients::where( 'client', $row[2])->first();

        Excel::import(new UsersImport($request->cid), $request->file);

        return redirect(route('Cview'))->with('success', 'All good!');
    }

    public function Cdelete(Clients $clients)
    {
        //$delete = DB::table('clients')->where('id', $clients->id)->delete();
        // $delete = Clients::find($clients->id)->delete();
        $delete = Clients::find($clients->id)->update(['is_delete' => '1']);
        // $delete = Clients::find($clients->id)->get();
        // dd($delete);
        return redirect('/admin/clients/view')->with('message', 'Departments deleted successfully');
    }

    public function update(Clients $clients)
    {
        //dd($clients);
        $clients = Clients::find($clients->id);
        return view('admin.update', [
            'clients' => $clients,
        ]);
    }
    public function change(Request $request, Clients $clients)
    {
        //dd($request);
        $formFields = $request->validate([
            'client' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $update = Clients::find($clients->id)->update([
            'client' => $request->client,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect(route('Cview'));
        //dd($update);


    }
    public function uptemplate2(Request $request)
    {

        //dd($request->style);
        $arrayDH = array();
        $arrayDL = array();
        $arrayIH = array();
        $arrayIL = array();
        $arraySH = array();
        $arraySL = array();
        $arrayCH = array();
        $arrayCL = array();

        array_push($arrayDH, $request->D_High1, $request->D_High2, $request->D_High3, $request->D_High4, $request->D_High5);
        array_push($arrayDL, $request->D_low1, $request->D_low2, $request->D_low3, $request->D_low4, $request->D_low5);
        array_push($arrayIH, $request->I_High1, $request->I_High2, $request->I_High3, $request->I_High4, $request->I_High5);
        array_push($arrayIL, $request->I_low1, $request->I_low2, $request->I_low3, $request->I_low4, $request->I_low5);
        array_push($arraySH, $request->S_High1, $request->S_High2, $request->S_High3, $request->S_High4, $request->S_High5);
        array_push($arraySL, $request->S_low1, $request->S_low2, $request->S_low3, $request->S_low4, $request->S_low5);
        array_push($arrayCH, $request->C_High1, $request->C_High2, $request->C_High3, $request->C_High4, $request->C_High5);
        array_push($arrayCL, $request->C_low1, $request->C_low2, $request->C_low3, $request->C_low4, $request->C_low5);




        $arrayDH = $this->arraytostr($arrayDH);
        $arrayDL = $this->arraytostr($arrayDL);
        $arrayIH = $this->arraytostr($arrayIH);
        $arrayIL = $this->arraytostr($arrayIL);
        $arraySH = $this->arraytostr($arraySH);
        $arraySL = $this->arraytostr($arraySL);
        $arrayCH = $this->arraytostr($arrayCH);
        $arrayCL = $this->arraytostr($arrayCL);

        $update = DB::table('templates_reports')->where('Behaviour_type', 'D')
            ->update(['H_temp' => $arrayDH, 'L_temp' => $arrayDL]);
        $update = DB::table('templates_reports')->where('Behaviour_type', 'I')
            ->update(['H_temp' => $arrayIH, 'L_temp' => $arrayIL]);
        $update = DB::table('templates_reports')->where('Behaviour_type', 'S')
            ->update(['H_temp' => $arraySH, 'L_temp' => $arraySL]);
        $update = DB::table('templates_reports')->where('Behaviour_type', '')
            ->update(['H_temp' => $arrayCH, 'L_temp' => $arrayCL]);




        return redirect(route('indTemp2'));
        //dd($stdh);
        // dd($request->D_High1);


    }
    public function uptemplate(Request $request)
    {
        //dd($request->style);
        $valueH = $request['valueH'];
        $valueL = $request['valueL'];
        // dd($valueH,$valueL);
        $valueH = array_filter($valueH);
        $valueL = array_filter($valueL);

        $arrvalueH = array();
        $arrvalueH = implode('.', $valueH);
        $arrvalueL = array();
        $arrvalueL = implode('.', $valueL);
        //dd($request);
        $update = DB::table('templates_reports')->where('Behaviour_type', $request['style'])
            ->update(['L_temp' => $arrvalueL, 'H_temp' => $arrvalueH,]);

        return redirect(route('indTemp2'))->with('message', 'Template has been updated');
    }

    public function Update_keywords(Request $request)
    {
        //dd($request);
        $value = $request['value'];
        $arrvalue = array();
        $arrvalue = implode(',', $value);
        $update = DB::table('templates_reports')->where('Behaviour_type', $request['style'])
            ->update(['keywords' => $arrvalue]);
        return redirect(route('key'))->with('message', 'Template has been updated');
    }

    public function Update_motivation(Request $request)
    {
        //dd($request);
        $value = $request['value'];
        $arrvalue = array();
        $arrvalue = implode('.', $value);
        $update = DB::table('templates_reports')->where('Behaviour_type', $request['style'])
            ->update([$request['valuef'] => $arrvalue]);

        return redirect(route('motivate'))->with('message', 'Template has been updated');
    }
    public function Update_performance(Request $request)
    {

        $value = $request['value'];
        $arrvalue = array();
        $arrvalue = implode('.', $value);
        $update = DB::table('templates_reports')->where('Behaviour_type', $request['style'])
            ->update([$request['valuef'] => $arrvalue]);

        return redirect(route('performance'))->with('message', 'Template has been updated');
    }
    public function Update_strength(Request $request)
    {
        //dd($request);


        $value = $request['value'];
        $arrvalue = array();
        $value = array_filter($value);
        $arrvalue = implode('.', $value);
        //dd($request);
        $update = DB::table('templates_reports')->where('Behaviour_type', $request['style'])
            ->update(['Strength' => $arrvalue]);

        return redirect(route('strength'))->with('message', 'Template has been updated');
    }
    public function arraytostr($arrayDH)
    {
        //to combine collection tom sting with comma
        foreach ($arrayDH as $dh) {
            if (isset($dh)) {
                $stdh = implode(".", $arrayDH);
            }
        }
        return $stdh;
    }
    public function arraytostr2($arrayDH)
    {
        //to combine collection tom sting with comma
        foreach ($arrayDH as $dh) {
            if (isset($dh)) {
                $stdh = implode(",", $arrayDH);
            }
        }
        return $stdh;
    }
    public function profile()
    {


        return view('admin.profile');
    }
    public function profilemodify(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'comfirmationpassword' => 'required',
        ]);
        if ($formFields['password'] === $formFields['comfirmationpassword']) {
            $formFields['password'] = bcrypt($formFields['password']);
            // $user = DB::table('users')->where('id',auth()->user()->id)->update(['name' => $formFields['name']]);
            // $user = DB::table('users')->where('id',auth()->user()->id)->update(['email' => $formFields['email']]);
            // $user = DB::table('users')->where('id',auth()->user()->id)->update(['password' => $formFields['password']]);

            $user = DB::table('users')->where('id', auth()->user()->id)
                ->update(['name' => $formFields['name'], 'email' => $formFields['email'], 'password' => $formFields['password']]);


            return redirect(route('ad_index'));
        } else {

            return redirect('admin.profile');
        }
        //dd($formFields);



    }

    //template report
    public function templates()
    {
        return view('admin.stemplate');
    }
    //small function

    //function to calculate participants montly
    public function monthly()
    {
        $now = Carbon::now();
        $month = $now->format('m');
        // $month='10';

        $monthly = DB::table('clients')
            ->select('id', 'name', 'created_at')
            ->whereMonth('created_at', $month)
            // ->where('role_id',2)
            ->count();
        //dd($monthly,$currmon,$nextmon,$month);
        //dd($monthly);
        return $monthly;
    }
    public function countmonthly($count)
    {

        $count = DB::table('answer_records')->whereYear('created_at', '2022')
            ->whereMonth('created_at', $count)
            ->count();
        return $count;
    }


    //SQL function
    public function selBehaviour($style)
    {
        $array = DB::table('templates_reports')
            ->select('L_temp', 'H_temp')
            ->where('Behaviour_type', $style)
            ->first();

        return $array;
    }
    public function selkey($style)
    {
        $key = DB::table('templates_reports')
            ->select('keywords')
            ->where('Behaviour_type', $style)
            ->first();

        return $key;
    }
    public function selmotivate($style)
    {
        $key = DB::table('templates_reports')
            ->select('Wmotivate', 'Wbest', 'Wdemotive', 'Wworst')
            ->where('Behaviour_type', $style)
            ->first();

        return $key;
    }
    public function selperformance($style)
    {
        $key = DB::table('templates_reports')
            ->select('A_improve', 'O_better', 'O_avoid', 'Y_environment')
            ->where('Behaviour_type', $style)
            ->first();

        return $key;
    }
    public function selstrengthen($style)
    {
        $key = DB::table('templates_reports')
            ->select('Strength')
            ->where('Behaviour_type', $style)
            ->first();

        return $key;
    }
    public function selbest($style)
    {
        $key = DB::table('templates_reports')
            ->select('Wbest')
            ->where('Behaviour_type', $style)
            ->first();

        return $key;
    }
    public function seldemotivate($style)
    {
        $key = DB::table('templates_reports')
            ->select('Wdemotive')
            ->where('Behaviour_type', $style)
            ->first();

        return $key;
    }
    public function selworst($style)
    {
        $key = DB::table('templates_reports')
            ->select('Wworst')
            ->where('Behaviour_type', $style)
            ->first();

        return $key;
    }
    public function yearly()
    {
        $year = array();
        for ($i = 1; $i <= 12; $i++) {
            $count = $this->countmonthly($i);
            array_push($year, $count);
        }
        return $year;
    }
}
