<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index', [
            'tags' => Tag::all()
        ]);

    }

    public function store()
    {
        $attributes = \request()->validate(
            [
                'name' => 'required|max:255',
                'code' => 'max:255',
                'description' => 'max:255'
            ]
        );

        $attributes['code'] = $attributes['code'] ? $attributes['code'] : str_replace(' ', '_', $attributes['name']);

        Tag::create($attributes);

        return redirect()->route('tags');

    }

    public function update(Tag $tag)
    {
        $tag->follow(auth()
            ->user());
        return back();

    }
}
