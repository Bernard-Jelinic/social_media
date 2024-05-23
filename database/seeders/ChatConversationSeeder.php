<?php

namespace Database\Seeders;

use App\Models\ChatConversation;
use Illuminate\Database\Seeder;

class ChatConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatConversation::create();
        ChatConversation::create();
        ChatConversation::create();
    }
}
