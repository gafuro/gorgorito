<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{
    public function __invoke()
    {
        $users = [auth()->user()->id];
//        $users->push(User::where); todo, remove friends
        return view('explore.index', [
            'users'=>User::whereNotIn('id', $users)->paginate(50),
        ]);
    }
}
