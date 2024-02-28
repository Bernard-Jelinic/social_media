<div class="users full-width">
    <div class="sd-title">
        <h3>{{ $title }}</h3>
    </div><!--sd-title end-->
    <div class="users-list">
        @foreach ($users as $user)
            <div class="suggestion-usd">
                <a href="{{ route('profile.show', $user->id) }}">
                    <img style="width: 35px;" src="{{ asset($user->profile_image) }}" alt="Profile image">
                    <div class="sgt-text">
                        <h4>{{ $user->full_name }}</h4>
                        <span>{{ $user->headline }}</span>
                    </div>
                </a>
                <span wire:click="addFriendAndRefresh({{ $user }})"><i class="la la-plus"></i></span>
            </div>
        @endforeach
    </div><!--users-list end-->
</div><!--users end-->
