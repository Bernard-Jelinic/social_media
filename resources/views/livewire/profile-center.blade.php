<div class="col-lg-6">
    <div class="main-ws-sec">
        <div class="user-tab-sec">
            <h3>{{ $user->full_name }}</h3>
            @if ( !is_null($user->headline) )
                <div class="star-descp">
                    <span>{{ $user->headline }}</span>
                </div><!--star-descp end-->
                @endif
            <div class="tab-feed st2">
                <ul>
                    <li
                    @if ($is_post_central_displayed_on_full_profile == true)
                        class="active"
                    @endif
                    wire:click="displayPostCentral">
                        {{-- <a href="#" title=""> --}}
                            <img src="{{ asset('assets/images/ic1.png') }}" alt="">
                            <span>Feed</span>
                        {{-- </a> --}}
                    </li>
                    <li
                    @if ($is_profile_info_displayed_on_full_profile == true)
                        class="active"
                    @endif
                    wire:click="displayProfileInfo">
                        {{-- <a href="#" title=""> --}}
                            <img src="{{ asset('assets/images/ic2.png') }}" alt="">
                            <span>Info</span>
                        {{-- </a> --}}
                    </li>
                    <li 
                    @if ($is_profile_images_displayed_on_full_profile == true)
                        class="active"
                    @endif
                    wire:click="displayImages">
                        {{-- <a href="#" title=""> --}}
                            <img src="{{ asset('assets/images/ic3.png') }}" alt="">
                            <span>Portfolio</span>
                        {{-- </a> --}}
                    </li>
                    <li
                    @if ($is_profile_friend_request_displayed_on_full_profile == true)
                        class="active"
                    @endif 
                    wire:click="displayFriendRequest">
                        {{-- <a href="#" title=""> --}}
                            <img src="{{ asset('assets/images/ic6.png') }}" alt="">
                            <span>Friend requests</span>
                        {{-- </a> --}}
                    </li>
                </ul>
            </div><!-- tab-feed end-->
        </div><!--user-tab-sec end-->

        @if ($is_post_central_displayed_on_full_profile == true)
            <livewire:post-central :is_profile_of_logged_in_user="$is_profile_of_logged_in_user" :user="$user"/>
        @elseif($is_profile_info_displayed_on_full_profile == true)
            <livewire:profile-info :is_profile_of_logged_in_user="$is_profile_of_logged_in_user" :user="$user"/>
        @elseif($is_profile_images_displayed_on_full_profile == true)
            <livewire:profile-images/>
        @elseif($is_profile_friend_request_displayed_on_full_profile == true)
            <livewire:profile-friend-request />
        @endif

    </div><!--main-ws-sec end-->
</div>