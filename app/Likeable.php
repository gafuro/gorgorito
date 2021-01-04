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

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(?User $user = null, $liked = true)
    {
        if (!$user) {
            $user = auth()->user();
        }

        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', $liked)
            ->count();
    }

    public function like($liked = true, ?User $user = null)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()], [
            'liked' => $liked
        ]);
    }

}
