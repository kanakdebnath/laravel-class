<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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

    
}
