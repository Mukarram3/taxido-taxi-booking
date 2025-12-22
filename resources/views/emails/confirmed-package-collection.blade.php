<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Collection Confirmed - JeConfie</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f4f4f4;">
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f4f4f4; padding: 20px 0;">
    <tr>
        <td align="center">
            <!-- Main Container -->
            <table cellspacing="0" cellpadding="0" border="0" width="600" style="max-width: 600px; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

                <!-- Header -->
                <tr>
                    <td align="center" bgcolor="#3498db" style="background-color: #3498db; padding: 30px 20px;">
                        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: bold;">JeConfie</h1>
                        <p style="color: #ffffff; margin: 10px 0 0 0; font-size: 14px;">Transport collaboratif</p>
                    </td>
                </tr>

                <!-- Success Badge -->
                <tr>
                    <td align="center" style="padding: 20px 30px 0 30px;">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td bgcolor="#27ae60" style="background-color: #27ae60; color: #ffffff; padding: 10px 30px; border-radius: 25px; font-weight: bold; font-size: 14px;">
                                    ✓ Package Collected
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding: 40px 30px 30px 30px;">
                        <h2 style="color: #2c3e50; font-size: 22px; margin: 0 0 20px 0;">
                            Dear {{ $ride->user->name }},
                        </h2>

                        <p style="color: #555555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
                            Carrier <strong>{{ $ride->driver->name }}</strong> has <strong>confirmed package collection</strong> at the collection address.
                            Your package is now in transit to its destination.
                        </p>
                    </td>
                </tr>

                <!-- Package Details -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #e8f5e9; border-left: 4px solid #27ae60; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #27ae60; font-size: 18px; margin: 0 0 15px 0;">
                                        📦 Package Details
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #27ae60; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Kilos reserved:</strong> {{ $ride->reserved_kilo }} kg
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #27ae60; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Total Fare:</strong> {{ $ride->price_per_kilo }} × {{ $ride->reserved_kilo }} = {{ $ride->driverriderequest->price_currency }}{{ $ride->price_per_kilo * $ride->reserved_kilo }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Receiver Information -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #f8f9fa; border-left: 4px solid #3498db; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #2c3e50; font-size: 18px; margin: 0 0 15px 0;">
                                        👤 Receiver Information
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px; width: 100px;">
                                                Name:
                                            </td>
                                            <td style="padding: 8px 0; color: #2c3e50; font-size: 14px; font-weight: 600;">
                                                {{ $ride->userfarerequest->receiver_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                Email:
                                            </td>
                                            <td style="padding: 8px 0; color: #2c3e50; font-size: 14px;">
                                                <a href="mailto:{{ $ride->userfarerequest->receiver_email }}" style="color: #3498db; text-decoration: none;">
                                                    {{ $ride->userfarerequest->receiver_email }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                Phone:
                                            </td>
                                            <td style="padding: 8px 0; color: #2c3e50; font-size: 14px;">
                                                <a href="tel:{{ $ride->userfarerequest->receiver_phone }}" style="color: #3498db; text-decoration: none;">
                                                    {{ $ride->userfarerequest->receiver_phone }}
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Status Update -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #fff3cd; border-left: 4px solid #f59e0b; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #d97706; font-size: 16px; margin: 0 0 10px 0;">
                                        📍 Next Steps
                                    </h3>
                                    <p style="color: #92400e; font-size: 14px; margin: 0; line-height: 1.6;">
                                        Your package is currently in transit. The receiver will be notified when the package is nearby for delivery.
                                        You can track the delivery status in real-time from your dashboard.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Thank You Message -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <p style="color: #7f8c8d; font-size: 14px; line-height: 1.6; margin: 0; text-align: center;">
                            Thank you for using our service.
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td bgcolor="#34495e" style="background-color: #34495e; padding: 25px 30px; text-align: center;">
                        <p style="color: #ecf0f1; font-size: 14px; margin: 0 0 10px 0;">
                            <strong>JeConfie.com</strong> - Collaborative Transport
                        </p>

                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td align="center" style="padding: 15px 0;">
                                    <a href="{{ url('/') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Website</a>
                                    <span style="color: #7f8c8d;">|</span>
                                    <a href="{{ url('/contact-jeconfie') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Contact</a>
                                    <span style="color: #7f8c8d;">|</span>
                                    <a href="{{ url('/faq') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">FAQ</a>
                                </td>
                            </tr>
                        </table>

                        <p style="color: #7f8c8d; font-size: 11px; margin: 15px 0 0 0;">
                            © 2025 JeConfie.com - All rights reserved
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
