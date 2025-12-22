<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposition de prix rejetée - JeConfie</title>
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

                <!-- Content -->
                <tr>
                    <td style="padding: 40px 30px 30px 30px;">
                        <h2 style="color: #e74c3c; font-size: 24px; margin: 0 0 20px 0;">
                            ❌ Proposition de prix rejetée
                        </h2>

                        <p style="color: #555555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
                            Bonjour <strong>{{ $driverfarerequest->driver->firstName ?? 'Transporteur' }}</strong>,
                        </p>

                        <p style="color: #555555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
                            Votre proposition de prix pour le trajet de
                            <strong>{{ $driverfarerequest->userriderequest->pickup_location }}</strong> à
                            <strong>{{ $driverfarerequest->userriderequest->destination_location }}</strong>
                            a été <strong>rejetée</strong> par l'expéditeur <strong>{{ $driverfarerequest->userriderequest->user->firstName ?? 'Expéditeur' }}</strong>.
                        </p>
                    </td>
                </tr>

                <!-- Ride Details -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #f8f9fa; border-left: 4px solid #e74c3c; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #2c3e50; font-size: 18px; margin: 0 0 15px 0;">
                                        📋 Détails du trajet
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                📍 Départ
                                            </td>
                                            <td align="right" style="padding: 8px 0; color: #2c3e50; font-weight: bold; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->pickup_location }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                📍 Arrivée
                                            </td>
                                            <td align="right" style="padding: 8px 0; color: #2c3e50; font-weight: bold; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->destination_location }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                📅 Date de départ
                                            </td>
                                            <td align="right" style="padding: 8px 0; color: #2c3e50; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->pickup_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                📅 Date d'arrivée
                                            </td>
                                            <td align="right" style="padding: 8px 0; color: #2c3e50; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->delivery_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                💰 Tarif proposé
                                            </td>
                                            <td align="right" style="padding: 8px 0; color: #e74c3c; font-weight: bold; font-size: 14px;">
                                                {{ number_format($driverfarerequest->requested_fare, 2) }} €
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px 0; color: #7f8c8d; font-size: 14px;">
                                                💳 Paiement
                                            </td>
                                            <td align="right" style="padding: 8px 0; color: #2c3e50; font-size: 14px;">
                                                {{ $driverfarerequest->userriderequest->payment_method }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Encouragement Box -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #e8f5e9; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #2c3e50; font-size: 16px; margin: 0 0 15px 0;">
                                        💡 D'autres opportunités vous attendent
                                    </h3>
                                    <p style="color: #555555; font-size: 14px; margin: 0; line-height: 1.6;">
                                        De nouvelles demandes sont publiées chaque jour. Vous pouvez ajuster votre prix et proposer à nouveau,
                                        ou explorer d'autres offres correspondant à vos trajets disponibles.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- CTA Buttons -->
                <tr>
                    <td align="center" style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center" bgcolor="#2ecc71" style="background-color: #2ecc71; border-radius: 5px; padding: 15px 40px; margin: 5px;">
                                    <a href="{{ url('/search-listing') }}" style="color: #ffffff; text-decoration: none; font-weight: bold; font-size: 15px; display: block;">
                                        Voir d'autres demandes
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <table cellspacing="0" cellpadding="0" border="0" style="margin-top: 10px;">
                            <tr>
                                <td align="center" bgcolor="#95a5a6" style="background-color: #95a5a6; border-radius: 5px; padding: 15px 40px;">
                                    <a href="{{ url('/') }}" style="color: #ffffff; text-decoration: none; font-weight: bold; font-size: 15px; display: block;">
                                        Mon espace
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Closing Message -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <p style="color: #7f8c8d; font-size: 14px; line-height: 1.6; margin: 0; text-align: center;">
                            Merci d'utiliser JeConfie. Nous vous souhaitons bonne chance pour vos prochaines propositions.
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
                            © 2025 JeConfie.com - Tous droits réservés
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
