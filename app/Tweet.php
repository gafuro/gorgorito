<?php

namespace App;

use App\Notifications\Mention;
use Illuminate\Database\Eloquent\Model;
use App\Likeable;

class Tweet extends Model
{
    use Likeable;

    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function publish(array $attributes)
    {
        //todo create service tweet publisher
        preg_match_all('/\@[^\s\.]+/', $attributes['body'], $matches);

        foreach ($matches as $match) {
            $user = User::where('username',str_replace('@','',$match))->first();
            if($user){
                $user->notify(new Mention());
            }
        }

        return Self::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

    }
}
