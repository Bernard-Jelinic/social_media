<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['chat_conversation_id', 'chat_participant_id', 'body'];

    public function chatParticipant(): BelongsTo
    {
        return $this->belongsTo(ChatParticipant::class);
    }
}
