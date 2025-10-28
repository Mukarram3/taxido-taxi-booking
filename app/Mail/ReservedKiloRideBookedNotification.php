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

class ReservedKiloRideBookedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(ReservedKiloRidebooked $ride)
    {
        $this->ride = $ride;
    }

    public function build(): ReservedKiloRideBookedNotification
    {
        return $this->subject('Your Ride Has Been Booked')
            ->view('emails.reserved-kilo-ride-booked');
    }
}
