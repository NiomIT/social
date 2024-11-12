<?php

namespace App\Http\Controllers;
use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function like(Request $request)
    {
        $userId = $request->user_id;
        $postId = $request->post_id;
    
        // চেক করুন, ব্যবহারকারী আগে থেকেই লাইক করেছে কি না
        $existingLike = Like::where('user_id', $userId)->where('post_id', $postId)->first();
    
        if (!$existingLike) {
            // নতুন লাইক তৈরি করুন
            Like::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
        }
    
        // পোস্টের লাইক কাউন্ট ফেরত পাঠান
        $likeCount = Post::find($postId)->likes->count();
    
        return response()->json([
            'success' => true,
            'like_count' => $likeCount
        ]);
    }
    
    public function dislike(Request $request)
    {
        $userId = $request->user_id;
        $postId = $request->post_id;
    
        // চেক করুন, ব্যবহারকারী আগে থেকেই ডিসলাইক করেছে কি না
        $existingDislike = Dislike::where('user_id', $userId)->where('post_id', $postId)->first();
    
        if (!$existingDislike) {
            // নতুন ডিসলাইক তৈরি করুন
            Dislike::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
        }
    
        // পোস্টের ডিসলাইক কাউন্ট ফেরত পাঠান
        $dislikeCount = Post::find($postId)->dislikes->count();
    
        return response()->json([
            'success' => true,
            'dislike_count' => $dislikeCount
        ]);
    }
}
