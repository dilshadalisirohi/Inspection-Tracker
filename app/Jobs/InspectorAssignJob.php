<?php

namespace App\Jobs;

use App\Mail\InspectorAssignMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class InspectorAssignJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $applicationId;
    protected $updatedBy;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($updatedBy, $email, $applicationId)
    {
        $this->updatedBy = $updatedBy;
        $this->email = $email;
        $this->applicationId = $applicationId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailData = new InspectorAssignMail($this->updatedBy, $this->applicationId);
        Mail::to($this->email)->send($emailData);
    }
}
