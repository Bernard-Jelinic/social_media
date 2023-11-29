<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostComponent extends Component
{
    public $content = '';

    public function savePost()
    {
        Post::create([
            'user_id' => auth()->user()->id,
            'content' => $this->content
        ]);
        $this->content = '';
    }
}
