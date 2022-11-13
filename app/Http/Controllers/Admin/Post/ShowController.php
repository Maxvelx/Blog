<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $posts)
    {
        return view('admin.post.show', compact('posts'));
    }
}
