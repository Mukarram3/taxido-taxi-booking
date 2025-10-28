<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propositions reçues - Co-transport #CT2024-0847 - Je confie</title>
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
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 24px;
            align-items: center;
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

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            padding: 8px;
        }

        /* Hide/Show elements based on language */
        [data-lang] {
            display: none;
        }

        [data-lang].active {
            display: inline-block;
        }

        /* Main Container */
        .main-container {
            max-width: 1280px;
            margin: 100px auto 40px;
            padding: 0 20px;
        }

        /* Offer Header */
        .offer-header {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: var(--shadow);
        }

        .offer-title-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .offer-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .offer-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            color: var(--gray);
            font-size: 14px;
        }

        .offer-status {
            padding: 8px 16px;
            background: var(--warning);
            color: white;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .transport-summary {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            padding: 20px;
            background: var(--light);
            border-radius: var(--radius-lg);
        }

        .route-compact {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .route-point-compact {
            flex: 1;
        }

        .route-city-compact {
            font-weight: 600;
            color: var(--dark);
        }

        .route-date-compact {
            font-size: 13px;
            color: var(--gray);
            margin-top: 2px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .stat-icon.primary {
            background: linear-gradient(135deg, rgba(80, 70, 229, 0.1), rgba(80, 70, 229, 0.2));
            color: var(--primary);
        }

        .stat-icon.success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.2));
            color: var(--success);
        }

        .stat-icon.warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.2));
            color: var(--warning);
        }

        .stat-icon.info {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1), rgba(6, 182, 212, 0.2));
            color: var(--secondary);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--gray);
        }

        .stat-change {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid var(--border);
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .stat-change.positive {
            color: var(--success);
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* Filters Section */
        .filters-section {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow);
        }

        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .filters-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
        }

        .filter-tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 10px 20px;
            background: var(--light);
            border: 2px solid transparent;
            border-radius: var(--radius);
            font-weight: 600;
            font-size: 14px;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .filter-tab:hover {
            background: white;
            border-color: var(--border);
        }

        .filter-tab.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .filter-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--danger);
            color: white;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 100px;
            min-width: 18px;
            text-align: center;
        }

        .filter-controls {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80, 70, 229, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .sort-dropdown {
            padding: 10px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sort-dropdown:hover {
            border-color: var(--primary);
        }

        /* Proposals List */
        .proposals-list {
            display: grid;
            gap: 16px;
        }

        .proposal-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .proposal-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .proposal-card.selected {
            border: 2px solid var(--primary);
        }

        .proposal-status-ribbon {
            position: absolute;
            top: 20px;
            right: -35px;
            transform: rotate(45deg);
            padding: 6px 40px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .proposal-status-ribbon.negotiating {
            background: var(--warning);
            color: white;
        }

        .proposal-status-ribbon.new {
            background: var(--success);
            color: white;
        }

        .proposal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .transporter-info {
            display: flex;
            align-items: center;
            gap: 16px;
            flex: 1;
        }

        .transporter-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border);
        }

        .transporter-details {
            flex: 1;
        }

        .transporter-name {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .transporter-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--gray);
        }

        .rating-stars {
            color: var(--warning);
        }

        .transporter-badges {
            display: flex;
            gap: 6px;
            margin-top: 6px;
        }

        .badge {
            padding: 3px 8px;
            background: var(--light);
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
            color: var(--gray);
        }

        .badge.verified {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: var(--eco-green);
        }

        .proposal-price {
            text-align: right;
        }

        .price-label {
            font-size: 12px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .price-amount {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .price-original {
            font-size: 14px;
            color: var(--gray);
            text-decoration: line-through;
        }

        .price-saving {
            font-size: 13px;
            color: var(--success);
            font-weight: 600;
        }

        .proposal-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            padding: 20px;
            background: var(--light);
            border-radius: var(--radius-lg);
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-icon {
            font-size: 18px;
        }

        .detail-text {
            font-size: 14px;
            color: var(--dark);
        }

        .proposal-message {
            padding: 16px;
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: var(--radius-lg);
            margin-bottom: 20px;
            position: relative;
        }

        .message-quote {
            font-style: italic;
            color: var(--dark);
            font-size: 14px;
            line-height: 1.6;
        }

        .message-quote::before {
            content: '"';
            font-size: 32px;
            color: var(--primary);
            position: absolute;
            top: 8px;
            left: 8px;
        }

        .proposal-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border-radius: var(--radius);
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
            flex: 1;
            min-width: 140px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #dc8a0a;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: white;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-outline:hover {
            background: var(--light);
        }

        .btn-danger-outline {
            background: white;
            color: var(--danger);
            border: 2px solid var(--danger);
        }

        .btn-danger-outline:hover {
            background: var(--danger);
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
        }

        .empty-icon {
            font-size: 64px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .empty-text {
            color: var(--gray);
            margin-bottom: 24px;
        }

        /* Loading State */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid var(--light);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Comparison Mode */
        .comparison-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 2px solid var(--border);
            padding: 16px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            z-index: 900;
            box-shadow: var(--shadow-xl);
        }

        .comparison-bar.active {
            transform: translateY(0);
        }

        .comparison-content {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comparison-selected {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .selected-count {
            font-weight: 600;
            color: var(--dark);
        }

        .comparison-actions {
            display: flex;
            gap: 12px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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

            .main-container {
                margin-top: 90px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .transport-summary {
                grid-template-columns: 1fr;
            }

            .filter-tabs {
                width: 100%;
                order: 2;
            }

            .filter-controls {
                width: 100%;
                order: 1;
            }

            .search-box {
                width: 100%;
            }

            .proposal-header {
                flex-direction: column;
                gap: 16px;
            }

            .proposal-price {
                text-align: left;
                border-top: 1px solid var(--border);
                padding-top: 16px;
            }

            .proposal-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .comparison-content {
                flex-direction: column;
                gap: 12px;
            }

            .comparison-actions {
                width: 100%;
            }

            .comparison-actions .btn {
                flex: 1;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 16px;
            }

            .logo-text {
                display: none;
            }

            .offer-title {
                font-size: 1.25rem;
            }

            .stat-value {
                font-size: 1.5rem;
            }

            .price-amount {
                font-size: 1.5rem;
            }

            .proposal-details {
                grid-template-columns: 1fr;
            }
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

@php
    $icons = [
                                                'pedestrian' => '🚶',
                                                'Car' => '🚗',
                                                'Taxi / VTC' => '🚕',
                                                'bus' => '🚌',
                                                'coach' => '🚐',
                                                'Van' => '🚐',
                                                'bicycle' => '🚲',
                                                'motorcycle' => '🛵',
                                                'Truck' => '🚜',
                                                '4×4' => '🚙',
                                                'plane' => '✈️',
                                                'Helicopter' => '🚁',
                                                'Ferry/cruise ship' => '🚢',
                                                'Cargo/cargo ship' => '⛴️',
                                                'Speedboat' => '🚤',
                                                'Kayak/canoe' => '🛶',
                                                'train' => '🚆',
                                                'TGV' => '🚄',
                                                'Tram' => '🚈',
                                                'Metro' => '🚇',
                                            ];
@endphp

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
            <a href="{{ url('user/my-rides') }}" class="nav-link">
                <span data-lang="fr" class="active">Mes annonces</span>
                <span data-lang="en">My offers</span>
            </a>
            <a href="/messages" class="nav-link">
                <span data-lang="fr" class="active">Messages</span>
                <span data-lang="en">Messages</span>
            </a>
            <a href="{{ url('user/dashboard') }}" class="nav-link">
                <span data-lang="fr" class="active">Tableau de bord</span>
                <span data-lang="en">Dashboard</span>
            </a>
            <a href="/profile" class="nav-link">
                <span data-lang="fr" class="active">Profil</span>
                <span data-lang="en">Profile</span>
            </a>

            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
        </div>
    </div>
</nav>

<div class="mobile-menu-overlay" id="mobileMenuOverlay" onclick="toggleMobileMenu()"></div>

<!-- Main Container -->
<div class="main-container">
    <!-- Offer Header -->
    <div class="offer-header">
        <div class="offer-title-section">
            <div>
                <h1 class="offer-title">
                    <span data-lang="fr" class="active">Propositions reçues</span>
                    <span data-lang="en">Received proposals</span>
                </h1>
                <div class="offer-meta">
                    <span>📦 Référence: CT2024-0847</span>
                    <span>•</span>
                    <span>
                            <span data-lang="fr" class="active">Publié il y a 2 jours</span>
                            <span data-lang="en">Published 2 days ago</span>
                        </span>
                    <span>•</span>
                    <span>
                            <span data-lang="fr" class="active">Expire dans 48h</span>
                            <span data-lang="en">Expires in 48h</span>
                        </span>
                </div>
            </div>
            <div class="offer-status">
                ⏳ <span data-lang="fr" class="active">En recherche</span>
                <span data-lang="en">Searching</span>
            </div>
        </div>

        <div class="transport-summary">
            <div class="route-compact">
                <div class="route-point-compact">
                    <div class="route-city-compact">📍 Lyon</div>
                    <div class="route-date-compact">
                        <span data-lang="fr" class="active">Demain - 14h00</span>
                        <span data-lang="en">Tomorrow - 2:00 PM</span>
                    </div>
                </div>
                <span style="font-size: 20px; color: var(--primary);">→</span>
                <div class="route-point-compact">
                    <div class="route-city-compact">📍 Marseille</div>
                    <div class="route-date-compact">
                        <span data-lang="fr" class="active">Demain - 18h00</span>
                        <span data-lang="en">Tomorrow - 6:00 PM</span>
                    </div>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 24px;">
                <div>
                    <div style="font-size: 12px; color: var(--gray); margin-bottom: 4px;">
                        <span data-lang="fr" class="active">COLIS</span>
                        <span data-lang="en">PACKAGE</span>
                    </div>
                    <div style="font-weight: 600; color: var(--dark);">🛋️ Canapé 3 places + Table</div>
                </div>
                <div>
                    <div style="font-size: 12px; color: var(--gray); margin-bottom: 4px;">
                        <span data-lang="fr" class="active">POIDS</span>
                        <span data-lang="en">WEIGHT</span>
                    </div>
                    <div style="font-weight: 600; color: var(--dark);">~80kg</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon primary">📨</div>
            <div class="stat-value">12</div>
            <div class="stat-label">
                <span data-lang="fr" class="active">Propositions totales</span>
                <span data-lang="en">Total proposals</span>
            </div>
            <div class="stat-change positive">
                ↗️ +3 <span data-lang="fr" class="active">aujourd'hui</span>
                <span data-lang="en">today</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">✨</div>
            <div class="stat-value">4</div>
            <div class="stat-label">
                <span data-lang="fr" class="active">Nouvelles propositions</span>
                <span data-lang="en">New proposals</span>
            </div>
            <div class="stat-change positive">
                <span data-lang="fr" class="active">Non lues</span>
                <span data-lang="en">Unread</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon warning">💬</div>
            <div class="stat-value">3</div>
            <div class="stat-label">
                <span data-lang="fr" class="active">En négociation</span>
                <span data-lang="en">In negotiation</span>
            </div>
            <div class="stat-change">
                <span data-lang="fr" class="active">Réponse attendue</span>
                <span data-lang="en">Awaiting response</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon info">💰</div>
            <div class="stat-value">45€ - 90€</div>
            <div class="stat-label">
                <span data-lang="fr" class="active">Fourchette de prix</span>
                <span data-lang="en">Price range</span>
            </div>
            <div class="stat-change">
                <span data-lang="fr" class="active">Prix moyen: 65€</span>
                <span data-lang="en">Average: €65</span>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="filters-section">
        <div class="filters-header">
            <h2 class="filters-title">
                <span data-lang="fr" class="active">Filtrer les propositions</span>
                <span data-lang="en">Filter proposals</span>
            </h2>
            <div class="filter-controls">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text"
                           class="search-input"
                           data-placeholder-fr="Rechercher un transporteur..."
                           data-placeholder-en="Search for a transporter..."
                           placeholder="Rechercher un transporteur...">
                </div>
                <select class="sort-dropdown">
                    <option data-lang="fr" class="active">Prix croissant</option>
                    <option data-lang="en">Price ascending</option>
                    <option data-lang="fr" class="active">Prix décroissant</option>
                    <option data-lang="en">Price descending</option>
                    <option data-lang="fr" class="active">Plus récentes</option>
                    <option data-lang="en">Most recent</option>
                    <option data-lang="fr" class="active">Meilleures notes</option>
                    <option data-lang="en">Best ratings</option>
                </select>
            </div>
        </div>
        <div class="filter-tabs">
            <div class="filter-tab active" onclick="filterProposals('all',event)">
                <span data-lang="fr" class="active">Toutes</span>
                <span data-lang="en">All</span>
                <span class="filter-count">12</span>
            </div>
            <div class="filter-tab" onclick="filterProposals('new', event)">
                <span data-lang="fr" class="active">Nouvelles</span>
                <span data-lang="en">New</span>
                <span class="filter-count">4</span>
            </div>
            <div class="filter-tab" onclick="filterProposals('negotiating', event)">
                <span data-lang="fr" class="active">En négociation</span>
                <span data-lang="en">Negotiating</span>
                <span class="filter-count">3</span>
            </div>
            <div class="filter-tab" onclick="filterProposals('pending_offers', event)">
                <span data-lang="fr" class="active">Pending Offers</span>
                <span data-lang="en">Pending Offers</span>
                <span class="filter-count">{{ count($pending_offers) }}</span>
            </div>
            <div class="filter-tab" onclick="filterProposals('accepted', event)">
                <span data-lang="fr" class="active">Acceptées</span>
                <span data-lang="en">Accepted</span>
                <span class="filter-count">{{ count($pending_rides) }}</span>
            </div>
            <div class="filter-tab" onclick="filterProposals('rejected', event)">
                <span data-lang="fr" class="active">Refusées</span>
                <span data-lang="en">Rejected</span>
                <span class="filter-count">4</span>
            </div>
        </div>
    </div>

    <!-- Proposals List -->
    <div class="proposals-list" id="proposalsList">
        <!-- Proposal 1 - New -->
        <div class="proposal-card" data-status="new">
            <div class="proposal-status-ribbon new">
                <span data-lang="fr" class="active">NOUVEAU</span>
                <span data-lang="en">NEW</span>
            </div>
            <div class="proposal-header">
                <div class="transporter-info">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100"
                         alt="Jean"
                         class="transporter-avatar">
                    <div class="transporter-details">
                        <div class="transporter-name">Jean-Marc D.</div>
                        <div class="transporter-rating">
                            <span class="rating-stars">⭐⭐⭐⭐⭐</span>
                            <span>4.9 (156 <span data-lang="fr" class="active">avis</span><span
                                    data-lang="en">reviews</span>)</span>
                        </div>
                        <div class="transporter-badges">
                            <span class="badge verified">✓ <span data-lang="fr" class="active">Vérifié</span><span
                                    data-lang="en">Verified</span></span>
                            <span class="badge">🛡️ <span data-lang="fr" class="active">Assuré</span><span
                                    data-lang="en">Insured</span></span>
                            <span class="badge">⚡ <span data-lang="fr" class="active">Pro</span><span
                                    data-lang="en">Pro</span></span>
                        </div>
                    </div>
                </div>
                <div class="proposal-price">
                    <div class="price-label">
                        <span data-lang="fr" class="active">PROPOSITION</span>
                        <span data-lang="en">OFFER</span>
                    </div>
                    <div class="price-amount">55€</div>
                    <div class="price-saving">
                        <span data-lang="fr" class="active">Le moins cher!</span>
                        <span data-lang="en">Cheapest!</span>
                    </div>
                </div>
            </div>

            <div class="proposal-details">
                <div class="detail-item">
                    <span class="detail-icon">🚐</span>
                    <span class="detail-text">Peugeot Boxer</span>
                </div>
                <div class="detail-item">
                    <span class="detail-icon">📅</span>
                    <span class="detail-text">
                            <span data-lang="fr" class="active">Départ confirmé demain</span>
                            <span data-lang="en">Departure confirmed tomorrow</span>
                        </span>
                </div>
                <div class="detail-item">
                    <span class="detail-icon">👥</span>
                    <span class="detail-text">
                            <span data-lang="fr" class="active">Aide au chargement</span>
                            <span data-lang="en">Loading assistance</span>
                        </span>
                </div>
                <div class="detail-item">
                    <span class="detail-icon">⏱️</span>
                    <span class="detail-text">
                            <span data-lang="fr" class="active">Livraison express</span>
                            <span data-lang="en">Express delivery</span>
                        </span>
                </div>
            </div>

            <div class="proposal-message">
                <div class="message-quote">
                    <span data-lang="fr" class="active">Je fais ce trajet demain pour une livraison professionnelle. J'ai de la place disponible et je peux vous aider pour le chargement/déchargement. Prix tout compris, pas de surprises!</span>
                    <span data-lang="en">I'm making this trip tomorrow for a professional delivery. I have available space and can help with loading/unloading. All-inclusive price, no surprises!</span>
                </div>
            </div>

            <div class="proposal-actions">
                <button class="btn btn-primary" onclick="acceptProposal(1)">
                    ✅ <span data-lang="fr" class="active">Accepter</span>
                    <span data-lang="en">Accept</span>
                </button>
                <button class="btn btn-warning" onclick="negotiateProposal(1)">
                    💬 <span data-lang="fr" class="active">Négocier</span>
                    <span data-lang="en">Negotiate</span>
                </button>
                <button class="btn btn-outline" onclick="viewProfile(1)">
                    👤 <span data-lang="fr" class="active">Voir profil</span>
                    <span data-lang="en">View profile</span>
                </button>
                <button class="btn btn-danger-outline" onclick="rejectProposal(1)">
                    ❌ <span data-lang="fr" class="active">Refuser</span>
                    <span data-lang="en">Reject</span>
                </button>
            </div>
        </div>

        <!-- Proposal 2 - In Negotiation -->
        <div class="proposal-card" data-status="negotiating">
            <div class="proposal-status-ribbon negotiating">
                <span data-lang="fr" class="active">NÉGOCIATION</span>
                <span data-lang="en">NEGOTIATING</span>
            </div>
            <div class="proposal-header">
                <div class="transporter-info">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100"
                         alt="Pierre"
                         class="transporter-avatar">
                    <div class="transporter-details">
                        <div class="transporter-name">Pierre L.</div>
                        <div class="transporter-rating">
                            <span class="rating-stars">⭐⭐⭐⭐</span>
                            <span>4.6 (89 <span data-lang="fr" class="active">avis</span><span
                                    data-lang="en">reviews</span>)</span>
                        </div>
                        <div class="transporter-badges">
                            <span class="badge verified">✓ <span data-lang="fr" class="active">Vérifié</span><span
                                    data-lang="en">Verified</span></span>
                            <span class="badge">🚗 <span data-lang="fr" class="active">Particulier</span><span
                                    data-lang="en">Individual</span></span>
                        </div>
                    </div>
                </div>
                <div class="proposal-price">
                    <div class="price-label">
                        <span data-lang="fr" class="active">DERNIÈRE OFFRE</span>
                        <span data-lang="en">LAST OFFER</span>
                    </div>
                    <div class="price-amount">70€</div>
                    <div class="price-original">
                        <span data-lang="fr" class="active">Initial: 85€</span>
                        <span data-lang="en">Initial: €85</span>
                    </div>
                </div>
            </div>

            <div class="proposal-details">
                <div class="detail-item">
                    <span class="detail-icon">🚙</span>
                    <span class="detail-text">Mercedes Vito</span>
                </div>
                <div class="detail-item">
                    <span class="detail-icon">📅</span>
                    <span class="detail-text">
                            <span data-lang="fr" class="active">Flexible sur horaire</span>
                            <span data-lang="en">Flexible schedule</span>
                        </span>
                </div>
                <div class="detail-item">
                    <span class="detail-icon">📦</span>
                    <span class="detail-text">
                            <span data-lang="fr" class="active">Transport régulier</span>
                            <span data-lang="en">Regular transport</span>
                        </span>
                </div>
                <div class="detail-item">
                    <span class="detail-icon">💬</span>
                    <span class="detail-text">
                            <span data-lang="fr" class="active">3 messages échangés</span>
                            <span data-lang="en">3 messages exchanged</span>
                        </span>
                </div>
            </div>

            <div
                style="padding: 16px; background: var(--warning); background: linear-gradient(135deg, #fef3c7, #fed7aa); border-radius: var(--radius-lg); margin-bottom: 20px;">
                <div style="font-weight: 600; color: var(--dark); margin-bottom: 8px;">
                    ⏳ <span data-lang="fr" class="active">En attente de votre réponse</span>
                    <span data-lang="en">Awaiting your response</span>
                </div>
                <div style="font-size: 14px; color: var(--gray);">
                    <span data-lang="fr" class="active">Le transporteur a fait une nouvelle proposition il y a 2h</span>
                    <span data-lang="en">The transporter made a new offer 2h ago</span>
                </div>
            </div>

            <div class="proposal-actions">
                <button class="btn btn-primary" onclick="continueNegotiation(2)">
                    💬 <span data-lang="fr" class="active">Continuer la négociation</span>
                    <span data-lang="en">Continue negotiation</span>
                </button>
                <button class="btn btn-outline" onclick="acceptCurrentOffer(2)">
                    ✅ <span data-lang="fr" class="active">Accepter 70€</span>
                    <span data-lang="en">Accept €70</span>
                </button>
            </div>
        </div>

        <!-- Proposal 3 - Pending Offers -->
        @foreach($pending_offers as $offer)
            <div class="proposal-card" data-status="pending_offers">
                <div class="proposal-status-ribbon negotiating">
                    <span data-lang="fr" class="active">Pending Offers</span>
                    <span data-lang="en">Pending Offers</span>
                </div>
                <div class="proposal-header">
                    <div class="transporter-info">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100"
                             alt="Pierre"
                             class="transporter-avatar">
                        <div class="transporter-details">
                            <div class="transporter-name">{{ $offer->user->firstName }}.</div>
                            <div class="transporter-rating">
                                <span class="rating-stars">⭐⭐⭐⭐</span>
                                <span>4.6 (89 <span data-lang="fr" class="active">avis</span><span data-lang="en">reviews</span>)</span>
                            </div>
                            <div class="transporter-badges">
                                <span class="badge verified">✓ <span data-lang="fr" class="active">Vérifié</span><span
                                        data-lang="en">Verified</span></span>
                                <span class="badge">🚗 <span data-lang="fr" class="active">Particulier</span><span
                                        data-lang="en">Individual</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="proposal-price">
                        <div class="price-label">
                            <span data-lang="fr" class="active">DERNIÈRE OFFRE</span>
                            <span data-lang="en">LAST OFFER</span>
                        </div>
                        <div class="price-amount">{{ $offer->fare }}€</div>
                        <div class="price-original">
                            <span data-lang="fr" class="active">Initial: {{ $offer->fare }}€</span>
                            <span data-lang="en">Initial: €{{ $offer->fare }}</span>
                        </div>
                    </div>
                </div>

                <div class="proposal-details">
                    <div class="detail-item">
                        <span class="detail-icon">🚙</span>
                        <span class="detail-text">Mercedes Vito</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-icon">📅</span>
                        <span class="detail-text">
                            <span data-lang="fr" class="active">Flexible sur horaire</span>
                            <span data-lang="en">Flexible schedule</span>
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-icon">📦</span>
                        <span class="detail-text">
                            <span data-lang="fr" class="active">Transport régulier</span>
                            <span data-lang="en">Regular transport</span>
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-icon">💬</span>
                        <span class="detail-text">
                            <span data-lang="fr" class="active">3 messages échangés</span>
                            <span data-lang="en">3 messages exchanged</span>
                        </span>
                    </div>
                </div>

                {{ $offer->pickup_location }} -> {{ $offer->destination_location }}

                <div
                    style="padding: 16px; background: var(--warning); background: linear-gradient(135deg, #fef3c7, #fed7aa); border-radius: var(--radius-lg); margin-bottom: 20px;">
                    <div style="font-weight: 600; color: var(--dark); margin-bottom: 8px;">
                        ⏳ <span data-lang="fr" class="active">En attente de votre réponse</span>
                        <span data-lang="en">Awaiting your response</span>
                    </div>
                    <div style="font-size: 14px; color: var(--gray);">
                        <span data-lang="fr"
                              class="active">Le transporteur a fait une nouvelle proposition il y a 2h</span>
                        <span data-lang="en">The transporter made a new offer 2h ago</span>
                    </div>
                </div>

                <div class="proposal-actions">
                    <a href="{{ url('user/get-pending-driver-fare-request?userriderequest_id='.$offer->id) }}"
                       class="btn btn-primary">
                        💬 <span data-lang="fr" class="active">Continuer la négociation</span>
                        <span data-lang="en">Continue negotiation</span>
                    </a>
                    <button class="btn btn-danger-outline">
                        ❌ <span data-lang="fr" class="active">Cancel the Offer</span>
                        <span data-lang="en">Cancel the Offer</span>
                    </button>
                </div>
            </div>
        @endforeach

        <!-- Proposal 4 - Standard -->
        @foreach($pending_rides as $pending_ride)
            <div class="proposal-card" data-status="accepted">
                <div class="proposal-header">
                    <div class="transporter-info">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100"
                             alt="Marie"
                             class="transporter-avatar">
                        <div class="transporter-details">
                            <div
                                class="transporter-name">{{ $pending_ride->driver->firstName . ' '. $pending_ride->driver->lastName}}
                                .
                            </div>
                            <div class="transporter-rating">
                                <span class="rating-stars">⭐⭐⭐⭐⭐</span>
                                <span>5.0 (42 <span data-lang="fr" class="active">avis</span><span data-lang="en">reviews</span>)</span>
                            </div>
                            <div class="transporter-badges">
                                <span class="badge verified">✓ <span data-lang="fr" class="active">Vérifié</span><span
                                        data-lang="en">Verified</span></span>
                                <span class="badge">🌟 <span data-lang="fr" class="active">Premium</span><span
                                        data-lang="en">Premium</span></span>
                                <span class="badge">🌱 <span data-lang="fr" class="active">Éco</span><span
                                        data-lang="en">Eco</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="proposal-price">
                        <div class="price-label">
                            <span data-lang="fr" class="active">PROPOSITION</span>
                            <span data-lang="en">OFFER</span>
                        </div>
                        <div class="price-amount">€{{ $pending_ride->fare }}</div>
                    </div>
                </div>
                @php
                    $transportName = $pending_ride->vehicle_type->vehicle_type_needed ?? '';
                    $icon = $icons[$transportName] ?? '❓'; // default fallback
                @endphp
                <div class="proposal-details">
                    <div class="detail-item">
                        <span class="detail-icon">{{ $icon }}</span>
                        <span class="detail-text">{{ $transportName }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-icon">🌱</span>
                        <span class="detail-text">
                            <span data-lang="fr" class="active">Véhicule électrique</span>
                            <span data-lang="en">Electric vehicle</span>
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-icon">📦</span>
                        <span class="detail-text">
                            <span data-lang="fr" class="active">Emballage fourni</span>
                            <span data-lang="en">Packaging provided</span>
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-icon">📸</span>
                        <span class="detail-text">
                            <span data-lang="fr" class="active">Photos avant/après</span>
                            <span data-lang="en">Before/after photos</span>
                        </span>
                    </div>
                </div>

                <div class="proposal-actions">
                    <a class="btn btn-primary" href="{{ url('user/ride-details?ride_id='.$pending_ride->id) }}">
                        <img src="{{ asset('assets/images/view-detail-image.png') }}"
                             title="View package details" width="30px" alt="loading">
                    </a>

                    <button class="btn btn-outline" onclick="contactTransporter(3)">
                        💬 <span data-lang="fr" class="active">Contacter</span>
                        <span data-lang="en">Contact</span>
                    </button>
                </div>
            </div>
        @endforeach
        <!-- More proposals can be added here -->
    </div>

    <!-- Empty State (hidden by default) -->
    <div class="empty-state" id="emptyState" style="display: none;">
        <div class="empty-icon">📭</div>
        <h2 class="empty-title">
            <span data-lang="fr" class="active">Aucune proposition trouvée</span>
            <span data-lang="en">No proposals found</span>
        </h2>
        <p class="empty-text">
            <span data-lang="fr" class="active">Modifiez vos filtres ou attendez de nouvelles propositions</span>
            <span data-lang="en">Adjust your filters or wait for new proposals</span>
        </p>
        <button class="btn btn-primary" onclick="resetFilters()">
            🔄 <span data-lang="fr" class="active">Réinitialiser les filtres</span>
            <span data-lang="en">Reset filters</span>
        </button>
    </div>
</div>

<!-- Comparison Bar -->
<div class="comparison-bar" id="comparisonBar">
    <div class="comparison-content">
        <div class="comparison-selected">
                <span class="selected-count">
                    <span data-lang="fr" class="active">2 propositions sélectionnées</span>
                    <span data-lang="en">2 proposals selected</span>
                </span>
        </div>
        <div class="comparison-actions">
            <button class="btn btn-primary" onclick="compareProposals()">
                📊 <span data-lang="fr" class="active">Comparer</span>
                <span data-lang="en">Compare</span>
            </button>
            <button class="btn btn-outline" onclick="clearSelection()">
                <span data-lang="fr" class="active">Annuler</span>
                <span data-lang="en">Cancel</span>
            </button>
        </div>
    </div>
</div>

<script>
    // Language system
    let currentLang = localStorage.getItem('preferredLanguage') || 'fr';
    let selectedProposals = [];
    let currentFilter = 'all';

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
        updateSelectOptions();

        // Update page title
        document.title = lang === 'en'
            ? 'Received proposals - Co-transport #CT2024-0847 - I entrust'
            : 'Propositions reçues - Co-transport #CT2024-0847 - Je confie';
    }

    function updateSelectOptions() {
        const sortDropdown = document.querySelector('.sort-dropdown');
        if (sortDropdown) {
            const options = currentLang === 'fr' ? [
                'Prix croissant',
                'Prix décroissant',
                'Plus récentes',
                'Meilleures notes'
            ] : [
                'Price ascending',
                'Price descending',
                'Most recent',
                'Best ratings'
            ];

            const selectedIndex = sortDropdown.selectedIndex;
            sortDropdown.innerHTML = options.map((opt, i) =>
                `<option ${i === selectedIndex ? 'selected' : ''}>${opt}</option>`
            ).join('');
        }
    }

    // Toggle mobile menu
    function toggleMobileMenu() {
        const navLinks = document.getElementById('navLinks');
        const overlay = document.getElementById('mobileMenuOverlay');
        navLinks.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    // Filter proposals
    function filterProposals(filter, event) {
        // Update active tab styling
        document.querySelectorAll('.filter-tab').forEach(tab => tab.classList.remove('active'));
        if (event) event.currentTarget.classList.add('active');

        // Get all proposal cards
        const proposals = document.querySelectorAll('.proposal-card');

        proposals.forEach(card => {
            const status = card.getAttribute('data-status');

            if (filter === 'all' || filter === status) {
                card.style.display = 'block';
                card.style.opacity = '1';
            } else {
                card.style.opacity = '0';
                setTimeout(() => (card.style.display = 'none'), 200);
            }
        });
    }


    // Proposal actions
    function acceptProposal(id) {
        if (confirm(currentLang === 'fr' ?
            'Êtes-vous sûr de vouloir accepter cette proposition?' :
            'Are you sure you want to accept this proposal?')) {
            console.log('Accepting proposal:', id);
            // Redirect to payment/confirmation page
            window.location.href = `/accept-proposal/${id}`;
        }
    }

    function negotiateProposal(id) {
        console.log('Opening negotiation for proposal:', id);
        window.location.href = `/negotiate/${id}`;
    }

    function viewProfile(id) {
        console.log('Viewing profile:', id);
        window.location.href = `/transporter-profile/${id}`;
    }

    function rejectProposal(id) {
        if (confirm(currentLang === 'fr' ?
            'Êtes-vous sûr de vouloir refuser cette proposition?' :
            'Are you sure you want to reject this proposal?')) {
            console.log('Rejecting proposal:', id);
            // Remove the card with animation
            const card = event.target.closest('.proposal-card');
            card.style.opacity = '0';
            card.style.transform = 'translateX(-100%)';
            setTimeout(() => card.remove(), 300);
        }
    }

    function continueNegotiation(id) {
        console.log('Continuing negotiation:', id);
        window.location.href = `/negotiate/${id}`;
    }

    function acceptCurrentOffer(id) {
        acceptProposal(id);
    }

    function contactTransporter(id) {
        console.log('Contacting transporter:', id);
        window.location.href = `/messages/transporter/${id}`;
    }

    // Search functionality
    document.querySelector('.search-input')?.addEventListener('input', function (e) {
        const searchTerm = e.target.value.toLowerCase();
        document.querySelectorAll('.proposal-card').forEach(card => {
            const transporterName = card.querySelector('.transporter-name')?.textContent.toLowerCase();
            if (transporterName?.includes(searchTerm) || !searchTerm) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Sort functionality
    document.querySelector('.sort-dropdown')?.addEventListener('change', function (e) {
        console.log('Sorting by:', e.target.value);
        // Implement sorting logic here
    });

    // Comparison functionality
    function selectForComparison(id) {
        if (selectedProposals.includes(id)) {
            selectedProposals = selectedProposals.filter(p => p !== id);
        } else {
            if (selectedProposals.length < 3) {
                selectedProposals.push(id);
            } else {
                alert(currentLang === 'fr' ?
                    'Vous ne pouvez comparer que 3 propositions maximum' :
                    'You can only compare up to 3 proposals');
                return;
            }
        }

        updateComparisonBar();
    }

    function updateComparisonBar() {
        const bar = document.getElementById('comparisonBar');
        if (selectedProposals.length > 0) {
            bar.classList.add('active');
            const count = bar.querySelector('.selected-count');
            count.textContent = currentLang === 'fr' ?
                `${selectedProposals.length} proposition${selectedProposals.length > 1 ? 's' : ''} sélectionnée${selectedProposals.length > 1 ? 's' : ''}` :
                `${selectedProposals.length} proposal${selectedProposals.length > 1 ? 's' : ''} selected`;
        } else {
            bar.classList.remove('active');
        }
    }

    function compareProposals() {
        if (selectedProposals.length >= 2) {
            window.location.href = `/compare?ids=${selectedProposals.join(',')}`;
        }
    }

    function clearSelection() {
        selectedProposals = [];
        updateComparisonBar();
        document.querySelectorAll('.proposal-card').forEach(card => {
            card.classList.remove('selected');
        });
    }

    function resetFilters() {
        currentFilter = 'all';
        document.querySelector('.search-input').value = '';
        document.querySelector('.sort-dropdown').selectedIndex = 0;
        filterProposals('all');
    }

    // Auto-refresh for new proposals
    function checkForNewProposals() {
        // Simulate checking for new proposals
        console.log('Checking for new proposals...');
        // In production, this would make an API call
    }

    // Check every 30 seconds
    setInterval(checkForNewProposals, 30000);

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function () {
        switchLanguage(currentLang);

        // Add click handlers for card selection
        document.querySelectorAll('.proposal-card').forEach((card, index) => {
            card.addEventListener('click', function (e) {
                if (e.target.closest('.btn') || e.target.closest('a')) return;

                if (e.ctrlKey || e.metaKey) {
                    card.classList.toggle('selected');
                    selectForComparison(index + 1);
                }
            });
        });
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            clearSelection();
        }
        if (e.key === 'f' && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
            document.querySelector('.search-input')?.focus();
        }
    });
</script>
</body>
</html>
