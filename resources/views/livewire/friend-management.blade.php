<div class="user_pro_status">
    <ul class="flw-hr">
        
        @if ($request_in_process && !$is_this_sent_request)
        <ul class="flw-hr">
            <li wire:click="acceptFriendRequest({{ $user_profile->id }})">
                <a href="#" title="" class="hre">
                    <i class="la la-check"></i>Accept
                </a>
            </li>
            <li wire:click="cancelFriendRequest">
                <a href="#" title="" class="btn-danger">
                    <i class="la la-close"></i>Deny
                </a>
            </li>
        </ul>
        @elseif ($request_in_process)
            <li wire:click="cancelFriendRequest">
                <a href="#" title="" class="btn-danger">
                    <i class="la la-close"></i>Cancel Request
                </a>
            </li>
        @elseif ($request_accepted)
            <li wire:click="denyFriendRequest({{ $user_profile->id }})">
                <a href="#" title="" class="flww">
                    <i class="la la-plus"></i>Delete Friend
                </a>
            </li>
        @else
            <li wire:click="addFriend({{ $user_profile }})">
                <a href="#" title="" class="flww">
                    <i class="la la-plus"></i>Add Friend
                </a>
            </li>
        @endif

        <!--<li><a href="#" title="" class="hre">Hire</a></li>-->
    </ul>
    <ul class="flw-status">
        <li>
            <span>Number of friends</span>
            <b>{{ $number_of_friends }}</b>
        </li>
        <!--<li>
            <span>Followers</span>
            <b>155</b>
        </li>-->
    </ul>
</div><!--user_pro_status end-->
@script
    <script>
        Echo.private('friendRequest.' + {{ auth()->user()->id }})
            .listen('.friendRequest.event', function(data) {
                refreshLivewireComponent()
            })
        function refreshLivewireComponent() {
            $wire.refreshComponent()
        }
    </script>
@endscript