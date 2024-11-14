<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function create(Request $request){
        return view('add');
    }
    //
    function add(Request $request){
        $blog = new Blog();
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->author=$request->author;
        $file = $request->file('file');

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'author'=>'required',
            'file'=>'required|file'
        ]);

        $file_name = $file->getClientOriginalName();
        Storage::disk('public')->putFileAs("images",$request->file('file'),$file_name);
        $blog->path=$file_name;

        if($blog->save()){
            return redirect('/');
        }else{
            return "error";
        }




    }

    function list(){
        $blogs = Blog::paginate(2);
        // return $blogs;
        return view('blog_list',['blogs'=>$blogs]);
    }

    function delete($id){
        $is_deleted = Blog::destroy($id);
        if($is_deleted){
            return redirect('/');
        }
    }

    function edit($id){
        $blog = Blog::find($id);
        return view('edit',['data'=>$blog]);
    }

    function update(Request $request, $id){
        $blog = Blog::find($id);
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->author=$request->author;
        $file = $request->file('file');

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'author'=>'required',
            'file'=>'sometimes|file'
        ]);
if(isset($file)){

    $file_name = $file->getClientOriginalName();
    Storage::disk('public')->putFileAs("images",$request->file('file'),$file_name);
    $blog->path=$file_name;
}

        if($blog->save()){
            return redirect('/');
        }else{
            return "error";
        }


    }
}
