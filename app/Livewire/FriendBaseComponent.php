<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\FriendStatus;

class FriendBaseComponent extends Component
{
    public function addFriend(): void
    {
        auth()->user()->sentRequestTo()->attach($this->user_profile->id);
        $this->request_in_process = true;
    }

    public function cancelFriendRequest(): void
    {
        auth()->user()->sentRequestTo()->detach($this->user_profile->id);
        $this->request_in_process = false;
    }

    public function acceptFriendRequest(): void
    {
        dd( 'acceptFriendRequest' );
    }

    public function deleteFriendRequest(): void
    {
        dd( 'deleteFriendRequest' );
    }

    // // ove funkcije ispod su iz friendRequest.php filea
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
}
