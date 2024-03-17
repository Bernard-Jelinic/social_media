<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Person;
use App\Livewire\Header;
use Musonza\Chat\Facades\ChatFacade as Chat;
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
        $person_3 = Person::factory()->create();
        $person_4 = Person::factory()->create();
        $person_5 = Person::factory()->create();
        $person_6 = Person::factory()->create();

        // // Creating messages
        $participants_1_2 = [$person_1, $person_2];
        $conversation_1_2 = Chat::createConversation($participants_1_2)->makeDirect();
        $chat_1_2 = Chat::message('Hello from person_1 to person_2')->from($person_1)->to($conversation_1_2)->send();
        $chat_1_2 = Chat::message('Hello to you to from person_2 to person_1')->from($person_2)->to($conversation_1_2)->send();

        $participants_1_3 = [$person_1, $person_3];
        $conversation_1_3 = Chat::createConversation($participants_1_3)->makeDirect();
        $chat_1_3 = Chat::message('Hello from person_1 to person_3')->from($person_1)->to($conversation_1_3)->send();
        $chat_1_3 = Chat::message('Hello to you to from person_3 to person_1')->from($person_3)->to($conversation_1_3)->send();

        $participants_1_4 = [$person_1, $person_4];
        $conversation_1_4 = Chat::createConversation($participants_1_4)->makeDirect();
        $chat_1_4 = Chat::message('Hello from person_1 to person_4')->from($person_1)->to($conversation_1_4)->send();
        $chat_1_4 = Chat::message('Hello to you to from person_4 to person_1')->from($person_4)->to($conversation_1_4)->send();
    
        $participants_1_5 = [$person_1, $person_5];
        $conversation_1_5 = Chat::createConversation($participants_1_5)->makeDirect();
        $chat_1_5 = Chat::message('Hello from person_1 to person_5')->from($person_1)->to($conversation_1_5)->send();
        $chat_1_5 = Chat::message('Hello to you to from person_5 to person_1')->from($person_5)->to($conversation_1_5)->send();
    
        $participants_1_6 = [$person_1, $person_6];
        $conversation_1_6 = Chat::createConversation($participants_1_6)->makeDirect();
        $chat_1_6 = Chat::message('Hello from person_1 to person_6')->from($person_1)->to($conversation_1_6)->send();
        $chat_1_6 = Chat::message('Hello to you to from person_6 to person_1')->from($person_6)->to($conversation_1_6)->send();

        // // Acting as the authenticated user
        $this->actingAs($person_1);

        $this->get('/dashboard')
            // ->assertSee('a')
            ->assertSeeText('Hello to you to from person_2 to person_1');
            // ->assertSeeText('Hello to you to from person_6 to person_1');

    }
}
