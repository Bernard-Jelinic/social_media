<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Person;
use App\Livewire\AllChatConversations;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AllChatConversationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function all_chat_conversations_component_exists_on_messages_page(): void
    {
        // // Create two users
        $person_1 = Person::factory()->create();
        $person_2 = Person::factory()->create();

        $participants = [$person_1, $person_2];
        $conversation = Chat::createConversation($participants)->makeDirect();

        Chat::message('Hello')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to')->from($person_2)->to($conversation)->send();

        // // Acting as the authenticated user
        $this->actingAs($person_1);

        $this->get('/messages')
                ->assertSeeLivewire(AllChatConversations::class);
    }
}
