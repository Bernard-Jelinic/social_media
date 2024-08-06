<section class="cover-sec">
    @if (!$is_profile_of_logged_in_user)
        <img src="{{ asset($cover_image) }}" alt="Cover image">
    @elseif ( !is_null($tmp_cover_image) && $tmp_cover_image->temporaryUrl())
        <img src="{{ $tmp_cover_image->temporaryUrl() }}" alt="Preview Cover Image">
        <p>This is preview image</p>
    @elseif ($cover_image && file_exists($cover_image))
        <img src="{{ asset($cover_image) }}" alt="Cover image">
    @endif
    
    @if ($is_profile_of_logged_in_user)
    <a href="#" id="uploadCoverImageLink"><i class="fa fa-camera"></i> Change Image</a>
        <form wire:submit="save">
            <div style="display: none" class="form-group">
                <input type="file" wire:model="tmp_cover_image" class="form-control" id="cover_image" name="image" />
            </div>
            
            @if (!is_null($tmp_cover_image) && $tmp_cover_image->temporaryUrl())
                <div style="padding-bottom: 28px;">
                    <button class="btn btn-primary" type="submit">Save cover image</button>
                </div> 
            @endif
        </form>
        <script>
            document.getElementById('uploadCoverImageLink').addEventListener('click', function() {
                document.getElementById('cover_image').click();
            }); 
        </script>
    @endif
</section>