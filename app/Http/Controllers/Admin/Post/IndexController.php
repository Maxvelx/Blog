<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('admin.post.index', compact('posts','categories'));

    }
}
