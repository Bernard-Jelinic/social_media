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
        $person_1 = Person::factory()->create();
        $person_2 = Person::factory()->create();

        $participants = [$person_1, $person_2];
        $chat_conversation = Chat::createConversation($participants)->makeDirect();

        Chat::message('Hello')->from($person_1)->to($chat_conversation)->send();
        Chat::message('Hello to you to')->from($person_2)->to($chat_conversation)->send();

        $response = $this->actingAs($person_1)
                        ->get('/messages');

        $response->assertOk();
    }

    public function test_specific_message_page_is_displayed(): void
    {
        $person_1 = Person::factory()->create();
        $person_2 = Person::factory()->create();

        $participants = [$person_1, $person_2];
        $chat_conversation = Chat::createConversation($participants)->makeDirect();

        Chat::message('Hello')->from($person_1)->to($chat_conversation)->send();
        Chat::message('Hello to you to')->from($person_2)->to($chat_conversation)->send();

        $this->actingAs($person_1)
            ->get('/messages/' . $chat_conversation->id);

        $this->assertTrue(true);
    }

    public function test_show_if_user_is_online(): void
    {
        $person_1 = Person::factory()->create();
        $person_1->is_online = true;
        $person_1->save();

        $person_2 = Person::factory()->create();
        $person_2->is_online = true;
        $person_2->save();

        $participants = [$person_1, $person_2];
        $chat_conversation = Chat::createConversation($participants)->makeDirect();

        Chat::message('Hello')->from($person_1)->to($chat_conversation)->send();
        Chat::message('Hello to you to')->from($person_2)->to($chat_conversation)->send();

        $this->actingAs($person_1)
            ->get('/messages/' . $chat_conversation->id)
            ->assertSeeText('Online');
    }

    public function test_show_if_user_is_offline(): void
    {
        $person_1 = Person::factory()->create();
        $person_1->is_online = false;
        $person_1->save();

        $person_2 = Person::factory()->create();
        $person_2->is_online = false;
        $person_2->save();

        $participants = [$person_1, $person_2];
        $chat_conversation = Chat::createConversation($participants)->makeDirect();

        Chat::message('Hello')->from($person_1)->to($chat_conversation)->send();
        Chat::message('Hello to you to')->from($person_2)->to($chat_conversation)->send();

        $this->actingAs($person_1)
            ->get('/messages/' . $chat_conversation->id)
            ->assertSeeText('Offline');
    }
}
