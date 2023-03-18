<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getChatMessages($userId)
    {
        $user = Auth::user();

        $messages = Message::where(function ($query) use ($user, $userId) {
            $query->where('from_id', $user->id)->where('to_id', $userId);
        })->orWhere(function ($query) use ($user, $userId) {
            $query->where('from_id', $userId)->where('to_id', $user->id);
        })->orderBy('datetime', 'asc')->get();

        return response()->json($messages);
    }
}