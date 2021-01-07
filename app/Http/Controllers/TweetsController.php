<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    const PAGINATION = 5;

    public function index()
    {
        return view('tweets.index',
            ['tweets' => auth()->user()->timeline()]
        );
    }

    public function store()
    {
        $attributes = \request()->validate(['body' => 'required|max:255']);

        $tweet = (new Tweet())->publish($attributes);

        return back();
    }
}
