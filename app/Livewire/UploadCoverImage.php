<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class UploadCoverImage extends Component
{
    use WithFileUploads;
 
    #[Validate('image|max:1024')] // 1MB Max
    public $tmp_cover_image;
    public $is_profile_of_logged_in_user;
    public $cover_image;

    public function mount($is_profile_of_logged_in_user, $user_profile): void
    {
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
        $this->cover_image = $this->is_profile_of_logged_in_user ? auth()->user()->cover_image : $user_profile->cover_image;
    }

    public function save(): void
    {
        if ( $this->tmp_cover_image !== null ) {
            $image_url = $this->tmp_cover_image->store('uploads', 'public');
            $user = User::find(auth()->user()->id);
            $user->cover_image = 'storage/' . $image_url;
            $user->save();

            Storage::delete( 'livewire-tmp/' . $this->tmp_cover_image->getFilename());

            $this->tmp_cover_image = null;
            $this->cover_image = $user->cover_image;
        }
    }

    public function render(): View
    {
        return view('livewire.upload-cover-image');
    }
}
