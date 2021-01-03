<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()
            ->user()
            ->follow($user);
        return back();
    }

    public function delete(User $user)
    {
        auth()
            ->user()
            ->unfollow($user);
        return back();

    }

    public function update(User $user)
    {
        auth()
            ->user()
            ->toggleFollow($user);
        return back();
    }
}
