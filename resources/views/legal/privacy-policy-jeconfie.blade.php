<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de Confidentialité - Je confie</title>
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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.6s ease forwards;
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
            content: '🔐';
            position: absolute;
            font-size: 200px;
            opacity: 0.1;
            top: -50px;
            left: 10%;
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

        /* Table of Contents */
        .toc {
            background: var(--light);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 32px;
        }

        .toc-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .toc-list {
            list-style: none;
            padding-left: 0;
        }

        .toc-item {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }

        .toc-item::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--primary);
        }

        .toc-link {
            color: var(--gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .toc-link:hover {
            color: var(--primary);
        }

        /* Sections */
        .section {
            margin-bottom: 48px;
            scroll-margin-top: 100px;
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

        .subsection {
            margin: 24px 0;
        }

        .subsection-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 16px;
        }

        /* Info Boxes */
        .info-box {
            padding: 20px;
            border-radius: var(--radius);
            margin: 24px 0;
        }

        .info-box-blue {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1), rgba(80, 70, 229, 0.1));
            border-left: 4px solid var(--secondary);
        }

        .info-box-green {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.1), rgba(16, 185, 129, 0.1));
            border-left: 4px solid var(--success);
        }

        .info-box-warning {
            background: #fef3c7;
            border-left: 4px solid var(--warning);
        }

        .info-box-danger {
            background: #fee2e2;
            border-left: 4px solid var(--danger);
        }

        .info-box-title {
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-box-blue .info-box-title {
            color: var(--secondary);
        }

        .info-box-green .info-box-title {
            color: var(--success);
        }

        .info-box-warning .info-box-title {
            color: var(--warning);
        }

        .info-box-danger .info-box-title {
            color: var(--danger);
        }

        /* Tables */
        .data-table {
            width: 100%;
            margin: 24px 0;
            border-collapse: collapse;
            overflow-x: auto;
            display: block;
        }

        .data-table table {
            width: 100%;
            min-width: 600px;
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
            vertical-align: top;
        }

        .data-table tr:hover td {
            background: var(--light);
        }

        /* Rights List */
        .rights-list {
            display: grid;
            gap: 16px;
            margin: 24px 0;
        }

        .right-item {
            background: var(--light);
            padding: 20px;
            border-radius: var(--radius);
            display: flex;
            align-items: start;
            gap: 16px;
        }

        .right-icon {
            width: 40px;
            height: 40px;
            background: var(--success);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .right-content {
            flex: 1;
        }

        .right-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .right-description {
            color: var(--gray);
            line-height: 1.8;
        }

        /* Contact Info */
        .contact-card {
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.05), rgba(5, 150, 105, 0.05));
            border-radius: var(--radius-lg);
            padding: 32px;
            text-align: center;
            margin: 32px 0;
        }

        .contact-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 24px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            text-align: left;
        }

        .contact-item {
            background: white;
            padding: 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
        }

        .contact-item-icon {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .contact-item-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .contact-item-text {
            color: var(--gray);
            font-size: 14px;
        }

        /* Buttons */
        .btn {
            padding: 14px 28px;
            border-radius: var(--radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
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

        @media (max-width: 768px) {
            .data-table {
                overflow-x: scroll;
            }

            .contact-grid {
                grid-template-columns: 1fr;
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
            <span class="lang-content fr active">Politique de Confidentialité</span>
            <span class="lang-content en">Privacy Policy</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">Protection et transparence sur l'utilisation de vos données personnelles</span>
            <span class="lang-content en">Protection and transparency on the use of your personal data</span>
        </p>
    </section>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-card">
            
            <!-- Table of Contents -->
            <div class="toc">
                <h2 class="toc-title">
                    <span class="lang-content fr active">Sommaire</span>
                    <span class="lang-content en">Table of Contents</span>
                </h2>
                <ul class="toc-list">
                    <li class="toc-item">
                        <a href="#controller" class="toc-link">
                            <span class="lang-content fr active">1. Responsable du traitement</span>
                            <span class="lang-content en">1. Data Controller</span>
                        </a>
                    </li>
                    <li class="toc-item">
                        <a href="#collected-data" class="toc-link">
                            <span class="lang-content fr active">2. Données collectées</span>
                            <span class="lang-content en">2. Data Collected</span>
                        </a>
                    </li>
                    <li class="toc-item">
                        <a href="#purposes" class="toc-link">
                            <span class="lang-content fr active">3. Finalités et base légale</span>
                            <span class="lang-content en">3. Purposes and Legal Basis</span>
                        </a>
                    </li>
                    <li class="toc-item">
                        <a href="#rights" class="toc-link">
                            <span class="lang-content fr active">4. Vos droits</span>
                            <span class="lang-content en">4. Your Rights</span>
                        </a>
                    </li>
                    <li class="toc-item">
                        <a href="#security" class="toc-link">
                            <span class="lang-content fr active">5. Sécurité des données</span>
                            <span class="lang-content en">5. Data Security</span>
                        </a>
                    </li>
                    <li class="toc-item">
                        <a href="#retention" class="toc-link">
                            <span class="lang-content fr active">6. Conservation des données</span>
                            <span class="lang-content en">6. Data Retention</span>
                        </a>
                    </li>
                    <li class="toc-item">
                        <a href="#transfers" class="toc-link">
                            <span class="lang-content fr active">7. Transferts de données</span>
                            <span class="lang-content en">7. Data Transfers</span>
                        </a>
                    </li>
                    <li class="toc-item">
                        <a href="#contact" class="toc-link">
                            <span class="lang-content fr active">8. Contact DPO</span>
                            <span class="lang-content en">8. DPO Contact</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Introduction -->
            <div class="info-box info-box-blue">
                <div class="info-box-title">
                    🛡️ <span class="lang-content fr active">Notre engagement RGPD</span>
                    <span class="lang-content en">Our GDPR Commitment</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        JE CONFIE s'engage à protéger vos données personnelles conformément au Règlement Général sur la Protection des Données (RGPD - Règlement UE 2016/679) et à la loi française Informatique et Libertés (Loi n°78-17 du 6 janvier 1978 modifiée). Cette politique détaille comment nous collectons, utilisons et protégeons vos informations.
                    </span>
                    <span class="lang-content en">
                        JE CONFIE is committed to protecting your personal data in accordance with the General Data Protection Regulation (GDPR - EU Regulation 2016/679) and the French Data Protection Act (Law n°78-17 of January 6, 1978, as amended). This policy details how we collect, use and protect your information.
                    </span>
                </p>
            </div>

            <!-- Section 1: Data Controller -->
            <section class="section" id="controller">
                <h2 class="section-title">
                    <span class="section-icon">👤</span>
                    <span class="lang-content fr active">1. Responsable du traitement</span>
                    <span class="lang-content en">1. Data Controller</span>
                </h2>
                
                <p>
                    <span class="lang-content fr active">
                        <strong>Identité du responsable :</strong><br>
                        FRANCK JUBEL LOEMBET - Entrepreneur individuel<br>
                        32 Avenue Francis de Pressensé<br>
                        69200 Vénissieux, France<br><br>
                        
                        <strong>SIRET :</strong> 988 109 625 00018<br>
                        <strong>TVA Intracommunautaire :</strong> FR60988109625<br>
                        <strong>Code APE/NAF :</strong> 6312Z - Portails internet<br><br>
                        
                        <strong>Délégué à la Protection des Données (DPO) :</strong><br>
                        Email : dpo@jeconfie.fr<br>
                        Téléphone : +33 07 55 25 80 23
                    </span>
                    <span class="lang-content en">
                        <strong>Controller Identity:</strong><br>
                        FRANCK JUBEL LOEMBET - Individual Entrepreneur<br>
                        32 Avenue Francis de Pressensé<br>
                        69200 Vénissieux, France<br><br>
                        
                        <strong>SIRET:</strong> 988 109 625 00018<br>
                        <strong>Intra-community VAT:</strong> FR60988109625<br>
                        <strong>APE/NAF Code:</strong> 6312Z - Internet portals<br><br>
                        
                        <strong>Data Protection Officer (DPO):</strong><br>
                        Email: dpo@jeconfie.fr<br>
                        Phone: +33 07 55 25 80 23
                    </span>
                </p>
            </section>

            <!-- Section 2: Collected Data -->
            <section class="section" id="collected-data">
                <h2 class="section-title">
                    <span class="section-icon">📊</span>
                    <span class="lang-content fr active">2. Données collectées</span>
                    <span class="lang-content en">2. Data Collected</span>
                </h2>
                
                <div class="subsection">
                    <h3 class="subsection-title">
                        <span class="lang-content fr active">2.1. Données d'identification</span>
                        <span class="lang-content en">2.1. Identification Data</span>
                    </h3>
                    <ul>
                        <li>
                            <span class="lang-content fr active">Nom et prénom</span>
                            <span class="lang-content en">Last name and first name</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Date de naissance (vérification de majorité)</span>
                            <span class="lang-content en">Date of birth (age verification)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Pièce d'identité (transporteurs uniquement, vérifiée puis supprimée)</span>
                            <span class="lang-content en">ID document (carriers only, verified then deleted)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Photo de profil (optionnel)</span>
                            <span class="lang-content en">Profile photo (optional)</span>
                        </li>
                    </ul>
                </div>

                <div class="subsection">
                    <h3 class="subsection-title">
                        <span class="lang-content fr active">2.2. Coordonnées</span>
                        <span class="lang-content en">2.2. Contact Details</span>
                    </h3>
                    <ul>
                        <li>
                            <span class="lang-content fr active">Adresse email</span>
                            <span class="lang-content en">Email address</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Numéro de téléphone (vérifié via Twilio)</span>
                            <span class="lang-content en">Phone number (verified via Twilio)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Adresse postale (pour les envois/réceptions)</span>
                            <span class="lang-content en">Postal address (for shipping/receiving)</span>
                        </li>
                    </ul>
                </div>

                <div class="subsection">
                    <h3 class="subsection-title">
                        <span class="lang-content fr active">2.3. Données de transaction</span>
                        <span class="lang-content en">2.3. Transaction Data</span>
                    </h3>
                    <ul>
                        <li>
                            <span class="lang-content fr active">Historique des envois et transports</span>
                            <span class="lang-content en">Shipping and transport history</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Montants des transactions</span>
                            <span class="lang-content en">Transaction amounts</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Évaluations et commentaires</span>
                            <span class="lang-content en">Ratings and comments</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Messages échangés sur la plateforme</span>
                            <span class="lang-content en">Messages exchanged on the platform</span>
                        </li>
                    </ul>
                </div>

                <div class="subsection">
                    <h3 class="subsection-title">
                        <span class="lang-content fr active">2.4. Données techniques</span>
                        <span class="lang-content en">2.4. Technical Data</span>
                    </h3>
                    <ul>
                        <li>
                            <span class="lang-content fr active">Adresse IP</span>
                            <span class="lang-content en">IP address</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Type de navigateur et version</span>
                            <span class="lang-content en">Browser type and version</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Système d'exploitation</span>
                            <span class="lang-content en">Operating system</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Cookies (voir politique des cookies)</span>
                            <span class="lang-content en">Cookies (see cookie policy)</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Logs de connexion</span>
                            <span class="lang-content en">Connection logs</span>
                        </li>
                    </ul>
                </div>

                <div class="info-box info-box-warning">
                    <div class="info-box-title">
                        ⚠️ <span class="lang-content fr active">Données que nous NE collectons PAS</span>
                        <span class="lang-content en">Data we DO NOT collect</span>
                    </div>
                    <p>
                        <span class="lang-content fr active">
                        • Données de santé<br>
                        • Données sensibles (origine raciale, opinions politiques ou religieuses)<br>
                        • Données bancaires (gérées directement par Mollie, notre partenaire de paiement)<br>
                        • Données biométriques<br>
                        • Casier judiciaire
                        </span>
                        <span class="lang-content en">
                        • Health data<br>
                        • Sensitive data (racial origin, political or religious opinions)<br>
                        • Banking data (managed directly by Mollie, our payment partner)<br>
                        • Biometric data<br>
                        • Criminal record
                        </span>
                    </p>
                </div>
            </section>

            <!-- Section 3: Purposes and Legal Basis -->
            <section class="section" id="purposes">
                <h2 class="section-title">
                    <span class="section-icon">🎯</span>
                    <span class="lang-content fr active">3. Finalités et base légale</span>
                    <span class="lang-content en">3. Purposes and Legal Basis</span>
                </h2>
                
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <span class="lang-content fr active">Finalité</span>
                                    <span class="lang-content en">Purpose</span>
                                </th>
                                <th>
                                    <span class="lang-content fr active">Données utilisées</span>
                                    <span class="lang-content en">Data used</span>
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
                                    <span class="lang-content fr active">Création et gestion de compte</span>
                                    <span class="lang-content en">Account creation and management</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Identité, coordonnées</span>
                                    <span class="lang-content en">Identity, contact details</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Exécution du contrat (Art. 6.1.b RGPD)</span>
                                    <span class="lang-content en">Contract execution (Art. 6.1.b GDPR)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Mise en relation</span>
                                    <span class="lang-content en">Connection service</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Profil, localisation</span>
                                    <span class="lang-content en">Profile, location</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Exécution du contrat</span>
                                    <span class="lang-content en">Contract execution</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Traitement des paiements</span>
                                    <span class="lang-content en">Payment processing</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Transactions, facturation</span>
                                    <span class="lang-content en">Transactions, billing</span>
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
                                    <span class="lang-content fr active">Pièce d'identité, téléphone</span>
                                    <span class="lang-content en">ID document, phone</span>
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
                                    <span class="lang-content fr active">IP, comportement</span>
                                    <span class="lang-content en">IP, behavior</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Intérêt légitime (Art. 6.1.f RGPD)</span>
                                    <span class="lang-content en">Legitimate interest (Art. 6.1.f GDPR)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Communications commerciales</span>
                                    <span class="lang-content en">Marketing communications</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Email, préférences</span>
                                    <span class="lang-content en">Email, preferences</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Consentement (Art. 6.1.a RGPD)</span>
                                    <span class="lang-content en">Consent (Art. 6.1.a GDPR)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Support client</span>
                                    <span class="lang-content en">Customer support</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Historique, messages</span>
                                    <span class="lang-content en">History, messages</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Intérêt légitime</span>
                                    <span class="lang-content en">Legitimate interest</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Section 4: Your Rights -->
            <section class="section" id="rights">
                <h2 class="section-title">
                    <span class="section-icon">⚖️</span>
                    <span class="lang-content fr active">4. Vos droits RGPD</span>
                    <span class="lang-content en">4. Your GDPR Rights</span>
                </h2>
                
                <div class="rights-list">
                    <div class="right-item">
                        <div class="right-icon">✓</div>
                        <div class="right-content">
                            <div class="right-title">
                                <span class="lang-content fr active">Droit d'accès (Art. 15 RGPD)</span>
                                <span class="lang-content en">Right to access (Art. 15 GDPR)</span>
                            </div>
                            <div class="right-description">
                                <span class="lang-content fr active">
                                    Vous pouvez obtenir une copie de toutes vos données personnelles que nous détenons, ainsi que des informations sur leur traitement.
                                </span>
                                <span class="lang-content en">
                                    You can obtain a copy of all your personal data that we hold, as well as information about their processing.
                                </span>
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
                                <span class="lang-content fr active">
                                    Vous pouvez demander la correction de vos données inexactes ou incomplètes à tout moment.
                                </span>
                                <span class="lang-content en">
                                    You can request correction of your inaccurate or incomplete data at any time.
                                </span>
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
                                <span class="lang-content fr active">
                                    Vous pouvez demander la suppression de vos données, sauf obligation légale de conservation (comptabilité, LCB-FT).
                                </span>
                                <span class="lang-content en">
                                    You can request deletion of your data, except for legal retention obligations (accounting, AML-CFT).
                                </span>
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
                                <span class="lang-content fr active">
                                    Vous pouvez demander de limiter le traitement de vos données dans certaines circonstances.
                                </span>
                                <span class="lang-content en">
                                    You can request to limit the processing of your data in certain circumstances.
                                </span>
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
                                <span class="lang-content fr active">
                                    Vous pouvez recevoir vos données dans un format structuré et lisible par machine (JSON, CSV).
                                </span>
                                <span class="lang-content en">
                                    You can receive your data in a structured, machine-readable format (JSON, CSV).
                                </span>
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
                                <span class="lang-content fr active">
                                    Vous pouvez vous opposer au traitement de vos données pour des finalités de marketing direct.
                                </span>
                                <span class="lang-content en">
                                    You can object to the processing of your data for direct marketing purposes.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-box info-box-green" style="margin-top: 24px;">
                    <div class="info-box-title">
                        ✉️ <span class="lang-content fr active">Comment exercer vos droits ?</span>
                        <span class="lang-content en">How to exercise your rights?</span>
                    </div>
                    <p>
                        <span class="lang-content fr active">
                            Envoyez votre demande à dpo@jeconfie.fr avec une copie de votre pièce d'identité. Nous répondrons dans un délai maximum de 30 jours.
                        </span>
                        <span class="lang-content en">
                            Send your request to dpo@jeconfie.fr with a copy of your ID. We will respond within a maximum of 30 days.
                        </span>
                    </p>
                </div>
            </section>

            <!-- Section 5: Data Security -->
            <section class="section" id="security">
                <h2 class="section-title">
                    <span class="section-icon">🔒</span>
                    <span class="lang-content fr active">5. Sécurité des données</span>
                    <span class="lang-content en">5. Data Security</span>
                </h2>
                
                <p>
                    <span class="lang-content fr active">
                        <strong>Mesures techniques et organisationnelles mises en œuvre :</strong>
                    </span>
                    <span class="lang-content en">
                        <strong>Technical and organizational measures implemented:</strong>
                    </span>
                </p>
                
                <ul style="margin-top: 16px;">
                    <li>
                        <span class="lang-content fr active">
                            <strong>Chiffrement :</strong> SSL/TLS pour toutes les transmissions, chiffrement AES-256 pour les données sensibles au repos
                        </span>
                        <span class="lang-content en">
                            <strong>Encryption:</strong> SSL/TLS for all transmissions, AES-256 encryption for sensitive data at rest
                        </span>
                    </li>
                    <li>
                        <span class="lang-content fr active">
                            <strong>Hébergement sécurisé :</strong> Hostinger (certification ISO 27001)
                        </span>
                        <span class="lang-content en">
                            <strong>Secure hosting:</strong> Hostinger (ISO 27001 certification)
                        </span>
                    </li>
                    <li>
                        <span class="lang-content fr active">
                            <strong>Authentification forte :</strong> Double authentification via Twilio
                        </span>
                        <span class="lang-content en">
                            <strong>Strong authentication:</strong> Two-factor authentication via Twilio
                        </span>
                    </li>
                    <li>
                        <span class="lang-content fr active">
                            <strong>Paiements sécurisés :</strong> Mollie (certification PCI-DSS niveau 1)
                        </span>
                        <span class="lang-content en">
                            <strong>Secure payments:</strong> Mollie (PCI-DSS level 1 certification)
                        </span>
                    </li>
                    <li>
                        <span class="lang-content fr active">
                            <strong>Accès restreint :</strong> Principe du moindre privilège pour l'accès aux données
                        </span>
                        <span class="lang-content en">
                            <strong>Restricted access:</strong> Least privilege principle for data access
                        </span>
                    </li>
                    <li>
                        <span class="lang-content fr active">
                            <strong>Monitoring :</strong> Journalisation et surveillance des accès
                        </span>
                        <span class="lang-content en">
                            <strong>Monitoring:</strong> Access logging and surveillance
                        </span>
                    </li>
                    <li>
                        <span class="lang-content fr active">
                            <strong>Sauvegardes :</strong> Sauvegardes quotidiennes chiffrées
                        </span>
                        <span class="lang-content en">
                            <strong>Backups:</strong> Daily encrypted backups
                        </span>
                    </li>
                    <li>
                        <span class="lang-content fr active">
                            <strong>Tests de sécurité :</strong> Audits réguliers et tests de pénétration
                        </span>
                        <span class="lang-content en">
                            <strong>Security testing:</strong> Regular audits and penetration tests
                        </span>
                    </li>
                </ul>
            </section>

            <!-- Section 6: Data Retention -->
            <section class="section" id="retention">
                <h2 class="section-title">
                    <span class="section-icon">⏱️</span>
                    <span class="lang-content fr active">6. Durée de conservation</span>
                    <span class="lang-content en">6. Data Retention</span>
                </h2>
                
                <div class="data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <span class="lang-content fr active">Type de données</span>
                                    <span class="lang-content en">Data type</span>
                                </th>
                                <th>
                                    <span class="lang-content fr active">Durée de conservation</span>
                                    <span class="lang-content en">Retention period</span>
                                </th>
                                <th>
                                    <span class="lang-content fr active">Justification</span>
                                    <span class="lang-content en">Justification</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Compte actif</span>
                                    <span class="lang-content en">Active account</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Durée de la relation commerciale</span>
                                    <span class="lang-content en">Duration of commercial relationship</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Exécution du service</span>
                                    <span class="lang-content en">Service execution</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Compte inactif</span>
                                    <span class="lang-content en">Inactive account</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">3 ans après dernière connexion</span>
                                    <span class="lang-content en">3 years after last login</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Délai de prescription</span>
                                    <span class="lang-content en">Limitation period</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Données de transaction</span>
                                    <span class="lang-content en">Transaction data</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">10 ans</span>
                                    <span class="lang-content en">10 years</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Obligations comptables</span>
                                    <span class="lang-content en">Accounting obligations</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Pièces d'identité</span>
                                    <span class="lang-content en">ID documents</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">5 ans après vérification</span>
                                    <span class="lang-content en">5 years after verification</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Obligations LCB-FT</span>
                                    <span class="lang-content en">AML-CFT obligations</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Logs de connexion</span>
                                    <span class="lang-content en">Connection logs</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">12 mois</span>
                                    <span class="lang-content en">12 months</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">Sécurité et conformité</span>
                                    <span class="lang-content en">Security and compliance</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="lang-content fr active">Cookies</span>
                                    <span class="lang-content en">Cookies</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">13 mois maximum</span>
                                    <span class="lang-content en">13 months maximum</span>
                                </td>
                                <td>
                                    <span class="lang-content fr active">CNIL</span>
                                    <span class="lang-content en">CNIL</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Section 7: Data Transfers -->
            <section class="section" id="transfers">
                <h2 class="section-title">
                    <span class="section-icon">🌍</span>
                    <span class="lang-content fr active">7. Transferts de données</span>
                    <span class="lang-content en">7. Data Transfers</span>
                </h2>
                
                <div class="subsection">
                    <h3 class="subsection-title">
                        <span class="lang-content fr active">7.1. Destinataires des données</span>
                        <span class="lang-content en">7.1. Data recipients</span>
                    </h3>
                    
                    <ul>
                        <li>
                            <span class="lang-content fr active">
                                <strong>Mollie B.V. (Pays-Bas) :</strong> Traitement des paiements - Conforme RGPD, établissement de paiement agréé
                            </span>
                            <span class="lang-content en">
                                <strong>Mollie B.V. (Netherlands):</strong> Payment processing - GDPR compliant, licensed payment institution
                            </span>
                        </li>
                        <li>
                            <span class="lang-content fr active">
                                <strong>Twilio Inc. (USA) :</strong> Vérification téléphonique - Clauses contractuelles types (SCC)
                            </span>
                            <span class="lang-content en">
                                <strong>Twilio Inc. (USA):</strong> Phone verification - Standard Contractual Clauses (SCC)
                            </span>
                        </li>
                        <li>
                            <span class="lang-content fr active">
                                <strong>Hostinger International Ltd (Singapour) :</strong> Hébergement - Certification ISO 27001
                            </span>
                            <span class="lang-content en">
                                <strong>Hostinger International Ltd (Singapore):</strong> Hosting - ISO 27001 certification
                            </span>
                        </li>
                        <li>
                            <span class="lang-content fr active">
                                <strong>Google Analytics (USA) :</strong> Analyse de trafic - Données anonymisées
                            </span>
                            <span class="lang-content en">
                                <strong>Google Analytics (USA):</strong> Traffic analysis - Anonymized data
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="info-box info-box-blue">
                    <div class="info-box-title">
                        🛡️ <span class="lang-content fr active">Garanties pour les transferts hors UE</span>
                        <span class="lang-content en">Guarantees for transfers outside EU</span>
                    </div>
                    <p>
                        <span class="lang-content fr active">
                            Pour tout transfert hors Union Européenne, nous nous assurons que des garanties appropriées sont en place : clauses contractuelles types approuvées par la Commission Européenne, certification Privacy Shield, ou adéquation reconnue par la Commission.
                        </span>
                        <span class="lang-content en">
                            For any transfer outside the European Union, we ensure that appropriate safeguards are in place: standard contractual clauses approved by the European Commission, Privacy Shield certification, or adequacy recognized by the Commission.
                        </span>
                    </p>
                </div>
            </section>

            <!-- Section 8: DPO Contact -->
            <section class="section" id="contact">
                <h2 class="section-title">
                    <span class="section-icon">📧</span>
                    <span class="lang-content fr active">8. Contact DPO</span>
                    <span class="lang-content en">8. DPO Contact</span>
                </h2>
                
                <div class="contact-card">
                    <h3 class="contact-title">
                        <span class="lang-content fr active">Exercez vos droits RGPD</span>
                        <span class="lang-content en">Exercise your GDPR rights</span>
                    </h3>
                    
                    <div class="contact-grid">
                        <div class="contact-item">
                            <div class="contact-item-icon">📧</div>
                            <div class="contact-item-title">Email DPO</div>
                            <div class="contact-item-text">dpo@jeconfie.fr</div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-item-icon">📮</div>
                            <div class="contact-item-title">
                                <span class="lang-content fr active">Courrier</span>
                                <span class="lang-content en">Mail</span>
                            </div>
                            <div class="contact-item-text">
                                FRANCK JUBEL LOEMBET - DPO<br>
                                32 av. F. de Pressensé<br>
                                69200 Vénissieux
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-item-icon">📞</div>
                            <div class="contact-item-title">
                                <span class="lang-content fr active">Téléphone</span>
                                <span class="lang-content en">Phone</span>
                            </div>
                            <div class="contact-item-text">+33 07 55 25 80 23</div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-item-icon">⚖️</div>
                            <div class="contact-item-title">
                                <span class="lang-content fr active">Réclamation CNIL</span>
                                <span class="lang-content en">CNIL Complaint</span>
                            </div>
                            <div class="contact-item-text">
                                <span class="lang-content fr active">
                                    En cas de litige, vous pouvez saisir la CNIL :<br>
                                    www.cnil.fr/plaintes
                                </span>
                                <span class="lang-content en">
                                    In case of dispute, you can contact CNIL:<br>
                                    www.cnil.fr/plaintes
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Updates -->
            <div class="info-box info-box-green">
                <div class="info-box-title">
                    📅 <span class="lang-content fr active">Dernière mise à jour</span>
                    <span class="lang-content en">Last update</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        Cette politique de confidentialité a été mise à jour le 1er décembre 2024. Nous nous réservons le droit de la modifier à tout moment. Les modifications prennent effet dès leur publication sur le site. Nous vous informerons de tout changement substantiel par email.
                    </span>
                    <span class="lang-content en">
                        This privacy policy was last updated on December 1, 2024. We reserve the right to modify it at any time. Changes take effect upon publication on the site. We will inform you of any substantial changes by email.
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

        // Smooth scroll for table of contents
        document.querySelectorAll('.toc-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

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