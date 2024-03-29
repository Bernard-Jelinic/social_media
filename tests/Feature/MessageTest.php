<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Person;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_messages_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/messages');

        $response->assertOk();
    }

    public function test_specific_message_page_is_displayed(): void
    {
        $person_1 = Person::factory()->create();
        $person_2 = Person::factory()->create();

        $participants = [$person_1, $person_2];
        $conversation = Chat::createConversation($participants)->makeDirect();

        Chat::message('Hello')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to')->from($person_2)->to($conversation)->send();

        $response = $this
            ->actingAs($person_1)
            ->get('/messages/' . $person_1->id);

        $this->assertTrue(true);
    }
}
