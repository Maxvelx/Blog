<?php

namespace App\Http\Controllers\Blog\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = Post::where('category_id', '=', $category->id)
        ->get();

        return view('site.blog.category.index', compact('posts', 'category'));
    }
}
