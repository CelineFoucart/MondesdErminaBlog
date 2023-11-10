<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CommentController extends Controller
{
    public const LIMIT = 10;

    /**
     * Display a listing of the blog post comments.
     */
    public function index(BlogPost $blogPost, Request $request): AnonymousResourceCollection
    {
        $offset = $request->query('offset', 0);
        $limit = $request->query('limit', self::LIMIT);
        $total = Comment::query()->where('blog_post_id', '=', $blogPost->id)->count();

        return CommentResource::collection(
            Comment::with('user')
            ->limit(self::LIMIT)
            ->offset($offset)
            ->orderBy('created_at', 'desc')
            ->where('blog_post_id', '=', $blogPost->id)
            ->get()
        )->additional(['meta' => ['limit' => $limit, 'offset' => $offset, 'total' => $total]]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPost $blogPost, Request $request)
    {
        //

        // return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
