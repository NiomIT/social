<?php

namespace App\Http\Controllers;
use App\Models\Dislike;

use Illuminate\Http\Request;

class DislikeController extends Controller
{
    public function store(Request $request)
    {
        $existingDislike = Dislike::where('user_id', $request->user_id)
                                  ->where('post_id', $request->post_id)
                                  ->first();

        if ($existingDislike) {
            return response()->json(['message' => 'Already disliked'], 400);
        }

        $dislike = new Dislike();
        $dislike->user_id = $request->user_id;
        $dislike->post_id = $request->post_id;
        $dislike->save();

        $dislikeCount = Dislike::where('post_id', $request->post_id)->count();

        return response()->json(['dislike_count' => $dislikeCount]);
    }
}
