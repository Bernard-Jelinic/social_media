<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Livewire\PostComponent;

class DashboardPost extends PostComponent
{
    public $random_users;

    public function mounted($random_users)
    {
        $this->random_users = $random_users;
    }

    public function render()
    {
        return view('livewire.dashboard-post');
    }
}
