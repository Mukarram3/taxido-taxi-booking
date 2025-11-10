<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajet confirmé - JeConfie</title>
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

    <!-- Success Badge -->
    <div style="text-align: center; margin: -25px 0 0 0;">
        <div style="display: inline-block; background-color: #27ae60; color: white; padding: 10px 30px; border-radius: 25px; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            ✓ Trajet confirmé
        </div>
    </div>

    <!-- Content -->
    <div style="padding: 40px 30px 30px 30px;">
        <h2 style="color: #2c3e50; font-size: 24px; margin: 0 0 20px 0;">
            Bonjour {{ $ride->user->firstName ?? 'Utilisateur' }},
        </h2>

        <p style="color: #555; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
            Félicitations 🎉 Votre proposition de prix a été <strong>acceptée</strong> pour le trajet suivant :
        </p>

        <!-- Trip Details Box -->
        <div style="background-color: #f8f9fa; border-left: 4px solid #3498db; padding: 20px; margin: 25px 0; border-radius: 5px;">
            <h3 style="color: #2c3e50; font-size: 18px; margin: 0 0 15px 0;">📋 Détails du trajet</h3>

            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📍 Départ</td>
                    <td style="padding: 8px 0; color: #2c3e50; font-weight: bold; text-align: right;">
                        {{ $ride->pickup_location }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📍 Arrivée</td>
                    <td style="padding: 8px 0; color: #2c3e50; font-weight: bold; text-align: right;">
                        {{ $ride->destination_location }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📅 Date de départ</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $ride->departure_date }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📅 Date d'arrivée</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $ride->arrival_date }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">💰 Tarif</td>
                    <td style="padding: 8px 0; color: #27ae60; font-weight: bold; text-align: right; font-size: 18px;">
                        {{ number_format($ride->fare, 2) }} €
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">📦 Type de colis</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $ride->type_of_package }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">🔢 Quantité</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $ride->quantity_of_package }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #7f8c8d;">💳 Paiement</td>
                    <td style="padding: 8px 0; color: #2c3e50; text-align: right;">
                        {{ $ride->payment_method }}
                    </td>
                </tr>
            </table>
        </div>

        <!-- Next Steps -->
        <div style="background-color: #e8f5e9; padding: 20px; border-radius: 5px; margin: 25px 0;">
            <h3 style="color: #2c3e50; font-size: 16px; margin: 0 0 15px 0;">🎯 Prochaines étapes</h3>
            <ol style="color: #555; font-size: 14px; line-height: 1.8; margin: 0; padding-left: 20px;">
                <li>Le transporteur (<strong>{{ $ride->driver->firstName ?? 'Transporteur' }}</strong>) vous contactera pour organiser la collecte.</li>
                <li>Préparez votre colis selon les instructions convenues.</li>
                <li>Suivez l’état du trajet dans votre espace personnel.</li>
            </ol>
        </div>

        <!-- CTA Buttons -->
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $rideDetailsLink ?? '#' }}" style="display: inline-block; background-color: #3498db; color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; margin: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                Voir les détails du trajet
            </a>
            <a href="{{ $dashboardLink ?? '#' }}" style="display: inline-block; background-color: #2c3e50; color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; margin: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                Mon espace personnel
            </a>
        </div>

        <p style="color: #7f8c8d; font-size: 14px; line-height: 1.6;">
            Besoin d’aide ? Notre équipe est disponible 7j/7 pour répondre à vos questions.
        </p>
    </div>

    <!-- Footer -->
    <div style="background-color: #34495e; padding: 25px 30px; text-align: center;">
        <p style="color: #ecf0f1; font-size: 14px; margin: 0 0 10px 0;">
            <strong>JeConfie.com</strong> - Transport collaboratif et éco-responsable
        </p>
        <p style="color: #95a5a6; font-size: 12px; margin: 0 0 15px 0;">
            Économisez jusqu’à 70% sur vos envois tout en réduisant votre empreinte carbone.
        </p>
        <div style="margin: 15px 0;">
            <a href="{{ url('/') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Site web</a>
            <span style="color: #7f8c8d;">|</span>
            <a href="{{ url('/contact-jeconfie') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Contact</a>
            <span style="color: #7f8c8d;">|</span>
            <a href="{{ url('/faq') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">FAQ</a>
        </div>
        <p style="color: #7f8c8d; font-size: 11px; margin: 15px 0 0 0;">
            © 2025 JeConfie.com - Tous droits réservés
        </p>
    </div>

</div>

</body>
</html>
