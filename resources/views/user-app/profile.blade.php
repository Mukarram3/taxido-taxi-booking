<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Je confie - Mon Profil | Transport collaboratif</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .upload-icon {
            font-size: 20px;
            color: rgba(var(--title-color), 1);
            position: relative;
            --Iconsax-Color: rgba(var(--content-color), 1);
            --Iconsax-Size: 20px;
            transform: rotate(90deg);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background: #f8fafc;
            min-height: 100vh;
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

        /* Language Switcher */
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
            box-shadow: var(--shadow);
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn {
            padding: 12px 24px;
            border-radius: var(--radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 14px;
        }

        .btn-ghost {
            background: transparent;
            color: var(--dark);
        }

        .btn-ghost:hover {
            background: var(--light);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-success {
            background: var(--success);
            color: white;
            box-shadow: var(--shadow);
        }

        .btn-success:hover {
            background: #0d9488;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #dc8a0a;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
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

        /* Main Container */
        .profile-container {
            margin-top: 72px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 40px;
            align-items: start;
            min-height: calc(100vh - 72px);
        }

        /* Left Sidebar - Profile Info */
        .profile-sidebar {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .profile-card {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            padding: 32px;
            border: 2px solid var(--border);
            position: sticky;
            top: 100px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .profile-avatar-container {
            position: relative;
            display: inline-block;
            margin-bottom: 16px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--border);
        }

        .avatar-badge {
            position: absolute;
            bottom: 8px;
            right: 8px;
            width: 32px;
            height: 32px;
            background: var(--success);
            border: 3px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .edit-avatar-btn {
            position: absolute;
            top: 0;
            right: 0;
            width: 36px;
            height: 36px;
            background: var(--primary);
            color: white;
            border: 3px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .edit-avatar-btn:hover {
            transform: scale(1.1);
        }

        .profile-name {
            font-size: 24px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .profile-subtitle {
            color: var(--gray);
            margin-bottom: 16px;
        }

        .profile-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .star {
            color: var(--warning);
            font-size: 20px;
        }

        .rating-text {
            font-weight: 700;
            color: var(--dark);
            margin-left: 4px;
        }

        .profile-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-bottom: 24px;
        }

        .profile-badge {
            padding: 6px 12px;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .profile-badge.verified {
            background: #dbeafe;
            color: #1e40af;
        }

        .profile-badge.pro {
            background: #fef3c7;
            color: #92400e;
        }

        .profile-badge.experienced {
            background: #dcfce7;
            color: #166534;
        }

        .profile-badge.eco {
            background: #ecfdf5;
            color: var(--eco-green);
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .profile-stat {
            text-align: center;
            padding: 16px 12px;
            background: var(--light);
            border-radius: var(--radius);
        }

        .profile-stat-value {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 4px;
        }

        .profile-stat-label {
            font-size: 12px;
            color: var(--gray);
            font-weight: 600;
        }

        .profile-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Navigation Tabs */
        .tab-navigation {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            padding: 8px;
            margin-bottom: 24px;
            border: 2px solid var(--border);
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .tab-btn {
            flex: 1;
            padding: 12px 16px;
            border: none;
            background: transparent;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            color: var(--gray);
            border-radius: var(--radius);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 140px;
        }

        .tab-btn.active {
            background: var(--primary);
            color: white;
        }

        .tab-btn:hover:not(.active) {
            background: var(--light);
            color: var(--dark);
        }

        /* Main Content Area */
        .profile-main {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .content-card {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            padding: 32px;
            border: 2px solid var(--border);
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-subtitle {
            color: var(--gray);
            margin-bottom: 24px;
            line-height: 1.6;
        }

        /* Form Styles */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80, 70, 229, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            background: white;
        }

        .form-textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            font-family: inherit;
            resize: vertical;
            min-height: 120px;
        }

        /* Transport Services */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .service-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .service-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .service-card.active {
            border-color: var(--primary);
            background: linear-gradient(135deg, #f0f4ff, #ffffff);
        }

        .service-card .icon {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .service-card h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .service-card p {
            font-size: 13px;
            color: var(--gray);
            line-height: 1.4;
        }

        .service-card input[type="checkbox"] {
            position: absolute;
            opacity: 0;
        }

        /* Vehicle Information */
        .vehicle-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .vehicle-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 16px;
            background: var(--light);
            border-radius: var(--radius);
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .vehicle-item:hover {
            border-color: var(--primary);
        }

        .vehicle-item.selected {
            border-color: var(--primary);
            background: #f0f4ff;
        }

        .vehicle-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .vehicle-name {
            font-weight: 600;
            font-size: 14px;
            color: var(--dark);
        }

        /* Document Verification */
        .documents-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .document-card {
            border: 2px solid var(--border);
            border-radius: var(--radius);
            padding: 20px;
            text-align: center;
        }

        .document-card.verified {
            border-color: var(--success);
            background: #f0fdf4;
        }

        .document-card.pending {
            border-color: var(--warning);
            background: #fffbeb;
        }

        .document-icon {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .document-status {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .document-status.verified {
            color: var(--success);
        }

        .document-status.pending {
            color: var(--warning);
        }

        .document-description {
            font-size: 13px;
            color: var(--gray);
            margin-bottom: 16px;
        }

        /* Insurance Section - FIXED POSITIONING */
        .insurance-section {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            padding: 32px;
            border: 2px solid var(--border);
            margin-bottom: 24px;
            position: relative; /* Fixed: Remove any position issues */
            z-index: 1; /* Fixed: Ensure proper layering */
        }

        .insurance-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .insurance-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .insurance-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .insurance-card.selected {
            border-color: var(--primary);
            background: linear-gradient(135deg, #f0f4ff, #ffffff);
        }

        .insurance-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--success);
            color: white;
            border-radius: 100px;
            padding: 4px 8px;
            font-size: 10px;
            font-weight: 600;
        }

        .insurance-icon {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .insurance-title {
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .insurance-coverage {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .insurance-price {
            font-size: 14px;
            color: var(--gray);
        }

        /* Shipping Services Section - FIXED POSITIONING */
        .shipping-section {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            padding: 32px;
            border: 2px solid var(--border);
            margin-bottom: 24px;
            position: relative; /* Fixed: Ensure proper positioning */
            z-index: 1; /* Fixed: Proper layering */
        }

        .shipping-partners {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .partner-card {
            border: 2px solid var(--border);
            border-radius: var(--radius);
            padding: 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .partner-card:hover {
            border-color: var(--primary);
        }

        .partner-card.active {
            border-color: var(--primary);
            background: #f0f4ff;
        }

        .partner-logo {
            width: 40px;
            height: 40px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-weight: 700;
            color: var(--primary);
        }

        .partner-name {
            font-weight: 600;
            font-size: 12px;
            color: var(--dark);
        }

        .shipping-services {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .shipping-service {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            background: var(--light);
            border-radius: var(--radius);
        }

        .service-info {
            display: flex;
            flex-direction: column;
        }

        .service-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .service-description {
            font-size: 12px;
            color: var(--gray);
        }

        .service-price {
            font-weight: 700;
            color: var(--primary);
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .custom-checkbox {
            position: relative;
            width: 20px;
            height: 20px;
            border: 2px solid var(--border);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .custom-checkbox.checked {
            background: var(--primary);
            border-color: var(--primary);
        }

        .custom-checkbox.checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 12px;
            font-weight: 700;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Activity Feed */
        .activity-feed {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .activity-item {
            display: flex;
            gap: 16px;
            padding: 16px;
            background: var(--light);
            border-radius: var(--radius);
            border-left: 4px solid var(--primary);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .activity-description {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 8px;
        }

        .activity-time {
            font-size: 12px;
            color: var(--gray);
        }

        /* Statistics Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
            text-align: center;
            border: 2px solid var(--border);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-size: 20px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray);
            font-weight: 600;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .profile-container {
                grid-template-columns: 320px 1fr;
                gap: 24px;
            }
        }

        @media (max-width: 1024px) {
            .profile-container {
                grid-template-columns: 1fr;
                gap: 24px;
                padding: 20px 16px;
            }

            .profile-card {
                position: relative;
                top: auto;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .service-grid {
                grid-template-columns: 1fr;
            }

            .insurance-options {
                grid-template-columns: 1fr;
            }

            .shipping-partners {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .tab-navigation {
                overflow-x: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .tab-navigation::-webkit-scrollbar {
                display: none;
            }

            .tab-btn {
                min-width: 120px;
                flex-shrink: 0;
            }
        }

        @media (max-width: 768px) {
            .vehicle-grid {
                grid-template-columns: 1fr;
            }

            .documents-grid {
                grid-template-columns: 1fr;
            }

            .shipping-services {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .tab-btn {
                font-size: 12px;
                padding: 10px 12px;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Success/Error Messages */
        .message {
            padding: 12px 16px;
            border-radius: var(--radius);
            margin-bottom: 16px;
            font-size: 14px;
            display: none;
        }

        .message.success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .message.error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .message.show {
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
            <span class="logo-text">Je confie</span>
        </a>

        <div class="nav-actions">
            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
            <a href="/messages" class="btn btn-ghost">
                <span>💬</span>
                <span class="lang-content fr active">Messages</span>
                <span class="lang-content en">Messages</span>
            </a>
            <a href="/dashboard" class="btn btn-primary">
                <span>📊</span>
                <span class="lang-content fr active">Tableau de bord</span>
                <span class="lang-content en">Dashboard</span>
            </a>
        </div>
    </div>
</nav>

<!-- Main Container -->
<div class="profile-container">
    <!-- Left Sidebar - Profile Info -->
    <div class="profile-sidebar">
        <div class="profile-card">
            <div class="profile-header">

                <div class="profile-avatar-container" style="position: relative; width:150px; height:150px;">
                    <img id="output"
                         src="{{ $user->profile ? asset('storage/'.$user->profile) : asset('assets/images/profile/p8.png') }}"
                         alt="{{ $user->firstName . ' ' . $user->lastName }}"
                         class="profile-avatar"
                         style="width:100%; height:100%; border-radius:50%; object-fit:cover;">

                    <div class="avatar-badge" style="position:absolute; bottom:10px; left:10px;">✅</div>

                    <button class="edit-avatar-btn"
                            onclick="document.getElementById('fileInput').click();"
                            style="position:absolute; bottom:10px; right:10px; cursor:pointer;">
                        📷
                    </button>

                    <input type="file" id="fileInput" name="profile" accept="image/*"
                           style="display:none" onchange="uploadProfile(event)">
                </div>


                <h2 class="profile-name">{{ $user->firstName . ' ' . $user->lastName }}</h2>
                <p class="profile-subtitle">
                    <span class="lang-content fr active">Voyageur & Expéditeur expérimenté</span>
                    <span class="lang-content en">Experienced Traveler & Sender</span>
                </p>

                <div class="profile-rating">
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="rating-text">4.9 (127)</span>
                </div>

                <div class="profile-badges">
                    <span class="profile-badge verified">✅ <span class="lang-content fr active">Vérifié</span><span
                            class="lang-content en">Verified</span></span>
                    <span class="profile-badge pro">💼 Pro</span>
                    <span class="profile-badge experienced">🏆 <span class="lang-content fr active">Expert</span><span
                            class="lang-content en">Expert</span></span>
                    <span class="profile-badge eco">🌱 Eco</span>
                </div>
            </div>

            <div class="profile-stats">
                <div class="profile-stat">
                    <div class="profile-stat-value">156</div>
                    <div class="profile-stat-label">
                        <span class="lang-content fr active">Transports</span>
                        <span class="lang-content en">Transports</span>
                    </div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value">3</div>
                    <div class="profile-stat-label">
                        <span class="lang-content fr active">Années</span>
                        <span class="lang-content en">Years</span>
                    </div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value">2.4k€</div>
                    <div class="profile-stat-label">
                        <span class="lang-content fr active">Gagnés</span>
                        <span class="lang-content en">Earned</span>
                    </div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value">-85%</div>
                    <div class="profile-stat-label">CO2</div>
                </div>
            </div>

            <div class="profile-actions">
                <button class="btn btn-primary" onclick="showTab('edit')">
                    <span>✏️</span>
                    <span class="lang-content fr active">Modifier le profil</span>
                    <span class="lang-content en">Edit profile</span>
                </button>
                <button class="btn btn-outline" onclick="shareProfile()">
                    <span>📤</span>
                    <span class="lang-content fr active">Partager</span>
                    <span class="lang-content en">Share</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="profile-main">
        <!-- Tab Navigation -->
        <div class="tab-navigation">
            <button class="tab-btn active" onclick="showTab('overview')" data-tab="overview">
                <span>👤</span>
                <span class="lang-content fr active">Aperçu</span>
                <span class="lang-content en">Overview</span>
            </button>
            <button class="tab-btn" onclick="showTab('edit')" data-tab="edit">
                <span>✏️</span>
                <span class="lang-content fr active">Éditer</span>
                <span class="lang-content en">Edit</span>
            </button>
            <button class="tab-btn" onclick="showTab('services')" data-tab="services">
                <span>🚀</span>
                <span class="lang-content fr active">Services</span>
                <span class="lang-content en">Services</span>
            </button>
            <button class="tab-btn" onclick="showTab('vehicles')" data-tab="vehicles">
                <span>🚗</span>
                <span class="lang-content fr active">Véhicules</span>
                <span class="lang-content en">Vehicles</span>
            </button>
            <button class="tab-btn" onclick="showTab('documents')" data-tab="documents">
                <span>📄</span>
                <span class="lang-content fr active">Documents</span>
                <span class="lang-content en">Documents</span>
            </button>
            <button class="tab-btn" onclick="showTab('activity')" data-tab="activity">
                <span>📊</span>
                <span class="lang-content fr active">Activité</span>
                <span class="lang-content en">Activity</span>
            </button>
        </div>

        <!-- Overview Tab -->
        <div class="tab-content active" id="overview">
            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div class="stat-value">45</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">Colis envoyés</span>
                        <span class="lang-content en">Packages sent</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">✈️</div>
                    <div class="stat-value">111</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">Transports effectués</span>
                        <span class="lang-content en">Transports completed</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-value">890€</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">Économisés</span>
                        <span class="lang-content en">Saved</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🌱</div>
                    <div class="stat-value">1.2t</div>
                    <div class="stat-label">
                        <span class="lang-content fr active">CO2 évité</span>
                        <span class="lang-content en">CO2 avoided</span>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="content-card">
                <h3 class="section-title">
                    <span>📈</span>
                    <span class="lang-content fr active">Activité récente</span>
                    <span class="lang-content en">Recent activity</span>
                </h3>

                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">✅</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Transport terminé avec succès</span>
                                <span class="lang-content en">Transport completed successfully</span>
                            </div>
                            <div class="activity-description">
                                <span class="lang-content fr active">Paris → New York - Colis de 3.2kg livré</span>
                                <span class="lang-content en">Paris → New York - 3.2kg package delivered</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">il y a 2 heures</span>
                                <span class="lang-content en">2 hours ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">⭐</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Nouvel avis reçu (5/5)</span>
                                <span class="lang-content en">New review received (5/5)</span>
                            </div>
                            <div class="activity-description">
                                <span
                                    class="lang-content fr active">"Transport parfait ! Très professionnel" - Marie D.</span>
                                <span class="lang-content en">"Perfect transport! Very professional" - Marie D.</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">il y a 5 heures</span>
                                <span class="lang-content en">5 hours ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">🎫</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Nouvelle réservation acceptée</span>
                                <span class="lang-content en">New booking accepted</span>
                            </div>
                            <div class="activity-description">
                                <span class="lang-content fr active">Londres → Madrid - Départ prévu demain</span>
                                <span class="lang-content en">London → Madrid - Departure scheduled tomorrow</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">hier</span>
                                <span class="lang-content en">yesterday</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profile Tab -->
        <div class="tab-content" id="edit">
            <div class="content-card">
                <h3 class="section-title">
                    <span>✏️</span>
                    <span class="lang-content fr active">Informations personnelles</span>
                    <span class="lang-content en">Personal information</span>
                </h3>

                <form id="profileForm" action="{{ route('user.update_profile') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Prénom</span>
                                <span class="lang-content en">First name</span>
                            </label>
                            <input type="text" name="firstName" class="form-input" value="{{ $user->firstName }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Nom</span>
                                <span class="lang-content en">Last name</span>
                            </label>
                            <input type="text" name="lastName" class="form-input" value="{{ $user->lastName }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Téléphone</span>
                                <span class="lang-content en">Phone</span>
                            </label>
                            <input type="tel" class="form-input" name="phone" value="{{ $user->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Date de naissance</span>
                                <span class="lang-content en">Birth date</span>
                            </label>
                            <input type="date" name="birthDate" class="form-input" value="{{ $user->birthDate }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Ville</span>
                                <span class="lang-content en">City</span>
                            </label>
                            <input type="text" class="form-input" value="">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">
                                <span class="lang-content fr active">Adresse complète</span>
                                <span class="lang-content en">Full address</span>
                            </label>
                            <input type="text" name="address" class="form-input" value="{{ $user->address }}">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">
                                <span class="lang-content fr active">Description</span>
                                <span class="lang-content en">Description</span>
                            </label>
                            <textarea class="form-textarea" placeholder="Parlez-vous...">Voyageur expérimenté depuis 3 ans, je privilégie la qualité du service et la communication. Spécialisé dans les trajets Paris-New York et Europe.</textarea>
                        </div>
                    </div>

                    <div class="message" id="profileMessage"></div>

                    <button type="submit" class="btn btn-primary">
                        <span>💾</span>
                        <span class="lang-content fr active">Enregistrer les modifications</span>
                        <span class="lang-content en">Save changes</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Services Tab -->
        <div class="tab-content" id="services">
            <div class="content-card">
                <h3 class="section-title">
                    <span>🚀</span>
                    <span class="lang-content fr active">Services proposés</span>
                    <span class="lang-content en">Offered services</span>
                </h3>
                <p class="section-subtitle">
                    <span class="lang-content fr active">Sélectionnez les services que vous souhaitez proposer sur la plateforme</span>
                    <span class="lang-content en">Select the services you want to offer on the platform</span>
                </p>

                <div class="service-grid">
                    <div class="service-card active" onclick="toggleService(this)">
                        <input type="checkbox" name="reservationTransport" checked>
                        <div class="icon">✈️</div>
                        <h3>
                            <span class="lang-content fr active">Transport par réservation</span>
                            <span class="lang-content en">Travel by reservation</span>
                        </h3>
                        <p>
                            <span class="lang-content fr active">Je transporte des colis lors de mes voyages en avion, train, bus</span>
                            <span
                                class="lang-content en">I transport packages during my flights, train, bus journeys</span>
                        </p>
                    </div>

                    <div class="service-card" onclick="toggleService(this)">
                        <input type="checkbox" name="cotransport">
                        <div class="icon">🚛</div>
                        <h3>Co-transport</h3>
                        <p>
                            <span
                                class="lang-content fr active">Je transporte des objets volumineux avec mon véhicule</span>
                            <span class="lang-content en">I transport bulky items with my vehicle</span>
                        </p>
                    </div>

                    <div class="service-card active" onclick="toggleService(this)">
                        <input type="checkbox" name="sender" checked>
                        <div class="icon">📦</div>
                        <h3>
                            <span class="lang-content fr active">Expéditeur</span>
                            <span class="lang-content en">Sender</span>
                        </h3>
                        <p>
                            <span class="lang-content fr active">J'envoie régulièrement des colis</span>
                            <span class="lang-content en">I regularly send packages</span>
                        </p>
                    </div>

                    <div class="service-card" onclick="toggleService(this)">
                        <input type="checkbox" name="receiver">
                        <div class="icon">📮</div>
                        <h3>
                            <span class="lang-content fr active">Destinataire</span>
                            <span class="lang-content en">Recipient</span>
                        </h3>
                        <p>
                            <span class="lang-content fr active">Je reçois des colis pour d'autres</span>
                            <span class="lang-content en">I receive packages for others</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- FIXED: Insurance Section -->
            <div class="insurance-section">
                <h3 class="section-title">
                    <span>🛡️</span>
                    <span class="lang-content fr active">Assurance & Protection</span>
                    <span class="lang-content en">Insurance & Protection</span>
                </h3>
                <p class="section-subtitle">
                    <span class="lang-content fr active">Choisissez votre niveau de couverture d'assurance pour vos transports</span>
                    <span class="lang-content en">Choose your insurance coverage level for your transports</span>
                </p>

                <div class="insurance-options">
                    <div class="insurance-card" onclick="selectInsurance(this)">
                        <input type="radio" name="insurance" value="basic">
                        <div class="insurance-icon">🛡️</div>
                        <div class="insurance-title">
                            <span class="lang-content fr active">Basique</span>
                            <span class="lang-content en">Basic</span>
                        </div>
                        <div class="insurance-coverage">
                            <span class="lang-content fr active">Jusqu'à 100€</span>
                            <span class="lang-content en">Up to €100</span>
                        </div>
                        <div class="insurance-price">
                            <span class="lang-content fr active">Inclus</span>
                            <span class="lang-content en">Included</span>
                        </div>
                    </div>

                    <div class="insurance-card selected" onclick="selectInsurance(this)">
                        <div class="insurance-badge">
                            <span class="lang-content fr active">Populaire</span>
                            <span class="lang-content en">Popular</span>
                        </div>
                        <input type="radio" name="insurance" value="standard" checked>
                        <div class="insurance-icon">🛡️</div>
                        <div class="insurance-title">Standard</div>
                        <div class="insurance-coverage">
                            <span class="lang-content fr active">Jusqu'à 500€</span>
                            <span class="lang-content en">Up to €500</span>
                        </div>
                        <div class="insurance-price">+5€</div>
                    </div>

                    <div class="insurance-card" onclick="selectInsurance(this)">
                        <input type="radio" name="insurance" value="premium">
                        <div class="insurance-icon">🛡️</div>
                        <div class="insurance-title">Premium</div>
                        <div class="insurance-coverage">
                            <span class="lang-content fr active">Jusqu'à 1000€</span>
                            <span class="lang-content en">Up to €1000</span>
                        </div>
                        <div class="insurance-price">+12€</div>
                    </div>
                </div>
            </div>

            <!-- FIXED: Shipping Services Section -->
            <div class="shipping-section">
                <h3 class="section-title">
                    <span>📦</span>
                    <span class="lang-content fr active">Services d'expédition postale</span>
                    <span class="lang-content en">Postal shipping services</span>
                </h3>
                <p class="section-subtitle">
                    <span class="lang-content fr active">Intégrez les services de collecte et livraison express de nos partenaires</span>
                    <span
                        class="lang-content en">Integrate pickup and express delivery services from our partners</span>
                </p>

                <div class="shipping-partners">
                    <div class="partner-card active" onclick="selectPartner(this)">
                        <input type="checkbox" name="chronopost" checked>
                        <div class="partner-logo">C</div>
                        <div class="partner-name">Chronopost</div>
                    </div>

                    <div class="partner-card active" onclick="selectPartner(this)">
                        <input type="checkbox" name="dhl" checked>
                        <div class="partner-logo">D</div>
                        <div class="partner-name">DHL</div>
                    </div>

                    <div class="partner-card" onclick="selectPartner(this)">
                        <input type="checkbox" name="colisprive">
                        <div class="partner-logo">CP</div>
                        <div class="partner-name">
                            <span class="lang-content fr active">Colis Privé</span>
                            <span class="lang-content en">Colis Privé</span>
                        </div>
                    </div>

                    <div class="partner-card" onclick="selectPartner(this)">
                        <input type="checkbox" name="ups">
                        <div class="partner-logo">U</div>
                        <div class="partner-name">UPS</div>
                    </div>
                </div>

                <div class="shipping-services">
                    <div class="shipping-service">
                        <div class="service-info">
                            <div class="service-name">
                                <span class="lang-content fr active">Collecte à domicile</span>
                                <span class="lang-content en">Home pickup</span>
                            </div>
                            <div class="service-description">
                                <span class="lang-content fr active">Récupération du colis chez l'expéditeur</span>
                                <span class="lang-content en">Package pickup at sender's location</span>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            <div class="custom-checkbox checked" onclick="toggleService(this)">
                                <input type="checkbox" checked>
                            </div>
                            <span class="service-price">+12€</span>
                        </div>
                    </div>

                    <div class="shipping-service">
                        <div class="service-info">
                            <div class="service-name">
                                <span class="lang-content fr active">Livraison express</span>
                                <span class="lang-content en">Express delivery</span>
                            </div>
                            <div class="service-description">
                                <span class="lang-content fr active">Livraison le jour même</span>
                                <span class="lang-content en">Same-day delivery</span>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            <div class="custom-checkbox checked" onclick="toggleService(this)">
                                <input type="checkbox" checked>
                            </div>
                            <span class="service-price">+18€</span>
                        </div>
                    </div>

                    <div class="shipping-service">
                        <div class="service-info">
                            <div class="service-name">
                                <span class="lang-content fr active">Assurance transport</span>
                                <span class="lang-content en">Transport insurance</span>
                            </div>
                            <div class="service-description">
                                <span class="lang-content fr active">Protection contre la perte/dommage</span>
                                <span class="lang-content en">Protection against loss/damage</span>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            <div class="custom-checkbox" onclick="toggleService(this)">
                                <input type="checkbox">
                            </div>
                            <span class="service-price">+8€</span>
                        </div>
                    </div>

                    <div class="shipping-service">
                        <div class="service-info">
                            <div class="service-name">
                                <span class="lang-content fr active">Suivi SMS</span>
                                <span class="lang-content en">SMS tracking</span>
                            </div>
                            <div class="service-description">
                                <span class="lang-content fr active">Notifications en temps réel</span>
                                <span class="lang-content en">Real-time notifications</span>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            <div class="custom-checkbox checked" onclick="toggleService(this)">
                                <input type="checkbox" checked>
                            </div>
                            <span class="service-price">+2€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vehicles Tab -->
        <div class="tab-content" id="vehicles">
            <div class="content-card">
                <h3 class="section-title">
                    <span>🚗</span>
                    <span class="lang-content fr active">Mes véhicules</span>
                    <span class="lang-content en">My vehicles</span>
                </h3>
                <p class="section-subtitle">
                    <span class="lang-content fr active">Ajoutez et gérez vos véhicules pour le co-transport</span>
                    <span class="lang-content en">Add and manage your vehicles for co-transport</span>
                </p>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Type de véhicule</span>
                            <span class="lang-content en">Vehicle type</span>
                        </label>
                        <div class="vehicle-grid">
                            <div class="vehicle-item selected" onclick="selectVehicleType(this)" data-type="car">
                                <div class="vehicle-icon">🚗</div>
                                <div class="vehicle-name">
                                    <span class="lang-content fr active">Voiture</span>
                                    <span class="lang-content en">Car</span>
                                </div>
                            </div>
                            <div class="vehicle-item" onclick="selectVehicleType(this)" data-type="van">
                                <div class="vehicle-icon">🚐</div>
                                <div class="vehicle-name">
                                    <span class="lang-content fr active">Camionnette</span>
                                    <span class="lang-content en">Van</span>
                                </div>
                            </div>
                            <div class="vehicle-item" onclick="selectVehicleType(this)" data-type="truck">
                                <div class="vehicle-icon">🚛</div>
                                <div class="vehicle-name">
                                    <span class="lang-content fr active">Camion</span>
                                    <span class="lang-content en">Truck</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Marque</span>
                            <span class="lang-content en">Brand</span>
                        </label>
                        <select class="form-select">
                            <option value="renault" selected>Renault</option>
                            <option value="peugeot">Peugeot</option>
                            <option value="citroen">Citroën</option>
                            <option value="volkswagen">Volkswagen</option>
                            <option value="ford">Ford</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="other">
                                <span class="lang-content fr active">Autre</span>
                                <span class="lang-content en">Other</span>
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Modèle</span>
                            <span class="lang-content en">Model</span>
                        </label>
                        <input type="text" class="form-input" value="Master" placeholder="Ex: Clio, 308, Sprinter...">
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Immatriculation</span>
                            <span class="lang-content en">License plate</span>
                        </label>
                        <input type="text" class="form-input" value="AB-123-CD" placeholder="AB-123-CD">
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Année</span>
                            <span class="lang-content en">Year</span>
                        </label>
                        <input type="number" class="form-input" value="2020" min="1990" max="2025">
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Volume utile (m³)</span>
                            <span class="lang-content en">Useful volume (m³)</span>
                        </label>
                        <input type="number" class="form-input" value="8" step="0.1" min="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Charge max (kg)</span>
                            <span class="lang-content en">Max load (kg)</span>
                        </label>
                        <input type="number" class="form-input" value="1200" min="0">
                    </div>
                </div>

                <button type="button" class="btn btn-primary" onclick="saveVehicle()">
                    <span>💾</span>
                    <span class="lang-content fr active">Enregistrer le véhicule</span>
                    <span class="lang-content en">Save vehicle</span>
                </button>
            </div>
        </div>

        <!-- Documents Tab -->
        <div class="tab-content" id="documents">
            <div class="content-card">
                <h3 class="section-title">
                    <span>📄</span>
                    <span class="lang-content fr active">Vérification des documents</span>
                    <span class="lang-content en">Document verification</span>
                </h3>
                <p class="section-subtitle">
                    <span class="lang-content fr active">Téléchargez vos documents pour la vérification automatique et renforcez la sécurité</span>
                    <span
                        class="lang-content en">Upload your documents for automatic verification and enhanced security</span>
                </p>

                <div class="documents-grid">
                    <div class="document-card verified">
                        <div class="document-icon">✅</div>
                        <div class="document-status verified">
                            <span class="lang-content fr active">Pièce d'identité</span>
                            <span class="lang-content en">ID document</span>
                        </div>
                        <div class="document-description">
                            <span class="lang-content fr active">Vérifiée automatiquement</span>
                            <span class="lang-content en">Automatically verified</span>
                        </div>
                        <button class="btn btn-success btn-sm">
                            <span>✅</span>
                            <span class="lang-content fr active">Vérifié</span>
                            <span class="lang-content en">Verified</span>
                        </button>
                    </div>

                    <div class="document-card verified">
                        <div class="document-icon">🚗</div>
                        <div class="document-status verified">
                            <span class="lang-content fr active">Permis de conduire</span>
                            <span class="lang-content en">Driver's license</span>
                        </div>
                        <div class="document-description">
                            <span class="lang-content fr active">Vérifiée automatiquement</span>
                            <span class="lang-content en">Automatically verified</span>
                        </div>
                        <button class="btn btn-success btn-sm">
                            <span>✅</span>
                            <span class="lang-content fr active">Vérifié</span>
                            <span class="lang-content en">Verified</span>
                        </button>
                    </div>

                    <div class="document-card pending">
                        <div class="document-icon">🚛</div>
                        <div class="document-status pending">
                            <span class="lang-content fr active">Carte grise</span>
                            <span class="lang-content en">Vehicle registration</span>
                        </div>
                        <div class="document-description">
                            <span class="lang-content fr active">Vérification en cours...</span>
                            <span class="lang-content en">Verification in progress...</span>
                        </div>
                        <button class="btn btn-warning btn-sm">
                            <span>⏳</span>
                            <span class="lang-content fr active">En cours</span>
                            <span class="lang-content en">Pending</span>
                        </button>
                    </div>

                    <div class="document-card">
                        <div class="document-icon">🛡️</div>
                        <div class="document-status">
                            <span class="lang-content fr active">Assurance véhicule</span>
                            <span class="lang-content en">Vehicle insurance</span>
                        </div>
                        <div class="document-description">
                            <span class="lang-content fr active">Non téléchargée</span>
                            <span class="lang-content en">Not uploaded</span>
                        </div>
                        <button class="btn btn-outline btn-sm">
                            <span>📤</span>
                            <span class="lang-content fr active">Télécharger</span>
                            <span class="lang-content en">Upload</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Tab -->
        <div class="tab-content" id="activity">
            <div class="content-card">
                <h3 class="section-title">
                    <span>📊</span>
                    <span class="lang-content fr active">Historique complet</span>
                    <span class="lang-content en">Complete history</span>
                </h3>

                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">✅</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Transport terminé avec succès</span>
                                <span class="lang-content en">Transport completed successfully</span>
                            </div>
                            <div class="activity-description">
                                <span class="lang-content fr active">Paris → New York - Vol AF022 - Colis de 3.2kg livré - Rémunération: 38.40€</span>
                                <span class="lang-content en">Paris → New York - Flight AF022 - 3.2kg package delivered - Payment: €38.40</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">il y a 2 heures</span>
                                <span class="lang-content en">2 hours ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">⭐</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Nouvel avis reçu (5/5)</span>
                                <span class="lang-content en">New review received (5/5)</span>
                            </div>
                            <div class="activity-description">
                                <span class="lang-content fr active">"Transport parfait ! Thomas est très professionnel et communicatif. Le colis est arrivé en parfait état et dans les temps. Je recommande vivement !" - Marie D.</span>
                                <span class="lang-content en">"Perfect transport! Thomas is very professional and communicative. The package arrived in perfect condition and on time. Highly recommend!" - Marie D.</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">il y a 5 heures</span>
                                <span class="lang-content en">5 hours ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">💰</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Paiement reçu</span>
                                <span class="lang-content en">Payment received</span>
                            </div>
                            <div class="activity-description">
                                <span class="lang-content fr active">Virement automatique de 38.40€ vers votre compte bancaire</span>
                                <span class="lang-content en">Automatic transfer of €38.40 to your bank account</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">il y a 6 heures</span>
                                <span class="lang-content en">6 hours ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">🎫</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Nouvelle réservation acceptée</span>
                                <span class="lang-content en">New booking accepted</span>
                            </div>
                            <div class="activity-description">
                                <span class="lang-content fr active">Londres → Madrid - Vol IB3201 - Départ prévu demain 08h45 - Colis de 2.1kg</span>
                                <span class="lang-content en">London → Madrid - Flight IB3201 - Departure scheduled tomorrow 08:45 - 2.1kg package</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">hier</span>
                                <span class="lang-content en">yesterday</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">✈️</div>
                        <div class="activity-content">
                            <div class="activity-title">
                                <span class="lang-content fr active">Nouvelle offre publiée</span>
                                <span class="lang-content en">New offer published</span>
                            </div>
                            <div class="activity-description">
                                <span class="lang-content fr active">Madrid → Paris - Vol AF1801 - 12kg disponibles - Tarif: 8€/kg</span>
                                <span class="lang-content en">Madrid → Paris - Flight AF1801 - 12kg available - Rate: €8/kg</span>
                            </div>
                            <div class="activity-time">
                                <span class="lang-content fr active">il y a 2 jours</span>
                                <span class="lang-content en">2 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentLanguage = 'fr';

    // Language switcher
    function switchLanguage(lang) {
        currentLanguage = lang;
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

    // Initialize language on page load
    document.addEventListener('DOMContentLoaded', function () {
        const preferredLang = localStorage.getItem('preferredLanguage');
        if (preferredLang === 'en') {
            const enBtn = document.querySelector('.lang-btn[onclick*="en"]');
            if (enBtn) {
                enBtn.click();
            }
        }
    });

    // Tab navigation
    function showTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });

        // Remove active class from all tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Show selected tab content
        document.getElementById(tabName).classList.add('active');

        // Add active class to selected tab button
        document.querySelector(`.tab-btn[data-tab="${tabName}"]`).classList.add('active');
    }

    // Service toggle
    function toggleService(element) {
        const checkbox = element.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
            element.classList.add('active');
        } else {
            element.classList.remove('active');
        }
    }

    // Insurance selection
    function selectInsurance(element) {
        document.querySelectorAll('.insurance-card').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');

        const radio = element.querySelector('input[type="radio"]');
        radio.checked = true;
    }

    // Partner selection
    function selectPartner(element) {
        const checkbox = element.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;

        if (checkbox.checked) {
            element.classList.add('active');
        } else {
            element.classList.remove('active');
        }
    }

    // Vehicle type selection
    function selectVehicleType(element) {
        document.querySelectorAll('.vehicle-item').forEach(item => {
            item.classList.remove('selected');
        });
        element.classList.add('selected');
    }

    // Custom checkbox toggle
    function toggleService(checkbox) {
        const input = checkbox.querySelector('input');
        input.checked = !input.checked;

        if (input.checked) {
            checkbox.classList.add('checked');
        } else {
            checkbox.classList.remove('checked');
        }
    }

    // Show message
    function showMessage(type, message) {
        const messageDiv = document.getElementById('profileMessage');
        messageDiv.className = `message ${type} show`;
        messageDiv.textContent = message;

        setTimeout(() => {
            messageDiv.classList.remove('show');
        }, 5000);
    }

    // Edit avatar
    function editAvatar() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = function (e) {
            if (e.target.files[0]) {
                // Simulate avatar upload
                showMessage('success', currentLanguage === 'fr' ? 'Photo de profil mise à jour!' : 'Profile picture updated!');
            }
        };
        input.click();
    }

    // Share profile
    function shareProfile() {
        if (navigator.share) {
            navigator.share({
                title: 'Mon profil Je confie',
                text: 'Découvrez mon profil sur Je confie',
                url: window.location.href
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(window.location.href);
            showMessage('success', currentLanguage === 'fr' ? 'Lien copié dans le presse-papier!' : 'Link copied to clipboard!');
        }
    }

    // Save vehicle
    function saveVehicle() {
        showMessage('success', currentLanguage === 'fr' ? 'Véhicule enregistré avec succès!' : 'Vehicle saved successfully!');
    }
</script>
<!-- image-change js -->
<script src="{{asset('assets/js/image-change.js')}}"></script>

<script>
    function uploadProfile(event) {
        let fileInput = document.getElementById('fileInput');
        let form = document.getElementById('profileForm');

        // Preview image
        document.getElementById('output').src =
            URL.createObjectURL(event.target.files[0]);

        // Move file input into form before submitting
        form.appendChild(fileInput);

        // Submit form
        form.submit();
    }
</script>
</body>
</html>
