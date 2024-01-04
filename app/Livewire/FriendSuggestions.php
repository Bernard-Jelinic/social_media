<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FriendSuggestions extends Component
{
    public $suggestions;

    public function mount(): void
    {
        $currentUser = auth()->user();
        $this->suggestions = User::whereNotIn('id', function ($query) use ($currentUser) {
            $query->select('sender_id')
                ->from('friends')
                ->where('receiver_id', $currentUser->id);
        })
            ->whereNotIn('id', function ($query) use ($currentUser) {
                $query->select('receiver_id')
                    ->from('friends')
                    ->where('sender_id', $currentUser->id);
            })
            ->where('is_business', false)
            ->whereNot('id', auth()->user()->id)
            ->inRandomOrder()
            ->take(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.friend-suggestions');
    }
}
