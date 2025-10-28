<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions Générales de Vente - Je confie</title>
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

        .article-content ul,
        .article-content ol {
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
            <span class="lang-content fr active">Conditions Générales de Vente</span>
            <span class="lang-content en">Terms of Sale</span>
        </h1>
        <p class="hero-subtitle">
            <span class="lang-content fr active">CGV de la plateforme Je confie - Dernière mise à jour : Décembre 2024</span>
            <span class="lang-content en">Terms of Sale - Last updated: December 2024</span>
        </p>
    </section>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-card">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="lang-content fr active">Conditions Générales de Vente</span>
                    <span class="lang-content en">Terms of Sale</span>
                </h2>
                <p class="section-subtitle">
                    <span class="lang-content fr active">En vigueur au 1er décembre 2024</span>
                    <span class="lang-content en">Effective as of December 1, 2024</span>
                </p>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">1</span>
                    <span class="lang-content fr active">Services Proposés</span>
                    <span class="lang-content en">Services Offered</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">JE CONFIE propose un <strong>service d'intermédiation technique</strong> permettant :</span>
                        <span class="lang-content en">JE CONFIE offers a <strong>technical intermediation service</strong> allowing:</span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active">La publication d'annonces de transport</span>
                            <span class="lang-content en">Publication of transport listings</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">La mise en relation entre utilisateurs</span>
                            <span class="lang-content en">Connection between users</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">La sécurisation des paiements via Mollie</span>
                            <span class="lang-content en">Secure payments via Mollie</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">La vérification d'identité via Twilio</span>
                            <span class="lang-content en">Identity verification via Twilio</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">2</span>
                    <span class="lang-content fr active">Processus de Transaction</span>
                    <span class="lang-content en">Transaction Process</span>
                </h3>
                <div class="article-content">
                    <div class="highlight-box">
                        <div class="highlight-box-title">
                            📋 <span class="lang-content fr active">Étapes de la transaction</span>
                            <span class="lang-content en">Transaction steps</span>
                        </div>
                        <ol>
                            <li>
                                <span class="lang-content fr active"><strong>Publication :</strong> L'expéditeur publie son annonce</span>
                                <span class="lang-content en"><strong>Publication:</strong> Sender publishes their listing</span>
                            </li>
                            <li>
                                <span class="lang-content fr active"><strong>Acceptation :</strong> Un transporteur accepte la mission</span>
                                <span class="lang-content en"><strong>Acceptance:</strong> A carrier accepts the mission</span>
                            </li>
                            <li>
                                <span class="lang-content fr active"><strong>Paiement sécurisé :</strong> Fonds bloqués en séquestre via Mollie</span>
                                <span class="lang-content en"><strong>Secure payment:</strong> Funds held in escrow via Mollie</span>
                            </li>
                            <li>
                                <span class="lang-content fr active"><strong>Transport :</strong> Exécution du transport (hors responsabilité JE CONFIE)</span>
                                <span class="lang-content en"><strong>Transport:</strong> Transport execution (outside JE CONFIE liability)</span>
                            </li>
                            <li>
                                <span class="lang-content fr active"><strong>Confirmation :</strong> Validation de la livraison</span>
                                <span class="lang-content en"><strong>Confirmation:</strong> Delivery validation</span>
                            </li>
                            <li>
                                <span class="lang-content fr active"><strong>Déblocage :</strong> Libération des fonds après 48h</span>
                                <span class="lang-content en"><strong>Release:</strong> Funds release after 48h</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">3</span>
                    <span class="lang-content fr active">Tarification et Commission</span>
                    <span class="lang-content en">Pricing and Commission</span>
                </h3>
                <div class="article-content">
                    <div class="info-box">
                        <div class="info-box-title">
                            💰 <span class="lang-content fr active">Structure tarifaire</span>
                            <span class="lang-content en">Pricing structure</span>
                        </div>
                        <p>
                            <span class="lang-content fr active">
                                • <strong>Commission JE CONFIE :</strong> 15% à 20% HT du montant de la transaction
                                <br>• <strong>TVA :</strong> 20% applicable sur la commission
                                <br>• <strong>Mode Réservation :</strong> Prix fixé au kilogramme par le transporteur
                                <br>• <strong>Mode Co-transport :</strong> Prix forfaitaire négociable
                                <br>• <strong>Frais de paiement :</strong> Inclus dans la commission
                                <br>• <strong>Pas de frais cachés :</strong> Tout est affiché avant validation
                            </span>
                            <span class="lang-content en">
                                • <strong>JE CONFIE Commission:</strong> 15% to 20% excluding VAT of transaction amount
                                <br>• <strong>VAT:</strong> 20% applicable on commission
                                <br>• <strong>Reservation Mode:</strong> Price set per kilogram by carrier
                                <br>• <strong>Co-transport Mode:</strong> Negotiable package price
                                <br>• <strong>Payment fees:</strong> Included in commission
                                <br>• <strong>No hidden fees:</strong> Everything displayed before validation
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">4</span>
                    <span class="lang-content fr active">Paiement Sécurisé</span>
                    <span class="lang-content en">Secure Payment</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            <strong>Partenaire de paiement :</strong> Mollie B.V., établissement de paiement agréé par la Banque Centrale des Pays-Bas
                            <br><br>
                            <strong>Principe du séquestre :</strong> Les fonds sont conservés par Mollie jusqu'à confirmation de livraison. JE CONFIE ne détient jamais les fonds des utilisateurs directement.
                            <br><br>
                            <strong>Moyens de paiement acceptés :</strong>
                        </span>
                        <span class="lang-content en">
                            <strong>Payment partner:</strong> Mollie B.V., payment institution licensed by the Dutch Central Bank
                            <br><br>
                            <strong>Escrow principle:</strong> Funds are held by Mollie until delivery confirmation. JE CONFIE never holds user funds directly.
                            <br><br>
                            <strong>Accepted payment methods:</strong>
                        </span>
                    </p>
                    <ul>
                        <li>Carte bancaire (Visa, Mastercard)</li>
                        <li>Virement SEPA</li>
                        <li>PayPal</li>
                        <li>Apple Pay / Google Pay</li>
                    </ul>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">5</span>
                    <span class="lang-content fr active">Annulation et Remboursement</span>
                    <span class="lang-content en">Cancellation and Refund</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active"><strong>Conditions d'annulation :</strong></span>
                        <span class="lang-content en"><strong>Cancellation conditions:</strong></span>
                    </p>
                    <ul>
                        <li>
                            <span class="lang-content fr active"><strong>Avant acceptation :</strong> Annulation gratuite et sans frais</span>
                            <span class="lang-content en"><strong>Before acceptance:</strong> Free cancellation without fees</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Après acceptation :</strong> Frais de 10% du montant total</span>
                            <span class="lang-content en"><strong>After acceptance:</strong> 10% fee of total amount</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Non-livraison :</strong> Remboursement intégral sous 7 jours ouvrés</span>
                            <span class="lang-content en"><strong>Non-delivery:</strong> Full refund within 7 business days</span>
                        </li>
                        <li>
                            <span class="lang-content fr active"><strong>Litige :</strong> Fonds bloqués maximum 14 jours</span>
                            <span class="lang-content en"><strong>Dispute:</strong> Funds blocked for maximum 14 days</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">6</span>
                    <span class="lang-content fr active">Absence d'Assurance</span>
                    <span class="lang-content en">Absence of Insurance</span>
                </h3>
                <div class="article-content">
                    <div class="danger-box">
                        <div class="danger-box-title">
                            🚫 <span class="lang-content fr active">AUCUNE ASSURANCE FOURNIE</span>
                            <span class="lang-content en">NO INSURANCE PROVIDED</span>
                        </div>
                        <p>
                            <span class="lang-content fr active">
                                <strong>JE CONFIE NE PROPOSE ACTUELLEMENT AUCUNE ASSURANCE.</strong>
                                <br>Les utilisateurs transportent et expédient à leurs propres risques.
                                <br>Il est FORTEMENT RECOMMANDÉ de souscrire une assurance personnelle.
                                <br>Cette option est en cours de négociation et pourra être proposée ultérieurement.
                            </span>
                            <span class="lang-content en">
                                <strong>JE CONFIE CURRENTLY OFFERS NO INSURANCE.</strong>
                                <br>Users transport and ship at their own risk.
                                <br>It is STRONGLY RECOMMENDED to take out personal insurance.
                                <br>This option is being negotiated and may be offered later.
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">7</span>
                    <span class="lang-content fr active">Gestion des Litiges</span>
                    <span class="lang-content en">Dispute Management</span>
                </h3>
                <div class="article-content">
                    <div class="warning-box">
                        <div class="warning-box-title">
                            ⚠️ <span class="lang-content fr active">IMPORTANT - Gestion des litiges</span>
                            <span class="lang-content en">IMPORTANT - Dispute management</span>
                        </div>
                        <p>
                            <span class="lang-content fr active">
                                JE CONFIE n'intervient PAS dans les litiges entre utilisateurs. En cas de désaccord :
                                <br>• Les utilisateurs doivent régler leurs différends directement
                                <br>• Nous pouvons fournir les informations de contact
                                <br>• Les fonds restent bloqués maximum 14 jours en cas de litige signalé
                                <br>• Passé ce délai, les fonds sont libérés au transporteur
                                <br>• Les tribunaux de Lyon sont seuls compétents
                            </span>
                            <span class="lang-content en">
                                JE CONFIE does NOT intervene in disputes between users. In case of disagreement:
                                <br>• Users must resolve their differences directly
                                <br>• We can provide contact information
                                <br>• Funds remain blocked for maximum 14 days if dispute reported
                                <br>• After this period, funds are released to the carrier
                                <br>• Lyon courts have sole jurisdiction
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">8</span>
                    <span class="lang-content fr active">Facturation</span>
                    <span class="lang-content en">Invoicing</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            Une facture est automatiquement générée pour chaque transaction :
                            <br>• Commission : 15-20% HT du montant de la transaction
                            <br>• TVA : 20% sur la commission (TVA FR60988109625)
                            <br>• Facture envoyée par email sous 48h
                            <br>• Disponible dans l'espace utilisateur
                            <br>• Conforme aux exigences fiscales françaises et européennes
                        </span>
                        <span class="lang-content en">
                            An invoice is automatically generated for each transaction:
                            <br>• Commission: 15-20% excluding VAT of transaction amount
                            <br>• VAT: 20% on commission (VAT FR60988109625)
                            <br>• Invoice sent by email within 48h
                            <br>• Available in user area
                            <br>• Compliant with French and European tax requirements
                        </span>
                    </p>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">9</span>
                    <span class="lang-content fr active">Droit de Rétractation</span>
                    <span class="lang-content en">Right of Withdrawal</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            Conformément à l'article L221-28 du Code de la consommation, le droit de rétractation ne s'applique pas aux services de transport de colis dont l'exécution a commencé avec l'accord du consommateur.
                            <br><br>
                            Le service est considéré comme commencé dès l'acceptation de la mission par un transporteur.
                        </span>
                        <span class="lang-content en">
                            In accordance with Article L221-28 of the Consumer Code, the right of withdrawal does not apply to package transport services whose execution has begun with the consumer's agreement.
                            <br><br>
                            The service is considered started as soon as the mission is accepted by a carrier.
                        </span>
                    </p>
                </div>
            </div>

            <div class="article">
                <h3 class="article-title">
                    <span class="article-number">10</span>
                    <span class="lang-content fr active">Modification des CGV</span>
                    <span class="lang-content en">Modification of Terms</span>
                </h3>
                <div class="article-content">
                    <p>
                        <span class="lang-content fr active">
                            JE CONFIE se réserve le droit de modifier les présentes CGV à tout moment. Les modifications entrent en vigueur dès leur publication sur le site. L'utilisation continue de la plateforme après modification vaut acceptation des nouvelles conditions.
                        </span>
                        <span class="lang-content en">
                            JE CONFIE reserves the right to modify these Terms at any time. Changes take effect upon publication on the site. Continued use of the platform after modification constitutes acceptance of the new conditions.
                        </span>
                    </p>
                </div>
            </div>

            <div class="footer-info">
                <p>
                    <span class="lang-content fr active">
                        Pour toute question concernant nos conditions de vente, contactez-nous à : <br>
                        <strong>contact@jeconfie.fr</strong> ou <strong>+33 07 55 25 80 23</strong>
                        <br><br>
                        FRANCK JUBEL LOEMBET<br>
                        SIRET : 988 109 625 00018<br>
                        TVA Intracommunautaire : FR60988109625
                    </span>
                    <span class="lang-content en">
                        For any questions about our terms of sale, contact us at: <br>
                        <strong>contact@jeconfie.fr</strong> or <strong>+33 07 55 25 80 23</strong>
                        <br><br>
                        FRANCK JUBEL LOEMBET<br>
                        SIRET: 988 109 625 00018<br>
                        Intra-community VAT: FR60988109625
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