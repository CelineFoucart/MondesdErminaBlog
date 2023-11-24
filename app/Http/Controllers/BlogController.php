<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Requests\SearchRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogController extends Controller
{
    public function index(SearchRequest $searchRequest): View
    {
        return view('blog.index', [
            'blogPosts' => $this->getBlogPostPaginated($searchRequest)
        ]);
    }

    public function show(BlogPost $blogPost): View
    {
        return view('blog.show', [
            'blogPost' => $blogPost,
        ]);
    }

    public function category(SearchRequest $searchRequest, Category $category): View
    {        
        return view('blog.category', [
            'blogPosts' => $this->getBlogPostPaginated($searchRequest, $category),
            'category' => $category,
        ]);
    }

    private function getBlogPostPaginated(SearchRequest $searchRequest, ?Category $category = null): LengthAwarePaginator
    {
        $categoryId = ($category !== null) ? $category->id : null;
        $query = BlogPost::query();

        if ($categoryId !== null) {
            $query->whereRelation('categories', 'id', '=', $categoryId)->get();
        }

        if ($searchRequest->validated('title')) {
            $query = $query->andWhere('title', 'like', "%{$searchRequest->validated('title')}%");
        }

        if ($searchRequest->validated('perPage')) {
            $perPage = (int) $searchRequest->validated('perPage');
        } else {
            $perPage = Controller::PER_PAGE;
        }

        return $query->recent()->paginate($perPage);
    }
}
