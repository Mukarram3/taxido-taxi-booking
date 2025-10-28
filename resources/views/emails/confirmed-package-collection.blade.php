<p>Dear {{ $ride->user->name }},</p>

<p>Carrier {{ $ride->driver->name }} has confirmed package collection to collection address</p>
<ul>
    <li> Kilos reserved: {{ $ride->reserved_kilo }}</li>
    <li>
        Total Fare: {{ $ride->price_per_kilo }} * {{ $ride->reserved_kilo }} =
        {{ $ride->driverriderequest->price_currency }}{{ $ride->price_per_kilo * $ride->reserved_kilo }}
    </li>
    <li>Receiver Name: {{ $ride->userfarerequest->receiver_name }}</li>
    <li>Receiver Email: {{ $ride->userfarerequest->receiver_email }}</li>
    <li>Receiver Phone: {{ $ride->userfarerequest->receiver_phone }}</li>
</ul>

<p>Thank you for using our service.</p>
