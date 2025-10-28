<?php

namespace App\Mail;

use App\Models\Ridesbooked;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class RideDeliverNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(Ridesbooked $ride)
    {
        $this->ride = $ride;
    }

    public function build()
    {

        return $this->subject('Carrier is on its way to delivery location' )
            ->view('emails.ride-deliver')
            ->with([
                'ride' => $this->ride,
            ]);
    }
}
