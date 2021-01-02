<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function follows()
    {
        if (!$this->id) {
            return null;
        }
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function timeline()
    {
        if (!$this->id) {
            return Tweet::latest()->get();
        }

        return Tweet::whereIn('user_id', $this->follows()->pluck('id'))
            ->orWhere('user_id', $this->id)
            ->latest()
            ->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function getAvatarAttr($pixels = 40)
    {
        return "https://i.pravatar.cc/$pixels?u=" . $this->email;
    }

}
