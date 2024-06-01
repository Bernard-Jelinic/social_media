<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Person;
use App\Models\ChatMessage;
use App\Models\ChatParticipant;
use App\Models\ChatConversation;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_messages_page_is_displayed(): void
    {
        $person_1 = Person::factory()->create();
        $person_2 = Person::factory()->create();

        // // Creating conversation
        $chat_conversation = ChatConversation::create();
        // // Creating participants
        $participants_1 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_1->id
        ]);
        $participants_2 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_2->id
        ]);
        // // Creating messages
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_1->id,
            'body' => 'Hello'
        ]);
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_2->id,
            'body' => 'Hello to you to'
        ]);

        $response = $this->actingAs($person_1)
                        ->get('/messages');

        $response->assertOk();
    }

    public function test_specific_message_page_is_displayed(): void
    {
        $person_1 = Person::factory()->create();
        $person_2 = Person::factory()->create();

        // // Creating conversation
        $chat_conversation = ChatConversation::create();
        // // Creating participants
        $participants_1 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_1->id
        ]);
        $participants_2 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_2->id
        ]);
        // // Creating messages
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_1->id,
            'body' => 'Hello'
        ]);
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_2->id,
            'body' => 'Hello to you to'
        ]);

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

        // // Creating conversation
        $chat_conversation = ChatConversation::create();
        // // Creating participants
        $participants_1 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_1->id
        ]);
        $participants_2 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_2->id
        ]);
        // // Creating messages
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_1->id,
            'body' => 'Hello'
        ]);
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_2->id,
            'body' => 'Hello to you to'
        ]);

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

        // // Creating conversation
        $chat_conversation = ChatConversation::create();
        // // Creating participants
        $participants_1 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_1->id
        ]);
        $participants_2 = ChatParticipant::create([
            'chat_conversation_id' => $chat_conversation->id,
            'user_id' => $person_2->id
        ]);
        // // Creating messages
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_1->id,
            'body' => 'Hello'
        ]);
        ChatMessage::create([
            'chat_conversation_id' => $chat_conversation->id,
            'chat_participant_id' => $participants_2->id,
            'body' => 'Hello to you to'
        ]);

        $this->actingAs($person_1)
            ->get('/messages/' . $chat_conversation->id)
            ->assertSeeText('Offline');
    }
}
