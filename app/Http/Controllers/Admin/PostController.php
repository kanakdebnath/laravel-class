<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
      // all post 
      public function index(){
        $results = Post::with('category','user')->get();
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

    if($request->hasFile('photo')){
        $file = $request->file('photo');
        $ext = $file->extension() ?:'png';
        $photo = Str::random(10) . '.' . $ext;

        // for resize image 
        $resize = Image::make($file->getRealPath());
        $resize->resize(700,435);

        $path = public_path(). '/uploads/post/';
        $resize->save($path.'/'.$photo);

        $post ->photo = $photo;

    }



    $post->save();

    if($post->save()){
        return redirect()->route('all_post')->with('message','Post added Successfully');

    }else{
        return redirect()->back();
    }
    
}



  
// edit post 
public function edit($id){

    $categories = Category::where('status','Active')->get();
    $result = Post::find($id);
    return view('admin.post.edit',compact('result','categories'));
}
    
// Delete category 
public function delete(Request $request){

    $result = Post::find($request->id);
    if($result->photo){
        $path = public_path(). '/uploads/post/'.$result->photo;
        unlink($path);
    }

    $result->delete();
    return response()->json(['message' => 'Post Deleted Successfully.']);
}




// Update category 
public function update(Request $request){

    $request->validate([
        'title' => 'required',
        'category_id' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'status' => 'required',
    ]);


    $post = Post::find($request->id);
    $post->title = $request->title;
    $post->category_id  = $request->category_id;
    $post->user_id  = Auth::user()->id;
    $post->short_description  = $request->short_description;
    $post->description  = $request->description;
    $post->slug  = Str::slug($request->title);
    $post->status  = $request->status;

    if($request->hasFile('photo')){
        $file = $request->file('photo');
        $ext = $file->extension() ?:'png';
        $photo = Str::random(10) . '.' . $ext;

        // for resize image 
        $resize = Image::make($file->getRealPath());
        $resize->resize(700,435);

        // Old Photo Delete 
        if($request->old_photo){
            $path = public_path(). '/uploads/post/'.$request->old_photo;
            unlink($path);
        }

        $path = public_path(). '/uploads/post/';
        $resize->save($path.'/'.$photo);

        $post ->photo = $photo;

    }

    $post->save();

    if($post->save()){
        return redirect()->route('all_post')->with('message','Post Updated Successfully');

    }else{
        return redirect()->back();
    }
    
}

}
