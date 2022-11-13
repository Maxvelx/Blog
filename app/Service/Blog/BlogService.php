<?php


namespace App\Service\Blog;


use App\Models\Post;
use App\Models\Tag;

class BlogService
{
    public function getNextPost($posts)
    {
        return Post::where('id', '>', $posts->id)
            ->orderBy('id', 'ASC')
            ->first();
    }

    public function getPrevPost($posts)
    {
        return Post::where('id', '<', $posts->id)
            ->orderBy('id', 'DESC')
            ->first();
    }

    public function getRelatedPost($posts)
    {
        return Post::where('category_id', '=', $posts->category_id)
            ->get()
            ->take(12);
    }
}
