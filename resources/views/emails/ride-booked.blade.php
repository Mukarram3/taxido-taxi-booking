<h2>Your Ride is Confirmed</h2>

<p>Dear {{ $ride->user->name }},</p>

<p>Your ride from <strong>{{ $ride->pickup_location }}</strong> to <strong>{{ $ride->destination_location }}</strong> has been booked.</p>

<ul>
    <li>Departure Date: {{ $ride->departure_date }}</li>
    <li>Arrival Date: {{ $ride->arrival_date }}</li>
    <li>Fare: ${{ $ride->fare }}</li>
    <li>Package Type: {{ $ride->type_of_package }}</li>
    <li>Quantity: {{ $ride->quantity_of_package }}</li>
    <li>Payment Method: {{ $ride->payment_method }}</li>
</ul>

<p>Thank you for using our service.</p>
