<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\User;

class FollowUserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function followedUsersGetNotification()
    {
        $authUser = User::create([
            'username' => 'u1',
            'name' => 'user 1',
            'email' => 'u1@test.com',
            'password' => Hash::make('password')
        ]);

        auth()->login($authUser);

        $user2 = User::create([
            'username' => 'u2',
            'name' => 'user 2',
            'email' => 'u2@test.com',
            'password' => Hash::make('password')
        ]);

        $authUser->follow($user2);

        $this->assertCount(1, $user2->notifications);

    }
}
