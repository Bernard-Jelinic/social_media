<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostBaseComponent extends Component
{
    public $content = '';

    public function addPost(): void
    {
        Post::create([
            'user_id' => auth()->user()->id,
            'content' => $this->content
        ]);
        $this->content = '';

        $this->dispatch('get-posts');
    }
}
