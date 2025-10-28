<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Je confie</title>
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
            padding: 120px 20px 60px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -400px;
            right: -200px;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 3vw, 1.25rem);
            opacity: 0.95;
        }

        /* Main Container */
        .main-container {
            max-width: 1280px;
            margin: -40px auto 60px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        /* Contact Options */
        .contact-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .contact-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 32px;
            text-align: center;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .contact-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 20px;
        }

        .contact-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .contact-info {
            color: var(--gray);
            margin-bottom: 8px;
        }

        .contact-detail {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            display: block;
            margin-bottom: 4px;
        }

        .contact-detail:hover {
            text-decoration: underline;
        }

        /* Form Section */
        .form-section {
            background: white;
            border-radius: var(--radius-xl);
            padding: clamp(24px, 5vw, 48px);
            box-shadow: var(--shadow-lg);
            margin-bottom: 40px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* Form Layout */
        .form-grid {
            display: grid;
            gap: 24px;
            margin-bottom: 32px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 14px;
        }

        .required {
            color: var(--danger);
        }

        .form-input {
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .form-select {
            appearance: none;
            background: white url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E") no-repeat right 16px center;
            padding-right: 40px;
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        /* Subject Tags */
        .subject-tags {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .subject-tag {
            padding: 10px 20px;
            background: var(--light);
            border-radius: 100px;
            border: 2px solid var(--border);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .subject-tag:hover {
            background: white;
            border-color: var(--primary);
        }

        .subject-tag.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Legal Notice */
        .legal-notice {
            background: #fef3c7;
            border-left: 4px solid var(--warning);
            padding: 20px;
            border-radius: var(--radius);
            margin-bottom: 24px;
        }

        .legal-notice-title {
            font-weight: 700;
            color: var(--warning);
            margin-bottom: 8px;
        }

        /* Office Section */
        .office-section {
            background: white;
            border-radius: var(--radius-xl);
            padding: clamp(24px, 5vw, 48px);
            box-shadow: var(--shadow-lg);
            margin-bottom: 40px;
        }

        .office-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .office-title {
            font-size: clamp(1.5rem, 4vw, 1.75rem);
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .office-grid {
            display: grid;
            gap: 24px;
        }

        .office-card {
            background: var(--light);
            border-radius: var(--radius-lg);
            padding: 32px;
            position: relative;
            overflow: hidden;
        }

        .office-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
        }

        .office-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .office-details {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .office-detail {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: var(--gray);
            font-size: 14px;
        }

        .office-detail-icon {
            color: var(--primary);
            font-size: 18px;
            flex-shrink: 0;
        }

        /* Submit Button */
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
            width: 100%;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Response Times */
        .response-times {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(6, 182, 212, 0.05));
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 40px;
        }

        .response-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            text-align: center;
        }

        .response-item {
            padding: 20px;
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
        }

        .response-time {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .response-label {
            color: var(--gray);
            font-size: 14px;
            margin-top: 8px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .contact-options {
                grid-template-columns: 1fr;
            }
            
            .response-grid {
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
        <div class="hero-content">
            <h1 class="hero-title">
                <span class="lang-content fr active">Contactez-nous</span>
                <span class="lang-content en">Contact Us</span>
            </h1>
            <p class="hero-subtitle">
                <span class="lang-content fr active">Notre équipe est à votre disposition pour répondre à vos questions</span>
                <span class="lang-content en">Our team is available to answer your questions</span>
            </p>
        </div>
    </section>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Contact Options -->
        <div class="contact-options">
            <div class="contact-card">
                <div class="contact-icon">📞</div>
                <h3 class="contact-title">
                    <span class="lang-content fr active">Téléphone</span>
                    <span class="lang-content en">Phone</span>
                </h3>
                <p class="contact-info">
                    <span class="lang-content fr active">Lun-Ven 9h-18h</span>
                    <span class="lang-content en">Mon-Fri 9am-6pm</span>
                </p>
                <a href="tel:+33755258023" class="contact-detail">Support: +33 07 55 25 80 23</a>
                <a href="tel:+33631676744" class="contact-detail">Gestion: +33 06 31 67 67 44</a>
            </div>

            <div class="contact-card">
                <div class="contact-icon">✉️</div>
                <h3 class="contact-title">Email</h3>
                <p class="contact-info">
                    <span class="lang-content fr active">Réponse sous 24h</span>
                    <span class="lang-content en">Response within 24h</span>
                </p>
                <a href="mailto:contact@jeconfie.fr" class="contact-detail">contact@jeconfie.fr</a>
                <a href="mailto:support@jeconfie.fr" class="contact-detail">support@jeconfie.fr</a>
                <a href="mailto:gestion@jeconfie.fr" class="contact-detail">gestion@jeconfie.fr</a>
            </div>

            <div class="contact-card">
                <div class="contact-icon">🔒</div>
                <h3 class="contact-title">
                    <span class="lang-content fr active">Protection des données</span>
                    <span class="lang-content en">Data Protection</span>
                </h3>
                <p class="contact-info">
                    <span class="lang-content fr active">DPO disponible</span>
                    <span class="lang-content en">DPO available</span>
                </p>
                <a href="mailto:dpo@jeconfie.fr" class="contact-detail">dpo@jeconfie.fr</a>
                <span class="contact-detail">RGPD / GDPR</span>
            </div>
        </div>

        <!-- Response Times -->
        <div class="response-times">
            <div class="response-grid">
                <div class="response-item">
                    <div class="response-time">2min</div>
                    <div class="response-label">
                        <span class="lang-content fr active">Chat en direct</span>
                        <span class="lang-content en">Live chat</span>
                    </div>
                </div>
                <div class="response-item">
                    <div class="response-time">24h</div>
                    <div class="response-label">
                        <span class="lang-content fr active">Email</span>
                        <span class="lang-content en">Email</span>
                    </div>
                </div>
                <div class="response-item">
                    <div class="response-time">15min</div>
                    <div class="response-label">
                        <span class="lang-content fr active">Téléphone</span>
                        <span class="lang-content en">Phone</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="form-section">
            <div class="form-header">
                <h2 class="form-title">
                    <span class="lang-content fr active">Formulaire de contact</span>
                    <span class="lang-content en">Contact Form</span>
                </h2>
                <p class="form-subtitle">
                    <span class="lang-content fr active">Remplissez le formulaire ci-dessous pour nous contacter</span>
                    <span class="lang-content en">Fill out the form below to contact us</span>
                </p>
            </div>

            <div class="legal-notice">
                <div class="legal-notice-title">
                    ⚠️ <span class="lang-content fr active">Avis Important</span>
                    <span class="lang-content en">Important Notice</span>
                </div>
                <p>
                    <span class="lang-content fr active">
                        JE CONFIE est une plateforme d'intermédiation. Nous ne sommes pas responsables des litiges entre utilisateurs. Pour tout litige concernant un transport, veuillez d'abord contacter directement l'autre partie.
                    </span>
                    <span class="lang-content en">
                        JE CONFIE is an intermediation platform. We are not responsible for disputes between users. For any transport dispute, please first contact the other party directly.
                    </span>
                </p>
            </div>

            <form id="contactForm">
                <!-- Subject Selection -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Sujet de votre demande</span>
                        <span class="lang-content en">Subject of your request</span>
                        <span class="required">*</span>
                    </label>
                    <div class="subject-tags">
                        <div class="subject-tag active" onclick="selectSubject(this)">
                            📦 <span class="lang-content fr active">Problème technique</span>
                            <span class="lang-content en">Technical issue</span>
                        </div>
                        <div class="subject-tag" onclick="selectSubject(this)">
                            💳 <span class="lang-content fr active">Paiement</span>
                            <span class="lang-content en">Payment</span>
                        </div>
                        <div class="subject-tag" onclick="selectSubject(this)">
                            👤 <span class="lang-content fr active">Mon compte</span>
                            <span class="lang-content en">My account</span>
                        </div>
                        <div class="subject-tag" onclick="selectSubject(this)">
                            🔒 <span class="lang-content fr active">RGPD/Données</span>
                            <span class="lang-content en">GDPR/Data</span>
                        </div>
                        <div class="subject-tag" onclick="selectSubject(this)">
                            ⚠️ <span class="lang-content fr active">Signalement</span>
                            <span class="lang-content en">Report</span>
                        </div>
                        <div class="subject-tag" onclick="selectSubject(this)">
                            💼 <span class="lang-content fr active">Partenariat</span>
                            <span class="lang-content en">Partnership</span>
                        </div>
                        <div class="subject-tag" onclick="selectSubject(this)">
                            ❓ <span class="lang-content fr active">Autre</span>
                            <span class="lang-content en">Other</span>
                        </div>
                    </div>
                </div>

                <div class="form-grid">
                    <!-- Personal Information -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Prénom</span>
                                <span class="lang-content en">First name</span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Nom</span>
                                <span class="lang-content en">Last name</span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                Email <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Téléphone</span>
                                <span class="lang-content en">Phone</span>
                            </label>
                            <input type="tel" class="form-input">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Vous êtes</span>
                                <span class="lang-content en">You are</span>
                                <span class="required">*</span>
                            </label>
                            <select class="form-input form-select" required>
                                <option value="">
                                    <span class="lang-content fr active">Choisir...</span>
                                    <span class="lang-content en">Choose...</span>
                                </option>
                                <option value="sender">
                                    <span class="lang-content fr active">Expéditeur</span>
                                    <span class="lang-content en">Sender</span>
                                </option>
                                <option value="carrier">
                                    <span class="lang-content fr active">Transporteur</span>
                                    <span class="lang-content en">Carrier</span>
                                </option>
                                <option value="both">
                                    <span class="lang-content fr active">Les deux</span>
                                    <span class="lang-content en">Both</span>
                                </option>
                                <option value="prospect">
                                    <span class="lang-content fr active">Futur utilisateur</span>
                                    <span class="lang-content en">Future user</span>
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Numéro de transaction</span>
                                <span class="lang-content en">Transaction number</span>
                            </label>
                            <input type="text" class="form-input" placeholder="#JC-2024-XXXX">
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Votre message</span>
                            <span class="lang-content en">Your message</span>
                            <span class="required">*</span>
                        </label>
                        <textarea class="form-input form-textarea" required></textarea>
                    </div>

                    <!-- GDPR Consent -->
                    <div class="form-group">
                        <label style="display: flex; align-items: start; gap: 8px; cursor: pointer;">
                            <input type="checkbox" required style="margin-top: 4px;">
                            <span style="font-size: 14px; color: var(--gray);">
                                <span class="lang-content fr active">
                                    J'accepte que mes données soient traitées conformément à la <a href="/rgpd" style="color: var(--primary);">politique de confidentialité</a>
                                </span>
                                <span class="lang-content en">
                                    I agree that my data will be processed in accordance with the <a href="/rgpd" style="color: var(--primary);">privacy policy</a>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary">
                    <span>📤</span>
                    <span class="lang-content fr active">Envoyer le message</span>
                    <span class="lang-content en">Send message</span>
                </button>
            </form>
        </div>

        <!-- Office Information -->
        <div class="office-section">
            <div class="office-header">
                <h2 class="office-title">
                    <span class="lang-content fr active">Informations légales</span>
                    <span class="lang-content en">Legal Information</span>
                </h2>
            </div>
            <div class="office-grid">
                <div class="office-card">
                    <h3 class="office-name">
                        <span class="lang-content fr active">Siège Social</span>
                        <span class="lang-content en">Headquarters</span>
                    </h3>
                    <div class="office-details">
                        <div class="office-detail">
                            <span class="office-detail-icon">🏢</span>
                            <span>
                                <strong>FRANCK JUBEL LOEMBET</strong><br>
                                <span class="lang-content fr active">Entrepreneur individuel</span>
                                <span class="lang-content en">Individual entrepreneur</span>
                            </span>
                        </div>
                        <div class="office-detail">
                            <span class="office-detail-icon">📍</span>
                            <span>32 Avenue Francis de Pressensé<br>69200 Vénissieux<br>France</span>
                        </div>
                        <div class="office-detail">
                            <span class="office-detail-icon">📄</span>
                            <span>
                                SIRET: 988 109 625 00018<br>
                                TVA: FR60988109625<br>
                                APE: 6312Z
                            </span>
                        </div>
                        <div class="office-detail">
                            <span class="office-detail-icon">📞</span>
                            <span>
                                Support: +33 07 55 25 80 23<br>
                                Gestion: +33 06 31 67 67 44
                            </span>
                        </div>
                        <div class="office-detail">
                            <span class="office-detail-icon">📧</span>
                            <span>
                                contact@jeconfie.fr<br>
                                support@jeconfie.fr<br>
                                dpo@jeconfie.fr
                            </span>
                        </div>
                        <div class="office-detail">
                            <span class="office-detail-icon">⏰</span>
                            <span>
                                <span class="lang-content fr active">Lun-Ven : 9h-18h</span>
                                <span class="lang-content en">Mon-Fri: 9am-6pm</span>
                            </span>
                        </div>
                    </div>
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

        // Select subject
        function selectSubject(element) {
            document.querySelectorAll('.subject-tag').forEach(tag => {
                tag.classList.remove('active');
            });
            element.classList.add('active');
        }

        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const lang = document.querySelector('.lang-btn.active').textContent;
            alert(lang === 'FR' 
                ? 'Message envoyé ! Nous vous répondrons dans les plus brefs délais.'
                : 'Message sent! We will respond as soon as possible.');
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