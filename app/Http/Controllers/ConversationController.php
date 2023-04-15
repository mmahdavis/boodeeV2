<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConversationCollection;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\participantCollection;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ConversationController extends Controller
{
    public function index()
    {
        return new ConversationCollection(Conversation::all());
    }
    public function show(Conversation $conversation)
    {
        $participant = new participantCollection(Participant::where('conversation_id', $conversation->id)->get());
        $message = new MessageCollection(Message::where('conversation_id', $conversation->id)->get());
        return response()->json(['conversation' => $conversation, 'participant' => $participant, 'message' => $message, 'authUser' => 1]);
    }
    public function messageShow(Conversation $conversation)
    {
        $message = new MessageCollection(Message::where('conversation_id', $conversation->id)->get());
        return $message;
    }
    public function messageStore(Conversation $conversation,  Request $request)
    {
        $message = Message::create(['conversation_id' => $conversation->id, 'user_id' => $request->user_id, 'message' => $request->message,'created_at' => now(), 'updated_at' => null]);
        return response()->json(['alert', 'Message Created Successfuly'], '200');
    }
    public function participantShow(Conversation $conversation)
    {
        $participant = new participantCollection(Participant::where('conversation_id', $conversation->id)->get());
        return $participant;
    }
}
