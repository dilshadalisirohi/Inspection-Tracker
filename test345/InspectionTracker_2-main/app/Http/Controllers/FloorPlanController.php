<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\FloorPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FloorPlanController extends Controller
{
    function __construct() {
        date_default_timezone_set('America/Chicago');
    }

    function index() {
        return view('floorplan');
    }

    function getFloorPlans() {
        $floorplans = FloorPlan::all();
        $floorPlanArray = [];

        foreach ($floorplans as $value) {
            $floorPlanData = array(
                'id' => $value->id,
                'name' => $value->name,
                'br_bath' => $value->br_bath,
                'housing_guideline_sqft' => $value->housing_guideline_sqft,
                'front_porch_sqft' => $value->front_porch_sqft,
                'back_porch_sqft' => $value->back_porch_sqft,
                'total_sqft' => $value->total_sqft,
                'attachments' => $value->attachments != null ? explode(',', $value->attachments) : []
            );

            array_push($floorPlanArray, $floorPlanData);
        }

        return DataTables::of($floorPlanArray)
            ->addColumn('action', function($floorPlanArray) {
                if(Auth::user()->role_id == 2) {
                    return '<a class="btn btn-warning hd-table-btn editFloorPlan mr-1" href="'.url('/admin/edit-floorplan').'/'.$floorPlanArray['id'].'" data-id="'.$floorPlanArray['id'].'">Edit</a>
                <a class="btn btn-danger hd-table-btn deleteFloorPlan" data-id="'.$floorPlanArray['id'].'">Delete</a>';
                } else {
                    return '';
                }
            })
            ->addColumn('attachment', function($floorPlanArray) {
                $buttons = '';
                foreach($floorPlanArray['attachments'] as $attachment) {
                    $buttons .= '<a class="btn btn-success mb-1" target="_blank" href="'.url('public/storage/uploads/'.$attachment).'">File</a>';
                }
                return $buttons;
            })
            ->rawColumns(['action', 'attachment'])
            ->make(true);
    }

    function addFloorPlanView() {
        return view('addFloorPlan');
    }

    function editFloorPlanView($id) {
        $floorplan = FloorPlan::find($id);
        return view('editFloorPlan', [
            'floorplan' => $floorplan
        ]);
    }

    function createFloorPlan(Request $request) {
        $request->validate([
           'name' => 'required',
           'br_bath' => 'required',
            'housing_guideline_sqft' => 'required',
            'front_porch_sqft' => 'required',
            'back_porch_sqft' => 'required',
            'total_sqft' => 'required'
        ]);

        $attachments = [];
        if ($request->hasFile('attachments')) {
            $allowedExtension = ['svg','jpg','png','gif','jpeg'];
            $files = $request->file('attachments');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedExtension);
                if ($check) {
                    $photoName =  $file->store('public/uploads/');
                    //$photoName =  $request->image->store('public/uploads');
                    $photoName = str_replace('public/uploads/', '', $photoName);
                    array_push($attachments, $photoName);
                }
            }

            $attachments = implode(',',$attachments);
        } else {
            $attachments = null;
        }

        $result = FloorPlan::create([
            'name' => $request->input('name'),
            'br_bath' => $request->input('br_bath'),
            'housing_guideline_sqft' => $request->input('housing_guideline_sqft'),
            'front_porch_sqft' => $request->input('front_porch_sqft'),
            'back_porch_sqft' => $request->input('back_porch_sqft'),
            'total_sqft' => $request->input('total_sqft'),
            'attachments' => $attachments
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => 'New FloorPlan Added',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'success');
            return redirect('admin/floorplan');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/add-floorplan');
        }
    }

    function updateFloorPlan(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'br_bath' => 'required',
            'housing_guideline_sqft' => 'required',
            'front_porch_sqft' => 'required',
            'back_porch_sqft' => 'required',
            'total_sqft' => 'required'
        ]);

        $files = $request->file('attachments');
        $attachments = [];
        if ($request->hasFile('attachments')) {
            echo "Hello";
            $allowedExtension = ['svg','jpg','png','gif','jpeg'];
            //
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedExtension);
                if ($check) {
                    echo '1';
                    $photoName =  $file->store('public/uploads/');
                    //$photoName =  $request->image->store('public/uploads');
                    $photoName = str_replace('public/uploads/', '', $photoName);
                    array_push($attachments, $photoName);
                }
            }

            $attachments = implode(',',$attachments);
        } else {
            $attachments = FloorPlan::find($request->input("id"))->attachments;
        }

        $result = FloorPlan::where("id", $request->input('id'))->update([
            'name' => $request->input('name'),
            'br_bath' => $request->input('br_bath'),
            'housing_guideline_sqft' => $request->input('housing_guideline_sqft'),
            'front_porch_sqft' => $request->input('front_porch_sqft'),
            'back_porch_sqft' => $request->input('back_porch_sqft'),
            'total_sqft' => $request->input('total_sqft'),
            'attachments' => $attachments
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => FloorPlan::find($request->input("id"))->name . ' FloorPlan Updated',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'updated');
            return redirect('admin/floorplan');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/add-floorplan');
        }
    }

    function deleteFloorPlan($id) {
        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => FloorPlan::find($id)->name . ' FloorPlan Deleted',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        FloorPlan::where('id', $id)->delete();
        echo json_encode('success');
    }
}
