<?php

namespace App\Livewire;

use App\Livewire\ChatBaseComponent;

class LeftSideAllChatConversations extends ChatBaseComponent
{
    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function render()
    {
        return view('livewire.left-side-all-chat-conversations');
    }
}
