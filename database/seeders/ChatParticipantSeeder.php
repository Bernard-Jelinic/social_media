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
        $conversations = ChatConversation::get();
        $users = User::limit(4)->get();

        foreach ($conversations as $conversation) {
            foreach ($users as $user) {
                ChatParticipant::create([
                        'chat_conversation_id' => $conversation->id,
                        'user_id' => $user->id
                        ]);
            }
        }
    }
}
