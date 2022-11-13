<?php

namespace App\Http\Controllers\Blog\Likes;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->GetLikedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
