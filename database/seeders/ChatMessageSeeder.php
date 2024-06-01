<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use Illuminate\Database\Seeder;
use App\Models\ChatConversation;
use App\Models\ChatParticipant;

class ChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chat_conversations = ChatConversation::get();
        foreach ($chat_conversations as $chat_conversation) {
            $chat_participants = ChatParticipant::where('chat_conversation_id', $chat_conversation->id)->get();
            foreach ($chat_participants as $chat_participant) {
                ChatMessage::create([
                    'chat_conversation_id' => $chat_participant->chat_conversation_id,
                    'chat_participant_id' => $chat_participant->id,
                    'body' => 'Hello_' . $chat_participant->id
                ]);
            }
        }
    }
}
