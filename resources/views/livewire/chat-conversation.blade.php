<div class="main-conversation-box">
    
    <div class="message-bar-head card-header msg_head">
        <div class="usr-msg-details">
            <div class="usr-ms-img">
                <img src="{{ asset($selected_participant['profile_image']) }}" alt="">
            </div>
            <div class="usr-mg-info">
                <h3>{{ $selected_participant['full_name'] }}</h3>
                <p>Online</p>
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

    <div class="message-send-area">
        <form>
            <div class="mf-field">
                <input type="text" name="message" placeholder="Type a message here">
                <button type="submit">Send</button>
            </div>
            <ul>
                <li><a href="#" title=""><i class="fa fa-smile-o"></i></a></li>
                <li><a href="#" title=""><i class="fa fa-camera"></i></a></li>
                <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
            </ul>
        </form>
    </div><!--message-send-area end-->
</div><!--main-conversation-box end-->
