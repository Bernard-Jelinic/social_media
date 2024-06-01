<?php

namespace App\Livewire;

use App\Livewire\ChatConversationBase;

class Header extends ChatConversationBase
{
    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function render()
    {
        return view('livewire.header');
    }
}
