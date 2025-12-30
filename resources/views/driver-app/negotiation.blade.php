<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Négociation - Co-transport - Je confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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

        /* Hide/Show elements based on language */
        [data-lang] {
            display: none;
        }

        [data-lang].active {
            /*display: inline-block;*/
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
            z-index: 1001;
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
            z-index: 1001;
            color: var(--dark);
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
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mobile-menu-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Main Container */
        .main-container {
            max-width: 1280px;
            margin: 100px auto 40px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 32px;
        }

        /* Card Base */
        .card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            box-shadow: var(--shadow);
            margin-bottom: 24px;
        }

        /* Negotiation Header */
        .offer-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-badge.negotiation {
            background: var(--warning);
            color: white;
        }

        .offer-reference {
            color: var(--gray);
            font-size: 14px;
        }

        /* Transport Details - Optimized Grid */
        .transport-details {
            display: grid;
            grid-template-columns: 1fr auto 1fr auto auto;
            gap: 20px 24px;
            padding: 24px 0;
            border-top: 2px solid var(--border);
            border-bottom: 2px solid var(--border);
            align-items: start;
        }

        .route-point {
            display: flex;
            flex-direction: column;
            gap: 6px;
            min-width: 0;
        }

        .route-label {
            font-size: 10px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .route-city {
            font-size: 15px;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-word;
        }

        .route-city:hover {
            -webkit-line-clamp: unset;
            overflow: visible;
        }

        .route-date {
            font-size: 12px;
            color: var(--gray);
            line-height: 1.4;
        }

        .route-arrow {
            font-size: 24px;
            color: var(--primary);
            align-self: center;
            flex-shrink: 0;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: center;
            min-width: 100px;
        }

        .meta-label {
            font-size: 10px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-weight: 600;
        }

        .meta-value {
            font-size: 14px;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .meta-detail {
            font-size: 11px;
            color: var(--gray);
        }

        /* Package Info */
        .package-info {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
        }

        .package-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .package-icon {
            width: 56px;
            height: 56px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: var(--shadow);
            flex-shrink: 0;
        }

        .package-title {
            flex: 1;
            min-width: 0;
        }

        .package-title h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 6px;
            word-break: break-word;
        }

        .package-category {
            display: inline-block;
            padding: 4px 12px;
            background: var(--primary);
            color: white;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
            margin-right: 6px;
            margin-bottom: 4px;
        }

        .package-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 12px;
            margin-top: 16px;
        }

        .detail-item {
            background: white;
            padding: 12px;
            border-radius: var(--radius);
            text-align: center;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
        }

        .detail-label {
            font-size: 11px;
            color: var(--gray);
            margin-top: 4px;
        }

        /* Negotiation Area */
        .negotiation-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .price-history {
            background: var(--light);
            border-radius: var(--radius-lg);
            padding: 20px;
            margin-bottom: 24px;
        }

        .price-history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .price-history-title {
            font-weight: 600;
            color: var(--dark);
        }

        .price-timeline {
            position: relative;
            padding-left: 32px;
        }

        .price-timeline::before {
            content: '';
            position: absolute;
            left: 12px;
            top: 8px;
            bottom: 8px;
            width: 2px;
            background: var(--border);
        }

        .price-item {
            position: relative;
            padding: 12px 0;
        }

        .price-item::before {
            content: '';
            position: absolute;
            left: -24px;
            top: 20px;
            width: 10px;
            height: 10px;
            background: white;
            border: 2px solid var(--primary);
            border-radius: 50%;
        }

        .price-item.sender::before {
            background: var(--primary);
        }

        .price-offer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .offer-info {
            flex: 1;
            min-width: 150px;
        }

        .offer-author {
            font-size: 13px;
            color: var(--gray);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .offer-amount {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--dark);
            margin: 4px 0;
        }

        .offer-time {
            font-size: 12px;
            color: var(--gray);
        }

        .offer-status-badge {
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
        }

        .offer-status-badge.current {
            background: var(--success);
            color: white;
        }

        .offer-status-badge.rejected {
            background: var(--danger);
            color: white;
        }

        /* New Offer Form */
        .new-offer-form {
            background: linear-gradient(135deg, #fef3c7, #fed7aa);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .form-title {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .price-input-group {
            margin-bottom: 16px;
        }

        .price-input-wrapper {
            position: relative;
        }

        .price-input {
            width: 100%;
            padding: 16px 20px 16px 40px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            transition: all 0.3s ease;
            background: white;
        }

        .price-input:focus {
            outline: none;
            border-color: var(--warning);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        }

        .currency-symbol {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: var(--gray);
        }

        .price-suggestions {
            display: flex;
            gap: 8px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .suggestion-chip {
            padding: 8px 16px;
            background: white;
            border: 2px solid var(--border);
            border-radius: 100px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            min-width: 70px;
            text-align: center;
        }

        .suggestion-chip:hover {
            border-color: var(--warning);
            background: var(--warning);
            color: white;
            transform: translateY(-2px);
        }

        .message-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            resize: vertical;
            min-height: 80px;
            margin-bottom: 16px;
            font-family: inherit;
            background: white;
        }

        .message-input:focus {
            outline: none;
            border-color: var(--warning);
        }

        /* Buttons */
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
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #dc8a0a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .btn-outline {
            background: white;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-outline:hover {
            background: var(--light);
            border-color: var(--primary);
        }

        .btn-block {
            width: 100%;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .user-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow);
            margin-bottom: 24px;
        }

        .user-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .user-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border);
            flex-shrink: 0;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-weight: 700;
            color: var(--dark);
            font-size: 1rem;
            margin-bottom: 6px;
            word-break: break-word;
        }

        .user-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            padding: 16px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            margin-bottom: 16px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stat-label {
            font-size: 11px;
            color: var(--gray);
            margin-top: 4px;
        }

        .user-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .user-badge {
            padding: 6px 12px;
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: var(--eco-green);
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .payment-security {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            border-radius: var(--radius-lg);
            padding: 20px;
            margin-bottom: 24px;
        }

        .security-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .security-icon {
            width: 40px;
            height: 40px;
            background: var(--eco-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            flex-shrink: 0;
        }

        .security-title {
            font-weight: 700;
            color: var(--dark);
        }

        .security-features {
            list-style: none;
        }

        .security-features li {
            padding: 8px 0;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--dark);
        }

        .security-features li::before {
            content: '✓';
            width: 20px;
            height: 20px;
            background: var(--eco-green);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .tips-section {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: var(--radius-lg);
            padding: 20px;
        }

        .tips-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--dark);
        }

        .tips-list {
            list-style: none;
            font-size: 13px;
            color: var(--gray);
            line-height: 1.8;
        }

        .tips-list li {
            padding: 4px 0;
            padding-left: 24px;
            position: relative;
        }

        .tips-list li::before {
            content: '💡';
            position: absolute;
            left: 0;
        }

        .chat-toggle {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 60px;
            height: 60px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            box-shadow: var(--shadow-xl);
            transition: all 0.3s ease;
            z-index: 900;
            border: none;
        }

        .chat-toggle:hover {
            transform: scale(1.1);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .transport-details {
                grid-template-columns: 1fr auto 1fr;
                gap: 16px;
            }

            .meta-item {
                grid-column: span 1;
            }

            .meta-item:nth-child(4) {
                grid-column: 1 / 2;
                justify-self: start;
            }

            .meta-item:nth-child(5) {
                grid-column: 3 / 4;
                justify-self: end;
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
                width: 280px;
                max-width: 80vw;
                height: calc(100vh - 72px);
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: var(--shadow-lg);
                transition: left 0.3s ease;
                z-index: 999;
                overflow-y: auto;
                align-items: flex-start;
            }

            .nav-links.active {
                left: 0;
            }

            .nav-link {
                width: 100%;
                padding: 12px;
                border-bottom: 1px solid var(--border);
            }

            .language-switcher {
                width: 100%;
                margin-top: 20px;
            }

            .main-container {
                margin-top: 90px;
                padding: 0 16px;
            }

            .card {
                padding: 20px;
            }

            .transport-details {
                display: flex;
                flex-direction: column;
                gap: 16px;
            }

            .route-arrow {
                transform: rotate(90deg);
                align-self: center;
                margin: 0;
            }

            .meta-item {
                text-align: left;
            }

            .meta-value {
                justify-content: flex-start;
            }

            .package-details {
                grid-template-columns: 1fr;
            }

            .offer-status {
                flex-direction: column;
                align-items: flex-start;
            }

            .negotiation-title {
                font-size: 1.2rem;
            }

            .price-suggestions {
                grid-template-columns: repeat(2, 1fr);
            }

            .chat-toggle {
                width: 50px;
                height: 50px;
                font-size: 20px;
                bottom: 16px;
                right: 16px;
            }
        }

        @media (max-width: 480px) {
            .logo-text {
                display: none;
            }

            .nav-container {
                padding: 0 16px;
            }

            .card {
                padding: 16px;
            }

            .package-icon {
                width: 48px;
                height: 48px;
                font-size: 24px;
            }

            .user-avatar {
                width: 48px;
                height: 48px;
            }

            .user-stats {
                grid-template-columns: 1fr;
            }

            .price-suggestions {
                flex-direction: column;
            }

            .suggestion-chip {
                width: 100%;
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
            <span class="logo-text" data-lang="fr" class="active">Je confie</span>
            <span class="logo-text" data-lang="en">I entrust</span>
        </a>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()" aria-label="Toggle menu">
            <span id="menu-icon">☰</span>
        </button>

        <div class="nav-links" id="navLinks">
            <a href="{{ url('driver/my-rides') }}" class="nav-link">
                <span data-lang="fr" class="active">Mes annonces</span>
                <span data-lang="en">My offers</span>
            </a>
            <a href="/messages" class="nav-link">
                <span data-lang="fr" class="active">Messages</span>
                <span data-lang="en">Messages</span>
            </a>
            <a href="{{ url('driver/dashboard') }}" class="nav-link">
                <span data-lang="fr" class="active">Tableau de bord</span>
                <span data-lang="en">Dashboard</span>
            </a>
            <a href="{{ url('driver/profile-setting') }}" class="nav-link">
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
    <!-- Left Column -->
    <div>
        <form action="{{ route('driver.request_fare') }}" method="post">
            @csrf
            <input type="hidden" name="userriderequest_id" value="{{ $userriderequest->id }}">
            <input type="hidden" name="driver_location_latitude" id="driver_location_latitude">
            <input type="hidden" name="driver_location_longitude" id="driver_location_longitude">

            <!-- Negotiation Header -->
            <div class="card">
                <div class="offer-status">
                    <div>
                            <span class="status-badge negotiation">
                                🤝 <span data-lang="fr" class="active">Négociation en cours</span>
                                <span data-lang="en">Ongoing negotiation</span>
                            </span>
                        <span class="offer-reference" style="margin-left: 12px;">
                                <span data-lang="fr" class="active">Référence</span>
                                <span data-lang="en">Reference</span>: {{ $userriderequest->reference_id }}
                            </span>
                    </div>
                    @php
                        $pickup = \Illuminate\Support\Carbon::now();
                        $dropoff = \Illuminate\Support\Carbon::parse($userriderequest->expiry_date);
                        $diffInMinutes = $pickup->diffInMinutes($dropoff);
                        $hours = floor($diffInMinutes / 60);
                        $minutes = $diffInMinutes % 60;
                    @endphp
                    <div style="font-size: 14px; color: var(--gray);">
                        ⏱️ <span data-lang="fr" class="active">Expire dans</span>
                        <span data-lang="en">Expires in</span>: <strong style="color: var(--danger);">{{ $hours }}h {{ $minutes }}min</strong>
                    </div>
                </div>

                @php
                    $transportIcon = '✨';
                    if($userriderequest->vehicle_type_needed) {
                        if(stripos($userriderequest->vehicle_type_needed, 'traveler') !== false) $transportIcon = '✈️';
                        elseif(stripos($userriderequest->vehicle_type_needed, 'Truck') !== false) $transportIcon = '🚛';
                        elseif(stripos($userriderequest->vehicle_type_needed, 'Van') !== false) $transportIcon = '🚐';
                        elseif(stripos($userriderequest->vehicle_type_needed, 'Car') !== false) $transportIcon = '🚗';
                        else $transportIcon = '🚢';
                    }

                    $routeFrom = $userriderequest->pickup_location ?? '-';
                    $routeTo = $userriderequest->destination_location ?? '-';
                    $pickupDate = \Illuminate\Support\Carbon::parse($userriderequest->pickup_date);
                    $deliveryDate = \Illuminate\Support\Carbon::parse($userriderequest->delivery_date);
                @endphp

                    <!-- Transport Details -->
                <div class="transport-details">
                    <!-- Departure -->
                    <div class="route-point">
                        <div class="route-label">
                            <span data-lang="fr" class="active">DÉPART</span>
                            <span data-lang="en">DEPARTURE</span>
                        </div>
                        <div class="route-city" title="{{ $routeFrom }}">
                            📍 {{ $routeFrom }}
                        </div>
                        <div class="route-date">
                            <span data-lang="fr" class="active">{{ $pickupDate->locale('fr')->isoFormat('ddd, D MMM - HH[h]mm') }}</span>
                            <span data-lang="en">{{ $pickupDate->format('D, M j - H:i') }}</span>
                        </div>
                    </div>

                    <!-- Arrow -->
                    <div class="route-arrow">→</div>

                    <!-- Arrival -->
                    <div class="route-point">
                        <div class="route-label">
                            <span data-lang="fr" class="active">ARRIVÉE</span>
                            <span data-lang="en">ARRIVAL</span>
                        </div>
                        <div class="route-city" title="{{ $routeTo }}">
                            📍 {{ $routeTo }}
                        </div>
                        <div class="route-date">
                            <span data-lang="fr" class="active">{{ $deliveryDate->locale('fr')->isoFormat('ddd, D MMM - HH[h]mm') }}</span>
                            <span data-lang="en">{{ $deliveryDate->format('D, M j - H:i') }}</span>
                        </div>
                    </div>

                    <!-- Vehicle -->
                    <div class="meta-item">
                        <div class="meta-label">
                            <span data-lang="fr" class="active">VÉHICULE</span>
                            <span data-lang="en">VEHICLE</span>
                        </div>
                        <div class="meta-value">
                            {{ $transportIcon }} <span>{{ $userriderequest->vehicle_type_needed }}</span>
                        </div>
                        <div class="meta-detail">
                            <span data-lang="fr" class="active">9 places</span>
                            <span data-lang="en">9 seats</span>
                        </div>
                    </div>

                    <!-- Distance -->
                    <div class="meta-item">
                        <div class="meta-label">DISTANCE</div>
                        <div class="meta-value">{{ $userriderequest->distance }} km</div>
                        <div class="meta-detail">
                            <span data-lang="fr" class="active">~3h30</span>
                            <span data-lang="en">~3h30</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Package Info -->
            <div class="package-info">
                @php
                    $packages = json_decode($userriderequest->type_of_package, true) ?? [];
                    $subtypesData = json_decode($userriderequest->sub_type_of_package, true) ?? [];
                    $allSubtypes = [];
                    if (is_array($subtypesData)) {
                        foreach ($subtypesData as $subtypes) {
                            $allSubtypes = array_merge($allSubtypes, $subtypes);
                        }
                    }
                    $dimensions = json_decode($userriderequest->packages_json, true) ?? [];
                    $totalLength = $totalWidth = $totalHeight = $totalWeight = 0;
                    if (is_array($dimensions)) {
                        foreach ($dimensions as $pkg) {
                            $totalLength += isset($pkg['length']) ? (float)$pkg['length'] : 0;
                            $totalWidth  += isset($pkg['width']) ? (float)$pkg['width'] : 0;
                            $totalHeight += isset($pkg['height']) ? (float)$pkg['height'] : 0;
                            $totalWeight += isset($pkg['weight']) ? (float)$pkg['weight'] : 0;
                        }
                    }
                @endphp

                <div class="package-header">
                    <div class="package-icon">📦</div>
                    <div class="package-title">
                        <h3>{{ implode(' + ', $allSubtypes) ?: 'Package' }}</h3>
                        @foreach($packages as $package)
                            <span class="package-category">{{ $package }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="package-details">
                    <div class="detail-item">
                        <div class="detail-value">{{ $totalLength }}cm</div>
                        <div class="detail-label" data-lang="fr" class="active">Longueur</div>
                        <div class="detail-label" data-lang="en">Length</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-value">{{ $totalWidth }}cm</div>
                        <div class="detail-label" data-lang="fr" class="active">Largeur</div>
                        <div class="detail-label" data-lang="en">Width</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-value">{{ $totalWeight }}kg</div>
                        <div class="detail-label" data-lang="fr" class="active">Poids</div>
                        <div class="detail-label" data-lang="en">Weight</div>
                    </div>
                </div>
            </div>

            <!-- Negotiation Area -->
            <div class="card">
                <h2 class="negotiation-title">
                    💬 <span data-lang="fr" class="active">Négociation du prix</span>
                    <span data-lang="en">Price negotiation</span>
                </h2>

                <!-- Price History -->
                <div class="price-history">
                    <div class="price-history-header">
                        <div class="price-history-title">
                            <span data-lang="fr" class="active">Historique</span>
                            <span data-lang="en">History</span>
                        </div>
                        <div style="font-size: 13px; color: var(--gray);">
                            {{ count($driver_fare_requests) }}
                            <span data-lang="fr" class="active">offres</span>
                            <span data-lang="en">offers</span>
                        </div>
                    </div>

                    <div class="price-timeline">
                        @foreach($driver_fare_requests as $driver_fare_request)
                            <div class="price-item sender">
                                <div class="price-offer">
                                    <div class="offer-info">
                                        <div class="offer-author">
                                            👤 {{ $driver_fare_request->driver->firstName }}
                                        </div>
                                        <div class="offer-amount">{{ $driver_fare_request->requested_fare }}€</div>
                                        <div class="offer-time">
                                            {{ $driver_fare_request->updated_at->diffForHumans() }}
                                        </div>
                                    </div>
                                    @if($loop->last)
                                        <div class="offer-status-badge current">
                                            <span data-lang="fr" class="active">Actuelle</span>
                                            <span data-lang="en">Current</span>
                                        </div>
                                    @else
                                        <div class="offer-status-badge rejected">
                                            <span data-lang="fr" class="active">Refusée</span>
                                            <span data-lang="en">Rejected</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- New Offer Form -->
                <div class="new-offer-form">
                    <div class="form-header">
                        <span style="font-size: 24px;">💰</span>
                        <div class="form-title">
                            <span data-lang="fr" class="active">Contre-proposition</span>
                            <span data-lang="en">Counter-offer</span>
                        </div>
                    </div>

                    <div class="price-input-group">
                        <div class="price-input-wrapper">
                            <span class="currency-symbol">€</span>
                            <input type="number" name="requested_fare" class="price-input" id="price-input" value="{{ $userriderequest->fare }}" min="0" step="5">
                        </div>
                    </div>

                    <div class="price-suggestions">
                        <div class="suggestion-chip" onclick="setPrice(65)">65€</div>
                        <div class="suggestion-chip" onclick="setPrice(70)">70€</div>
                        <div class="suggestion-chip" onclick="setPrice(75)">75€</div>
                        <div class="suggestion-chip" onclick="setPrice(80)">80€</div>
                    </div>

                    <textarea class="message-input" name="message" data-placeholder-fr="Message optionnel..." data-placeholder-en="Optional message..." placeholder="Message optionnel..."></textarea>

                    <button type="submit" class="btn btn-warning btn-block">
                        🤝 <span data-lang="fr" class="active">Proposer</span>
                        <span data-lang="en">Propose</span>
                        <span id="proposal-amount">{{ $userriderequest->fare }}€</span>
                    </button>
                </div>

                <!-- Quick Actions -->
                <button type="button" class="btn btn-outline btn-block" onclick="openChat()">
                    💬 <span data-lang="fr" class="active">Messagerie</span>
                    <span data-lang="en">Messages</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Right Sidebar -->
    <div class="sidebar">
        <!-- Sender Card -->
        <div class="user-card">
            <div style="padding: 6px 12px; background: var(--light); border-radius: 100px; font-size: 11px; font-weight: 600; color: var(--gray); margin-bottom: 16px; text-align: center;">
                👤 <span data-lang="fr" class="active">EXPÉDITEUR</span>
                <span data-lang="en">SENDER</span>
            </div>
            <div class="user-card-header">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($userriderequest->user->firstName . ' ' . $userriderequest->user->lastName) }}&background=random&color=fff" alt="{{ $userriderequest->user->firstName }}" class="user-avatar" />
                <div class="user-info">
                    <div class="user-name">{{ $userriderequest->user->firstName }} {{ $userriderequest->user->lastName }}</div>
                    <div style="font-size: 13px; color: var(--gray);">⭐ 4.8 (127)</div>
                </div>
            </div>
            @php
                $sender_completed = \App\Models\Ridesbooked::where('user_id', $userriderequest->user->id)->where('status','completed')->count() + \App\Models\ReservedKiloRidebooked::where('user_id', $userriderequest->user->id)->where('status','completed')->count();
            @endphp
            <div class="user-stats">
                <div class="stat-item">
                    <div class="stat-value">{{ $sender_completed }}</div>
                    <div class="stat-label" data-lang="fr" class="active">Envois</div>
                    <div class="stat-label" data-lang="en">Shipments</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">98%</div>
                    <div class="stat-label">Satisfaction</div>
                </div>
            </div>
            <div class="user-badges">
                <div class="user-badge">✅ <span data-lang="fr" class="active">Vérifié</span><span data-lang="en">Verified</span></div>
            </div>
        </div>

        <!-- Transporter Card -->
        <div class="user-card">
            <div style="padding: 6px 12px; background: var(--warning); color: white; border-radius: 100px; font-size: 11px; font-weight: 600; margin-bottom: 16px; text-align: center;">
                🚚 <span data-lang="fr" class="active">TRANSPORTEUR</span>
                <span data-lang="en">TRANSPORTER</span>
            </div>
            <div class="user-card-header">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('driver')->user()->firstName . ' ' . Auth::guard('driver')->user()->lastName) }}&background=random&color=fff" alt="Driver" class="user-avatar">
                <div class="user-info">
                    <div class="user-name">{{ Auth::guard('driver')->user()->firstName }} {{ Auth::guard('driver')->user()->lastName }}</div>
                    <div style="font-size: 13px; color: var(--gray);">⭐ 4.6 (89)</div>
                </div>
            </div>
            @php
                $driver_completed = \App\Models\Ridesbooked::where('driver_id', Auth::guard('driver')->user()->id)->where('status','completed')->count() + \App\Models\ReservedKiloRidebooked::where('driver_id', Auth::guard('driver')->user()->id)->where('status','completed')->count();
            @endphp
            <div class="user-stats">
                <div class="stat-item">
                    <div class="stat-value">{{ $driver_completed }}</div>
                    <div class="stat-label">Transports</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">95%</div>
                    <div class="stat-label" data-lang="fr" class="active">À l'heure</div>
                    <div class="stat-label" data-lang="en">On time</div>
                </div>
            </div>
            <div class="user-badges">
                <div class="user-badge">✅ <span data-lang="fr" class="active">Vérifié</span><span data-lang="en">Verified</span></div>
                <div class="user-badge">🛡️ <span data-lang="fr" class="active">Assuré</span><span data-lang="en">Insured</span></div>
            </div>
        </div>

        <!-- Payment Security -->
        <div class="payment-security">
            <div class="security-header">
                <div class="security-icon">🔒</div>
                <div class="security-title">
                    <span data-lang="fr" class="active">Paiement sécurisé</span>
                    <span data-lang="en">Secure payment</span>
                </div>
            </div>
            <ul class="security-features">
                <li data-lang="fr" class="active">Paiement bloqué jusqu'à livraison</li>
                <li data-lang="en">Payment held until delivery</li>
                <li data-lang="fr" class="active">Protection contre fraudes</li>
                <li data-lang="en">Fraud protection</li>
                <li data-lang="fr" class="active">Assurance incluse</li>
                <li data-lang="en">Insurance included</li>
                <li data-lang="fr" class="active">Support 24/7</li>
                <li data-lang="en">24/7 support</li>
            </ul>
        </div>

        <!-- Tips -->
        <div class="tips-section">
            <div class="tips-header">
                💡 <span data-lang="fr" class="active">Conseils</span>
                <span data-lang="en">Tips</span>
            </div>
            <ul class="tips-list">
                <li data-lang="fr" class="active">Restez dans une fourchette raisonnable</li>
                <li data-lang="en">Stay within reasonable range</li>
                <li data-lang="fr" class="active">Soyez réactif dans vos réponses</li>
                <li data-lang="en">Be responsive</li>
                <li data-lang="fr" class="active">Mentionnez l'aide au chargement</li>
                <li data-lang="en">Mention loading assistance</li>
            </ul>
        </div>
    </div>
