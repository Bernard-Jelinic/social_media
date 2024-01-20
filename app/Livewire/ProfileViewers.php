<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ProfileViewers extends Component
{
    public $users;
    public $title;

    public function mount()
    {
        $this->users = User::where('is_page', false)
                            ->withCount('profileViews')
                            ->join('profile_views', 'profile_views.visitor_id', '=', 'users.id')
                            ->where('profile_views.user_id', auth()->user()->id)
                            ->orderByDesc('profile_views_count')
                            ->take(5)
                            ->get();
        $this->title = 'Profile viewers';
    }

    public function render()
    {
        return view('livewire.shared.pages.users-sidebar');
    }
}
