<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur JeConfie - Compte Expéditeur</title>
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

        <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: 700;">Bienvenue chez JeConfie ! 📦</h1>
        <p style="color: rgba(255, 255, 255, 0.95); margin: 10px 0 0 0; font-size: 16px;">Votre compte Expéditeur est prêt</p>
    </div>

    <!-- Content -->
    <div style="padding: 40px 30px;">
        <h2 style="color: #0f172a; font-size: 22px; margin-bottom: 20px;">Bonjour {{ $user->firstName . ' ' . $user->lastName }} !</h2>

        <p style="color: #64748b; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
            Excellent ! Votre compte expéditeur sur <strong style="color: #5046e5;">JeConfie</strong> est désormais actif et vérifié.
            Vous avez maintenant accès à notre réseau de transporteurs professionnels pour tous vos besoins d'expédition.
        </p>

        <!-- Info Box -->
        <div style="background: linear-gradient(135deg, #06b6d415 0%, #0891b215 100%); border-left: 4px solid #06b6d4; padding: 20px; margin: 30px 0; border-radius: 8px;">
            <h3 style="color: #06b6d4; margin: 0 0 15px 0; font-size: 18px;">📋 Vos informations de connexion :</h3>
            <p style="margin: 8px 0; color: #64748b;">
                <strong>Email :</strong> {{$user->email}}<br>
                <strong>Identifiant :</strong> {{ $user->firstName . ' ' . $user->lastName }}<br>
                <strong>Type de compte :</strong> Expéditeur<br>
                <strong>Statut :</strong> <span style="color: #10b981; font-weight: 600;">✓ Vérifié</span>
            </p>
        </div>

        <!-- CTA Button -->
        <div style="text-align: center; margin: 35px 0;">
            <a href="https://jeconfie.com/user/dashboard" style="display: inline-block; background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); color: #ffffff; padding: 15px 40px; text-decoration: none; border-radius: 100px; font-weight: 600; font-size: 16px; box-shadow: 0 10px 25px rgba(6, 182, 212, 0.3);">
                📦 Créer ma première expédition →
            </a>
        </div>

        <!-- Process Steps -->
        <div style="background-color: #f8fafc; padding: 25px; border-radius: 16px; margin: 30px 0;">
            <h3 style="color: #0f172a; margin: 0 0 20px 0; text-align: center;">🚀 Expédiez en 3 étapes simples</h3>
            <div style="margin-bottom: 20px;">
                <div style="display: flex; align-items: flex-start; margin-bottom: 15px;">
                    <div style="background: linear-gradient(135deg, #5046e5, #059669); color: white; width: 30px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; margin-right: 15px; flex-shrink: 0;">1</div>
                    <div>
                        <h4 style="color: #0f172a; margin: 0 0 5px 0; font-size: 15px;">Créez votre demande</h4>
                        <p style="color: #64748b; margin: 0; font-size: 13px;">Décrivez votre colis et vos besoins en 2 minutes</p>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start; margin-bottom: 15px;">
                    <div style="background: linear-gradient(135deg, #5046e5, #059669); color: white; width: 30px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; margin-right: 15px; flex-shrink: 0;">2</div>
                    <div>
                        <h4 style="color: #0f172a; margin: 0 0 5px 0; font-size: 15px;">Recevez des offres</h4>
                        <p style="color: #64748b; margin: 0; font-size: 13px;">Comparez les prix et délais des transporteurs vérifiés</p>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start;">
                    <div style="background: linear-gradient(135deg, #5046e5, #059669); color: white; width: 30px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; margin-right: 15px; flex-shrink: 0;">3</div>
                    <div>
                        <h4 style="color: #0f172a; margin: 0 0 5px 0; font-size: 15px;">Suivez votre colis</h4>
                        <p style="color: #64748b; margin: 0; font-size: 13px;">Tracking en temps réel jusqu'à la livraison</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promotional Banner -->
        <div style="background: linear-gradient(135deg, #ec4899 0%, #be185d 100%); padding: 25px; border-radius: 16px; margin: 30px 0; text-align: center;">
            <h3 style="color: #ffffff; margin: 0 0 10px 0; font-size: 20px;">🎉 Offre exclusive de bienvenue</h3>
            <p style="color: #ffffff; margin: 0 0 15px 0; font-size: 18px; font-weight: 700;">
                -50% sur votre première expédition !
            </p>
            <p style="color: rgba(255, 255, 255, 0.95); margin: 0 0 20px 0; font-size: 14px;">
                Code promo : <span style="background: rgba(255, 255, 255, 0.2); padding: 4px 12px; border-radius: 4px; font-weight: 700;">BIENVENUE50</span>
            </p>
            <a href="https://jeconfie.com/expediteur/nouvelle-expedition" style="display: inline-block; background: #ffffff; color: #be185d; padding: 12px 30px; text-decoration: none; border-radius: 100px; font-weight: 600; font-size: 14px;">
                J'en profite maintenant →
            </a>
        </div>

        <!-- Trust Section -->
        <div style="background: linear-gradient(135deg, #3b82f615 0%, #2563eb15 100%); padding: 25px; border-radius: 16px; margin: 30px 0;">
            <h3 style="color: #0f172a; margin: 0 0 20px 0; font-size: 18px; text-align: center;">🛡️ Expédiez en toute sérénité</h3>
            <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding: 10px; text-align: center; width: 50%;">
                        <div style="background: #ffffff; padding: 20px 15px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); height: 100%;">
                            <span style="font-size: 36px;">🔒</span>
                            <h4 style="color: #0f172a; margin: 10px 0 5px 0; font-size: 14px;">Paiement sécurisé</h4>
                            <p style="color: #64748b; margin: 0; font-size: 12px;">Transaction 100% protégée</p>
                        </div>
                    </div>
                    <div style="display: table-cell; padding: 10px; text-align: center; width: 50%;">
                        <div style="background: #ffffff; padding: 20px 15px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); height: 100%;">
                            <span style="font-size: 36px;">📍</span>
                            <h4 style="color: #0f172a; margin: 10px 0 5px 0; font-size: 14px;">Suivi temps réel</h4>
                            <p style="color: #64748b; margin: 0; font-size: 12px;">GPS et notifications push</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: table; width: 100%; margin-top: 10px;">
                <div style="display: table-row;">
                    <div style="display: table-cell; padding: 10px; text-align: center; width: 50%;">
                        <div style="background: #ffffff; padding: 20px 15px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); height: 100%;">
                            <span style="font-size: 36px;">✅</span>
                            <h4 style="color: #0f172a; margin: 10px 0 5px 0; font-size: 14px;">Transporteurs vérifiés</h4>
                            <p style="color: #64748b; margin: 0; font-size: 12px;">Tous certifiés et assurés</p>
                        </div>
                    </div>
                    <div style="display: table-cell; padding: 10px; text-align: center; width: 50%;">
                        <div style="background: #ffffff; padding: 20px 15px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); height: 100%;">
                            <span style="font-size: 36px;">💬</span>
                            <h4 style="color: #0f172a; margin: 10px 0 5px 0; font-size: 14px;">Support 7j/7</h4>
                            <p style="color: #64748b; margin: 0; font-size: 12px;">Équipe dédiée à votre service</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Eco Section -->
        <div style="background: linear-gradient(135deg, #059669 0%, #10b981 100%); padding: 25px; border-radius: 16px; margin: 30px 0; text-align: center;">
            <h3 style="color: #ffffff; margin: 0 0 10px 0; font-size: 20px;">🌱 Transport éco-responsable</h3>
            <p style="color: rgba(255, 255, 255, 0.95); margin: 0 0 15px 0; font-size: 15px;">
                Compensez l'empreinte carbone de vos expéditions
            </p>
            <a href="https://jeconfie.com/eco-transport" style="display: inline-block; background: #ffffff; color: #059669; padding: 12px 30px; text-decoration: none; border-radius: 100px; font-weight: 600; font-size: 14px;">
                Découvrir notre engagement →
            </a>
        </div>

        <!-- Tarifs Section -->
        <div style="border: 2px solid #e2e8f0; border-radius: 12px; padding: 20px; margin: 30px 0; text-align: center;">
            <h3 style="color: #0f172a; margin: 0 0 10px 0; font-size: 16px;">💰 Tarification simple et transparente</h3>
            <p style="color: #64748b; margin: 0 0 15px 0; font-size: 14px;">
                Payez uniquement le prix du transport. <strong>Aucun frais caché.</strong>
            </p>
            <a href="https://jeconfie.com/tarifs" style="color: #5046e5; text-decoration: none; font-weight: 600; font-size: 14px;">
                Voir tous nos tarifs →
            </a>
        </div>

        <!-- Help Section -->
        <div style="margin-top: 40px; padding: 25px; background: linear-gradient(135deg, #06b6d415 0%, #0891b215 100%); border-radius: 12px;">
            <h3 style="color: #0f172a; margin: 0 0 15px 0; font-size: 18px;">Besoin d'aide ?</h3>
            <p style="color: #64748b; font-size: 14px; line-height: 1.6; margin: 0 0 20px 0;">
                Notre équipe est là pour vous accompagner dans toutes vos expéditions.
            </p>
            <div style="display: table; width: 100%;">
                <div style="display: table-cell; vertical-align: middle;">
                    <p style="margin: 5px 0; color: #64748b; font-size: 14px;">
                        📧 <strong>Email :</strong> <a href="mailto:service@jeconfie.com" style="color: #06b6d4; text-decoration: none;">service@jeconfie.com</a><br>
                        📞 <strong>Téléphone :</strong> <a href="tel:+330755258023" style="color: #06b6d4; text-decoration: none;">+33 07 55 25 80 23</a><br>
                        💬 <strong>Chat :</strong> Disponible sur votre espace
                    </p>
                </div>
                <div style="display: table-cell; text-align: right; vertical-align: middle;">
                    <a href="https://jeconfie.com/guide-expediteur" style="display: inline-block; background: #06b6d4; color: #ffffff; padding: 10px 25px; text-decoration: none; border-radius: 100px; font-weight: 600; font-size: 14px;">
                        📚 Guide de démarrage
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div style="background-color: #0f172a; padding: 30px; text-align: center;">
        <div style="margin-bottom: 20px;">
            <a href="https://jeconfie.com" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Accueil</a>
            <a href="https://jeconfie.com/user/dashboard" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Mon Espace</a>
            <a href="https://jeconfie.com/tarifs" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Tarifs</a>
            <a href="https://jeconfie.com/help" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Support</a>
            <a href="https://jeconfie.com/terms" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">CGU</a>
        </div>
        <p style="color: #94a3b8; font-size: 12px; margin: 15px 0 0 0;">
            © 2024 JeConfie - Expédiez en toute confiance<br>
            Cet email a été envoyé à {{ $user->email }}<br>
            <a href="https://jeconfie.com/unsubscribe" style="color: #64748b; text-decoration: none; font-size: 11px;">Se désinscrire</a>
        </p>
    </div>
</div>
</body>
</html>
