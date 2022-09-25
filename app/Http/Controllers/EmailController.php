<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{
    function __construct() {
        date_default_timezone_set('America/Chicago');
    }

    function emailTemplates() {
        $types = EmailTemplate::all();
        return view('emailTemplate', [
            'types' => $types
        ]);
    }

    function updateEmailTemplate(Request $request) {
        $validator = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'type' => 'required'
        ]);

        EmailTemplate::where('id', $request->input('type'))->update([
            'subject' => $request->input('subject'),
            'template' => $request->input('message')
        ]);

        session()->flash('message', 'success');
        return Redirect::to('admin/email-templates');
    }

    function getEmailTemplateById($id) {
        echo json_encode(EmailTemplate::find($id));
    }
}
