<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de Protection des Données RGPD - Je confie</title>
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
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 3vw, 1.25rem);
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Main Content */
        .main-container {
            max-width: 1000px;
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

        .section-header {
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 2px solid var(--border);
        }

        .section-title {
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .section-subtitle {
            color: var(--gray);
            font-size: 1.1rem;
        }

        .article {
            margin-bottom: 40px;
        }

        .article-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .article-icon {
            display: inline-flex;
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.1), rgba(5, 150, 105, 0.1));
            color: var(--primary);
            border-radius: var(--radius);
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .article-content {
            color: var(--gray);
            line-height: 1.8;
            margin-left: 44px;
        }

        .article-content p {
            margin-bottom: 12px;
        }

        .article-content ul {
            margin: 16px 0;
            padding-left: 24px;
        }

        .article-content li {
            margin-bottom: 8px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .data-table th {
            background: var(--primary);
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        .data-table td {
            padding: 12px;
            border-bottom: 1px solid var(--border);
            background: white;
        }

        .data-table tr:hover td {
            background: var(--light);
        }

        .warning-box {
            background: #fef3c7;
            border-left: 4px solid var(--warning);
            padding: 20px;
            border-radius: var(--radius);
            margin: 24px 0;
        }

        .warning-box-title {
            font-weight: 700;
            color: var(--warning);
            margin-bottom: 8px;
        }

        .success-box {
            background: #dcfce7;
            border-left: 4px solid var(--success);
            padding: 20px;
            border-radius: var(--radius);
            margin: 24px 0;
        }

        .success-box-title {
            font-weight: 700;
            color: var(--success);
            margin-bottom: 8px;
        }

        .rights-list {
            display: grid;
            gap: 16px;
            margin: 24px 0;
        }

        .right-item {
            background: var(--light);
            padding: 16px;
            border-radius: var(--radius);
            display: flex;
            align-items: start;
            gap: 12px;
        }

        .right-icon {
            width: 32px;
            height: 32px;
            background: var(--success);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .right-content {
            flex: 1;
        }

        .right-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .right-description {
            color: var(--gray);
            font-size: 14px;
        }

        .contact-info {
            background: var(--light);
            padding: 32px;
            border-radius: var(--radius-lg);
            margin: 32px 0;
            text-align: center;
        }

        .contact-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .contact-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        .contact-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .contact-item-icon {
            width: 48px;
            height: 48px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: var(--shadow);
        }

        .contact-item-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .contact-item-value {
            color: var(--primary);
            font-size: 13px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: var(--radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        @media (max-width: 768px) {
            .article-content {
                margin-left: 0;
            }
            
            .data-table {
                font-size: 14px;
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
            <span class="lang-content fr active">Politique de Protection des Données</span>
            <span class="lang-content en">Data Protection Policy</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">RGPD - Règlement Général sur la Protection des Données</span>
            <span class="lang-content en">GDPR - General Data Protection Regulation</span>
        </p>
    </section>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-card">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="lang-content fr active">Politique de Protection des Données (RGPD)</span>
                    <span class="lang-content en">Data Protection Policy (GDPR)</span>
                </h2>
                <p class="section-subtitle">
                    <span class="lang-content fr active">Règlement (UE) 2016/679 du Parlement européen et du Conseil</span>
                    <span class="lang-content en">Regulation (EU) 2016/679 of the European Parliament and of the Council</span>
                </p>
            </div>

            <div class="success-box">
                <div class="success-box-title">
                    🔒 <span class="lang-content fr active">Notre Engagement</span>
                    <span class="lang-content en">Our Commitment</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        JE CONFIE s'engage à protéger vos données personnelles conformément au RGPD et à la loi française Informatique et Libertés (Loi n°78-17 du 6 janvier 1978 modifiée).
                    </span>
                    <span class="lang-content en">
                        JE CONFIE is committed to protecting your personal data in accordance with GDPR and the French Data Protection Act (Law n°78-17 of January 6, 1978, as amended).
                    </span>
                </p>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-icon">👤</span>
                    <span class="lang-content fr active">Responsable du Traitement</span>
                    <span class="lang-content en">Data Controller</span>
                </h3>
                <div class="article-content">
                    <p>
                        <strong>FRANCK JUBEL LOEMBET</strong><br>
                        <span class="lang-content fr active">Entrepreneur individuel</span>
                        <span class="lang-content en">Individual entrepreneur</span><br>
                        32 Avenue Francis de Pressensé, 69200 Vénissieux, France<br>
                        Email DPO: dpo@jeconfie.fr<br>
                        <span class="lang-content fr active">Téléphone</span>
                        <span class="lang-content en">Phone</span>: +33 07 55 25 80 23
                    </p>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-icon">📊</span>
                    <span class="lang-content fr active">Données Collectées</span>
                    <span class="lang-content en">Data Collected</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">Nous collectons uniquement les données nécessaires au fonctionnement de notre service :</span>
                        <span class="lang-content en">We only collect data necessary for our service operation:</span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active"><strong>Données d'identification :</strong> Nom, prénom, date de naissance</span>
                            <span class="lang-content en"><strong>Identification data:</strong> Last name, first name, date of birth</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Coordonnées :</strong> Email, téléphone (vérification via Twilio), adresse postale</span>
                            <span class="lang-content en"><strong>Contact details:</strong> Email, phone (verification via Twilio), postal address</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Données de vérification :</strong> Pièce d'identité (transporteurs uniquement)</span>
                            <span class="lang-content en"><strong>Verification data:</strong> ID document (carriers only)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Données de transaction :</strong> Historique des envois, montants, dates</span>
                            <span class="lang-content en"><strong>Transaction data:</strong> Shipment history, amounts, dates</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Données techniques :</strong> Adresse IP, navigateur, cookies (voir politique cookies)</span>
                            <span class="lang-content en"><strong>Technical data:</strong> IP address, browser, cookies (see cookie policy)</span>
                        </li>
                    </ul>

                    <div class="warning-box" style="margin-top: 20px;">
                        <div class="warning-box-title">
                            ⚠️ <span class="lang-content fr active">Important</span>
                            <span class="lang-content en">Important</span>
                        </div>
                        <p>
                            <span class="lang-content fr active">
                                Nous ne collectons JAMAIS : données de santé, données sensibles (origine raciale, opinions politiques, religieuses), données bancaires (gérées directement par Mollie).
                            </span>
                            <span class="lang-content en">
                                We NEVER collect: health data, sensitive data (racial origin, political or religious opinions), banking data (managed directly by Mollie).
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-icon">🎯</span>
                    <span class="lang-content fr active">Finalités et Base Légale</span>
                    <span class="lang-content en">Purposes and Legal Basis</span>
                </h3>
                <div class="article-content">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="lang-content fr active">Finalité</span>
                                    <span class="lang-content en">Purpose</span>
                                </th>
                                <th>
                                    <span class="lang-content fr active">Base légale</span>
                                    <span class="lang-content en">Legal basis</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Gestion des comptes utilisateurs</span>
                                    <span class="lang-content en">User account management</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Exécution du contrat (Art. 6.1.b RGPD)</span>
                                    <span class="lang-content en">Contract execution (Art. 6.1.b GDPR)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Traitement des paiements</span>
                                    <span class="lang-content en">Payment processing</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Exécution du contrat</span>
                                    <span class="lang-content en">Contract execution</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Vérification d'identité</span>
                                    <span class="lang-content en">Identity verification</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Obligation légale (LCB-FT)</span>
                                    <span class="lang-content en">Legal obligation (AML-CFT)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Prévention de la fraude</span>
                                    <span class="lang-content en">Fraud prevention</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Intérêt légitime (Art. 6.1.f RGPD)</span>
                                    <span class="lang-content en">Legitimate interest (Art. 6.1.f GDPR)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Communications commerciales</span>
                                    <span class="lang-content en">Commercial communications</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Consentement (Art. 6.1.a RGPD)</span>
                                    <span class="lang-content en">Consent (Art. 6.1.a GDPR)</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-icon">👥</span>
                    <span class="lang-content fr active">Vos Droits RGPD</span>
                    <span class="lang-content en">Your GDPR Rights</span>
                </h3>
                <div class="article-content">
                    <div class="rights-list">
                        <div class="right-item">
                            <div class="right-icon">✓</div>
                            <div class="right-content">
                                <div class="right-title">
                                    <span class="lang-content fr active">Droit d'accès (Art. 15 RGPD)</span>
                                    <span class="lang-content en">Right to access (Art. 15 GDPR)</span>
                                </div>
                                <div class="right-description">
                                    <span class="lang-content fr active">Obtenir une copie de vos données personnelles</span>
                                    <span class="lang-content en">Obtain a copy of your personal data</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="right-icon">✓</div>
                            <div class="right-content">
                                <div class="right-title">
                                    <span class="lang-content fr active">Droit de rectification (Art. 16 RGPD)</span>
                                    <span class="lang-content en">Right to rectification (Art. 16 GDPR)</span>
                                </div>
                                <div class="right-description">
                                    <span class="lang-content fr active">Corriger vos données inexactes ou incomplètes</span>
                                    <span class="lang-content en">Correct inaccurate or incomplete data</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="right-icon">✓</div>
                            <div class="right-content">
                                <div class="right-title">
                                    <span class="lang-content fr active">Droit à l'effacement (Art. 17 RGPD)</span>
                                    <span class="lang-content en">Right to erasure (Art. 17 GDPR)</span>
                                </div>
                                <div class="right-description">
                                    <span class="lang-content fr active">Demander la suppression de vos données</span>
                                    <span class="lang-content en">Request deletion of your data</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="right-icon">✓</div>
                            <div class="right-content">
                                <div class="right-title">
                                    <span class="lang-content fr active">Droit à la limitation (Art. 18 RGPD)</span>
                                    <span class="lang-content en">Right to restriction (Art. 18 GDPR)</span>
                                </div>
                                <div class="right-description">
                                    <span class="lang-content fr active">Limiter le traitement de vos données</span>
                                    <span class="lang-content en">Limit processing of your data</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="right-icon">✓</div>
                            <div class="right-content">
                                <div class="right-title">
                                    <span class="lang-content fr active">Droit à la portabilité (Art. 20 RGPD)</span>
                                    <span class="lang-content en">Right to portability (Art. 20 GDPR)</span>
                                </div>
                                <div class="right-description">
                                    <span class="lang-content fr active">Recevoir vos données dans un format structuré</span>
                                    <span class="lang-content en">Receive your data in a structured format</span>
                                </div>
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="right-icon">✓</div>
                            <div class="right-content">
                                <div class="right-title">
                                    <span class="lang-content fr active">Droit d'opposition (Art. 21 RGPD)</span>
                                    <span class="lang-content en">Right to object (Art. 21 GDPR)</span>
                                </div>
                                <div class="right-description">
                                    <span class="lang-content fr active">S'opposer au traitement de vos données</span>
                                    <span class="lang-content en">Object to processing of your data</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-icon">🔐</span>
                    <span class="lang-content fr active">Sécurité des Données</span>
                    <span class="lang-content en">Data Security</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">Mesures techniques et organisationnelles mises en œuvre :</span>
                        <span class="lang-content en">Technical and organizational measures implemented:</span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active">Chiffrement SSL/TLS pour toutes les transmissions</span>
                            <span class="lang-content en">SSL/TLS encryption for all transmissions</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Hébergement sécurisé chez Hostinger (certifié ISO 27001)</span>
                            <span class="lang-content en">Secure hosting at Hostinger (ISO 27001 certified)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Authentification à deux facteurs via Twilio</span>
                            <span class="lang-content en">Two-factor authentication via Twilio</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Paiements sécurisés via Mollie (PCI-DSS niveau 1)</span>
                            <span class="lang-content en">Secure payments via Mollie (PCI-DSS level 1)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Accès restreint aux données personnelles</span>
                            <span class="lang-content en">Restricted access to personal data</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Journalisation et monitoring des accès</span>
                            <span class="lang-content en">Access logging and monitoring</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-icon">⏱️</span>
                    <span class="lang-content fr active">Durée de Conservation</span>
                    <span class="lang-content en">Data Retention</span>
                </h3>
                <div class="article-content">
                    <ul>
                        <li>
                            <span class="lang-content fr active"><strong>Données de compte actif :</strong> Durée de la relation commerciale</span>
                            <span class="lang-content en"><strong>Active account data:</strong> Duration of commercial relationship</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Données de compte inactif :</strong> 3 ans après dernière connexion</span>
                            <span class="lang-content en"><strong>Inactive account data:</strong> 3 years after last login</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Données de transaction :</strong> 10 ans (obligations comptables)</span>
                            <span class="lang-content en"><strong>Transaction data:</strong> 10 years (accounting obligations)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Pièces d'identité :</strong> 5 ans (obligations LCB-FT)</span>
                            <span class="lang-content en"><strong>ID documents:</strong> 5 years (AML-CFT obligations)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Logs de connexion :</strong> 12 mois</span>
                            <span class="lang-content en"><strong>Connection logs:</strong> 12 months</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-icon">🌍</span>
                    <span class="lang-content fr active">Transferts de Données</span>
                    <span class="lang-content en">Data Transfers</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">Vos données peuvent être transférées à nos sous-traitants :</span>
                        <span class="lang-content en">Your data may be transferred to our processors:</span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active"><strong>Mollie B.V. (Pays-Bas) :</strong> Paiements - Conforme RGPD</span>
                            <span class="lang-content en"><strong>Mollie B.V. (Netherlands):</strong> Payments - GDPR compliant</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Twilio Inc. (USA) :</strong> Vérification téléphonique - Clauses contractuelles types</span>
                            <span class="lang-content en"><strong>Twilio Inc. (USA):</strong> Phone verification - Standard contractual clauses</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Hostinger (Singapour) :</strong> Hébergement - Certifié ISO 27001</span>
                            <span class="lang-content en"><strong>Hostinger (Singapore):</strong> Hosting - ISO 27001 certified</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="contact-info">
                <h3 class="contact-title">
                    <span class="lang-content fr active">Exercer vos droits</span>
                    <span class="lang-content en">Exercise your rights</span>
                </h3>
                <p style="color: var(--gray); margin-bottom: 24px;">
                    <span class="lang-content fr active">
                        Pour toute demande concernant vos données personnelles, contactez notre DPO
                    </span>
                    <span class="lang-content en">
                        For any request regarding your personal data, contact our DPO
                    </span>
                </p>
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-item-icon">📧</div>
                        <div class="contact-item-label">Email DPO</div>
                        <div class="contact-item-value">dpo@jeconfie.fr</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">📮</div>
                        <div class="contact-item-label">
                            <span class="lang-content fr active">Courrier</span>
                            <span class="lang-content en">Mail</span>
                        </div>
                        <div class="contact-item-value">32 av. F. de Pressensé, 69200 Vénissieux</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">🏛️</div>
                        <div class="contact-item-label">CNIL</div>
                        <div class="contact-item-value">
                            <span class="lang-content fr active">Réclamation : cnil.fr</span>
                            <span class="lang-content en">Complaint: cnil.fr</span>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 32px; display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                    <a href="/contact" class="btn btn-primary">
                        <span class="lang-content fr active">Contactez-nous</span>
                        <span class="lang-content en">Contact us</span>
                    </a>
                    <a href="#" class="btn btn-outline">
                        <span class="lang-content fr active">Télécharger mes données</span>
                        <span class="lang-content en">Download my data</span>
                    </a>
                </div>
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