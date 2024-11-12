<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request)
    {  
       
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post_id;
        $comment->comment_text = $request->comment_text;
        $comment->save();

        return response()->json([
            'success' => true,
            'comment_text' => $comment->comment_text,
            'user_name' => auth()->user()->name
        ]);
    }

    public function reply(Request $request)
    {
        $reply = new Reply();
        $reply->user_id = auth()->user()->id;
        $reply->comment_id = $request->comment_id;
        $reply->reply_text = $request->reply_text;
        $reply->save();

        return response()->json($reply);
    }
}
