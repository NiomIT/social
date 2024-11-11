<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Session;
use Image;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $events = Event::all();
       return view('backend.event.index',compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'event_topic'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'presenter_name'=>'required',
            'photo'=>'required',
           
        ]);

        if($request->hasfile('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(150,150)->save('upload/event/'.$name_gen);
            $photo = 'upload/event/'.$name_gen;
        }else{
            $photo = $request->photos;
        }

        $event = new Event;
       
       if($request->status == Null){
            $request->status = 0;
        }
        
        $event->status = $request->status;
        $event->event_topic = $request->event_topic;
        $event->meeting_link = $request->meeting_link;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->presenter_name = $request->presenter_name;
        $event->photo = $photo;
        $event->created_at = Carbon::now();
        $event->save();

        Session::flash('success','event Inserted Successfully');
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
       $event = Event::find($id);
        return view('backend.event.view',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('backend.event.edit',compact('event'));
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
        $event = Event::find($id);
      
        if($request->hasfile('photo')){
            try {
                if(file_exists($event->photo)){
                    unlink($event->photo);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1020,1020)->save('upload/event/'.$name_gen);
            $photo = 'upload/event/'.$name_gen;
        }else{
            $photo = $event->photo;
        }


        if($request->status == Null){
            $request->status = 0;
        }
       
        $event->status = $request->status;
        $event->event_topic = $request->event_topic;
        $event->meeting_link = $request->meeting_link;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->presenter_name = $request->presenter_name;
        $event->photo = $photo;
        $event->created_at = Carbon::now();
        $event->save();
        Session::flash('success','event Updated Successfully');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {    $event = Event::find($id);
         $photo = $event->photo;
         unlink($photo);
         $event->delete();
         Session::flash('success','Event Deleted Successfully');
         return redirect()->route('event.index');
    }

    public function active($id){
        $event = Event::find($id);
        $event->status = 1;
        $event->save();
        Session::flash('success','event Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $event = Event::find($id);
        $event->status = 0;
        $event->save();
        Session::flash('success','event Disabled Successfully.');
        return redirect()->back();
    }
}
