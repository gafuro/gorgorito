<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{
    public function __invoke()
    {
        $users = [auth()->user()->id];
        return view('explore.index', [
            'users'=>User::whereNotIn('id', $users)->paginate(50),
        ]);
    }
}
