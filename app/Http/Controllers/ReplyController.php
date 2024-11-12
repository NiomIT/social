<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        $reply = Reply::create([
            'comment_id' => $request->comment_id,
            'user_id' => auth()->id(),
            'reply_text' => $request->reply_text,
        ]);

        return response()->json($reply);
    }
}
