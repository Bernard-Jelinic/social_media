<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class Post extends Component
{
    public $post;
    public $user;

    public function mount($post, $user): void
    {
        $this->post = $post;
        $this->user = $user;
    }

    public function render(): View
    {
        return view('livewire.post');
    }
}
