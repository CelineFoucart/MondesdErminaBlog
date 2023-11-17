<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

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
        $total = Comment::query()->where('blog_post_id', '=', $blogPost->id)->where('is_validated', '=', true)->count();

        return CommentResource::collection(
            Comment::with('user')
            ->limit(self::LIMIT)
            ->offset($offset)
            ->orderBy('created_at', 'desc')
            ->where('blog_post_id', '=', $blogPost->id)
            ->where('is_validated', '=', true)
            ->get()
        )->additional(['meta' => ['limit' => $limit, 'offset' => (int) $offset, 'total' => $total]]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPost $blogPost, CommentRequest $request): CommentResource
    {        
        $comment = new Comment([
            'is_validated' => false,
            'content' => $request->validated()['content'],
        ]);
        $comment->blog_post_id = $blogPost->id;
        $comment->user_id = $request->user()->id;
        $comment->save();

        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment): CommentResource
    {
        $this->canAccess($comment);
        $comment->update($request->validated());

        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): ?bool
    {
        $this->canAccess($comment);

        try {
            return $comment->delete();
        } catch (\LogicException $th) {
            return false;
        }
    }

    /**
     * Check if the user is the author.
     *
     * @throws HttpResponseException
     */
    private function canAccess(Comment $comment): void
    {
        $currentUser = auth()->user();

        if ($currentUser->id !== $comment->user->id) {
            abort(Response::HTTP_UNAUTHORIZED);
        }
    }
}
