<?php

namespace App\Livewire;

use App\Livewire\FriendBaseComponent;
use Illuminate\View\View;
use App\Enums\FriendStatus;

class FriendManagement extends FriendBaseComponent
{
    public $user_profile;
    public $request_in_process = false;
    public $request_accepted = false;
    public $is_this_sent_request = false;

    public function mount($user_profile): void
    {
        $this->user_profile = $user_profile;
        $friend = auth()->user()->sentRequestTo()->withPivot('status')->where('receiver_id', $user_profile->id)->first();
        if ($friend !== null) {
            $friend = $friend->pivot;
            $this->is_this_sent_request = true;
            if ($friend->status == FriendStatus::IN_PROCESS->value) {
                $this->request_in_process = true;
            } else if($friend->status == FriendStatus::ACCEPTED->value){
                $this->request_accepted = true;
            }
        } else {
            $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $user_profile->id)->first();
            if ($friend !== null) {
                $friend = $friend->pivot;
                if ($friend->status == FriendStatus::IN_PROCESS->value) {
                    $this->request_in_process = true;
                } else if($friend->status == FriendStatus::ACCEPTED->value){
                    $this->request_accepted = true;
                }
            }
        }
    }

    public function render(): View
    {
        return view('livewire.friend-management');
    }
}
