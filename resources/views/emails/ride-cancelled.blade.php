<h2>Your Ride is Cancelled</h2>

<p>Dear {{ $ride->user->name }},</p>

<p>Your ride from <strong>{{ $ride->pickup_location }}</strong> to <strong>{{ $ride->destination_location }}</strong> has been cancelled by the carrier due to following reasons.</p>

<ul>
    <li>Reason: {{ $ride->message }}</li>
</ul>

<p>Apologize for the inconvenience.</p>
