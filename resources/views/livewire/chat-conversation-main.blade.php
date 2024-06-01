<div class="main-conversation-box">
    @if ($is_message_exist)
        <div class="message-bar-head card-header msg_head">
            <div class="usr-msg-details">
                <div class="usr-ms-img">
                    <a href="{{ route('profile.show', $selected_conversation->conversation_user->id) }}">
                        <img src="{{ asset($selected_conversation->conversation_user->profile_image) }}" alt="Profile image">
                    </a>
                    </div>
                <div class="usr-mg-info">
                    <h3>{{ $selected_conversation->conversation_user->full_name }}</h3>
                    @if ($selected_conversation->conversation_user->is_online == true)
                        <span class="logged-out" style="color: green">●</span>
                        Online
                    @else
                        <span class="logged-out" style="color: red">●</span>
                        Offline
                @endif
                </div><!--usr-mg-info end-->
            </div>
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <li><a href="#" wire:click="deleteConversation" title="Delete conversation">Delete conversation</a></li>
                </ul>
            </div>
        </div><!--message-bar-head end-->

        <div class="messages-line">
            @php
                $last_profile_image = "";
            @endphp
            @foreach ($selected_conversation->messages as $message)
                @if ($message->chatParticipant->user->id == auth()->id())
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send message-dt">
                            {{ $message->body }}
                            <span class="msg_time">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="img_cont_msg">
                            @if ($message->chatParticipant->user->id !== $last_profile_image)
                                <img style="height: 50px" src="{{ asset($message->chatParticipant->user->profile_image) }}" class="rounded-circle user_img_msg">
                            @else
                                {{-- in case if one user send multiple messages, only show profile image once --}}
                                <div style="width: 50px"></div>
                            @endif
                            </div>
                    </div>
                @else
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            @if ($message->chatParticipant->user->id !== $last_profile_image)
                                <img style="height: 50px" src="{{ asset($message->chatParticipant->user->profile_image) }}" class="rounded-circle user_img_msg">
                            @else
                                {{-- in case if one user send multiple messages, only show profile image once --}}
                                <div style="width: 50px"></div>
                            @endif
                        </div>
                            <div class="msg_cotainer message-dt">
                                {{ $message->body }}
                                <span class="msg_time">{{ $message->created_at->diffForHumans() }}</span>
                            </div>
                    </div>
                @endif
                @php
                    $last_profile_image = $message->chatParticipant->user->id;
                @endphp
            @endforeach
        </div><!--messages-line end-->

        <livewire:message-box :conversation_id="$conversation_id"/>

    @endif
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
</div><!--main-conversation-box end-->