<h2>Price Negotiation Sent for the Ride</h2>

<p>Dear Carrier/Sender,</p>

<p>
    Your price negotiation request for the ride from
    <strong>{{ is_array($Userfarerequest->driverriderequest->pickup_location) ? implode('-> ', $Userfarerequest->driverriderequest->pickup_location) : $Userfarerequest->driverriderequest->pickup_location }}</strong>
    to
    <strong>{{ is_array($Userfarerequest->driverriderequest->destination_location) ? implode('-> ', $Userfarerequest->driverriderequest->destination_location) : $Userfarerequest->driverriderequest->destination_location }}</strong>
    has been sent to the Carrier for review.
</p>


<ul>
    <li> Kilos to reserve: {{ $Userfarerequest->requested_kilos }}</li>
    <li>Requested Fare: {{ $Userfarerequest->driverriderequest->price_currency }}{{ $Userfarerequest->requested_fare }}</li>
    <li>Receiver Name: {{ $Userfarerequest->receiver_name }}</li>
    <li>Receiver Email: {{ $Userfarerequest->receiver_email }}</li>
    <li>Receiver Phone: {{ $Userfarerequest->receiver_phone }}</li>
</ul>

<p>Thank you for using our service.</p>
