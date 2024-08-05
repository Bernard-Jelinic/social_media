<?php

namespace App\Livewire;

use App\Events\UserEvent;
use App\Traits\PostTrait;
use App\Livewire\ChatConversationBase;

class Header extends ChatConversationBase
{
    use PostTrait;

    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function changeIsOnlineStatusToOnline(): void
    {
        auth()->user()->is_online = true;
        auth()->user()->update();
        event(new UserEvent(auth()->user()->id));
    }

    public function changeIsOnlineStatusToOffline(): void
    {
        auth()->user()->is_online = false;
        auth()->user()->update();
        event(new UserEvent(auth()->user()->id));
    }

    public function clearAll()
    {
        auth()->user()->unreadNotifications()->update(['read_at' => now()]);
    }

    public function render()
    {
        return view('livewire.header');
    }
}
