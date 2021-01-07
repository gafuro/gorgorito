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

    public function follows(): ?\Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->morphedByMany(User::class, 'followable')->withTimestamps();
    }

    public function follow($entity): \Illuminate\Database\Eloquent\Model
    {
        if($entity instanceof User){
            $entity->notify(new Followed($entity->username));
        }
        return $this->follows()->save($entity);
    }

    public function unfollow($entity): int
    {
        return $this->follows()->detach($entity);
    }
}
