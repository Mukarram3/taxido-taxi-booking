<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Négociation - Co-transport #CT2024-0847 - Je confie</title>
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
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 32px;
        }

        /* Negotiation Header */
        .negotiation-header {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: var(--shadow);
        }

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

        .transport-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            padding: 24px 0;
            border-top: 2px solid var(--border);
            border-bottom: 2px solid var(--border);
        }

        .route-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .route-point {
            flex: 1;
        }

        .route-label {
            font-size: 12px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .route-city {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .route-date {
            font-size: 14px;
            color: var(--gray);
            margin-top: 4px;
        }

        .route-arrow {
            font-size: 24px;
            color: var(--primary);
        }

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
            width: 64px;
            height: 64px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: var(--shadow);
        }

        .package-title {
            flex: 1;
        }

        .package-title h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .package-category {
            display: inline-block;
            padding: 4px 12px;
            background: var(--primary);
            color: white;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
        }

        .package-details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 20px;
        }

        .detail-item {
            background: white;
            padding: 12px;
            border-radius: var(--radius);
            text-align: center;
        }

        .detail-value {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .detail-label {
            font-size: 12px;
            color: var(--gray);
            margin-top: 4px;
        }

        .negotiation-area {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            box-shadow: var(--shadow);
        }

        .negotiation-title {
            font-size: 1.5rem;
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

        .price-item.transporter::before {
            background: var(--warning);
            border-color: var(--warning);
        }

        .price-offer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .offer-info {
            flex: 1;
        }

        .offer-author {
            font-size: 13px;
            color: var(--gray);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .offer-amount {
            font-size: 1.25rem;
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
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .price-input-wrapper {
            flex: 1;
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
        }

        .suggestion-chip:hover {
            border-color: var(--warning);
            background: var(--warning);
            color: white;
        }

        .message-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            resize: vertical;
            min-height: 100px;
            margin-bottom: 16px;
            font-family: inherit;
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

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
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

        .btn-block {
            width: 100%;
            justify-content: center;
        }

        .sidebar {
            position: sticky;
            top: 100px;
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
            margin-bottom: 20px;
        }

        .user-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border);
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .user-role {
            padding: 4px 12px;
            background: var(--light);
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
            color: var(--gray);
            display: inline-block;
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
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stat-label {
            font-size: 12px;
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
            font-size: 12px;
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
            font-size: 14px;
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
        }

        .quick-actions {
            display: grid;
            gap: 12px;
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
        }

        .chat-toggle:hover {
            transform: scale(1.1);
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
            padding-left: 20px;
            position: relative;
        }

        .tips-list li::before {
            content: '💡';
            position: absolute;
            left: 0;
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

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
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

            .transport-details {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .package-details {
                grid-template-columns: 1fr;
            }

            .offer-status {
                flex-direction: column;
                align-items: flex-start;
            }

            .quick-actions {
                gap: 8px;
            }

            .btn-block {
                padding: 10px 16px;
                font-size: 14px;
            }

            .negotiation-title {
                font-size: 1.2rem;
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
            .nav-container {
                padding: 0 16px;
            }

            .logo-text {
                display: none;
            }

            .price-suggestions {
                flex-direction: column;
            }

            .suggestion-chip {
                width: 100%;
                text-align: center;
            }

            .user-stats {
                grid-template-columns: 1fr;
                gap: 8px;
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

            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>

            <div class="nav-links" id="navLinks">
                <a href="/offers" class="nav-link">
                    <span data-lang="fr" class="active">Mes annonces</span>
                    <span data-lang="en">My offers</span>
                </a>
                <a href="/messages" class="nav-link">
                    <span data-lang="fr" class="active">Messages</span>
                    <span data-lang="en">Messages</span>
                </a>
                <a href="/dashboard" class="nav-link">
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
        <!-- Left Column -->
        <div>
            <form action="{{ route('driver.request_fare') }}" method="post">
                @csrf
                <input type="hidden" name="userriderequest_id" value="{{ $userriderequest->id }}">
                <input type="hidden" name="driver_location_latitude" id="driver_location_latitude">
                <input type="hidden" name="driver_location_longitude" id="driver_location_longitude">

            <!-- Negotiation Header -->
                <div class="negotiation-header">
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
                        // Determine transport icon
                        $transportIcon = '✨';
                        if($userriderequest->vehicle_type_needed) {
                            if(stripos($userriderequest->vehicle_type_needed, 'traveler') !== false) $transportIcon = '✈️';
                            elseif(stripos($userriderequest->vehicle_type_needed, 'Truck') !== false || stripos($userriderequest->transport_title, 'Eurostar') !== false) $transportIcon = '🚛';
                            elseif(stripos($userriderequest->vehicle_type_needed, 'Van') !== false) $transportIcon = '🚐';
                            elseif(stripos($userriderequest->vehicle_type_needed, 'Car') !== false) $transportIcon = '🚗';
                            else $transportIcon = '🚢';
                        }

                        $routeFrom = $userriderequest->pickup_location ?? '-';
                        $routeTo = $userriderequest->destination_location ? $offer->destination_location ?? '-' : '-';
                    @endphp
                    <!-- Transport Details -->
                    <div class="transport-details">
                        <div class="route-info">
                            <div class="route-point">
                                <div class="route-label" data-lang="fr" class="active">DÉPART</div>
                                <div class="route-label" data-lang="en">DEPARTURE</div>
                                <div class="route-city">
                                    📍 {{ $routeFrom }}
                                </div>
                                <div class="route-date">
                                    <span data-lang="fr" class="active">Demain</span>
                                    <span data-lang="en">{{ \Illuminate\Support\Carbon::parse($userriderequest->pickup_date)->format('l, j F Y') }}</span> - {{ round(now()->diffInHours(\Illuminate\Support\Carbon::parse($userriderequest->pickup_date), false)) }}h
                                </div>
                            </div>
                            <div class="route-arrow">→</div>
                            <div class="route-point">
                                <div class="route-label" data-lang="fr" class="active">ARRIVÉE</div>
                                <div class="route-label" data-lang="en">ARRIVAL</div>
                                <div class="route-city">
                                    📍 {{ $routeTo }}
                                </div>
                                <div class="route-date">
                                    <span data-lang="fr" class="active">Demain</span>
                                    <span data-lang="en">{{ \Illuminate\Support\Carbon::parse($userriderequest->delivery_date)->format('l, j F Y') }}</span> - {{ round(now()->diffInHours(\Illuminate\Support\Carbon::parse($userriderequest->delivery_date), false)) }}h
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div>
                                <div class="route-label" data-lang="fr" class="active">VÉHICULE</div>
                                <div class="route-label" data-lang="en">VEHICLE</div>
                                <div style="font-weight: 600; color: var(--dark);">{{ $transportIcon }} {{ $userriderequest->vehicle_type_needed }}</div>
                                <div style="font-size: 12px; color: var(--gray);">
                                    <span data-lang="fr" class="active">9 places • Van</span>
                                    <span data-lang="en">9 seats • Van</span>
                                </div>
                            </div>
                            <div>
                                <div class="route-label">DISTANCE</div>
                                <div style="font-weight: 600; color: var(--dark);">{{ $userriderequest->distance }} km</div>
                                <div style="font-size: 12px; color: var(--gray);">
                                    <span data-lang="fr" class="active">~3h30 de route</span>
                                    <span data-lang="en">~3h30 drive</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package Info -->
                <div class="package-info">
                    <div class="package-header">
                        @php
                            $packages = json_decode($userriderequest->type_of_package, true);
                            $subtypesData = json_decode($userriderequest->sub_type_of_package, true);
                            $allSubtypes = [];

                            if (is_array($subtypesData)) {
                                foreach ($subtypesData as $category => $subtypes) {
                                    $allSubtypes = array_merge($allSubtypes, $subtypes);
                                }
                            }

                            $dimensions = json_decode($userriderequest->packages_json, true);

                            $totalLength = 0;
                            $totalWidth = 0;
                            $totalHeight = 0;
                            $totalWeight = 0;

                            if (is_array($dimensions)) {
                                foreach ($dimensions as $pkg) {
                                    $totalLength += isset($pkg['length']) ? (float)$pkg['length'] : 0;
                                    $totalWidth  += isset($pkg['width']) ? (float)$pkg['width'] : 0;
                                    $totalHeight += isset($pkg['height']) ? (float)$pkg['height'] : 0;
                                    $totalWeight += isset($pkg['weight']) ? (float)$pkg['weight'] : 0;
                                }
                            }
                        @endphp

                        <div class="package-icon">🛋️</div>
                        <div class="package-title">
                            <h3 data-lang="en">{{ implode(' + ', $allSubtypes) }}</h3>
                            @foreach($packages as $package)
                            <span class="package-category" data-lang="en">{{ $package }}</span>
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
                            <div class="detail-value">~{{ $totalWeight }}kg</div>
                            <div class="detail-label" data-lang="fr" class="active">Poids estimé</div>
                            <div class="detail-label" data-lang="en">Estimated weight</div>
                        </div>
                    </div>
                </div>

                <!-- Negotiation Area -->
                <div class="negotiation-area">
                    <h2 class="negotiation-title">
                        💬 <span data-lang="fr" class="active">Négociation du prix</span>
                        <span data-lang="en">Price negotiation</span>
                    </h2>

                    <!-- Price History -->
                    <div class="price-history">
                        <div class="price-history-header">
                            <div class="price-history-title" data-lang="fr" class="active">Historique des propositions</div>
                            <div class="price-history-title" data-lang="en">Offer history</div>
                            <div style="font-size: 13px; color: var(--gray);">
                                <span data-lang="fr" class="active">3 offres échangées</span>
                                <span data-lang="en">3 offers exchanged</span>
                            </div>
                        </div>

                        <div class="price-timeline">
                            <div class="price-item sender">
                                <div class="price-offer">
                                    <div class="offer-info">
                                        <div class="offer-author">
                                            👤 {{ $userriderequest->user->firstName }}.
                                            (<span data-lang="fr" class="active">Expéditeur</span>
                                            <span data-lang="en">Sender</span>)
                                        </div>
                                        <div class="offer-amount">50€</div>
                                        <div class="offer-time">
                                            <span data-lang="fr" class="active">Il y a 2 heures</span>
                                            <span data-lang="en">2 hours ago</span>
                                        </div>
                                    </div>
                                    <div class="offer-status-badge rejected" data-lang="fr" class="active">Refusée</div>
                                    <div class="offer-status-badge rejected" data-lang="en">Rejected</div>
                                </div>
                            </div>

                            <div class="price-item transporter">
                                <div class="price-offer">
                                    <div class="offer-info">
                                        <div class="offer-author">
                                            🚚 Pierre L.
                                            (<span data-lang="fr" class="active">Transporteur</span>
                                            <span data-lang="en">Transporter</span>)
                                        </div>
                                        <div class="offer-amount">85€</div>
                                        <div class="offer-time">
                                            <span data-lang="fr" class="active">Il y a 1 heure</span>
                                            <span data-lang="en">1 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="offer-status-badge rejected" data-lang="fr" class="active">Refusée</div>
                                    <div class="offer-status-badge rejected" data-lang="en">Rejected</div>
                                </div>
                            </div>

                            <div class="price-item sender">
                                <div class="price-offer">
                                    <div class="offer-info">
                                        <div class="offer-author">
                                            👤 Sophie M.
                                            (<span data-lang="fr" class="active">Expéditeur</span>
                                            <span data-lang="en">Sender</span>)
                                        </div>
                                        <div class="offer-amount">65€</div>
                                        <div class="offer-time">
                                            <span data-lang="fr" class="active">Il y a 30 minutes</span>
                                            <span data-lang="en">30 minutes ago</span>
                                        </div>
                                    </div>
                                    <div class="offer-status-badge current" data-lang="fr" class="active">En cours</div>
                                    <div class="offer-status-badge current" data-lang="en">Current</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- New Offer Form -->
                    <div class="new-offer-form">
                        <div class="form-header">
                            <span style="font-size: 24px;">💰</span>
                            <div class="form-title" data-lang="fr" class="active">Faire une contre-proposition</div>
                            <div class="form-title" data-lang="en">Make a counter-offer</div>
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

                        <textarea class="message-input"
                                  data-placeholder-fr="Ajouter un message (optionnel)..."
                                  data-placeholder-en="Add a message (optional)..."
                                  placeholder="Ajouter un message (optionnel)..."></textarea>

                        <div style="display: flex; gap: 12px;">
                            <button type="submit" class="btn btn-warning btn-block" id="propose-btn">
                                🤝 <span data-lang="fr" class="active">Proposer</span>
                                <span data-lang="en">Propose</span>
                                <span id="proposal-amount">{{ $userriderequest->fare }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="quick-actions">
                        <button class="btn btn-outline btn-block">
                            💬 <span data-lang="fr" class="active">Ouvrir la messagerie</span>
                            <span data-lang="en">Open chat</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right Sidebar -->
        <div class="sidebar">
            <!-- Sender Card -->
            <div class="user-card">
                <div style="padding: 6px 12px; background: var(--light); border-radius: 100px; font-size: 12px; font-weight: 600; color: var(--gray); margin-bottom: 16px; text-align: center;">
                    👤 <span data-lang="fr" class="active">EXPÉDITEUR</span>
                    <span data-lang="en">SENDER</span>
                </div>
                <div class="user-card-header">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($userriderequest->user->firstName . ' ' . $userriderequest->user->lastName) }}&background=random&color=fff"
                        alt="{{ $userriderequest->user->firstName }} {{ $userriderequest->user->lastName }}"
                        class="rounded-full w-10 h-10 user-avatar"
                    />
                    <div class="user-info">
                        <div class="user-name">{{ $userriderequest->user->firstName }}</div>
                        <div style="display: flex; align-items: center; gap: 4px; margin-top: 4px;">
                            ⭐ 4.8 <span style="color: var(--gray); font-size: 13px;">
                                (<span data-lang="fr" class="active">127 avis</span>
                                <span data-lang="en">127 reviews</span>)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="user-stats">
                    <div class="stat-item">
                        <div class="stat-value">45</div>
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
                    <div class="user-badge">🏆 <span data-lang="fr" class="active">Client fidèle</span><span data-lang="en">Loyal customer</span></div>
                </div>
            </div>

            <!-- Transporter Card -->
            <div class="user-card">
                <div style="padding: 6px 12px; background: var(--warning); color: white; border-radius: 100px; font-size: 12px; font-weight: 600; margin-bottom: 16px; text-align: center;">
                    🚚 <span data-lang="fr" class="active">TRANSPORTEUR</span>
                    <span data-lang="en">TRANSPORTER</span>
                </div>
                <div class="user-card-header">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100" alt="Pierre" class="user-avatar">
                    <div class="user-info">
                        <div class="user-name">Pierre L.</div>
                        <div style="display: flex; align-items: center; gap: 4px; margin-top: 4px;">
                            ⭐ 4.6 <span style="color: var(--gray); font-size: 13px;">
                                (<span data-lang="fr" class="active">89 avis</span>
                                <span data-lang="en">89 reviews</span>)
                            </span>
                        </div>
                    </div>
                </div>
                <div class="user-stats">
                    <div class="stat-item">
                        <div class="stat-value">234</div>
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
                    <div class="user-badge">🚗 <span data-lang="fr" class="active">Pro du co-transport</span><span data-lang="en">Co-transport pro</span></div>
                    <div class="user-badge">🛡️ <span data-lang="fr" class="active">Assuré</span><span data-lang="en">Insured</span></div>
                </div>
                <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border);">
                    <div style="font-size: 13px; color: var(--gray); margin-bottom: 8px;">
                        <span data-lang="fr" class="active">Véhicule vérifié</span>
                        <span data-lang="en">Verified vehicle</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 20px;">🚙</span>
                        <div>
                            <div style="font-weight: 600; color: var(--dark);">Mercedes Vito</div>
                            <div style="font-size: 12px; color: var(--gray);">AB-123-CD • 2019</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Security -->
            <div class="payment-security">
                <div class="security-header">
                    <div class="security-icon">🔒</div>
                    <div class="security-title" data-lang="fr" class="active">Paiement sécurisé</div>
                    <div class="security-title" data-lang="en">Secure payment</div>
                </div>
                <ul class="security-features">
                    <li data-lang="fr" class="active">Paiement bloqué jusqu'à livraison</li>
                    <li data-lang="en">Payment held until delivery</li>
                    <li data-lang="fr" class="active">Protection contre les fraudes</li>
                    <li data-lang="en">Fraud protection</li>
                    <li data-lang="fr" class="active">Assurance incluse</li>
                    <li data-lang="en">Insurance included</li>
                    <li data-lang="fr" class="active">Service client 24/7</li>
                    <li data-lang="en">24/7 customer service</li>
                </ul>
            </div>

            <!-- Tips -->
            <div class="tips-section">
                <div class="tips-header">
                    💡 <span data-lang="fr" class="active">Conseils pour négocier</span>
                    <span data-lang="en">Negotiation tips</span>
                </div>
                <ul class="tips-list">
                    <li data-lang="fr" class="active">Restez dans une fourchette raisonnable</li>
                    <li data-lang="en">Stay within a reasonable range</li>
                    <li data-lang="fr" class="active">Précisez vos contraintes horaires</li>
                    <li data-lang="en">Specify your time constraints</li>
                    <li data-lang="fr" class="active">Mentionnez l'aide au chargement</li>
                    <li data-lang="en">Mention loading assistance</li>
                    <li data-lang="fr" class="active">Soyez réactif dans vos réponses</li>
                    <li data-lang="en">Be responsive in your replies</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Chat Toggle Button -->
    <div class="chat-toggle" onclick="openChat()">
        💬
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
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

            // Update page title
            document.title = lang === 'en'
                ? 'Negotiation - Co-transport #CT2024-0847 - I entrust'
                : 'Négociation - Co-transport #CT2024-0847 - Je confie';
        }

        // Toggle mobile menu
        function toggleMobileMenu() {
            const navLinks = document.getElementById('navLinks');
            const overlay = document.getElementById('mobileMenuOverlay');
            navLinks.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Set price from suggestion
        function setPrice(price) {
            document.getElementById('price-input').value = price;
            updateProposalButton(price);
        }

        // Update proposal button text
        function updateProposalButton(price) {
            const button = document.getElementById('proposal-amount');
            if (button) {
                button.textContent = `${price}€`;
            }
        }

        // Handle price input change
        document.getElementById('price-input')?.addEventListener('input', function(e) {
            updateProposalButton(e.target.value);
        });

        // Open chat
        function openChat() {
            // Simulate chat opening
            alert(currentLang === 'fr' ? 'Ouverture du chat...' : 'Opening chat...');
            // In real implementation: window.location.href = '/messages/CT2024-0847';
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            switchLanguage(currentLang);
        });
    </script>
    <script>
        if ("geolocation" in navigator) {
            navigator.geolocation.watchPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    console.log(`Location updated: ${lat}, ${lng}`);

                    $('#driver_location_latitude').val(lat);
                    $('#driver_location_longitude').val(lng);
                },
                (error) => {
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            console.error("User denied the request for Geolocation.");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            console.error("Location information is unavailable.");
                            break;
                        case error.TIMEOUT:
                            console.error("The request to get user location timed out.");
                            break;
                        case error.UNKNOWN_ERROR:
                            console.error("An unknown error occurred.");
                            break;
                    }
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 5000,
                }
            );
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    </script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
</body>
</html>
