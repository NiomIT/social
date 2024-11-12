<?php

namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $existingLike = Like::where('user_id', $request->user_id)
                            ->where('post_id', $request->post_id)
                            ->first();

        if ($existingLike) {
            return response()->json(['message' => 'Already liked'], 400);
        }

        $like = new Like();
        $like->user_id = $request->user_id;
        $like->post_id = $request->post_id;
        $like->save();

        $likeCount = Like::where('post_id', $request->post_id)->count();

        return response()->json(['like_count' => $likeCount]);
    }
}
