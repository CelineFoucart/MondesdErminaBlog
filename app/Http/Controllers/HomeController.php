<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $blogPosts = BlogPost::query()->recent()->limit(5)->get();

        return view('home.welcome', [
            'blogPosts' => $blogPosts,
        ]);
    }

    public function about(): View
    {
        return view('home.about');
    }
}