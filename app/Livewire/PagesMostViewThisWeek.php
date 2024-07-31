<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ProfileView;

class PagesMostViewThisWeek extends Component
{
    public $users;
    public $title;

    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function refreshComponent(): void
    {
        $this->users = User::where('is_page', true)
                                        ->withCount('profileViews')
                                        ->joinSub(
                                            ProfileView::query()
                                                ->whereDate('viewed_at', '>=', now()->subDays(7))
                                                ->selectRaw('profile_views.visitor_id AS visitor_id, profile_views.user_id AS user_id'),
                                            'profile_view',
                                            'users.id',
                                            'profile_view.user_id'
                                        )
                                        ->orderByDesc('profile_views_count')
                                        ->take(5)
                                        ->get();
        $this->title = 'Most Viewed This Week';
    }

    public function render()
    {
        return view('livewire.shared.pages.pages-sidebar');
    }
}
