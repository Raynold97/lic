<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    
    public function index(){
       // $title='Welcome to Laravel!';
        // return view('pages.index',compact('title'));
        return view('pages/index');
    }

    public function blog(){
        $title='Blog';
        return view('pages.blog')->with('title',$title);
    }

    
    }

