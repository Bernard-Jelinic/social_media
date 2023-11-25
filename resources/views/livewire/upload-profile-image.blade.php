<div class="user_profile">
    <div class="user-pro-img">
        @if ( !is_null($tmp_profile_image) && $tmp_profile_image->temporaryUrl())
            <img src="{{ $tmp_profile_image->temporaryUrl() }}" alt="Preview Profile Image">
            <p>This is preview image</p>
        @elseif ($profile_image && file_exists($profile_image))
            <img src="{{ $profile_image }}" alt="Profile image">
        @endif
        <a href="#" id="uploadImageLink" title=""><i class="fa fa-camera"></i></a>
    </div><!--user-pro-img end-->

    <form wire:submit="save">
        <div style="display: none" class="form-group">
            <input type="file" wire:model="tmp_profile_image" class="form-control" id="profile_image" name="image" />
        </div>
    
        <button class="btn btn-primary" type="submit">Save profile picture</button>
    </form>
    <!--<div class="user_pro_status">
        <ul class="flw-hr">
            <li><a href="#" title="" class="flww"><i class="la la-plus"></i> Follow</a></li>
            <li><a href="#" title="" class="hre">Hire</a></li>
        </ul>
        <ul class="flw-status">
            <li>
                <span>Following</span>
                <b>34</b>
            </li>
            <li>
                <span>Followers</span>
                <b>155</b>
            </li>
        </ul>
    </div>--><!--user_pro_status end-->
    <ul class="social_links">
        <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
        <li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
        <li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
        <li><a href="#" title=""><i class="fa fa-google-plus-square"></i> Http://www.googleplus.com/john...</a></li>
        <li><a href="#" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a></li>
        <li><a href="#" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li>
        <li><a href="#" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
        <li><a href="#" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li>
    </ul>
</div><!--user_profile end--> 