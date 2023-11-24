<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View 
    {
        return view('admin.post.index', [
            'blogPosts' => BlogPost::with('user')->orderBy('created_at', 'desc')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View 
    {
        return view("admin.post.create", [
            'blogPost' => new BlogPost(),
            'options' => Category::orderBy('title')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request): RedirectResponse
    {
        $blogPost = BlogPost::create($request->validated());
        $blogPost->categories()->sync($request->validated('categories'));

        return redirect()->route('admin.post.show', $blogPost)->with("success", "L'article a été créé avec succès.");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View 
    {
        $blogPost = BlogPost::with(['user', 'categories'])->findOrFail($id);

        return view("admin.post.show", ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View 
    {
        $blogPost = BlogPost::with(['categories'])->findOrFail($id);

        return view("admin.post.edit", [
            'blogPost' => $blogPost,
            'options' => Category::orderBy('title')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, int $id): RedirectResponse
    {
        $blogPost = BlogPost::with(['categories'])->findOrFail($id);
        $blogPost->update($request->validated());
        $blogPost->categories()->sync($request->validated('categories'));

        return redirect()->route('admin.post.show', $blogPost)->with("success", "L'article a été modifié avec succès.");
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(int $id): View
    {
        $blogPost = BlogPost::findOrFail($id);

        return view('admin.post.delete', [
            'blogPost' => $blogPost,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        $blogPost->delete();
        
        return redirect()->route('admin.post.index')->with("success", "L'article a été supprimé avec succès.");
    }
}
