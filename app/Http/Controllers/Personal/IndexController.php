<?php


namespace App\Http\Controllers\Personal;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['CommentsCount'] = auth()->user()->GetComments->count();
        $data['LikedCount'] = auth()->user()->GetLikedPosts->count();


        return view('personal.main.main', compact('data'));
    }
}
