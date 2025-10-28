<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions Spéciales d'Intermédiation - Je confie</title>
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
            background: #0f172a;
            padding: 120px 20px 60px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '⚠️';
            position: absolute;
            font-size: 200px;
            opacity: 0.05;
            top: -50px;
            left: -50px;
            transform: rotate(-15deg);
        }

        .hero-section::after {
            content: '🚨';
            position: absolute;
            font-size: 200px;
            opacity: 0.05;
            bottom: -50px;
            right: -50px;
            transform: rotate(15deg);
        }

        .hero-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            color: var(--danger);
        }

        .hero-subtitle {
            font-size: clamp(1rem, 3vw, 1.25rem);
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            color: #e2e8f0;
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
            border: 3px solid var(--danger);
        }

        /* Critical Alert */
        .critical-alert {
            background: var(--danger);
            color: white;
            padding: 32px;
            border-radius: var(--radius-xl);
            margin-bottom: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .critical-alert::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -150px;
            right: -100px;
        }

        .critical-title {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .critical-content {
            font-size: 1.1rem;
            line-height: 1.8;
            position: relative;
            z-index: 1;
        }

        /* Sections */
        .section {
            margin-bottom: 48px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 3px solid var(--danger);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: var(--danger);
            color: white;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        /* Article */
        .article {
            background: #fee2e2;
            border-left: 4px solid var(--danger);
            padding: 24px;
            border-radius: var(--radius);
            margin-bottom: 24px;
        }

        .article-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--danger);
            margin-bottom: 16px;
        }

        .article-content {
            color: var(--dark);
            line-height: 1.8;
        }

        .article-content ul {
            margin: 16px 0;
            padding-left: 24px;
        }

        .article-content li {
            margin-bottom: 8px;
        }

        /* Clause Cards */
        .clause-grid {
            display: grid;
            gap: 24px;
            margin: 24px 0;
        }

        .clause-card {
            background: white;
            border: 2px solid var(--danger);
            border-radius: var(--radius-lg);
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        .clause-card::before {
            content: '⚖️';
            position: absolute;
            font-size: 60px;
            opacity: 0.05;
            top: -10px;
            right: -10px;
        }

        .clause-number {
            display: inline-block;
            width: 32px;
            height: 32px;
            background: var(--danger);
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 32px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .clause-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .clause-content {
            color: var(--gray);
            line-height: 1.8;
        }

        /* Important Box */
        .important-box {
            background: var(--dark);
            color: white;
            padding: 32px;
            border-radius: var(--radius-lg);
            margin: 32px 0;
            text-align: center;
        }

        .important-box-title {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 16px;
            color: var(--warning);
        }

        .important-box-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* Signature Box */
        .signature-box {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.05), rgba(245, 158, 11, 0.05));
            border: 2px solid var(--danger);
            border-radius: var(--radius-lg);
            padding: 32px;
            margin-top: 40px;
            text-align: center;
        }

        .signature-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .signature-content {
            color: var(--gray);
            line-height: 1.8;
        }

        .signature-checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 24px;
            font-weight: 600;
            color: var(--dark);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 1.25rem;
            }
            
            .critical-title {
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
            <span class="lang-content fr active">⚠️ CONDITIONS SPÉCIALES D'INTERMÉDIATION ⚠️</span>
            <span class="lang-content en">⚠️ SPECIAL INTERMEDIATION CONDITIONS ⚠️</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">DOCUMENT JURIDIQUE CONTRAIGNANT - LIMITATION TOTALE DE RESPONSABILITÉ</span>
            <span class="lang-content en">BINDING LEGAL DOCUMENT - COMPLETE LIMITATION OF LIABILITY</span>
        </p>
    </section>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-card">
            
            <!-- Critical Alert -->
            <div class="critical-alert">
                <h2 class="critical-title">
                    🚨 <span class="lang-content fr active">AVERTISSEMENT CAPITAL</span>
                    <span class="lang-content en">CRITICAL WARNING</span> 🚨
                </h2>
                <div class="critical-content">
                    <span class="lang-content fr active">
                        EN UTILISANT LA PLATEFORME JE CONFIE, VOUS ACCEPTEZ INTÉGRALEMENT ET SANS RÉSERVE QUE NOUS NE SOMMES QU'UN INTERMÉDIAIRE TECHNIQUE. NOUS NE SOMMES PAS UN TRANSPORTEUR. NOUS DÉCLINONS TOUTE RESPONSABILITÉ POUR TOUT DOMMAGE, PERTE, VOL, RETARD OU PRÉJUDICE QUEL QU'IL SOIT. VOUS TRANSPORTEZ ET EXPÉDIEZ À VOS PROPRES RISQUES ET PÉRILS.
                    </span>
                    <span class="lang-content en">
                        BY USING THE JE CONFIE PLATFORM, YOU FULLY AND UNRESERVEDLY ACCEPT THAT WE ARE ONLY A TECHNICAL INTERMEDIARY. WE ARE NOT A CARRIER. WE DECLINE ALL LIABILITY FOR ANY DAMAGE, LOSS, THEFT, DELAY OR HARM WHATSOEVER. YOU TRANSPORT AND SHIP AT YOUR OWN RISK.
                    </span>
                </div>
            </div>

            <!-- Article 1 -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">1</span>
                    <span class="lang-content fr active">QUALIFICATION JURIDIQUE DE JE CONFIE</span>
                    <span class="lang-content en">LEGAL QUALIFICATION OF JE CONFIE</span>
                </h2>
                
                <div class="article">
                    <h3 class="article-title">
                        <span class="lang-content fr active">1.1. Nature Exclusive de Plateforme d'Intermédiation</span>
                        <span class="lang-content en">1.1. Exclusive Nature as Intermediation Platform</span>
                    </h3>
                    <div class="article-content">
                        <span class="lang-content fr active">
                            JE CONFIE, exploité par FRANCK JUBEL LOEMBET (EI), est EXCLUSIVEMENT une plateforme technique d'intermédiation qui :
                            <ul>
                                <li>N'est PAS un transporteur au sens du Code des transports</li>
                                <li>N'est PAS un commissionnaire de transport</li>
                                <li>N'est PAS un transitaire ou freight forwarder</li>
                                <li>N'est PAS un opérateur postal ou de messagerie</li>
                                <li>N'est PAS partie aux contrats de transport conclus entre utilisateurs</li>
                                <li>N'exerce AUCUNE activité de transport physique</li>
                                <li>Ne détient JAMAIS physiquement les colis</li>
                                <li>Ne garantit AUCUNE livraison</li>
                            </ul>
                        </span>
                        <span class="lang-content en">
                            JE CONFIE, operated by FRANCK JUBEL LOEMBET (Individual Business), is EXCLUSIVELY a technical intermediation platform that:
                            <ul>
                                <li>Is NOT a carrier under the Transport Code</li>
                                <li>Is NOT a freight forwarder</li>
                                <li>Is NOT a forwarding agent or freight forwarder</li>
                                <li>Is NOT a postal or courier operator</li>
                                <li>Is NOT party to transport contracts concluded between users</li>
                                <li>Does NOT exercise ANY physical transport activity</li>
                                <li>NEVER physically holds packages</li>
                                <li>Does NOT guarantee ANY delivery</li>
                            </ul>
                        </span>
                    </div>
                </div>
            </section>

            <!-- Article 2 -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">2</span>
                    <span class="lang-content fr active">EXCLUSIONS TOTALES DE RESPONSABILITÉ</span>
                    <span class="lang-content en">COMPLETE EXCLUSIONS OF LIABILITY</span>
                </h2>
                
                <div class="clause-grid">
                    <div class="clause-card">
                        <span class="clause-number">A</span>
                        <h3 class="clause-title">
                            <span class="lang-content fr active">Dommages aux Marchandises</span>
                            <span class="lang-content en">Damage to Goods</span>
                        </h3>
                        <div class="clause-content">
                            <span class="lang-content fr active">
                                JE CONFIE ne peut en AUCUN CAS être tenu responsable de :
                                • Perte totale ou partielle des colis<br>
                                • Vol avec ou sans effraction<br>
                                • Détérioration, casse, mouillage<br>
                                • Contamination ou altération<br>
                                • Disparition mystérieuse<br>
                                • Avaries de toute nature
                            </span>
                            <span class="lang-content en">
                                JE CONFIE can in NO CASE be held liable for:
                                • Total or partial loss of packages<br>
                                • Theft with or without breaking<br>
                                • Deterioration, breakage, wetting<br>
                                • Contamination or alteration<br>
                                • Mysterious disappearance<br>
                                • Damage of any kind
                            </span>
                        </div>
                    </div>

                    <div class="clause-card">
                        <span class="clause-number">B</span>
                        <h3 class="clause-title">
                            <span class="lang-content fr active">Retards et Non-Livraison</span>
                            <span class="lang-content en">Delays and Non-Delivery</span>
                        </h3>
                        <div class="clause-content">
                            <span class="lang-content fr active">
                                JE CONFIE décline toute responsabilité pour :
                                • Retards de livraison<br>
                                • Non-respect des délais<br>
                                • Non-livraison totale<br>
                                • Livraison à une mauvaise adresse<br>
                                • Impossibilité de livrer<br>
                                • Conséquences financières des retards
                            </span>
                            <span class="lang-content en">
                                JE CONFIE declines all liability for:
                                • Delivery delays<br>
                                • Non-compliance with deadlines<br>
                                • Total non-delivery<br>
                                • Delivery to wrong address<br>
                                • Inability to deliver<br>
                                • Financial consequences of delays
                            </span>
                        </div>
                    </div>

                    <div class="clause-card">
                        <span class="clause-number">C</span>
                        <h3 class="clause-title">
                            <span class="lang-content fr active">Accidents et Dommages Corporels</span>
                            <span class="lang-content en">Accidents and Personal Injury</span>
                        </h3>
                        <div class="clause-content">
                            <span class="lang-content fr active">
                                JE CONFIE n'assume aucune responsabilité pour :
                                • Accidents de la route<br>
                                • Blessures corporelles<br>
                                • Décès<br>
                                • Dommages aux tiers<br>
                                • Dommages aux véhicules<br>
                                • Infractions routières
                            </span>
                            <span class="lang-content en">
                                JE CONFIE assumes no liability for:
                                • Road accidents<br>
                                • Personal injuries<br>
                                • Death<br>
                                • Third party damage<br>
                                • Vehicle damage<br>
                                • Traffic violations
                            </span>
                        </div>
                    </div>

                    <div class="clause-card">
                        <span class="clause-number">D</span>
                        <h3 class="clause-title">
                            <span class="lang-content fr active">Conformité Légale et Douanière</span>
                            <span class="lang-content en">Legal and Customs Compliance</span>
                        </h3>
                        <div class="clause-content">
                            <span class="lang-content fr active">
                                Les utilisateurs sont SEULS responsables de :
                                • La légalité des marchandises<br>
                                • Les déclarations douanières<br>
                                • Le paiement des taxes et droits<br>
                                • Les autorisations de transport<br>
                                • La conformité sanitaire<br>
                                • Les documents de transport
                            </span>
                            <span class="lang-content en">
                                Users are SOLELY responsible for:
                                • Legality of goods<br>
                                • Customs declarations<br>
                                • Payment of taxes and duties<br>
                                • Transport authorizations<br>
                                • Health compliance<br>
                                • Transport documents
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Article 3 -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">3</span>
                    <span class="lang-content fr active">ABSENCE TOTALE D'ASSURANCE</span>
                    <span class="lang-content en">COMPLETE ABSENCE OF INSURANCE</span>
                </h2>
                
                <div class="important-box">
                    <h3 class="important-box-title">
                        ⚠️ <span class="lang-content fr active">AUCUNE ASSURANCE FOURNIE</span>
                        <span class="lang-content en">NO INSURANCE PROVIDED</span> ⚠️
                    </h3>
                    <div class="important-box-content">
                        <span class="lang-content fr active">
                            JE CONFIE NE PROPOSE ACTUELLEMENT AUCUNE ASSURANCE.<br><br>
                            Les utilisateurs transportent et expédient À LEURS PROPRES RISQUES ET PÉRILS.<br>
                            Aucune indemnisation ne sera versée en cas de sinistre.<br>
                            Il est IMPÉRATIF de souscrire vos propres assurances.<br><br>
                            Une option d'assurance est en cours de négociation mais n'est PAS DISPONIBLE actuellement.
                        </span>
                        <span class="lang-content en">
                            JE CONFIE CURRENTLY OFFERS NO INSURANCE.<br><br>
                            Users transport and ship AT THEIR OWN RISK.<br>
                            No compensation will be paid in case of loss.<br>
                            It is IMPERATIVE to take out your own insurance.<br><br>
                            An insurance option is being negotiated but is NOT CURRENTLY AVAILABLE.
                        </span>
                    </div>
                </div>
            </section>

            <!-- Article 4 -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">4</span>
                    <span class="lang-content fr active">CLAUSE D'INDEMNISATION ET DE GARANTIE</span>
                    <span class="lang-content en">INDEMNIFICATION AND WARRANTY CLAUSE</span>
                </h2>
                
                <div class="article">
                    <h3 class="article-title">
                        <span class="lang-content fr active">4.1. Engagement d'Indemnisation par l'Utilisateur</span>
                        <span class="lang-content en">4.1. User's Indemnification Commitment</span>
                    </h3>
                    <div class="article-content">
                        <span class="lang-content fr active">
                            L'utilisateur s'engage irrévocablement à indemniser, défendre et dégager de toute responsabilité JE CONFIE, FRANCK JUBEL LOEMBET, ses dirigeants, employés, partenaires et sous-traitants contre :
                            <ul>
                                <li>Toute réclamation, action en justice, procédure judiciaire ou administrative</li>
                                <li>Tous dommages, pertes, coûts, dépenses (y compris frais d'avocat)</li>
                                <li>Toute responsabilité civile ou pénale</li>
                                <li>Toute amende, pénalité ou sanction</li>
                                <li>Tout préjudice direct ou indirect</li>
                            </ul>
                            Résultant de ou en relation avec l'utilisation de la plateforme, le transport effectué, ou toute violation des présentes conditions.
                        </span>
                        <span class="lang-content en">
                            The user irrevocably undertakes to indemnify, defend and hold harmless JE CONFIE, FRANCK JUBEL LOEMBET, its officers, employees, partners and subcontractors against:
                            <ul>
                                <li>Any claim, lawsuit, judicial or administrative proceeding</li>
                                <li>All damages, losses, costs, expenses (including attorney fees)</li>
                                <li>Any civil or criminal liability</li>
                                <li>Any fine, penalty or sanction</li>
                                <li>Any direct or indirect damage</li>
                            </ul>
                            Resulting from or in connection with the use of the platform, transport performed, or any violation of these conditions.
                        </span>
                    </div>
                </div>
            </section>

            <!-- Article 5 -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">5</span>
                    <span class="lang-content fr active">LITIGES ENTRE UTILISATEURS</span>
                    <span class="lang-content en">DISPUTES BETWEEN USERS</span>
                </h2>
                
                <div class="article">
                    <h3 class="article-title">
                        <span class="lang-content fr active">5.1. Non-Intervention Absolue</span>
                        <span class="lang-content en">5.1. Absolute Non-Intervention</span>
                    </h3>
                    <div class="article-content">
                        <span class="lang-content fr active">
                            <strong>JE CONFIE N'INTERVIENT JAMAIS DANS LES LITIGES.</strong><br><br>
                            En cas de différend entre utilisateurs :
                            <ul>
                                <li>JE CONFIE ne joue AUCUN rôle de médiateur</li>
                                <li>JE CONFIE ne prend parti pour AUCUNE partie</li>
                                <li>JE CONFIE ne verse AUCUNE indemnisation</li>
                                <li>JE CONFIE ne garantit AUCUN remboursement</li>
                                <li>Les utilisateurs doivent régler leurs différends directement</li>
                                <li>Les fonds bloqués sont libérés après 14 jours maximum</li>
                                <li>Seuls les tribunaux de Lyon sont compétents</li>
                            </ul>
                        </span>
                        <span class="lang-content en">
                            <strong>JE CONFIE NEVER INTERVENES IN DISPUTES.</strong><br><br>
                            In case of disagreement between users:
                            <ul>
                                <li>JE CONFIE plays NO mediator role</li>
                                <li>JE CONFIE takes NO side</li>
                                <li>JE CONFIE pays NO compensation</li>
                                <li>JE CONFIE guarantees NO refund</li>
                                <li>Users must settle their differences directly</li>
                                <li>Blocked funds are released after maximum 14 days</li>
                                <li>Only Lyon courts have jurisdiction</li>
                            </ul>
                        </span>
                    </div>
                </div>
            </section>

            <!-- Article 6 -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">6</span>
                    <span class="lang-content fr active">MARCHANDISES INTERDITES</span>
                    <span class="lang-content en">PROHIBITED GOODS</span>
                </h2>
                
                <div class="article">
                    <h3 class="article-title">
                        <span class="lang-content fr active">6.1. Liste Non-Exhaustive des Interdictions</span>
                        <span class="lang-content en">6.1. Non-Exhaustive List of Prohibitions</span>
                    </h3>
                    <div class="article-content">
                        <span class="lang-content fr active">
                            Il est FORMELLEMENT INTERDIT de transporter via notre plateforme :
                            <ul>
                                <li>Substances illégales, stupéfiants, drogues</li>
                                <li>Armes, munitions, explosifs</li>
                                <li>Matières dangereuses, inflammables, toxiques</li>
                                <li>Produits radioactifs ou chimiques</li>
                                <li>Contrefaçons et produits piratés</li>
                                <li>Animaux vivants ou morts</li>
                                <li>Déchets dangereux</li>
                                <li>Organes humains ou animaux</li>
                                <li>Biens volés ou d'origine frauduleuse</li>
                                <li>Espèces, chèques, titres au porteur</li>
                                <li>Tout objet illégal selon la législation applicable</li>
                            </ul>
                            <strong>L'utilisateur assume l'ENTIÈRE RESPONSABILITÉ pénale et civile en cas de transport de marchandises interdites.</strong>
                        </span>
                        <span class="lang-content en">
                            It is STRICTLY FORBIDDEN to transport via our platform:
                            <ul>
                                <li>Illegal substances, narcotics, drugs</li>
                                <li>Weapons, ammunition, explosives</li>
                                <li>Dangerous, flammable, toxic materials</li>
                                <li>Radioactive or chemical products</li>
                                <li>Counterfeits and pirated products</li>
                                <li>Live or dead animals</li>
                                <li>Hazardous waste</li>
                                <li>Human or animal organs</li>
                                <li>Stolen or fraudulently obtained goods</li>
                                <li>Cash, checks, bearer securities</li>
                                <li>Any illegal object according to applicable law</li>
                            </ul>
                            <strong>The user assumes FULL criminal and civil liability in case of transporting prohibited goods.</strong>
                        </span>
                    </div>
                </div>
            </section>

            <!-- Article 7 -->
            <section class="section">
                <h2 class="section-title">
                    <span class="section-icon">7</span>
                    <span class="lang-content fr active">FORCE EXÉCUTOIRE ET JURIDICTION</span>
                    <span class="lang-content en">ENFORCEABILITY AND JURISDICTION</span>
                </h2>
                
                <div class="article">
                    <h3 class="article-title">
                        <span class="lang-content fr active">7.1. Caractère Contraignant</span>
                        <span class="lang-content en">7.1. Binding Nature</span>
                    </h3>
                    <div class="article-content">
                        <span class="lang-content fr active">
                            Les présentes conditions spéciales :
                            <ul>
                                <li>Sont juridiquement contraignantes et exécutoires</li>
                                <li>Prévalent sur toute autre condition</li>
                                <li>S'appliquent dès l'utilisation de la plateforme</li>
                                <li>Engagent l'utilisateur irrévocablement</li>
                                <li>Sont régies par le droit français</li>
                                <li>Relèvent de la compétence exclusive des tribunaux de Lyon</li>
                            </ul>
                            <strong>EN CAS DE LITIGE, SEULS LES TRIBUNAUX DE LYON SONT COMPÉTENTS.</strong>
                        </span>
                        <span class="lang-content en">
                            These special conditions:
                            <ul>
                                <li>Are legally binding and enforceable</li>
                                <li>Prevail over any other conditions</li>
                                <li>Apply from platform use</li>
                                <li>Bind the user irrevocably</li>
                                <li>Are governed by French law</li>
                                <li>Fall under the exclusive jurisdiction of Lyon courts</li>
                            </ul>
                            <strong>IN CASE OF DISPUTE, ONLY LYON COURTS HAVE JURISDICTION.</strong>
                        </span>
                    </div>
                </div>
            </section>

            <!-- Signature Box -->
            <div class="signature-box">
                <h3 class="signature-title">
                    <span class="lang-content fr active">ACCEPTATION OBLIGATOIRE</span>
                    <span class="lang-content en">MANDATORY ACCEPTANCE</span>
                </h3>
                <div class="signature-content">
                    <span class="lang-content fr active">
                        En utilisant la plateforme JE CONFIE, vous reconnaissez avoir lu, compris et accepté sans réserve l'intégralité des présentes Conditions Spéciales d'Intermédiation et notamment la limitation totale de responsabilité de JE CONFIE.<br><br>
                        <strong>VOUS RENONCEZ EXPRESSÉMENT À TOUT RECOURS CONTRE JE CONFIE.</strong>
                    </span>
                    <span class="lang-content en">
                        By using the JE CONFIE platform, you acknowledge having read, understood and unreservedly accepted all of these Special Intermediation Conditions and in particular the complete limitation of liability of JE CONFIE.<br><br>
                        <strong>YOU EXPRESSLY WAIVE ANY RECOURSE AGAINST JE CONFIE.</strong>
                    </span>
                </div>
                <div class="signature-checkbox">
                    <input type="checkbox" id="accept" checked disabled>
                    <label for="accept">
                        <span class="lang-content fr active">✓ J'accepte les conditions et renonce à tout recours</span>
                        <span class="lang-content en">✓ I accept the conditions and waive any recourse</span>
                    </label>
                </div>
            </div>

            <!-- Final Warning -->
            <div class="critical-alert" style="margin-top: 40px; background: var(--dark);">
                <h2 class="critical-title" style="color: var(--danger);">
                    ⚠️ <span class="lang-content fr active">DERNIER AVERTISSEMENT</span>
                    <span class="lang-content en">FINAL WARNING</span> ⚠️
                </h2>
                <div class="critical-content">
                    <span class="lang-content fr active">
                        JE CONFIE N'EST PAS UN TRANSPORTEUR.<br>
                        NOUS NE GARANTISSONS RIEN.<br>
                        NOUS NE SOMMES RESPONSABLES DE RIEN.<br>
                        VOUS UTILISEZ NOTRE SERVICE À VOS RISQUES ET PÉRILS.<br><br>
                        SI VOUS N'ACCEPTEZ PAS CES CONDITIONS, N'UTILISEZ PAS NOTRE PLATEFORME.
                    </span>
                    <span class="lang-content en">
                        JE CONFIE IS NOT A CARRIER.<br>
                        WE GUARANTEE NOTHING.<br>
                        WE ARE RESPONSIBLE FOR NOTHING.<br>
                        YOU USE OUR SERVICE AT YOUR OWN RISK.<br><br>
                        IF YOU DO NOT ACCEPT THESE CONDITIONS, DO NOT USE OUR PLATFORM.
                    </span>
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