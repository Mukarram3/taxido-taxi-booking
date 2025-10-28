<?php

namespace App\Mail;

use App\Models\Driverfarerequest;
use App\Models\Ridesbooked;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FareRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $driverfarerequest;

    public function __construct(Driverfarerequest $driverfarerequest)
    {
        $this->driverfarerequest = $driverfarerequest;
    }

    public function build(): FareRejected
    {
        return $this->subject('Fare Rejected')
            ->view('emails.price-negotiation-rejected');
    }
}
