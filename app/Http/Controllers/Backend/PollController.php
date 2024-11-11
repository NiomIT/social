<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Option;
use Session;
use Illuminate\Support\Carbon;
use Auth;


class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $polls = Poll::all();
        return view('backend.poll.index',compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
       $poll = new Poll;
       if($poll->count()<1){

        $poll->title = $request->title;
        $poll->user_id = auth()->user()->id;
        $poll->save();
        
        foreach ($request->options as $option) {
            if($option == true){
                Option::create([
                    'poll_id' => $poll->id,
                    'option_text' => $option,
                ]);
            }
        }
       Session::flash('success','Poll Inserted Successfully');
       return redirect()->route('poll.index');
       } else {
        Session::flash('warning', 'Adding More Than Two Poll Is Not Allowed.');
       return back();

       }
       

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    public function vote(Request $request,$poll,$id){

        echo $id;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
     $poll = Poll::with('options')->find($id);

     if (!$poll) {
      
         Session::flash('error', 'Poll not found.');
         return back();
     }

     $poll->options()->delete();

     $poll->delete();

     Session::flash('warning', 'Poll deleted successfully.');
     return back();
    }
}
