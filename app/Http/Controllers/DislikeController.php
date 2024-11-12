<?php

namespace App\Http\Controllers;
use App\Models\Dislike;

use Illuminate\Http\Request;

class DislikeController extends Controller
{
    public function dislike(Request $request)
    {
        $dislike = Dislike::where('user_id', $request->user_id)->where('post_id', $request->post_id)->first();
        if ($dislike) {
            $dislike->dislike_count++;
        } else {
            $dislike = new Dislike();
            $dislike->user_id = $request->user_id;
            $dislike->post_id = $request->post_id;
            $dislike->dislike_count = 1;
        }

        $dislike->save();

        return response()->json($dislike);
    }
}
