<?php

namespace App\Livewire;

use App\Models\User;
use App\Livewire\FriendBaseComponent;
use App\Models\Person;
use App\Models\Page;
use Illuminate\View\View;
use App\Enums\FriendStatus;

class FriendManagement extends FriendBaseComponent
{
    public $user_profile;
    public $request_in_process = false;
    public $request_accepted = false;
    public $is_this_sent_request = false;
    public $number_of_friends = 0;
    public $model = User::class;

    public function mount($user_profile): void
    {
        $this->user_profile = $user_profile;
        $this->refreshComponent();
    }

    public function refreshComponent(): void
    {
        $this->request_in_process = false;
        $this->request_accepted = false;
        $this->is_this_sent_request = false;

        if ($this->user_profile->is_page){
            $this->model = Page::class;
        } else {
            $this->model = Person::class;
            $this->number_of_friends = count($this->model::friends($this->user_profile->id));
        }

        $friend = auth()->user()->sentRequestTo()->withPivot('status')->where('receiver_id', $this->user_profile->id)->first();
        if ($friend !== null) {
            $friend = $friend->pivot;
            $this->is_this_sent_request = true;
            if ($friend->status == FriendStatus::IN_PROCESS->value) {
                $this->request_in_process = true;
            } else if($friend->status == FriendStatus::ACCEPTED->value){
                $this->request_accepted = true;
            }
        } else {
            $friend = auth()->user()->receivedRequestFrom()->withPivot('status')->where('sender_id', $this->user_profile->id)->first();
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
