<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur JeConfie - Compte Transporteur</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f8fafc;">
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f8fafc; padding: 20px 0;">
    <tr>
        <td align="center">
            <!-- Main Container -->
            <table cellspacing="0" cellpadding="0" border="0" width="600" style="max-width: 600px; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

                <!-- Header -->
                <tr>
                    <td align="center" bgcolor="#5046e5" style="background-color: #5046e5; padding: 40px 20px;">
                        <!-- Logo -->
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center" bgcolor="#ffffff" style="background-color: #ffffff; border-radius: 12px; padding: 12px; margin-bottom: 20px;">
                                    <span style="font-size: 24px; font-weight: 800; color: #5046e5;">JC</span>
                                </td>
                            </tr>
                        </table>

                        <h1 style="color: #ffffff; margin: 20px 0 10px 0; font-size: 28px; font-weight: 700;">
                            Bienvenue chez JeConfie ! 🚚
                        </h1>
                        <p style="color: #ffffff; margin: 0; font-size: 16px;">
                            Votre compte Transporteur Professionnel est actif
                        </p>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding: 40px 30px 30px 30px;">
                        <h2 style="color: #0f172a; font-size: 22px; margin: 0 0 20px 0;">
                            Bonjour {{ $driver->firstName . ' ' . $driver->lastName }} !
                        </h2>

                        <p style="color: #64748b; font-size: 16px; line-height: 1.6; margin: 0 0 25px 0;">
                            Félicitations ! Votre compte transporteur professionnel sur <strong style="color: #5046e5;">JeConfie</strong> est maintenant actif et vérifié.
                            Vous pouvez dès à présent accéder à des milliers d'opportunités de transport et développer votre activité.
                        </p>
                    </td>
                </tr>

                <!-- Info Box -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #e0e7ff; border-left: 4px solid #5046e5; padding: 20px; border-radius: 8px;">
                                    <h3 style="color: #5046e5; margin: 0 0 15px 0; font-size: 18px;">
                                        📋 Vos informations de connexion :
                                    </h3>
                                    <p style="margin: 0; color: #64748b; font-size: 14px; line-height: 1.8;">
                                        <strong>Email :</strong> {{$driver->email}}<br>
                                        <strong>Identifiant :</strong> {{$driver->firstName . ' ' . $driver->lastName}}<br>
                                        <strong>Type de compte :</strong> Transporteur Professionnel<br>
                                        <strong>Statut :</strong> <span style="color: #10b981; font-weight: 600;">✓ Vérifié</span>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- CTA Button -->
                <tr>
                    <td align="center" style="padding: 0 30px 35px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center" bgcolor="#5046e5" style="background-color: #5046e5; border-radius: 50px; padding: 15px 40px;">
                                    <a href="https://jeconfie.com/driver/dashboard" style="color: #ffffff; text-decoration: none; font-weight: 600; font-size: 16px; display: block;">
                                        Accéder à mon tableau de bord →
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Features Grid -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td bgcolor="#f8fafc" style="background-color: #f8fafc; padding: 25px; border-radius: 16px;">
                                    <h3 style="color: #0f172a; margin: 0 0 20px 0; text-align: center; font-size: 18px;">
                                        🎯 Commencez dès maintenant
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="33%" style="padding: 10px; vertical-align: top;">
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tr>
                                                        <td bgcolor="#ffffff" style="background-color: #ffffff; padding: 15px; border-radius: 12px; text-align: center;">
                                                            <p style="font-size: 30px; margin: 0;">📱</p>
                                                            <p style="color: #64748b; margin: 10px 0 0 0; font-size: 13px; font-weight: 600;">
                                                                Complétez votre profil
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="33%" style="padding: 10px; vertical-align: top;">
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tr>
                                                        <td bgcolor="#ffffff" style="background-color: #ffffff; padding: 15px; border-radius: 12px; text-align: center;">
                                                            <p style="font-size: 30px; margin: 0;">🚛</p>
                                                            <p style="color: #64748b; margin: 10px 0 0 0; font-size: 13px; font-weight: 600;">
                                                                Ajoutez vos véhicules
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="33%" style="padding: 10px; vertical-align: top;">
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tr>
                                                        <td bgcolor="#ffffff" style="background-color: #ffffff; padding: 15px; border-radius: 12px; text-align: center;">
                                                            <p style="font-size: 30px; margin: 0;">💰</p>
                                                            <p style="color: #64748b; margin: 10px 0 0 0; font-size: 13px; font-weight: 600;">
                                                                Consultez les offres
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Eco Banner -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td bgcolor="#059669" style="background-color: #059669; padding: 25px; border-radius: 16px; text-align: center;">
                                    <h3 style="color: #ffffff; margin: 0 0 10px 0; font-size: 20px;">
                                        🌱 Transport Écologique
                                    </h3>
                                    <p style="color: #ffffff; margin: 0 0 15px 0; font-size: 15px;">
                                        Rejoignez notre programme éco-responsable et bénéficiez d'avantages exclusifs
                                    </p>
                                    <table cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tr>
                                            <td bgcolor="#ffffff" style="background-color: #ffffff; border-radius: 50px; padding: 12px 30px;">
                                                <a href="https://jeconfie.com/transporteur/eco-programme" style="color: #059669; text-decoration: none; font-weight: 600; font-size: 14px; display: block;">
                                                    En savoir plus →
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Promotional Offer -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td bgcolor="#f59e0b" style="background-color: #f59e0b; padding: 25px; border-radius: 16px; text-align: center;">
                                    <h3 style="color: #ffffff; margin: 0 0 10px 0; font-size: 20px;">
                                        🎁 Offre de bienvenue exclusive
                                    </h3>
                                    <p style="color: #ffffff; margin: 0 0 15px 0; font-size: 18px; font-weight: 700;">
                                        -20% de commission sur vos 10 premières livraisons !
                                    </p>
                                    <p style="color: #ffffff; margin: 0; font-size: 13px;">
                                        Offre automatiquement appliquée à votre compte
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Trust Section -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #f8fafc; border: 2px solid #e2e8f0; padding: 20px; border-radius: 12px;">
                                    <h3 style="color: #0f172a; margin: 0 0 15px 0; font-size: 16px;">
                                        🛡️ Pourquoi les transporteurs choisissent JeConfie ?
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #5046e5; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #64748b; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong style="color: #5046e5;">Paiements garantis</strong> sous 48h
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #5046e5; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #64748b; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong style="color: #5046e5;">Assurance incluse</strong> sur toutes les livraisons
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #5046e5; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #64748b; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong style="color: #5046e5;">0 frais cachés</strong>, tarification transparente
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20" valign="top" style="padding: 4px 0;">
                                                <span style="color: #5046e5; font-size: 16px;">•</span>
                                            </td>
                                            <td style="color: #64748b; font-size: 14px; padding: 4px 0; line-height: 1.6;">
                                                <strong style="color: #5046e5;">Support dédié</strong> disponible 7j/7
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Quick Stats -->
                <tr>
                    <td style="padding: 0 30px 30px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 30px 0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
                                    <h3 style="color: #0f172a; margin: 0 0 20px 0; font-size: 18px;">
                                        📊 JeConfie en chiffres
                                    </h3>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width: 400px; margin: 0 auto;">
                                        <tr>
                                            <td width="33%" style="text-align: center; padding: 10px;">
                                                <p style="font-size: 28px; font-weight: 700; color: #5046e5; margin: 0;">15K+</p>
                                                <p style="font-size: 12px; color: #64748b; margin: 5px 0 0 0;">Livraisons/mois</p>
                                            </td>
                                            <td width="33%" style="text-align: center; padding: 10px;">
                                                <p style="font-size: 28px; font-weight: 700; color: #059669; margin: 0;">98%</p>
                                                <p style="font-size: 12px; color: #64748b; margin: 5px 0 0 0;">Satisfaction</p>
                                            </td>
                                            <td width="33%" style="text-align: center; padding: 10px;">
                                                <p style="font-size: 28px; font-weight: 700; color: #06b6d4; margin: 0;">24h</p>
                                                <p style="font-size: 12px; color: #64748b; margin: 5px 0 0 0;">Paiement rapide</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Help Section -->
                <tr>
                    <td style="padding: 0 30px 40px 30px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="background-color: #e0e7ff; padding: 25px; border-radius: 12px;">
                                    <h3 style="color: #0f172a; margin: 0 0 15px 0; font-size: 18px;">
                                        Besoin d'aide pour démarrer ?
                                    </h3>
                                    <p style="color: #64748b; font-size: 14px; line-height: 1.6; margin: 0 0 20px 0;">
                                        Notre équipe support est là pour vous accompagner dans vos premiers pas sur la plateforme.
                                    </p>

                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <p style="margin: 0; color: #64748b; font-size: 14px; line-height: 1.8;">
                                                    📧 <strong>Email :</strong> <a href="mailto:service@jeconfie.com" style="color: #5046e5; text-decoration: none;">service@jeconfie.com</a><br>
                                                    📞 <strong>Téléphone :</strong> <a href="tel:+330755258023" style="color: #5046e5; text-decoration: none;">+33 07 55 25 80 23</a><br>
                                                    💬 <strong>Chat :</strong> Disponible sur votre tableau de bord
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding-top: 20px;">
                                                <table cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td bgcolor="#5046e5" style="background-color: #5046e5; border-radius: 50px; padding: 10px 25px;">
                                                            <a href="https://jeconfie.com/transporteur/guide" style="color: #ffffff; text-decoration: none; font-weight: 600; font-size: 14px; display: block;">
                                                                📚 Guide complet
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td bgcolor="#0f172a" style="background-color: #0f172a; padding: 30px; text-align: center;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td align="center" style="padding-bottom: 20px;">
                                    <a href="https://jeconfie.com" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Accueil</a>
                                    <a href="https://jeconfie.com/transporteur/dashboard" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Dashboard</a>
                                    <a href="https://jeconfie.com/transporteur/offres" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Offres</a>
                                    <a href="https://jeconfie.com/help" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">Centre d'aide</a>
                                    <a href="https://jeconfie.com/terms" style="color: #e2e8f0; text-decoration: none; margin: 0 10px; font-size: 14px;">CGU</a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <p style="color: #94a3b8; font-size: 12px; margin: 0; line-height: 1.6;">
                                        © 2024 JeConfie - La marketplace du transport de confiance<br>
                                        Cet email a été envoyé à {{$driver->email}}<br>
                                        <a href="https://jeconfie.com/unsubscribe" style="color: #64748b; text-decoration: none; font-size: 11px;">Se désinscrire</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
