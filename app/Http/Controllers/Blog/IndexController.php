<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::paginate(9);
        return view('site.blog.index', compact('posts'));
    }
}
