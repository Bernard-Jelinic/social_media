<?php

namespace App\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $post;
    public $user;

    public function mount($post, $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.post');
    }
}
