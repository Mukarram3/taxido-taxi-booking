<?php

namespace App\Mail;

use App\Models\Ridesbooked;
use App\Models\Userriderequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RideCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(Userriderequest $ride)
    {
        $this->ride = $ride;
    }

    public function build(): RideCreated
    {
        return $this->subject('Ride Has Been Created')
            ->view('emails.ride-created');
    }
}
