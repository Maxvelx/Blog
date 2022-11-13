<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $users)
    {
        $data = $request->validated();

        User::find($users->id)->update($data);

        return redirect()->route('admin.users.index');
    }
}
