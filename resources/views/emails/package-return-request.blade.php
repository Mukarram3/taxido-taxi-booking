<h2 style="color: #2e6da4;">🚗 Package Return Acceptance Requested</h2>

<p>Dear User,</p>

<p>The Carrier has requested to Validate the <strong>Package Acceptance</strong>.</p>

<h4 style="margin-top: 20px;">📝 Ride Details</h4>
<ul style="line-height: 1.6;">
    <li><strong>Departure Date:</strong> {{ $ride->departure_date }}</li>
    <li><strong>Arrival Date:</strong> {{ $ride->arrival_date }}</li>
    <li><strong>Fare:</strong> ${{ $ride->fare }}</li>
    <li><strong>Package Type:</strong> {{ $ride->type_of_package }}</li>
    <li><strong>Quantity:</strong> {{ $ride->quantity_of_package }}</li>
    <li><strong>Payment Method:</strong> {{ $ride->payment_method }}</li>
</ul>

<p>If Package Received, please confirm the Package Acceptance by clicking below button.</p>

<p>
    <a href="{{ $packageReturnedlLink }}" style="
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    ">
        ✅ Confirm Package Return
    </a>
</p>


<p>Thank you for using our service. Let us know if you have any questions or concerns.</p>

<p style="margin-top: 30px;">Best regards,<br>
    <strong>The RideShare Team</strong></p>
