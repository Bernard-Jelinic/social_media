<?php

namespace App\Livewire;

use App\Livewire\FriendBaseComponent;
use Illuminate\View\View;
use App\Enums\FriendStatus;

class FriendRequest extends FriendBaseComponent
{
    public $friendRequests = array();

    public function mount(): void
    {
        $this->friendRequests = auth()->user()->receivedRequestFrom()->get();
    }

    public function render(): View
    {
        return view('livewire.friend-request');
    }
}
