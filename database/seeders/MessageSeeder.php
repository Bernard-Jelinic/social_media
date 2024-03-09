<?php

namespace Database\Seeders;

use App\Models\Person;
use Musonza\Chat\Facades\ChatFacade as Chat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $person_1 = Person::first();
        $person_2 = Person::latest()->first();

        $participants = [$person_1, $person_2];
        $conversation = Chat::createConversation($participants)->makeDirect();

        Chat::message('Hello')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to')->from($person_2)->to($conversation)->send();
        Chat::message('Hello_1')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to_1')->from($person_2)->to($conversation)->send();
        Chat::message('Hello_2')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to_2')->from($person_2)->to($conversation)->send();
        Chat::message('Hello_3')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to_3')->from($person_2)->to($conversation)->send();
        Chat::message('Hello_4')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to_4')->from($person_2)->to($conversation)->send();
        Chat::message('Hello_5')->from($person_1)->to($conversation)->send();
        Chat::message('Hello to you to_5')->from($person_2)->to($conversation)->send();
    }
}
