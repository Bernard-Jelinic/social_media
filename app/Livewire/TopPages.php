<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TopPages extends Component
{
    public $users;
    public $title;

    public function mount(): void
    {
        $this->get();
    }

    public function get(): void
    {
        $this->users = User::where('is_page', true)
                            ->withCount('profileViews')
                            ->orderByDesc('profile_views_count')
                            ->take(5)
                            ->get();
        $this->title = 'Top Pages';

    }

    public function render()
    {
        return view('livewire.shared.pages.pages-sidebar');
    }
}
