<?php


namespace App\Http\Controllers\Personal\Comments;


use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Comment $comments)
    {
        $data = $request->validated();
        $comments->update($data);
        return redirect()->route('personal.comments.index');
    }
}
