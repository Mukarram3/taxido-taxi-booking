<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos de nous - Je confie</title>
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

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
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
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            padding: 140px 20px 80px;
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
            animation: float 8s ease-in-out infinite;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            bottom: -300px;
            left: -150px;
            animation: float 10s ease-in-out infinite reverse;
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
            max-width: 700px;
            margin: 0 auto;
        }

        /* Stats Section */
        .stats-section {
            margin: -60px auto 60px;
            max-width: 1200px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 32px;
            text-align: center;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .stat-label {
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* Story Section */
        .story-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
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

        .story-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .story-text {
            animation: fadeInUp 0.8s ease forwards;
        }

        .story-text h3 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .story-text p {
            color: var(--gray);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .story-image {
            position: relative;
            animation: fadeInUp 0.8s ease forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }

        .story-image-wrapper {
            position: relative;
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .story-image-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.2), rgba(5, 150, 105, 0.2));
            z-index: 1;
        }

        .story-image-content {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 100px;
            color: white;
        }

        /* Values Section */
        .values-section {
            background: var(--light);
            padding: 80px 20px;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .value-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 32px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
        }

        .value-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .value-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.1), rgba(5, 150, 105, 0.1));
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .value-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .value-description {
            color: var(--gray);
            line-height: 1.8;
        }

        /* Team Section */
        .team-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .founder-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 48px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease forwards;
        }

        .founder-avatar {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 60px;
            color: white;
            box-shadow: var(--shadow-xl);
        }

        .founder-name {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .founder-title {
            color: var(--primary);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .founder-bio {
            color: var(--gray);
            line-height: 1.8;
            font-size: 1.1rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            padding: 80px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '🚀';
            position: absolute;
            font-size: 200px;
            opacity: 0.1;
            top: -50px;
            right: 10%;
            animation: float 6s ease-in-out infinite;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .cta-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 20px;
        }

        .cta-subtitle {
            font-size: 1.25rem;
            margin-bottom: 32px;
            opacity: 0.95;
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

        .btn-white {
            background: white;
            color: var(--primary);
        }

        .btn-white:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        @media (max-width: 768px) {
            .story-content {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .values-grid {
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
            <h1 class="hero-title fade-in-up">
                <span class="lang-content fr active">L'équipe derrière Je confie</span>
                <span class="lang-content en">The team behind Je confie</span>
            </h1>
            <p class="hero-subtitle fade-in-up" style="animation-delay: 0.2s;">
                <span class="lang-content fr active">Révolutionnons ensemble le transport de colis entre particuliers</span>
                <span class="lang-content en">Let's revolutionize peer-to-peer package delivery together</span>
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-card" style="animation-delay: 0.1s;">
                <div class="stat-number">2024</div>
                <div class="stat-label">
                    <span class="lang-content fr active">Année de création</span>
                    <span class="lang-content en">Year founded</span>
                </div>
            </div>
            <div class="stat-card" style="animation-delay: 0.2s;">
                <div class="stat-number">15-20%</div>
                <div class="stat-label">
                    <span class="lang-content fr active">Commission transparente</span>
                    <span class="lang-content en">Transparent commission</span>
                </div>
            </div>
            <div class="stat-card" style="animation-delay: 0.3s;">
                <div class="stat-number">100%</div>
                <div class="stat-label">
                    <span class="lang-content fr active">Paiements sécurisés</span>
                    <span class="lang-content en">Secure payments</span>
                </div>
            </div>
            <div class="stat-card" style="animation-delay: 0.4s;">
                <div class="stat-number">♻️</div>
                <div class="stat-label">
                    <span class="lang-content fr active">Économie collaborative</span>
                    <span class="lang-content en">Collaborative economy</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Notre Histoire</span>
                <span class="lang-content en">Our Story</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Une idée simple pour un impact réel</span>
                <span class="lang-content en">A simple idea for real impact</span>
            </p>
        </div>
        
        <div class="story-content">
            <div class="story-text">
                <h3>
                    <span class="lang-content fr active">Né d'un constat simple</span>
                    <span class="lang-content en">Born from a simple observation</span>
                </h3>
                <p>
                    <span class="lang-content fr active">
                        En juin 2024, Franck Jubel Loembet a lancé Je confie avec une vision claire : créer une plateforme de confiance permettant aux particuliers de s'entraider pour le transport de colis.
                    </span>
                    <span class="lang-content en">
                        In June 2024, Franck Jubel Loembet launched Je confie with a clear vision: to create a trusted platform allowing individuals to help each other with package delivery.
                    </span>
                </p>
                <p>
                    <span class="lang-content fr active">
                        Face aux coûts élevés et à l'impact environnemental des solutions traditionnelles, nous avons imaginé une alternative collaborative où chaque trajet devient une opportunité de rendre service tout en étant rémunéré.
                    </span>
                    <span class="lang-content en">
                        Faced with high costs and environmental impact of traditional solutions, we imagined a collaborative alternative where every trip becomes an opportunity to help others while being compensated.
                    </span>
                </p>
                <p>
                    <span class="lang-content fr active">
                        Basés à Lyon, nous développons une solution technologique innovante qui met en relation expéditeurs et voyageurs de manière sécurisée et transparente.
                    </span>
                    <span class="lang-content en">
                        Based in Lyon, we develop an innovative technological solution that connects senders and travelers in a secure and transparent way.
                    </span>
                </p>
            </div>
            
            <div class="story-image">
                <div class="story-image-wrapper">
                    <div class="story-image-content">
                        🤝
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Nos Valeurs</span>
                <span class="lang-content en">Our Values</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Les principes qui nous guident au quotidien</span>
                <span class="lang-content en">The principles that guide us every day</span>
            </p>
        </div>

        <div class="values-grid">
            <div class="value-card" style="animation-delay: 0.1s;">
                <div class="value-icon">🔒</div>
                <h3 class="value-title">
                    <span class="lang-content fr active">Transparence</span>
                    <span class="lang-content en">Transparency</span>
                </h3>
                <p class="value-description">
                    <span class="lang-content fr active">
                        Nous sommes clairs sur notre rôle d'intermédiaire technique. Pas de frais cachés, pas de surprises. Commission affichée, responsabilités définies.
                    </span>
                    <span class="lang-content en">
                        We are clear about our role as a technical intermediary. No hidden fees, no surprises. Displayed commission, defined responsibilities.
                    </span>
                </p>
            </div>

            <div class="value-card" style="animation-delay: 0.2s;">
                <div class="value-icon">🛡️</div>
                <h3 class="value-title">
                    <span class="lang-content fr active">Sécurité</span>
                    <span class="lang-content en">Security</span>
                </h3>
                <p class="value-description">
                    <span class="lang-content fr active">
                        Vérification d'identité, paiements sécurisés via Mollie, protection des données RGPD. Votre confiance est notre priorité.
                    </span>
                    <span class="lang-content en">
                        Identity verification, secure payments via Mollie, GDPR data protection. Your trust is our priority.
                    </span>
                </p>
            </div>

            <div class="value-card" style="animation-delay: 0.3s;">
                <div class="value-icon">🌱</div>
                <h3 class="value-title">
                    <span class="lang-content fr active">Écologie</span>
                    <span class="lang-content en">Ecology</span>
                </h3>
                <p class="value-description">
                    <span class="lang-content fr active">
                        Optimiser les trajets existants pour réduire l'empreinte carbone. Chaque colis co-transporté est un pas vers un transport plus durable.
                    </span>
                    <span class="lang-content en">
                        Optimizing existing trips to reduce carbon footprint. Every co-transported package is a step towards more sustainable transport.
                    </span>
                </p>
            </div>

            <div class="value-card" style="animation-delay: 0.4s;">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">
                    <span class="lang-content fr active">Entraide</span>
                    <span class="lang-content en">Mutual aid</span>
                </h3>
                <p class="value-description">
                    <span class="lang-content fr active">
                        Créer une communauté où chacun peut aider et être aidé. L'économie collaborative au service de tous.
                    </span>
                    <span class="lang-content en">
                        Creating a community where everyone can help and be helped. Collaborative economy serving everyone.
                    </span>
                </p>
            </div>

            <div class="value-card" style="animation-delay: 0.5s;">
                <div class="value-icon">⚡</div>
                <h3 class="value-title">
                    <span class="lang-content fr active">Innovation</span>
                    <span class="lang-content en">Innovation</span>
                </h3>
                <p class="value-description">
                    <span class="lang-content fr active">
                        Utiliser la technologie pour simplifier la mise en relation et sécuriser les transactions entre particuliers.
                    </span>
                    <span class="lang-content en">
                        Using technology to simplify connections and secure transactions between individuals.
                    </span>
                </p>
            </div>

            <div class="value-card" style="animation-delay: 0.6s;">
                <div class="value-icon">💚</div>
                <h3 class="value-title">
                    <span class="lang-content fr active">Accessibilité</span>
                    <span class="lang-content en">Accessibility</span>
                </h3>
                <p class="value-description">
                    <span class="lang-content fr active">
                        Rendre le transport de colis abordable pour tous. Pas de frais d'inscription, commission uniquement sur les transactions réussies.
                    </span>
                    <span class="lang-content en">
                        Making package delivery affordable for everyone. No registration fees, commission only on successful transactions.
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="section-header">
            <h2 class="section-title">
                <span class="lang-content fr active">Le Fondateur</span>
                <span class="lang-content en">The Founder</span>
            </h2>
        </div>

        <div class="founder-card">
            <div class="founder-avatar">👨‍💼</div>
            <h3 class="founder-name">Franck Jubel Loembet</h3>
            <p class="founder-title">
                <span class="lang-content fr active">Fondateur & Entrepreneur individuel</span>
                <span class="lang-content en">Founder & Individual Entrepreneur</span>
            </p>
            <p class="founder-bio">
                <span class="lang-content fr active">
                    Passionné par l'économie collaborative et les solutions innovantes, Franck a créé Je confie pour répondre à un besoin réel : permettre aux particuliers de s'entraider pour le transport de colis de manière sécurisée et économique. Basé à Lyon, il développe cette plateforme avec la vision de transformer chaque trajet en opportunité de service mutuel.
                </span>
                <span class="lang-content en">
                    Passionate about collaborative economy and innovative solutions, Franck created Je confie to meet a real need: allowing individuals to help each other with package delivery in a secure and economical way. Based in Lyon, he develops this platform with the vision of transforming every trip into an opportunity for mutual service.
                </span>
            </p>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">
                <span class="lang-content fr active">Rejoignez l'aventure Je confie</span>
                <span class="lang-content en">Join the Je confie adventure</span>
            </h2>
            <p class="cta-subtitle">
                <span class="lang-content fr active">Commencez à expédier ou transporter dès aujourd'hui</span>
                <span class="lang-content en">Start shipping or carrying today</span>
            </p>
            <a href="/inscription" class="btn btn-white">
                <span class="lang-content fr active">Créer mon compte</span>
                <span class="lang-content en">Create my account</span>
                <span>→</span>
            </a>
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

            document.querySelectorAll('.stat-card, .value-card, .story-image').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>