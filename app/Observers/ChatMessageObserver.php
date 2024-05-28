<?php

namespace App\Observers;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\ChatParticipant;

class ChatMessageObserver
{
    /**
     * Handle the ChatMessage "created" event.
     */
    public function created(ChatMessage $chatMessage): void
    {
        $chatParticipants = ChatParticipant::where('chat_conversation_id', $chatMessage->chat_conversation_id)
                                            ->get('user_id');

        foreach ($chatParticipants as $chatParticipant) {
            event(new MessageSent($chatParticipant->user_id));
        }
    }

    /**
     * Handle the ChatMessage "updated" event.
     */
    public function updated(ChatMessage $chatMessage): void
    {
        $chatParticipants = ChatParticipant::where('chat_conversation_id', $chatMessage->chat_conversation_id)
                                            ->get('user_id');

        foreach ($chatParticipants as $chatParticipant) {
            event(new MessageSent($chatParticipant->user_id));
        }
    }

    /**
     * Handle the ChatMessage "deleted" event.
     */
    public function deleted(ChatMessage $chatMessage): void
    {
        $chatParticipants = ChatParticipant::where('chat_conversation_id', $chatMessage->chat_conversation_id)
                                            ->get('user_id');

        foreach ($chatParticipants as $chatParticipant) {
            event(new MessageSent($chatParticipant->user_id));
        }
    }

    /**
     * Handle the ChatMessage "restored" event.
     */
    public function restored(ChatMessage $chatMessage): void
    {
        //
    }

    /**
     * Handle the ChatMessage "force deleted" event.
     */
    public function forceDeleted(ChatMessage $chatMessage): void
    {
        //
    }
}
