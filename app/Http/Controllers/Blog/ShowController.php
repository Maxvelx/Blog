<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Service\Blog\BlogService;

class ShowController extends BaseController
{
    public function __invoke(Post $posts, BlogService $service)
    {
        $categories = Category::get();
        $relatedPost = $this->service->getRelatedPost($posts);
        $nextPost = $this->service->getNextPost($posts);
        $prevPost = $this->service->getPrevPost($posts);
        return view('site.blog.show', compact('posts', 'categories','nextPost', 'prevPost', 'relatedPost'));
    }
}
