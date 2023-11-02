<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index');
    }

    public function show(): View
    {
        return view('blog.show');
    }
}
