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

class ReservedKiloRideStartPackageReturn extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(ReservedKiloRidebooked $ride)
    {
        $this->ride = $ride;
    }

    public function build(): ReservedKiloRideStartPackageReturn
    {
        return $this->subject('Carrier is on its way to return Parcel')
            ->view('emails.reserved-kilo-start-package-return');
    }
}
