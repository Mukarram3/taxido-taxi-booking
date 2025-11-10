<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>❌ Course annulée - JeConfie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
    </style>
</head>
<body>

<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

    <!-- En-tête -->
    <div style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); padding: 30px; text-align: center;">
        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: bold;">JeConfie</h1>
        <p style="color: #ffffff; margin: 10px 0 0 0; font-size: 14px; opacity: 0.9;">
            Transport collaboratif et éco-responsable
        </p>
    </div>

    <!-- Contenu -->
    <div style="padding: 40px 30px 30px 30px;">

        <h2 style="color: #2c3e50; font-size: 22px; margin-bottom: 20px;">
            ❌ Votre course a été annulée
        </h2>

        <p style="color: #555; font-size: 16px; line-height: 1.6;">
            Bonjour <strong>{{ $ride->driver->firstName . ' ' . $ride->driver->lastName }}</strong>,
        </p>

        <p style="color: #555; font-size: 16px; line-height: 1.6;">
            Votre trajet de <strong>{{ $ride->pickup_location }}</strong> à
            <strong>{{ $ride->destination_location }}</strong> a été annulé.
        </p>

        <!-- Raison de l’annulation -->
        <div style="background-color: #fce4e4; padding: 20px; border-radius: 5px; margin: 25px 0;">
            <h3 style="color: #c0392b; font-size: 16px; margin: 0 0 10px 0;">Raison de l’annulation</h3>
            <p style="color: #555; font-size: 14px; margin: 0; line-height: 1.6;">
                {{ $ride->message }}
            </p>
        </div>

        <p style="color: #555; font-size: 15px; line-height: 1.6;">
            Nous vous présentons nos excuses pour la gêne occasionnée.
            Vous pouvez consulter d’autres trajets disponibles ou créer une nouvelle demande.
        </p>

        <p style="margin-top: 30px; color: #2c3e50; font-size: 15px;">
            Cordialement,<br>
            <strong>L’équipe JeConfie</strong>
        </p>

        <!-- Bouton CTA -->
        <div style="text-align: center; margin: 30px 0;">
            <a href="https://jeconfie.com/rides" style="display: inline-block; background-color: #3498db; color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; margin: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                Voir d’autres trajets
            </a>
        </div>
    </div>

    <!-- Pied de page -->
    <div style="background-color: #34495e; padding: 25px 30px; text-align: center;">
        <p style="color: #ecf0f1; font-size: 14px; margin: 0 0 10px 0;">
            <strong>JeConfie.com</strong> – Transport collaboratif et éco-responsable
        </p>
        <div style="margin: 15px 0;">
            <a href="{{ url('/') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Site web</a>
            <span style="color: #7f8c8d;">|</span>
            <a href="{{ url('/contact-jeconfie') }}" style="color: #3498db; text-decoration: none; margin: 0 10px; font-size: 13px;">Contact</a>
        </div>
        <p style="color: #7f8c8d; font-size: 11px; margin: 15px 0 0 0;">
            © 2025 JeConfie.com – Tous droits réservés
        </p>
    </div>

</div>

</body>
</html>
