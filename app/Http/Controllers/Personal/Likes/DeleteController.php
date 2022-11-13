<?php


namespace App\Http\Controllers\Personal\Likes;


use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke($likedPost)
    {
        auth()->user()->GetLikedPosts()->detach($likedPost);

        return redirect()->route('personal.likes.index');
    }
}
