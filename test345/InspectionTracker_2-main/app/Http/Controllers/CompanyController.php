<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    function __construct() {
        date_default_timezone_set('America/Chicago');
    }

    function index() {
        return view('company');
    }

    function getCompanies() {
        $companies = Company::all();
        $companyArray = [];

        foreach ($companies as $value) {
            $companyData = array(
                'id' => $value->id,
                'name' => $value->name
            );

            array_push($companyArray, $companyData);
        }

        return DataTables::of($companyArray)
            ->addColumn('action', function($companyArray) {
                return '<a class="btn btn-info hd-table-btn mr-1" href="'.url('/admin/company-staffs').'/'.$companyArray['id'].'" data-id="'.$companyArray['id'].'">Contractor Staff</a>
                <a class="btn btn-warning hd-table-btn editCompany mr-1" href="'.url('/admin/edit-company').'/'.$companyArray['id'].'" data-id="'.$companyArray['id'].'">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    function getCompanyStaffs() {
        $id = $_GET['id'];
        $staffs = User::where('company_id', $id)->get();
        $staffArray = [];

        foreach ($staffs as $value) {
            $staffData = array(
                'id' => $value->id,
                'name' => $value->name,
                'email' => $value->email,
                'phone' => $value->phone,
                'status_text' => $value->status
            );

            array_push($staffArray, $staffData);
        }

        return DataTables::of($staffArray)
            ->addColumn('action', function($staffArray) {
                return '<a class="btn btn-warning hd-table-btn editCompanyUser mr-1" href="'.url('/admin/edit-company-user').'/'.$staffArray['id'].'" data-id="'.$staffArray['id'].'">Edit</a>
                <a class="btn btn-danger hd-table-btn deleteCompanyUser mr-1" data-id="'.$staffArray['id'].'">Delete</a>';
            })
            ->addColumn('status', function ($staffArray) {
                if($staffArray['status_text'] == '1') {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Deactive</span>';
                }
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    function addCompanyView() {
        return view('addCompany');
    }

    function editCompanyView($id) {
        $company = Company::find($id);
        return view('editCompany', [
            'company' => $company
        ]);
    }

    function addCompanyUserView() {
        $companies = Company::all();
        return view('addCompanyUser', [
            'companies' => $companies
        ]);
    }

    function updateCompanyUserView($id) {
        $user = User::find($id);
        $companies = Company::all();
        return view('editCompanyUser', [
            'user' => $user,
            'companies' => $companies
        ]);
    }

    function companyStaffs($id) {
        return view('companyUsers', [
            'id' => $id
        ]);
    }

    function createCompany(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $result = Company::create([
            'name' => $request->input('name')
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => 'New Contractor Created',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'success');
            return redirect('admin/company');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/add-company');
        }
    }

    function createCompanyUser(Request $request) {
        $request->validate([
           'name' => 'required',
           'email' => 'required|unique:users',
           'status' => 'required',
           'company_id' => 'required',
            'password' => 'required'
        ]);

        if($request->input('password')) {
            $password = bcrypt($request->input('password'));
        } else {
            $password = bcrypt(12345678);
        }

        $result = User::create([
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'role_id' => 1,
           'company_id' => $request->input('company_id'),
           'status' => $request->input('status'),
           'password' => $password
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => 'New Contractor Staff Created',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'success');
            return redirect('admin/company');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/company');
        }
    }

    function updateCompanyUser(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'company_id' => 'required'
        ]);

        if($request->input('password')) {
            $password = bcrypt($request->input('password'));
        } else {
            $password = User::find($request->input('id'))->password;
        }

        $result = User::where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role_id' => 1,
            'company_id' => $request->input('company_id'),
            'status' => $request->input('status'),
            'password' => $password
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => User::find($request->input('id'))->name . ' Contractor Staff Updated',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'updated');
            return redirect('admin/company');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/company');
        }
    }

    function updateCompany(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);

        $result = Company::where('id', $request->input('id'))->update([
            'name' => $request->input('name')
        ]);

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => Company::find($request->input('id'))->name . ' Contractor Updated',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($result) {
            session()->flash('message', 'updated');
            return redirect('admin/company');
        } else {
            session()->flash('message', 'failed');
            return redirect('admin/edit-company/'.$request->input('id'));
        }
    }

    function deleteCompanyUser($id) {
        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => Company::find($id)->name . ' Contractor Deleted',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        User::where('id', $id)->delete();

        echo json_encode('success');
    }
}
