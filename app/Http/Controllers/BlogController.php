<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.blogs');
    }

    public function show($post)
    {
        return view('blog.show');
    }
} 