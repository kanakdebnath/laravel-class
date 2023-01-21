<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
      // all post 
      public function index(){
        $results = Post::get();
        return view('admin.post.index',compact('results'));
    }

// post category 
    public function create(){
        $categories = Category::where('status','Active')->get();
        return view('admin.post.create',compact('categories'));
    }


    
// store post 
public function store(Request $request){

    $request->validate([
        'title' => 'required|unique:posts',
        'category_id' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'status' => 'required',
    ]);


    $post = new Post();
    $post->title = $request->title;
    $post->category_id  = $request->category_id;
    $post->user_id  = Auth::user()->id;
    $post->short_description  = $request->short_description;
    $post->description  = $request->description;
    $post->slug  = Str::slug($request->title);
    $post->status  = $request->status;
    $post->save();

    if($post->save()){
        return redirect()->route('all_post')->with('message','Post added Successfully');

    }else{
        return redirect()->back();
    }
    
}
}
