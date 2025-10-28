<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir Transporteur - Je confie</title>
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

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .fade-in {
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

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);
        }

        .hero-section::before {
            content: '🚗';
            position: absolute;
            font-size: 200px;
            opacity: 0.1;
            top: -50px;
            right: 10%;
            animation: float 6s ease-in-out infinite;
        }

        .hero-section::after {
            content: '📦';
            position: absolute;
            font-size: 180px;
            opacity: 0.1;
            bottom: -50px;
            left: 10%;
            animation: float 8s ease-in-out infinite;
        }

        .hero-content {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            color: white;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            animation: fadeInUp 0.6s ease;
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
            margin-bottom: 40px;
        }

        .hero-cta {
            display: inline-flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Mode Selection */
        .mode-selection {
            background: white;
            border-radius: var(--radius-xl);
            padding: 60px 40px;
            margin: -80px auto 60px;
            max-width: 1200px;
            box-shadow: var(--shadow-xl);
            position: relative;
            z-index: 10;
        }

        .mode-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            text-align: center;
            margin-bottom: 48px;
        }

        .mode-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }

        .mode-card {
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.05), rgba(5, 150, 105, 0.05));
            border: 2px solid transparent;
            border-radius: var(--radius-xl);
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .mode-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .mode-card:hover {
            border-color: var(--primary);
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .mode-card:hover::before {
            transform: scaleX(1);
        }

        .mode-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 48px;
            color: white;
            animation: pulse 3s ease-in-out infinite;
        }

        .mode-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .mode-description {
            color: var(--gray);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .mode-features {
            text-align: left;
            list-style: none;
        }

        .mode-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            color: var(--dark);
        }

        .mode-feature-icon {
            color: var(--success);
            font-size: 20px;
        }

        /* Income Calculator */
        .income-calculator {
            background: var(--light);
            padding: 80px 20px;
        }

        .calculator-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: var(--radius-xl);
            padding: 48px;
            box-shadow: var(--shadow-lg);
        }

        .calculator-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            text-align: center;
            margin-bottom: 40px;
        }

        .calculator-form {
            display: grid;
            gap: 32px;
        }

        .calc-input-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .calc-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .calc-help {
            font-size: 12px;
            color: var(--gray);
            font-weight: 400;
        }

        .calc-slider {
            width: 100%;
            -webkit-appearance: none;
            height: 8px;
            border-radius: 5px;
            background: linear-gradient(90deg, var(--eco-green) 0%, var(--primary) 100%);
            outline: none;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .calc-slider:hover {
            opacity: 1;
        }

        .calc-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: white;
            box-shadow: var(--shadow-lg);
            cursor: pointer;
        }

        .calc-slider::-moz-range-thumb {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: white;
            box-shadow: var(--shadow-lg);
            cursor: pointer;
        }

        .calc-value-display {
            text-align: right;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .calc-results-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 24px;
            margin-top: 40px;
            padding-top: 40px;
            border-top: 2px solid var(--border);
        }

        .calc-result-card {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.05), rgba(5, 150, 105, 0.05));
            border-radius: var(--radius-lg);
        }

        .calc-result-label {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .calc-result-value {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--eco-green), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .calc-result-note {
            font-size: 12px;
            color: var(--gray);
            margin-top: 8px;
        }

        /* Benefits Section */
        .benefits-section {
            padding: 80px 20px;
            background: white;
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

        .benefits-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }

        .benefit-card {
            background: var(--light);
            border-radius: var(--radius-lg);
            padding: 36px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
            position: relative;
            overflow: hidden;
        }

        .benefit-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .benefit-card:hover::after {
            transform: scaleX(1);
        }

        .benefit-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.1), rgba(80, 70, 229, 0.1));
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            font-size: 40px;
        }

        .benefit-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .benefit-description {
            color: var(--gray);
            line-height: 1.8;
        }

        /* Process Section */
        .process-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.02), rgba(5, 150, 105, 0.02));
        }

        .process-timeline {
            max-width: 1000px;
            margin: 60px auto 0;
            position: relative;
        }

        .process-timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, var(--primary), var(--eco-green));
            transform: translateX(-50%);
        }

        .process-step {
            display: flex;
            align-items: center;
            margin-bottom: 60px;
            position: relative;
            animation: slideIn 0.8s ease forwards;
        }

        .process-step:nth-child(even) {
            flex-direction: row-reverse;
        }

        .step-content {
            flex: 1;
            background: white;
            border-radius: var(--radius-lg);
            padding: 32px;
            box-shadow: var(--shadow);
            margin: 0 40px;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: white;
            color: var(--primary);
            border: 4px solid var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            z-index: 1;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .step-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .step-description {
            color: var(--gray);
            line-height: 1.8;
        }

        /* Trust Section */
        .trust-section {
            background: white;
            padding: 80px 20px;
        }

        .trust-grid {
            max-width: 1200px;
            margin: 60px auto 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .trust-item {
            text-align: center;
        }

        .trust-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 36px;
            color: white;
            animation: pulse 4s ease-in-out infinite;
        }

        .trust-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .trust-description {
            color: var(--gray);
            line-height: 1.6;
        }

        /* Requirements Section */
        .requirements-section {
            background: var(--light);
            padding: 80px 20px;
        }

        .requirements-container {
            max-width: 1000px;
            margin: 60px auto 0;
        }

        .requirement-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 40px;
            margin-bottom: 32px;
            box-shadow: var(--shadow);
        }

        .requirement-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
        }

        .requirement-card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .requirement-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .requirement-list {
            list-style: none;
            display: grid;
            gap: 16px;
        }

        .requirement-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: var(--light);
            border-radius: var(--radius);
            transition: all 0.3s ease;
        }

        .requirement-item:hover {
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.05), rgba(5, 150, 105, 0.05));
            transform: translateX(8px);
        }

        .requirement-icon {
            width: 24px;
            height: 24px;
            background: var(--success);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
        }

        .requirement-text {
            color: var(--dark);
            line-height: 1.6;
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 20px;
            background: white;
        }

        .faq-container {
            max-width: 900px;
            margin: 60px auto 0;
        }

        .faq-item {
            background: var(--light);
            border-radius: var(--radius-lg);
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: var(--shadow);
        }

        .faq-question {
            padding: 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--dark);
        }

        .faq-toggle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(45deg);
        }

        .faq-answer {
            padding: 0 24px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            color: var(--gray);
            line-height: 1.8;
        }

        .faq-item.active .faq-answer {
            padding: 0 24px 24px;
            max-height: 500px;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            padding: 100px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.05) 35px, rgba(255,255,255,.05) 70px);
        }

        .cta-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 20px;
        }

        .cta-subtitle {
            font-size: 1.25rem;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Buttons */
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
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .mode-grid {
                grid-template-columns: 1fr;
            }

            .calc-results-grid {
                grid-template-columns: 1fr;
            }

            .process-timeline::before {
                left: 20px;
            }

            .process-step,
            .process-step:nth-child(even) {
                flex-direction: column;
                text-align: left;
            }

            .step-number {
                position: relative;
                left: 20px;
                transform: none;
                margin-bottom: 20px;
            }

            .step-content {
                margin: 0;
                width: calc(100% - 40px);
                margin-left: 40px;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
            }

            .trust-grid {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
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
        <div class="hero-pattern"></div>
        <div class="hero-content">
            <div class="hero-badge fade-in">
                ✨ <span class="lang-content fr active">Covoiturage de colis entre particuliers</span>
                <span class="lang-content en">Package carpooling between individuals</span>
            </div>
            <h1 class="hero-title fade-in">
                <span class="lang-content fr active">Rentabilisez vos déplacements</span>
                <span class="lang-content en">Monetize your trips</span>
            </h1>
            <p class="hero-subtitle fade-in" style="animation-delay: 0.2s;">
                <span class="lang-content fr active">Transportez des colis sur vos trajets et gagnez de l'argent</span>
                <span class="lang-content en">Carry packages on your trips and earn money</span>
            </p>
            <div class="hero-cta fade-in" style="animation-delay: 0.4s;">
                <a href="#modes" class="btn btn-white">
                    🚀 <span class="lang-content fr active">Découvrir les modes</span>
                    <span class="lang-content en">Discover the modes</span>
                </a>
                <a href="#calculator" class="btn btn-outline">
                    💰 <span class="lang-content fr active">Calculer mes revenus</span>
                    <span class="lang-content en">Calculate my income</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Mode Selection -->
    <section class="mode-selection" id="modes">
        <h2 class="mode-title">
            <span class="lang-content fr active">Choisissez votre mode de transport</span>
            <span class="lang-content en">Choose your transport mode</span>
        </h2>
        
        <div class="mode-grid">
            <div class="mode-card">
                <div class="mode-icon">✈️</div>
                <h3 class="mode-card-title">
                    <span class="lang-content fr active">Mode Voyageur</span>
                    <span class="lang-content en">Traveler Mode</span>
                </h3>
                <p class="mode-description">
                    <span class="lang-content fr active">
                        Vous voyagez régulièrement ? Rentabilisez votre espace bagage en transportant des colis lors de vos déplacements.
                    </span>
                    <span class="lang-content en">
                        Do you travel regularly? Monetize your luggage space by carrying packages during your trips.
                    </span>
                </p>
                <ul class="mode-features">
                    <li class="mode-feature">
                        <span class="mode-feature-icon">✓</span>
                        <span class="lang-content fr active">Vendez votre espace bagage disponible</span>
                        <span class="lang-content en">Sell your available luggage space</span>
                    </li>
                    <li class="mode-feature">
                        <span class="mode-feature-icon">✓</span>
                        <span class="lang-content fr active">Trajets aériens, train ou voiture</span>
                        <span class="lang-content en">Air, train or car trips</span>
                    </li>
                    <li class="mode-feature">
                        <span class="mode-feature-icon">✓</span>
                        <span class="lang-content fr active">Flexibilité totale sur les colis acceptés</span>
                        <span class="lang-content en">Total flexibility on accepted packages</span>
                    </li>
                </ul>
            </div>

            <div class="mode-card">
                <div class="mode-icon">🤝</div>
                <h3 class="mode-card-title">
                    <span class="lang-content fr active">Mode Cotransport</span>
                    <span class="lang-content en">Co-transport Mode</span>
                </h3>
                <p class="mode-description">
                    <span class="lang-content fr active">
                        Entraide entre particuliers : transportez des colis pour d'autres membres de la communauté lors de vos trajets quotidiens.
                    </span>
                    <span class="lang-content en">
                        Mutual aid between individuals: carry packages for other community members during your daily trips.
                    </span>
                </p>
                <ul class="mode-features">
                    <li class="mode-feature">
                        <span class="mode-feature-icon">✓</span>
                        <span class="lang-content fr active">Service d'entraide entre particuliers</span>
                        <span class="lang-content en">Mutual aid service between individuals</span>
                    </li>
                    <li class="mode-feature">
                        <span class="mode-feature-icon">✓</span>
                        <span class="lang-content fr active">Trajets courts ou longue distance</span>
                        <span class="lang-content en">Short or long distance trips</span>
                    </li>
                    <li class="mode-feature">
                        <span class="mode-feature-icon">✓</span>
                        <span class="lang-content fr active">Basé sur la confiance mutuelle</span>
                        <span class="lang-content en">Based on mutual trust</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Income Calculator -->
    <section class="income-calculator" id="calculator">
        <div class="calculator-container">
            <h2 class="calculator-title">
                💰 <span class="lang-content fr active">Simulez vos revenus potentiels</span>
                <span class="lang-content en">Simulate your potential income</span>
            </h2>
            
            <div class="calculator-form">
                <div class="calc-input-group">
                    <label class="calc-label">
                        <span class="lang-content fr active">Nombre de trajets par mois</span>
                        <span class="lang-content en">Number of trips per month</span>
                        <span class="calc-help">
                            <span class="lang-content fr active">(trajets personnels ou professionnels)</span>
                            <span class="lang-content en">(personal or professional trips)</span>
                        </span>
                    </label>
                    <input type="range" class="calc-slider" id="trips" min="1" max="30" value="8" oninput="updateCalculator()">
                    <div class="calc-value-display" id="tripsValue">8 trajets</div>
                </div>

                <div class="calc-input-group">
                    <label class="calc-label">
                        <span class="lang-content fr active">Nombre de colis par trajet</span>
                        <span class="lang-content en">Number of packages per trip</span>
                        <span class="calc-help">
                            <span class="lang-content fr active">(selon votre espace disponible)</span>
                            <span class="lang-content en">(depending on your available space)</span>
                        </span>
                    </label>
                    <input type="range" class="calc-slider" id="packages" min="1" max="10" value="3" oninput="updateCalculator()">
                    <div class="calc-value-display" id="packagesValue">3 colis</div>
                </div>

                <div class="calc-input-group">
                    <label class="calc-label">
                        <span class="lang-content fr active">Prix moyen par colis</span>
                        <span class="lang-content en">Average price per package</span>
                        <span class="calc-help">
                            <span class="lang-content fr active">(vous fixez vos tarifs)</span>
                            <span class="lang-content en">(you set your rates)</span>
                        </span>
                    </label>
                    <input type="range" class="calc-slider" id="price" min="10" max="100" value="35" step="5" oninput="updateCalculator()">
                    <div class="calc-value-display" id="priceValue">35 €</div>
                </div>

                <div class="calc-results-grid">
                    <div class="calc-result-card">
                        <div class="calc-result-label">
                            <span class="lang-content fr active">Revenu mensuel</span>
                            <span class="lang-content en">Monthly income</span>
                        </div>
                        <div class="calc-result-value" id="monthlyIncome">840 €</div>
                        <div class="calc-result-note">
                            <span class="lang-content fr active">Après commission</span>
                            <span class="lang-content en">After commission</span>
                        </div>
                    </div>
                    
                    <div class="calc-result-card">
                        <div class="calc-result-label">
                            <span class="lang-content fr active">Revenu annuel</span>
                            <span class="lang-content en">Annual income</span>
                        </div>
                        <div class="calc-result-value" id="yearlyIncome">10 080 €</div>
                        <div class="calc-result-note">
                            <span class="lang-content fr active">Projection sur 12 mois</span>
                            <span class="lang-content en">12-month projection</span>
                        </div>
                    </div>
                    
                    <div class="calc-result-card">
                        <div class="calc-result-label">
                            <span class="lang-content fr active">Par trajet</span>
                            <span class="lang-content en">Per trip</span>
                        </div>
                        <div class="calc-result-value" id="perTrip">105 €</div>
                        <div class="calc-result-note">
                            <span class="lang-content fr active">Gain moyen</span>
                            <span class="lang-content en">Average gain</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Les avantages du covoiturage de colis</span>
                <span class="lang-content en">Benefits of package carpooling</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Un système gagnant-gagnant basé sur l'entraide</span>
                <span class="lang-content en">A win-win system based on mutual aid</span>
            </p>
        </div>

        <div class="benefits-grid">
            <div class="benefit-card" style="animation-delay: 0.1s;">
                <div class="benefit-icon">💵</div>
                <h3 class="benefit-title">
                    <span class="lang-content fr active">Revenus complémentaires</span>
                    <span class="lang-content en">Additional income</span>
                </h3>
                <p class="benefit-description">
                    <span class="lang-content fr active">
                        Transformez vos trajets habituels en opportunité de revenus sans détour ni effort supplémentaire
                    </span>
                    <span class="lang-content en">
                        Transform your regular trips into income opportunities without detours or extra effort
                    </span>
                </p>
            </div>

            <div class="benefit-card" style="animation-delay: 0.2s;">
                <div class="benefit-icon">🕐</div>
                <h3 class="benefit-title">
                    <span class="lang-content fr active">Liberté totale</span>
                    <span class="lang-content en">Total freedom</span>
                </h3>
                <p class="benefit-description">
                    <span class="lang-content fr active">
                        Aucune obligation, aucun engagement. Choisissez quand et quoi transporter selon vos disponibilités
                    </span>
                    <span class="lang-content en">
                        No obligations, no commitment. Choose when and what to transport according to your availability
                    </span>
                </p>
            </div>

            <div class="benefit-card" style="animation-delay: 0.3s;">
                <div class="benefit-icon">🌍</div>
                <h3 class="benefit-title">
                    <span class="lang-content fr active">Impact écologique</span>
                    <span class="lang-content en">Ecological impact</span>
                </h3>
                <p class="benefit-description">
                    <span class="lang-content fr active">
                        Réduisez l'empreinte carbone en optimisant les trajets existants plutôt que créer de nouveaux transports
                    </span>
                    <span class="lang-content en">
                        Reduce carbon footprint by optimizing existing trips rather than creating new transports
                    </span>
                </p>
            </div>

            <div class="benefit-card" style="animation-delay: 0.4s;">
                <div class="benefit-icon">🤝</div>
                <h3 class="benefit-title">
                    <span class="lang-content fr active">Communauté solidaire</span>
                    <span class="lang-content en">Solidarity community</span>
                </h3>
                <p class="benefit-description">
                    <span class="lang-content fr active">
                        Rejoignez un réseau d'entraide entre particuliers basé sur la confiance et le service mutuel
                    </span>
                    <span class="lang-content en">
                        Join a mutual aid network between individuals based on trust and mutual service
                    </span>
                </p>
            </div>

            <div class="benefit-card" style="animation-delay: 0.5s;">
                <div class="benefit-icon">📱</div>
                <h3 class="benefit-title">
                    <span class="lang-content fr active">Simple et sécurisé</span>
                    <span class="lang-content en">Simple and secure</span>
                </h3>
                <p class="benefit-description">
                    <span class="lang-content fr active">
                        Interface intuitive, paiements sécurisés via Mollie, et système d'évaluation pour la confiance
                    </span>
                    <span class="lang-content en">
                        Intuitive interface, secure payments via Mollie, and rating system for trust
                    </span>
                </p>
            </div>

            <div class="benefit-card" style="animation-delay: 0.6s;">
                <div class="benefit-icon">⭐</div>
                <h3 class="benefit-title">
                    <span class="lang-content fr active">Système de réputation</span>
                    <span class="lang-content en">Reputation system</span>
                </h3>
                <p class="benefit-description">
                    <span class="lang-content fr active">
                        Construisez votre profil de confiance avec les évaluations et recommandations de la communauté
                    </span>
                    <span class="lang-content en">
                        Build your trust profile with community ratings and recommendations
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Comment ça marche ?</span>
                <span class="lang-content en">How does it work?</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Un processus simple et transparent</span>
                <span class="lang-content en">A simple and transparent process</span>
            </p>
        </div>

        <div class="process-timeline">
            <div class="process-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3 class="step-title">
                        <span class="lang-content fr active">Inscription gratuite</span>
                        <span class="lang-content en">Free registration</span>
                    </h3>
                    <p class="step-description">
                        <span class="lang-content fr active">
                            Créez votre profil en 2 minutes. Vérification simple via SMS avec Twilio. Aucune pièce d'identité requise, juste votre numéro de téléphone.
                        </span>
                        <span class="lang-content en">
                            Create your profile in 2 minutes. Simple SMS verification with Twilio. No ID required, just your phone number.
                        </span>
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3 class="step-title">
                        <span class="lang-content fr active">Publiez vos trajets</span>
                        <span class="lang-content en">Publish your trips</span>
                    </h3>
                    <p class="step-description">
                        <span class="lang-content fr active">
                            Annoncez vos déplacements prévus avec l'espace disponible. Fixez librement vos tarifs au kg ou au colis.
                        </span>
                        <span class="lang-content en">
                            Announce your planned trips with available space. Freely set your rates per kg or per package.
                        </span>
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3 class="step-title">
                        <span class="lang-content fr active">Connectez-vous</span>
                        <span class="lang-content en">Connect</span>
                    </h3>
                    <p class="step-description">
                        <span class="lang-content fr active">
                            Les expéditeurs réservent votre espace. Échangez via la messagerie intégrée pour coordonner les détails.
                        </span>
                        <span class="lang-content en">
                            Senders book your space. Exchange via integrated messaging to coordinate details.
                        </span>
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3 class="step-title">
                        <span class="lang-content fr active">Transportez</span>
                        <span class="lang-content en">Transport</span>
                    </h3>
                    <p class="step-description">
                        <span class="lang-content fr active">
                            Récupérez le colis au point convenu et livrez-le à destination. Confirmation par photo à l'arrivée.
                        </span>
                        <span class="lang-content en">
                            Pick up the package at the agreed point and deliver it to destination. Photo confirmation upon arrival.
                        </span>
                    </p>
                </div>
            </div>

            <div class="process-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3 class="step-title">
                        <span class="lang-content fr active">Recevez votre paiement</span>
                        <span class="lang-content en">Receive your payment</span>
                    </h3>
                    <p class="step-description">
                        <span class="lang-content fr active">
                            Paiement automatique sous 48h après confirmation de livraison. Commission Je confie de 15-20% incluse.
                        </span>
                        <span class="lang-content en">
                            Automatic payment within 48h after delivery confirmation. Je confie commission of 15-20% included.
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Un système basé sur la confiance</span>
                <span class="lang-content en">A trust-based system</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">La confiance mutuelle au cœur de notre plateforme</span>
                <span class="lang-content en">Mutual trust at the heart of our platform</span>
            </p>
        </div>

        <div class="trust-grid">
            <div class="trust-item">
                <div class="trust-icon">🔐</div>
                <h3 class="trust-title">
                    <span class="lang-content fr active">Profils vérifiés</span>
                    <span class="lang-content en">Verified profiles</span>
                </h3>
                <p class="trust-description">
                    <span class="lang-content fr active">
                        Numéros de téléphone vérifiés via SMS pour garantir l'authenticité des membres
                    </span>
                    <span class="lang-content en">
                        Phone numbers verified via SMS to ensure member authenticity
                    </span>
                </p>
            </div>

            <div class="trust-item">
                <div class="trust-icon">⭐</div>
                <h3 class="trust-title">
                    <span class="lang-content fr active">Évaluations</span>
                    <span class="lang-content en">Ratings</span>
                </h3>
                <p class="trust-description">
                    <span class="lang-content fr active">
                        Système d'évaluation mutuelle pour construire une réputation solide
                    </span>
                    <span class="lang-content en">
                        Mutual rating system to build a solid reputation
                    </span>
                </p>
            </div>

            <div class="trust-item">
                <div class="trust-icon">💬</div>
                <h3 class="trust-title">
                    <span class="lang-content fr active">Communication directe</span>
                    <span class="lang-content en">Direct communication</span>
                </h3>
                <p class="trust-description">
                    <span class="lang-content fr active">
                        Messagerie intégrée pour échanger en toute sécurité avant le transport
                    </span>
                    <span class="lang-content en">
                        Integrated messaging to exchange securely before transport
                    </span>
                </p>
            </div>

            <div class="trust-item">
                <div class="trust-icon">📸</div>
                <h3 class="trust-title">
                    <span class="lang-content fr active">Preuves de livraison</span>
                    <span class="lang-content en">Delivery proof</span>
                </h3>
                <p class="trust-description">
                    <span class="lang-content fr active">
                        Photos de confirmation pour assurer la traçabilité des livraisons
                    </span>
                    <span class="lang-content en">
                        Confirmation photos to ensure delivery traceability
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- Requirements Section -->
    <section class="requirements-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Rejoignez la communauté</span>
                <span class="lang-content en">Join the community</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Conditions simples pour commencer</span>
                <span class="lang-content en">Simple conditions to get started</span>
            </p>
        </div>

        <div class="requirements-container">
            <div class="requirement-card">
                <div class="requirement-card-header">
                    <div class="requirement-card-icon">✅</div>
                    <h3 class="requirement-card-title">
                        <span class="lang-content fr active">Pour commencer</span>
                        <span class="lang-content en">To get started</span>
                    </h3>
                </div>
                <ul class="requirement-list">
                    <li class="requirement-item">
                        <span class="requirement-icon">✓</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Être majeur (18 ans minimum)</span>
                            <span class="lang-content en">Be of legal age (18 years minimum)</span>
                        </span>
                    </li>
                    <li class="requirement-item">
                        <span class="requirement-icon">✓</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Numéro de téléphone pour vérification SMS</span>
                            <span class="lang-content en">Phone number for SMS verification</span>
                        </span>
                    </li>
                    <li class="requirement-item">
                        <span class="requirement-icon">✓</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Compte bancaire européen (IBAN)</span>
                            <span class="lang-content en">European bank account (IBAN)</span>
                        </span>
                    </li>
                    <li class="requirement-item">
                        <span class="requirement-icon">✓</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Adresse email valide</span>
                            <span class="lang-content en">Valid email address</span>
                        </span>
                    </li>
                </ul>
            </div>

            <div class="requirement-card">
                <div class="requirement-card-header">
                    <div class="requirement-card-icon">💡</div>
                    <h3 class="requirement-card-title">
                        <span class="lang-content fr active">Bon à savoir</span>
                        <span class="lang-content en">Good to know</span>
                    </h3>
                </div>
                <ul class="requirement-list">
                    <li class="requirement-item">
                        <span class="requirement-icon">ℹ️</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Pas de statut professionnel requis - service entre particuliers</span>
                            <span class="lang-content en">No professional status required - service between individuals</span>
                        </span>
                    </li>
                    <li class="requirement-item">
                        <span class="requirement-icon">ℹ️</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Aucune pièce d'identité demandée</span>
                            <span class="lang-content en">No ID document required</span>
                        </span>
                    </li>
                    <li class="requirement-item">
                        <span class="requirement-icon">ℹ️</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Inscription 100% gratuite, sans abonnement</span>
                            <span class="lang-content en">100% free registration, no subscription</span>
                        </span>
                    </li>
                    <li class="requirement-item">
                        <span class="requirement-icon">ℹ️</span>
                        <span class="requirement-text">
                            <span class="lang-content fr active">Commission uniquement sur les transports effectués</span>
                            <span class="lang-content en">Commission only on completed transports</span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Questions fréquentes</span>
                <span class="lang-content en">Frequently asked questions</span>
            </h2>
        </div>

        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>
                        <span class="lang-content fr active">C'est vraiment du covoiturage de colis ?</span>
                        <span class="lang-content en">Is it really package carpooling?</span>
                    </span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>
                        <span class="lang-content fr active">
                            Oui ! Comme le covoiturage pour passagers, vous transportez des colis sur des trajets que vous faites déjà. C'est un service d'entraide entre particuliers, pas une activité professionnelle. Vous restez un particulier qui rend service.
                        </span>
                        <span class="lang-content en">
                            Yes! Like carpooling for passengers, you carry packages on trips you're already making. It's a mutual aid service between individuals, not a professional activity. You remain an individual providing a service.
                        </span>
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>
                        <span class="lang-content fr active">Dois-je avoir un statut professionnel ?</span>
                        <span class="lang-content en">Do I need professional status?</span>
                    </span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>
                        <span class="lang-content fr active">
                            Non, aucun statut professionnel n'est requis. Je confie fonctionne sur le principe du covoiturage de colis entre particuliers. C'est de l'entraide, pas du transport professionnel. Vérifiez toutefois les seuils de revenus avec votre centre des impôts.
                        </span>
                        <span class="lang-content en">
                            No, no professional status is required. Je confie operates on the principle of package carpooling between individuals. It's mutual aid, not professional transport. However, check income thresholds with your tax office.
                        </span>
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>
                        <span class="lang-content fr active">Comment sont fixés les prix ?</span>
                        <span class="lang-content en">How are prices set?</span>
                    </span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>
                        <span class="lang-content fr active">
                            Vous fixez librement vos tarifs en fonction de vos trajets, de l'espace disponible et du service rendu. Les prix sont généralement entre 10€ et 100€ par colis selon la distance et la taille.
                        </span>
                        <span class="lang-content en">
                            You freely set your rates based on your trips, available space and service provided. Prices are generally between €10 and €100 per package depending on distance and size.
                        </span>
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>
                        <span class="lang-content fr active">Quelle est la commission Je confie ?</span>
                        <span class="lang-content en">What is Je confie's commission?</span>
                    </span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>
                        <span class="lang-content fr active">
                            Je confie prélève une commission de 15 à 20% sur chaque transaction réussie. Cette commission couvre l'utilisation de la plateforme, la sécurisation des paiements via Mollie, et le support.
                        </span>
                        <span class="lang-content en">
                            Je confie takes a commission of 15 to 20% on each successful transaction. This commission covers platform use, secure payments via Mollie, and support.
                        </span>
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>
                        <span class="lang-content fr active">Et si quelque chose arrive au colis ?</span>
                        <span class="lang-content en">What if something happens to the package?</span>
                    </span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>
                        <span class="lang-content fr active">
                            La plateforme fonctionne sur la confiance mutuelle entre particuliers. Nous recommandons de bien communiquer avec l'expéditeur, de prendre des photos, et d'établir un accord clair. Le système d'évaluation aide à identifier les membres fiables.
                        </span>
                        <span class="lang-content en">
                            The platform operates on mutual trust between individuals. We recommend communicating well with the sender, taking photos, and establishing a clear agreement. The rating system helps identify reliable members.
                        </span>
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>
                        <span class="lang-content fr active">Puis-je refuser un colis ?</span>
                        <span class="lang-content en">Can I refuse a package?</span>
                    </span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>
                        <span class="lang-content fr active">
                            Absolument ! Vous avez toute liberté d'accepter ou refuser les demandes. Vérifiez toujours la nature du colis et n'acceptez que ce qui vous convient. La confiance mutuelle est essentielle.
                        </span>
                        <span class="lang-content en">
                            Absolutely! You have complete freedom to accept or refuse requests. Always check the nature of the package and only accept what suits you. Mutual trust is essential.
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="register">
        <div class="cta-content">
            <h2 class="cta-title">
                <span class="lang-content fr active">Prêt à rejoindre la communauté ?</span>
                <span class="lang-content en">Ready to join the community?</span>
            </h2>
            <p class="cta-subtitle">
                <span class="lang-content fr active">
                    Commencez à rentabiliser vos déplacements dès aujourd'hui
                </span>
                <span class="lang-content en">
                    Start monetizing your trips today
                </span>
            </p>
            <div class="cta-buttons">
                <a href="/inscription" class="btn btn-white">
                    <span class="lang-content fr active">Créer mon compte gratuitement</span>
                    <span class="lang-content en">Create my free account</span>
                    <span>→</span>
                </a>
                <a href="/contact" class="btn btn-outline">
                    <span class="lang-content fr active">Une question ?</span>
                    <span class="lang-content en">Have a question?</span>
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

        // Income Calculator
        function updateCalculator() {
            const trips = document.getElementById('trips').value;
            const packages = document.getElementById('packages').value;
            const price = document.getElementById('price').value;
            
            const isEnglish = document.querySelector('.lang-btn.active').textContent === 'EN';
            
            document.getElementById('tripsValue').textContent = trips + (isEnglish ? ' trips' : ' trajets');
            document.getElementById('packagesValue').textContent = packages + (isEnglish ? ' packages' : ' colis');
            document.getElementById('priceValue').textContent = price + ' €';
            
            // Calculate with 17.5% average commission
            const grossIncome = trips * packages * price;
            const commission = grossIncome * 0.175;
            const netMonthly = grossIncome - commission;
            const netYearly = netMonthly * 12;
            const perTrip = netMonthly / trips;
            
            document.getElementById('monthlyIncome').textContent = Math.round(netMonthly).toLocaleString('fr-FR') + ' €';
            document.getElementById('yearlyIncome').textContent = Math.round(netYearly).toLocaleString('fr-FR') + ' €';
            document.getElementById('perTrip').textContent = Math.round(perTrip) + ' €';
        }

        // FAQ Toggle
        function toggleFAQ(element) {
            const faqItem = element.parentElement;
            const wasActive = faqItem.classList.contains('active');
            
            // Close all FAQs
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Open clicked FAQ if it wasn't active
            if (!wasActive) {
                faqItem.classList.add('active');
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Check for saved language preference
            const preferredLang = localStorage.getItem('preferredLanguage');
            if (preferredLang === 'en') {
                const enBtn = document.querySelector('.lang-btn[onclick*="en"]');
                if (enBtn) {
                    enBtn.click();
                }
            }

            // Initialize calculator
            updateCalculator();

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const offset = 100;
                        const targetPosition = target.offsetTop - offset;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

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

            document.querySelectorAll('.benefit-card, .process-step, .trust-item, .mode-card').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s ease';
                observer.observe(el);
            });

            // Add hover effect to mode cards
            document.querySelectorAll('.mode-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>