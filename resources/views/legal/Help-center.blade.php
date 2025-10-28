<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Centre d'aide Je confie</title>
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

        /* Language Management */
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
            color: white;
            padding: 120px 20px 60px;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 3vw, 1.25rem);
            opacity: 0.95;
            margin-bottom: 32px;
        }

        /* Search Bar */
        .search-container {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 20px 60px 20px 24px;
            border-radius: var(--radius-xl);
            border: none;
            font-size: 16px;
            box-shadow: var(--shadow-xl);
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
        }

        /* Main Container */
        .main-container {
            max-width: 1280px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 32px;
        }

        /* Sidebar Categories */
        .sidebar {
            position: sticky;
            top: 92px;
            height: fit-content;
        }

        .category-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow);
            margin-bottom: 24px;
        }

        .category-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .category-list {
            list-style: none;
        }

        .category-item {
            padding: 12px 16px;
            margin-bottom: 8px;
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
            color: var(--dark);
        }

        .category-item:hover {
            background: var(--light);
            padding-left: 20px;
        }

        .category-item.active {
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.1), rgba(5, 150, 105, 0.1));
            color: var(--primary);
            font-weight: 600;
        }

        .category-icon {
            font-size: 20px;
        }

        /* FAQ Content */
        .faq-content {
            background: white;
            border-radius: var(--radius-lg);
            padding: clamp(24px, 5vw, 32px);
            box-shadow: var(--shadow);
        }

        .content-header {
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 2px solid var(--border);
        }

        .content-title {
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .content-subtitle {
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* FAQ Sections */
        .faq-section {
            margin-bottom: 40px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .section-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .section-title {
            font-size: clamp(1.25rem, 3vw, 1.5rem);
            font-weight: 700;
            color: var(--dark);
        }

        /* FAQ Items */
        .faq-item {
            background: var(--light);
            border-radius: var(--radius);
            margin-bottom: 16px;
            overflow: hidden;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: var(--primary);
        }

        .faq-question {
            padding: 20px 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--dark);
            background: white;
        }

        .faq-question:hover {
            background: var(--light);
        }

        .faq-toggle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(45deg);
        }

        .faq-answer {
            padding: 0 24px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
        }

        .faq-item.active .faq-answer {
            padding: 20px 24px;
            max-height: 1000px;
        }

        .faq-answer-content {
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

        .alert-success {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.1), rgba(16, 185, 129, 0.05));
            border-left: 4px solid var(--eco-green);
        }

        .alert-warning {
            background: #fef3c7;
            border-left: 4px solid var(--warning);
        }

        .alert-danger {
            background: #fee2e2;
            border-left: 4px solid var(--danger);
        }

        .alert-title {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .alert-success .alert-title {
            color: var(--eco-green);
        }

        .alert-warning .alert-title {
            color: var(--warning);
        }

        .alert-danger .alert-title {
            color: var(--danger);
        }

        /* Help Actions */
        .help-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
            padding-top: 40px;
            border-top: 2px solid var(--border);
        }

        .help-card {
            text-align: center;
            padding: 32px;
            background: var(--light);
            border-radius: var(--radius-lg);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .help-card:hover {
            background: white;
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .help-card-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .help-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .help-card-desc {
            color: var(--gray);
            margin-bottom: 16px;
        }

        .help-card-link {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        @media (max-width: 992px) {
            .main-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: relative;
                top: 0;
            }
        }

        @media (max-width: 768px) {
            .help-actions {
                grid-template-columns: 1fr;
            }
            
            .section-header {
                flex-direction: column;
                text-align: center;
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
        <div class="hero-content">
            <h1 class="hero-title">
                <span class="lang-content fr active">Centre d'aide</span>
                <span class="lang-content en">Help Center</span>
            </h1>
            <p class="hero-subtitle">
                <span class="lang-content fr active">Tout ce que vous devez savoir sur Je confie</span>
                <span class="lang-content en">Everything you need to know about Je confie</span>
            </p>
            <div class="search-container">
                <input type="text" class="search-input" id="faqSearch" placeholder="Rechercher dans l'aide...">
                <button class="search-btn">🔍</button>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="category-card">
                <h3 class="category-title">
                    <span class="lang-content fr active">Catégories</span>
                    <span class="lang-content en">Categories</span>
                </h3>
                <ul class="category-list">
                    <li class="category-item active" onclick="showCategory('general')">
                        <span class="category-icon">📋</span>
                        <span class="lang-content fr active">Général</span>
                        <span class="lang-content en">General</span>
                    </li>
                    <li class="category-item" onclick="showCategory('legal')">
                        <span class="category-icon">⚖️</span>
                        <span class="lang-content fr active">Juridique</span>
                        <span class="lang-content en">Legal</span>
                    </li>
                    <li class="category-item" onclick="showCategory('payment')">
                        <span class="category-icon">💳</span>
                        <span class="lang-content fr active">Paiement</span>
                        <span class="lang-content en">Payment</span>
                    </li>
                    <li class="category-item" onclick="showCategory('security')">
                        <span class="category-icon">🔒</span>
                        <span class="lang-content fr active">Sécurité</span>
                        <span class="lang-content en">Security</span>
                    </li>
                    <li class="category-item" onclick="showCategory('transport')">
                        <span class="category-icon">🚛</span>
                        <span class="lang-content fr active">Transport</span>
                        <span class="lang-content en">Transport</span>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- FAQ Content -->
        <main class="faq-content">
            <div class="content-header">
                <h2 class="content-title">
                    <span class="lang-content fr active">Questions Fréquentes</span>
                    <span class="lang-content en">Frequently Asked Questions</span>
                </h2>
                <p class="content-subtitle">
                    <span class="lang-content fr active">Trouvez rapidement des réponses à vos questions</span>
                    <span class="lang-content en">Quickly find answers to your questions</span>
                </p>
            </div>

            <!-- General Section -->
            <div class="faq-section" id="general">
                <div class="section-header">
                    <div class="section-icon">📋</div>
                    <h3 class="section-title">
                        <span class="lang-content fr active">Questions Générales</span>
                        <span class="lang-content en">General Questions</span>
                    </h3>
                </div>

                <div class="faq-item active">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Qu'est-ce que Je confie ?</span>
                        <span class="lang-content en">What is Je confie?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                Je confie est une <strong>plateforme d'intermédiation</strong> qui met en relation des particuliers souhaitant envoyer des colis avec des voyageurs ou conducteurs disposant d'espace de transport.
                                <br><br>
                                <strong>IMPORTANT :</strong> Nous ne sommes PAS un transporteur. Nous fournissons uniquement la technologie de mise en relation et de paiement sécurisé.
                                <br><br>
                                Notre service comprend :
                                <ul>
                                    <li>Mise en relation entre expéditeurs et transporteurs</li>
                                    <li>Sécurisation des paiements via Mollie</li>
                                    <li>Vérification d'identité via Twilio</li>
                                    <li>Interface de gestion des transactions</li>
                                </ul>
                            </span>
                            <span class="lang-content en">
                                Je confie is an <strong>intermediation platform</strong> that connects individuals wishing to send packages with travelers or drivers with transport space.
                                <br><br>
                                <strong>IMPORTANT:</strong> We are NOT a carrier. We only provide connection technology and secure payment.
                                <br><br>
                                Our service includes:
                                <ul>
                                    <li>Connection between senders and carriers</li>
                                    <li>Secure payments via Mollie</li>
                                    <li>Identity verification via Twilio</li>
                                    <li>Transaction management interface</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Qui est responsable du transport ?</span>
                        <span class="lang-content en">Who is responsible for transport?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <div class="alert-box alert-warning">
                                <div class="alert-title">
                                    ⚠️ <span class="lang-content fr active">Responsabilité des utilisateurs</span>
                                    <span class="lang-content en">User responsibility</span>
                                </div>
                                <p>
                                    <span class="lang-content fr active">
                                        <strong>Le transporteur (voyageur ou conducteur) est SEUL RESPONSABLE</strong> de l'exécution du transport. JE CONFIE n'est pas partie au contrat de transport et ne peut être tenu responsable d'aucun dommage, perte, vol ou retard.
                                    </span>
                                    <span class="lang-content en">
                                        <strong>The carrier (traveler or driver) is SOLELY RESPONSIBLE</strong> for transport execution. JE CONFIE is not party to the transport contract and cannot be held liable for any damage, loss, theft or delay.
                                    </span>
                                </p>
                            </div>
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
                                <strong>Processus en 6 étapes :</strong>
                                <ol>
                                    <li><strong>Publication :</strong> L'expéditeur publie son annonce</li>
                                    <li><strong>Mise en relation :</strong> Un transporteur accepte la mission</li>
                                    <li><strong>Paiement sécurisé :</strong> L'expéditeur paie, les fonds sont bloqués chez Mollie</li>
                                    <li><strong>Transport :</strong> Le transporteur effectue le transport (hors responsabilité JE CONFIE)</li>
                                    <li><strong>Confirmation :</strong> L'expéditeur confirme la réception</li>
                                    <li><strong>Déblocage :</strong> Les fonds sont versés au transporteur après 48h</li>
                                </ol>
                            </span>
                            <span class="lang-content en">
                                <strong>6-step process:</strong>
                                <ol>
                                    <li><strong>Publication:</strong> Sender publishes their listing</li>
                                    <li><strong>Connection:</strong> A carrier accepts the mission</li>
                                    <li><strong>Secure payment:</strong> Sender pays, funds are held at Mollie</li>
                                    <li><strong>Transport:</strong> Carrier performs transport (outside JE CONFIE liability)</li>
                                    <li><strong>Confirmation:</strong> Sender confirms receipt</li>
                                    <li><strong>Release:</strong> Funds are paid to carrier after 48h</li>
                                </ol>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legal Section -->
            <div class="faq-section" id="legal" style="display: none;">
                <div class="section-header">
                    <div class="section-icon">⚖️</div>
                    <h3 class="section-title">
                        <span class="lang-content fr active">Questions Juridiques</span>
                        <span class="lang-content en">Legal Questions</span>
                    </h3>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">JE CONFIE est-il responsable en cas de problème ?</span>
                        <span class="lang-content en">Is JE CONFIE liable in case of problems?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <div class="alert-box alert-danger">
                                <div class="alert-title">
                                    🚨 <span class="lang-content fr active">NON - Limitation totale de responsabilité</span>
                                    <span class="lang-content en">NO - Complete limitation of liability</span>
                                </div>
                                <p>
                                    <span class="lang-content fr active">
                                        JE CONFIE est une plateforme d'intermédiation pure. Nous ne sommes responsables d'AUCUN :
                                        <ul>
                                            <li>Dommage, perte, vol ou détérioration de colis</li>
                                            <li>Retard ou non-livraison</li>
                                            <li>Accident pendant le transport</li>
                                            <li>Litige entre utilisateurs</li>
                                            <li>Non-conformité des marchandises</li>
                                            <li>Violation de réglementation douanière</li>
                                        </ul>
                                        <strong>Les utilisateurs acceptent cette limitation en utilisant notre service.</strong>
                                    </span>
                                    <span class="lang-content en">
                                        JE CONFIE is a pure intermediation platform. We are NOT liable for ANY:
                                        <ul>
                                            <li>Damage, loss, theft or deterioration of packages</li>
                                            <li>Delay or non-delivery</li>
                                            <li>Accident during transport</li>
                                            <li>Dispute between users</li>
                                            <li>Non-compliance of goods</li>
                                            <li>Customs regulation violation</li>
                                        </ul>
                                        <strong>Users accept this limitation by using our service.</strong>
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
                                <strong>JE CONFIE n'intervient PAS dans les litiges.</strong> En cas de problème :
                                <ol>
                                    <li>Contactez directement l'autre partie</li>
                                    <li>Essayez de trouver un accord amiable</li>
                                    <li>Si nécessaire, saisissez les autorités compétentes</li>
                                    <li>Les tribunaux de Lyon sont seuls compétents pour tout litige</li>
                                </ol>
                                <br>
                                <strong>Note :</strong> Les fonds restent bloqués maximum 14 jours en cas de litige signalé, puis sont automatiquement libérés.
                            </span>
                            <span class="lang-content en">
                                <strong>JE CONFIE does NOT intervene in disputes.</strong> In case of problem:
                                <ol>
                                    <li>Contact the other party directly</li>
                                    <li>Try to find an amicable agreement</li>
                                    <li>If necessary, contact the competent authorities</li>
                                    <li>Lyon courts have sole jurisdiction for any dispute</li>
                                </ol>
                                <br>
                                <strong>Note:</strong> Funds remain blocked for maximum 14 days if dispute reported, then are automatically released.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Quelles marchandises sont interdites ?</span>
                        <span class="lang-content en">What goods are prohibited?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Strictement interdit de transporter :</strong>
                                <ul>
                                    <li>Substances illégales, stupéfiants</li>
                                    <li>Armes, explosifs, matières dangereuses</li>
                                    <li>Contrefaçons</li>
                                    <li>Animaux vivants</li>
                                    <li>Biens volés</li>
                                    <li>Produits périssables (sans accord)</li>
                                    <li>Tout objet illégal</li>
                                </ul>
                                <strong>Les utilisateurs sont seuls responsables de la conformité légale de leurs envois.</strong>
                            </span>
                            <span class="lang-content en">
                                <strong>Strictly prohibited to transport:</strong>
                                <ul>
                                    <li>Illegal substances, narcotics</li>
                                    <li>Weapons, explosives, hazardous materials</li>
                                    <li>Counterfeits</li>
                                    <li>Live animals</li>
                                    <li>Stolen goods</li>
                                    <li>Perishable products (without agreement)</li>
                                    <li>Any illegal object</li>
                                </ul>
                                <strong>Users are solely responsible for the legal compliance of their shipments.</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="faq-section" id="payment" style="display: none;">
                <div class="section-header">
                    <div class="section-icon">💳</div>
                    <h3 class="section-title">
                        <span class="lang-content fr active">Questions sur les Paiements</span>
                        <span class="lang-content en">Payment Questions</span>
                    </h3>
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
                                <strong>Partenaire : Mollie B.V.</strong> (Établissement de paiement agréé)
                                <ul>
                                    <li>Certification PCI-DSS niveau 1</li>
                                    <li>Agréé par la Banque Centrale des Pays-Bas</li>
                                    <li>Système de séquestre sécurisé</li>
                                    <li>JE CONFIE ne détient jamais vos fonds directement</li>
                                </ul>
                                <br>
                                <strong>Moyens de paiement acceptés :</strong>
                                <ul>
                                    <li>Cartes bancaires (Visa, Mastercard)</li>
                                    <li>Virements SEPA</li>
                                    <li>PayPal</li>
                                    <li>Apple Pay / Google Pay</li>
                                </ul>
                            </span>
                            <span class="lang-content en">
                                <strong>Partner: Mollie B.V.</strong> (Licensed payment institution)
                                <ul>
                                    <li>PCI-DSS Level 1 certification</li>
                                    <li>Licensed by Dutch Central Bank</li>
                                    <li>Secure escrow system</li>
                                    <li>JE CONFIE never holds your funds directly</li>
                                </ul>
                                <br>
                                <strong>Accepted payment methods:</strong>
                                <ul>
                                    <li>Credit cards (Visa, Mastercard)</li>
                                    <li>SEPA transfers</li>
                                    <li>PayPal</li>
                                    <li>Apple Pay / Google Pay</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Quels sont les frais ?</span>
                        <span class="lang-content en">What are the fees?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Commission JE CONFIE :</strong> 15% à 20% HT sur chaque transaction
                                <br><br>
                                <strong>Ce qui est inclus :</strong>
                                <ul>
                                    <li>Utilisation de la plateforme</li>
                                    <li>Sécurisation des paiements</li>
                                    <li>Vérification d'identité</li>
                                    <li>Support technique</li>
                                    <li>TVA : 20% sur la commission</li>
                                </ul>
                                <br>
                                <strong>Pas de frais cachés :</strong> Tout est affiché avant validation
                            </span>
                            <span class="lang-content en">
                                <strong>JE CONFIE commission:</strong> 15% to 20% excluding VAT on each transaction
                                <br><br>
                                <strong>What's included:</strong>
                                <ul>
                                    <li>Platform use</li>
                                    <li>Payment security</li>
                                    <li>Identity verification</li>
                                    <li>Technical support</li>
                                    <li>VAT: 20% on commission</li>
                                </ul>
                                <br>
                                <strong>No hidden fees:</strong> Everything displayed before validation
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
                                    ⚠️ <span class="lang-content fr active">Aucune assurance actuellement</span>
                                    <span class="lang-content en">No insurance currently</span>
                                </div>
                                <p>
                                    <span class="lang-content fr active">
                                        JE CONFIE ne propose actuellement AUCUNE assurance. Les utilisateurs transportent et expédient à leurs propres risques. Nous recommandons fortement de souscrire une assurance personnelle.
                                    </span>
                                    <span class="lang-content en">
                                        JE CONFIE currently offers NO insurance. Users transport and ship at their own risk. We strongly recommend taking out personal insurance.
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div class="faq-section" id="security" style="display: none;">
                <div class="section-header">
                    <div class="section-icon">🔒</div>
                    <h3 class="section-title">
                        <span class="lang-content fr active">Sécurité et Données</span>
                        <span class="lang-content en">Security and Data</span>
                    </h3>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Comment mes données sont-elles protégées ?</span>
                        <span class="lang-content en">How is my data protected?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Conformité RGPD complète :</strong>
                                <ul>
                                    <li>Chiffrement SSL/TLS de toutes les transmissions</li>
                                    <li>Hébergement sécurisé chez Hostinger (ISO 27001)</li>
                                    <li>Authentification à deux facteurs via Twilio</li>
                                    <li>Paiements sécurisés via Mollie (PCI-DSS niveau 1)</li>
                                    <li>Accès restreint aux données personnelles</li>
                                    <li>DPO disponible : dpo@jeconfie.fr</li>
                                </ul>
                            </span>
                            <span class="lang-content en">
                                <strong>Full GDPR compliance:</strong>
                                <ul>
                                    <li>SSL/TLS encryption of all transmissions</li>
                                    <li>Secure hosting at Hostinger (ISO 27001)</li>
                                    <li>Two-factor authentication via Twilio</li>
                                    <li>Secure payments via Mollie (PCI-DSS level 1)</li>
                                    <li>Restricted access to personal data</li>
                                    <li>DPO available: dpo@jeconfie.fr</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span class="lang-content fr active">Comment vérifiez-vous l'identité ?</span>
                        <span class="lang-content en">How do you verify identity?</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <span class="lang-content fr active">
                                <strong>Vérification via Twilio :</strong>
                                <ul>
                                    <li>Vérification du numéro de téléphone par SMS</li>
                                    <li>Authentification à deux facteurs</li>
                                    <li>Vérification de pièce d'identité pour les transporteurs</li>
                                    <li>Badge "Vérifié" sur le profil</li>
                                </ul>
                                <br>
                                <strong>Pourquoi c'est important :</strong> Prévention de la fraude et sécurité des transactions
                            </span>
                            <span class="lang-content en">
                                <strong>Verification via Twilio:</strong>
                                <ul>
                                    <li>Phone number verification by SMS</li>
                                    <li>Two-factor authentication</li>
                                    <li>ID verification for carriers</li>
                                    <li>"Verified" badge on profile</li>
                                </ul>
                                <br>
                                <strong>Why it's important:</strong> Fraud prevention and transaction security
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert Box -->
            <div class="alert-box alert-success">
                <div class="alert-title">
                    💡 <span class="lang-content fr active">Besoin d'aide supplémentaire ?</span>
                    <span class="lang-content en">Need more help?</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        Contactez notre équipe support : support@jeconfie.fr ou +33 07 55 25 80 23
                    </span>
                    <span class="lang-content en">
                        Contact our support team: support@jeconfie.fr or +33 07 55 25 80 23
                    </span>
                </p>
            </div>

            <!-- Help Actions -->
            <div class="help-actions">
                <div class="help-card">
                    <div class="help-card-icon">📧</div>
                    <h4 class="help-card-title">Email</h4>
                    <p class="help-card-desc">
                        <span class="lang-content fr active">Réponse sous 24h</span>
                        <span class="lang-content en">Response within 24h</span>
                    </p>
                    <a href="mailto:support@jeconfie.fr" class="help-card-link">
                        support@jeconfie.fr →
                    </a>
                </div>

                <div class="help-card">
                    <div class="help-card-icon">📞</div>
                    <h4 class="help-card-title">
                        <span class="lang-content fr active">Téléphone</span>
                        <span class="lang-content en">Phone</span>
                    </h4>
                    <p class="help-card-desc">
                        <span class="lang-content fr active">Lun-Ven 9h-18h</span>
                        <span class="lang-content en">Mon-Fri 9am-6pm</span>
                    </p>
                    <a href="tel:+33755258023" class="help-card-link">
                        +33 07 55 25 80 23 →
                    </a>
                </div>

                <div class="help-card">
                    <div class="help-card-icon">📚</div>
                    <h4 class="help-card-title">
                        <span class="lang-content fr active">Documentation</span>
                        <span class="lang-content en">Documentation</span>
                    </h4>
                    <p class="help-card-desc">
                        <span class="lang-content fr active">CGU, CGV et RGPD</span>
                        <span class="lang-content en">Terms, Sales and GDPR</span>
                    </p>
                    <a href="/cgu" class="help-card-link">
                        <span class="lang-content fr active">Voir les documents →</span>
                        <span class="lang-content en">View documents →</span>
                    </a>
                </div>
            </div>
        </main>
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
            searchInput.placeholder = lang === 'fr' ? 'Rechercher dans l\'aide...' : 'Search in help...';
            
            localStorage.setItem('preferredLanguage', lang);
        }

        // Toggle FAQ item
        function toggleFAQ(element) {
            const faqItem = element.parentElement;
            faqItem.classList.toggle('active');
        }

        // Show category
        function showCategory(category) {
            // Update active category in sidebar
            document.querySelectorAll('.category-item').forEach(item => {
                item.classList.remove('active');
            });
            event.currentTarget.classList.add('active');

            // Show/hide sections
            document.querySelectorAll('.faq-section').forEach(section => {
                section.style.display = 'none';
            });
            const targetSection = document.getElementById(category);
            if (targetSection) {
                targetSection.style.display = 'block';
            }
        }

        // Search functionality
        document.getElementById('faqSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer-content').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
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