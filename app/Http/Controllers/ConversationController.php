<?php

namespace App\Http\Controllers;

use App\Models\ChatConversation;
use App\Models\ChatMessage;
use App\Models\ChatParticipant;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->route('conversation_id') !== null) {
            ChatConversation::markAllMessagesAsRead($request->route('conversation_id'));
        } else {
            $chat_participants = ChatParticipant::where('user_id', auth()->user()->id)->get('chat_conversation_id')->pluck('chat_conversation_id');
            $chat_message = ChatMessage::whereIn('chat_conversation_id', $chat_participants)->orderBy('created_at', 'desc')->first();
            return redirect()->route('conversations.index', ['conversation_id' => $chat_message->chat_conversation_id]);
        }
        return view('conversations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createOpenConversation(int $participant_one, int $participant_two)
    {
        $chat_conversation = ChatConversation::checkConversationExist($participant_one, $participant_two);
        return redirect()->route('conversations.index', ['conversation_id' => $chat_conversation->id]);
    }
}
