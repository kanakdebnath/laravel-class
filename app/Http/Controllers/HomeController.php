<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home(){
        
        if(Auth::user()){
            if(Auth::user()->user_type == 'admin'){
                return view('admin.dashboard');
            }elseif(Auth::user()->user_type == 'user'){
                return view('frontend.dashboard');
            }else{
                return redirect()->route('login');
            }

        }else{
            return redirect()->route('login');
        }
    }


    public function index(){
        return view('frontend.index');
    }

    public function about(){
        return view('abc.about');
    }

    public function contact(){
        return view('abc.contact');
    }

    public function contact_submit(Request $request){
        return $request->name;
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    
}
