<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Person;
use App\Models\ChatMessage;
use App\Models\ChatParticipant;
use App\Models\ChatConversation;
use App\Livewire\ChatConversationAllLeftSide;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChatConversationAllLeftSideTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function all_chat_conversations_component_exists_on_messages_page(): void
    {
        // // Create two users
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

        // // Acting as the authenticated user
        $this->actingAs($person_1);

        $this->get('/conversations/' . $chat_conversation->id)
                ->assertSeeLivewire(ChatConversationAllLeftSide::class);
    }
}
