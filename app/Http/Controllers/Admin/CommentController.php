<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(): View 
    {        
        return view('admin.comment.index', [
            'comments' => Comment::with('user')->with('blogPost')->orderBy('created_at', 'desc')->paginate(15),
        ]);
    }
}
