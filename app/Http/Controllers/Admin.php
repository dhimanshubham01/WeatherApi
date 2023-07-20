<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class Admin extends Controller
{
    //
    public function index() {
        
        return view('index');   // home page
    }

    public function createAccount() {
        
        return view('createAccount');  // creating account
    }

    public function insert(Request $request) {
         // insert query 
         
         $request -> validate(
                [
                    'username'         =>  'required|unique:admins',
                    'email'            =>  'required',
                    'phone_no'         =>  'required',
                    'password'         =>  'required',
                    'confirm_password' =>  'required|same:password'   
                ]
            );
            // $result = DB::table('admins')
            //     ->select('username')
            //     ->where('username', '=', $request['uname'])
            //     ->get();
            // if($result ->count() > 0) {
            //     $request -> validate(
            //         [
            //             'uname'   =>  'unique:uname'
            //         ]
            //     );
            // }
            // else {
            $admins = new Admins;
            
            $admins->username = $request['username'];
            $admins->password = $request['password'];
            $admins->e_mail   = $request['email'];
            $admins->ph_no    = $request['phone_no']; 
            $admins->save();

    
            return view('weather');
            // }
            

    }

    public function login() {
        
        return view('login');
    }

    public function check(Request $request) {
        // dd($request);
       
        $uname = $request['username'];
        $pwd   = $request['pwd'];
        // dd($request->all());
        $result = DB::table('admins')
                ->select('username', 'password')
                ->where('username', '=', $uname)
                ->where('password', '=', $pwd)
                ->get();

        if ($result->count() > 0) {
            $username = $result[0]->username;
            $password = $result[0]->password;
            
            return view('weather');
        } 
        else {
            // $mes = "Either password or username is WRONGE";
            // $data = compact($mes,$result);
            $request -> validate(
                [
                    'username'  =>  'exists:admins',
                    'pwd'       => 'current_password'
                ]
            );

            // return redirect('/index/login');
        }

    }

    public function forgotPswd() {
        
        return view('forgotPwd');
    }

    public function updt(Request $request) {
        // dd($request->all());
        $result = DB::table('admins')
                ->select('*')
                ->where('e_mail', '=', $request['forgot'])
                ->orwhere('ph_no', '=', $request['forgot'])
                ->get();

        if ($result->count() > 0) {
            $username = $result[0]->username;
            $password = $result[0]->password;
            $email    = $result[0]->e_mail;
            $ph_no    = $result[0]->ph_no;
            // dd($username, $password, $email, $ph_no);
            $data     = compact('username', 'password', 'email', 'ph_no');
            // dd($data);
            
            return view('update')->with($data); 
        }
        else {
            // search is false
        }
    }

    public function setPwd(Request $request) {
        $username   = $request['uname'];
        $password   = $request['pwd'];
        $e_mail     = $request['email'];
        $ph_no      = $request['phone_no'];

        $data = compact('username', 'password', 'e_mail', 'ph_no');

        DB::table('admins')
            ->where('username', $username)
            ->update($data);
        
        $title = "Account Updated";
        $data  = compact('title');

        return view('blank')->with($data);
    }

    public function getWeather(Request $request)
    {   
        // dd($request->all());
        $apiKey = 'f78cb4a4caaa773f8452215202f94087';
        $city   = $request['city'];
        $url    = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

        $client = new Client();
    
        try {
            // dd('hy');
            $response = $client->get($url);
            $result = json_decode($response->getBody(), true);
            // dd($result);
            $status = "yes";
            $data = compact('result', 'status');
            // dd($data);
            
            return view('weather')->with($data);
        }
        catch (\Exception $e) {
            // Handle exception
            
            
            $error = "City Not Found";
            $send = compact('error');
            
            return view('weather')->with($send);
        }
    }
}
