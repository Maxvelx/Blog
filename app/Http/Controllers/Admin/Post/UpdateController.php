<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $posts)
    {
        $data = $request->validated();
        $this->service->update($data,$posts);

        return redirect()->route('admin.posts.index');
    }
}
