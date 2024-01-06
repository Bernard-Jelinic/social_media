<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TopPages extends Component
{
    public $most_repeating_records;

    public function mount(): void
    {
        $this->get();
    }

    public function get(): void
    {
        $this->most_repeating_records = User::where('is_business', true)
                                            ->withCount('profileViews')
                                            ->orderByDesc('profile_views_count')
                                            ->take(5)
                                            ->get();

    }

    public function render()
    {
        return view('livewire.top-pages');
    }
}
