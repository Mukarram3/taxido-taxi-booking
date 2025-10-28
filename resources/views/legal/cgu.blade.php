<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions Générales d'Utilisation - Je confie</title>
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

        .article-number {
            display: inline-flex;
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .article-content {
            color: var(--gray);
            line-height: 1.8;
            margin-left: 40px;
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

        .highlight-box {
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.05), rgba(5, 150, 105, 0.05));
            border-left: 4px solid var(--primary);
            padding: 20px;
            border-radius: var(--radius);
            margin: 24px 0;
        }

        .highlight-box-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 8px;
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

        .danger-box {
            background: #fee2e2;
            border-left: 4px solid var(--danger);
            padding: 20px;
            border-radius: var(--radius);
            margin: 24px 0;
        }

        .danger-box-title {
            font-weight: 700;
            color: var(--danger);
            margin-bottom: 8px;
        }

        .info-box {
            background: #dbeafe;
            border-left: 4px solid var(--secondary);
            padding: 20px;
            border-radius: var(--radius);
            margin: 24px 0;
        }

        .info-box-title {
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 8px;
        }

        .footer-info {
            margin-top: 48px;
            padding-top: 32px;
            border-top: 2px solid var(--border);
            text-align: center;
            color: var(--gray);
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

        @media (max-width: 768px) {
            .article-content {
                margin-left: 0;
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
            <span class="lang-content fr active">Conditions Générales d'Utilisation</span>
            <span class="lang-content en">Terms of Service</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">CGU de la plateforme Je confie - Dernière mise à jour : Décembre 2024</span>
            <span class="lang-content en">Terms of Service - Last updated: December 2024</span>
        </p>
    </section>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-card">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="lang-content fr active">Conditions Générales d'Utilisation</span>
                    <span class="lang-content en">Terms of Service</span>
                </h2>
                <p class="section-subtitle">
                    <span class="lang-content fr active">En vigueur au 1er décembre 2024</span>
                    <span class="lang-content en">Effective as of December 1, 2024</span>
                </p>
            </div>

            <div class="danger-box">
                <div class="danger-box-title">
                    🚨 <span class="lang-content fr active">AVERTISSEMENT CRUCIAL - LIMITATION TOTALE DE RESPONSABILITÉ</span>
                    <span class="lang-content en">CRITICAL WARNING - COMPLETE LIMITATION OF LIABILITY</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        <strong>JE CONFIE EST UNE PLATEFORME D'INTERMÉDIATION PURE.</strong> Nous ne sommes PAS un transporteur, NI un commissionnaire de transport. Nous mettons uniquement en relation des particuliers. <strong>NOUS DÉCLINONS TOUTE RESPONSABILITÉ</strong> concernant :
                        <br>• L'exécution du transport
                        <br>• Les dommages, pertes, vols ou retards
                        <br>• La conformité légale des marchandises transportées
                        <br>• Les litiges entre utilisateurs
                        <br>• Les accidents ou dommages corporels
                        <br>• Le respect de la réglementation douanière et fiscale
                        <br>
                        <strong>EN UTILISANT NOTRE PLATEFORME, VOUS ACCEPTEZ CETTE LIMITATION TOTALE DE RESPONSABILITÉ.</strong>
                    </span>
                    <span class="lang-content en">
                        <strong>JE CONFIE IS A PURE INTERMEDIATION PLATFORM.</strong> We are NOT a carrier, NOR a freight forwarder. We only connect individuals. <strong>WE DECLINE ALL LIABILITY</strong> regarding:
                        <br>• Transport execution
                        <br>• Damage, loss, theft or delays
                        <br>• Legal compliance of transported goods
                        <br>• Disputes between users
                        <br>• Accidents or personal injury
                        <br>• Compliance with customs and tax regulations
                        <br>
                        <strong>BY USING OUR PLATFORM, YOU ACCEPT THIS COMPLETE LIMITATION OF LIABILITY.</strong>
                    </span>
                </p>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">1</span>
                    <span class="lang-content fr active">Objet et Acceptation</span>
                    <span class="lang-content en">Purpose and Acceptance</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            Les présentes CGU régissent l'utilisation de la plateforme JE CONFIE, exploitée par FRANCK JUBEL LOEMBET, entrepreneur individuel (SIRET: 988 109 625 00018).
                            <br><br>
                            <strong>L'utilisation de la plateforme vaut acceptation sans réserve des présentes CGU.</strong> Si vous n'acceptez pas ces conditions, vous devez cesser immédiatement d'utiliser nos services.
                        </span>
                        <span class="lang-content en">
                            These Terms of Service govern the use of the JE CONFIE platform, operated by FRANCK JUBEL LOEMBET, individual entrepreneur (SIRET: 988 109 625 00018).
                            <br><br>
                            <strong>Using the platform constitutes unreserved acceptance of these Terms.</strong> If you do not accept these conditions, you must immediately stop using our services.
                        </span>
                    </p>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">2</span>
                    <span class="lang-content fr active">Nature de l'Intermédiation</span>
                    <span class="lang-content en">Nature of Intermediation</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            JE CONFIE est <strong>exclusivement</strong> une plateforme technique de mise en relation entre :
                        </span>
                        <span class="lang-content en">
                            JE CONFIE is <strong>exclusively</strong> a technical platform connecting:
                        </span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active"><strong>Expéditeurs :</strong> Particuliers souhaitant envoyer des colis</span>
                            <span class="lang-content en"><strong>Senders:</strong> Individuals wishing to send packages</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Transporteurs :</strong> Voyageurs ou conducteurs disposant d'espace de transport</span>
                            <span class="lang-content en"><strong>Carriers:</strong> Travelers or drivers with transport space</span>
                        </li>
                    </ul>
                    <p>
                        <span class="lang-content fr active">
                            <strong>IMPORTANT :</strong> JE CONFIE n'est partie à aucun contrat de transport. Les contrats sont conclus directement entre utilisateurs, sous leur entière responsabilité.
                        </span>
                        <span class="lang-content en">
                            <strong>IMPORTANT:</strong> JE CONFIE is not party to any transport contract. Contracts are concluded directly between users, under their full responsibility.
                        </span>
                    </p>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">3</span>
                    <span class="lang-content fr active">Exclusion de Responsabilité</span>
                    <span class="lang-content en">Exclusion of Liability</span>
                </h3>
                <div class="article-content">
                    <div class="warning-box">
                        <div class="warning-box-title">
                            ⚠️ <span class="lang-content fr active">JE CONFIE NE PEUT ÊTRE TENU RESPONSABLE DE :</span>
                            <span class="lang-content en">JE CONFIE CANNOT BE HELD LIABLE FOR:</span>
                        </div>
                        <ul>
                            <li>
                                <span class="lang-content fr active">La qualité, ponctualité ou exécution du transport</span>
                                <span class="lang-content en">Quality, punctuality or execution of transport</span>
                            </li>
                            <li>
                                <span class="lang-content fr active">Les dommages, pertes, détériorations ou vols de marchandises</span>
                                <span class="lang-content en">Damage, loss, deterioration or theft of goods</span>
                            </li>
                            <li>
                                <span class="lang-content fr active">Les retards de livraison ou non-livraison</span>
                                <span class="lang-content en">Delivery delays or non-delivery</span>
                            </li>
                            <li>
                                <span class="lang-content fr active">Le contenu illégal ou non conforme des colis</span>
                                <span class="lang-content en">Illegal or non-compliant package content</span>
                            </li>
                            <li>
                                <span class="lang-content fr active">Les accidents survenant durant le transport</span>
                                <span class="lang-content en">Accidents occurring during transport</span>
                            </li>
                            <li>
                                <span class="lang-content fr active">Les litiges entre utilisateurs</span>
                                <span class="lang-content en">Disputes between users</span>
                            </li>
                            <li>
                                <span class="lang-content fr active">Les violations de réglementation (douanière, fiscale, sanitaire)</span>
                                <span class="lang-content en">Regulatory violations (customs, tax, health)</span>
                            </li>
                            <li>
                                <span class="lang-content fr active">Les préjudices directs ou indirects subis par les utilisateurs</span>
                                <span class="lang-content en">Direct or indirect damages suffered by users</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">4</span>
                    <span class="lang-content fr active">Responsabilités des Utilisateurs</span>
                    <span class="lang-content en">User Responsibilities</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active"><strong>Les utilisateurs sont SEULS ET ENTIÈREMENT RESPONSABLES de :</strong></span>
                        <span class="lang-content en"><strong>Users are SOLELY AND ENTIRELY RESPONSIBLE for:</strong></span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active">La vérification de l'identité de leur cocontractant</span>
                            <span class="lang-content en">Verifying the identity of their counterparty</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">La conformité légale des marchandises transportées</span>
                            <span class="lang-content en">Legal compliance of transported goods</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Les déclarations douanières et fiscales</span>
                            <span class="lang-content en">Customs and tax declarations</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">La souscription d'assurances appropriées</span>
                            <span class="lang-content en">Taking out appropriate insurance</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Le respect de toute réglementation applicable</span>
                            <span class="lang-content en">Compliance with all applicable regulations</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">5</span>
                    <span class="lang-content fr active">Commission et Frais</span>
                    <span class="lang-content en">Commission and Fees</span>
                </h3>
                <div class="article-content">
                    <div class="info-box">
                        <div class="info-box-title">
                            💰 <span class="lang-content fr active">Structure tarifaire</span>
                            <span class="lang-content en">Pricing structure</span>
                        </div>
                        <p>
                            <span class="lang-content fr active">
                                • Commission de service : <strong>15% à 20% HT</strong> sur chaque transaction
                                <br>• Frais de traitement de paiement : inclus dans la commission
                                <br>• TVA applicable : 20% sur la commission
                                <br>• Aucuns frais d'inscription ou d'abonnement
                            </span>
                            <span class="lang-content en">
                                • Service commission: <strong>15% to 20% excluding VAT</strong> on each transaction
                                <br>• Payment processing fees: included in commission
                                <br>• Applicable VAT: 20% on commission
                                <br>• No registration or subscription fees
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">6</span>
                    <span class="lang-content fr active">Interdictions Formelles</span>
                    <span class="lang-content en">Strict Prohibitions</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active"><strong>Il est STRICTEMENT INTERDIT de transporter via notre plateforme :</strong></span>
                        <span class="lang-content en"><strong>It is STRICTLY PROHIBITED to transport via our platform:</strong></span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active">Substances illégales, stupéfiants, contrefaçons</span>
                            <span class="lang-content en">Illegal substances, narcotics, counterfeits</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Armes, explosifs, matières dangereuses</span>
                            <span class="lang-content en">Weapons, explosives, hazardous materials</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Animaux vivants</span>
                            <span class="lang-content en">Live animals</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Produits périssables sans accord préalable</span>
                            <span class="lang-content en">Perishable products without prior agreement</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Biens volés ou d'origine frauduleuse</span>
                            <span class="lang-content en">Stolen or fraudulently obtained goods</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">7</span>
                    <span class="lang-content fr active">Clause d'Indemnisation</span>
                    <span class="lang-content en">Indemnification Clause</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            <strong>L'utilisateur s'engage à indemniser et dégager de toute responsabilité JE CONFIE</strong>, ses dirigeants, employés et partenaires, contre toute réclamation, perte, dommage, responsabilité, coût et dépense (y compris les frais d'avocat) résultant de :
                            <br>• Son utilisation de la plateforme
                            <br>• Sa violation des présentes CGU
                            <br>• Sa violation de toute loi ou réglementation
                            <br>• Ses relations avec d'autres utilisateurs
                        </span>
                        <span class="lang-content en">
                            <strong>The user agrees to indemnify and hold harmless JE CONFIE</strong>, its officers, employees and partners, against any claim, loss, damage, liability, cost and expense (including attorney fees) resulting from:
                            <br>• Their use of the platform
                            <br>• Their violation of these Terms
                            <br>• Their violation of any law or regulation
                            <br>• Their relationships with other users
                        </span>
                    </p>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">8</span>
                    <span class="lang-content fr active">Droit Applicable et Juridiction</span>
                    <span class="lang-content en">Applicable Law and Jurisdiction</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            Les présentes CGU sont régies par le droit français. En cas de litige, une médiation sera tentée. À défaut d'accord, <strong>les tribunaux de Lyon seront seuls compétents</strong>, nonobstant pluralité de défendeurs ou appel en garantie.
                        </span>
                        <span class="lang-content en">
                            These Terms are governed by French law. In case of dispute, mediation will be attempted. Failing agreement, <strong>the courts of Lyon shall have sole jurisdiction</strong>, notwithstanding plurality of defendants or third-party claims.
                        </span>
                    </p>
                </div>
            </div>

            <div class="footer-info">
                <p>
                    <span class="lang-content fr active">
                        Pour toute question concernant nos conditions, contactez-nous à : <br>
                        <strong>contact@jeconfie.fr</strong> ou <strong>+33 07 55 25 80 23</strong>
                        <br><br>
                        FRANCK JUBEL LOEMBET - SIRET : 988 109 625 00018
                    </span>
                    <span class="lang-content en">
                        For any questions about our terms, contact us at: <br>
                        <strong>contact@jeconfie.fr</strong> or <strong>+33 07 55 25 80 23</strong>
                        <br><br>
                        FRANCK JUBEL LOEMBET - SIRET: 988 109 625 00018
                    </span>
                </p>
                <div style="margin-top: 24px;">
                    <a href="/contact" class="btn btn-primary">
                        <span class="lang-content fr active">Nous contacter</span>
                        <span class="lang-content en">Contact us</span>
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