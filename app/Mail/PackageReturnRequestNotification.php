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

class PackageReturnRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ride;

    public function __construct(Ridesbooked $ride)
    {
        $this->ride = $ride;
    }

    public function build(): PackageReturnRequestNotification
    {
        $signedUrl = URL::temporarySignedRoute(
            'user.package.returned', // This should match your named route
            now()->addMinutes(60),
            [
                'ride' => $this->ride->id,
                'token' => sha1($this->ride->receiver_email),
            ]
        );

        return $this->subject('Carrier Requested to Validate Package Acceptance')
            ->view('emails.package-return-request')
            ->with([
                'ride' => $this->ride,
                'packageReturnedlLink' => $signedUrl,
            ]);
    }
}
