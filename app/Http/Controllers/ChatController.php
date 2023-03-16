<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getChatMessages(Request $request, $userId)
{
    $user = Auth::user();
    $messages = Chat::where(function ($query) use ($user, $userId) {
        $query->where('from_id', $user->id)->where('to_id', $userId);
    })->orWhere(function ($query) use ($user, $userId) {
        $query->where('from_id', $userId)->where('to_id', $user->id);
    })->orderBy('datetime', 'asc')->get();

    return view('chat')->with('messages', $messages);
}

    public function store(Request $request)
    {
        $user = Auth::user();

        $chat = new Chat();
        $chat->from_id = $user->id;
        $chat->to_id = $request->to_id;
        $chat->msg = $request->msg;
        $chat->has_dropDown = $request->has_dropDown;
        $chat->has_images = $request->has_images;
        $chat->has_files = $request->has_files;
        $chat->datetime = now();
        $chat->isReplied = 1;
        $chat->save();

        return response()->json(['status' => 'success']);
    }
}