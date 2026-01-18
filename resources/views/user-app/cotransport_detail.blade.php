<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Lyon → Marseille - Je confie</title>
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
            --border: #e2e8f0;
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

        .nav-links {
            display: flex;
            gap: 32px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 92px auto 40px;
            padding: 0 20px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            color: var(--gray);
        }

        .breadcrumb a {
            color: var(--gray);
            text-decoration: none;
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: var(--warning);
            border-radius: 100px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        /* Header Card */
        .header-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 28px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .header-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .route-summary {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px;
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: var(--radius-lg);
            margin-bottom: 16px;
        }

        .route-point {
            flex: 1;
        }

        .route-label {
            font-size: 11px;
            color: var(--gray);
            margin-bottom: 4px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .route-city {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
        }

        .route-date {
            font-size: 13px;
            color: var(--gray);
            margin-top: 2px;
        }

        .route-arrow {
            font-size: 2rem;
            color: var(--primary);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: var(--light);
            border-radius: var(--radius);
        }

        .info-icon {
            font-size: 18px;
        }

        .info-text {
            font-size: 13px;
            color: var(--dark);
            font-weight: 500;
        }

        /* Content Layout */
        .content-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 20px;
            align-items: start;
        }

        /* Card */
        .card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Package Section */
        .package-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px;
            background: var(--light);
            border-radius: var(--radius);
            margin-bottom: 16px;
        }

        .package-icon {
            font-size: 36px;
        }

        .package-info {
            flex: 1;
        }

        .package-category {
            font-size: 11px;
            color: var(--gray);
            text-transform: uppercase;
            font-weight: 600;
        }

        .package-name {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }

        .spec-box {
            padding: 14px;
            background: var(--light);
            border-radius: var(--radius);
            text-align: center;
        }

        .spec-value {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 2px;
        }

        .spec-label {
            font-size: 11px;
            color: var(--gray);
            font-weight: 600;
        }

        .description-box {
            padding: 16px;
            background: var(--light);
            border-radius: var(--radius);
            font-size: 14px;
            line-height: 1.7;
            color: var(--dark);
        }

        /* Photo Gallery */
        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .photo-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: var(--radius);
            overflow: hidden;
            cursor: pointer;
        }

        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .photo-item:hover img {
            transform: scale(1.1);
        }

        /* Requirements */
        .requirements-list {
            display: grid;
            gap: 10px;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            background: var(--light);
            border-radius: var(--radius);
            border: 2px solid transparent;
        }

        .requirement-item.required {
            border-color: var(--danger);
            background: #fef2f2;
        }

        .requirement-icon {
            font-size: 20px;
        }

        .requirement-info {
            flex: 1;
        }

        .requirement-title {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .requirement-desc {
            font-size: 12px;
            color: var(--gray);
            margin-top: 2px;
        }

        .requirement-badge {
            padding: 4px 10px;
            background: var(--danger);
            color: white;
            border-radius: 100px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Warning List */
        .warning-list {
            padding: 16px;
            background: #fffbeb;
            border-radius: var(--radius);
        }

        .warning-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .warning-items {
            display: grid;
            gap: 6px;
        }

        .warning-item {
            display: flex;
            align-items: start;
            gap: 8px;
            font-size: 12px;
            color: var(--dark);
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 92px;
        }

        /* Price Card */
        .price-card {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: var(--radius-xl);
            padding: 24px;
            color: white;
            margin-bottom: 16px;
        }

        .price-label {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 6px;
        }

        .price-amount {
            font-size: 2.75rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 10px;
        }

        .price-info {
            font-size: 12px;
            opacity: 0.9;
            padding: 10px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius);
        }

        /* Action Buttons */
        .action-buttons {
            display: grid;
            gap: 10px;
            margin-bottom: 16px;
        }

        .btn {
            width: 100%;
            padding: 14px 20px;
            border-radius: var(--radius);
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
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

        .btn-secondary {
            background: white;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--light);
            border-color: var(--primary);
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

        /* Destination Info */
        .destination-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
        }

        .destination-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .address-box {
            padding: 14px;
            background: var(--light);
            border-radius: var(--radius);
            margin-bottom: 10px;
        }

        .address-label {
            font-size: 11px;
            color: var(--gray);
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .address-text {
            font-size: 14px;
            color: var(--dark);
            font-weight: 600;
        }

        .address-details {
            font-size: 12px;
            color: var(--gray);
            margin-top: 2px;
        }

        /* Alert Box */
        .alert-box {
            padding: 14px;
            background: #fef2f2;
            border: 2px solid #fecaca;
            border-radius: var(--radius);
            display: flex;
            gap: 10px;
            margin-bottom: 16px;
        }

        .alert-icon {
            font-size: 20px;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 700;
            color: var(--danger);
            margin-bottom: 4px;
            font-size: 13px;
        }

        .alert-text {
            font-size: 12px;
            color: var(--dark);
        }

        /* Info Box */
        .info-box {
            background: white;
            border-radius: var(--radius-xl);
            padding: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .info-box-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-list {
            display: grid;
            gap: 6px;
        }

        .info-list-item {
            font-size: 12px;
            color: var(--gray);
            display: flex;
            align-items: start;
            gap: 6px;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .content-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: relative;
                top: 0;
            }

            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .route-summary {
                flex-direction: column;
                text-align: center;
            }

            .route-arrow {
                transform: rotate(90deg);
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .price-amount {
                font-size: 2rem;
            }

            .photo-gallery {
                grid-template-columns: 1fr;
            }

            .specs-grid {
                grid-template-columns: 1fr;
            }
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
                <span class="logo-text">Je confie</span>
            </a>

            <div class="nav-links">
                <a href="/search">
                    <span class="lang-content fr active">Rechercher</span>
                    <span class="lang-content en">Search</span>
                </a>
                <a href="/my-trips">
                    <span class="lang-content fr active">Mes trajets</span>
                    <span class="lang-content en">My trips</span>
                </a>
                <a href="/messages">Messages</a>

                <div style="display: flex; gap: 4px; background: var(--light); padding: 4px; border-radius: 100px;">
                    <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                    <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="/">
                <span class="lang-content fr active">Accueil</span>
                <span class="lang-content en">Home</span>
            </a>
            <span>›</span>
            <a href="/search">
                <span class="lang-content fr active">Annonces</span>
                <span class="lang-content en">Listings</span>
            </a>
            <span>›</span>
            <span style="color: var(--dark);">{{ $user_ride_request->pickup_city }} → {{ $user_ride_request->destination_city }}</span>
        </div>

        <!-- Header Card -->
        <div class="header-card">
            <div class="status-badge">
                🔥 <span class="lang-content fr active">Recherche transporteur</span>
                <span class="lang-content en">Looking for carrier</span>
            </div>

            <h1 class="header-title">
                <span class="lang-content fr active">Détails du transport</span>
                <span class="lang-content en">Transport Details</span>
            </h1>

            <div class="route-summary">
                <div class="route-point">
                    <div class="route-label">
                        <span class="lang-content fr active">Départ</span>
                        <span class="lang-content en">Departure</span>
                    </div>
                    <div class="route-city">📍 {{ $user_ride_request->pickup_city }}</div>
                    <div class="route-date">{{ \Carbon\Carbon::parse($user_ride_request->pickup_date)->translatedFormat('d F Y • ~H:i') }}</div>
                </div>

                <div class="route-arrow">→</div>

                <div class="route-point">
                    <div class="route-label">
                        <span class="lang-content fr active">Arrivée</span>
                        <span class="lang-content en">Arrival</span>
                    </div>
                    <div class="route-city">📍 {{ $user_ride_request->destination_city }}</div>
                    <div class="route-date">{{ \Carbon\Carbon::parse($user_ride_request->delivery_date)->translatedFormat('d F Y • ~H:i') }}</div>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-icon">🆔</div>
                    <div class="info-text">
                        <span class="lang-content fr active">Réf</span>
                        <span class="lang-content en">Ref</span>
                        #{{ $user_ride_request->reference_id }}
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">⏰</div>
                    <div class="info-text">
                        <span class="lang-content fr active">Expire le {{ \Carbon\Carbon::parse($user_ride_request->expiry_date)->format('d/m/y') }}</span>
                        <span class="lang-content en">Expires {{ \Carbon\Carbon::parse($user_ride_request->expiry_date)->format('d/m/y') }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📏</div>
                    <div class="info-text">~{{ $user_ride_request->distance }} km</div>
                </div>
                @php
                    $now = \Carbon\Carbon::now();
                    $expiry = \Carbon\Carbon::parse($user_ride_request->expiry_date);

                    if ($expiry->isPast()) {
                        $remaining = 'Expiré';
                    }
                    else {
                        $totalMinutes = $now->diffInMinutes($expiry);
                        $hours = intdiv($totalMinutes, 60);
                        $minutes = $totalMinutes % 60;

                        $remaining = $hours . 'h' . ($minutes ? ' ' . $minutes . 'min' : '');
                    }

                    $transportName = ucfirst(strtolower($user_ride_request->vehicle_type_needed ?? ''));
                    $icon = $icons[$transportName] ?? '❓';

                    $packages = json_decode($user_ride_request->packages_json, true);

                    $totalWidth = 0;
                    $totalHeight = 0;
                    $totalLength = 0;
                    $totalWeight = 0;

                    foreach ($packages as $package) {
                        $totalWidth += $package['width'];
                        $totalHeight += $package['height'];
                        $totalLength += $package['length'];
                        $totalWeight += $package['weight'];
                    }

                @endphp
                <div class="info-item">
                    <div class="info-icon">⏱️</div>
                    <div class="info-text">~{{ $remaining }}</div>
                </div>
                <div class="info-item">
                    <div class="info-icon">{{ $icon }}</div>
                    <div class="info-text">
                        <span class="lang-content fr active">{{ $user_ride_request->vehicle_type_needed }}</span>
                        <span class="lang-content en">{{ $user_ride_request->vehicle_type_needed }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📅</div>
                    <div class="info-text">
                        <span class="lang-content fr active">{{ \Carbon\Carbon::parse($user_ride_request->created_at)->diffForHumans() }}</span>
                        <span class="lang-content en">{{ \Carbon\Carbon::parse($user_ride_request->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Layout -->
        <div class="content-layout">
            <!-- Main Content -->
            <div>
                <!-- Package Details -->
                <div class="card">
                    <h2 class="card-title">
                        📦 <span class="lang-content fr active">Détails du colis</span>
                        <span class="lang-content en">Package details</span>
                    </h2>

                    <div class="package-header">
                        <div class="package-icon">🪑</div>
                        <div class="package-info">
                            <div class="package-category">
                                <span class="lang-content fr active">Catégorie</span>
                                <span class="lang-content en">Category</span>
                            </div>
                            @php
                               $packages_types = json_decode($user_ride_request->type_of_package, true);

                            @endphp

                                <div class="package-name">
                                    <span class="lang-content fr active">
                                         {{ implode(' - ', $packages_types) }}
                                    </span>
                                    <span class="lang-content en">
                                         {{ implode(' - ', $packages_types) }}
                                    </span>
                                </div>
                        </div>
                    </div>

                    <div class="specs-grid">
                        <div class="spec-box">
                            <div class="spec-value">{{ count(json_decode($user_ride_request->type_of_package, true)) }}</div>
                            <div class="spec-label">
                                <span class="lang-content fr active">Articles</span>
                                <span class="lang-content en">Items</span>
                            </div>
                        </div>
                        <div class="spec-box">
                            <div class="spec-value">~{{ $totalWeight }} kg</div>
                            <div class="spec-label">
                                <span class="lang-content fr active">Poids</span>
                                <span class="lang-content en">Weight</span>
                            </div>
                        </div>
                        <div class="spec-box">
                            <div class="spec-value">{{ $totalLength }} × {{ $totalWidth }}m</div>
                            <div class="spec-label">
                                <span class="lang-content fr active">Longueur × Largeur</span>
                                <span class="lang-content en">Length × Width</span>
                            </div>
                        </div>
                        <div class="spec-box">
                            <div class="spec-value">{{ $totalHeight }}m</div>
                            <div class="spec-label">
                                <span class="lang-content fr active">Hauteur max</span>
                                <span class="lang-content en">Max height</span>
                            </div>
                        </div>
                    </div>

                    <div class="description-box">
                        <strong>
                            <span class="lang-content fr active">Description :</span>
                            <span class="lang-content en">Description:</span>
                        </strong><br><br>
                        <span class="lang-content fr active">
                            {{ $user_ride_request->recipient_delivery_instructions }}
                        </span>
                        <span class="lang-content en">
                            {{ $user_ride_request->recipient_delivery_instructions }}
                        </span>
                    </div>
                </div>

                <!-- Photos -->
                <div class="card">
                    <h2 class="card-title">
                        📸 <span class="lang-content fr active">Photos du colis</span>
                        <span class="lang-content en">Package photos</span>
                    </h2>

                    @php
                    $pictures = json_decode($user_ride_request->parcel_pictures);
                    @endphp

                    <div class="photo-gallery">
                        @foreach($pictures as $picture)
                        <div class="photo-item">
                            <img src="{{ asset('storage/'. $picture) }}?w=400" alt="Canapé">
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Requirements -->
                <div class="card">
                    <h2 class="card-title">
                        ✅ <span class="lang-content fr active">Exigences transporteur</span>
                        <span class="lang-content en">Carrier requirements</span>
                    </h2>

                    <div class="requirements-list">
                        @if($user_ride_request->requirement_transport_license)
                        <div class="requirement-item @if($user_ride_request->requirement_transport_license_level == 'mandatory') required @endif">
                            <div class="requirement-icon">🪪</div>
                            <div class="requirement-info">
                                <div class="requirement-title">
                                    <span class="lang-content fr active">Permis de conduire valide</span>
                                    <span class="lang-content en">Valid driver's license</span>
                                </div>
                                <div class="requirement-desc">
                                    <span class="lang-content fr active">Copie du permis en cours de validité</span>
                                    <span class="lang-content en">Copy of valid license</span>
                                </div>
                            </div>
                            @if($user_ride_request->requirement_transport_license_level == 'mandatory')
                            <div class="requirement-badge">
                                <span class="lang-content fr active">Requis</span>
                                <span class="lang-content en">Required</span>
                            </div>
                            @endif
                        </div>
                        @endif
                            @if($user_ride_request->requirement_insurance)
                        <div class="requirement-item @if($user_ride_request->requirement_insurance_level) required @endif">
                            <div class="requirement-icon">🛡️</div>
                            <div class="requirement-info">
                                <div class="requirement-title">
                                    <span class="lang-content fr active">Assurance transport</span>
                                    <span class="lang-content en">Transport insurance</span>
                                </div>
                                <div class="requirement-desc">
                                    <span class="lang-content fr active">Attestation min. 5000€</span>
                                    <span class="lang-content en">Certificate min. €5000</span>
                                </div>
                            </div>
                            @if($user_ride_request->requirement_insurance_level)
                            <div class="requirement-badge">
                                <span class="lang-content fr active">Requis</span>
                                <span class="lang-content en">Required</span>
                            </div>
                            @endif
                        </div>
                            @endif
                            @if($user_ride_request->requirement_vehicle)
                        <div class="requirement-item @if($user_ride_request->requirement_vehicle_level == 'mandatory') required @endif">
                            <div class="requirement-icon">🚛</div>
                            <div class="requirement-info">
                                <div class="requirement-title">
                                    <span class="lang-content fr active">Véhicule utilitaire</span>
                                    <span class="lang-content en">Utility vehicle</span>
                                </div>
                                <div class="requirement-desc">
                                    <span class="lang-content fr active">Minimum 12m³</span>
                                    <span class="lang-content en">Minimum 12m³</span>
                                </div>
                            </div>
                            @if($user_ride_request->requirement_vehicle_level)
                                <div class="requirement-badge">
                                    <span class="lang-content fr active">Requis</span>
                                    <span class="lang-content en">Required</span>
                                </div>
                            @endif
                        </div>
                            @endif
                            @if($user_ride_request->requirement_loading_help)
                        <div class="requirement-item @if($user_ride_request->requirement_loading_help_level) required @endif">
                            <div class="requirement-icon">💪</div>
                            <div class="requirement-info">
                                <div class="requirement-title">
                                    <span class="lang-content fr active">Aide chargement/déchargement</span>
                                    <span class="lang-content en">Loading/unloading help</span>
                                </div>
                                <div class="requirement-desc">
                                    <span class="lang-content fr active">Participation active requise</span>
                                    <span class="lang-content en">Active participation required</span>
                                </div>
                            </div>
                            @if($user_ride_request->requirement_loading_help_level)
                                <div class="requirement-badge">
                                    <span class="lang-content fr active">Requis</span>
                                    <span class="lang-content en">Required</span>
                                </div>
                            @endif
                        </div>
                            @endif
                    </div>
                </div>

                <!-- Prohibited Items -->
                <div class="card">
                    <h2 class="card-title">
                        ⚠️ <span class="lang-content fr active">Articles interdits</span>
                        <span class="lang-content en">Prohibited items</span>
                    </h2>

                    <div class="warning-list">
                        <div class="warning-title">
                            ❌ <span class="lang-content fr active">Non autorisés au transport :</span>
                            <span class="lang-content en">Not authorized for transport:</span>
                        </div>
                        <div class="warning-items">
                            <div class="warning-item">
                                <span>•</span>
                                <span>
                                    <span class="lang-content fr active">Matières dangereuses, inflammables, explosives</span>
                                    <span class="lang-content en">Dangerous, flammable, explosive materials</span>
                                </span>
                            </div>
                            <div class="warning-item">
                                <span>•</span>
                                <span>
                                    <span class="lang-content fr active">Produits illégaux, contrefaçons, objets volés</span>
                                    <span class="lang-content en">Illegal products, counterfeits, stolen goods</span>
                                </span>
                            </div>
                            <div class="warning-item">
                                <span>•</span>
                                <span>
                                    <span class="lang-content fr active">Armes, munitions, objets dangereux</span>
                                    <span class="lang-content en">Weapons, ammunition, dangerous objects</span>
                                </span>
                            </div>
                            <div class="warning-item">
                                <span>•</span>
                                <span>
                                    <span class="lang-content fr active">Animaux vivants</span>
                                    <span class="lang-content en">Live animals</span>
                                </span>
                            </div>
                            <div class="warning-item">
                                <span>•</span>
                                <span>
                                    <span class="lang-content fr active">Denrées périssables sans emballage</span>
                                    <span class="lang-content en">Perishable goods without packaging</span>
                                </span>
                            </div>
                            <div class="warning-item">
                                <span>•</span>
                                <span>
                                    <span class="lang-content fr active">Espèces, bijoux de grande valeur (>1000€)</span>
                                    <span class="lang-content en">Cash, high-value jewelry (>€1000)</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Price Card -->
                <div class="price-card">
                    <div class="price-label">
                        <span class="lang-content fr active">Budget proposé</span>
                        <span class="lang-content en">Proposed budget</span>
                    </div>
                    <div class="price-amount">{{ $user_ride_request->fare }}€</div>
                    <div class="price-info">
                        ✓ <span class="lang-content fr active">Paiement sécurisé via plateforme</span>
                        <span class="lang-content en">Secure payment via platform</span>
                    </div>
                </div>

                <!-- Sender Info -->
                <div class="destination-card">
                    <div class="destination-title">
                        👤 <span class="lang-content fr active">Expéditeur</span>
                        <span class="lang-content en">Sender</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; padding: 14px; background: var(--light); border-radius: var(--radius); margin-bottom: 12px;">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150" alt="Sophie" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                        <div style="flex: 1;">
                            <div style="font-weight: 700; color: var(--dark); margin-bottom: 2px;">{{ $user_ride_request->user->firstName }} {{ strtoupper(substr($user_ride_request->user->lastName, 0, 1)) }}
                                .</div>
                            <div style="font-size: 12px; color: var(--gray); display: flex; align-items: center; gap: 6px;">
                                ⭐ 4.9 • 12 <span class="lang-content fr active">envois</span><span class="lang-content en">shipments</span>
                            </div>
                        </div>
                    </div>
                    <div style="display: grid; gap: 6px; padding: 0 14px; font-size: 12px; color: var(--dark); margin-bottom: 12px;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <span style="color: var(--success);">✓</span>
                            <span class="lang-content fr active">Identité vérifiée</span>
                            <span class="lang-content en">Verified identity</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <span style="color: var(--success);">✓</span>
                            <span class="lang-content fr active">Email confirmé</span>
                            <span class="lang-content en">Email confirmed</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <span style="color: var(--success);">✓</span>
                            <span class="lang-content fr active">Téléphone vérifié</span>
                            <span class="lang-content en">Phone verified</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <span style="color: var(--success);">✓</span>
                            <span class="lang-content fr active">Membre depuis 2 ans</span>
                            <span class="lang-content en">Member for 2 years</span>
                        </div>
                    </div>
                    <button class="btn btn-secondary" onclick="contactSender()" style="font-size: 13px; padding: 10px 16px;">
                        💬 <span class="lang-content fr active">Contacter</span>
                        <span class="lang-content en">Contact</span>
                    </button>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">

                    <form action="{{ url('driver/ride-verification/' . $user_ride_request->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="fare" value="{{ $user_ride_request->fare }}">
                        <input type="hidden" name="driver_location_latitude" class="driver_location_latitude" id="driver_location_latitude">
                        <input type="hidden" name="driver_location_longitude" class="driver_location_longitude" id="driver_location_longitude">
                        <button type="submit" class="btn btn-primary">
                            ✅ <span data-lang="fr" class="active"> Apply current offer ({{ $user_ride_request->fare }}€)</span>
                        </button>
                    </form>

                    <a href="{{ url('driver/accept-ride/' . $user_ride_request->id) }}" class="btn btn-outline">
                        💬 <span class="lang-content fr active">Négocier le tarif</span>
                        <span class="lang-content en">Negotiate price</span>
                    </a>
                </div>

                @if($user_ride_request->requirement_transport_license && $user_ride_request->requirement_transport_license_level == 'mandatory' && $user_ride_request->requirement_insurance && $user_ride_request->requirement_insurance_level == 'mandatory' )
                <!-- Alert -->
                <div class="alert-box">
                    <div class="alert-icon">⚠️</div>
                    <div class="alert-content">
                        <div class="alert-title">
                            <span class="lang-content fr active">Documents requis</span>
                            <span class="lang-content en">Required documents</span>
                        </div>
                        <div class="alert-text">
                            <span class="lang-content fr active">Permis + Assurance avant validation</span>
                            <span class="lang-content en">License + Insurance before validation</span>
                        </div>
                    </div>
                </div>

                @endif

                <!-- Addresses -->
                <div class="destination-card">
                    <div class="destination-title">
                        📍 <span class="lang-content fr active">Adresse de collecte</span>
                        <span class="lang-content en">Pickup address</span>
                    </div>
                    <div class="address-box">
                        <div class="address-details">{{ $user_ride_request->pickup_location }}</div>
                    </div>
                    <div style="font-size: 12px; color: var(--gray); padding: 0 14px;">
                        <strong>
                            <span class="lang-content fr active">Contact :</span>
                            <span class="lang-content en">Contact:</span>
                        </strong> {{ $user_ride_request->user->firstName }} {{ $user_ride_request->user->lasttName }}<br>
                        <strong>
                            <span class="lang-content fr active">Instructions :</span>
                            <span class="lang-content en">Instructions:</span>
                        </strong>
                        <span class="lang-content fr active">{{ $user_ride_request->pickup_additional_info }}</span>
                        <span class="lang-content en">{{ $user_ride_request->pickup_additional_info }}</span>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="destination-title">
                        📍 <span class="lang-content fr active">Adresse de livraison</span>
                        <span class="lang-content en">Delivery address</span>
                    </div>
                    <div class="address-box">
                        <div class="address-details">{{ $user_ride_request->destination_location }}</div>
                    </div>
                    <div style="font-size: 12px; color: var(--gray); padding: 0 14px;">
                        <strong>
                            <span class="lang-content fr active">Destinataire :</span>
                            <span class="lang-content en">Recipient:</span>
                        </strong> {{ $user_ride_request->receiver_name }}<br>
                        <strong>
                            <span class="lang-content fr active">Instructions :</span>
                            <span class="lang-content en">Instructions:</span>
                        </strong>
                        <span class="lang-content fr active">{{ $user_ride_request->destination_additional_info }}</span>
                        <span class="lang-content en">{{ $user_ride_request->destination_additional_info }}</span>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="info-box">
                    <div class="info-box-title">
                        ℹ️ <span class="lang-content fr active">Informations importantes</span>
                        <span class="lang-content en">Important information</span>
                    </div>
                    <div class="info-list">
                        <div class="info-list-item">
                            <strong>🆔 <span class="lang-content fr active">Référence :</span><span class="lang-content en">Reference:</span></strong> #{{ $user_ride_request->reference_id }}
                        </div>
                        <div class="info-list-item">
                            <strong>⏰ <span class="lang-content fr active">Expire le :</span><span class="lang-content en">Expires:</span></strong> {{ \Carbon\Carbon::parse($user_ride_request->expiry_date)->format('d/m/y') }}
                        </div>
                        <div class="info-list-item">
                            ✓ <span class="lang-content fr active">Paiement retenu jusqu'à livraison</span>
                            <span class="lang-content en">Payment held until delivery</span>
                        </div>
                        <div class="info-list-item">
                            ✓ <span class="lang-content fr active">Assurance transport incluse</span>
                            <span class="lang-content en">Transport insurance included</span>
                        </div>
                        <div class="info-list-item">
                            ✓ <span class="lang-content fr active">Support 7j/7 disponible</span>
                            <span class="lang-content en">Support available 7 days/week</span>
                        </div>
                        <div class="info-list-item">
                            ✓ <span class="lang-content fr active">Système d'évaluation mutuel</span>
                            <span class="lang-content en">Mutual rating system</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=geometry" async defer></script>
    <script>

        if ("geolocation" in navigator) {
            navigator.geolocation.watchPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    console.log(`Location updated: ${lat}, ${lng}`);

                    $('.driver_location_latitude').val(lat);
                    $('.driver_location_longitude').val(lng);
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
        }

        // Apply as carrier
        function applyAsCarrier() {
            const lang = document.querySelector('.lang-btn.active').textContent.toLowerCase();
            const message = lang === 'fr'
                ? 'Vous allez proposer vos services pour ce transport.\n\nVous devez avoir :\n✓ Permis de conduire valide\n✓ Assurance transport (min. 5000€)\n✓ Véhicule adapté (12m³ min)\n\nContinuer ?'
                : 'You are about to apply for this transport.\n\nYou must have:\n✓ Valid driver\'s license\n✓ Transport insurance (min. €5000)\n✓ Suitable vehicle (12m³ min)\n\nContinue?';

            if (confirm(message)) {
                alert(lang === 'fr'
                    ? '✅ Candidature envoyée ! L\'expéditeur va examiner votre profil.'
                    : '✅ Application sent! The sender will review your profile.');
                // window.location.href = '/apply?listing=12345';
            }
        }

        // Negotiate price
        function negotiatePrice() {
            const lang = document.querySelector('.lang-btn.active').textContent.toLowerCase();
            const price = prompt(
                lang === 'fr'
                    ? 'Quel tarif proposez-vous pour ce transport ?\n\nBudget initial : 120€'
                    : 'What price do you propose for this transport?\n\nInitial budget: €120',
                '120'
            );

            if (price && !isNaN(price) && parseFloat(price) > 0) {
                alert(lang === 'fr'
                    ? `✅ Proposition de ${price}€ envoyée à l'expéditeur !`
                    : `✅ Proposal of €${price} sent to the sender!`);
                // Send negotiation request
            }
        }

        // Photo lightbox
        document.querySelectorAll('.photo-item').forEach(item => {
            item.addEventListener('click', function() {
                const img = this.querySelector('img');
                const modal = document.createElement('div');
                modal.style.cssText = 'position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 9999; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 20px;';
                modal.innerHTML = `<img src="${img.src}" style="max-width: 100%; max-height: 100%; border-radius: 12px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);">`;
                modal.addEventListener('click', () => modal.remove());
                document.body.appendChild(modal);
            });
        });
    </script>
</body>
</html>
