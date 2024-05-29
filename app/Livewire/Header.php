<?php

namespace App\Livewire;

use App\Livewire\ChatBaseComponent;

class Header extends ChatBaseComponent
{
    public function mount(): void
    {
        $this->refreshComponent();
    }

    public function render()
    {
        return view('livewire.header');
    }
}
