<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class StaffController extends Controller
{
    function __construct() {
        date_default_timezone_set('America/Chicago');
    }

    function index() {
        return view('staff');
    }

    function getStaffs() {
        $staffs = User::whereNotIn('role_id', [1])->get();
        $staffArray = [];

        foreach ($staffs as $value) {
            $staffData = array(
                'id' => $value->id,
                'name' => $value->name,
                'email' => $value->email,
                'role_id' => $value->role_id,
                'status_text' => $value->status
            );

            array_push($staffArray, $staffData);
        }

        return DataTables::of($staffArray)
            ->addColumn('action', function($staffArray) {
                return '<a class="btn btn-warning hd-table-btn editCompany mr-1" href="'.url('/admin/edit-staff').'/'.$staffArray['id'].'" data-id="'.$staffArray['id'].'">Edit</a>
                ';
//                <a class="btn btn-danger hd-table-btn deleteStaff" data-id="'.$staffArray['id'].'">Delete</a>
            })
            ->addColumn('status', function ($staffArray) {
                if($staffArray['status_text'] == '1') {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Deactive</span>';
                }
            })
            ->addColumn('role', function ($staffArray) {
                if($staffArray['role_id'] == '3') {
                    return '<span class="badge badge-info">Inspector</span>';
                } else if($staffArray['role_id'] == '4') {
                    return '<span class="badge badge-warning">Viewer</span>';
                } else {
                    return '<span class="badge badge-primary">Admin</span>';
                }
            })
            ->rawColumns(['action', 'status', 'role'])
            ->make(true);
    }

    function deleteStaff($id) {
        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => User::find($id)->name . ' Staff Deleted',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);
        User::where('id', $id)->delete();
        echo json_encode('success');
    }

    function addStaffView() {
        return view('addStaff');
    }

    function editStaffView($id) {
        $user = User::find($id);
        return view('editStaff', [
            'user' => $user
        ]);
    }

    function checkEmail($email) {
        $result = User::where('email', $email)->get();
        if(count($result) > 0) {
            echo json_encode('taken');
        }
    }

    function checkUserEmail($email, $id) {
        $user = User::find($id);
        if($email == $user->email) {

        } else {
            $result = User::where('email', $email)->get();
            if(count($result) > 0) {
                echo json_encode('taken');
            }
        }
    }

    function createStaff(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'status' => 'required',
            'password' => 'required'
        ]);

        $result = User::create([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'role_id' => $request->input('role'),
            'status' => $request->input('status'),
            'img' => 'avatar.png'
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => 'New Staff Created',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'success');
            return redirect('admin/staff');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/add-staff');
        }
    }

    function updateStaff(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);

        $password = User::find($request->input('id'))->password;
        if($request->input('password')) {
            $password = bcrypt($request->input('password'));
        }

        $result = User::where("id", $request->input('id'))->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role'),
            'password' => $password,
            'status' => $request->input('status')
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => User::find($request->input('id'))->name . ' Staff Updated',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'updated');
            return redirect('admin/staff');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/add-staff');
        }
    }

    function viewProfile() {
        $user = User::find(Auth::user()->id);
        return view('profile', [
            'user' => $user
        ]);
    }

    function updateProfile(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);

        if($request->input('password')) {
            $password = bcrypt($request->input('password'));
        } else {
            $password = Auth::user()->password;
        }

        if($request->hasFile('img')) {
            $photoName = $request->img->store('public/uploads');
            $img = str_replace('public/uploads/', '', $photoName);
        } else {
            $img = Auth::user()->img;
        }

        $result = User::where("id", $request->input('id'))->update([
           'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'img' => $img
        ]);

        if($result) {
            session()->flash('message', 'updated');
            return redirect('profile');
        } else {
            session()->flash('message', 'failed');
            return redirect('profile');
        }
    }

    function contractorStaff() {
        return view('ContractorStaff');
    }

    function contractorStaffs() {
        $staffs = User::whereNotNull('company_id')->where('status', 1)->get();
        $staffArray = [];

        foreach ($staffs as $value) {
            $staffData = array(
                'id' => $value->id,
                'name' => $value->name,
                'email' => $value->email,
                'phone' => $value->phone,
                'contractor' => Company::find($value->company_id)->name
            );

            array_push($staffArray, $staffData);
        }

        return DataTables::of($staffArray)
            ->make(true);
    }
}
