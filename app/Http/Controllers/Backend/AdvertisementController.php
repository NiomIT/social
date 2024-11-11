<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Session;
use Image;
use Illuminate\Support\Carbon;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::latest()->get();
        return view('backend.advertisement.index', compact('advertisements'));
    } // End Index Mathod


    public function create(){
        return view('backend.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      $advertisement = new Advertisement();

      if ($request->status == null) {
          $request->status = 1;
      }
      $advertisement->status = $request->status;
      $advertisement->box_size = $request->box_size;
      $advertisement->non_box_size = $request->non_box_size;
      $advertisement->url = $request->url;
      $advertisement->created_at = Carbon::now();
      $advertisement->save();
      Session::flash('success', 'Advertisement Inserted Successfully');
      return redirect()->route('advertisement.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('backend.advertisement.edit', compact('advertisement'));
    } // End Edit Mathod

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $advertisement = Advertisement::find($id);
       

        if ($request->status == null) {
            $request->status = 1;
        }
        $advertisement->status = $request->status;
        $advertisement->box_size = $request->box_size;
        $advertisement->non_box_size = $request->non_box_size;
        $advertisement->url = $request->url;
        $advertisement->created_at = Carbon::now();
        $advertisement->save();
        Session::flash('success', 'Advertisement Updated Successfully');
        return redirect()->route('advertisement.index');

    } // End Update Mathod

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();
        Session::flash('success', 'Advertisement Delete Successfully');
        return redirect()->back();
    } // End Destroy Mathod




    public function active($id){
        $advertisement = Advertisement::find($id);
        $advertisement->status = 1;
        $advertisement->save();

        Session::flash('success','Advertisement Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $advertisement = Advertisement::find($id);
        $advertisement->status = 0;
        $advertisement->save();

        Session::flash('success','Advertisement Disabled Successfully.');
        return redirect()->back();
    }
}
