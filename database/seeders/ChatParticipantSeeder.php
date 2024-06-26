<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ChatParticipant;
use Illuminate\Database\Seeder;
use App\Models\ChatConversation;

class ChatParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chat_conversations = ChatConversation::get();
        $users = User::limit(4)->get();

        foreach ($chat_conversations as $chat_conversation) {
            foreach ($users as $user) {
                ChatParticipant::create([
                        'chat_conversation_id' => $chat_conversation->id,
                        'user_id' => $user->id
                        ]);
            }
        }
    }
}
