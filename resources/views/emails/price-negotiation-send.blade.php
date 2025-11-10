<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Négociation de prix - JeConfie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
    </style>
</head>
<body>

<div style="max-width: 650px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background: linear-gradient(135deg, #3498db 0%, #2ecc71 100%); padding: 30px; text-align: center;">
        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: bold;">JeConfie</h1>
        <p style="color: #ffffff; margin: 10px 0 0 0; font-size: 14px; opacity: 0.9;">Transport collaboratif</p>
    </div>

    <!-- Badge -->
    <div style="text-align: center; margin: -20px 0 0 0;">
        <div style="display: inline-block; background-color: #f39c12; color: white; padding: 10px 25px; border-radius: 25px; font-weight: bold; box-shadow: 0 3px 6px rgba(0,0,0,0.1);">
            💬 Proposition tarifaire envoyée
        </div>
    </div>

    <!-- Content -->
    <div style="padding: 40px 30px 30px 30px;">
        <h2 style="color: #2c3e50; font-size: 22px; margin-bottom: 20px;">Bonjour {{ $recipientName ?? 'Utilisateur' }},</h2>

        <p style="color: #555; font-size: 16px; line-height: 1.6; margin-bottom: 20px;">
            Une nouvelle <strong>négociation de prix</strong> a été envoyée pour le trajet suivant :
        </p>

        <div style="background-color: #fff8e1; border-left: 4px solid #f39c12; padding: 20px; margin-bottom: 25px; border-radius: 5px;">
            <h3 style="color: #e67e22; font-size: 18px; margin: 0 0 15px 0;">🚚 Détails du trajet</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 6px 0; color: #7f8c8d;">📍 Itinéraire</td>
                    <td style="padding: 6px 0; color: #2c3e50; font-weight: bold; text-align: right;">
                        {{ $driverfarerequest->userriderequest->pickup_location }} → {{ $driverfarerequest->userriderequest->destination_location }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; color: #7f8c8d;">📅 Départ</td>
                    <td style="padding: 6px 0; color: #2c3e50; text-align: right;">
                        {{ $driverfarerequest->userriderequest->pickup_date }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; color: #7f8c8d;">📅 Arrivée</td>
                    <td style="padding: 6px 0; color: #2c3e50; text-align: right;">
                        {{ $driverfarerequest->userriderequest->delivery_date }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; color: #7f8c8d;">💰 Tarif proposé</td>
                    <td style="padding: 6px 0; color: #27ae60; font-weight: bold; text-align: right; font-size: 18px;">
                        {{ number_format($driverfarerequest->requested_fare, 2) }} €
                    </td>
                </tr>
                <tr>
                    <td style="padding: 6px 0; color: #7f8c8d;">💳 Paiement</td>
                    <td style="padding: 6px 0; color: #2c3e50; text-align: right;">
                        {{ $driverfarerequest->userriderequest->payment_method }}
                    </td>
                </tr>
            </table>
        </div>

        <p style="color: #555; font-size: 15px; line-height: 1.6;">
            Nous vous informerons dès que la partie opposée aura répondu à votre proposition.
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ url('/user/get-pending-driver-fare-request?userriderequest_id='. $driverfarerequest->userriderequest->id) }}" style="display: inline-block; background-color: #3498db; color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; margin: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                Voir la négociation
            </a>
            <a href="{{ $dashboardLink ?? '#' }}" style="display: inline-block; background-color: #95a5a6; color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; margin: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                Mon espace
            </a>
        </div>

        <p style="color: #7f8c8d; font-size: 14px; line-height: 1.6; text-align: center;">
            💡 Un accord rapide augmente vos chances de conclure la transaction.
        </p>
    </div>

    <!-- Footer -->
    <div style="background-color: #34495e; padding: 25px 30px; text-align: center;">
        <p style="color: #ecf0f1; font-size: 14px; margin: 0 0 10px 0;">
            <strong>JeConfie.com</strong> - Transport collaboratif et éco-responsable
        </p>
        <div style="margin: 15px 0;">
            <a href="{{ url('/') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Site web</a>
            <span style="color: #7f8c8d;">|</span>
            <a href="{{ url('/contact-jeconfie') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Contact</a>
        </div>
        <p style="color: #7f8c8d; font-size: 11px; margin: 15px 0 0 0;">
            © 2025 JeConfie.com
        </p>
    </div>

</div>

</body>
</html>
