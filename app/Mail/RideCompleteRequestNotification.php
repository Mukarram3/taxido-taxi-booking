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

class RideCompleteRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(Ridesbooked $ride)
    {
        $this->ride = $ride;
    }

    public function build(): RideCompleteRequestNotification
    {
        $signedUrl = URL::temporarySignedRoute(
            'user.ride.complete', // This should match your named route
            now()->addMinutes(60),
            [
                'ride' => $this->ride->id,
                'token' => sha1($this->ride->receiver_email),
            ]
        );

        return $this->subject('Carrier Requested to Complete Your Ride')
            ->view('emails.ride-complete-request')
            ->with([
                'ride' => $this->ride,
                'completeLink' => $signedUrl,
            ]);
    }
}
