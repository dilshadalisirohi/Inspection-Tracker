<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inspectors = User::where('role_id', 3)->get();
        $contructors = Company::all();
        return view('home', [
            'inspectors' => $inspectors,
            'contructors' => $contructors
        ]);
    }

    function contractorData($id) {
        if (Auth::user()->role_id == 3) {
            $data = array();
            $data['scheduled_inspector'] = array();
            $data['submitted_inspector'] = array();
            $data['cancelled_inspector'] = array();
            if($id == 'all') {
                $data['total'] = count(Application::where('inspector_id', Auth::user()->id)->get());
                $data['scheduled'] = count(Application::where([
                    ['inspection_status', 'Scheduled'],
                    ['inspector_id', Auth::user()->id]
                ])->get());
                $data['cancelled'] = count(Application::where([
                    ['inspection_status', 'Cancelled'],
                    ['inspector_id', Auth::user()->id]
                ])->get());
                $data['submitted'] = count(Application::where([
                    ['inspection_status', 'Submitted'],
                    ['inspector_id', Auth::user()->id]
                ])->get());

                $data['inspectors'] = User::where('role_id', 3)->get();
                $count = 0;
                foreach ($data['inspectors'] as $inspector) {
                    $data['scheduled_inspector'][$count] = count(Application::where([
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Scheduled']
                    ])->get());

                    $data['submitted_inspector'][$count] = count(Application::where([
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Submitted']
                    ])->get());

                    $data['cancelled_inspector'][$count] = count(Application::where([
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Cancelled']
                    ])->get());

                    $count++;
                }
            } else {
                $data['total'] = count(Application::where([
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $id]
                ])->get());
                $data['scheduled'] = count(Application::where([
                    ['company_id', $id],
                    ['inspection_status', 'Scheduled'],
                    ['inspector_id', Auth::user()->id]
                ])->get());
                $data['cancelled'] = count(Application::where([
                    ['company_id', $id],
                    ['inspection_status', 'Cancelled'],
                    ['inspector_id', Auth::user()->id]
                ])->get());
                $data['submitted'] = count(Application::where([
                    ['company_id', $id],
                    ['inspection_status', 'Submitted'],
                    ['inspector_id', Auth::user()->id]
                ])->get());

                $data['inspectors'] = User::where('role_id', 3)->get();
                $count = 0;
                foreach ($data['inspectors'] as $inspector) {
                    $data['scheduled_inspector'][$count] = count(Application::where([
                        ['company_id', $id],
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Scheduled']
                    ])->get());

                    $data['submitted_inspector'][$count] = count(Application::where([
                        ['company_id', $id],
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Submitted']
                    ])->get());

                    $data['cancelled_inspector'][$count] = count(Application::where([
                        ['company_id', $id],
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Cancelled']
                    ])->get());

                    $count++;
                }
            }
        } else {
            $data = array();
            $data['scheduled_inspector'] = array();
            $data['submitted_inspector'] = array();
            $data['cancelled_inspector'] = array();
            if($id == 'all') {
                $data['total'] = count(Application::all());
                $data['scheduled'] = count(Application::where('inspection_status', 'Scheduled')->get());
                $data['cancelled'] = count(Application::where('inspection_status', 'Cancelled')->get());
                $data['submitted'] = count(Application::where('inspection_status', 'Submitted')->get());

                $data['inspectors'] = User::where('role_id', 3)->get();
                $count = 0;
                foreach ($data['inspectors'] as $inspector) {
                    $data['scheduled_inspector'][$count] = count(Application::where([
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Scheduled']
                    ])->get());

                    $data['submitted_inspector'][$count] = count(Application::where([
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Submitted']
                    ])->get());

                    $data['cancelled_inspector'][$count] = count(Application::where([
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Cancelled']
                    ])->get());

                    $count++;
                }
            } else {
                $data['total'] = count(Application::where('company_id', $id)->get());
                $data['scheduled'] = count(Application::where([
                    ['company_id', $id],
                    ['inspection_status', 'Scheduled']
                ])->get());
                $data['cancelled'] = count(Application::where([
                    ['company_id', $id],
                    ['inspection_status', 'Cancelled']
                ])->get());
                $data['submitted'] = count(Application::where([
                    ['company_id', $id],
                    ['inspection_status', 'Submitted']
                ])->get());

                $data['inspectors'] = User::where('role_id', 3)->get();
                $count = 0;
                foreach ($data['inspectors'] as $inspector) {
                    $data['scheduled_inspector'][$count] = count(Application::where([
                        ['company_id', $id],
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Scheduled']
                    ])->get());

                    $data['submitted_inspector'][$count] = count(Application::where([
                        ['company_id', $id],
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Submitted']
                    ])->get());

                    $data['cancelled_inspector'][$count] = count(Application::where([
                        ['company_id', $id],
                        ['inspector_id', $inspector->id],
                        ['inspection_status', 'Cancelled']
                    ])->get());

                    $count++;
                }
            }
        }

        echo json_encode($data);
    }
}
