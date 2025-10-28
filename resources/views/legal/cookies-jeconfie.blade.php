<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique des Cookies - Je confie</title>
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

        /* Cookie Banner */
        .cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
            padding: 24px;
            z-index: 9999;
            display: none;
            animation: slideUp 0.5s ease;
        }

        .cookie-banner.active {
            display: block;
        }

        @keyframes slideUp {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        .cookie-banner-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .cookie-text {
            flex: 1;
            min-width: 300px;
        }

        .cookie-text h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .cookie-text p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        .cookie-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .cookie-btn {
            padding: 12px 24px;
            border-radius: var(--radius);
            font-weight: 600;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .cookie-btn-accept {
            background: var(--primary);
            color: white;
        }

        .cookie-btn-accept:hover {
            background: var(--primary-dark);
        }

        .cookie-btn-customize {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .cookie-btn-customize:hover {
            background: var(--primary);
            color: white;
        }

        .cookie-btn-reject {
            background: var(--light);
            color: var(--dark);
        }

        .cookie-btn-reject:hover {
            background: var(--gray);
            color: white;
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

        .cookie-type {
            background: var(--light);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .cookie-type::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary), var(--eco-green));
        }

        .cookie-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .cookie-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
        }

        .cookie-toggle {
            position: relative;
            width: 60px;
            height: 30px;
        }

        .cookie-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .cookie-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--gray);
            transition: .4s;
            border-radius: 34px;
        }

        .cookie-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .cookie-slider {
            background-color: var(--success);
        }

        input:disabled + .cookie-slider {
            background-color: var(--success);
            opacity: 0.6;
            cursor: not-allowed;
        }

        input:checked + .cookie-slider:before {
            transform: translateX(30px);
        }

        .cookie-description {
            color: var(--gray);
            line-height: 1.8;
        }

        .cookie-list {
            margin-top: 16px;
            padding-left: 20px;
        }

        .cookie-list li {
            color: var(--gray);
            margin-bottom: 8px;
            list-style-type: none;
            position: relative;
            padding-left: 20px;
        }

        .cookie-list li:before {
            content: '🍪';
            position: absolute;
            left: 0;
        }

        /* Table */
        .cookie-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            overflow-x: auto;
            display: block;
        }

        .cookie-table table {
            width: 100%;
            min-width: 600px;
        }

        .cookie-table th {
            background: var(--primary);
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        .cookie-table td {
            padding: 12px;
            border-bottom: 1px solid var(--border);
        }

        .cookie-table tr:hover td {
            background: var(--light);
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

        .action-buttons {
            display: flex;
            gap: 16px;
            margin-top: 32px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .cookie-banner-content {
                flex-direction: column;
            }
            
            .cookie-table {
                overflow-x: scroll;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
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
            <span class="lang-content fr active">Politique des Cookies</span>
            <span class="lang-content en">Cookie Policy</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">Transparence et contrôle sur vos données de navigation</span>
            <span class="lang-content en">Transparency and control over your browsing data</span>
        </p>
    </section>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-card">
            
            <!-- Introduction -->
            <div class="info-box info-box-blue">
                <div class="info-box-title">
                    🍪 <span class="lang-content fr active">Qu'est-ce qu'un cookie ?</span>
                    <span class="lang-content en">What is a cookie?</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        Les cookies sont de petits fichiers texte stockés sur votre appareil lorsque vous visitez notre site. Ils nous permettent d'améliorer votre expérience, de sécuriser nos services et de comprendre comment notre plateforme est utilisée. Cette politique vous explique quels cookies nous utilisons et comment les gérer.
                    </span>
                    <span class="lang-content en">
                        Cookies are small text files stored on your device when you visit our site. They allow us to improve your experience, secure our services and understand how our platform is used. This policy explains which cookies we use and how to manage them.
                    </span>
                </p>
            </div>

            <!-- Cookie Types -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">📊</span>
                    <span class="lang-content fr active">Types de cookies utilisés</span>
                    <span class="lang-content en">Types of cookies used</span>
                </h2>

                <!-- Essential Cookies -->
                <div class="cookie-type">
                    <div class="cookie-header">
                        <h3 class="cookie-title">
                            <span class="lang-content fr active">Cookies essentiels</span>
                            <span class="lang-content en">Essential cookies</span>
                        </h3>
                        <label class="cookie-toggle">
                            <input type="checkbox" checked disabled>
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p class="cookie-description">
                        <span class="lang-content fr active">
                            Ces cookies sont nécessaires au fonctionnement du site et ne peuvent pas être désactivés. Ils sont généralement définis en réponse à vos actions (connexion, préférences de langue, paramètres de confidentialité).
                        </span>
                        <span class="lang-content en">
                            These cookies are necessary for the site to function and cannot be disabled. They are usually set in response to your actions (login, language preferences, privacy settings).
                        </span>
                    </p>
                    <ul class="cookie-list">
                        <li>
                            <span class="lang-content fr active">Session ID : maintient votre session active</span>
                            <span class="lang-content en">Session ID: keeps your session active</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Préférence de langue : mémorise votre choix FR/EN</span>
                            <span class="lang-content en">Language preference: remembers your FR/EN choice</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Token CSRF : protection contre les attaques</span>
                            <span class="lang-content en">CSRF Token: protection against attacks</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Consentement cookies : mémorise vos choix</span>
                            <span class="lang-content en">Cookie consent: remembers your choices</span>
                        </li>
                    </ul>
                </div>

                <!-- Functional Cookies -->
                <div class="cookie-type">
                    <div class="cookie-header">
                        <h3 class="cookie-title">
                            <span class="lang-content fr active">Cookies fonctionnels</span>
                            <span class="lang-content en">Functional cookies</span>
                        </h3>
                        <label class="cookie-toggle">
                            <input type="checkbox" checked id="functional-cookies">
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p class="cookie-description">
                        <span class="lang-content fr active">
                            Ces cookies permettent d'améliorer les fonctionnalités et la personnalisation de notre site. Sans eux, certaines fonctionnalités peuvent ne pas fonctionner correctement.
                        </span>
                        <span class="lang-content en">
                            These cookies enable enhanced functionality and personalization of our site. Without them, some features may not work properly.
                        </span>
                    </p>
                    <ul class="cookie-list">
                        <li>
                            <span class="lang-content fr active">Préférences utilisateur : thème, affichage</span>
                            <span class="lang-content en">User preferences: theme, display</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Historique de recherche récente</span>
                            <span class="lang-content en">Recent search history</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Géolocalisation approximative pour suggestions</span>
                            <span class="lang-content en">Approximate geolocation for suggestions</span>
                        </li>
                    </ul>
                </div>

                <!-- Analytics Cookies -->
                <div class="cookie-type">
                    <div class="cookie-header">
                        <h3 class="cookie-title">
                            <span class="lang-content fr active">Cookies analytiques</span>
                            <span class="lang-content en">Analytics cookies</span>
                        </h3>
                        <label class="cookie-toggle">
                            <input type="checkbox" id="analytics-cookies">
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p class="cookie-description">
                        <span class="lang-content fr active">
                            Ces cookies nous aident à comprendre comment les visiteurs interagissent avec notre site en collectant des informations de manière anonyme.
                        </span>
                        <span class="lang-content en">
                            These cookies help us understand how visitors interact with our site by collecting information anonymously.
                        </span>
                    </p>
                    <ul class="cookie-list">
                        <li>
                            <span class="lang-content fr active">Google Analytics : analyse du trafic</span>
                            <span class="lang-content en">Google Analytics: traffic analysis</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Hotjar : cartes de chaleur et enregistrements</span>
                            <span class="lang-content en">Hotjar: heatmaps and recordings</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Pages visitées et durée de session</span>
                            <span class="lang-content en">Pages visited and session duration</span>
                        </li>
                    </ul>
                </div>

                <!-- Marketing Cookies -->
                <div class="cookie-type">
                    <div class="cookie-header">
                        <h3 class="cookie-title">
                            <span class="lang-content fr active">Cookies marketing</span>
                            <span class="lang-content en">Marketing cookies</span>
                        </h3>
                        <label class="cookie-toggle">
                            <input type="checkbox" id="marketing-cookies">
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p class="cookie-description">
                        <span class="lang-content fr active">
                            Ces cookies peuvent être placés par nos partenaires publicitaires. Ils peuvent être utilisés pour créer un profil de vos intérêts et vous montrer des publicités pertinentes sur d'autres sites.
                        </span>
                        <span class="lang-content en">
                            These cookies may be set by our advertising partners. They may be used to build a profile of your interests and show you relevant ads on other sites.
                        </span>
                    </p>
                    <ul class="cookie-list">
                        <li>
                            <span class="lang-content fr active">Facebook Pixel : remarketing</span>
                            <span class="lang-content en">Facebook Pixel: remarketing</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Google Ads : publicités ciblées</span>
                            <span class="lang-content en">Google Ads: targeted advertising</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">LinkedIn Insight : B2B marketing</span>
                            <span class="lang-content en">LinkedIn Insight: B2B marketing</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Cookie Details Table -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">📋</span>
                    <span class="lang-content fr active">Détails des cookies</span>
                    <span class="lang-content en">Cookie details</span>
                </h2>
                
                <div class="cookie-table">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <span class="lang-content fr active">Nom</span>
                                    <span class="lang-content en">Name</span>
                                </th>
                                <th>
                                    <span class="lang-content fr active">Fournisseur</span>
                                    <span class="lang-content en">Provider</span>
                                </th>
                                <th>
                                    <span class="lang-content fr active">Durée</span>
                                    <span class="lang-content en">Duration</span>
                                </th>
                                <th>
                                    <span class="lang-content fr active">Type</span>
                                    <span class="lang-content en">Type</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PHPSESSID</td>
                                <td>Je confie</td>
                                <td>Session</td>
                                <td>
                                    <span class="lang-content fr active">Essentiel</span>
                                    <span class="lang-content en">Essential</span>
                                </td>
                            </tr>
                            <tr>
                                <td>_ga</td>
                                <td>Google Analytics</td>
                                <td>2 ans</td>
                                <td>
                                    <span class="lang-content fr active">Analytique</span>
                                    <span class="lang-content en">Analytics</span>
                                </td>
                            </tr>
                            <tr>
                                <td>_fbp</td>
                                <td>Facebook</td>
                                <td>3 mois</td>
                                <td>Marketing</td>
                            </tr>
                            <tr>
                                <td>lang_preference</td>
                                <td>Je confie</td>
                                <td>1 an</td>
                                <td>
                                    <span class="lang-content fr active">Fonctionnel</span>
                                    <span class="lang-content en">Functional</span>
                                </td>
                            </tr>
                            <tr>
                                <td>cookie_consent</td>
                                <td>Je confie</td>
                                <td>1 an</td>
                                <td>
                                    <span class="lang-content fr active">Essentiel</span>
                                    <span class="lang-content en">Essential</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- How to Manage -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">⚙️</span>
                    <span class="lang-content fr active">Gestion des cookies</span>
                    <span class="lang-content en">Cookie management</span>
                </h2>

                <div class="info-box info-box-green">
                    <div class="info-box-title">
                        💡 <span class="lang-content fr active">Comment contrôler les cookies</span>
                        <span class="lang-content en">How to control cookies</span>
                    </div>
                    <p>
                        <span class="lang-content fr active">
                            Vous pouvez contrôler et/ou supprimer les cookies comme vous le souhaitez. Vous pouvez supprimer tous les cookies déjà présents sur votre ordinateur et configurer la plupart des navigateurs pour qu'ils les bloquent.
                        </span>
                        <span class="lang-content en">
                            You can control and/or delete cookies as you wish. You can delete all cookies already on your computer and set most browsers to block them.
                        </span>
                    </p>
                </div>

                <p style="margin: 20px 0;">
                    <span class="lang-content fr active">
                        <strong>Paramètres du navigateur :</strong><br>
                        • Chrome : Paramètres > Confidentialité et sécurité > Cookies<br>
                        • Firefox : Options > Vie privée et sécurité > Cookies<br>
                        • Safari : Préférences > Confidentialité<br>
                        • Edge : Paramètres > Cookies et autorisations de site<br><br>
                        
                        <strong>Conséquences de la désactivation :</strong><br>
                        La désactivation des cookies peut affecter votre expérience sur notre site. Certaines fonctionnalités peuvent ne pas fonctionner correctement.
                    </span>
                    <span class="lang-content en">
                        <strong>Browser settings:</strong><br>
                        • Chrome: Settings > Privacy and security > Cookies<br>
                        • Firefox: Options > Privacy & Security > Cookies<br>
                        • Safari: Preferences > Privacy<br>
                        • Edge: Settings > Cookies and site permissions<br><br>
                        
                        <strong>Consequences of disabling:</strong><br>
                        Disabling cookies may affect your experience on our site. Some features may not work properly.
                    </span>
                </p>

                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="showCookieSettings()">
                        ⚙️ <span class="lang-content fr active">Paramètres des cookies</span>
                        <span class="lang-content en">Cookie settings</span>
                    </button>
                    <button class="btn btn-primary" onclick="deleteAllCookies()">
                        🗑️ <span class="lang-content fr active">Supprimer tous les cookies</span>
                        <span class="lang-content en">Delete all cookies</span>
                    </button>
                </div>
            </section>

            <!-- Contact -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">📧</span>
                    <span class="lang-content fr active">Contact</span>
                    <span class="lang-content en">Contact</span>
                </h2>
                
                <p>
                    <span class="lang-content fr active">
                        Pour toute question concernant notre politique de cookies, vous pouvez nous contacter :<br><br>
                        <strong>Email DPO :</strong> dpo@jeconfie.fr<br>
                        <strong>Courrier :</strong> FRANCK JUBEL LOEMBET<br>
                        32 Avenue Francis de Pressensé<br>
                        69200 Vénissieux, France<br><br>
                        <strong>Dernière mise à jour :</strong> Décembre 2024
                    </span>
                    <span class="lang-content en">
                        For any questions regarding our cookie policy, you can contact us:<br><br>
                        <strong>DPO Email:</strong> dpo@jeconfie.fr<br>
                        <strong>Mail:</strong> FRANCK JUBEL LOEMBET<br>
                        32 Avenue Francis de Pressensé<br>
                        69200 Vénissieux, France<br><br>
                        <strong>Last updated:</strong> December 2024
                    </span>
                </p>
            </section>
        </div>
    </div>

    <!-- Cookie Banner (Initially Hidden) -->
    <div class="cookie-banner" id="cookieBanner">
        <div class="cookie-banner-content">
            <div class="cookie-text">
                <h3>
                    <span class="lang-content fr active">🍪 Nous utilisons des cookies</span>
                    <span class="lang-content en">🍪 We use cookies</span>
                </h3>
                <p>
                    <span class="lang-content fr active">
                        Nous utilisons des cookies pour améliorer votre expérience, analyser notre trafic et sécuriser nos services.
                    </span>
                    <span class="lang-content en">
                        We use cookies to improve your experience, analyze our traffic and secure our services.
                    </span>
                </p>
            </div>
            <div class="cookie-buttons">
                <button class="cookie-btn cookie-btn-accept" onclick="acceptAllCookies()">
                    <span class="lang-content fr active">Tout accepter</span>
                    <span class="lang-content en">Accept all</span>
                </button>
                <button class="cookie-btn cookie-btn-customize" onclick="showCookieSettings()">
                    <span class="lang-content fr active">Personnaliser</span>
                    <span class="lang-content en">Customize</span>
                </button>
                <button class="cookie-btn cookie-btn-reject" onclick="rejectAllCookies()">
                    <span class="lang-content fr active">Refuser</span>
                    <span class="lang-content en">Reject</span>
                </button>
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

        // Cookie management functions
        function checkCookieConsent() {
            const consent = localStorage.getItem('cookie_consent');
            if (!consent) {
                document.getElementById('cookieBanner').classList.add('active');
            }
        }

        function acceptAllCookies() {
            localStorage.setItem('cookie_consent', 'all');
            localStorage.setItem('functional_cookies', 'true');
            localStorage.setItem('analytics_cookies', 'true');
            localStorage.setItem('marketing_cookies', 'true');
            document.getElementById('cookieBanner').classList.remove('active');
            updateToggles();
        }

        function rejectAllCookies() {
            localStorage.setItem('cookie_consent', 'essential');
            localStorage.setItem('functional_cookies', 'false');
            localStorage.setItem('analytics_cookies', 'false');
            localStorage.setItem('marketing_cookies', 'false');
            document.getElementById('cookieBanner').classList.remove('active');
            updateToggles();
        }

        function showCookieSettings() {
            window.scrollTo({ top: document.querySelector('.cookie-type').offsetTop - 100, behavior: 'smooth' });
            document.getElementById('cookieBanner').classList.remove('active');
        }

        function updateToggles() {
            document.getElementById('functional-cookies').checked = localStorage.getItem('functional_cookies') === 'true';
            document.getElementById('analytics-cookies').checked = localStorage.getItem('analytics_cookies') === 'true';
            document.getElementById('marketing-cookies').checked = localStorage.getItem('marketing_cookies') === 'true';
        }

        function deleteAllCookies() {
            if (confirm('Êtes-vous sûr de vouloir supprimer tous les cookies ?')) {
                document.cookie.split(";").forEach(function(c) { 
                    document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); 
                });
                localStorage.clear();
                alert('Tous les cookies ont été supprimés.');
                location.reload();
            }
        }

        // Toggle event listeners
        document.getElementById('functional-cookies').addEventListener('change', function() {
            localStorage.setItem('functional_cookies', this.checked);
        });

        document.getElementById('analytics-cookies').addEventListener('change', function() {
            localStorage.setItem('analytics_cookies', this.checked);
        });

        document.getElementById('marketing-cookies').addEventListener('change', function() {
            localStorage.setItem('marketing_cookies', this.checked);
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

            // Check cookie consent after delay
            setTimeout(checkCookieConsent, 2000);
            updateToggles();
        });
    </script>
</body>
</html>