<?php

namespace App\Livewire;

use Musonza\Chat\Models\Conversation;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatConversation extends Component
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

            $conversation = Conversation::find($request->route('conversation_id'));
            $this->is_message_exist = true;
        } else {
            // // if in url conversation_id don't exist
            $participantId = auth()->user()->id;

            $conversation = Conversation::whereHas('messages', function ($query) use ($participantId) {
                $query->where('participation_id', $participantId);
            })->latest('updated_at')->first();

                $this->conversation_id = $conversation->id;
        
                if ($conversation) {
                    $conversation = Conversation::find($conversation->id);
                    // Process messages as shown previously
                    $this->is_message_exist = true;
                } else {
                    // Handle the case where no conversation is found for the participant
                }
        }

        if ($this->is_message_exist) {
            $this->selected_conversation = $conversation->messages()->orderBy('created_at', 'asc')->get();

            if (count($this->selected_conversation)) {
                for ($i=0; $i < count($this->selected_conversation); $i++) {
                    $conversation = $this->selected_conversation[$i];
                    if ( auth()->user()->id !== $conversation->id ) {
                        $this->selected_participant = User::find($conversation->id);
                        $i = count($this->selected_conversation);
                    }
                }
            } else {
                $conversations = DB::table('chat_participation')
                                    ->where('conversation_id', $request->route('conversation_id'))
                                    ->where('messageable_id', '!=', auth()->id())
                                    ->get();
                $this->selected_participant = User::find($conversations[0]->messageable_id);
            }
        }
    }

    public function deleteConversation()
    {
        DB::table('chat_conversations')
            ->where('id', $this->conversation_id)
            ->delete();
    }

    public function render()
    {
        return view('livewire.chat-conversation');
    }
}
