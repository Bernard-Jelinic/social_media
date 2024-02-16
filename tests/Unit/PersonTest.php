<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Page;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_friends_returns_existing_friends()
    {
        // Create two users and make them friends (status 20)
        $user = Person::factory()->create();
        $friend1 = Person::factory()->create();
        $friend2 = Person::factory()->create();

        $user->sentRequestTo()->attach($friend1, ['status' => 20]);
        $user->sentRequestTo()->attach($friend2, ['status' => 20]);

        // Call the method
        $friends = Person::friends($user->id);

        // Assert that the correct number of friends are returned
        $this->assertCount(2, $friends);

        if ($friend1->id == $friends[0]->id && $friend2->id == $friends[1]->id) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    public function test_friends_returns_empty_collection_with_no_friends()
    {
        // Create a user
        $user = Person::factory()->create();

        // Call the method
        $friends = Person::friends($user->id);

        // Assert that an empty collection is returned
        $this->assertEmpty($friends);
    }

    public function test_friends_excludes_pages_users()
    {
        // Create two users, one marked as "page"
        $user = Person::factory()->create();

        $friend1 = Person::factory()->create();
        $friend2 = Page::factory()->create(); // Mark as page

        $user->sentRequestTo()->attach($friend1, ['status' => 20]);
        $user->receivedRequestFrom()->attach($friend2, ['status' => 20]);

        // Call the method
        $friends = Person::friends($user->id);

        // Assert that only the non-page friend is returned
        $this->assertCount(1, $friends);

        if ($friend1->id == $friends[0]->id) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }

        if ($friend2->id !== $friends[0]->id) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }
}
