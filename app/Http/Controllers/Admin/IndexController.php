<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $data                    = [];
        $data['postsCount']      = Post::all()->count();
        $data['tagsCount']       = Tag::all()->count();
        $data['usersCount']      = User::all()->count();
        $data['categoriesCount'] = Category::all()->count();


        return view('admin.main.main', compact('data'));
    }
}
