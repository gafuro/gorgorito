<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowUserTest extends TestCase
{
    use DatabaseMigrations, WithFaker, RefreshDatabase;

    /** @test */
    public function followedUsersGetNotification()
    {
        $this->withoutExceptionHandling();

        $authUser = factory('App\User')->create();

        auth()->login($authUser);

        $user2 = factory('App\User')->create();

        $this->post(route('follow', $user2))->assertRedirect();

        $this->assertCount(1, $user2->notifications);

        auth()->logout();
        auth()->login($user2);

        $this->get(route('notifications'))->assertSee('Somebody is now following you');
    }
}
