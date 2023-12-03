<?php

namespace App\Livewire;

use Livewire\Component;

class FriendManagementComponent extends Component
{
    public $user_profile;
    public $request_in_process = false;
    public $request_accepted = false;

    public function mount($user_profile): void
    {
        $this->user_profile = $user_profile;
        // $friend = auth()->user()->friends()->where('receiver_id', $user_profile->id)->first()->pivot;
        $friend = auth()->user()->friends()->withPivot('status_id')->where('receiver_id', $user_profile->id)->first();
        if ($friend !== null) {
            $friend = $friend->pivot;
            if ($friend->status_id == 10) {
                $this->request_in_process = true;
            } elseif ($friend->status_id == 20) {
                $this->$request_accepted = true;
            }
        }
    }

    public function addFriend(): void
    {
        auth()->user()->friends()->attach($this->user_profile->id);
        $this->request_in_process = true;
    }

    public function cancelRequest(): void
    {
        dd( 'cancelRequest' );
    }

    public function deleteFriend(): void
    {
        dd( 'deleteFriend' );
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.friend-management-component');
    }
}
