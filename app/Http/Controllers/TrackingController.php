<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function trackings(Request $request)
    {
        $parent_page = "Setting";
        $page_name = "Trackings";
        $user_id =$request->session()->get('user_id');


        $all_trackings = Tracking::where('user_id', $user_id)->whereNull('deleted_at')->get();
        return view('trackings.all_trackings', ['parent_page' => $parent_page, 'page_name' => $page_name, 'all_trackings' => $all_trackings ]);
    }

    public function tracking_create()
    {
        $parent_page = "Setting";
        $page_name = "Add Tracking";

        return view('trackings.add_tracking', ['parent_page' => $parent_page, 'page_name' => $page_name ]);
    }

    public function tracking_store(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $request->validate([
            'tracking_content' => 'required',
        ]);


        $add = Tracking::create([
            'user_id'  => $user_id,
            'tracking_content' => $request->tracking_content,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if($add)
        {
            return Redirect()->route('tracking.trackings')->with('success', 'Tracking Add Successfully!');
        }else{
            return Redirect()->back()->with('message', 'Something went wrong, or connection error. Try again later.');
        }
    }

    public function tracking_edit($id)
    {
        $parent_page = "Setting";
        $page_name = "Edit Tracking";

        $tracking = Tracking::where('id', $id)->get()->first();
        return view('trackings.edit_tracking', ['parent_page' => $parent_page, 'page_name' => $page_name, 'tracking' => $tracking ]);
    }

    public function update_tracking(Request $request, $id)
    {
        $user_id =$request->session()->get('user_id');
        $request->validate([
            'tracking_content' => 'required',
        ]);
        $update = Tracking::where('id', $id)->update([
            'user_id'  => $user_id,
            'tracking_content' => $request->tracking_content,
            'updated_at' => Carbon::now(),
        ]);

        if($update)
        {
            return Redirect()->route('tracking.trackings')->with('success', 'Tracking Update Successfully!');
        }else{
            return Redirect()->back()->with('message', 'Something went wrong, or connection error. Try again later.');
        }
    }

    public function delete_tracking(Request $request, $id)
    {
        $delete = Tracking::findOrFail($id)->delete();
        if($delete)
        {
            return Redirect()->route('tracking.trackings')->with('success', 'Tracking deleted Successfully!');
        }else{
            return Redirect()->back()->with('message', 'Something went wrong, or connection error. Try again later.');
        }
    }
}
