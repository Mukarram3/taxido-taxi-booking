<?php

namespace App\Mail;

use App\Models\ReservedKiloRidebooked;
use App\Models\Ridesbooked;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CarrierStartedReservedKiloRide extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(ReservedKiloRidebooked $ride)
    {
        $this->ride = $ride;
    }

    public function build(): CarrierStartedReservedKiloRide
    {
        return $this->subject('Carrier on the way to Destination Address')
            ->view('emails.carrier-started-reserved-kilo-ride');
    }
}
