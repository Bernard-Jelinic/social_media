<div class="col-lg-4 col-md-12 no-pdd">
    <div class="msgs-list">
        <div class="msg-title">
            <h3>Messages</h3>
            <ul>
                <li><a href="#" title=""><i class="fa fa-cog"></i></a></li>
                <li><a href="#" title=""><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div><!--msg-title end-->
        <div class="messages-list">
            <ul>
                @foreach ($conversations as $conversation)
                    @if (count($conversation->messages) > 0)
                        <a href="{{ route('messages.index', $conversation->id) }}">
                            <li class="{{ $conversation->number_of_unread_messages > 0 ? 'active' : '' }}">
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="{{ asset($conversation->messages[$conversation->total_number_of_messages-1]->chatParticipant->user->profile_image) }}" alt="Profile image">
                                        <span class="msg-status"></span>
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>{{ $conversation->messages[$conversation->total_number_of_messages-1]->chatParticipant->user->full_name }}</h3>
                                        <p>{{ $conversation->messages[$conversation->total_number_of_messages-1]->body }}
                                            <img src="images/smley.png" alt="">
                                        </p>
                                    </div><!--usr-mg-info end-->
                                    <span class="posted_time">{{ \Carbon\Carbon::parse($conversation->messages[$conversation->total_number_of_messages-1]->created_at)->diffForHumans() }}</span>
                                    <span class="{{ $conversation->number_of_unread_messages > 0 ? "msg-notifc" : "" }}">{{ $conversation->number_of_unread_messages ? $conversation->number_of_unread_messages : '' }}</span>
                                </div><!--usr-msg-details end-->
                            </li>
                        </a>
                    @endif
                @endforeach
            </ul>
        </div><!--messages-list end-->
    </div><!--msgs-list end-->
</div>
@script
    <script>
        Echo.private('message.' + {{ auth()->user()->id }})
            .listen('.sent.message', function(data) {
                refreshLivewireComponent()
            })
        function refreshLivewireComponent() {
            $wire.refreshComponent()
        }
        setInterval(refreshLivewireComponent, 60000)
    </script>
@endscript