<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class UploadProfileImage extends Component
{
    use WithFileUploads;
 
    #[Validate('image|max:1024')] // 1MB Max
    public $tmp_profile_image;
    public $is_profile_of_logged_in_user;
    public $profile_image;

    public function mount($user_profile)
    {
        $this->is_profile_of_logged_in_user = ($user_profile->id == auth()->user()->id) ? true : false;
        $this->profile_image = $this->is_profile_of_logged_in_user ? auth()->user()->profile_image : $user_profile->profile_image;
    }
 
    public function save()
    {
        if ( $this->tmp_profile_image !== null ) {
            $image_url = $this->tmp_profile_image->store('uploads', 'public');
            $user = User::find(auth()->user()->id);
            $user->profile_image = 'storage/' . $image_url;
            $user->save();

            Storage::delete( 'livewire-tmp/' . $this->tmp_profile_image->getFilename());

            $this->tmp_profile_image = null;
            $this->profile_image = $user->profile_image;
        }
    }
}
