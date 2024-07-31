<?php

namespace App\Livewire;

use App\Models\User;
use App\Livewire\FriendBaseComponent;

class FriendSuggestions extends FriendBaseComponent
{
    public $users;
    public $title;

    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function refreshComponent(): void
    {
        $currentUser = auth()->user();
        $this->users = User::whereNotIn('id', function ($query) use ($currentUser) {
            $query->select('sender_id')
                ->from('friends')
                ->where('receiver_id', $currentUser->id);
        })
            ->whereNotIn('id', function ($query) use ($currentUser) {
                $query->select('receiver_id')
                    ->from('friends')
                    ->where('sender_id', $currentUser->id);
            })
            ->where('is_page', false)
            ->whereNot('id', auth()->user()->id)
            ->inRandomOrder()
            ->take(6)
            ->get();
        $this->title = 'Suggestions';
    }

    public function render()
    {
        return view('livewire.shared.pages.users-sidebar');
    }
}
