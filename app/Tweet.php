<?php

namespace App;

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
}
