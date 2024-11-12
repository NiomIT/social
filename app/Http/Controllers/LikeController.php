<?php

namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like = Like::where('user_id', $request->user_id)->where('post_id', $request->post_id)->first();
        if ($like) {
            $like->like_count++;
        } else {
            $like = new Like();
            $like->user_id = $request->user_id;
            $like->post_id = $request->post_id;
            $like->like_count = 1;
        }

        $like->save();

        return response()->json($like);
    }
}
