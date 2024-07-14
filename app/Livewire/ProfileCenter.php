<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileCenter extends Component
{
    public $user;
    public $about;
    public $is_profile_of_logged_in_user;

    public $is_post_central_shown = true;
    public $is_profile_info_shown = false;
    public $is_profile_images_shown = false;
    public $is_profile_friend_request_shown = false;

    public $cities;

    public function mount(object $user, bool $is_profile_of_logged_in_user): void
    {
        $this->user = $user;
        $this->about = $user->about;
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
    }

    public function displayPostCentral()
    {
        $this->is_post_central_shown = true; //
        $this->is_profile_info_shown = false;
        $this->is_profile_images_shown = false;
        $this->is_profile_friend_request_shown = false;
    }

    public function displayProfileInfo()
    {
        $this->is_post_central_shown = false;
        $this->is_profile_info_shown = true;//
        $this->is_profile_images_shown = false;
        $this->is_profile_friend_request_shown = false;
    }

    public function displayImages()
    {
        $this->is_post_central_shown = false;
        $this->is_profile_info_shown = false;
        $this->is_profile_images_shown = true;//
        $this->is_profile_friend_request_shown = false;
    }

    public function displayFriendRequest()
    {
        $this->is_post_central_shown = false;
        $this->is_profile_info_shown = false;
        $this->is_profile_images_shown = false;
        $this->is_profile_friend_request_shown = true;//
    }

    public function render()
    {
        return view('livewire.profile-center');
    }
}
