<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\PostComponent;

class AddPost extends PostComponent
{
    public function render(): View
    {
        return view('livewire.add-post');
    }
}
