<div class="col-lg-4 col-md-12 no-pdd">
    <div class="msgs-list">
        <div class="msg-title">
            <h3>Conversations</h3>
            <ul>
                <li><a href="#" title=""><i class="fa fa-cog"></i></a></li>
                <li><a href="#" title=""><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div><!--msg-title end-->
        <div class="messages-list">
            <ul>
                @foreach ($chat_conversations as $chat_conversation)
                    @if (count($chat_conversation->messages) > 0)
                        <a href="{{ route('conversations.index', $chat_conversation->id) }}">
                            <li class="{{ $chat_conversation->number_of_unread_messages > 0 ? 'active' : '' }}">
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="{{ asset($chat_conversation->messages[$chat_conversation->number_of_messages-1]->chatParticipant->user->profile_image) }}" alt="Profile image">
                                        <span class="msg-status"></span>
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>{{ $chat_conversation->messages[$chat_conversation->number_of_messages-1]->chatParticipant->user->full_name }}</h3>
                                        <p>{{ $chat_conversation->messages[$chat_conversation->number_of_messages-1]->body }}
                                            <img src="images/smley.png" alt="">
                                        </p>
                                    </div><!--usr-mg-info end-->
                                    <span class="posted_time">{{ \Carbon\Carbon::parse($chat_conversation->messages[$chat_conversation->number_of_messages-1]->created_at)->diffForHumans() }}</span>
                                    <span class="{{ $chat_conversation->number_of_unread_messages > 0 ? "msg-notifc" : "" }}">{{ $chat_conversation->number_of_unread_messages ? $chat_conversation->number_of_unread_messages : '' }}</span>
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