<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Participant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConversationsController extends Controller
{
    public function index(Conversation $conversation)
    {
        $participants = Participant::where('conversation_id',$conversation->id)->get();
        $messages = Message::with('User')->where('conversation_id', $conversation->id)->get()->sortBy('created_at', 0);
        return Inertia::render('Conversation/index', [
            'messages'=> $messages,
            'conversation' => $conversation,
            'participants' => $participants,
        ]);
    }
}
