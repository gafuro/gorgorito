<?php


namespace App;

use App\Notifications\Followed;
use App\User;
use App\Tag;

trait Followable
{

    public function isFollowing($entity): bool
    {
        return $this->follows()
            ->where('followable_id', $entity->id)
            ->where('followable_type', get_class($entity))
            ->exists();
    }

    public function isFollowedBy(User $user): bool
    {
        return $this->followers()
            ->where('user_id', $user->id)
            ->exists();
    }

    public function follows(): ?\Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->morphedByMany(User::class, 'followable')->withTimestamps();
    }

    public function follow($entity): \Illuminate\Database\Eloquent\Model
    {
        if($this instanceof User ){
            $entity->notify(new Followed($entity->username));
            return $this->follows()->save($entity);
        }
        return $this->followers()->save($entity);
    }

    public function unfollow($entity): int
    {
        if($this instanceof User ){
            return $this->follows()->detach($entity);
        }
        return $this->followers()->detach($entity);
    }

    public function followers(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(User::class, 'followable')->withTimestamps();
    }

}
