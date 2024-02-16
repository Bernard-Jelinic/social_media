<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Page;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_global_scope_is_page_is_implemented()
    {
        // Create persons with is_page=true and is_page=false
        $validPerson = Person::factory()->create();
        $invalidPerson = Page::factory()->create();

        // Apply the scope
        $persons = Person::all();

        // Assert that only the valid page is included
        $this->assertCount(1, $persons);
        $this->assertTrue($persons->first()->is($validPerson));
    }

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
        $this->assertTrue($friends->first()->is($friend1));
        $this->assertTrue($friends[1]->is($friend2));
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
        $this->assertTrue($friends->first()->is($friend1));
        $this->assertFalse($friends->first()->is($friend2));
    }
}
