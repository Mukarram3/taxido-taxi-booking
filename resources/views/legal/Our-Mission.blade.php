<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre Mission - Je confie</title>
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
            overflow-x: hidden;
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

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease forwards;
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
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            padding: 140px 20px 100px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '🌍';
            position: absolute;
            font-size: 300px;
            opacity: 0.1;
            top: -80px;
            left: -80px;
            animation: rotate 30s linear infinite;
        }

        .hero-section::after {
            content: '♻️';
            position: absolute;
            font-size: 250px;
            opacity: 0.1;
            bottom: -80px;
            right: -80px;
            animation: rotate 40s linear infinite reverse;
        }

        .hero-content {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            color: white;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 24px;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            opacity: 0.95;
            max-width: 800px;
            margin: 0 auto 40px;
        }

        .hero-description {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Mission Statement */
        .mission-statement {
            margin: -60px auto 80px;
            max-width: 1000px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .statement-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 48px;
            box-shadow: var(--shadow-xl);
            text-align: center;
            border: 3px solid var(--eco-green);
            animation: fadeInUp 0.8s ease forwards;
        }

        .statement-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 32px;
            font-size: 50px;
            color: white;
            animation: pulse 3s ease-in-out infinite;
        }

        .statement-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .statement-subtext {
            font-size: 1.1rem;
            color: var(--gray);
            line-height: 1.8;
        }

        /* Objectives Section */
        .objectives-section {
            padding: 80px 20px;
            background: var(--light);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
        }

        .objectives-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 32px;
        }

        .objective-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 40px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
        }

        .objective-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--eco-green), var(--primary));
        }

        .objective-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .objective-number {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.25rem;
            margin-bottom: 20px;
        }

        .objective-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .objective-description {
            color: var(--gray);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        /* Impact Section */
        .impact-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .impact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .impact-content {
            animation: slideInLeft 0.8s ease forwards;
        }

        .impact-title {
            font-size: clamp(2rem, 4vw, 2.5rem);
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 24px;
        }

        .impact-list {
            list-style: none;
        }

        .impact-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 24px;
            padding: 20px;
            background: var(--light);
            border-radius: var(--radius);
            transition: all 0.3s ease;
        }

        .impact-item:hover {
            background: white;
            box-shadow: var(--shadow);
        }

        .impact-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.1), rgba(80, 70, 229, 0.1));
            color: var(--eco-green);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .impact-text {
            flex: 1;
        }

        .impact-text strong {
            color: var(--dark);
            display: block;
            margin-bottom: 4px;
        }

        .impact-text span {
            color: var(--gray);
            font-size: 0.95rem;
        }

        .impact-visual {
            animation: slideInRight 0.8s ease forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }

        .impact-chart {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.05), rgba(80, 70, 229, 0.05));
            border-radius: var(--radius-xl);
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .impact-chart::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            opacity: 0.1;
            border-radius: 50%;
            top: -150px;
            right: -150px;
            animation: pulse 4s ease-in-out infinite;
        }

        .impact-stat {
            margin-bottom: 32px;
        }

        .impact-stat-value {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .impact-stat-label {
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* Vision Section */
        .vision-section {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            padding: 80px 20px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .vision-content {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .vision-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 32px;
        }

        .vision-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 32px;
            margin-top: 48px;
        }

        .vision-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-lg);
            padding: 32px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
        }

        .vision-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-4px);
        }

        .vision-card-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .vision-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .vision-card-text {
            opacity: 0.9;
            line-height: 1.8;
        }

        /* Commitment Section */
        .commitment-section {
            padding: 80px 20px;
            background: var(--light);
        }

        .commitment-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .commitment-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }

        .commitment-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 32px;
            text-align: center;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
            position: relative;
        }

        .commitment-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background: linear-gradient(90deg, var(--eco-green), var(--primary));
            border-radius: 2px;
        }

        .commitment-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .commitment-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.1), rgba(80, 70, 229, 0.1));
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
        }

        .commitment-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .commitment-text {
            color: var(--gray);
            line-height: 1.8;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 20px;
            text-align: center;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }

        .cta-subtitle {
            font-size: 1.25rem;
            color: var(--gray);
            margin-bottom: 40px;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 16px 32px;
            border-radius: var(--radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
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
            .objectives-grid {
                grid-template-columns: 1fr;
            }
            
            .impact-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .vision-grid {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .cta-buttons .btn {
                width: 100%;
                justify-content: center;
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
            <h1 class="hero-title fade-in-up">
                <span class="lang-content fr active">Notre Mission</span>
                <span class="lang-content en">Our Mission</span>
            </h1>
            <p class="hero-subtitle fade-in-up" style="animation-delay: 0.2s;">
                <span class="lang-content fr active">Transformer chaque trajet en opportunité solidaire et écologique</span>
                <span class="lang-content en">Transform every trip into a solidarity and ecological opportunity</span>
            </p>
            <p class="hero-description fade-in-up" style="animation-delay: 0.4s;">
                <span class="lang-content fr active">
                    Créer une communauté où l'entraide et l'écologie se rencontrent pour révolutionner le transport de colis
                </span>
                <span class="lang-content en">
                    Creating a community where mutual aid and ecology meet to revolutionize package delivery
                </span>
            </p>
        </div>
    </section>

    <!-- Mission Statement -->
    <section class="mission-statement">
        <div class="statement-card">
            <div class="statement-icon">🎯</div>
            <p class="statement-text">
                <span class="lang-content fr active">
                    "Faciliter et sécuriser la mise en relation entre particuliers pour le transport collaboratif de colis, en offrant une plateforme transparente, accessible et écologique"
                </span>
                <span class="lang-content en">
                    "Facilitate and secure connections between individuals for collaborative package transport, by offering a transparent, accessible and ecological platform"
                </span>
            </p>
            <p class="statement-subtext">
                <span class="lang-content fr active">
                    Nous croyons en un monde où chaque déplacement devient une opportunité de service mutuel, réduisant l'impact environnemental tout en créant du lien social.
                </span>
                <span class="lang-content en">
                    We believe in a world where every trip becomes an opportunity for mutual service, reducing environmental impact while creating social connections.
                </span>
            </p>
        </div>
    </section>

    <!-- Objectives Section -->
    <section class="objectives-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Nos Objectifs</span>
                <span class="lang-content en">Our Objectives</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Les piliers de notre action quotidienne</span>
                <span class="lang-content en">The pillars of our daily action</span>
            </p>
        </div>

        <div class="objectives-grid">
            <div class="objective-card" style="animation-delay: 0.1s;">
                <div class="objective-number">1</div>
                <h3 class="objective-title">
                    <span class="lang-content fr active">Démocratiser le transport</span>
                    <span class="lang-content en">Democratize transport</span>
                </h3>
                <p class="objective-description">
                    <span class="lang-content fr active">
                        Rendre le transport de colis accessible à tous en proposant des tarifs justes et transparents, sans frais cachés ni abonnement.
                    </span>
                    <span class="lang-content en">
                        Make package delivery accessible to everyone by offering fair and transparent prices, without hidden fees or subscriptions.
                    </span>
                </p>
            </div>

            <div class="objective-card" style="animation-delay: 0.2s;">
                <div class="objective-number">2</div>
                <h3 class="objective-title">
                    <span class="lang-content fr active">Sécuriser les échanges</span>
                    <span class="lang-content en">Secure exchanges</span>
                </h3>
                <p class="objective-description">
                    <span class="lang-content fr active">
                        Garantir des transactions sécurisées grâce à notre partenariat avec Mollie et notre système de vérification d'identité via Twilio.
                    </span>
                    <span class="lang-content en">
                        Guarantee secure transactions thanks to our partnership with Mollie and our identity verification system via Twilio.
                    </span>
                </p>
            </div>

            <div class="objective-card" style="animation-delay: 0.3s;">
                <div class="objective-number">3</div>
                <h3 class="objective-title">
                    <span class="lang-content fr active">Réduire l'empreinte carbone</span>
                    <span class="lang-content en">Reduce carbon footprint</span>
                </h3>
                <p class="objective-description">
                    <span class="lang-content fr active">
                        Optimiser les trajets existants pour diminuer le nombre de véhicules sur les routes et contribuer à un transport plus durable.
                    </span>
                    <span class="lang-content en">
                        Optimize existing trips to reduce the number of vehicles on the roads and contribute to more sustainable transport.
                    </span>
                </p>
            </div>

            <div class="objective-card" style="animation-delay: 0.4s;">
                <div class="objective-number">4</div>
                <h3 class="objective-title">
                    <span class="lang-content fr active">Créer du lien social</span>
                    <span class="lang-content en">Create social connections</span>
                </h3>
                <p class="objective-description">
                    <span class="lang-content fr active">
                        Favoriser l'entraide entre particuliers et créer une communauté basée sur la confiance et la solidarité.
                    </span>
                    <span class="lang-content en">
                        Promote mutual aid between individuals and create a community based on trust and solidarity.
                    </span>
                </p>
            </div>

            <div class="objective-card" style="animation-delay: 0.5s;">
                <div class="objective-number">5</div>
                <h3 class="objective-title">
                    <span class="lang-content fr active">Innover continuellement</span>
                    <span class="lang-content en">Continuously innovate</span>
                </h3>
                <p class="objective-description">
                    <span class="lang-content fr active">
                        Développer de nouvelles fonctionnalités pour améliorer l'expérience utilisateur et répondre aux besoins évolutifs de notre communauté.
                    </span>
                    <span class="lang-content en">
                        Develop new features to improve user experience and meet the evolving needs of our community.
                    </span>
                </p>
            </div>

            <div class="objective-card" style="animation-delay: 0.6s;">
                <div class="objective-number">6</div>
                <h3 class="objective-title">
                    <span class="lang-content fr active">Garantir la transparence</span>
                    <span class="lang-content en">Ensure transparency</span>
                </h3>
                <p class="objective-description">
                    <span class="lang-content fr active">
                        Être clair sur notre rôle d'intermédiaire, nos commissions et les responsabilités de chacun dans le processus de transport.
                    </span>
                    <span class="lang-content en">
                        Be clear about our role as intermediary, our commissions and everyone's responsibilities in the transport process.
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="impact-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Notre Impact</span>
                <span class="lang-content en">Our Impact</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Ensemble, nous construisons un avenir plus durable</span>
                <span class="lang-content en">Together, we're building a more sustainable future</span>
            </p>
        </div>

        <div class="impact-grid">
            <div class="impact-content">
                <h3 class="impact-title">
                    <span class="lang-content fr active">Un impact positif mesurable</span>
                    <span class="lang-content en">A measurable positive impact</span>
                </h3>
                
                <ul class="impact-list">
                    <li class="impact-item">
                        <div class="impact-icon">🌱</div>
                        <div class="impact-text">
                            <strong>
                                <span class="lang-content fr active">Réduction des émissions CO2</span>
                                <span class="lang-content en">CO2 emissions reduction</span>
                            </strong>
                            <span>
                                <span class="lang-content fr active">Chaque colis co-transporté évite un trajet supplémentaire</span>
                                <span class="lang-content en">Each co-transported package avoids an additional trip</span>
                            </span>
                        </div>
                    </li>
                    
                    <li class="impact-item">
                        <div class="impact-icon">💰</div>
                        <div class="impact-text">
                            <strong>
                                <span class="lang-content fr active">Économies pour les utilisateurs</span>
                                <span class="lang-content en">User savings</span>
                            </strong>
                            <span>
                                <span class="lang-content fr active">Des tarifs jusqu'à 50% moins chers que les solutions traditionnelles</span>
                                <span class="lang-content en">Rates up to 50% cheaper than traditional solutions</span>
                            </span>
                        </div>
                    </li>
                    
                    <li class="impact-item">
                        <div class="impact-icon">🤝</div>
                        <div class="impact-text">
                            <strong>
                                <span class="lang-content fr active">Communauté grandissante</span>
                                <span class="lang-content en">Growing community</span>
                            </strong>
                            <span>
                                <span class="lang-content fr active">Des milliers de connexions créées entre particuliers</span>
                                <span class="lang-content en">Thousands of connections created between individuals</span>
                            </span>
                        </div>
                    </li>
                    
                    <li class="impact-item">
                        <div class="impact-icon">📦</div>
                        <div class="impact-text">
                            <strong>
                                <span class="lang-content fr active">Optimisation des ressources</span>
                                <span class="lang-content en">Resource optimization</span>
                            </strong>
                            <span>
                                <span class="lang-content fr active">Valorisation des espaces de transport non utilisés</span>
                                <span class="lang-content en">Valorization of unused transport spaces</span>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="impact-visual">
                <div class="impact-chart">
                    <div class="impact-stat">
                        <div class="impact-stat-value">-70%</div>
                        <div class="impact-stat-label">
                            <span class="lang-content fr active">d'émissions CO2</span>
                            <span class="lang-content en">CO2 emissions</span>
                        </div>
                    </div>
                    <div class="impact-stat">
                        <div class="impact-stat-value">24/7</div>
                        <div class="impact-stat-label">
                            <span class="lang-content fr active">Disponibilité</span>
                            <span class="lang-content en">Availability</span>
                        </div>
                    </div>
                    <div class="impact-stat">
                        <div class="impact-stat-value">100%</div>
                        <div class="impact-stat-label">
                            <span class="lang-content fr active">Paiements sécurisés</span>
                            <span class="lang-content en">Secure payments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="vision-section">
        <div class="vision-content">
            <h2 class="vision-title">
                <span class="lang-content fr active">Notre Vision 2030</span>
                <span class="lang-content en">Our 2030 Vision</span>
            </h2>
            
            <div class="vision-grid">
                <div class="vision-card" style="animation-delay: 0.1s;">
                    <div class="vision-card-icon">🌍</div>
                    <h3 class="vision-card-title">
                        <span class="lang-content fr active">Leader européen</span>
                        <span class="lang-content en">European leader</span>
                    </h3>
                    <p class="vision-card-text">
                        <span class="lang-content fr active">
                            Devenir la référence du transport collaboratif en Europe
                        </span>
                        <span class="lang-content en">
                            Become the reference for collaborative transport in Europe
                        </span>
                    </p>
                </div>

                <div class="vision-card" style="animation-delay: 0.2s;">
                    <div class="vision-card-icon">🛡️</div>
                    <h3 class="vision-card-title">
                        <span class="lang-content fr active">Assurance intégrée</span>
                        <span class="lang-content en">Integrated insurance</span>
                    </h3>
                    <p class="vision-card-text">
                        <span class="lang-content fr active">
                            Proposer une assurance complète pour tous les envois
                        </span>
                        <span class="lang-content en">
                            Offer comprehensive insurance for all shipments
                        </span>
                    </p>
                </div>

                <div class="vision-card" style="animation-delay: 0.3s;">
                    <div class="vision-card-icon">🚀</div>
                    <h3 class="vision-card-title">
                        <span class="lang-content fr active">1 million d'utilisateurs</span>
                        <span class="lang-content en">1 million users</span>
                    </h3>
                    <p class="vision-card-text">
                        <span class="lang-content fr active">
                            Créer une communauté massive et engagée
                        </span>
                        <span class="lang-content en">
                            Create a massive and engaged community
                        </span>
                    </p>
                </div>

                <div class="vision-card" style="animation-delay: 0.4s;">
                    <div class="vision-card-icon">♻️</div>
                    <h3 class="vision-card-title">
                        <span class="lang-content fr active">Impact carbone neutre</span>
                        <span class="lang-content en">Carbon neutral impact</span>
                    </h3>
                    <p class="vision-card-text">
                        <span class="lang-content fr active">
                            Compenser 100% de notre empreinte carbone
                        </span>
                        <span class="lang-content en">
                            Offset 100% of our carbon footprint
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Commitment Section -->
    <section class="commitment-section">
        <div class="commitment-content">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="lang-content fr active">Nos Engagements</span>
                    <span class="lang-content en">Our Commitments</span>
                </h2>
                <p class="section-subtitle">
                    <span class="lang-content fr active">Des promesses concrètes pour notre communauté</span>
                    <span class="lang-content en">Concrete promises for our community</span>
                </p>
            </div>

            <div class="commitment-cards">
                <div class="commitment-card" style="animation-delay: 0.1s;">
                    <div class="commitment-icon">✅</div>
                    <h3 class="commitment-title">
                        <span class="lang-content fr active">Transparence totale</span>
                        <span class="lang-content en">Total transparency</span>
                    </h3>
                    <p class="commitment-text">
                        <span class="lang-content fr active">
                            Être toujours clair sur nos commissions, notre rôle et les responsabilités de chacun
                        </span>
                        <span class="lang-content en">
                            Always be clear about our commissions, our role and everyone's responsibilities
                        </span>
                    </p>
                </div>

                <div class="commitment-card" style="animation-delay: 0.2s;">
                    <div class="commitment-icon">🔐</div>
                    <h3 class="commitment-title">
                        <span class="lang-content fr active">Protection des données</span>
                        <span class="lang-content en">Data protection</span>
                    </h3>
                    <p class="commitment-text">
                        <span class="lang-content fr active">
                            Respecter le RGPD et garantir la sécurité de vos informations personnelles
                        </span>
                        <span class="lang-content en">
                            Comply with GDPR and guarantee the security of your personal information
                        </span>
                    </p>
                </div>

                <div class="commitment-card" style="animation-delay: 0.3s;">
                    <div class="commitment-icon">🎯</div>
                    <h3 class="commitment-title">
                        <span class="lang-content fr active">Amélioration continue</span>
                        <span class="lang-content en">Continuous improvement</span>
                    </h3>
                    <p class="commitment-text">
                        <span class="lang-content fr active">
                            Écouter notre communauté et faire évoluer notre plateforme selon vos besoins
                        </span>
                        <span class="lang-content en">
                            Listen to our community and evolve our platform according to your needs
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">
                <span class="lang-content fr active">Participez à la révolution du transport collaboratif</span>
                <span class="lang-content en">Join the collaborative transport revolution</span>
            </h2>
            <p class="cta-subtitle">
                <span class="lang-content fr active">
                    Ensemble, construisons un futur plus solidaire et écologique
                </span>
                <span class="lang-content en">
                    Together, let's build a more solidarity-based and ecological future
                </span>
            </p>
            <div class="cta-buttons">
                <a href="/inscription" class="btn btn-primary">
                    <span class="lang-content fr active">Commencer maintenant</span>
                    <span class="lang-content en">Start now</span>
                    <span>→</span>
                </a>
                <a href="/contact" class="btn btn-outline">
                    <span class="lang-content fr active">En savoir plus</span>
                    <span class="lang-content en">Learn more</span>
                </a>
            </div>
        </div>
    </section>

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

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.objective-card, .vision-card, .commitment-card, .impact-visual').forEach(el => {
                observer.observe(el);
            });

            // Counter animation for impact stats
            const animateValue = (element, start, end, duration) => {
                let current = start;
                const range = end - start;
                const increment = end > start ? 1 : -1;
                const stepTime = Math.abs(Math.floor(duration / range));
                
                const timer = setInterval(() => {
                    current += increment;
                    element.textContent = current + '%';
                    if (current === end) {
                        clearInterval(timer);
                    }
                }, stepTime);
            };

            // Trigger counter animation when visible
            const statObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                        entry.target.classList.add('animated');
                        const statValue = entry.target.querySelector('.impact-stat-value');
                        if (statValue && statValue.textContent.includes('70')) {
                            animateValue(statValue, 0, -70, 2000);
                        }
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('.impact-chart').forEach(el => {
                statObserver.observe(el);
            });
        });
    </script>
</body>
</html>