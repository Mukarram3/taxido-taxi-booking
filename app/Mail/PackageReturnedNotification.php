<?php

namespace App\Mail;

use App\Models\Ridesbooked;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PackageReturnedNotification extends Mailable
{
    use Queueable, SerializesModels;


    public $ride;

    public function __construct(Ridesbooked $ride)
    {
        $this->ride = $ride;
    }

    public function build()
    {
        return $this->subject('Your Package Has Been Returned')
            ->view('emails.user-package-return-request');
    }
}
