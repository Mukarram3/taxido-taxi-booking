<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📦 Colis Retourné - JeConfie</title>
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
                        <p style="color: #ffffff; margin: 10px 0 0 0; font-size: 14px;">Transport collaboratif et éco-responsable</p>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding: 40px 30px 30px 30px;">
                        <h2 style="color: #2c3e50; font-size: 22px; margin: 0 0 20px 0;">
                            📦 Colis Retourné
                        </h2>

                        <p style="color: #555555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
                            Cher(e) <strong>{{ $ride->driver->firstName }}</strong> / <strong>{{ $ride->user->firstName }}</strong>,
                        </p>

                        <p style="color: #555555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
                            Le transport de votre colis de <strong>{{ $ride->pickup_location }}</strong> à
                            <strong>{{ $ride->destination_location }}</strong> a été <strong>annulé</strong> et le colis a été
                            <strong>retourné avec succès à l'expéditeur</strong>.
                        </p>
                    </td>
                </tr>

                <!-- Trip Details -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #f8f9fa; border-left: 4px solid #3498db; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #2c3e50; font-size: 18px; margin: 0 0 15px 0;">
                                        📍 Détails du Trajet
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #3498db; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Date de départ :</strong> {{ $ride->departure_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #3498db; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Date d'arrivée :</strong> {{ $ride->arrival_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #3498db; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Tarif :</strong> ${{ $ride->fare }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #3498db; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Type de colis :</strong> {{ $ride->type_of_package }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #3498db; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Quantité :</strong> {{ $ride->quantity_of_package }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #3498db; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #555555; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong>Méthode de paiement :</strong> {{ $ride->payment_method }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Important Notice -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #fce4e4; border-left: 4px solid #c0392b; padding: 20px; border-radius: 5px;">
                                    <h3 style="color: #c0392b; font-size: 16px; margin: 0 0 10px 0;">
                                        ⚠️ Important
                                    </h3>
                                    <p style="color: #555555; font-size: 14px; margin: 0; line-height: 1.6;">
                                        Veuillez noter que ce trajet a été annulé. L'expéditeur et le transporteur ont tous deux été informés.
                                        Merci de vérifier que toutes les actions nécessaires liées au colis ont bien été effectuées.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Closing Message -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <p style="color: #555555; font-size: 15px; line-height: 1.6; margin: 0 0 30px 0;">
                            Merci d'avoir utilisé notre service.
                        </p>

                        <p style="margin: 0; color: #2c3e50; font-size: 15px; line-height: 1.6;">
                            Bien cordialement,<br>
                            <strong>L'équipe JeConfie</strong>
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
