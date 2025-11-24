<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur JeConfie - Compte Transporteur</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Inter', 'Segoe UI', Arial, sans-serif; background-color: #f8fafc;">
<div style="max-width: 600px; margin: 0 auto; background-color: #ffffff;">
    <!-- Header avec gradient JeConfie -->
    <div style="background: linear-gradient(135deg, #5046e5 0%, #059669 100%); padding: 40px 20px; text-align: center; position: relative; overflow: hidden;">
        <!-- Cercle décoratif -->
        <div style="position: absolute; width: 200px; height: 200px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; top: -100px; right: -50px;"></div>

        <!-- Logo -->
        <div style="display: inline-block; background: white; border-radius: 12px; padding: 12px; margin-bottom: 20px;">
            <span style="font-size: 24px; font-weight: 800; background: linear-gradient(135deg, #5046e5, #059669); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">JC</span>
        </div>

        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: 700;">Bienvenue chez JeConfie ! 🚚</h1>
        <p style="color: rgba(255, 255, 255, 0.95); margin: 10px 0 0 0; font-size: 16px;">Votre compte Transporteur Professionnel est actif</p>
    </div>

    <!-- Content -->
    <div style="padding: 40px 30px;">
        <h2 style="color: #0f172a; font-size: 22px; margin-bottom: 20px;">Bonjour {{ $driver->firstName . ' ' . $driver->lastName }} !</h2>

        <p style="color: #64748b; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
            Félicitations ! Votre compte transporteur professionnel sur <strong style="color: #5046e5;">JeConfie</strong> est maintenant actif et vérifié.
            Vous pouvez dès à présent accéder à des milliers d'opportunités de transport et développer votre activité.
        </p>

        <!-- Info Box avec bordure gradient -->
        <div style="background: linear-gradient(135deg, #5046e515 0%, #05966915 100%); border-left: 4px solid #5046e5; padding: 20px; margin: 30px 0; border-radius: 8px;">
            <h3 style="color: #5046e5; margin: 0 0 15px 0; font-size: 18px;">📋 Vos informations de connexion :</h3>
            <p style="margin: 8px 0; color: #64748b;">
                <strong>Email :</strong> {{$driver->email}}<br>
                <strong>Identifiant :</strong> {{$driver->firstName . ' ' . $driver->lastName}}<br>
                <strong>Type de compte :</strong> Transporteur Professionnel<br>
                <strong>Statut :</strong> <span style="color: #10b981; font-weight: 600;">✓ Vérifié</span>
            </p>
        </div>

        <!-- CTA Button avec gradient -->
        <div style="text-align: center; margin: 35px 0;">
            <a href="https://jeconfie.com/driver/dashboard" style="display: inline-block; background: linear-gradient(135deg, #5046e5 0%, #059669 100%); color: #ffffff; padding: 15px 40px; text-decoration: none; border-radius: 100px; font-weight: 600; font-size: 16px; box-shadow: 0 10px 25px rgba(80, 70, 229, 0.3);">
                Accéder à mon tableau de bord →
            </a>
        </div>

        <!-- Features Grid -->
        <div style="background-color: #f8fafc; padding: 25px; border-radius: 16px; margin: 30px 0;">
            <h3 style="color: #0f172a; margin: 0 0 20px 0; text-align: center;">🎯 Commencez dès maintenant</h3>
            <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding: 10px; text-align: center; width: 33%;">
                        <div style="background: #ffffff; padding: 15px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <span style="font-size: 30px;">📱</span>
                            <p style="color: #64748b; margin: 10px 0 0 0; font-size: 13px; font-weight: 600;">Complétez votre profil</p>
                        </div>
                    </div>
                    <div style="display: table-cell; padding: 10px; text-align: center; width: 33%;">
                        <div style="background: #ffffff; padding: 15px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <span style="font-size: 30px;">🚛</span>
                            <p style="color: #64748b; margin: 10px 0 0 0; font-size: 13px; font-weight: 600;">Ajoutez vos véhicules</p>
                        </div>
                    </div>
                    <div style="display: table-cell; padding: 10px; text-align: center; width: 33%;">
                        <div style="background: #ffffff; padding: 15px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <span style="font-size: 30px;">💰</span>
                            <p style="color: #64748b; margin: 10px 0 0 0; font-size: 13px; font-weight: 600;">Consultez les offres</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Eco Banner -->
        <div style="background: linear-gradient(135deg, #059669 0%, #10b981 100%); padding: 25px; border-radius: 16px; margin: 30px 0; text-align: center;">
            <h3 style="color: #ffffff; margin: 0 0 10px 0; font-size: 20px;">🌱 Transport Écologique</h3>
            <p style="color: rgba(255, 255, 255, 0.95); margin: 0 0 15px 0; font-size: 15px;">
                Rejoignez notre programme éco-responsable et bénéficiez d'avantages exclusifs
            </p>
            <a href="https://jeconfie.com/transporteur/eco-programme" style="display: inline-block; background: #ffffff; color: #059669; padding: 12px 30px; text-decoration: none; border-radius: 100px; font-weight: 600; font-size: 14px;">
                En savoir plus →
            </a>
        </div>

        <!-- Promotional Offer -->
        <div style="background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%); padding: 25px; border-radius: 16px; margin: 30px 0; text-align: center;">
            <h3 style="color: #ffffff; margin: 0 0 10px 0; font-size: 20px;">🎁 Offre de bienvenue exclusive</h3>
            <p style="color: #ffffff; margin: 0 0 15px 0; font-size: 18px; font-weight: 700;">
                -20% de commission sur vos 10 premières livraisons !
            </p>
            <p style="color: rgba(255, 255, 255, 0.95); margin: 0; font-size: 13px;">
                Offre automatiquement appliquée à votre compte
            </p>
        </div>

        <!-- Trust Section -->
        <div style="background: #f8fafc; border: 2px solid #e2e8f0; padding: 20px; border-radius: 12px; margin: 30px 0;">
            <h3 style="color: #0f172a; margin: 0 0 15px 0; font-size: 16px;">🛡️ Pourquoi les transporteurs choisissent JeConfie ?</h3>
            <ul style="color: #64748b; font-size: 14px; line-height: 1.8; margin: 0; padding-left: 20px;">
                <li><strong style="color: #5046e5;">Paiements garantis</strong> sous 48h</li>
                <li><strong style="color: #5046e5;">Assurance incluse</strong> sur toutes les livraisons</li>
                <li><strong style="color: #5046e5;">0 frais cachés</strong>, tarification transparente</li>
                <li><strong style="color: #5046e5;">Support dédié</strong> disponible 7j/7</li>
            </ul>
        </div>

        <!-- Quick Stats -->
        <div style="text-align: center; padding: 30px 0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; margin: 30px 0;">
            <h3 style="color: #0f172a; margin: 0 0 20px 0; font-size: 18px;">📊 JeConfie en chiffres</h3>
            <div style="display: table; width: 100%; max-width: 400px; margin: 0 auto;">
                <div style="display: table-row;">
                    <div style="display: table-cell; text-align: center; padding: 10px;">
                        <p style="font-size: 28px; font-weight: 700; color: #5046e5; margin: 0;">15K+</p>
                        <p style="font-size: 12px; color: #64748b; margin: 5px 0 0 0;">Livraisons/mois</p>
                    </div>
                    <div style="display: table-cell; text-align: center; padding: 10px;">
                        <p style="font-size: 28px; font-weight: 700; color: #059669; margin: 0;">98%</p>
                        <p style="font-size: 12px; color: #64748b; margin: 5px 0 0 0;">Satisfaction</p>
                    </div>
                    <div style="display: table-cell; text-align: center; padding: 10px;">
                        <p style="font-size: 28px; font-weight: 700; color: #06b6d4; margin: 0;">24h</p>
                        <p style="font-size: 12px; color: #64748b; margin: 5px 0 0 0;">Paiement rapide</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Help Section -->
        <div style="margin-top: 40px; padding: 25px; background: linear-gradient(135deg, #5046e515 0%, #05966915 100%); border-radius: 12px;">
            <h3 style="color: #0f172a; margin: 0 0 15px 0; font-size: 18px;">Besoin d'aide pour démarrer ?</h3>
            <p style="color: #64748b; font-size: 14px; line-height: 1.6; margin: 0 0 20px 0;">
                Notre équipe support est là pour vous accompagner dans vos premiers pas sur la plateforme.
            </p>
            <div style="display: table; width: 100%;">
                <div style="display: table-cell; vertical-align: middle;">
                    <p style="margin: 5px 0; color: #64748b; font-size: 14px;">
                        📧 <strong>Email :</strong> <a href="mailto:service@jeconfie.com" style="color: #5046e5; text-decoration: none;">service@jeconfie.com</a><br>
                        📞 <strong>Téléphone :</strong> <a href="tel:+330755258023" style="color: #5046e5; text-decoration: none;">+33 07 55 25 80 23</a><br>
                        💬 <strong>Chat :</strong> Disponible sur votre tableau de bord
                    </p>
                </div>
                <div style="display: table-cell; text-align: right; vertical-align: middle;">
                    <a href="https://jeconfie.com/transporteur/guide" style="display: inline-block; background: #5046e5; color: #ffffff; padding: 10px 25px; text-decoration: none; border-radius: 100px; font-weight: 600; font-size: 14px;">
                        📚 Guide complet
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div style="background-color: #0f172a; padding: 30px; text-align: center;">
        <div style="margin-bottom: 20px;">
            <a href="https://jeconfie.com" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Accueil</a>
            <a href="https://jeconfie.com/transporteur/dashboard" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Dashboard</a>
            <a href="https://jeconfie.com/transporteur/offres" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Offres</a>
            <a href="https://jeconfie.com/help" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Centre d'aide</a>
            <a href="https://jeconfie.com/terms" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">CGU</a>
        </div>
        <p style="color: #94a3b8; font-size: 12px; margin: 15px 0 0 0;">
            © 2024 JeConfie - La marketplace du transport de confiance<br>
            Cet email a été envoyé à {{$driver->email}}<br>
            <a href="https://jeconfie.com/unsubscribe" style="color: #64748b; text-decoration: none; font-size: 11px;">Se désinscrire</a>
        </p>
    </div>
</div>
</body>
</html>
