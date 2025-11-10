<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📦 Demande de Retour de Colis - JeConfie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
    </style>
</head>
<body>

<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

    <!-- En-tête -->
    <div style="background: linear-gradient(135deg, #3498db 0%, #2ecc71 100%); padding: 30px; text-align: center;">
        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: bold;">JeConfie</h1>
        <p style="color: #ffffff; margin: 10px 0 0 0; font-size: 14px; opacity: 0.9;">Transport collaboratif et éco-responsable</p>
    </div>

    <!-- Contenu -->
    <div style="padding: 40px 30px 30px 30px;">

        <h2 style="color: #2c3e50; font-size: 22px; margin-bottom: 20px;">📦 Demande de Retour de Colis</h2>

        <p style="color: #555; font-size: 16px; line-height: 1.6;">
            Cher <strong>{{ $ride->driver->firstName }}</strong>,
        </p>

        <p style="color: #555; font-size: 16px; line-height: 1.6;">
            L’expéditeur <strong>{{ $ride->user->firstName }} {{ $ride->user->lastName }}</strong> a demandé un
            <strong>retour de colis</strong> pour le trajet de
            <strong>{{ $ride->pickup_location }}</strong> à
            <strong>{{ $ride->destination_location }}</strong>.
        </p>

        <h3 style="color: #2c3e50; margin-top: 30px;">📝 Détails du Trajet</h3>
        <ul style="line-height: 1.8; color: #333; list-style-type: none; padding: 0;">
            <li><strong>Date de départ :</strong> {{ $ride->departure_date }}</li>
            <li><strong>Date d’arrivée :</strong> {{ $ride->arrival_date }}</li>
            <li><strong>Tarif :</strong> ${{ $ride->fare }}</li>
            <li><strong>Type de colis :</strong> {{ $ride->type_of_package }}</li>
            <li><strong>Quantité :</strong> {{ $ride->quantity_of_package }}</li>
            <li><strong>Méthode de paiement :</strong> {{ $ride->payment_method }}</li>
        </ul>

        <!-- Bouton d'action -->
        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ $packageReturnedlLink }}" style="
                display: inline-block;
                background-color: #28a745;
                color: #ffffff;
                text-decoration: none;
                padding: 14px 40px;
                border-radius: 5px;
                font-weight: bold;
                font-size: 15px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            ">
                ✅ Confirmer le Retour du Colis
            </a>
        </div>

        <!-- Boîte de rappel -->
        <div style="background-color: #e8f5e9; padding: 20px; border-radius: 5px; margin: 40px 0 25px 0;">
            <h3 style="color: #2c3e50; font-size: 16px; margin: 0 0 10px 0;">💡 Rappel</h3>
            <p style="color: #555; font-size: 14px; margin: 0; line-height: 1.6;">
                Veuillez vous assurer que le colis est manipulé avec soin et retourné conformément à la demande de l’expéditeur.
                Confirmez une fois le retour effectué.
            </p>
        </div>

        <p style="color: #555; font-size: 15px; line-height: 1.6;">
            Merci pour votre coopération et pour la confiance accordée à notre plateforme.
        </p>

        <p style="margin-top: 30px; color: #2c3e50; font-size: 15px;">
            Bien cordialement,<br>
            <strong>L’équipe JeConfie</strong>
        </p>
    </div>

    <!-- Pied de page -->
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
