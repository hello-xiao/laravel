<?php

namespace App\Http\Controllers;


use App\Mail\RegMail;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {

        $blogs = Blog::orderBy('id','DESC')->with('user')->paginate(10);
        return view('home',compact('blogs'));
    }
}
