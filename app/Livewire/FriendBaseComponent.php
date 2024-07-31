<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\FriendStatus;
use App\Events\FriendRequestEvent;

class FriendBaseComponent extends Component
{
    public function addFriend(array $user): void
    {
        auth()->user()->sentRequestTo()->attach($user['id']);
        $this->request_in_process = true;

        event(new FriendRequestEvent(auth()->user()->id));
        event(new FriendRequestEvent($user['id']));
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

        event(new FriendRequestEvent(auth()->user()->id));
        event(new FriendRequestEvent($this->user_profile->id));
    }

    public function acceptFriendRequest(int $sender_id): void
    {
        $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $sender_id)->first();
        if ($friend !== null) {
            $friend->pivot->status = FriendStatus::ACCEPTED->value;
            $friend->pivot->save();
        }

        event(new FriendRequestEvent(auth()->user()->id));
        event(new FriendRequestEvent($sender_id));
    }

    public function denyFriendRequest(int $sender_id): void
    {
        $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $sender_id)->first();
        if ($friend !== null) {
            $friend->pivot->delete();
        }

        event(new FriendRequestEvent(auth()->user()->id));
        event(new FriendRequestEvent($sender_id));
    }

    public function deleteFriendRequest(int $receiver_or_sender_id): void
    {
        $response = auth()->user()->sentRequestTo()->detach($receiver_or_sender_id);
        if ($response == 0) {
            $test = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $receiver_or_sender_id)->first();
            if ($test !== null) {
                $test->pivot->delete();
            }
        }
        $this->request_in_process = false;

        event(new FriendRequestEvent(auth()->user()->id));
        event(new FriendRequestEvent($this->user_profile->id));
    }
}
