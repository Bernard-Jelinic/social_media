<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Enums\FriendStatus;

class FriendRequest extends Component
{
    public $friendRequests = array();

    public function mount(): void
    {
        $this->friendRequests = auth()->user()->receivedRequestFrom()->get();
    }

    public function confirm($sender_id): void
    {
        $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $sender_id)->first();
        if ($friend !== null) {
            $friend->pivot->status = FriendStatus::ACCEPTED->value;
            $friend->pivot->save();
        }
    }

    public function remove($sender_id): void
    {
        $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $sender_id)->first();
        if ($friend !== null) {
            $friend->pivot->delete();
        }
    }

    public function render(): View
    {
        return view('livewire.friend-request');
    }
}
