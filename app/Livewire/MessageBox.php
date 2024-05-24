<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatMessage;
use App\Models\ChatConversation;

class MessageBox extends Component
{
    public $conversation_id;
    public $chat_participant;
    public $messageText = '';

    public function mount($conversation_id)
    {
        $this->conversation_id = $conversation_id;
        $this->chat_participant = ChatConversation::getMyParticipantId($conversation_id);
    }

    public function sendMessage(): void
    {
        ChatMessage::create([
            'chat_conversation_id' => $this->conversation_id,
            'chat_participant_id' => $this->chat_participant->id,
            'body' => $this->messageText
        ]);

        $this->messageText = "";
    }

    public function render()
    {
        return view('livewire.message-box');
    }
}
