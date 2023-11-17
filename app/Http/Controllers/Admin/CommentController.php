<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function index(): View 
    {        
        return view('admin.comment.index', [
            'comments' => Comment::with('user')->with('blogPost')->orderBy('created_at', 'desc')->paginate(15),
        ]);
    }

    public function edit(Comment $comment): View
    {
        return view('admin.comment.edit', [
            'comment' => $comment,
        ]);
    }


    public function update(CommentRequest $request, Comment $comment): RedirectResponse
    {
        $data = $request->validated();
        $data['is_validated'] = $request->input('is_validated') ? true : false;
        $comment->update($data);

        return redirect()->route('admin.comment.index')->with('success', "Le commentaire a bien été modifié.");
    }

    public function delete(Comment $comment): View
    {
        return view('admin.comment.delete', [
            'comment' => $comment,
        ]);
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        
        return redirect()->route('admin.comment.index')->with('success', "Le commentaire a bien été supprimé.");
    }
}
