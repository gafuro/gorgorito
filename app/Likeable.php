<?php


namespace App;

use App\User;
use App\Tweet;
use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function scopeWithLikes(Builder $builder)
    {
        $sQuery = "
        SELECT
            tweet_id
            , SUM(liked) likes
            , SUM(! liked) dislikes
            , COUNT(tweet_id) votes
        FROM likes
        GROUP BY tweet_id";
        $builder->leftJoinSub($sQuery, 'likes', 'likes.tweet_id', 'tweets.id');
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(?User $user = null, $liked = true): bool
    {
        if (!$user) {
            $user = auth()->user();
        }

        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', $liked)
            ->count();
    }

    public function like($liked = true, ?User $user = null):void
    {
        $user = empty($user) ? auth()->user() : $user;

        if ($this->isLikedBy($user, $liked)) {
            $this->likes()->where('user_id', $user->id)->delete();
            return;
        }

        $this->likes()->updateOrCreate([
            'user_id' => $user->id], [
            'liked' => $liked
        ]);
    }

}
