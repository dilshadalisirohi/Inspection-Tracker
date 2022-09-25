<?php

namespace App\Jobs;

use App\Mail\CreateApplicationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CreateApplicationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $applicationId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $applicationId)
    {
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
        $emailData = new CreateApplicationMail($this->applicationId);
        Mail::to($this->email)->send($emailData);
    }
}
