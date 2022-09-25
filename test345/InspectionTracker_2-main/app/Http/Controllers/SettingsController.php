<?php

namespace App\Http\Controllers;

use App\Jobs\StatusChangeJob;
use App\Models\Auditor;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SettingsController extends Controller
{
    function __construct() {
        date_default_timezone_set('America/Chicago');
    }

    function callQueue() {
        $result = DB::table('jobs')->get();
        if(count($result) > 0) {
            $exitCode = Artisan::call('queue:work --once');
            echo json_encode($exitCode);
        } else {
            echo json_encode('No Queue Pending!');
        }
    }

    function index() {
        $settings = Setting::find(1);
        $data['driver'] = env('MAIL_DRIVER');
        $data['host'] = env('MAIL_HOST');
        $data['port'] = env('MAIL_PORT');
        $data['username'] = env('MAIL_USERNAME');
        $data['password'] = env('MAIL_PASSWORD');
        $data['encryption'] = env('MAIL_ENCRYPTION');
        $data['address'] = env('MAIL_FROM_ADDRESS');
        $data['name'] = env('MAIL_FROM_NAME');
        return view('settings', [
            'settings' => $settings,
            'data' => $data
        ]);
    }

    function emailSettings() {
        $settings = Setting::find(1);
        $data['driver'] = env('MAIL_DRIVER');
        $data['host'] = env('MAIL_HOST');
        $data['port'] = env('MAIL_PORT');
        $data['username'] = env('MAIL_USERNAME');
        $data['password'] = env('MAIL_PASSWORD');
        $data['encryption'] = env('MAIL_ENCRYPTION');
        $data['address'] = env('MAIL_FROM_ADDRESS');
        $data['name'] = env('MAIL_FROM_NAME');
        return view('emailSettings', ['data' => $data, 'settings' => $settings]);
    }

    function updateEmailSettings(Request $request) {
        $validate = $request->validate([
            'host' => 'required',
            'port' => 'required',
            'username' => 'required',
            'password' => 'required',
            'encryption' => 'required',
            'name' => 'required',
            'address' => 'required'
        ]);

        $name = '"'.$request->input("name").'"';

        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'MAIL_HOST=' . env('MAIL_HOST'), 'MAIL_HOST=' . $request->input('host'), file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_PORT=' . env('MAIL_PORT'), 'MAIL_PORT=' . $request->input('port'), file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_USERNAME=' . env('MAIL_USERNAME'), 'MAIL_USERNAME=' . $request->input('username'), file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_PASSWORD=' . env('MAIL_PASSWORD'), 'MAIL_PASSWORD=' . $request->input('password'), file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_ENCRYPTION=' . env('MAIL_ENCRYPTION'), 'MAIL_ENCRYPTION=' . $request->input('encryption'), file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_FROM_ADDRESS=' . env('MAIL_FROM_ADDRESS'), 'MAIL_FROM_ADDRESS=' . $request->input('address'), file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'MAIL_FROM_NAME=' . '"'.env('MAIL_FROM_NAME').'"', 'MAIL_FROM_NAME=' . $name, file_get_contents($path)
            ));
        }

        Artisan::call('cache:clear');

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => 'Email Settings Updated',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        session()->flash('message', 'updated');
        return Redirect::to('/admin/settings');
    }

function updateReportSettings(Request $request)
{

        $request->validate([

            'report_glo' => 'required',
            'report_contact' => 'required'
        ]);

        $result = Setting::where("id", 1)->update([
            'report_glo' => $request->input('report_glo'),
            'report_contact' => $request->input('report_contact')

        ]);


        if($result) {
            session()->flash('message', 'updated');
            return redirect('admin/settings');
        } else {
            session()->flash('message', 'failed');
              return Redirect::to('admin/settings');
        }

}


    function updateSettings(Request $request) {
        $validate = $request->validate([
           'title' => 'required'
        ]);
        $settings = Setting::find(1);

        if($request->hasFile('logo')) {
            $photoName = $request->logo->store('public/uploads');
            $logo = str_replace('public/uploads/', '', $photoName);
            if($settings->logo != null || $settings->logo != "") {
                //unlink(storage_path('public/system/'.$oldSettings->logo));
                Storage::delete('public/uploads/'.$settings->logo);
            }
        } else {
            $logo = $settings->logo;
        }

        if($request->hasFile('favicon')) {
            $photoName = $request->favicon->store('public/uploads');
            $favicon = str_replace('public/uploads/', '', $photoName);
            if($settings->favicon != null || $settings->favicon != "") {
                //unlink(storage_path('public/system/'.$oldSettings->logo));
                Storage::delete('public/uploads/'.$settings->favicon);
            }
        } else {
            $favicon = $settings->favicon;
        }

        Setting::where('id', 1)->update([
            'title' => $request->input('title'),
            'logo' => $logo,
            'favicon' => $favicon,
            // 'report_glo' => $request->input('report_glo'),
            // 'report_contact' => $request->input('report_contact')
        ]);

        session()->flash('message', 'updated');
        return Redirect::to('admin/settings');
    }

    function auditor() {
        return view('auditor');
    }

    function getAudits() {
        $audits = Auditor::all();

        $auditArray = [];

        foreach ($audits as $value) {
            $auditData = array(
                'id' => $value->id,
                'notifications' => $value->notification,
                'date' => date('Y-m-d H:i:s', $value->date),
                'user' => User::find($value->user_id)->name
            );

            array_push($auditArray, $auditData);
        }

        return DataTables::of($auditArray)
            ->addColumn('notification', function($auditArray) {
                return $auditArray['notifications'];
            })
            ->rawColumns(['notification'])
            ->make(true);
    }

    function test() {
//        $data = array();
//        $email = 'prt83102@gmail.com';
//        $from_email = env('MAIL_FROM_ADDRESS');
//        $from_name = env('MAIL_FROM_NAME');
//        Mail::send('mail.Test', $data, function($message) use ($email, $from_email, $from_name) {
//            $message->to($email)
//                ->subject('Testing SMTP Settings');
//            $message->from($from_email, $from_name);
//        });
//        echo json_encode("success");
        dispatch(new StatusChangeJob(Auth::user()->id, 'prt83102@gmail.com', 10));
    }
}
