<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\User;

class FollowUserTest extends TestCase
{
    use DatabaseMigrations, WithFaker, RefreshDatabase;

    /** @test */
    function followedUsersGetNotification()
    {
        $authUser = User::create([
            'username' => $this->faker->userName,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('password')
        ]);

        auth()->login($authUser);

        $user2 = User::create([
            'username' => $this->faker->userName,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('password')
        ]);

        $this->post(route('follow',$user2));

        $this->assertCount(1, $user2->notifications);

    }
}
