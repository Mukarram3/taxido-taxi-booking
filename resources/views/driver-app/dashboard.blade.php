<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Réservation - Je confie | Transport collaboratif</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8fafc;
            color: #1a1a1a;
            line-height: 1.6;
        }

        /* Variables */
        :root {
            --primary: #5046e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --eco-green: #059669;
            --secondary: #06b6d4;
            --success: #10b981;
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

        .lang-block {
            display: none;
        }

        .lang-block.active {
            display: block;
        }

        /* Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            z-index: 1000;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .nav-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 72px;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 72px;
            width: 280px;
            height: calc(100vh - 72px);
            background: white;
            border-right: 1px solid var(--border);
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid var(--border);
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

        .user-profile {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .user-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .user-role {
            font-size: 13px;
            color: var(--gray);
        }

        .service-mode {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border);
        }

        .service-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
        }

        .nav-menu {
            padding: 16px 0;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-item:hover {
            background: var(--light);
            color: var(--primary);
        }

        .nav-item.active {
            background: linear-gradient(90deg, rgba(80,70,229,0.1), transparent);
            color: var(--primary);
            border-left: 3px solid var(--primary);
        }

        .nav-divider {
            height: 1px;
            background: var(--border);
            margin: 16px 24px;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        .top-bar {
            background: white;
            padding: 20px 32px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Notification Bell */
        .notification-bell {
            position: relative;
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
            transition: all 0.3s ease;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-bell:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.05);
        }

        .notification-bell.has-notifications::after {
            content: attr(data-count);
            position: absolute;
            top: 4px;
            right: 4px;
            min-width: 18px;
            height: 18px;
            padding: 0 5px;
            background: var(--danger);
            border-radius: 10px;
            border: 2px solid white;
            font-size: 10px;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.15); opacity: 0.8; }
        }

        .bell-icon {
            font-size: 22px;
            animation: none;
            transition: transform 0.3s ease;
        }

        .notification-bell.ringing .bell-icon {
            animation: ring 0.5s ease-in-out 3;
        }

        @keyframes ring {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-15deg); }
            75% { transform: rotate(15deg); }
        }

        /* Notification Dropdown */
        .notification-dropdown {
            position: absolute;
            top: 70px;
            right: 20px;
            width: 420px;
            max-height: 550px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1100;
            overflow: hidden;
        }

        .notification-dropdown.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .dropdown-header {
            padding: 20px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dropdown-title {
            font-weight: 700;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dropdown-actions {
            display: flex;
            gap: 8px;
        }

        .dropdown-btn {
            padding: 6px 12px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .dropdown-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .dropdown-close {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .dropdown-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .dropdown-content {
            max-height: 450px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            gap: 14px;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .notification-item:hover {
            background: var(--light);
        }

        .notification-item.unread {
            background: linear-gradient(90deg, rgba(80, 70, 229, 0.05), transparent);
            border-left: 3px solid var(--primary);
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 18px;
        }

        .notification-body {
            flex: 1;
            min-width: 0;
        }

        .notification-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
            font-size: 14px;
        }

        .notification-message {
            font-size: 13px;
            color: var(--gray);
            line-height: 1.4;
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .notification-time {
            font-size: 11px;
            color: var(--gray);
        }

        .dropdown-footer {
            padding: 12px 20px;
            border-top: 1px solid var(--border);
            text-align: center;
        }

        .view-all-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .view-all-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .empty-notifications {
            padding: 60px 20px;
            text-align: center;
            color: var(--gray);
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        .lang-switcher {
            display: flex;
            background: var(--light);
            border-radius: 8px;
            padding: 4px;
        }

        .lang-btn {
            padding: 8px 16px;
            border: none;
            background: transparent;
            border-radius: 6px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--gray);
        }

        .lang-btn.active {
            background: white;
            color: var(--primary);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        /* Dashboard Content */
        .dashboard-content {
            padding: 32px;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .action-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s;
            border: 1px solid var(--border);
            cursor: pointer;
        }

        .action-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            border-color: var(--primary);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 12px;
        }

        .action-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .action-desc {
            font-size: 13px;
            color: var(--gray);
        }

        /* Stats Section */
        .stats-section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 32px;
        }

        .stats-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .stats-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .stat-card {
            padding: 16px;
            background: var(--light);
            border-radius: 10px;
            text-align: center;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin: 0 auto 12px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--gray);
        }

        .stat-trend {
            margin-top: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .stat-trend.up {
            color: var(--success);
        }

        /* Activity Section */
        .activity-section {
            background: white;
            border-radius: 12px;
            padding: 24px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
        }

        .filter-tabs {
            display: flex;
            gap: 8px;
        }

        .filter-tab {
            padding: 8px 16px;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-tab.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .activity-card {
            padding: 16px;
            background: var(--light);
            border-radius: 10px;
            border: 1px solid var(--border);
            transition: all 0.3s;
        }

        .activity-card:hover {
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .activity-route {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .activity-type {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-reservation {
            background: rgba(80,70,229,0.1);
            color: var(--primary);
        }

        .activity-details {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .activity-detail {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: var(--gray);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
                transition: transform 0.3s;
            }

            .sidebar.mobile-active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        .mobile-overlay.active {
            display: block;
        }
    </style>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">JC</div>
            <div class="logo-text">Je Confie</div>
        </div>
    </div>

    <div class="user-profile">
        <img class="user-avatar" src="https://ui-avatars.com/api/?name={{ urlencode(\Illuminate\Support\Facades\Auth::guard('driver')->user()->firstName . ' ' . \Illuminate\Support\Facades\Auth::guard('driver')->user()->lastName) }}&background=random&color=fff" />
        <div class="user-name">{{ urlencode(\Illuminate\Support\Facades\Auth::guard('driver')->user()->firstName . ' ' . \Illuminate\Support\Facades\Auth::guard('driver')->user()->lastName) }}</div>
        <div class="user-role">
            <span class="lang-content fr active">Membre depuis {{\Illuminate\Support\Facades\Auth::guard('user')->user()->created_at->year}}</span>
            <span class="lang-content en">Member since {{\Illuminate\Support\Facades\Auth::guard('user')->user()->created_at->year}}</span>
        </div>
    </div>

    <div class="service-mode">
        <div class="service-badge">
            ✈️ <span class="lang-content fr active">MODE RÉSERVATION</span>
            <span class="lang-content en">BOOKING MODE</span>
        </div>
    </div>

    <nav class="nav-menu">
        <a href="{{ url('driver/dashboard') }}" class="nav-item active">
            <span>📊</span>
            <span class="lang-content fr active">Tableau de bord</span>
            <span class="lang-content en">Dashboard</span>
        </a>
        <a href="{{ url('driver/my-rides') }}" class="nav-item">
            <span>✈️</span>
            <span class="lang-content fr active">Mes voyages</span>
            <span class="lang-content en">My trips</span>
        </a>
        <a href="#" class="nav-item">
            <span>📦</span>
            <span class="lang-content fr active">Réservations reçues</span>
            <span class="lang-content en">Received bookings</span>
        </a>
        <a href="#" class="nav-item">
            <span>💰</span>
            <span class="lang-content fr active">Mes gains</span>
            <span class="lang-content en">My earnings</span>
        </a>
        <a href="{{ url('driver/profile-setting') }}" class="nav-item">
            <span>👤</span>
            <span class="lang-content fr active">Mon profil</span>
            <span class="lang-content en">My profile</span>
        </a>
        <a href="jeconfie-messaging-page.html" class="nav-item">
            <span>💬</span>
            <span class="lang-content fr active">Messages</span>
            <span class="lang-content en">Messages</span>
        </a>
        <a href="jeconfie-payment.html" class="nav-item">
            <span>💳</span>
            <span class="lang-content fr active">Paiements</span>
            <span class="lang-content en">Payments</span>
        </a>
        <a href="jeconfie-invoices.html" class="nav-item">
            <span>📄</span>
            <span class="lang-content fr active">Factures</span>
            <span class="lang-content en">Invoices</span>
        </a>

        <div class="nav-divider"></div>

        <a href="/" class="nav-item">
            <span>🏠</span>
            <span class="lang-content fr active">Accueil du site</span>
            <span class="lang-content en">Home</span>
        </a>
        <a href="/offres" class="nav-item">
            <span>📋</span>
            <span class="lang-content fr active">Offres disponibles</span>
            <span class="lang-content en">Available offers</span>
        </a>
        <a href="jeconfie_tracking_page__1_.html" class="nav-item">
            <span>📍</span>
            <span class="lang-content fr active">Suivi des colis</span>
            <span class="lang-content en">Package tracking</span>
        </a>
        <a href="dashboard-cotransport.html" class="nav-item">
            <span>🔄</span>
            <span class="lang-content fr active">Mode Co-transport</span>
            <span class="lang-content en">Co-transport Mode</span>
        </a>
        <a href="{{url('driver/logout')}}" class="nav-item">
            <span>🔄</span>
            <span class="lang-content fr active">Logout</span>
            <span class="lang-content en">Logout</span>
        </a>
    </nav>
</div>

<!-- Mobile Overlay -->
<div class="mobile-overlay" id="mobileOverlay" onclick="toggleMobileMenu()"></div>

@php
    $notifications = \Illuminate\Support\Facades\Auth::guard('driver')->user()->unreadNotifications;
    $unreadCount = $notifications->count();
@endphp

<!-- Main Content -->
<div class="main-content">
    <div class="top-bar">
        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
        <div class="page-title">
            <span class="lang-content fr active">Dashboard Réservation</span>
            <span class="lang-content en">Booking Dashboard</span>
        </div>
        <div class="top-actions">

            <!-- Notification Bell -->
            <div class="notification-bell {{ $unreadCount > 0 ? 'has-notifications' : '' }}"
                 id="notificationBell"
                 onclick="toggleNotificationDropdown()"
                 data-count="{{ $unreadCount }}">
                <span class="bell-icon">🔔</span>
            </div>

            <div class="lang-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
        </div>
    </div>

    <!-- Notification Dropdown -->
    <div class="notification-dropdown" id="notificationDropdown">
        <div class="dropdown-header">
            <div class="dropdown-title">
                <span>🔔</span>
                <span class="lang-content fr active">Notifications</span>
                <span class="lang-content en">Notifications</span>
            </div>
            <div class="dropdown-actions">
                @if($unreadCount > 0)
                    <button class="dropdown-btn" id="mark-all">
                        <span class="lang-content fr active">Tout marquer lu</span>
                        <span class="lang-content en">Mark all read</span>
                    </button>
                @endif
                <button class="dropdown-close" onclick="toggleNotificationDropdown()">✕</button>
            </div>
        </div>

        <div class="dropdown-content">
            @forelse($notifications as $notification)
                <div class="notification-item unread" data-id="{{ $notification->id }}">
                    <div class="notification-icon" style="background: linear-gradient(135deg, rgba(6, 182, 212, 0.9), rgba(8, 145, 178, 0.9)); color: white;">
                        <i class="iconsax" data-icon="ticket-discount">🎫</i>
                    </div>
                    <div class="notification-body">
                        <div class="notification-title">
                            @if(isset($notification->data['name']))
                                {{ $notification->data['name'] }}
                            @else
                                New Notification
                            @endif
                        </div>
                        <div class="notification-message">
                            @if(isset($notification->data['message']))
                                {{ $notification->data['message'] }}
                            @else
                                Carrier {{ $notification->data['name'] ?? 'Unknown' }} ({{ $notification->data['email'] ?? '' }}) wants to complete ride with you.
                            @endif
                        </div>
                        <div class="notification-time">
                            {{ $notification->created_at->diffForHumans() }}
                        </div>
                        <div class="notification-actions">
                            <a href="#" class="mark-as-read" data-id="{{ $notification->id }}">
                                <span class="lang-content fr active">Marquer comme lu</span>
                                <span class="lang-content en">Mark as read</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-notifications">
                    <div class="empty-icon">🔕</div>
                    <div>
                        <span class="lang-content fr active">Aucune notification</span>
                        <span class="lang-content en">No notifications</span>
                    </div>
                </div>
            @endforelse
        </div>

        @if($unreadCount > 0)
            <div class="dropdown-footer">
                <a href="{{ url('/notifications') }}" class="view-all-link">
                    <span class="lang-content fr active">Voir toutes les notifications</span>
                    <span class="lang-content en">View all notifications</span>
                    <span>→</span>
                </a>
            </div>
        @endif
    </div>

    <div class="dashboard-content">
        <!-- Quick Actions -->
        <div class="quick-actions">
            <div class="action-card">
                <div class="action-icon" style="background: rgba(80,70,229,0.1); color: var(--primary);">➕</div>
                <div class="action-title">
                    <span class="lang-content fr active">Publier un voyage</span>
                    <span class="lang-content en">Post a trip</span>
                </div>
                <div class="action-desc">
                    <span class="lang-content fr active">Créez une nouvelle annonce</span>
                    <span class="lang-content en">Create a new listing</span>
                </div>
            </div>

            <div class="action-card">
                <div class="action-icon" style="background: rgba(245,158,11,0.1); color: var(--warning);">🔔</div>
                <div class="action-title">
                    <span class="lang-content fr active">3 demandes en attente</span>
                    <span class="lang-content en">3 pending requests</span>
                </div>
                <div class="action-desc">
                    <span class="lang-content fr active">À traiter rapidement</span>
                    <span class="lang-content en">Process quickly</span>
                </div>
            </div>

            <div class="action-card">
                <div class="action-icon" style="background: rgba(6,182,212,0.1); color: var(--secondary);">📍</div>
                <div class="action-title">
                    <span class="lang-content fr active">Suivi en temps réel</span>
                    <span class="lang-content en">Real-time tracking</span>
                </div>
                <div class="action-desc">
                    <span class="lang-content fr active">Suivez vos colis</span>
                    <span class="lang-content en">Track your packages</span>
                </div>
            </div>

            <div class="action-card">
                <div class="action-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">💬</div>
                <div class="action-title">
                    <span class="lang-content fr active">Messages</span>
                    <span class="lang-content en">Messages</span>
                </div>
                <div class="action-desc">
                    <span class="lang-content fr active">2 non lus</span>
                    <span class="lang-content en">2 unread</span>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="stats-section">
            <div class="stats-header">
                <h2 class="stats-title">
                    <span class="lang-content fr active">Statistiques du mois</span>
                    <span class="lang-content en">Monthly statistics</span>
                </h2>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(80,70,229,0.1); color: var(--primary);">✈️</div>
                    <div class="stat-value">8</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">Voyages postés</span>
                        <span class="lang-content en">Trips posted</span>
                    </div>
                    <div class="stat-trend up">↗ +3 vs mois dernier</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">📦</div>
                    <div class="stat-value">24</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">Colis transportés</span>
                        <span class="lang-content en">Packages transported</span>
                    </div>
                    <div class="stat-trend up">↗ +15%</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(5,150,105,0.1); color: var(--eco-green);">💰</div>
                    <div class="stat-value">€1,245</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">Revenus générés</span>
                        <span class="lang-content en">Revenue generated</span>
                    </div>
                    <div class="stat-trend up">↗ +€320 ce mois</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(239,68,68,0.1); color: var(--danger);">⭐</div>
                    <div class="stat-value">4.9/5</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">Note moyenne</span>
                        <span class="lang-content en">Average rating</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activités récentes -->
        <div class="activity-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="lang-content fr active">Activité récente</span>
                    <span class="lang-content en">Recent activity</span>
                </h2>
                <div class="filter-tabs">
                    <button class="filter-tab active">
                        <span class="lang-content fr active">Tout</span>
                        <span class="lang-content en">All</span>
                    </button>
                    <button class="filter-tab">
                        <span class="lang-content fr active">En cours</span>
                        <span class="lang-content en">Ongoing</span>
                    </button>
                    <button class="filter-tab">
                        <span class="lang-content fr active">Terminé</span>
                        <span class="lang-content en">Completed</span>
                    </button>
                </div>
            </div>

            <div class="activity-list">
                <div class="activity-card">
                    <div class="activity-header">
                        <div class="activity-route">
                            <span>🔵 Paris CDG</span>
                            <span>→</span>
                            <span>🔴 New York JFK</span>
                        </div>
                        <span class="activity-type type-reservation">✈️ RÉSERVATION</span>
                    </div>
                    <div class="activity-details">
                        <div class="activity-detail">
                            📦 2.5kg
                        </div>
                        <div class="activity-detail">
                            💰 €30
                        </div>
                        <div class="activity-detail">
                            📅 28 janvier
                        </div>
                        <div class="activity-detail">
                            👤 Thomas M.
                        </div>
                    </div>
                </div>

                <div class="activity-card">
                    <div class="activity-header">
                        <div class="activity-route">
                            <span>🔵 Marseille</span>
                            <span>→</span>
                            <span>🔴 Alger</span>
                        </div>
                        <span class="activity-type type-reservation">🚢 RÉSERVATION</span>
                    </div>
                    <div class="activity-details">
                        <div class="activity-detail">
                            📦 5kg
                        </div>
                        <div class="activity-detail">
                            💰 €30
                        </div>
                        <div class="activity-detail">
                            📅 2 février
                        </div>
                        <div class="activity-detail">
                            👤 Ahmed K.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    window._token = $('meta[name="csrf-token"]').attr('content')
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

    // Notification dropdown toggle
    function toggleNotificationDropdown() {
        const dropdown = document.getElementById('notificationDropdown');
        const bell = document.getElementById('notificationBell');

        dropdown.classList.toggle('show');

        // Ring bell when opening
        if (dropdown.classList.contains('show')) {
            bell.classList.add('ringing');
            setTimeout(() => {
                bell.classList.remove('ringing');
            }, 1500);
        }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('notificationDropdown');
        const bell = document.getElementById('notificationBell');

        if (!dropdown.contains(event.target) && !bell.contains(event.target)) {
            dropdown.classList.remove('show');
        }
    });

    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('driver.markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }

    // Mark single notification as read
    document.addEventListener('DOMContentLoaded', function() {
        // Mark single as read
        $('.mark-as-read').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            const $this = $(this);
            const notificationId = $this.data('id');
            let request = sendMarkRequest(notificationId);

            request.done(() => {
                // Remove the notification item
                $this.closest('.notification-item').remove();

                // Update badge count
                updateBadgeCount();

                // Check if no more notifications
                const remainingNotifs = $('.notification-item').length;
                if (remainingNotifs === 0) {
                    const $dropdownContent = $('.dropdown-content');
                    const $markAllBtn = $('#mark-all');
                    const $footer = $('.dropdown-footer');

                    if ($dropdownContent.length) {
                        $dropdownContent.html(`
                            <div class="empty-notifications">
                                <div class="empty-icon">🔕</div>
                                <div>
                                    <span class="lang-content fr active">Aucune notification</span>
                                    <span class="lang-content en">No notifications</span>
                                </div>
                            </div>
                        `);
                    }
                    if ($markAllBtn.length) $markAllBtn.hide();
                    if ($footer.length) $footer.hide();
                }
            });

            request.fail((xhr) => {
                console.error('Error marking notification as read:', xhr.responseText);
            });
        });

        // Mark all as read
        const markAllBtn = document.getElementById('mark-all');
        if (markAllBtn) {
            $('#mark-all').click(function(e) {
                e.preventDefault();

                const $this = $(this);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('driver.markDriverAllNotification') }}',
                    data: {
                        _token: '{{ csrf_token() }}'
                    }
                })
                    .done((data) => {
                        if (data.success) {
                            // Remove all notification items
                            $('.notification-item.unread').remove();

                            // Update badge
                            const $bell = $('#notificationBell');
                            if ($bell.length) {
                                $bell.removeClass('has-notifications');
                                $bell.removeAttr('data-count');
                            }

                            // Update content
                            const $dropdownContent = $('.dropdown-content');
                            if ($dropdownContent.length) {
                                $dropdownContent.html(`
                            <div class="empty-notifications">
                                <div class="empty-icon">🔕</div>
                                <div>
                                    <span class="lang-content fr active">Aucune notification</span>
                                    <span class="lang-content en">No notifications</span>
                                </div>
                            </div>
                        `);
                            }

                            // Hide mark all button and footer
                            $this.hide();
                            $('.dropdown-footer').hide();
                        }
                    })
                    .fail((xhr) => {
                        console.error('Error marking all notifications as read:', xhr.responseText);
                    });
            });
        }
    });

    // Update badge count
    function updateBadgeCount() {
        const unreadCount = document.querySelectorAll('.notification-item.unread').length;
        const bell = document.getElementById('notificationBell');

        if (unreadCount > 0) {
            bell.classList.add('has-notifications');
            bell.setAttribute('data-count', unreadCount);
        } else {
            bell.classList.remove('has-notifications');
            bell.removeAttribute('data-count');
        }
    }

    // Ring bell for new notification (call this when receiving real-time notification)
    function ringBell() {
        const bell = document.getElementById('notificationBell');
        bell.classList.add('has-notifications');
        bell.classList.add('ringing');

        setTimeout(() => {
            bell.classList.remove('ringing');
        }, 1500);

        updateBadgeCount();
    }

    // Mobile menu toggle
    function toggleMobileMenu() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');

        sidebar.classList.toggle('mobile-active');
        overlay.classList.toggle('active');
    }

    // Initialize preferences
    document.addEventListener('DOMContentLoaded', function() {
        const preferredLang = localStorage.getItem('preferredLanguage');
        if (preferredLang === 'en') {
            document.querySelector('.lang-btn[onclick*="en"]').click();
        }
    });
</script>
</body>
</html>
