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

class ReservedKiloRidePackageReturned extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(ReservedKiloRidebooked $ride)
    {
        $this->ride = $ride;
    }

    public function build(): ReservedKiloRidePackageReturned
    {
        return $this->subject('Parcel Return confirmed')
            ->view('emails.reserved-kilo-parcel-returned');
    }
}
