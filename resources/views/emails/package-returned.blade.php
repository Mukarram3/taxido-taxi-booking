<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📦 Colis Retourné - JeConfie</title>
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

        <h2 style="color: #2c3e50; font-size: 22px; margin-bottom: 20px;">📦 Colis Retourné</h2>

        <p style="color: #555; font-size: 16px; line-height: 1.6;">
            Cher(e) <strong>{{ $ride->driver->firstName }}</strong> / <strong>{{ $ride->user->firstName }}</strong>,
        </p>

        <p style="color: #555; font-size: 16px; line-height: 1.6;">
            Le transport de votre colis de <strong>{{ $ride->pickup_location }}</strong> à
            <strong>{{ $ride->destination_location }}</strong> a été <strong>annulé</strong> et le colis a été
            <strong>retourné avec succès à l’expéditeur</strong>.
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

        <div style="background-color: #fce4e4; padding: 20px; border-radius: 5px; margin: 35px 0 25px 0;">
            <h3 style="color: #c0392b; font-size: 16px; margin: 0 0 10px 0;">⚠️ Important</h3>
            <p style="color: #555; font-size: 14px; margin: 0; line-height: 1.6;">
                Veuillez noter que ce trajet a été annulé. L’expéditeur et le transporteur ont tous deux été informés.
                Merci de vérifier que toutes les actions nécessaires liées au colis ont bien été effectuées.
            </p>
        </div>

        <p style="color: #555; font-size: 15px; line-height: 1.6;">
            Merci d’avoir utilisé notre service.
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
