<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Tweet;

class UserLikesTweetTest extends TestCase
{
    use DatabaseMigrations, WithFaker, RefreshDatabase;

    /** @test */
    public function userLikesATweet()
    {
        $this->withoutExceptionHandling();

        $authorUser = factory('App\User')->create();

        $tweet = factory('App\Tweet')->create();

        $authUser = factory('App\User')->create();

        auth()->login($authUser);

        $this->post(route('like', $tweet), ['like' => true])->assertRedirect();
        
        $this->assertCount(1, $tweet->likes);

    }
}
