<h2>Price Negotiation Rejected for the Ride</h2>

<p>Dear Carrier {{ $driverfarerequest->driver->name }},</p>

<p>Your price negotiation request for the ride from <strong>{{ $driverfarerequest->userriderequest->pickup_location }}</strong> to <strong>{{ $driverfarerequest->userriderequest->destination_location }}</strong> has been rejected by the Sender</p>

<ul>
    <li>Departure Date: {{ $driverfarerequest->userriderequest->departure_date }}</li>
    <li>Arrival Date: {{ $driverfarerequest->userriderequest->arrival_date }}</li>
    <li>Proposed Fare: ${{ $driverfarerequest->requested_fare }}</li>
    <li>Title: {{ $driverfarerequest->userriderequest->transport_title }}</li>
    <li>Quantity: {{ $driverfarerequest->userriderequest->quantity_of_package }}</li>
    <li>Payment Method: {{ $driverfarerequest->userriderequest->payment_method }}</li>
</ul>

<p>Please try to increase or decrease the Fare.</p>

<p>Thank you for using our service.</p>
