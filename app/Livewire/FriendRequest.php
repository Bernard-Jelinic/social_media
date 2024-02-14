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
        $this->get();
    }

    public function get(): void
    {
        $this->friendRequests = auth()->user()->receivedRequestFrom()->where('status', 10)->get();
    }

    public function render(): View
    {
        return view('livewire.friend-request');
    }
}
