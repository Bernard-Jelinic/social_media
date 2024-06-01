<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatMessage;
use App\Models\ChatParticipant;
use App\Models\ChatConversation;

class ChatConversationBase extends Component
{
    public $chat_conversations;
    public $total_number_of_unread_messages;
    
    public function refreshComponent(): void
    {
        $user_id = auth()->user()->id;
        $this->chat_conversations = ChatConversation::with([
            'messages' => function ($query) {
                // $query->orderBy('created_at', 'desc');
                // $query->limit(1);
                $query->with('chatParticipant.user');
            },
            'chatParticipants' => function($query) use ($user_id) {
                $query->where('user_id', $user_id);
            }
        ])
        ->whereHas('chatParticipants', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })
        ->get();

        $chat_participant_ids = ChatParticipant::where('user_id', auth()->user()->id)
                                            ->get('id')
                                            ->pluck('id')
                                            ->toArray();

        $this->total_number_of_unread_messages = ChatMessage::whereIn('chat_participant_id', $chat_participant_ids)
                                                        ->where('is_read', false)
                                                        ->count();
    }
}
