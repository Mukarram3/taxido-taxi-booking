<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des annonces - Je confie</title>
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

        /* Language Management Unifié */
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
            white-space: nowrap;
        }

        .lang-btn.active {
            background: var(--primary);
            color: white;
        }

        .lang-btn:hover:not(.active) {
            background: rgba(80, 70, 229, 0.1);
            color: var(--primary);
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 72px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 8px 12px;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link.create {
            color: var(--primary);
            font-weight: 600;
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
            background-clip: text;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            padding: 8px;
        }

        /* Search Header */
        .search-header {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            padding: 120px 0 40px;
            position: relative;
            overflow: hidden;
        }

        .search-header::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -300px;
            right: -200px;
        }

        .search-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .search-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 16px;
            text-align: center;
        }

        .search-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            text-align: center;
            margin-bottom: 40px;
        }

        /* Main Search Bar */
        .search-bar {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow-xl);
            margin-bottom: 32px;
        }

        .search-form {
            display: grid;
            grid-template-columns: 1fr 1fr 200px 200px 150px;
            gap: 16px;
            align-items: center;
        }

        .search-input-group {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80, 70, 229, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .search-select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E") no-repeat right 16px center;
            background-color: white;
            padding-right: 40px;
        }

        .search-btn {
            padding: 14px 24px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .search-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Filter Tags */
        .filter-tags {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            padding: 16px 0;
            border-top: 1px solid var(--border);
            margin-top: 16px;
        }

        .filter-tag {
            padding: 8px 16px;
            background: var(--light);
            border-radius: 100px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .filter-tag:hover {
            border-color: var(--primary);
        }

        .filter-tag.active {
            background: var(--primary);
            color: white;
        }

        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: -60px auto 40px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 32px;
            position: relative;
            z-index: 10;
        }

        /* Sidebar Filters */
        .sidebar-filters {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .filter-section {
            margin-bottom: 32px;
        }

        .filter-section:last-child {
            margin-bottom: 0;
        }

        .filter-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
            font-size: 15px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 0;
            cursor: pointer;
        }

        .filter-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .filter-option input[type="checkbox"]:checked ~ .filter-checkbox {
            background: var(--primary);
            border-color: var(--primary);
        }

        .filter-option input[type="checkbox"]:checked ~ .filter-checkbox::after {
            content: '✓';
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .filter-option input[type="checkbox"] {
            position: absolute;
            opacity: 0;
        }

        .filter-label {
            flex: 1;
            font-size: 14px;
            color: var(--dark);
        }

        .filter-count {
            font-size: 12px;
            color: var(--gray);
            background: var(--light);
            padding: 2px 8px;
            border-radius: 100px;
        }

        /* Results Section */
        .results-section {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }

        .results-count {
            font-size: 15px;
            color: var(--gray);
        }

        .results-count strong {
            color: var(--dark);
            font-weight: 700;
        }

        .sort-options {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .sort-select {
            padding: 8px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            cursor: pointer;
        }

        .view-toggles {
            display: flex;
            gap: 4px;
            background: var(--light);
            padding: 4px;
            border-radius: var(--radius);
        }

        .view-toggle {
            padding: 8px;
            background: transparent;
            border: none;
            cursor: pointer;
            border-radius: var(--radius);
            transition: all 0.3s ease;
        }

        .view-toggle.active {
            background: white;
            box-shadow: var(--shadow-sm);
        }

        /* Offer Cards */
        .offers-grid {
            display: grid;
            gap: 24px;
        }

        .offer-card {
            background: white;
            border: 2px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .offer-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .offer-badges {
            position: absolute;
            top: 16px;
            right: 16px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .offer-badge {
            padding: 4px 10px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
        }

        .offer-badge.verified {
            background: var(--success);
            color: white;
        }

        .offer-badge.insured {
            background: var(--eco-green);
            color: white;
        }

        .offer-badge.urgent {
            background: var(--danger);
            color: white;
        }

        .offer-main {
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 24px;
            align-items: center;
        }

        .offer-type-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--light), white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .offer-details {
            flex: 1;
        }

        .offer-route {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .route-city {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .route-arrow {
            color: var(--primary);
            font-size: 20px;
        }

        .offer-info {
            display: flex;
            gap: 16px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--gray);
        }

        .offer-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-info {
            font-size: 14px;
        }

        .user-name {
            font-weight: 600;
            color: var(--dark);
        }

        .user-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            color: var(--gray);
            font-size: 12px;
        }

        .offer-pricing {
            text-align: right;
        }

        .price-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--primary);
        }

        .price-unit {
            font-size: 14px;
            color: var(--gray);
        }

        .price-savings {
            font-size: 12px;
            color: var(--eco-green);
            font-weight: 600;
        }

        .offer-actions {
            display: flex;
            gap: 8px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .btn {
            padding: 10px 20px;
            border-radius: var(--radius);
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            flex: 1;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-outline {
            background: white;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Map View Placeholder */
        .map-view {
            height: 400px;
            background: linear-gradient(135deg, #e0f2fe, #dbeafe);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            margin-bottom: 24px;
            display: none;
        }

        .map-view.active {
            display: flex;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 32px;
            padding-top: 32px;
            border-top: 1px solid var(--border);
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border-radius: var(--radius);
            border: 2px solid var(--border);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .page-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .page-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* Stats Banner */
        .stats-banner {
            background: linear-gradient(135deg, var(--eco-green), var(--success));
            color: white;
            padding: 24px;
            border-radius: var(--radius-lg);
            margin-bottom: 32px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .stat {
            text-align: center;
            min-width: 120px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 13px;
            opacity: 0.9;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .search-form {
                grid-template-columns: 1fr 1fr;
            }

            .search-select:first-of-type {
                grid-column: span 2;
            }
        }

        @media (max-width: 968px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .sidebar-filters {
                position: static;
                margin-bottom: 24px;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 72px;
                left: -100%;
                width: 100%;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: var(--shadow-lg);
                transition: left 0.3s ease;
                z-index: 999;
            }

            .nav-links.active {
                left: 0;
            }

            .search-title {
                font-size: 1.8rem;
            }

            .search-form {
                grid-template-columns: 1fr;
            }

            .offer-main {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .offer-badges {
                position: static;
                margin-bottom: 16px;
                justify-content: center;
            }

            .offer-pricing {
                text-align: center;
                margin-top: 16px;
                padding-top: 16px;
                border-top: 1px solid var(--border);
            }

            .results-header {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .sort-options {
                flex-direction: column;
                width: 100%;
                align-items: stretch;
            }

            .stats-banner {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 16px;
            }

            .logo-text {
                display: none;
            }

            .filter-tags {
                gap: 8px;
            }

            .offer-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .pagination {
                gap: 4px;
            }

            .page-btn {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }
        }

        /* Hide/Show elements based on language */
        [data-lang] {
            display: none;
        }

        [data-lang].active {
            display: inline-block;
        }

        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        .mobile-menu-overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="logo">
                <div class="logo-icon">JC</div>
                <span class="logo-text" data-lang="fr" class="active">Je confie</span>
                <span class="logo-text" data-lang="en">I entrust</span>
            </a>

            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>

            <div class="nav-links" id="navLinks">
                <a href="/create-offer" class="nav-link create">
                    ➕ <span data-lang="fr" class="active">Créer une annonce</span>
                    <span data-lang="en">Create listing</span>
                </a>
                <a href="{{ url('/user/dashboard') }}" class="nav-link">
                    <span data-lang="fr" class="active">Tableau de bord</span>
                    <span data-lang="en">Dashboard</span>
                </a>
                <a href="/messages" class="nav-link">
                    <span data-lang="fr" class="active">Messages</span>
                    <span data-lang="en">Messages</span>
                </a>

                <div class="language-switcher">
                    <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                    <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
                </div>
            </div>
        </div>
    </nav>

    <div class="mobile-menu-overlay" id="mobileMenuOverlay" onclick="toggleMobileMenu()"></div>

    <!-- Search Header -->
    <div class="search-header">
        <div class="search-container">
            <h1 class="search-title">
                <span data-lang="fr" class="active">Trouvez le transport idéal pour vos colis</span>
                <span data-lang="en">Find the perfect transport for your packages</span>
            </h1>
            <p class="search-subtitle">
                <span data-lang="fr" class="active">Des milliers de voyageurs et transporteurs disponibles</span>
                <span data-lang="en">Thousands of travelers and carriers available</span>
            </p>

            <!-- Search Bar -->
            <div class="search-bar">
                <div class="search-form">
                    <div class="search-input-group">
                        <span class="search-icon">📍</span>
                        <input type="text" class="search-input"
                               data-placeholder-fr="Ville de départ"
                               data-placeholder-en="Departure city"
                               placeholder="Ville de départ">
                    </div>

                    <div class="search-input-group">
                        <span class="search-icon">📍</span>
                        <input type="text" class="search-input"
                               data-placeholder-fr="Ville d'arrivée"
                               data-placeholder-en="Arrival city"
                               placeholder="Ville d'arrivée">
                    </div>

                    <select class="search-select">
                        <option value="">
                            <span data-lang="fr" class="active">Type de service</span>
                            <span data-lang="en">Service type</span>
                        </option>
                        <option value="reservation">
                            <span data-lang="fr" class="active">Voyage réservation</span>
                            <span data-lang="en">Travel reservation</span>
                        </option>
                        <option value="cotransport">Co-transport</option>
                    </select>

                    <select class="search-select">
                        <option value="">
                            <span data-lang="fr" class="active">Date</span>
                            <span data-lang="en">Date</span>
                        </option>
                        <option value="today">
                            <span data-lang="fr" class="active">Aujourd'hui</span>
                            <span data-lang="en">Today</span>
                        </option>
                        <option value="tomorrow">
                            <span data-lang="fr" class="active">Demain</span>
                            <span data-lang="en">Tomorrow</span>
                        </option>
                        <option value="week">
                            <span data-lang="fr" class="active">Cette semaine</span>
                            <span data-lang="en">This week</span>
                        </option>
                    </select>

                    <button class="search-btn">
                        🔍 <span data-lang="fr" class="active">Rechercher</span>
                        <span data-lang="en">Search</span>
                    </button>
                </div>

                <!-- Quick Filters -->
                <div class="filter-tags">
                    <div class="filter-tag active">
                        <span data-lang="fr" class="active">Tous</span>
                        <span data-lang="en">All</span>
                    </div>
                    <div class="filter-tag">✈️ <span data-lang="fr" class="active">Avion</span><span data-lang="en">Plane</span></div>
                    <div class="filter-tag">🚄 <span data-lang="fr" class="active">Train</span><span data-lang="en">Train</span></div>
                    <div class="filter-tag">🚛 Co-transport</div>
                    <div class="filter-tag">🚢 <span data-lang="fr" class="active">Bateau</span><span data-lang="en">Ship</span></div>
                    <div class="filter-tag">
                        🛡️ <span data-lang="fr" class="active">Assuré</span>
                        <span data-lang="en">Insured</span>
                    </div>
                    <div class="filter-tag">
                        ⚡ Express
                    </div>
                    <div class="filter-tag">
                        🌍 International
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Sidebar Filters -->
        <aside class="sidebar-filters">
            <div class="filter-section">
                <h3 class="filter-title">
                    <span data-lang="fr" class="active">Type de transport</span>
                    <span data-lang="en">Transport type</span>
                </h3>
                <label class="filter-option">
                    <input type="checkbox" checked>
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">✈️ <span data-lang="fr" class="active">Avion</span><span data-lang="en">Plane</span></span>
                    <span class="filter-count">145</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" checked>
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">🚄 Train</span>
                    <span class="filter-count">89</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">🚌 Bus</span>
                    <span class="filter-count">34</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">🚢 <span data-lang="fr" class="active">Bateau</span><span data-lang="en">Ship</span></span>
                    <span class="filter-count">21</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" checked>
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">🚗 <span data-lang="fr" class="active">Voiture</span><span data-lang="en">Car</span></span>
                    <span class="filter-count">67</span>
                </label>
            </div>

            <div class="filter-section">
                <h3 class="filter-title">
                    <span data-lang="fr" class="active">Gamme de prix</span>
                    <span data-lang="en">Price range</span>
                </h3>
                <div class="price-range">
                    <input type="range" min="0" max="500" value="250" style="width: 100%;">
                    <div class="range-values" style="display: flex; justify-content: space-between; margin-top: 8px;">
                        <span>0€</span>
                        <span>500€+</span>
                    </div>
                </div>
            </div>

            <div class="filter-section">
                <h3 class="filter-title">
                    <span data-lang="fr" class="active">Poids max</span>
                    <span data-lang="en">Max weight</span>
                </h3>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">< 5 kg</span>
                    <span class="filter-count">89</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">5-15 kg</span>
                    <span class="filter-count">156</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">15-30 kg</span>
                    <span class="filter-count">78</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">> 30 kg</span>
                    <span class="filter-count">33</span>
                </label>
            </div>

            <div class="filter-section">
                <h3 class="filter-title">Options</h3>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">
                        🛡️ <span data-lang="fr" class="active">Assuré</span>
                        <span data-lang="en">Insured</span>
                    </span>
                    <span class="filter-count">234</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">
                        ✅ <span data-lang="fr" class="active">Vérifié</span>
                        <span data-lang="en">Verified</span>
                    </span>
                    <span class="filter-count">189</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox">
                    <div class="filter-checkbox"></div>
                    <span class="filter-label">
                        ⚡ <span data-lang="fr" class="active">Livraison express</span>
                        <span data-lang="en">Express delivery</span>
                    </span>
                    <span class="filter-count">45</span>
                </label>
            </div>
        </aside>

        <!-- Results Section -->
        <div>
            <!-- Stats Banner -->
            <div class="stats-banner">
                <div class="stat">
                    <div class="stat-value">356</div>
                    <div class="stat-label">
                        <span data-lang="fr" class="active">Offres disponibles</span>
                        <span data-lang="en">Available offers</span>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-value">-65%</div>
                    <div class="stat-label">
                        <span data-lang="fr" class="active">Économie moyenne</span>
                        <span data-lang="en">Average savings</span>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-value">4.8/5</div>
                    <div class="stat-label">
                        <span data-lang="fr" class="active">Note moyenne</span>
                        <span data-lang="en">Average rating</span>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-value">24h</div>
                    <div class="stat-label">
                        <span data-lang="fr" class="active">Réponse moyenne</span>
                        <span data-lang="en">Average response</span>
                    </div>
                </div>
            </div>

            <div class="results-section">
                <div class="results-header">
                    <div class="results-count">
                        <strong>{{ count($userriderequests) }}</strong>
                        <span data-lang="fr" class="active">annonces trouvées</span>
                        <span data-lang="en">listings found</span>
                    </div>

                    <div class="sort-options">
                        <span style="font-size: 14px; color: var(--gray);">
                            <span data-lang="fr" class="active">Trier par:</span>
                            <span data-lang="en">Sort by:</span>
                        </span>
                        <select class="sort-select" id="sortSelect">
                            <option value="relevance">
                                <span data-lang="fr" class="active">Pertinence</span>
                                <span data-lang="en">Relevance</span>
                            </option>
                            <option value="price-asc">
                                <span data-lang="fr" class="active">Prix croissant</span>
                                <span data-lang="en">Price: Low to High</span>
                            </option>
                            <option value="price-desc">
                                <span data-lang="fr" class="active">Prix décroissant</span>
                                <span data-lang="en">Price: High to Low</span>
                            </option>
                            <option value="date">
                                <span data-lang="fr" class="active">Date proche</span>
                                <span data-lang="en">Soonest date</span>
                            </option>
                        </select>

                        <div class="view-toggles">
                            <button class="view-toggle active" onclick="toggleView('list')">📋</button>
                            <button class="view-toggle" onclick="toggleView('map')">🗺️</button>
                        </div>
                    </div>
                </div>

                <!-- Map View (Hidden by default) -->
                <div class="map-view" id="mapView">
                    <div>
                        <div style="font-size: 48px; margin-bottom: 16px;">🗺️</div>
                        <div style="font-weight: 600;">
                            <span data-lang="fr" class="active">Vue carte</span>
                            <span data-lang="en">Map view</span>
                        </div>
                    </div>
                </div>

                <!-- Offers Grid -->
                <div class="offers-grid" id="listView">
                    <!-- Offer Card 1 - Reservation -->
                    <div style="display: none" class="offer-card">
                        <div class="offer-badges">
                            <span class="offer-badge verified">✓ <span data-lang="fr" class="active">Vérifié</span><span data-lang="en">Verified</span></span>
                            <span class="offer-badge insured">🛡️ <span data-lang="fr" class="active">Assuré</span><span data-lang="en">Insured</span></span>
                        </div>

                        <div class="offer-main">
                            <div class="offer-type-icon">✈️</div>

                            <div class="offer-details">
                                <div class="offer-route">
                                    <span class="route-city">Paris CDG</span>
                                    <span class="route-arrow">→</span>
                                    <span class="route-city">New York JFK</span>
                                </div>

                                <div class="offer-info">
                                    <span class="info-item">📅 <span data-lang="fr" class="active">28 janvier 2025</span><span data-lang="en">January 28, 2025</span></span>
                                    <span class="info-item">⏰ 14h30</span>
                                    <span class="info-item">✈️ Air France AF022</span>
                                    <span class="info-item">💼 <span data-lang="fr" class="active">15 kg disponibles</span><span data-lang="en">15 kg available</span></span>
                                </div>

                                <div class="offer-user">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100" alt="Thomas" class="user-avatar">
                                    <div class="user-info">
                                        <div class="user-name">Thomas M.</div>
                                        <div class="user-rating">
                                            ⭐ 4.9 (<span data-lang="fr" class="active">127 avis</span><span data-lang="en">127 reviews</span>)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="offer-pricing">
                                <div class="price-value">12€</div>
                                <div class="price-unit"><span data-lang="fr" class="active">par kg</span><span data-lang="en">per kg</span></div>
                                <div class="price-savings">-65% vs DHL</div>
                            </div>
                        </div>

                        <div class="offer-actions">
                            <button class="btn btn-primary">
                                <span data-lang="fr" class="active">Réserver</span>
                                <span data-lang="en">Book</span>
                            </button>
                            <button class="btn btn-outline">
                                <span data-lang="fr" class="active">Détails</span>
                                <span data-lang="en">Details</span>
                            </button>
                            <button class="btn btn-outline">💬</button>
                        </div>
                    </div>

                    <!-- Offer Card 2 - Co-transport -->
                    @foreach($userriderequests as $offer)
                        @php
                            // Determine transport icon
                            $transportIcon = '✨';
                            if($offer->vehicle_type_needed) {
                                if(stripos($offer->vehicle_type_needed, 'traveler') !== false) $transportIcon = '✈️';
                                elseif(stripos($offer->vehicle_type_needed, 'Truck') !== false || stripos($offer->transport_title, 'Eurostar') !== false) $transportIcon = '🚛';
                                elseif(stripos($offer->vehicle_type_needed, 'Van') !== false) $transportIcon = '🚐';
                                elseif(stripos($offer->vehicle_type_needed, 'Car') !== false) $transportIcon = '🚗';
                                else $transportIcon = '🚢';
                            }

                            $routeFrom = $offer->pickup_location ?? '-';
                            $routeTo = $offer->destination_location ? $offer->destination_location ?? '-' : '-';
                            $packageTypes = json_decode($offer->type_of_package) ?? [];
                        @endphp
                    <div class="offer-card">
                        <div class="offer-badges">
                            @if($offer->is_urgent)
                            <span class="offer-badge urgent">⚡ Urgent</span>
                            @endif
                                @if($offer->is_personal)
                                    <span class="offer-badge urgent">⚡ Personal</span>
                                @endif
                                @if($offer->is_professional)
                            <span class="offer-badge insured">🛡️ <span data-lang="fr" class="active">Assuré</span><span data-lang="en">Professional</span></span>
                                @endif
                        </div>

                        <div class="offer-main">
                            <div class="offer-type-icon">{{ $transportIcon }} {{ $offer->vehicle_type_needed ?? '-' }}</div>

                            <div class="offer-details">
                                <div class="offer-route">
                                    <span class="route-city">{{ $routeFrom }}</span>
                                    <span class="route-arrow">→</span>
                                    <span class="route-city">{{ $routeTo }}</span>
                                </div>

                                <div class="offer-info">
                                    <span class="info-item">📅 <span data-lang="fr" class="active">Demain</span><span data-lang="en">{{ \Illuminate\Support\Carbon::parse($offer->pickup_date)->format('l, j F Y') }}</span></span>
                                    <span class="info-item">⏰ {{ round(now()->diffInHours(\Illuminate\Support\Carbon::parse($offer->pickup_date), false)) }}h</span>
                                    <span class="info-item">{{ $transportIcon }} {{ $offer->vehicle_type_needed }}</span>
                                </div>

                                <div class="offer-user">
                                    <img
                                        src="https://ui-avatars.com/api/?name={{ urlencode($offer->user->firstName . ' ' . $offer->user->lastName) }}&background=random&color=fff"
                                        alt="{{ $offer->user->firstName }} {{ $offer->user->lastName }}"
                                        class="rounded-full w-10 h-10 user-avatar"
                                    />
                                    <div class="user-info">
                                        <div class="user-name">{{ $offer->user->firstName }} {{ $offer->user->lastName }}.</div>
                                        <div class="user-rating">
                                            ⭐ 4.6 (<span data-lang="fr" class="active">89 avis</span><span data-lang="en">89 reviews</span>)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="offer-pricing">
                                <div class="price-value">{{ $offer->fare }}€</div>
                                <div class="price-unit">Total</div>
                                <div class="price-savings">-70% vs pro</div>
                            </div>
                        </div>

                        <div class="offer-actions">
                            <a href="{{ url('driver/accept-ride/'.$offer->id) }}" class="btn btn-primary" style="background: var(--warning);">
                                <span data-lang="fr" class="active">Négocier</span>
                                <span data-lang="en">Negotiate</span>
                            </a>
                            <button class="btn btn-outline">
                                <span data-lang="fr" class="active">Détails</span>
                                <span data-lang="en">Details</span>
                            </button>
                            <button class="btn btn-outline">💬</button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="page-btn">←</button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">4</button>
                    <button class="page-btn">5</button>
                    <button class="page-btn">→</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Language system
        let currentLang = localStorage.getItem('preferredLanguage') || 'fr';

        function switchLanguage(lang) {
            currentLang = lang;
            localStorage.setItem('preferredLanguage', lang);

            // Update button states
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.remove('active');
                if (btn.textContent.toLowerCase() === lang) {
                    btn.classList.add('active');
                }
            });

            // Update text content
            document.querySelectorAll('[data-lang]').forEach(element => {
                if (element.getAttribute('data-lang') === lang) {
                    element.classList.add('active');
                } else {
                    element.classList.remove('active');
                }
            });

            // Update placeholders
            document.querySelectorAll('[data-placeholder-fr]').forEach(input => {
                const placeholderFr = input.getAttribute('data-placeholder-fr');
                const placeholderEn = input.getAttribute('data-placeholder-en');
                input.placeholder = lang === 'fr' ? placeholderFr : placeholderEn;
            });

            // Update select options
            updateSelectOptions(lang);
        }

        function updateSelectOptions(lang) {
            const sortSelect = document.getElementById('sortSelect');
            if (sortSelect) {
                const options = {
                    'relevance': { fr: 'Pertinence', en: 'Relevance' },
                    'price-asc': { fr: 'Prix croissant', en: 'Price: Low to High' },
                    'price-desc': { fr: 'Prix décroissant', en: 'Price: High to Low' },
                    'date': { fr: 'Date proche', en: 'Soonest date' }
                };

                Array.from(sortSelect.options).forEach((option, index) => {
                    const value = option.value;
                    if (options[value]) {
                        option.text = options[value][lang];
                    }
                });
            }
        }

        // Toggle mobile menu
        function toggleMobileMenu() {
            const navLinks = document.getElementById('navLinks');
            const overlay = document.getElementById('mobileMenuOverlay');
            navLinks.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Toggle view between list and map
        function toggleView(view) {
            document.querySelectorAll('.view-toggle').forEach(btn => {
                btn.classList.remove('active');
            });
            event.currentTarget.classList.add('active');

            if (view === 'map') {
                document.getElementById('mapView').classList.add('active');
                document.getElementById('listView').style.display = 'none';
            } else {
                document.getElementById('mapView').classList.remove('active');
                document.getElementById('listView').style.display = 'grid';
            }
        }

        // Filter results function
        function filterResults() {
            console.log('Filtering results...');
            // Implement actual filtering logic here
        }

        // Quick filter tags
        document.querySelectorAll('.filter-tag').forEach(tag => {
            tag.addEventListener('click', function() {
                this.classList.toggle('active');
                filterResults();
            });
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            switchLanguage(currentLang);
        });
    </script>
</body>
</html>
