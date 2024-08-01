<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\PostTrait;

class PostAdd extends Component
{
    use PostTrait;

    public function render(): View
    {
        return view('livewire.post-add');
    }
}
