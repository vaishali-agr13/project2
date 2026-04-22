<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobPostedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;

    public function __construct($job)
    {
        $this->job = $job;
    }

    public function build()
    {
        return $this->subject('New Job Posted')
                    ->view('emails.job_posted');
    }
}