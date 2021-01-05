<?php


namespace App;

use App\Notifications\Followed;
use App\User;

trait Followable
{

    public function isFollowing(User $user): bool
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows(): ?\Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        if (!$this->id) {
            return null;
        }
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow(User $user): \Illuminate\Database\Eloquent\Model
    {
        $user->notify(new Followed($user->username));
        return $this->follows()->save($user);
    }

    public function unfollow(User $user): int
    {
        return $this->follows()->detach($user);
    }
}
