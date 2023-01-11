<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // all category 
    public function index(){
        return view('admin.category.index');
    }

// create category 
    public function create(){
        return view('admin.category.create');
    }
}
