<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposition de prix rejetée - JeConfie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
    </style>
</head>
<body>

<div style="font-family: Arial, sans-serif; max-width: 650px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background: linear-gradient(135deg, #3498db 0%, #2ecc71 100%); padding: 30px; text-align: center;">
        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: bold;">JeConfie</h1>
        <p style="color: #ffffff; margin: 10px 0 0 0; font-size: 14px; opacity: 0.9;">Transport collaboratif</p>
    </div>

    <!-- Content -->
    <div style="padding: 40px 30px 30px 30px;">
        <h2 style="color: #e74c3c; font-size: 24px; margin: 0 0 20px 0;">❌ Proposition de prix rejetée</h2>

        <p style="color: #555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
            Bonjour <strong>{{ $driverfarerequest->driver->firstName ?? 'Transporteur' }}</strong>,
        </p>

        <p style="color: #555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
            Votre proposition de prix pour le trajet de
            <strong>{{ $driverfarerequest->userriderequest->pickup_location }}</strong> à
            <strong>{{ $driverfarerequest->userriderequest->destination_location }}</strong>
            a été <strong>rejetée</strong> par l’expéditeur <strong>{{ $driverfarerequest->userriderequest->user->firstName ?? 'Expéditeur' }}</strong>.
        </p>

        <!-- Ride Details -->
        <div style="background-color: #f8f9fa; border-left: 4px solid #e74c3c; padding: 20px; margin: 25px 0; border-radius: 5px;">
            <h3 style="color: #2c3e50; font-size: 18px; margin: 0 0 15px 0;">📋 Détails du trajet</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📍 Départ</td>
                    <td style="padding: 8px 0; color: #2c3e50; font-weight: bold; text-align: right;">
                        {{ $driverfarerequest->userriderequest->pickup_location }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📍 Arrivée</td>
                    <td style="padding: 8px 0; color: #2c3e50; font-weight: bold; text-align: right;">
                        {{ $driverfarerequest->userriderequest->destination_location }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📅 Date de départ</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $driverfarerequest->userriderequest->pickup_date }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📅 Date d'arrivée</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $driverfarerequest->userriderequest->delivery_date }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">💰 Tarif proposé</td>
                    <td style="padding: 8px 0; color: #e74c3c; font-weight: bold; text-align: right;">
                        {{ number_format($driverfarerequest->requested_fare, 2) }} €
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">💳 Paiement</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $driverfarerequest->userriderequest->payment_method }}
                    </td>
                </tr>
            </table>
        </div>

        <!-- Encouragement -->
        <div style="background-color: #e8f5e9; padding: 20px; border-radius: 5px; margin: 25px 0;">
            <h3 style="color: #2c3e50; font-size: 16px; margin: 0 0 15px 0;">💡 D'autres opportunités vous attendent</h3>
            <p style="color: #555; font-size: 14px; margin: 0; line-height: 1.6;">
                De nouvelles demandes sont publiées chaque jour. Vous pouvez ajuster votre prix et proposer à nouveau,
                ou explorer d’autres offres correspondant à vos trajets disponibles.
            </p>
        </div>

        <!-- CTA Buttons -->
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ url('/search-listing') }}" style="display: inline-block; background-color: #2ecc71; color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; margin: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                Voir d'autres demandes
            </a>
            <a href="{{ url('/') }}" style="display: inline-block; background-color: #95a5a6; color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; margin: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                Mon espace
            </a>
        </div>

        <p style="color: #7f8c8d; font-size: 14px; line-height: 1.6;">
            Merci d’utiliser JeConfie. Nous vous souhaitons bonne chance pour vos prochaines propositions.
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
            © 2025 JeConfie.com - Tous droits réservés
        </p>
    </div>

</div>

</body>
</html>
