<div>
    <div class="user-pro-img">

        @if (!$is_profile_of_logged_in_user)
            <img src="{{ asset($profile_image) }}" alt="Profile image">
        @elseif ( !is_null($tmp_profile_image) && $tmp_profile_image->temporaryUrl())
            <img src="{{ $tmp_profile_image->temporaryUrl() }}" alt="Preview Profile Image">
            <p>This is preview image</p>
        @elseif ($profile_image && file_exists($profile_image))
            <img src="{{ asset($profile_image) }}" alt="Profile image">
        @endif

        @if ($is_profile_of_logged_in_user)
            <a href="#" id="uploadImageLink" title=""><i class="fa fa-camera"></i></a>
        @endif

    </div><!--user-pro-img end-->

    @if ($is_profile_of_logged_in_user)
        <form wire:submit="save">
            <div style="display: none" class="form-group">
                <input type="file" wire:model="tmp_profile_image" class="form-control" id="profile_image" name="image" />
            </div>
        
            <div style="padding-bottom: 28px;">
                <button class="btn btn-primary" type="submit">Save profile picture</button>
            </div>
        </form>
        <script>
            document.getElementById('uploadImageLink').addEventListener('click', function() {
                document.getElementById('profile_image').click();
            }); 
        </script>
    @endif

</div>