<?php

namespace App\Livewire;

use Livewire\Component;
use Musonza\Chat\Models\Conversation;
use Illuminate\Http\Request;

class Header extends Component
{
    public $conversations;

    public function mount()
    {
        $participant = auth()->user(); // Replace $participantId with actual ID

        $this->conversations = Conversation::whereHas('messages', function ($query) use ($participant) {
            $query->where('participation_id', $participant->id); // Adjust based on participant model
        })->latest('updated_at')->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.header');
    }
}
