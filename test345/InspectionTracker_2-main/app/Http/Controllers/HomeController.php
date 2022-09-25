<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

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
        return view('home');
    }

    function contractorData($id) {
        if($id == 'all') {
            $data['total'] = count(Application::all());
            $data['scheduled'] = count(Application::where('inspection_status', 'Scheduled')->get());
            $data['cancelled'] = count(Application::where('inspection_status', 'Cancelled')->get());
            $data['submitted'] = count(Application::where('inspection_status', 'Submitted')->get());
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
        }

        echo json_encode($data);
    }
}
