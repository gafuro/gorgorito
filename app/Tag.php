<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tag extends Model
{
    use Followable;

    protected $guarded = [];

    public function uniqueTag($faker, $code = false)
    {
        do {
            $wordQty = rand(1, 3);
            $uniqueString = $code ? str_replace(' ', '_', $faker->words($wordQty, true)) : $faker->words($wordQty, true);
        } while (Tag::where($code ? 'code' : 'name', $uniqueString)->exists());
        return $uniqueString;
    }
}
