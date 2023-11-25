<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UploadProfileImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class UploadProfileImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_upload_profile_image()
    {
        // Create a user
        $user = User::factory()->create();

        // Acting as the authenticated user
        $this->actingAs($user);

        // Set up a fake image for testing
        $fakeImage = UploadedFile::fake()->image('profile.jpg');

        // Livewire test
        Livewire::test(UploadProfileImage::class)
            ->set('tmp_profile_image', $fakeImage)
            ->call('save');

        $profile_image_path = User::find(auth()->user()->id)->profile_image;
        $image_name = '';
        $lastSlashPosition = strrpos($profile_image_path, '/');
        if ($lastSlashPosition !== false) {
            $image_name = substr($profile_image_path, $lastSlashPosition + 1);
        } else {
            $image_name = $profile_image_path;
        }

        Storage::disk('public')->assertExists('uploads/' . $image_name);

        // // line below deletes created profile_image
        Storage::disk('public')->delete('uploads/' . $image_name);
    }
}