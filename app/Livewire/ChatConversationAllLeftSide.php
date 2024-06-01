<?php

namespace App\Livewire;

use App\Livewire\ChatConversationBase;

class ChatConversationAllLeftSide extends ChatConversationBase
{
    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function render()
    {
        return view('livewire.chat-conversation-all-left-side');
    }
}