</div>

<!-- Chat Toggle -->
<button class="chat-toggle" onclick="openChat()" aria-label="Open chat">
    💬
</button>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    let currentLang = localStorage.getItem('preferredLanguage') || 'fr';

    function switchLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('preferredLanguage', lang);

        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.remove('active');
            if (btn.textContent.toLowerCase() === lang) {
                btn.classList.add('active');
            }
        });

        document.querySelectorAll('[data-lang]').forEach(element => {
            element.classList.toggle('active', element.getAttribute('data-lang') === lang);
        });

        document.querySelectorAll('[data-placeholder-fr]').forEach(input => {
            input.placeholder = lang === 'fr' ? input.getAttribute('data-placeholder-fr') : input.getAttribute('data-placeholder-en');
        });
    }

    function toggleMobileMenu() {
        const navLinks = document.getElementById('navLinks');
        const overlay = document.getElementById('mobileMenuOverlay');
        const menuIcon = document.getElementById('menu-icon');

        navLinks.classList.toggle('active');
        overlay.classList.toggle('active');
        menuIcon.textContent = navLinks.classList.contains('active') ? '✕' : '☰';

        // Prevent body scroll when menu is open
        document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
    }

    function setPrice(price) {
        document.getElementById('price-input').value = price;
        document.getElementById('proposal-amount').textContent = price + '€';
    }

    document.getElementById('price-input')?.addEventListener('input', function(e) {
        document.getElementById('proposal-amount').textContent = e.target.value + '€';
    });

    function openChat() {
        alert(currentLang === 'fr' ? 'Ouverture du chat...' : 'Opening chat...');
    }

    document.addEventListener('DOMContentLoaded', function() {
        switchLanguage(currentLang);

        @if(session('status') && session('message'))
        toastr.{{ session('status') }}('{{ session('message') }}');
        @endif
    });

    // Close menu when clicking nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                toggleMobileMenu();
            }
        });
    });
</script>
</body>
</html>
