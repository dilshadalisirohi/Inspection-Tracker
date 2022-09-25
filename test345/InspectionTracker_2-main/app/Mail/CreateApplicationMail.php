<?php

namespace App\Mail;

use App\Models\Application;
use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateApplicationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $templateDetails = EmailTemplate::find(1);
        $application = Application::find($this->id);
        $template = $templateDetails->template;
        $template = str_replace('applicant_name', $application->applicant_name, $template);
        $template = str_replace('applicant_address', $application->applicant_address, $template);
        $template = str_replace('applicant_city', $application->applicant_city, $template);
        $template = str_replace('applicant_county', $application->applicant_county, $template);

        $template = str_replace('requester_name', $application->requester_name, $template);
        $template = str_replace('requester_email', $application->requester_email, $template);
        $template = str_replace('requester_phone', $application->requester_phone, $template);
        $template = str_replace('company', $application->company, $template);

        $template = str_replace('supervisor_name', $application->supervisor_name, $template);
        $template = str_replace('supervisor_email', $application->supervisor_email, $template);
        $template = str_replace('supervisor_phone', $application->supervisor_phone, $template);

        $template = str_replace('construction_type', $application->construction_type, $template);
        $template = str_replace('floor_plan', $application->floor_plan, $template);
        $template = str_replace('region', $application->region, $template);
        $template = str_replace('created_time', $application->created_at, $template);

        return $this->subject($templateDetails->subject)
            ->view('mail.CreateApplication', [
                'template' => $template
            ]);
    }
}
