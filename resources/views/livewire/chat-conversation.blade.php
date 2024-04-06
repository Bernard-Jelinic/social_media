<div class="main-conversation-box">
    @if ($is_message_exist)
        <div class="message-bar-head card-header msg_head">
            <div class="usr-msg-details">
                <div class="usr-ms-img">
                    <img src="{{ asset($selected_participant['profile_image']) }}" alt="">
                </div>
                <div class="usr-mg-info">
                    <h3>{{ $selected_participant['full_name'] }}</h3>
                    @if ($selected_participant['is_online'] == true)
                        <span class="logged-out" style="color: green">●</span>
                        Online
                    @else
                        <span class="logged-out" style="color: red">●</span>
                        Offline
                    @endif
                </div><!--usr-mg-info end-->
            </div>
            <a href="#" title=""><i class="fa fa-ellipsis-v"></i></a>
        </div><!--message-bar-head end-->

        <div class="messages-line">
            @foreach ($selected_conversation as $message)
                @if ($message->participation_id == auth()->id())
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send message-dt">
                            {{ $message->body }}
                            <span class="msg_time">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="img_cont_msg">
                            <img style="height: 50px" src="{{ asset($message->participation->messageable->profile_image) }}" class="rounded-circle user_img_msg">
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img style="height: 50px" src="{{ asset($message->participation->messageable->profile_image) }}" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer message-dt">
                            {{ $message->body }}
                            <span class="msg_time">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div><!--messages-line end-->

        <livewire:message-box :conversation_id="$conversation_id"/>

    @endif
        @script
            <script>
                Echo.channel('message')
                    .listen('.sent.message', () => {
                        $wire.getter()
                    });
            </script>
        @endscript
</div><!--main-conversation-box end-->