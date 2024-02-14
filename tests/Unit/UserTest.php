<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_friends_returns_existing_friends()
    {
        // Create two users and make them friends (status 20)
        $user = User::factory()->create();
        $friend1 = User::factory()->create();
        $friend2 = User::factory()->create();

        $user->receivedRequestFrom()->attach($friend1, ['status' => 20]);
        $user->receivedRequestFrom()->attach($friend2, ['status' => 20]);

        // Call the method
        $friends = User::friends($user->id);

        // Assert that the correct number of friends are returned
        $this->assertCount(2, $friends);
    }

    public function test_friends_returns_empty_collection_with_no_friends()
    {
        // Create a user
        $user = User::factory()->create();

        // Call the method
        $friends = User::friends($user->id);

        // Assert that an empty collection is returned
        $this->assertEmpty($friends);
    }
}
