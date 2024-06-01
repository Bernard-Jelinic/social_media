<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Person;
use App\Livewire\Header;
use App\Models\ChatMessage;
use App\Models\ChatParticipant;
use App\Models\ChatConversation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HeaderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function header_livewire_component_exists_on_dashboard_page()
    {
        // // Create two users
        $person = Person::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($person);

        $this->get('/dashboard')
            ->assertSeeLivewire(Header::class);

    }

    /** @test */
    public function header_message_display_correct_number_of_messages()
    {
        // // Create users
        $person_1 = Person::factory()->create();
        $person_2 = Person::factory()->create();

        // // Creating conversation
        $conversation_1_2 = ChatConversation::create();
        // // Creating participants
        $participants_1 = ChatParticipant::create([
            'chat_conversation_id' => $conversation_1_2->id,
            'user_id' => $person_1->id
        ]);
        $participants_2 = ChatParticipant::create([
            'chat_conversation_id' => $conversation_1_2->id,
            'user_id' => $person_2->id
        ]);
        // // Creating messages
        ChatMessage::create([
            'chat_conversation_id' => $conversation_1_2->id,
            'chat_participant_id' => $participants_1->id,
            'body' => 'Hello from person_1 to person_2'
        ]);
        ChatMessage::create([
            'chat_conversation_id' => $conversation_1_2->id,
            'chat_participant_id' => $participants_2->id,
            'body' => 'Hello to you to from person_2 to person_1'
        ]);

        // // Acting as the authenticated user
        $this->actingAs($person_1);

        $this->get('/dashboard')
            // ->assertSee('a')
            ->assertSeeText('Hello to you to from person_2 to person_1');
            // ->assertSeeText('Hello to you to from person_6 to person_1');

    }
}
