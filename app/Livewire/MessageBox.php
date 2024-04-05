<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Person;
use App\Models\Page;
use Livewire\Component;
use Musonza\Chat\Facades\ChatFacade as Chat;

class MessageBox extends Component
{
    public $conversation_id;
    public $messageText = '';

    public function mount($conversation_id)
    {
        $this->conversation_id = $conversation_id;
    }

    public function sendMessage(): void
    {
        $conversation = Chat::conversations()->getById($this->conversation_id);

        $logged_in_user = User::find(auth()->user()->id);
        if ($logged_in_user->is_page == true) {
            $logged_in_model = Page::find($logged_in_user->id);
        } else{
            $logged_in_model = Person::find($logged_in_user->id);
        }

        Chat::message($this->messageText)
            ->from($logged_in_model)
            ->to($conversation)
            ->send();

        $this->messageText = "";
    }

    public function render()
    {
        return view('livewire.message-box');
    }
}
