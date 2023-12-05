<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'first_name' => 'Bernard',
                'last_name' => 'Jelinić',
                'email' => 'jelinic.bernard@gmail.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame('Bernard', $user->first_name);
        $this->assertSame('jelinic.bernard@gmail.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'first_name' => 'Bernard_2',
                'last_name' => 'Jelinić_2',
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($user->fresh());
    }

    public function test_user_can_see_section_for_upload_profile_image(): void
    {
        // Create a user
        $user = User::factory()->create();

        // Acting as the authenticated user
        $this->actingAs($user);

        $this->get('/profile')
            ->assertSee('a', 'id', 'uploadImageLink')
            ->assertSeeText('Save profile picture');
    }

    public function test_user_can_not_see_section_for_upload_profile_image_of_another_profile(): void
    {
        // Create a user
        $user = User::factory()->create();
        $another_user = User::factory()->create();

        // Acting as the authenticated user
        $this->actingAs($user);

        $this->get('/profile/' . $another_user->id)
            ->assertSee('a', 'id', 'uploadImageLink', false)
            ->assertDontSeeText('Save profile picture');
    }

    public function test_user_can_see_section_for_adding_friend(): void
    {
        // // Create two user
        $user = User::factory()->create();
        $another_user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);

        $this->get('/profile/' . $another_user->id)
            ->assertSee('a')
            ->assertSeeText('Add Friend');
    }

    public function test_user_can_see_section_for_cancel_friend_request(): void
    {
        // // Create two user
        $user = User::factory()->create();
        $another_user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);

        // // Creating relationship sentRequestTo
        $user->sentRequestTo()->attach($another_user->id);

        $evo_ga = $user->sentRequestTo()->withPivot('status')->where('receiver_id', $another_user->id)->first();

        $this->get('/profile/' . $another_user->id)
            ->assertSee('a')
            ->assertSeeText('Cancel Request');
    }
}
