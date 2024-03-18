<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Musonza\Chat\Facades\ChatFacade as Chat;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('messages.index');
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
        // $conversations = DB::table('chat_participation')
        //                     ->where('messageable_id', $participant_one)
        //                     ->orWhere('messageable_id', $participant_two)
        //                     // ->groupBy('conversation_id')
        //                     ->havingRaw('COUNT(DISTINCT messageable_id) = 2')
        //                     ->get();

        $conversations = DB::table('chat_participation')
                            ->whereIn('conversation_id', function ($query) use ($participant_one, $participant_two) {
                                $query->select('conversation_id')
                                    ->from('chat_participation')
                                    ->whereIn('messageable_id', [$participant_one, $participant_two])
                                    ->groupBy('conversation_id')  // No need for id here
                                    ->havingRaw('COUNT(DISTINCT messageable_id) = 2');
                                })
                            ->get();

        if (count($conversations) > 1) {
            $participantModel1 = call_user_func($conversations[0]->messageable_type . '::find', $conversations[0]->messageable_id);
            $participantModel2 = call_user_func($conversations[1]->messageable_type . '::find', $conversations[1]->messageable_id);

            $conversation = Chat::conversations()->between($participantModel1, $participantModel2);
        } else {

            $person_1 = User::find($participant_one);
            if ($person_1->is_page == true) {
                $participantModel1 = Page::find($person_1->id);
            } else{
                $participantModel1 = Person::find($person_1->id);
            }

            $person_2 = User::find($participant_two);
            if ($person_2->is_page == true) {
                $participantModel2 = Page::find($person_2->id);
            } else{
                $participantModel2 = Person::find($person_2->id);
            }
    
            $participants = [$participantModel1, $participantModel2];
            $conversation = Chat::createConversation($participants)->makeDirect();
        }
        return redirect()->route('messages.index', ['conversation_id' => $conversation->id]);
    }
}
