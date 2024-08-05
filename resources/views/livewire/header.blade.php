<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="{{ route('dashboard') }}" title=""><img src="{{asset('assets/images/logo.png') }}" alt=""></a>
            </div><!--logo end-->
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div><!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" title="Home">
                            <span><img src="{{asset('assets/images/icon1.png') }}" alt="Home"></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.index') }}" title="Pages">
                            <span><img src="{{asset('assets/images/icon2.png') }}" alt="Pages"></span>
                            Pages
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Conversations" class="not-box-open">
                            <span>
                                <img src="{{asset('assets/images/icon6.png') }}" alt="Conversations">
                                @if ($total_number_of_unread_messages > 0)
                                    <span class="badge badge-light">{{ $total_number_of_unread_messages }}</span>
                                @endif
                            </span>
                            Conversations
                        </a>
                        <div class="notification-box msg">
                            <div class="nt-title">
                                <h4>Conversations</h4>
                            </div>
                            <div class="nott-list">
                                @foreach ($chat_conversations as $chat_conversation)
                                    @if (count($chat_conversation->messages) > 0)
                                        <div class="notfication-details">
                                            <a href="{{ route('conversations.index', $chat_conversation->id) }}">
                                                <div class="chat-mg noty-user-img">
                                                    <img class="profile-image-35" src="{{ asset($chat_conversation->messages[$chat_conversation->number_of_messages-1]->chatParticipant->user->profile_image) }}" alt="Users profile image">
                                                    @if ($chat_conversation->number_of_unread_messages > 0)
                                                        <span>{{ $chat_conversation->number_of_unread_messages }}</span>
                                                    @endif
                                                </div>
                                                <div class="notification-info">
                                                    <h3>{{ substr($chat_conversation->messages[$chat_conversation->number_of_messages-1]->chatParticipant->user->full_name, 0, 20) }}{{ (strlen($chat_conversation->messages[0]->chatParticipant->user->full_name) > 20) ? '...' : '' }}</h3>
                                                    <p>{{ $chat_conversation->messages[$chat_conversation->number_of_messages-1]->body }}</p>
                                                    <span>{{ $chat_conversation->messages[$chat_conversation->number_of_messages-1]->created_at->diffForHumans() }}</span>
                                                </div><!--notification-info -->
                                            </a>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="view-all-nots">
                                    <a href="{{ route('conversations.index') }}" title="View All Conversations">View All Conversations</a>
                                </div>
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span>
                                <img src="{{asset('assets/images/icon7.png') }}" alt="Notification">
                                @if (count(auth()->user()->unreadNotifications) > 0)
                                    <span class="badge badge-light">{{ count(auth()->user()->unreadNotifications) }}</span>
                                @endif
                            </span>
                            Notification
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                @if (count(auth()->user()->unreadNotifications) > 0)
                                    <a wire:click="clearAll" href="#" title="">Clear all</a>
                                @endif
                            </div>
                            <div class="nott-list">
                                @if (count(auth()->user()->unreadNotifications) > 0)
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    <a href="{{ route('profile.show', $notification->user_id) }}">
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="{{asset(App\Models\User::find($notification->user_id)->profile_image) }}" alt="Profile Image">
                                            </div>
                                            <div class="notification-info">
                                                <h3>{{ $notification->notifiable->full_name }} {{ $notification->data['data'] }}</h3>
                                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                                            </div><!--notification-info -->
                                        </div>
                                    </a>
                                    @endforeach
                                @else
                                    <div class="notfication-details">
                                        <div class="notification-info">
                                            <h3>There are no new notifications.</h3>
                                        </div><!--notification-info -->
                                    </div>
                                @endif
                                {{-- <div class="view-all-nots">
                                    <a href="#" title="">View All Notification</a>
                                </div> --}}
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
                </ul>
            </nav><!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div><!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <img style="width: 30px;" src="{{ asset(auth()->user()->profile_image) }}" alt="Profile image">
                    <a href="#" title="">{{ auth()->user()->first_name }}</a>
                    <!--<i class="la la-sort-down"></i>-->
                </div>
                <div class="user-account-settingss">
                    <h3>
                        <a href="{{ route('profile.edit') }}" title="Show my profile">
                            {{ auth()->user()->full_name }}
                        </a>
                    </h3>
                    <h3>Online Status</h3>
                    <ul class="on-off-status">
                        <li>
                            <div class="fgt-sec">
                                <input wire:click="changeIsOnlineStatusToOnline" type="radio" name="cc" id="c5" {{ (auth()->user()->is_online == true) ? "checked" : "" }}>
                                <label for="c5">
                                    <span></span>
                                </label>
                                <small>Online</small>
                            </div>
                        </li>
                        <li>
                            <div class="fgt-sec">
                                <input wire:click="changeIsOnlineStatusToOffline" type="radio" name="cc" id="c6" {{ (auth()->user()->is_online == false) ? "checked" : "" }}>
                                <label for="c6">
                                    <span></span>
                                </label>
                                <small>Offline</small>
                            </div>
                        </li>
                    </ul>
                    <h3>Custom Status</h3>
                    <div class="search_form">
                        <form wire:submit="addPost">
                            <input type="text" wire:model="content" placeholder="Post something">
                            <button type="submit">Post</button>
                        </form>
                    </div><!--search_form end-->
                    <h3 class="tc">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </h3>
                </div><!--user-account-settingss end-->
            </div>
        </div><!--header-data end-->
    </div>
</header><!--header end-->
@script
    <script>
        Echo.private('message.' + {{ auth()->user()->id }})
            .listen('.sent.message', function(data) {
                refreshLivewireComponent()
            })
        Echo.private('friendRequest.' + {{ auth()->user()->id }})
            .listen('.friendRequest.event', function(data) {
                refreshLivewireComponent()
            })
        function refreshLivewireComponent() {
            $wire.refreshComponent()
        }
        setInterval(refreshLivewireComponent, 60000)
    </script>
@endscript