<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(SearchRequest $searchRequest): View
    {
        $query = BlogPost::query();

        if ($searchRequest->validated('title')) {
            $query = $query->where('title', 'like', "%{$searchRequest->validated('title')}%");
        }

        if ($searchRequest->validated('perPage')) {
            $perPage = (int) $searchRequest->validated('perPage');
        } else {
            $perPage = Controller::PER_PAGE;
        }

        return view('blog.index', [
            'blogPosts' => $query->recent()->paginate($perPage),
            'input' => $searchRequest->validated(),
            'perPageOptions' => [Controller::PER_PAGE, 20, 50, 70, 90],
            'categories' => Category::orderBy('title')->get(),
        ]);
    }

    public function show(BlogPost $blogPost): View
    {
        return view('blog.show');
    }

    public function category(Category $category): View
    {
        return view('blog.category');
    }
}
