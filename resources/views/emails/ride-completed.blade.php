<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✅ Course terminée - JeConfie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #3498db 0%, #2ecc71 100%);
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }
        .content {
            padding: 40px 30px 30px 30px;
            color: #555;
        }
        .ride-details {
            background-color: #f8f9fa;
            border-left: 4px solid #27ae60;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        .ride-details h3 {
            color: #27ae60;
            margin-bottom: 15px;
        }
        .ride-details ul {
            padding-left: 20px;
            margin: 0;
            line-height: 1.6;
        }
        .footer {
            background-color: #34495e;
            padding: 25px 30px;
            text-align: center;
            color: #ecf0f1;
            font-size: 13px;
        }
        .footer a {
            color: #3498db;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- En-tête -->
    <div class="header">
        <h1>JeConfie</h1>
        <p>Transport collaboratif et éco-responsable</p>
    </div>

    <!-- Contenu -->
    <div class="content">
        <h2 style="color: #2c3e50; font-size: 22px; margin-bottom: 20px;">✅ Votre course est terminée</h2>

        <p>Bonjour <strong>{{ $ride->user->firstName }}</strong> et <strong>{{ $ride->driver->firstName }}</strong>,</p>

        <p>La livraison de votre colis de <strong>{{ $ride->pickup_location }}</strong> à <strong>{{ $ride->destination_location }}</strong> est arrivée et a été marquée comme <strong>terminée</strong>.</p>

        <!-- Détails de la course -->
        <div class="ride-details">
            <h3>📝 Détails de la course</h3>
            <ul>
                <li><strong>Date de départ :</strong> {{ $ride->departure_date }}</li>
                <li><strong>Date d’arrivée :</strong> {{ $ride->arrival_date }}</li>
                <li><strong>Tarif :</strong> {{ $ride->fare }} €</li>
                <li><strong>Type de colis :</strong> {{ $ride->type_of_package }}</li>
                <li><strong>Quantité :</strong> {{ $ride->quantity_of_package }}</li>
                <li><strong>Méthode de paiement :</strong> {{ $ride->payment_method }}</li>
            </ul>
        </div>

        <p>Merci d’avoir utilisé notre service. Nous espérons que votre expérience de livraison s’est déroulée sans encombre !</p>

        <p style="margin-top: 30px; color: #2c3e50;">
            Cordialement,<br>
            <strong>L’équipe JeConfie</strong>
        </p>
    </div>

    <!-- Pied de page -->
    <div class="footer">
        <p><strong>JeConfie.com</strong> – Transport collaboratif et éco-responsable</p>
        <div>
            <a href="{{ url('/') }}">Site web</a> |
            <a href="{{ url('/contact-jeconfie') }}">Contact</a> |
            <a href="{{ url('/faq') }}">FAQ</a>
        </div>
        <p style="margin-top: 10px; font-size: 11px;">© 2025 JeConfie.com – Tous droits réservés.</p>
    </div>

</div>

</body>
</html>
