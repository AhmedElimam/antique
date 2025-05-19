<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function services()
    {
        return view('pages.services');
    }
    
    public function cart(){
        return view (`pages.cart`);
    }

    public function blogs(){
        return view (`pages.blogs`);
    }
} 