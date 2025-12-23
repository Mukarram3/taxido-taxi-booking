<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Réservation - Je confie | Transport collaboratif</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        /* ==================== LANGUAGE MANAGEMENT ==================== */
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: inline-block;
        }

        /* ==================== SIDEBAR ==================== */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: white;
            border-right: 1px solid var(--border);
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
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
            margin-bottom: 12px;
            object-fit: cover;
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
            width: 100%;
            justify-content: center;
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

        /* ==================== MAIN CONTENT ==================== */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .top-bar {
            background: white;
            padding: 20px 32px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 800;
        }

        .top-bar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .mobile-menu-toggle {
            display: none;
            background: var(--light);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--dark);
            transition: all 0.3s;
        }

        .mobile-menu-toggle:hover {
            background: var(--border);
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

        /* ==================== NOTIFICATION BELL ==================== */
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

        /* ==================== NOTIFICATION DROPDOWN ==================== */
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
            align-items: center;
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

        .notification-actions {
            margin-top: 8px;
        }

        .mark-as-read {
            font-size: 12px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .mark-as-read:hover {
            text-decoration: underline;
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

        /* ==================== LANGUAGE SWITCHER ==================== */
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

        /* ==================== DASHBOARD CONTENT ==================== */
        .dashboard-content {
            padding: 32px;
        }

        /* ==================== QUICK ACTIONS ==================== */
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
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            border-color: var(--primary);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
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

        /* ==================== STATS SECTION ==================== */
        .stats-section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 32px;
            border: 1px solid var(--border);
        }

        .stats-header {
            margin-bottom: 24px;
        }

        .stats-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .stat-card {
            padding: 20px;
            background: var(--light);
            border-radius: 12px;
            text-align: center;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
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
            margin-bottom: 8px;
        }

        .stat-trend {
            font-size: 12px;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 6px;
            display: inline-block;
        }

        .stat-trend.up {
            background: rgba(16,185,129,0.1);
            color: var(--success);
        }

        /* ==================== ACTIVITY SECTION ==================== */
        .activity-section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            border: 1px solid var(--border);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
        }

        .filter-tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
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

        .filter-tab:hover {
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
            border-radius: 12px;
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
            flex-wrap: wrap;
            gap: 8px;
        }

        .activity-route {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
            flex-wrap: wrap;
        }

        .activity-type {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .type-reservation {
            background: rgba(80,70,229,0.1);
            color: var(--primary);
        }

        .activity-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 8px;
        }

        .activity-detail {
            font-size: 12px;
            color: var(--gray);
            padding: 6px 10px;
            background: white;
            border-radius: 6px;
        }

        /* ==================== RESPONSIVE DESIGN ==================== */
        @media (max-width: 1024px) {
            .quick-actions {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-active {
                transform: translateX(0);
            }

            .sidebar-overlay.active {
                display: block;
                opacity: 1;
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: flex;
            }

            .page-title {
                font-size: 20px;
            }

            .top-bar {
                padding: 16px 20px;
            }

            .dashboard-content {
                padding: 20px;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .notification-dropdown {
                width: calc(100vw - 40px);
                right: 20px;
                left: 20px;
            }

            .activity-details {
                grid-template-columns: 1fr;
            }

            .top-actions {
                gap: 8px;
            }

            .lang-switcher {
                padding: 2px;
            }

            .lang-btn {
                padding: 6px 12px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 18px;
            }

            .activity-route {
                font-size: 13px;
            }

            .stat-value {
                font-size: 24px;
            }

            .stats-title,
            .section-title {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="logo">
            <div class="logo-icon">JC</div>
            <div class="logo-text">Je Confie</div>
        </a>
    </div>

    <div class="user-profile">
        <img class="user-avatar" src="https://ui-avatars.com/api/?name={{ urlencode(\Illuminate\Support\Facades\Auth::guard('driver')->user()->firstName . ' ' . \Illuminate\Support\Facades\Auth::guard('driver')->user()->lastName) }}&background=random&color=fff" alt="Driver Avatar" />
        <div class="user-name">{{ \Illuminate\Support\Facades\Auth::guard('driver')->user()->firstName }} {{ \Illuminate\Support\Facades\Auth::guard('driver')->user()->lastName }}</div>
        <div class="user-role">
            <span class="lang-content fr active">Membre depuis {{ \Illuminate\Support\Facades\Auth::guard('driver')->user()->created_at->year }}</span>
            <span class="lang-content en">Member since {{ \Illuminate\Support\Facades\Auth::guard('driver')->user()->created_at->year }}</span>
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
        <a href="#" class="nav-item">
            <span>💬</span>
            <span class="lang-content fr active">Messages</span>
            <span class="lang-content en">Messages</span>
        </a>
        <a href="#" class="nav-item">
            <span>💳</span>
            <span class="lang-content fr active">Paiements</span>
            <span class="lang-content en">Payments</span>
        </a>
        <a href="#" class="nav-item">
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
        <a href="#" class="nav-item">
            <span>📍</span>
            <span class="lang-content fr active">Suivi des colis</span>
            <span class="lang-content en">Package tracking</span>
        </a>
        <a href="{{ url('user/dashboard') }}" class="nav-item">
            <span>🔄</span>
            <span class="lang-content fr active">Mode Co-transport</span>
            <span class="lang-content en">Co-transport Mode</span>
        </a>
        <a href="{{ url('driver/logout') }}" class="nav-item">
            <span>🚪</span>
            <span class="lang-content fr active">Déconnexion</span>
            <span class="lang-content en">Logout</span>
        </a>
    </nav>
</aside>

@php
    $notifications = \Illuminate\Support\Facades\Auth::guard('driver')->user()->unreadNotifications;
    $unreadCount = $notifications->count();
@endphp

    <!-- Main Content -->
<div class="main-content">
    <div class="top-bar">
        <div class="top-bar-left">
            <button class="mobile-menu-toggle" id="mobileMenuToggle" onclick="toggleSidebar()">
                ☰
            </button>
            <div class="page-title">
                <span class="lang-content fr active">Dashboard Réservation</span>
                <span class="lang-content en">Booking Dashboard</span>
            </div>
        </div>
        <div class="top-actions">
            <!-- Notification Bell -->
            <div class="notification-bell {{ $unreadCount > 0 ? 'has-notifications' : '' }}"
                 id="notificationBell"
                 onclick="toggleNotificationDropdown()"
                 data-count="{{ $unreadCount }}">
                <span class="bell-icon">🔔</span>
            </div>

            <!-- Language Switcher -->
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
                        🎫
                    </div>
                    <div class="notification-body">
                        <div class="notification-title">
                            {{ $notification->data['name'] ?? 'New Notification' }}
                        </div>
                        <div class="notification-message">
                            {{ $notification->data['message'] ?? 'Carrier wants to complete ride with you.' }}
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

        <!-- Recent Activity -->
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
                        <div class="activity-detail">📦 2.5kg</div>
                        <div class="activity-detail">💰 €30</div>
                        <div class="activity-detail">📅 28 janvier</div>
                        <div class="activity-detail">👤 Thomas M.</div>
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
                        <div class="activity-detail">📦 5kg</div>
                        <div class="activity-detail">💰 €30</div>
                        <div class="activity-detail">📅 2 février</div>
                        <div class="activity-detail">👤 Ahmed K.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    window._token = $('meta[name="csrf-token"]').attr('content');

    // Toggle sidebar for mobile
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('mobile-active');
        overlay.classList.toggle('active');
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

        localStorage.setItem('preferredLanguage', lang);
    }

    // Notification dropdown toggle
    function toggleNotificationDropdown() {
        const dropdown = document.getElementById('notificationDropdown');
        const bell = document.getElementById('notificationBell');

        dropdown.classList.toggle('show');

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

    // Mark notifications as read
    document.addEventListener('DOMContentLoaded', function() {
        $('.mark-as-read').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            const $this = $(this);
            const notificationId = $this.data('id');
            let request = sendMarkRequest(notificationId);

            request.done(() => {
                $this.closest('.notification-item').remove();
                updateBadgeCount();

                const remainingNotifs = $('.notification-item').length;
                if (remainingNotifs === 0) {
                    $('.dropdown-content').html(`
                        <div class="empty-notifications">
                            <div class="empty-icon">🔕</div>
                            <div>
                                <span class="lang-content fr active">Aucune notification</span>
                                <span class="lang-content en">No notifications</span>
                            </div>
                        </div>
                    `);
                    $('#mark-all').hide();
                    $('.dropdown-footer').hide();
                }
            });
        });

        $('#mark-all').click(function(e) {
            e.preventDefault();

            $.ajax({
                method: 'POST',
                url: '{{ route('driver.markDriverAllNotification') }}',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            })
                .done((data) => {
                    if (data.success) {
                        $('.notification-item.unread').remove();
                        $('#notificationBell').removeClass('has-notifications').removeAttr('data-count');
                        $('.dropdown-content').html(`
                        <div class="empty-notifications">
                            <div class="empty-icon">🔕</div>
                            <div>
                                <span class="lang-content fr active">Aucune notification</span>
                                <span class="lang-content en">No notifications</span>
                            </div>
                        </div>
                    `);
                        $('#mark-all').hide();
                        $('.dropdown-footer').hide();
                    }
                });
        });
    });

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

    // Initialize language preference
    document.addEventListener('DOMContentLoaded', function() {
        const preferredLang = localStorage.getItem('preferredLanguage');
        if (preferredLang === 'en') {
            document.querySelector('.lang-btn[onclick*="en"]').click();
        }
    });
</script>
</body>
</html>
