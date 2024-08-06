<?php

namespace App\Livewire;

use Livewire\Component;

class UploadCoverImage extends Component
{
    public $is_profile_of_logged_in_user;
    public $cover_image;

    public function mount($is_profile_of_logged_in_user, $user_profile): void
    {
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
        $this->cover_image = $this->is_profile_of_logged_in_user ? auth()->user()->cover_image : $user_profile->cover_image;
    }

    public function render()
    {
        return view('livewire.upload-cover-image');
    }
}
