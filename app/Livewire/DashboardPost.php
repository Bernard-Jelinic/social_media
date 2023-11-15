<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class DashboardPost extends Component
{
    public $content = '';

    public function save()
    {
        Post::create([
            'user_id' => auth()->user()->id,
            'content' => $this->content
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard-post');
    }
}
