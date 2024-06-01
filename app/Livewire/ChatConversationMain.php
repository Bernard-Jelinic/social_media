<?php

namespace App\Livewire;

use App\Models\ChatConversation;
use Livewire\Component;
use Illuminate\Http\Request;

class ChatConversationMain extends Component
{
    public $selected_conversation;
    public $selected_participant;
    public $is_message_exist = false;
    public $conversation_id;

    public function mount(Request $request): void
    {
        $this->refreshComponent($request);
    }

    public function refreshComponent(Request $request): void
    {
        // // if in url conversation_id exist
        if ($request->route('conversation_id')) {
            $this->conversation_id = $request->route('conversation_id');
            $this->is_message_exist = true;
            $this->selected_conversation = ChatConversation::find($request->route('conversation_id'));
        }

        $this->selected_participant = auth()->user();
    }

    public function deleteConversation()
    {
        $chat_conversation = ChatConversation::find($this->conversation_id);
        $chat_conversation->delete();
        redirect()->route('conversations.index');
    }

    public function render()
    {
        return view('livewire.chat-conversation-main');
    }
}
