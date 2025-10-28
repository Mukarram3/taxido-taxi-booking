<?php

namespace App\Mail;

use App\Models\Driverfarerequest;
use App\Models\Ridesbooked;
use App\Models\Userfarerequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservedKiloPriceNegotiationSend extends Mailable
{
    use Queueable, SerializesModels;

    public $Userfarerequest;

    public function __construct(Userfarerequest $Userfarerequest)
    {
        $this->Userfarerequest = $Userfarerequest;
    }

    public function build(): ReservedKiloPriceNegotiationSend
    {
        return $this->subject('Price Negotiation sent for the offer')
            ->view('emails.reserved-kilo-price-negotiation-send');
    }
}
