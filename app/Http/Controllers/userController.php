<?php

namespace App\Http\Controllers;

use App\Mail\Reminder;
use App\Mail\Signup;
use App\Models\Clients;
use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Switch_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    
    public function create()
    {
        return view('register');
    }
    public function createcode($name)
    {

        $departments = DB::table('departments')->get();
        $code = DB::table('clients')->where('link_code', $name)->first();
        //dd($departments);
        return view(
            'registercode',
            [
                'clients' => $code,
                'dp' => $departments,

            ]
        );
    }
    public function createcode_acc($name){
        $departments = DB::table('departments')->get();
        $code = DB::table('clients')->where('link_code', $name)->first();
        //dd($departments);
        return view(
            'registercodeACC',
            [
                'clients' => $code,
                'dp' => $departments,

            ]
        );
    }
    public function create2()
    {
        return view('user.register');
    }
    public function Rstore(Request $request)
    {
        $countdept = DB::table('departments')->get();
        $ar=array();
        
        foreach ($countdept as $dp) {
            if($dp->id > 0){
                array_push($ar,$dp->id);
            } else{
                $ar = $ar;
            }
            
        }
        $ar=implode(",",$ar);
        
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            //'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6',
            'client_id' => 'required',
            'role_id' => 'required',
            
            'department_id' => 'required|in:'.$ar,
            'status' => 'required',
            'created_at' => 'required',
            'is_delete' => 'required',
        ]);
        
        
        
        //hash password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        // $user = User::create($formFields);
        
        $role = $formFields['role_id'];
        
        if($role === "4"){
            
            User::where('email', $formFields['email'])
            ->update([
                'password' => $formFields['password'],
                'department_id' => $formFields['department_id'],
                'status' => 4,
            ]);
        }
        else{
            
            User::where('email', $formFields['email'])
            ->update([
                'password' => $formFields['password'],
                'department_id' => $formFields['department_id'],
                'status' => 2,
            ]);

        }
        

        //Login
        //auth()->login($user);
        return redirect('/')->with('message', 'Your account has been created successfully');
    }

   
    public function Ustore(Request $request)
    {
        dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'client_id' => 'required',
            'role_id' => 'required',
            'department_id' => 'required',
            'status' => 'required',
            'created_at' => 'required',
        ]);
        //hash password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);

        //Login
        //auth()->login($user);
        return redirect('/')->with('message', 'Your account has been created successfully');
    }
    public function auth(Request $request)
    {
        //dd($request);
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);



        $user = DB::table('users')->where('email', $formFields['email'])->first();
        


        $role = $user->role_id;
        // echo $role;
        // dd($user);




        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            switch ($role) {
                case 4:
                    return redirect(route('acindex'))->with('message', 'Logged in successfully');
                    break;

                case 2:
                    return redirect("/home")->with('message', 'Logged in successfully');
                    break;
                case 1:
                    return redirect('/admin/index')->with('message', 'Logged in successfully');
                    break;
            }
            // if ($role == 2) {


            //     return redirect("/home")->with('message', 'Logged in successfully');
            // }
            // else{
            //     return redirect('/admin/index')->with('message', 'Logged in successfully');
            // }
        }
        return back()->withErrors(['email' => 'Invalid Cerendentials'])->onlyInput();
    }

    public function logout()
    {
        auth()->logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have beem logout');
    }

    public function sendMail($name, $email)
    {



        $url = route('link', $name);
        //dd($name,$url);
        Mail::to('muirsyad2399@gmail.com')->send(new Signup($name, $url, $email));
        return view('login');
    }
    public function sentMail(Request $request, $code)
    {
        $email = $request['email'];
        //dd($request);
        //to count and exclude token
        $var = -1;
        $data = $request->all();

        foreach ($data as $value) {
            $var++;
        }

        //dd($code, $request , $var);
        $url = route('link', $code);

        //dd($name,$url);
        $arr = [];

        $j = 0;
        //to put value in array
        for ($i = 0; $i < $var; $i++) {
            $j = $i + 1;
            $j = "email" . $j;
            $j = $request->$j;
            //dd($j);
            array_push($arr, $j);
            //dd($j);
            //dd($request->$j);
            //Mail::to($j)->send(new Signup($code, $url));
        }
        //dd($arr);

        foreach ($arr as $arr) {


            Mail::to($arr)->send(new Signup($code, $url));
        }

        // Mail::to($request->email2)->send(new Signup($code, $url));
        return redirect(route('Cview'));
    }

    public function sentMail_csv(Request $request, $code)
    {


        $client_id = Clients::where('link_code', $code)->first();

        $unanswered = User::where('client_id', $client_id->id)->where('status', 0)->get();
        //dd($code,$client_id->id,$unanswered[0]->email);
        $url = route('link', $code);
        foreach ($unanswered as $user) {
            Mail::to($user->email)->send(new Signup($code, $url));
        }
        // $email=$request['email'];
        // //dd($request);
        // //to count and exclude token
        // $var = -1;
        // $data = $request->all();

        // foreach ($data as $value) {
        //     $var++;
        // }

        // //dd($code, $request , $var);
        // $url = route('link', $code);

        // //dd($name,$url);
        // $arr=[];

        // $j=0;
        // //to put value in array
        // for($i=0; $i<$var; $i++) {
        //     $j=$i+1;
        //     $j="email".$j;
        //     $j= $request->$j;
        //     //dd($j);
        //     array_push($arr,$j);
        //     //dd($j);
        //     //dd($request->$j);
        //     //Mail::to($j)->send(new Signup($code, $url));
        // }
        // //dd($arr);

        // foreach( $arr as $arr){


        //     Mail::to($arr)->send(new Signup($code, $url));
        // }

        // Mail::to($request->email2)->send(new Signup($code, $url));
        return redirect(route('Cview'));
    }

    public function RemianderMail(Request $request, $code)
    {


        $client_id = Clients::where('link_code', $code)->first();

        $unanswered = User::where('client_id', $client_id->id)->where('status', 0)->get();
        // dd($client_id,$unanswered);
        $url = route('link', $code);
        
        foreach ($unanswered as $user) {
            Mail::to($user->email)->send(new Reminder($code, $url));
        }
        
        return redirect(route('Cview'));
    }

    public function t_login()
    {
        return view('TLD.login');
    }
}
