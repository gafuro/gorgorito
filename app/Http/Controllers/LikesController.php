<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class LikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $attributes =
            \request()->validate([
                'like' => [
                    'required',
                    'boolean',
                ]
            ]);
        $tweet->like($attributes['like']);
        return back();
    }
}
