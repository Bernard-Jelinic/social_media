<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\PostBaseComponent;

class PostAdd extends PostBaseComponent
{
    public function render(): View
    {
        return view('livewire.post-add');
    }
}
