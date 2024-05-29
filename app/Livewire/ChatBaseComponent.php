<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatConversation;

class ChatBaseComponent extends Component
{
    public $conversations;
    
    public function refreshComponent(): void
    {
        $user_id = auth()->user()->id;
        $this->conversations = ChatConversation::with([
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
    }
}
