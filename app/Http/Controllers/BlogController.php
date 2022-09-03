<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        if($request->category_id)
        {
                $posts=Blog::where('category_id',$request->category_id)
                            ->latest()
                            ->paginate(5);
                return $this->display($posts);

        }
        else if($request->search)
        {
            $posts=Blog::where('title','like','%'.$request->search.'%')
                        ->orWhere('description','like','%'.$request->search.'%')
                        ->paginate(5);
        return $this->display($posts);
        }
        else{

            $posts=Blog::orderBy("updated_at",'desc')->paginate(5);

            return $this->display($posts);
        }
    }


    public function create()
    {
        $categories=$this->category();
        return view('layouts.blog.create',compact('categories'));
    }



    public function store(Request $request)
    {
        $blog=new blog;
        // bloglastesis
        $blog_latest_id=blog::latest()->count();

        if($request->file)
        {
            $this->fileUpload($request,$blog);
        }
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->category_id=$request->category_id;
        $blog->slug=Str::slug($request->title,"-").$blog_latest_id+1;
        $blog->user_id=Auth::user()->id;
        $blog->save();
        return 1;
    }


    public function show()
    {
            return view('layouts.blog.show');
    }


    public function edit($id)
    {
        $post=blog::where("slug",$id)->first();
        $categories=$this->category();
        return view('layouts.blog.edit',compact('categories','post'));
    }


    // updating post section start
                public function update(Request $request)
                {

                    $blog=blog::where("slug",$request->slug)->first();
                    $destination="uploads/".$blog->image;
                    if($request->file)
                    {
                        if(File::exists($destination))
                        {
                            File::delete($destination);
                        }
                        // user defined function
                        $this->fileUpload($request,$blog);
                    }
                    $blog->title=$request->title;
                    $blog->description=$request->description;
                    $blog->category_id=$request->category_id;
                    $blog->slug=$request->slug;
                    $blog->user_id=Auth::user()->id;
                    $blog->update();
                    return 1;
                }
    // updating post section start

    public function delete(Request $request)
    {

        $blog=blog::where("slug",$request->id)->first();
        $destination="uploads/".$blog->image;
        if(File::exists($destination))
            {
                File::delete($destination);
            }
        $blog->delete();
        return 1;

    }

    // cross over functions
    private function category()
    {
        return $categories=category::orderBy("updated_at",'desc')
                                            ->get();
    }
    // retrieving information from db
    private function display($posts)
    {   $posts=$posts;
        $categories=$this->category();
        return view('layouts.blog.index',compact('categories','posts'));
    }
    private function fileUpload($request,$blog)
    {
        $file=$request->file;
        $extension=$file->extension();
        $file_name=time().'.'.$extension;
        $file->move("uploads",$file_name);
        $blog->image=$file_name;
    }
}
