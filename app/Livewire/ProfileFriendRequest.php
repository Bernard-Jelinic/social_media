<?php

namespace App\Livewire;

use App\Livewire\FriendBaseComponent;
use Illuminate\View\View;

class ProfileFriendRequest extends FriendBaseComponent
{
    public $friendRequests = array();

    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function refreshComponent(): void
    {
        $this->friendRequests = auth()->user()->receivedRequestFrom()->where('status', 10)->get();
    }

    public function render(): View
    {
        return view('livewire.profile-friend-request');
    }
}
