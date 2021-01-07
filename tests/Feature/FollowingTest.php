<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowingTest extends TestCase
{
    use DatabaseMigrations, WithFaker, RefreshDatabase;

    /** @test */
    public function toggle_follow_user()
    {
        $this->withoutExceptionHandling();

        $user1 = factory('App\User')->create();

        $this->actingAs($user1);

        $user2 = factory('App\User')->create();

        $this->post(route('follow', $user2))->assertRedirect();

        $this->assertCount(1, $user1->follows, 'user follow user');

        $this->assertTrue($user1->isFollowing($user2));

        $this->assertCount(1, $user2->notifications, 'user get notification for subscription');

        $this->actingAs($user2);

        $this->actingAs($user1);

        $this->post(route('unfollow', $user2))->assertRedirect();

        $this->assertFalse($user1->isFollowing($user2), 'user unfollow user');
    }

    /** @test */
    public function toggle_follow_tag()
    {
        $this->withoutExceptionHandling();

        $user1 = factory('App\User')->create();

        $tag = factory('App\Tag')->create();

        $this->actingAs($user1);

        $this->post(route('toggle_follow_tag', $tag))->assertRedirect();

        $this->assertTrue($tag->isFollowedBy($user1));
    }

}
