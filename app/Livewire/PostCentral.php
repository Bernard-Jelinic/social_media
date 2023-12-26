<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;

class PostCentral extends Component
{
    public $is_profile_of_logged_in_user;
    public $user;
    public $show_top_profiles;
    public $random_users;

    public function mount(bool $is_profile_of_logged_in_user, object $user, bool $show_top_profiles = false): void
    {
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
        $this->user = $user;
        $this->show_top_profiles = $show_top_profiles;
        $this->random_users = User::inRandomOrder()->whereNotIn('id', [auth()->user()->id])->limit(10)->get();
    }

    #[On('get-posts')]
    public function getPosts(): void
    {
        $this->user = User::find(auth()->user()->id);
    }

    public function render(): View
    {
        return view('livewire.post-central');
    }
}
