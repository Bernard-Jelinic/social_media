<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Musonza\Chat\Facades\ChatFacade as Chat;

class LeftSideAllChatConversations extends Component
{
    public $conversations;
    public $display_user;
    public $last_chat_message;

    public function mount(): void
    {
        $this->refreshComponent();
    }
    
    public function refreshComponent(): void
    {
        // // Retrieve the user
        $user = \App\Models\Person::find(auth()->user()->id);

        $all_conversations = Chat::conversations()->setParticipant($user)
                                ->get()
                                ->toArray()['data'];

        $i = 0;
        foreach ($all_conversations as $conversation) {
            if ($conversation['conversation']['participants'][0]['messageable']['id'] !== auth()->user()->id) {
                $display_user = $conversation['conversation']['participants'][0]['messageable'];
            } else {
                $display_user = $conversation['conversation']['participants'][1]['messageable'];
            }

            $last_messages = DB::table('chat_messages')
                                    ->where('conversation_id', $conversation['conversation_id'])
                                    ->whereNot('participation_id', auth()->user()->id)
                                    ->get();

            $last_message = $last_messages[count($last_messages) - 1];
            $this->conversations[$i]['display_user'] = $display_user;
            $this->conversations[$i]['last_message'] = $last_message;

            $i++;
        }
    }

    public function render()
    {
        return view('livewire.left-side-all-chat-conversations');
    }
}
