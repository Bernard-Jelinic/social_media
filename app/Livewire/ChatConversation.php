<?php

namespace App\Livewire;

use Musonza\Chat\Models\Conversation;
use Livewire\Component;
use Illuminate\Http\Request;

class ChatConversation extends Component
{
    public $selected_conversation;
    public $selected_participant;
    public $is_message_exist = false;

    public function mount(Request $request): void
    {

        if ($request->route('conversation_id')) {
            $conversation = Conversation::find($request->route('conversation_id'));
        } else {
            $participantId = auth()->user()->id;

            $conversation = Conversation::whereHas('messages', function ($query) use ($participantId) {
                $query->where('participation_id', $participantId);
            })->latest('updated_at')->first();
    
            if ($conversation) {
                $messages = $conversation->messages()->orderBy('created_at', 'asc')->get();
                $conversation = Conversation::find($conversation->id);
                // Process messages as shown previously
                $this->is_message_exist = true;
            } else {
                // Handle the case where no conversation is found for the participant
            }
        }

        if ($this->is_message_exist) {
            $this->selected_conversation = $conversation->messages()->orderBy('created_at', 'asc')->get();
    
            foreach ($this->selected_conversation as $conversation) {
                if ( auth()->user()->id !== $conversation->id ) {
                    $this->selected_participant = \App\Models\User::find($conversation->id);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.chat-conversation');
    }
}
