<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes =
            \request()->validate([
                'username' => [
                    'string',
                    'required',
                    'max:255',
                    'alpha_dash',
                    Rule::unique('users')->ignore($user)
                ],
                'name' => ['string', 'required', 'max:255'],
                'email' => [
                    'string',
                    'required',
                    'email', 'max:255',
                    Rule::unique('users')->ignore($user)
                ],
                'description' => ['string', 'required'],
                'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
            ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user->update($attributes);

        return redirect($user->path());
    }
}
