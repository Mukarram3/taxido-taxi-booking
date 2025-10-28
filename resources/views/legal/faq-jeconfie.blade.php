<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Foire Aux Questions | Je confie</title>
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
            transition: transform 0.3s ease;
        }

        .logo:hover .logo-icon {
            transform: rotate(5deg) scale(1.05);
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

        .lang-btn:hover {
            background: rgba(80, 70, 229, 0.1);
        }

        .lang-btn.active {
            background: var(--primary);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            padding: 140px 20px 80px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '❓';
            position: absolute;
            font-size: 300px;
            opacity: 0.1;
            top: -50px;
            right: -50px;
            transform: rotate(-15deg);
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 3vw, 1.3rem);
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto 40px;
            position: relative;
            z-index: 1;
        }

        /* Search Bar */
        .search-container {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .search-input {
            width: 100%;
            padding: 20px 60px 20px 24px;
            border-radius: var(--radius-xl);
            border: none;
            font-size: 16px;
            box-shadow: var(--shadow-xl);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            transform: translateY(-2px);
            box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.3);
        }

        .search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary);
            color: white;
            border: none;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-50%) scale(1.1);
        }

        /* Main Container */
        .main-container {
            max-width: 1200px;
            margin: -40px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        /* Category Tabs */
        .category-tabs {
            display: flex;
            gap: 12px;
            margin-bottom: 40px;
            overflow-x: auto;
            padding-bottom: 12px;
        }

        .category-tab {
            padding: 12px 24px;
            background: white;
            border: 2px solid var(--border);
            border-radius: var(--radius-lg);
            cursor: pointer;
            font-weight: 600;
            color: var(--gray);
            white-space: nowrap;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .category-tab:hover {
            background: var(--light);
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .category-tab.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .category-icon {
            font-size: 20px;
        }

        /* FAQ Container */
        .faq-container {
            display: grid;
            gap: 24px;
        }

        .faq-category {
            display: none;
        }

        .faq-category.active {
            display: block;
        }

        .category-header {
            background: white;
            padding: 32px;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            margin-bottom: 24px;
        }

        .category-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .category-description {
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* FAQ Items */
        .faq-item {
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .faq-question {
            padding: 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--dark);
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: var(--light);
        }

        .faq-toggle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 1000px;
        }

        .faq-answer-content {
            padding: 0 24px 24px;
            color: var(--gray);
            line-height: 1.8;
        }

        .faq-answer-content ul {
            margin: 16px 0;
            padding-left: 24px;
        }

        .faq-answer-content li {
            margin-bottom: 8px;
        }

        .faq-answer-content strong {
            color: var(--dark);
        }

        /* Alert Boxes */
        .alert-box {
            padding: 20px;
            border-radius: var(--radius);
            margin: 20px 0;
        }

        .alert-warning {
            background: #fef3c7;
            border-left: 4px solid var(--warning);
        }

        .alert-danger {
            background: #fee2e2;
            border-left: 4px solid var(--danger);
        }

        .alert-info {
            background: #dbeafe;
            border-left: 4px solid var(--secondary);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(5, 150, 105, 0.05));
            border-left: 4px solid var(--success);
        }

        .alert-title {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .alert-warning .alert-title { color: var(--warning); }
        .alert-danger .alert-title { color: var(--danger); }
        .alert-info .alert-title { color: var(--secondary); }
        .alert-success .alert-title { color: var(--success); }

        /* Contact Section */
        .contact-section {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            padding: 48px;
            border-radius: var(--radius-xl);
            text-align: center;
            margin-top: 60px;
        }

        .contact-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .contact-text {
            font-size: 1.1rem;
            margin-bottom: 32px;
            opacity: 0.95;
        }

        .contact-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

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
            gap: 8px;
        }

        .btn-white {
            background: white;
            color: var(--primary);
        }

        .btn-white:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline:hover {
            background: white;
            color: var(--primary);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 16px 60px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .category-tabs {
                flex-wrap: nowrap;
            }

            .main-container {
                padding: 0 16px;
            }

            .faq-question {
                padding: 20px;
                font-size: 15px;
            }

            .contact-section {
                padding: 32px 20px;
            }

            .contact-title {
                font-size: 1.5rem;
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
            <span class="lang-content fr active">Foire Aux Questions</span>
            <span class="lang-content en">Frequently Asked Questions</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">Tout ce que vous devez savoir sur Je confie</span>
            <span class="lang-content en">Everything you need to know about Je confie</span>
        </p>
        <div class="search-container">
            <input type="text" class="search-input" id="faqSearch" 
                   placeholder="Rechercher une question..." 
                   data-placeholder-fr="Rechercher une question..."
                   data-placeholder-en="Search for a question...">
            <button class="search-btn">🔍</button>
        </div>
    </section>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Category Tabs -->
        <div class="category-tabs">
            <button class="category-tab active" onclick="showCategory('general')">
                <span class="category-icon">📋</span>
                <span class="lang-content fr active">Général</span>
                <span class="lang-content en">General</span>
            </button>
            <button class="category-tab" onclick="showCategory('payment')">
                <span class="category-icon">💳</span>
                <span class="lang-content fr active">Paiements</span>
                <span class="lang-content en">Payments</span>
            </button>
            <button class="category-tab" onclick="showCategory('security')">
                <span class="category-icon">🔒</span>
                <span class="lang-content fr active">Sécurité</span>
                <span class="lang-content en">Security</span>
            </button>
            <button class="category-tab" onclick="showCategory('transport')">
                <span class="category-icon">🚚</span>
                <span class="lang-content fr active">Transport</span>
                <span class="lang-content en">Transport</span>
            </button>
            <button class="category-tab" onclick="showCategory('legal')">
                <span class="category-icon">⚖️</span>
                <span class="lang-content fr active">Juridique</span>
                <span class="lang-content en">Legal</span>
            </button>
        </div>

        <!-- FAQ Container -->
        <div class="faq-container">
            <!-- General Category -->
            <div class="faq-category active" id="general">
                <div class="category-header">
                    <h2 class="category-title">
                        <span class="category-icon">📋</span>
                        <span class="lang-content fr active">Questions Générales</span>
                        <span class="lang-content en">General Questions</span>
                    </h2>
                    <p class="category-description">
                        <span class="lang-content fr active">Les bases pour comprendre Je confie</span>
                        <span class="lang-content en">The basics to understand Je confie</span>
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Qu'est-ce que Je confie ?</span>
                        <span class="lang-content en">What is Je confie?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                Je confie est une <strong>plateforme d'intermédiation</strong> lancée le 30 septembre 2025, qui met en relation des particuliers souhaitant envoyer des colis avec des voyageurs disposant d'espace de transport.
                                <br><br>
                                <strong>IMPORTANT :</strong> Nous ne sommes PAS un transporteur. Nous fournissons uniquement la technologie de mise en relation et de paiement sécurisé via Mollie.
                            </span>
                            <span class="lang-content en">
                                Je confie is an <strong>intermediation platform</strong> launched on September 30, 2025, that connects individuals wishing to send packages with travelers who have transport space.
                                <br><br>
                                <strong>IMPORTANT:</strong> We are NOT a carrier. We only provide connection technology and secure payment via Mollie.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Comment fonctionne la plateforme ?</span>
                        <span class="lang-content en">How does the platform work?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>En 6 étapes simples :</strong>
                                <ul>
                                    <li>L'expéditeur publie son annonce</li>
                                    <li>Un transporteur accepte la mission</li>
                                    <li>Le paiement est sécurisé via Mollie (séquestre)</li>
                                    <li>Le transport est effectué</li>
                                    <li>L'expéditeur confirme la réception</li>
                                    <li>Les fonds sont libérés après 48h</li>
                                </ul>
                            </span>
                            <span class="lang-content en">
                                <strong>In 6 simple steps:</strong>
                                <ul>
                                    <li>Sender publishes their listing</li>
                                    <li>A carrier accepts the mission</li>
                                    <li>Payment is secured via Mollie (escrow)</li>
                                    <li>Transport is carried out</li>
                                    <li>Sender confirms receipt</li>
                                    <li>Funds are released after 48h</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Quelle est votre commission ?</span>
                        <span class="lang-content en">What is your commission?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                Notre commission est de <strong>15% à 20% HT</strong> sur chaque transaction.
                                <br>TVA applicable : 20% (FR60988109625)
                                <br>Les frais de paiement Mollie sont inclus dans la commission.
                                <br><strong>Pas de frais cachés !</strong>
                            </span>
                            <span class="lang-content en">
                                Our commission is <strong>15% to 20% excluding VAT</strong> on each transaction.
                                <br>Applicable VAT: 20% (FR60988109625)
                                <br>Mollie payment fees are included in the commission.
                                <br><strong>No hidden fees!</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Category -->
            <div class="faq-category" id="payment">
                <div class="category-header">
                    <h2 class="category-title">
                        <span class="category-icon">💳</span>
                        <span class="lang-content fr active">Questions sur les Paiements</span>
                        <span class="lang-content en">Payment Questions</span>
                    </h2>
                    <p class="category-description">
                        <span class="lang-content fr active">Sécurité et moyens de paiement</span>
                        <span class="lang-content en">Security and payment methods</span>
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Comment les paiements sont-ils sécurisés ?</span>
                        <span class="lang-content en">How are payments secured?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Partenaire : Mollie B.V.</strong>
                                <ul>
                                    <li>Établissement de paiement agréé (Banque Centrale des Pays-Bas)</li>
                                    <li>Certification PCI-DSS niveau 1</li>
                                    <li>Système de séquestre sécurisé</li>
                                    <li>JE CONFIE ne détient jamais vos fonds directement</li>
                                </ul>
                            </span>
                            <span class="lang-content en">
                                <strong>Partner: Mollie B.V.</strong>
                                <ul>
                                    <li>Licensed payment institution (Dutch Central Bank)</li>
                                    <li>PCI-DSS Level 1 certification</li>
                                    <li>Secure escrow system</li>
                                    <li>JE CONFIE never holds your funds directly</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Quels moyens de paiement acceptez-vous ?</span>
                        <span class="lang-content en">What payment methods do you accept?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                Nous acceptons :
                                <ul>
                                    <li>Cartes bancaires (Visa, Mastercard)</li>
                                    <li>Virements SEPA</li>
                                    <li>PayPal</li>
                                    <li>Apple Pay / Google Pay</li>
                                </ul>
                                Tous les paiements sont traités par Mollie de manière sécurisée.
                            </span>
                            <span class="lang-content en">
                                We accept:
                                <ul>
                                    <li>Credit cards (Visa, Mastercard)</li>
                                    <li>SEPA transfers</li>
                                    <li>PayPal</li>
                                    <li>Apple Pay / Google Pay</li>
                                </ul>
                                All payments are securely processed by Mollie.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Y a-t-il une assurance ?</span>
                        <span class="lang-content en">Is there insurance?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <div class="alert-box alert-warning">
                                <div class="alert-title">
                                    ⚠️ <span class="lang-content fr active">Pas d'assurance actuellement</span>
                                    <span class="lang-content en">No insurance currently</span>
                                </div>
                                <p>
                                    <span class="lang-content fr active">
                                        JE CONFIE ne propose pas encore d'assurance. Cette option est en cours de négociation et pourra être proposée ultérieurement. Nous recommandons de souscrire une assurance personnelle.
                                    </span>
                                    <span class="lang-content en">
                                        JE CONFIE does not yet offer insurance. This option is being negotiated and may be offered later. We recommend taking out personal insurance.
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Category -->
            <div class="faq-category" id="security">
                <div class="category-header">
                    <h2 class="category-title">
                        <span class="category-icon">🔒</span>
                        <span class="lang-content fr active">Sécurité et Vérifications</span>
                        <span class="lang-content en">Security and Verifications</span>
                    </h2>
                    <p class="category-description">
                        <span class="lang-content fr active">Protection de vos données et vérifications</span>
                        <span class="lang-content en">Data protection and verifications</span>
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Comment vérifiez-vous l'identité des utilisateurs ?</span>
                        <span class="lang-content en">How do you verify user identity?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Via Twilio :</strong>
                                <ul>
                                    <li>Vérification du numéro de téléphone par SMS</li>
                                    <li>Authentification à deux facteurs</li>
                                    <li>Anti-spam et sécurité renforcée</li>
                                    <li>Badge "Vérifié" sur le profil</li>
                                </ul>
                                <strong>Note :</strong> Nous ne collectons PAS de pièces d'identité.
                            </span>
                            <span class="lang-content en">
                                <strong>Via Twilio:</strong>
                                <ul>
                                    <li>Phone number verification by SMS</li>
                                    <li>Two-factor authentication</li>
                                    <li>Anti-spam and enhanced security</li>
                                    <li>"Verified" badge on profile</li>
                                </ul>
                                <strong>Note:</strong> We do NOT collect ID documents.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Mes données sont-elles protégées ?</span>
                        <span class="lang-content en">Is my data protected?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Conformité RGPD complète :</strong>
                                <ul>
                                    <li>Chiffrement SSL/TLS de toutes les transmissions</li>
                                    <li>Hébergement sécurisé chez Hostinger (ISO 27001)</li>
                                    <li>DPO désigné : dpo@jeconfie.fr</li>
                                    <li>Données conservées selon la réglementation</li>
                                </ul>
                            </span>
                            <span class="lang-content en">
                                <strong>Full GDPR compliance:</strong>
                                <ul>
                                    <li>SSL/TLS encryption of all transmissions</li>
                                    <li>Secure hosting at Hostinger (ISO 27001)</li>
                                    <li>Designated DPO: dpo@jeconfie.fr</li>
                                    <li>Data retained according to regulations</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transport Category -->
            <div class="faq-category" id="transport">
                <div class="category-header">
                    <h2 class="category-title">
                        <span class="category-icon">🚚</span>
                        <span class="lang-content fr active">Questions sur le Transport</span>
                        <span class="lang-content en">Transport Questions</span>
                    </h2>
                    <p class="category-description">
                        <span class="lang-content fr active">Modes de transport et responsabilités</span>
                        <span class="lang-content en">Transport modes and responsibilities</span>
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Quels sont les modes de transport disponibles ?</span>
                        <span class="lang-content en">What transport modes are available?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Deux modes disponibles :</strong>
                                <ul>
                                    <li><strong>Mode Réservation :</strong> Prix fixé au kilogramme par le transporteur</li>
                                    <li><strong>Mode Co-transport :</strong> Prix forfaitaire négociable entre les parties</li>
                                </ul>
                                Les voyageurs peuvent être à la fois expéditeurs et transporteurs.
                            </span>
                            <span class="lang-content en">
                                <strong>Two modes available:</strong>
                                <ul>
                                    <li><strong>Reservation Mode:</strong> Price set per kilogram by the carrier</li>
                                    <li><strong>Co-transport Mode:</strong> Negotiable package price between parties</li>
                                </ul>
                                Travelers can be both senders and carriers.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Qu'est-ce qui est interdit de transporter ?</span>
                        <span class="lang-content en">What is prohibited to transport?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <div class="alert-box alert-danger">
                                <div class="alert-title">
                                    🚫 <span class="lang-content fr active">Strictement interdit</span>
                                    <span class="lang-content en">Strictly prohibited</span>
                                </div>
                                <ul>
                                    <li><span class="lang-content fr active">Substances illégales, stupéfiants</span>
                                        <span class="lang-content en">Illegal substances, narcotics</span></li>
                                    <li><span class="lang-content fr active">Armes, explosifs, matières dangereuses</span>
                                        <span class="lang-content en">Weapons, explosives, hazardous materials</span></li>
                                    <li><span class="lang-content fr active">Animaux vivants</span>
                                        <span class="lang-content en">Live animals</span></li>
                                    <li><span class="lang-content fr active">Contrefaçons</span>
                                        <span class="lang-content en">Counterfeits</span></li>
                                    <li><span class="lang-content fr active">Biens volés</span>
                                        <span class="lang-content en">Stolen goods</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legal Category -->
            <div class="faq-category" id="legal">
                <div class="category-header">
                    <h2 class="category-title">
                        <span class="category-icon">⚖️</span>
                        <span class="lang-content fr active">Questions Juridiques</span>
                        <span class="lang-content en">Legal Questions</span>
                    </h2>
                    <p class="category-description">
                        <span class="lang-content fr active">Responsabilités et litiges</span>
                        <span class="lang-content en">Responsibilities and disputes</span>
                    </p>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Qui est responsable du transport ?</span>
                        <span class="lang-content en">Who is responsible for transport?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <div class="alert-box alert-danger">
                                <div class="alert-title">
                                    🚨 <span class="lang-content fr active">Important</span>
                                    <span class="lang-content en">Important</span>
                                </div>
                                <p>
                                    <span class="lang-content fr active">
                                        <strong>Le transporteur est SEUL RESPONSABLE</strong> de l'exécution du transport. JE CONFIE n'est qu'une plateforme d'intermédiation et ne peut être tenu responsable des dommages, pertes, vols ou retards.
                                    </span>
                                    <span class="lang-content en">
                                        <strong>The carrier is SOLELY RESPONSIBLE</strong> for transport execution. JE CONFIE is only an intermediation platform and cannot be held liable for damage, loss, theft or delays.
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Que faire en cas de litige ?</span>
                        <span class="lang-content en">What to do in case of dispute?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>JE CONFIE n'intervient PAS dans les litiges.</strong>
                                <ul>
                                    <li>Contactez directement l'autre partie</li>
                                    <li>Essayez de trouver un accord amiable</li>
                                    <li>Les fonds restent bloqués maximum 14 jours</li>
                                    <li>Après 14 jours, libération automatique au transporteur</li>
                                    <li>Tribunaux compétents : Lyon exclusivement</li>
                                </ul>
                            </span>
                            <span class="lang-content en">
                                <strong>JE CONFIE does NOT intervene in disputes.</strong>
                                <ul>
                                    <li>Contact the other party directly</li>
                                    <li>Try to find an amicable agreement</li>
                                    <li>Funds remain blocked for maximum 14 days</li>
                                    <li>After 14 days, automatic release to carrier</li>
                                    <li>Competent courts: Lyon exclusively</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Quelles sont vos informations légales ?</span>
                        <span class="lang-content en">What are your legal details?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>FRANCK JUBEL LOEMBET</strong><br>
                                Entrepreneur individuel<br>
                                SIRET : 988 109 625 00018<br>
                                TVA : FR60988109625<br>
                                Immatriculé le : 19 juin 2025<br>
                                Lancé le : 30 septembre 2025<br>
                                Siège : 32 Avenue Francis de Pressensé, 69200 Vénissieux
                            </span>
                            <span class="lang-content en">
                                <strong>FRANCK JUBEL LOEMBET</strong><br>
                                Individual entrepreneur<br>
                                SIRET: 988 109 625 00018<br>
                                VAT: FR60988109625<br>
                                Registered: June 19, 2025<br>
                                Launched: September 30, 2025<br>
                                Headquarters: 32 Avenue Francis de Pressensé, 69200 Vénissieux
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="contact-section">
            <h3 class="contact-title">
                <span class="lang-content fr active">Vous n'avez pas trouvé votre réponse ?</span>
                <span class="lang-content en">Didn't find your answer?</span>
            </h3>
            <p class="contact-text">
                <span class="lang-content fr active">Notre équipe est là pour vous aider !</span>
                <span class="lang-content en">Our team is here to help!</span>
            </p>
            <div class="contact-buttons">
                <a href="mailto:support@jeconfie.fr" class="btn btn-white">
                    📧 support@jeconfie.fr
                </a>
                <a href="tel:+33755258023" class="btn btn-outline">
                    📞 +33 07 55 25 80 23
                </a>
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

            // Update search placeholder
            const searchInput = document.getElementById('faqSearch');
            if (lang === 'fr') {
                searchInput.placeholder = searchInput.getAttribute('data-placeholder-fr');
            } else {
                searchInput.placeholder = searchInput.getAttribute('data-placeholder-en');
            }
            
            localStorage.setItem('preferredLanguage', lang);
        }

        // Toggle FAQ item
        function toggleFAQ(element) {
            const faqItem = element.parentElement;
            const wasActive = faqItem.classList.contains('active');
            
            // Close all FAQ items in the same category
            const category = faqItem.closest('.faq-category');
            category.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Toggle current item
            if (!wasActive) {
                faqItem.classList.add('active');
            }
        }

        // Show category
        function showCategory(categoryId) {
            // Update tabs
            document.querySelectorAll('.category-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.currentTarget.classList.add('active');

            // Show/hide categories
            document.querySelectorAll('.faq-category').forEach(category => {
                category.classList.remove('active');
            });
            document.getElementById(categoryId).classList.add('active');
        }

        // Search functionality
        document.getElementById('faqSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');
            
            if (searchTerm === '') {
                // Show all items if search is empty
                faqItems.forEach(item => {
                    item.style.display = 'block';
                });
                // Show all categories
                document.querySelectorAll('.faq-category').forEach(category => {
                    category.style.display = 'none';
                });
                document.querySelector('.faq-category.active').style.display = 'block';
            } else {
                // Show all categories when searching
                document.querySelectorAll('.faq-category').forEach(category => {
                    category.style.display = 'block';
                });
                
                // Filter FAQ items
                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question').textContent.toLowerCase();
                    const answer = item.querySelector('.faq-answer-content').textContent.toLowerCase();
                    
                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                        // Highlight search term
                        if (searchTerm.length > 2) {
                            item.classList.add('highlight');
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
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