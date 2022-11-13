<?php


namespace App\Http\Controllers\Personal\Comments;


use App\Http\Controllers\Controller;
use App\Models\Comment;

class EditController extends Controller
{
    public function __invoke(Comment $comments)
    {
        return view('personal.comments.edit', compact('comments'));
    }
}
