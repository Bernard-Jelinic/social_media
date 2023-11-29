<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\PostComponent;

class ProfilePost extends PostComponent
{
    public function render()
    {
        return view('livewire.profile-post');
    }
}
