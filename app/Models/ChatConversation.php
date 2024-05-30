<?php

namespace App\Models;

use App\Models\ChatMessage;
use App\Models\ChatParticipant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatConversation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be appended.
     *
     * @var array<string, string>
     */
    public $appends = ['conversation_user', 'number_of_unread_messages', 'number_of_messages'];

    /**
     * Additional attribute
     */
    function getConversationUserAttribute()
    {
        $conversation_user = ChatParticipant::where('chat_conversation_id', $this->id)
                                ->whereNot('user_id', auth()->user()->id)
                                ->first();

        return User::find($conversation_user->user_id);
    }

    function getNumberOfUnreadMessagesAttribute()
    {
        return ChatMessage::where(['chat_conversation_id' => $this->id, 'is_read' => false])->count();
    }

    function getNumberOfMessagesAttribute()
    {
        return ChatMessage::where('chat_conversation_id', $this->id)->count();
    }

    /**
     * Get the chat participants inside chat conversation.
     */
    public function chatParticipants(): HasMany
    {
        return $this->hasMany(ChatParticipant::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public static function checkConversationExist(int $participant_one, int $participant_two): ChatConversation
    {
        $chat_conversation = ChatConversation::where('id', function ($query) use ($participant_one, $participant_two) {
            $query->select('chat_conversation_id')
                ->from('chat_participants')
                ->whereIn('user_id', [$participant_one, $participant_two])
                ->groupBy('chat_conversation_id')  // No need for id here
                ->havingRaw('COUNT(DISTINCT user_id) = 2');
            })
        ->first();

        if ($chat_conversation == null) {
            $chat_conversation = ChatConversation::create();
            ChatParticipant::create([
                'chat_conversation_id' => $chat_conversation->id,
                'user_id' => $participant_one
            ]);
            ChatParticipant::create([
                'chat_conversation_id' => $chat_conversation->id,
                'user_id' => $participant_two
            ]);
        }

        return $chat_conversation;
    }

    static function getMyParticipantId($conversation_id)
    {
        $conversation_user = ChatParticipant::where('chat_conversation_id', $conversation_id)
                                ->where('user_id', auth()->user()->id)
                                ->first();

        return $conversation_user;
    }

    public static function markAllMessagesAsRead(int $conversation_id)
    {
        $chat_messages = ChatMessage::where('chat_conversation_id', $conversation_id)->get('id');
        foreach ($chat_messages as $chat_message) {
            $chat_message->is_read = true;
            $chat_message->save();
        }
        
    }
}
