<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $categories=$this->category();
        $posts=Blog::orderBy("id","desc")->get();
        return view('welcome',compact('posts','categories'));
    }
    public function category()
    {

        return $categories=category::latest()->get();
    }
}
