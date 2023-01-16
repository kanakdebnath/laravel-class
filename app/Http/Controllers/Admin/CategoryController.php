<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class CategoryController extends Controller
{

    // all category 
    public function index(){
        $results = DB::table('categories')->get();
        return view('admin.category.index',compact('results'));
    }

// create category 
    public function create(){
        return view('admin.category.create');
    }

// create category 
    public function store(Request $request){

        $data = [];
        $data['name'] = $request->category;
        $data['status'] = $request->status;

        $category = DB::table('categories')->insert($data);

        if($category){
            return redirect()->route('all_category')->with('message','Category added Successfully');

        }else{
            return redirect()->back();
        }
        
    }


    
// edit category 
public function edit($id){

    $result = DB::table('categories')->where('id',$id)->first();
    return view('admin.category.edit',compact('result'));
}
    
// Delete category 
public function delete(Request $request){

    $result = DB::table('categories')->where('id',$request->id)->delete();
    if($result){
        return response()->json(['message' => 'Category Deleted Successfully.']);

    }else{
        return redirect()->back();
    }
}


// Update category 
public function update(Request $request){

    $data = [];
    $data['name'] = $request->category;
    $data['status'] = $request->status;

    $update = DB::table('categories') ->where('id', $request->id)->limit(1)->update($data); 

    if($update){
        return redirect()->route('all_category')->with('message','Category Updated Successfully');
    }else{
        return redirect()->back();
    }
    
}


}
