<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\PostComponent;

class AddPost extends PostComponent
{
    public function render()
    {
        return view('livewire.add-post');
    }
}
