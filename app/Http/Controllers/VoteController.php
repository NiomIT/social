<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Poll;
use App\Models\Option;
use Session;

class VoteController extends Controller
{
    public function vote(Request $request, Poll $poll)
    {
        $request->validate([
            'option' => 'required|exists:options,id',
        ]);
    
        $optionId = $request->input('option');
        $option = Option::find($optionId);
    
        // Check if the option belongs to the specified poll
        if ($option->poll_id !== $poll->id) {
            return redirect()->back()->with('error', 'Invalid option for the poll');
        }
    
        // Check if the user has already voted on this poll
        $user = auth()->user();
        if ($poll->votes()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You have already voted on this poll');
        }
    
        // Create a new vote record
        $vote = new Vote();
        $vote->poll_id = $poll->id;
        $vote->option_id = $optionId;
        $vote->user_id = $user->id;
        $vote->save();
        Session::flash('success','Vote Submitted Successfully');
        return back();
       
    }
}
