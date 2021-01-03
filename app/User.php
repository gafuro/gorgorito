<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'description', 'email', 'password',
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

    public function tweets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getAvatarAttr($pixels = 40): string
    {
        return "https://i.pravatar.cc/$pixels?u=" . $this->email;
    }

    public function path(?string $profilePath = 'profile'): string
    {
        return route($profilePath, $this->id);
    }

}
