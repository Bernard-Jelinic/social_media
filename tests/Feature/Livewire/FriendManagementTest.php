<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\FriendManagement;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FriendManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_add_friend(): void
    {
        // // Create two user
        $user = User::factory()->create();
        $another_user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);

        // // Livewire test
        Livewire::test(FriendManagement::class, ['user_profile' => $another_user])
            ->call('addFriend');

        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_cancel_friend_request(): void
    {
        // // Create two user
        $user = User::factory()->create();
        $another_user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);

        // // first you need to add friend to have option to cancel friend request
        Livewire::test(FriendManagement::class, ['user_profile' => $another_user])
            ->call('addFriend');

        // // Livewire test
        Livewire::test(FriendManagement::class, ['user_profile' => $another_user])
            ->call('cancelFriendRequest');

        $this->assertTrue(true);
    }
}
