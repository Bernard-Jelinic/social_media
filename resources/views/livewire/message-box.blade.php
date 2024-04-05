<div class="message-send-area">
    <form wire:submit="sendMessage">
        <div class="mf-field">
            <input type="text" wire:model="messageText" name="message" placeholder="Type a message here">
            <button type="submit">Send</button>
        </div>
        <ul>
            <li><a href="#" title=""><i class="fa fa-smile-o"></i></a></li>
            <li><a href="#" title=""><i class="fa fa-camera"></i></a></li>
            <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
        </ul>
    </form>
</div><!--message-send-area end-->