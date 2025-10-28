<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions Légales - Je confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background: #f8fafc;
        }

        :root {
            --primary: #5046e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --secondary: #06b6d4;
            --success: #10b981;
            --eco-green: #059669;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #0f172a;
            --gray: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --border: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --radius: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
        }

        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: inline-block;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            z-index: 1000;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 72px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 18px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .language-switcher {
            display: flex;
            gap: 4px;
            background: var(--light);
            padding: 4px;
            border-radius: 100px;
        }

        .lang-btn {
            padding: 8px 16px;
            border: none;
            background: transparent;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            color: var(--gray);
            border-radius: 100px;
            transition: all 0.3s ease;
        }

        .lang-btn.active {
            background: var(--primary);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            padding: 120px 20px 60px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -300px;
            right: -150px;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            bottom: -200px;
            left: -100px;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 3vw, 1.25rem);
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: -40px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .content-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: clamp(24px, 5vw, 48px);
            box-shadow: var(--shadow-lg);
        }

        .section {
            margin-bottom: 48px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .legal-content {
            color: var(--gray);
            line-height: 1.8;
        }

        .legal-content strong {
            color: var(--dark);
            font-weight: 600;
        }

        .legal-item {
            margin-bottom: 20px;
        }

        .legal-label {
            font-weight: 700;
            color: var(--dark);
            display: block;
            margin-bottom: 8px;
        }

        .legal-value {
            color: var(--gray);
            padding-left: 20px;
        }

        /* Info Boxes */
        .info-box {
            padding: 24px;
            border-radius: var(--radius-lg);
            margin: 24px 0;
        }

        .info-box-blue {
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.05), rgba(6, 182, 212, 0.05));
            border-left: 4px solid var(--secondary);
        }

        .info-box-green {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.05), rgba(16, 185, 129, 0.05));
            border-left: 4px solid var(--success);
        }

        .info-box-red {
            background: #fee2e2;
            border-left: 4px solid var(--danger);
        }

        .info-box-yellow {
            background: #fef3c7;
            border-left: 4px solid var(--warning);
        }

        .info-box-title {
            font-weight: 700;
            margin-bottom: 12px;
            font-size: 1.1rem;
        }

        .info-box-blue .info-box-title {
            color: var(--secondary);
        }

        .info-box-green .info-box-title {
            color: var(--success);
        }

        .info-box-red .info-box-title {
            color: var(--danger);
        }

        .info-box-yellow .info-box-title {
            color: var(--warning);
        }

        /* Legal Grid */
        .legal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin: 24px 0;
        }

        .legal-card {
            background: var(--light);
            border-radius: var(--radius-lg);
            padding: 24px;
            border: 2px solid var(--border);
            transition: all 0.3s ease;
        }

        .legal-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow);
        }

        .legal-card-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legal-card-icon {
            font-size: 24px;
        }

        .legal-card-content {
            color: var(--gray);
            font-size: 14px;
            line-height: 1.6;
        }

        .legal-card-content a {
            color: var(--primary);
            text-decoration: none;
        }

        .legal-card-content a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .legal-grid {
                grid-template-columns: 1fr;
            }
            
            .section-title {
                font-size: 1.25rem;
            }
            
            .legal-value {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="logo">
                <div class="logo-icon">JC</div>
                <span class="logo-text">Je confie</span>
            </a>
            
            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1 class="hero-title">
            <span class="lang-content fr active">Mentions Légales</span>
            <span class="lang-content en">Legal Notice</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">Informations légales et réglementaires de la plateforme Je confie</span>
            <span class="lang-content en">Legal and regulatory information of the Je confie platform</span>
        </p>
    </section>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-card">
            
            <!-- Avertissement Important -->
            <div class="info-box info-box-red">
                <div class="info-box-title">
                    🚨 <span class="lang-content fr active">AVERTISSEMENT CRUCIAL - PLATEFORME D'INTERMÉDIATION PURE</span>
                    <span class="lang-content en">CRITICAL WARNING - PURE INTERMEDIATION PLATFORM</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        <strong>JE CONFIE N'EST PAS UN TRANSPORTEUR.</strong> Nous sommes exclusivement une plateforme technique d'intermédiation entre particuliers. Nous ne transportons aucun colis, ne garantissons aucune livraison et déclinons toute responsabilité concernant l'exécution du transport. Les utilisateurs contractent directement entre eux à leurs propres risques et périls.
                    </span>
                    <span class="lang-content en">
                        <strong>JE CONFIE IS NOT A CARRIER.</strong> We are exclusively a technical intermediation platform between individuals. We do not transport any packages, do not guarantee any delivery and decline all liability regarding transport execution. Users contract directly with each other at their own risk.
                    </span>
                </p>
            </div>

            <!-- Éditeur du Site -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">👤</span>
                    <span class="lang-content fr active">Éditeur du Site</span>
                    <span class="lang-content en">Site Publisher</span>
                </h2>
                <div class="legal-content">
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Raison sociale :</span>
                            <span class="lang-content en">Company name:</span>
                        </span>
                        <span class="legal-value">FRANCK JUBEL LOEMBET - Entrepreneur individuel</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Siège social :</span>
                            <span class="lang-content en">Registered office:</span>
                        </span>
                        <span class="legal-value">32 Avenue Francis de Pressensé, 69200 Vénissieux, France</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">SIRET :</span>
                        <span class="legal-value">988 109 625 00018</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">SIREN :</span>
                        <span class="legal-value">988 109 625</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">N° TVA Intracommunautaire :</span>
                            <span class="lang-content en">Intra-community VAT number:</span>
                        </span>
                        <span class="legal-value">FR60988109625</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Date de création :</span>
                            <span class="lang-content en">Creation date:</span>
                        </span>
                        <span class="legal-value">19 juin 2024</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Code APE/NAF :</span>
                            <span class="lang-content en">APE/NAF Code:</span>
                        </span>
                        <span class="legal-value">6312Z - Portails internet</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Forme juridique :</span>
                            <span class="lang-content en">Legal form:</span>
                        </span>
                        <span class="legal-value">
                            <span class="lang-content fr active">Entreprise individuelle (EI)</span>
                            <span class="lang-content en">Individual business</span>
                        </span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Directeur de publication :</span>
                            <span class="lang-content en">Publication Director:</span>
                        </span>
                        <span class="legal-value">Franck Jubel LOEMBET</span>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">📞</span>
                    <span class="lang-content fr active">Contact</span>
                    <span class="lang-content en">Contact</span>
                </h2>
                <div class="legal-grid">
                    <div class="legal-card">
                        <div class="legal-card-title">
                            <span class="legal-card-icon">✉️</span>
                            <span class="lang-content fr active">Emails</span>
                            <span class="lang-content en">Emails</span>
                        </div>
                        <div class="legal-card-content">
                            <strong>Contact général :</strong> contact@jeconfie.fr<br>
                            <strong>Support technique :</strong> support@jeconfie.fr<br>
                            <strong>Gestion :</strong> gestion@jeconfie.fr<br>
                            <strong>Service :</strong> service@jeconfie.com<br>
                            <strong>Protection des données :</strong> dpo@jeconfie.fr
                        </div>
                    </div>
                    <div class="legal-card">
                        <div class="legal-card-title">
                            <span class="legal-card-icon">📱</span>
                            <span class="lang-content fr active">Téléphones</span>
                            <span class="lang-content en">Phones</span>
                        </div>
                        <div class="legal-card-content">
                            <strong>Support :</strong> +33 07 55 25 80 23<br>
                            <strong>Gestion :</strong> +33 06 31 67 67 44<br>
                            <br>
                            <span class="lang-content fr active">
                                <em>Horaires : Lun-Ven 9h-18h</em>
                            </span>
                            <span class="lang-content en">
                                <em>Hours: Mon-Fri 9am-6pm</em>
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Hébergement -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">🌐</span>
                    <span class="lang-content fr active">Hébergement</span>
                    <span class="lang-content en">Hosting</span>
                </h2>
                <div class="legal-content">
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Hébergeur :</span>
                            <span class="lang-content en">Host:</span>
                        </span>
                        <span class="legal-value">Hostinger International Ltd</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Adresse du siège :</span>
                            <span class="lang-content en">Headquarters:</span>
                        </span>
                        <span class="legal-value">61 Lordou Vironos Street, 6023 Larnaca, Cyprus</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Site web :</span>
                            <span class="lang-content en">Website:</span>
                        </span>
                        <span class="legal-value"><a href="https://www.hostinger.fr" target="_blank">https://www.hostinger.fr</a></span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Localisation du serveur :</span>
                            <span class="lang-content en">Server location:</span>
                        </span>
                        <span class="legal-value">Asia (Singapore)</span>
                    </div>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Certification :</span>
                            <span class="lang-content en">Certification:</span>
                        </span>
                        <span class="legal-value">ISO 27001</span>
                    </div>
                </div>
            </section>

            <!-- Partenaires Techniques -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">🤝</span>
                    <span class="lang-content fr active">Partenaires Techniques</span>
                    <span class="lang-content en">Technical Partners</span>
                </h2>
                
                <div class="info-box info-box-blue">
                    <div class="info-box-title">💳 Mollie B.V. - <span class="lang-content fr active">Paiements Sécurisés</span><span class="lang-content en">Secure Payments</span></div>
                    <p>
                        <span class="lang-content fr active">
                            <strong>Établissement de paiement agréé</strong> par la Banque Centrale des Pays-Bas<br>
                            • Certification PCI-DSS niveau 1<br>
                            • Système de séquestre sécurisé<br>
                            • Commission prélevée : 15% à 20% HT par transaction<br>
                            • TVA applicable : 20% sur la commission<br>
                            <em>Note : JE CONFIE ne détient jamais directement les fonds des utilisateurs</em>
                        </span>
                        <span class="lang-content en">
                            <strong>Licensed payment institution</strong> by the Dutch Central Bank<br>
                            • PCI-DSS Level 1 certification<br>
                            • Secure escrow system<br>
                            • Commission charged: 15% to 20% excluding VAT per transaction<br>
                            • Applicable VAT: 20% on commission<br>
                            <em>Note: JE CONFIE never directly holds user funds</em>
                        </span>
                    </p>
                </div>

                <div class="info-box info-box-green">
                    <div class="info-box-title">🔐 Twilio Inc. - <span class="lang-content fr active">Vérification d'Identité</span><span class="lang-content en">Identity Verification</span></div>
                    <p>
                        <span class="lang-content fr active">
                            • Vérification des numéros de téléphone par SMS<br>
                            • Authentification à deux facteurs<br>
                            • Protection antispam<br>
                            • Vérification automatique par email<br>
                            <em>Conformité RGPD avec clauses contractuelles types</em>
                        </span>
                        <span class="lang-content en">
                            • Phone number verification by SMS<br>
                            • Two-factor authentication<br>
                            • Antispam protection<br>
                            • Automatic email verification<br>
                            <em>GDPR compliance with standard contractual clauses</em>
                        </span>
                    </p>
                </div>

                <div class="info-box info-box-yellow">
                    <div class="info-box-title">⚠️ <span class="lang-content fr active">Absence d'Assurance</span><span class="lang-content en">No Insurance</span></div>
                    <p>
                        <span class="lang-content fr active">
                            <strong>IMPORTANT :</strong> JE CONFIE ne propose actuellement AUCUNE assurance transport.<br>
                            Les utilisateurs transportent et expédient à leurs propres risques.<br>
                            Une option d'assurance est en cours de négociation et pourra être proposée ultérieurement.
                        </span>
                        <span class="lang-content en">
                            <strong>IMPORTANT:</strong> JE CONFIE currently offers NO transport insurance.<br>
                            Users transport and ship at their own risk.<br>
                            An insurance option is being negotiated and may be offered later.
                        </span>
                    </p>
                </div>
            </section>

            <!-- Nature du Service -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">⚖️</span>
                    <span class="lang-content fr active">Nature du Service et Responsabilités</span>
                    <span class="lang-content en">Nature of Service and Responsibilities</span>
                </h2>
                
                <div class="info-box info-box-red">
                    <div class="info-box-title">
                        🚫 <span class="lang-content fr active">LIMITATION TOTALE DE RESPONSABILITÉ</span>
                        <span class="lang-content en">COMPLETE LIMITATION OF LIABILITY</span>
                    </div>
                    <p>
                        <span class="lang-content fr active">
                            JE CONFIE est <strong>EXCLUSIVEMENT</strong> une plateforme d'intermédiation technique. Nous ne sommes en AUCUN CAS :<br><br>
                            ❌ Un transporteur ou commissionnaire de transport<br>
                            ❌ Partie au contrat de transport entre utilisateurs<br>
                            ❌ Responsables de l'exécution du transport<br>
                            ❌ Garants de la livraison ou de l'état des colis<br>
                            ❌ Assureurs des marchandises transportées<br><br>
                            
                            <strong>NOUS DÉCLINONS TOUTE RESPONSABILITÉ</strong> concernant :<br>
                            • Les dommages, pertes, vols ou détériorations de colis<br>
                            • Les retards ou non-livraisons<br>
                            • Les accidents survenant durant le transport<br>
                            • La conformité légale des marchandises<br>
                            • Les litiges entre utilisateurs<br>
                            • Les violations de réglementations (douanières, fiscales, sanitaires)<br>
                            • Tout préjudice direct ou indirect<br><br>
                            
                            <strong>LES UTILISATEURS ACCEPTENT CETTE LIMITATION EN UTILISANT NOTRE SERVICE.</strong>
                        </span>
                        <span class="lang-content en">
                            JE CONFIE is <strong>EXCLUSIVELY</strong> a technical intermediation platform. We are in NO CASE:<br><br>
                            ❌ A carrier or freight forwarder<br>
                            ❌ Party to the transport contract between users<br>
                            ❌ Responsible for transport execution<br>
                            ❌ Guarantors of delivery or package condition<br>
                            ❌ Insurers of transported goods<br><br>
                            
                            <strong>WE DECLINE ALL LIABILITY</strong> regarding:<br>
                            • Damage, loss, theft or deterioration of packages<br>
                            • Delays or non-deliveries<br>
                            • Accidents occurring during transport<br>
                            • Legal compliance of goods<br>
                            • Disputes between users<br>
                            • Regulatory violations (customs, tax, health)<br>
                            • Any direct or indirect damage<br><br>
                            
                            <strong>USERS ACCEPT THIS LIMITATION BY USING OUR SERVICE.</strong>
                        </span>
                    </p>
                </div>
            </section>

            <!-- Propriété Intellectuelle -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">©️</span>
                    <span class="lang-content fr active">Propriété Intellectuelle</span>
                    <span class="lang-content en">Intellectual Property</span>
                </h2>
                <div class="legal-content">
                    <p>
                        <span class="lang-content fr active">
                            L'ensemble du contenu de ce site (textes, images, vidéos, logos, marques) est la propriété exclusive de FRANCK JUBEL LOEMBET ou de ses partenaires. Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, est strictement interdite sans autorisation écrite préalable.
                        </span>
                        <span class="lang-content en">
                            All content on this site (texts, images, videos, logos, brands) is the exclusive property of FRANCK JUBEL LOEMBET or its partners. Any reproduction, distribution, modification, adaptation, retransmission or publication, even partial, is strictly prohibited without prior written authorization.
                        </span>
                    </p>
                    <br>
                    <p>
                        <span class="lang-content fr active">
                            La marque "Je confie" est protégée. Toute utilisation non autorisée peut entraîner des poursuites judiciaires.
                        </span>
                        <span class="lang-content en">
                            The "Je confie" brand is protected. Any unauthorized use may result in legal action.
                        </span>
                    </p>
                </div>
            </section>

            <!-- Protection des Données -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">🔒</span>
                    <span class="lang-content fr active">Protection des Données Personnelles</span>
                    <span class="lang-content en">Personal Data Protection</span>
                </h2>
                <div class="legal-content">
                    <p>
                        <span class="lang-content fr active">
                            Conformément au Règlement Général sur la Protection des Données (RGPD - Règlement UE 2016/679) et à la loi française Informatique et Libertés (Loi n°78-17 du 6 janvier 1978 modifiée), nous nous engageons à protéger vos données personnelles.
                        </span>
                        <span class="lang-content en">
                            In accordance with the General Data Protection Regulation (GDPR - EU Regulation 2016/679) and the French Data Protection Act (Law n°78-17 of January 6, 1978 as amended), we are committed to protecting your personal data.
                        </span>
                    </p>
                    <br>
                    <div class="legal-item">
                        <span class="legal-label">
                            <span class="lang-content fr active">Délégué à la Protection des Données (DPO) :</span>
                            <span class="lang-content en">Data Protection Officer (DPO):</span>
                        </span>
                        <span class="legal-value">
                            Email : dpo@jeconfie.fr<br>
                            <span class="lang-content fr active">
                                Pour exercer vos droits RGPD ou pour toute question sur le traitement de vos données
                            </span>
                            <span class="lang-content en">
                                To exercise your GDPR rights or for any questions about data processing
                            </span>
                        </span>
                    </div>
                    <br>
                    <p>
                        <span class="lang-content fr active">
                            <strong>Important :</strong> Nous ne collectons AUCUNE pièce d'identité. La vérification se fait uniquement par numéro de téléphone et email.
                        </span>
                        <span class="lang-content en">
                            <strong>Important:</strong> We do NOT collect ANY identity documents. Verification is done only by phone number and email.
                        </span>
                    </p>
                    <br>
                    <p>
                        <span class="lang-content fr active">
                            Pour plus d'informations, consultez notre <a href="/rgpd" style="color: var(--primary);">Politique de Protection des Données</a>.
                        </span>
                        <span class="lang-content en">
                            For more information, see our <a href="/rgpd" style="color: var(--primary);">Data Protection Policy</a>.
                        </span>
                    </p>
                </div>
            </section>

            <!-- Juridiction -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">⚖️</span>
                    <span class="lang-content fr active">Droit Applicable et Juridiction</span>
                    <span class="lang-content en">Applicable Law and Jurisdiction</span>
                </h2>
                <div class="legal-content">
                    <p>
                        <span class="lang-content fr active">
                            Les présentes mentions légales et l'utilisation du site sont régies par le droit français.<br><br>
                            En cas de litige, une solution amiable sera recherchée avant toute action judiciaire. À défaut d'accord amiable, <strong>les tribunaux de Lyon seront seuls compétents</strong>, nonobstant pluralité de défendeurs ou appel en garantie, même pour les procédures d'urgence ou les mesures conservatoires, en référé ou sur requête.<br><br>
                            <strong>Médiation :</strong> En cas de litige, vous pouvez recourir gratuitement au médiateur de la consommation :<br>
                            • Par voie électronique : <a href="https://ec.europa.eu/consumers/odr" target="_blank" style="color: var(--primary);">https://ec.europa.eu/consumers/odr</a><br>
                            • Par voie postale : Médiation de la consommation - ANM Conso
                        </span>
                        <span class="lang-content en">
                            These legal notices and the use of the site are governed by French law.<br><br>
                            In case of dispute, an amicable solution will be sought before any legal action. In the absence of an amicable agreement, <strong>the courts of Lyon shall have sole jurisdiction</strong>, notwithstanding plurality of defendants or third party claims, even for emergency procedures or protective measures, in summary proceedings or on application.<br><br>
                            <strong>Mediation:</strong> In case of dispute, you can use the consumer mediator free of charge:<br>
                            • Online: <a href="https://ec.europa.eu/consumers/odr" target="_blank" style="color: var(--primary);">https://ec.europa.eu/consumers/odr</a><br>
                            • By mail: Consumer Mediation - ANM Conso
                        </span>
                    </p>
                </div>
            </section>

            <!-- Mise à jour -->
            <div class="info-box info-box-green">
                <div class="info-box-title">
                    📅 <span class="lang-content fr active">Dernière mise à jour</span>
                    <span class="lang-content en">Last update</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        Ces mentions légales ont été mises à jour le 1er décembre 2024.<br>
                        Nous nous réservons le droit de les modifier à tout moment. Les modifications prennent effet immédiatement après leur publication.
                    </span>
                    <span class="lang-content en">
                        These legal notices were last updated on December 1, 2024.<br>
                        We reserve the right to modify them at any time. Changes take effect immediately after publication.
                    </span>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Language switcher
        function switchLanguage(lang) {
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            document.querySelectorAll('.lang-content').forEach(content => {
                content.classList.remove('active');
            });
            
            document.querySelectorAll('.lang-content.' + lang).forEach(content => {
                content.classList.add('active');
            });
            
            localStorage.setItem('preferredLanguage', lang);
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            const preferredLang = localStorage.getItem('preferredLanguage');
            if (preferredLang === 'en') {
                const enBtn = document.querySelector('.lang-btn[onclick*="en"]');
                if (enBtn) {
                    enBtn.click();
                }
            }
        });
    </script>
</body>
</html>