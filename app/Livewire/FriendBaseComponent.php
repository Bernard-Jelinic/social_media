<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\FriendStatus;

class FriendBaseComponent extends Component
{
    public function addFriend(array $user): void
    {
        auth()->user()->sentRequestTo()->attach($user['id']);
        $this->request_in_process = true;
    }

    public function addFriendAndRefresh(array $user): void
    {
        $this->addFriend($user);
        $this->get();
    }

    public function cancelFriendRequest(): void
    {
        auth()->user()->sentRequestTo()->detach($this->user_profile->id);
        $this->request_in_process = false;
    }

    public function acceptFriendRequest($sender_id): void
    {
        $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $sender_id)->first();
        if ($friend !== null) {
            $friend->pivot->status = FriendStatus::ACCEPTED->value;
            $friend->pivot->save();
        }
    }

    public function denyFriendRequest($sender_id): void
    {
        $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $sender_id)->first();
        if ($friend !== null) {
            $friend->pivot->delete();
        }
    }
}
