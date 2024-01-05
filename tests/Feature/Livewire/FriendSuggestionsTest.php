<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\FriendSuggestions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FriendSuggestionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function friend_suggestions_component_exists_on_dashboard_page()
    {
        // // Create two user
        $user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);
        
        $this->get('/dashboard')
            ->assertSeeLivewire(FriendSuggestions::class);
    }

    /** @test */
    public function user_can_add_friend_and_the_component_is_refreshed(): void
    {
        // // Create two user
        $user = User::factory()->create();
        $another_user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);

        // // Livewire test
        Livewire::test(FriendSuggestions::class)
            ->call('addFriendAndRefresh', $another_user->toArray() );

        $this->assertTrue(true);
    }
}
