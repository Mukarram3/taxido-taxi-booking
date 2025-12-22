<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Négociation de prix - JeConfie</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f4f4f4;">
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f4f4f4; padding: 20px 0;">
    <tr>
        <td align="center">
            <!-- Main Container -->
            <table cellspacing="0" cellpadding="0" border="0" width="650" style="max-width: 650px; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">

                <!-- Header -->
                <tr>
                    <td align="center" bgcolor="#3498db" style="background-color: #3498db; padding: 30px 20px;">
                        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: bold;">JeConfie</h1>
                        <p style="color: #ffffff; margin: 10px 0 0 0; font-size: 14px;">Transport collaboratif</p>
                    </td>
                </tr>

                <!-- Status Badge -->
                <tr>
                    <td align="center" style="padding: 20px 30px 0 30px;">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td bgcolor="#f39c12" style="background-color: #f39c12; color: #ffffff; padding: 10px 25px; border-radius: 25px; font-weight: bold; font-size: 14px;">
                                    💬 Proposition tarifaire envoyée
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding: 40px 30px 30px 30px;">
                        <h2 style="color: #2c3e50; font-size: 22px; margin: 0 0 20px 0;">
                            Bonjour {{ $recipientName ?? 'Utilisateur' }},
                        </h2>

                        <p style="color: #555555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
                            Une nouvelle <strong>négociation de prix</strong> a été envoyée pour le trajet suivant :
                        </p>
                    </td>
                </tr>

                <!-- Trip Details -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #fff8e1; border-left: 4px solid #f39c12; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #e67e22; font-size: 18px; margin: 0 0 15px 0;">
                                        🚚 Détails du trajet
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="padding: 6px 0; color: #7f8c8d; font-size: 14px;">
                                                📍 Itinéraire
                                            </td>
                                            <td align="right" style="padding: 6px 0; color: #2c3e50; font-weight: bold; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->pickup_location }} → {{ $driverfarerequest->userriderequest->destination_location }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 6px 0; color: #7f8c8d; font-size: 14px;">
                                                📅 Départ
                                            </td>
                                            <td align="right" style="padding: 6px 0; color: #2c3e50; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->pickup_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 6px 0; color: #7f8c8d; font-size: 14px;">
                                                📅 Arrivée
                                            </td>
                                            <td align="right" style="padding: 6px 0; color: #2c3e50; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->delivery_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 6px 0; color: #7f8c8d; font-size: 14px;">
                                                💰 Tarif proposé
                                            </td>
                                            <td align="right" style="padding: 6px 0; color: #27ae60; font-weight: bold; font-size: 18px;">
                                                {{ number_format($driverfarerequest->requested_fare, 2) }} €
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 6px 0; color: #7f8c8d; font-size: 14px;">
                                                💳 Paiement
                                            </td>
                                            <td align="right" style="padding: 6px 0; color: #2c3e50; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->payment_method }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Status Message -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <p style="color: #555555; font-size: 15px; line-height: 1.6; margin: 0;">
                            Nous vous informerons dès que la partie opposée aura répondu à votre proposition.
                        </p>
                    </td>
                </tr>

                <!-- CTA Buttons -->
                <tr>
                    <td align="center" style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center" bgcolor="#3498db" style="background-color: #3498db; border-radius: 5px; padding: 15px 40px; margin: 5px;">
                                    <a href="{{ url('/user/get-pending-driver-fare-request?userriderequest_id='. $driverfarerequest->userriderequest->id) }}" style="color: #ffffff; text-decoration: none; font-weight: bold; font-size: 15px; display: block;">
                                        Voir la négociation
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <table cellspacing="0" cellpadding="0" border="0" style="margin-top: 10px;">
                            <tr>
                                <td align="center" bgcolor="#95a5a6" style="background-color: #95a5a6; border-radius: 5px; padding: 15px 40px;">
                                    <a href="{{ $dashboardLink ?? '#' }}" style="color: #ffffff; text-decoration: none; font-weight: bold; font-size: 15px; display: block;">
                                        Mon espace
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Tip -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <p style="color: #7f8c8d; font-size: 14px; line-height: 1.6; margin: 0; text-align: center;">
                            💡 Un accord rapide augmente vos chances de conclure la transaction.
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td bgcolor="#34495e" style="background-color: #34495e; padding: 25px 30px; text-align: center;">
                        <p style="color: #ecf0f1; font-size: 14px; margin: 0 0 10px 0;">
                            <strong>JeConfie.com</strong> - Transport collaboratif et éco-responsable
                        </p>

                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td align="center" style="padding: 15px 0;">
                                    <a href="{{ url('/') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Site web</a>
                                    <span style="color: #7f8c8d;">|</span>
                                    <a href="{{ url('/contact-jeconfie') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Contact</a>
                                </td>
                            </tr>
                        </table>

                        <p style="color: #7f8c8d; font-size: 11px; margin: 15px 0 0 0;">
                            © 2025 JeConfie.com
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
