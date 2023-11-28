<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Livewire\PostComponent;

class DashboardPost extends PostComponent
{
    public function render()
    {
        return view('livewire.dashboard-post');
    }
}
