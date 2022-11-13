<?php

namespace App\Http\Controllers\Blog\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\Blog\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $posts, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $posts->id;

        Comment::create($data);
        return redirect()->route('blog.show', $posts->id);
    }
}
