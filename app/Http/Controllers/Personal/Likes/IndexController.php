<?php


namespace App\Http\Controllers\Personal\Likes;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $likedPosts = auth()->user()->GetLikedPosts;
        return view('personal.likes.index', compact('likedPosts' ));
    }
}
