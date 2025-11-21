<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi Transport - Je confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
            margin-bottom: 10px;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background: linear-gradient(135deg, #f0fdf4 0%, #f8fafc 100%);
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
            max-width: 1440px;
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

        /* Tracking Container */
        .tracking-container {
            max-width: 1440px;
            margin: 92px auto 40px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 32px;
        }

        /* Main Tracking Area */
        .tracking-main {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* Status Card */
        .status-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .status-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
        }

        .status-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .status-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-badge.in-transit {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-badge.delivered {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.pending {
            background: #fef3c7;
            color: #92400e;
        }

        /* Progress Timeline */
        .progress-timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline-bar {
            position: absolute;
            top: 40px;
            left: 20px;
            right: 20px;
            height: 4px;
            background: var(--border);
            border-radius: 100px;
        }

        .timeline-progress {
            position: absolute;
            top: 40px;
            left: 20px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
            border-radius: 100px;
            width: 65%;
            transition: width 0.5s ease;
        }

        .timeline-steps {
            position: relative;
            display: flex;
            justify-content: space-between;
            z-index: 2;
        }

        .timeline-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        .step-icon {
            width: 48px;
            height: 48px;
            background: white;
            border: 3px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .timeline-step.completed .step-icon {
            background: var(--success);
            border-color: var(--success);
            color: white;
        }

        .timeline-step.active .step-icon {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(80, 70, 229, 0.4);
            }
            70% {
                box-shadow: 0 0 0 20px rgba(80, 70, 229, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(80, 70, 229, 0);
            }
        }

        .step-label {
            text-align: center;
        }

        .step-title {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .step-time {
            font-size: 12px;
            color: var(--gray);
        }

        /* Map Section */
        .map-section {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            box-shadow: var(--shadow);
        }

        .map-header {
            align-items: center;
            margin-bottom: 24px;
        }

        .map-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
        }

        .map-refresh {
            padding: 8px 16px;
            background: var(--light);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .map-refresh:hover {
            background: white;
            border-color: var(--primary);
            color: var(--primary);
        }

        .map-container {
            height: 400px;
            background: linear-gradient(135deg, #e0f2fe 0%, #dbeafe 100%);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Live Tracking Animation */
        .tracking-dot {
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--primary);
            border: 3px solid white;
            border-radius: 50%;
            box-shadow: var(--shadow-lg);
            top: 50%;
            left: 65%;
            transform: translate(-50%, -50%);
        }

        .tracking-dot::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: var(--primary);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes ping {
            75%, 100% {
                transform: translate(-50%, -50%) scale(2);
                opacity: 0;
            }
        }

        /* Transport Details */
        .transport-details-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            box-shadow: var(--shadow);
        }

        .details-header {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 24px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .detail-label {
            font-size: 13px;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Activity Timeline */
        .activity-timeline {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            box-shadow: var(--shadow);
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .activity-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
        }

        .activity-filter {
            display: flex;
            gap: 8px;
        }

        .filter-btn {
            padding: 6px 12px;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-size: 13px;
            font-weight: 500;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .activity-list {
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
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: white;
            box-shadow: var(--shadow-sm);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 13px;
            color: var(--gray);
        }

        /* Sidebar */
        .tracking-sidebar {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* Quick Info Card */
        .quick-info-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .info-header {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 14px;
            color: var(--gray);
        }

        .info-value {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        /* Contact Card */
        .contact-card {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: var(--radius-xl);
            padding: 24px;
            color: white;
        }

        .contact-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .contact-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 3px solid white;
        }

        .contact-info {
            flex: 1;
        }

        .contact-name {
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .contact-role {
            font-size: 14px;
            opacity: 0.9;
        }

        .contact-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 14px;
        }

        .contact-actions {
            display: flex;
            gap: 12px;
        }

        .contact-btn {
            flex: 1;
            padding: 12px;
            background: white;
            color: var(--primary);
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

        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        /* Notifications Card */
        .notifications-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .notifications-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .notifications-title {
            font-weight: 700;
            color: var(--dark);
        }

        .notifications-toggle {
            position: relative;
            width: 48px;
            height: 24px;
            background: var(--success);
            border-radius: 100px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .notifications-toggle::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 26px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .notification-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .notification-option {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
        }

        .notification-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border);
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .notification-checkbox.checked {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* Action Buttons */
        .action-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            padding: 14px;
            border-radius: var(--radius);
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 15px;
            display: flex;
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
            box-shadow: var(--shadow);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #0ea968;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-secondary {
            background: white;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-danger {
            background: white;
            color: var(--danger);
            border: 2px solid var(--danger);
        }

        .btn-danger:hover {
            background: var(--danger);
            color: white;
        }

        /* Delivery Confirmation Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .close-modal {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--light);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .confirmation-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .form-input {
            padding: 12px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .signature-pad {
            height: 150px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            background: white;
            position: relative;
        }

        .signature-placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--gray);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .tracking-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .details-grid {
                grid-template-columns: 1fr;
            }

            .timeline-steps {
                overflow-x: auto;
            }

            .contact-header {
                flex-direction: column;
                text-align: center;
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

        <div class="language-switcher">
            <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
            <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
        </div>
    </div>
</nav>

<!-- Tracking Container -->
<div class="tracking-container">
    <!-- Main Tracking Area -->
    <div class="tracking-main">
        <!-- Status Card -->
        <div class="status-card">
            <div class="status-header">
                <h1 class="status-title">
                    <span class="lang-content fr active">Suivi du transport {{ $track_ride->reference_id }}</span>
                    <span class="lang-content en">Tracking {{ $track_ride->reference_id }}</span>
                </h1>
                <div class="status-badge in-transit">
                    🚀
                    <span class="lang-content fr active">En transit</span>
                    <span class="lang-content en">In transit</span>
                </div>
            </div>

            <!-- Progress Timeline -->
            <div class="progress-timeline">
                <div class="timeline-bar"></div>
                <div class="timeline-progress"></div>

                <div class="timeline-steps">
                    <div class="timeline-step completed">
                        <div class="step-icon">✓</div>
                        <div class="step-label">
                            <div class="step-title">
                                <span class="lang-content fr active">Collecté</span>
                                <span class="lang-content en">Collected</span>
                            </div>
                            <div class="step-time">27 Jan, 14:00</div>
                        </div>
                    </div>

                    <div class="timeline-step completed">
                        <div class="step-icon">✓</div>
                        <div class="step-label">
                            <div class="step-title">
                                <span class="lang-content fr active">Départ</span>
                                <span class="lang-content en">Departure</span>
                            </div>
                            <div class="step-time">28 Jan, 14:30</div>
                        </div>
                    </div>

                    <div class="timeline-step active">
                        <div class="step-icon">✈️</div>
                        <div class="step-label">
                            <div class="step-title">
                                <span class="lang-content fr active">En vol</span>
                                <span class="lang-content en">In flight</span>
                            </div>
                            <div class="step-time">
                                <span class="lang-content fr active">En cours</span>
                                <span class="lang-content en">Ongoing</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-step">
                        <div class="step-icon">🛬</div>
                        <div class="step-label">
                            <div class="step-title">
                                <span class="lang-content fr active">Arrivée</span>
                                <span class="lang-content en">Arrival</span>
                            </div>
                            <div class="step-time">
                                <span class="lang-content fr active">Prévu 16:30</span>
                                <span class="lang-content en">Expected 4:30 PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-step">
                        <div class="step-icon">📦</div>
                        <div class="step-label">
                            <div class="step-title">
                                <span class="lang-content fr active">Livré</span>
                                <span class="lang-content en">Delivered</span>
                            </div>
                            <div class="step-time">
                                <span class="lang-content fr active">En attente</span>
                                <span class="lang-content en">Pending</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-section">
            <div class="map-header">

                <div style="display: flex; flex-direction: column">

                    <div class="controls" style="display: flex">
                        <input id="origin" type="hidden" placeholder="Pickup location" readonly>
                        <div id="stops"></div>
                        <input id="destination" type="hidden" style="margin-left: 20px" placeholder="Final destination"
                               readonly>
                    </div>

                    <div id="instruction-alert" class="alert alert-info" role="alert"
                         style="display:none; position: fixed; top: 70px; width: 90%; max-width: 600px; left: 50%; transform: translateX(-50%); z-index: 1000;"></div>

                    <button onclick="redirectToGoogleMaps()" class="btn btn-primary mt-3">Start Navigation</button>

                    <div style="display: flex; margin-top: 10px">

                        <h2 class="map-title">
                            <span class="lang-content fr active">🗺️ Localisation en temps réel</span>
                            <span class="lang-content en">🗺️ Real-time location</span>
                        </h2>
                        <button class="map-refresh" onclick="refreshMap()">
                            🔄
                            <span class="lang-content fr active">Actualiser</span>
                            <span class="lang-content en">Refresh</span>
                        </button>

                    </div>

                </div>
            </div>

            <div class="map-container" id="map">
                <div class="tracking-dot"></div>
                <div style="color: var(--gray); text-align: center;">
                    <div style="font-size: 48px; margin-bottom: 16px;">🗺️</div>
                    <div>Google Maps API Integration</div>
                    <div style="font-size: 14px; margin-top: 8px;">
                        <span class="lang-content fr active">Position actuelle: Au-dessus de l'Atlantique</span>
                        <span class="lang-content en">Current position: Over the Atlantic</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transport Details -->
        <div class="transport-details-card">
            <h2 class="details-header">
                <span class="lang-content fr active">📋 Détails du transport</span>
                <span class="lang-content en">📋 Transport details</span>
            </h2>

            <div class="details-grid">
                <div class="detail-item">
                        <span class="detail-label">
                            <span class="lang-content fr active">Trajet</span>
                            <span class="lang-content en">Route</span>
                        </span>
                    <span class="detail-value">{{ $track_ride->pickup_city }} → {{ $track_ride->destination_city }}</span>
                </div>
                @php
                    $message = $track_ride->message;
                    $badgeClass = 'badge'; // base class
                    $badgeText = '';

                    switch ($message) {
                        case 'On the way to pickup':
                            $badgeClass .= ' badge-success'; // yellow
                            $badgeText = 'On the way to pickup';
                            break;
                        case 'delivery in progress':
                            $badgeClass .= ' badge-success'; // blue
                            $badgeText = 'Package Being Delivered';
                            break;
                            case 'Parcel returned':
                            $badgeClass .= ' badge-success'; // blue
                            $badgeText = 'Parcel returned';
                            break;
                            case 'transport completed awaiting validation':
                            $badgeClass .= ' badge-success'; // blue
                            $badgeText = 'Transport Completed Awaiting Validation';
                            break;
                        case 'package delivered':
                            $badgeClass .= ' badge-success'; // green
                            $badgeText = 'Package Delivered';
                            break;
                        case 'finished':
                            $badgeClass .= ' badge-secondary'; // gray
                            $badgeText = 'Finished';
                            break;
                        default:
                            $badgeClass .= ' badge-light'; // fallback
                            $badgeText = ucfirst(str_replace('_', ' ', $message));
                            break;
                    }
                    $transportName = ucfirst(strtolower($track_ride->userriderequest->vehicle_type_needed ?? ''));
                    $icon = $icons[$transportName] ?? '❓'; // default fallback
                @endphp
                <div class="detail-item">
                        <span class="detail-label">
                            <span class="lang-content fr active">Type de transport</span>
                            <span class="lang-content en">Transport type</span>
                        </span>
                    <span class="detail-value">{{ $icon }} Air France AF022</span>
                </div>
                @php
                    $packages = json_decode($track_ride->userriderequest->packages_json, true);
                    $totalWeight = collect($packages)->sum('weight');
                @endphp
                <div class="detail-item">
                        <span class="detail-label">
                            <span class="lang-content fr active">Poids du colis</span>
                            <span class="lang-content en">Package weight</span>
                        </span>
                    <span class="detail-value">{{ $totalWeight }} kg</span>
                </div>
                <div class="detail-item">
                        <span class="detail-label">
                            <span class="lang-content fr active">Contenu</span>
                            <span class="lang-content en">Content</span>
                        </span>
                    @php
                        // Ensure $contents is always an array
                        $contents = is_array($track_ride->type_of_package)
                            ? $track_ride->type_of_package
                            : json_decode($track_ride->type_of_package, true) ?? [];
                    @endphp

                    @foreach($contents as $content)
                        <span class="detail-value">{{ $content }}</span>
                    @endforeach
                </div>
                <div class="detail-item">
                        <span class="detail-label">
                            <span class="lang-content fr active">Assurance</span>
                            <span class="lang-content en">Insurance</span>
                        </span>
                    <span class="detail-value">✓ {{ $track_ride->userriderequest->insurance }}</span>
                </div>
                <div class="detail-item">
                        <span class="detail-label">
                            <span class="lang-content fr active">Statut paiement</span>
                            <span class="lang-content en">Payment status</span>
                        </span>
                    <span class="detail-value" style="color: var(--warning);">
                            <span class="lang-content fr active">En attente livraison</span>
                            <span class="lang-content en">Awaiting delivery</span>
                        </span>
                </div>
            </div>
        </div>

        <!-- Activity Timeline -->
        <div class="activity-timeline">
            <div class="activity-header">
                <h2 class="activity-title">
                    <span class="lang-content fr active">📜 Historique des événements</span>
                    <span class="lang-content en">📜 Event history</span>
                </h2>
                <div class="activity-filter">
                    <button class="filter-btn active">
                        <span class="lang-content fr active">Tout</span>
                        <span class="lang-content en">All</span>
                    </button>
                    <button class="filter-btn">
                        <span class="lang-content fr active">Important</span>
                        <span class="lang-content en">Important</span>
                    </button>
                </div>
            </div>

            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon">✈️</div>
                    <div class="activity-content">
                        <div class="activity-text">
                            <span class="lang-content fr active">Vol décollé de Paris CDG</span>
                            <span class="lang-content en">Flight departed from Paris CDG</span>
                        </div>
                        <div class="activity-time">28 Jan 2025, 14:35</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">📦</div>
                    <div class="activity-content">
                        <div class="activity-text">
                            <span class="lang-content fr active">Colis embarqué dans l'avion</span>
                            <span class="lang-content en">Package loaded on plane</span>
                        </div>
                        <div class="activity-time">28 Jan 2025, 14:00</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">🔍</div>
                    <div class="activity-content">
                        <div class="activity-text">
                            <span class="lang-content fr active">Passage du contrôle de sécurité</span>
                            <span class="lang-content en">Security check passed</span>
                        </div>
                        <div class="activity-time">28 Jan 2025, 12:30</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">🤝</div>
                    <div class="activity-content">
                        <div class="activity-text">
                            <span class="lang-content fr active">Colis remis au transporteur Thomas M.</span>
                            <span class="lang-content en">Package handed to carrier Thomas M.</span>
                        </div>
                        <div class="activity-time">27 Jan 2025, 14:00</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">✅</div>
                    <div class="activity-content">
                        <div class="activity-text">
                            <span class="lang-content fr active">Réservation confirmée et payée</span>
                            <span class="lang-content en">Booking confirmed and paid</span>
                        </div>
                        <div class="activity-time">25 Jan 2025, 10:15</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="tracking-sidebar">
        <!-- Quick Info Card -->
        <div class="quick-info-card">
            <h3 class="info-header">
                <span class="lang-content fr active">ℹ️ Informations rapides</span>
                <span class="lang-content en">ℹ️ Quick info</span>
            </h3>

            <div class="info-item">
                    <span class="info-label">
                        <span class="lang-content fr active">Numéro de suivi</span>
                        <span class="lang-content en">Tracking number</span>
                    </span>
                <span class="info-value">{{ $track_ride->reference_id }}</span>
            </div>

            <div class="info-item">
                    <span class="info-label">
                        <span class="lang-content fr active">Temps restant estimé</span>
                        <span class="lang-content en">Estimated time remaining</span>
                    </span>
                <span class="info-value" id="etr-info"></span>
            </div>

            <div class="info-item">
                    <span class="info-label">
                        <span class="lang-content fr active">Distance restant estimé</span>
                        <span class="lang-content en">Estimated Distance remaining</span>
                    </span>
                <span class="info-value" id="edr-info"></span>
            </div>

            <div class="info-item">
    <span class="info-label">
        <span class="lang-content fr active">Vitesse actuelle</span>
        <span class="lang-content en">Current speed</span>
    </span>
                <span class="info-value" id="current-speed">0 km/h</span>
            </div>

            <div class="info-item">
    <span class="info-label">
        <span class="lang-content fr active">Distance parcourue</span>
        <span class="lang-content en">Distance traveled</span>
    </span>
                <span class="info-value" id="distance-traveled">0 km</span>
            </div>

            <div class="info-item">
    <span class="info-label">
        <span class="lang-content fr active">Altitude</span>
        <span class="lang-content en">Altitude</span>
    </span>
                <span class="info-value" id="current-altitude">0 m</span>
            </div>
        </div>

        <!-- Contact Card -->
        <div class="contact-card">
            <div class="contact-header">
                <img src="{{ $track_ride->user->profile ? asset('storage/'.$track_ride->user->profile) : asset('assets/images/profile/p8.png') }}" alt="Thomas"
                     class="contact-avatar">
                <div class="contact-info">
                    <div class="contact-name">{{ $track_ride->user->firstName . ' ' . $track_ride->user->lasttName }}</div>
                    <div class="contact-role">
                        <span class="lang-content fr active">Sender</span>
                        <span class="lang-content en">Sender</span>
                    </div>
                    <div class="contact-rating">⭐ 4.9 (127 avis)</div>
                </div>
            </div>

            <div class="contact-actions">
                <button class="contact-btn">
                    💬
                    <span class="lang-content fr active">Message</span>
                    <span class="lang-content en">Message</span>
                </button>
                <button class="contact-btn">
                    📞
                    <span class="lang-content fr active">Appeler</span>
                    <span class="lang-content en">Call</span>
                </button>
            </div>
        </div>

        <!-- Notifications Card -->
        <div class="notifications-card">
            <div class="notifications-header">
                <h3 class="notifications-title">
                    <span class="lang-content fr active">🔔 Notifications</span>
                    <span class="lang-content en">🔔 Notifications</span>
                </h3>
                <div class="notifications-toggle"></div>
            </div>

            <div class="notification-options">
                <div class="notification-option">
                    <div class="notification-checkbox checked">✓</div>
                    <span>
                            <span class="lang-content fr active">Changements de statut</span>
                            <span class="lang-content en">Status changes</span>
                        </span>
                </div>
                <div class="notification-option">
                    <div class="notification-checkbox checked">✓</div>
                    <span>SMS (Twilio)</span>
                </div>
                <div class="notification-option">
                    <div class="notification-checkbox checked">✓</div>
                    <span>Email</span>
                </div>
                <div class="notification-option">
                    <div class="notification-checkbox">✓</div>
                    <span>Push notifications</span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-card">
            <h3 class="info-header" style="margin-bottom: 16px;">
                <span class="lang-content fr active">⚡ Actions</span>
                <span class="lang-content en">⚡ Actions</span>
            </h3>

            <div class="action-buttons">
                <button class="btn btn-success" id="confirmDeliveryBtn" disabled>
                    ✅
                    <span class="lang-content fr active">Confirmer la réception</span>
                    <span class="lang-content en">Confirm receipt</span>
                </button>

                <button class="btn btn-secondary">
                    📄
                    <span class="lang-content fr active">Télécharger le reçu</span>
                    <span class="lang-content en">Download receipt</span>
                </button>

                <button class="btn btn-secondary">
                    🔗
                    <span class="lang-content fr active">Partager le suivi</span>
                    <span class="lang-content en">Share tracking</span>
                </button>

                <button class="btn btn-danger">
                    ⚠️
                    <span class="lang-content fr active">Signaler un problème</span>
                    <span class="lang-content en">Report an issue</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delivery Confirmation Modal -->
<div class="modal" id="confirmationModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">
                <span class="lang-content fr active">Confirmer la réception</span>
                <span class="lang-content en">Confirm receipt</span>
            </h2>
            <button class="close-modal" onclick="closeModal()">×</button>
        </div>

        <form class="confirmation-form">
            <div class="form-group">
                <label class="form-label">
                    <span class="lang-content fr active">Code de confirmation</span>
                    <span class="lang-content en">Confirmation code</span>
                </label>
                <input type="text" class="form-input" placeholder="Ex: JC1234" maxlength="6">
            </div>

            <div class="form-group">
                <label class="form-label">
                    <span class="lang-content fr active">État du colis</span>
                    <span class="lang-content en">Package condition</span>
                </label>
                <select class="form-input">
                    <option value="perfect">
                        <span class="lang-content fr active">Parfait état</span>
                        <span class="lang-content en">Perfect condition</span>
                    </option>
                    <option value="good">
                        <span class="lang-content fr active">Bon état</span>
                        <span class="lang-content en">Good condition</span>
                    </option>
                    <option value="damaged">
                        <span class="lang-content fr active">Endommagé</span>
                        <span class="lang-content en">Damaged</span>
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <span class="lang-content fr active">Photo du colis (optionnel)</span>
                    <span class="lang-content en">Package photo (optional)</span>
                </label>
                <input type="file" class="form-input" accept="image/*">
            </div>

            <div class="form-group">
                <label class="form-label">
                    <span class="lang-content fr active">Signature</span>
                    <span class="lang-content en">Signature</span>
                </label>
                <div class="signature-pad">
                    <div class="signature-placeholder">
                        <span class="lang-content fr active">Signez ici</span>
                        <span class="lang-content en">Sign here</span>
                    </div>
                </div>
            </div>

            <div class="action-buttons" style="margin-top: 24px;">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">
                    <span class="lang-content fr active">Annuler</span>
                    <span class="lang-content en">Cancel</span>
                </button>
                <button type="submit" class="btn btn-success">
                    ✅
                    <span class="lang-content fr active">Confirmer et débloquer le paiement</span>
                    <span class="lang-content en">Confirm and release payment</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap"
    async defer></script>

<script>
    let map, directionsService, directionsRenderer;
    let stopInputs = [], allLegs = [], allSteps = [], currentStep = 0;

    let pickupLocation = {!! json_encode($track_ride['pickup_location'] ?? '') !!};
    let destinationLocation = {!! json_encode($track_ride['destination_location'] ?? '') !!};
    let rideMessage = {!! json_encode($track_ride['message'] ?? '') !!};
    let previousPosition = null;
    let totalDistanceMeters = 0;
    let pickupLatLng = null;


    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: {lat: 30.1575, lng: 71.5249}
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer({map: map});

        if (rideMessage === 'On the way to pickup' || rideMessage === 'User Requested to Return the Package' || rideMessage === 'Carrier Cancelled Ride' || rideMessage === "Package return in progress") {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    pickupLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    destinationArray = [{!! json_encode($track_ride['pickup_location'] ?? '') !!}];
                    setupMap();
                }, function () {
                    alert("Geolocation failed. Using default pickup location.");
                    setupMap();
                });
            } else {
                alert("Geolocation not supported by this browser.");
                setupMap();
            }
        } else {
            setupMap();
        }

        function setupMap() {
            const origin =
                typeof pickupLocation === 'string'
                    ? pickupLocation
                    : new google.maps.LatLng(pickupLocation.lat, pickupLocation.lng);

            const destination = destinationLocation || '';

            $('#origin').val(
                typeof origin === 'string' ? origin : `${origin.lat()}, ${origin.lng()}`
            );

            $('#destination').val(destination);

            // No stops anymore
            stopInputs = [];

            calculateRoute();
        }
    }

    function calculateRoute() {
        const origin = $('#origin').val();
        const destination = $('#destination').val();

        if (!origin || !destination) {
            alert("Origin and destination are required.");
            return;
        }

        directionsService.route(
            {
                origin,
                destination,
                waypoints: [], // no stops
                travelMode: google.maps.TravelMode.DRIVING
            },
            (result, status) => {
                if (status === "OK") {
                    directionsRenderer.setDirections(result);

                    allLegs = result.routes[0].legs;
                    allSteps = allLegs.flatMap(leg => leg.steps);
                    currentStep = 0;
                    startTracking();

                    let totalDistanceMeters = 0;
                    let totalDurationSeconds = 0;

                    allLegs.forEach(leg => {
                        totalDistanceMeters += leg.distance.value; // in meters
                        totalDurationSeconds += leg.duration.value; // in seconds
                    });

                    // -------------------------
                    // Format Distance
                    // -------------------------
                    const distanceKm = totalDistanceMeters / 1000;
                    const distanceFormatted = distanceKm >= 1000
                        ? `${(distanceKm / 1000).toLocaleString(undefined, {maximumFractionDigits: 2})}k km`
                        : `${distanceKm.toLocaleString(undefined, {maximumFractionDigits: 2})} km`;

                    $('#edr-info').html(`${distanceFormatted}`);

                    // -------------------------
                    // Format Duration
                    // -------------------------
                    let remainingSeconds = totalDurationSeconds;
                    let days = Math.floor(remainingSeconds / 86400);
                    remainingSeconds %= 86400;
                    let hours = Math.floor(remainingSeconds / 3600);
                    remainingSeconds %= 3600;
                    let minutes = Math.ceil(remainingSeconds / 60);

                    let durationParts = [];
                    if (days > 0) durationParts.push(`${days}d`);
                    if (hours > 0) durationParts.push(`${hours}h`);
                    if (minutes > 0) durationParts.push(`${minutes}min`);

                    const durationFormatted = durationParts.length > 0 ? `~${durationParts.join(' ')}` : '0min';
                    $('#etr-info').html(durationFormatted);

                } else {
                    alert("Could not calculate route: " + status);
                }
            }
        );
    }

    function startTracking() {
        if (!navigator.geolocation) return alert("Geolocation not supported.");

        navigator.geolocation.watchPosition(
            position => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                const altitude = position.coords.altitude; // may be null
                const gpsSpeed = position.coords.speed; // m/s, may be null
                const timestamp = position.timestamp;

                const currentLatLng = new google.maps.LatLng(lat, lng);

                // Initialize pickup location if not set
                if (!pickupLatLng) {
                    pickupLatLng = currentLatLng;
                }

                // ------------------------
                // Distance traveled from previous point
                // ------------------------
                if (previousPosition) {
                    const prevLatLng = new google.maps.LatLng(previousPosition.lat, previousPosition.lng);
                    const distanceDelta = google.maps.geometry.spherical.computeDistanceBetween(prevLatLng, currentLatLng);
                    totalDistanceTraveled += distanceDelta;
                }

                // ------------------------
                // Current speed
                // ------------------------
                let currentSpeedKmh = 0;
                if (gpsSpeed !== null && !isNaN(gpsSpeed)) {
                    currentSpeedKmh = gpsSpeed * 3.6; // m/s -> km/h
                } else if (previousPosition && previousPosition.timestamp) {
                    const timeDiff = (timestamp - previousPosition.timestamp) / 1000; // seconds
                    if (timeDiff > 0) {
                        const prevLatLng = new google.maps.LatLng(previousPosition.lat, previousPosition.lng);
                        const distanceDelta = google.maps.geometry.spherical.computeDistanceBetween(prevLatLng, currentLatLng);
                        currentSpeedKmh = (distanceDelta / 1000) / (timeDiff / 3600); // km/h
                    }
                }

                // ------------------------
                // Distance from pickup
                // ------------------------
                const distanceFromPickupMeters = google.maps.geometry.spherical.computeDistanceBetween(pickupLatLng, currentLatLng);

                // ------------------------
                // Distance remaining
                // ------------------------
                let distanceRemainingMeters = 0;
                if (allSteps && allSteps.length > 0 && currentStep < allSteps.length) {
                    // Sum remaining steps from current step
                    distanceRemainingMeters = allSteps.slice(currentStep).reduce((sum, step) => sum + step.distance.value, 0);
                    // Add distance from current GPS to start of current step
                    const stepStart = allSteps[currentStep].start_location;
                    distanceRemainingMeters += google.maps.geometry.spherical.computeDistanceBetween(currentLatLng, stepStart);
                }

                // ------------------------
                // Estimated time remaining (ETA)
                // ------------------------
                let etaSeconds = distanceRemainingMeters / (currentSpeedKmh / 3.6 || 1); // avoid divide by zero
                if (!isFinite(etaSeconds)) etaSeconds = 0;

                let remainingSeconds = etaSeconds;
                let days = Math.floor(remainingSeconds / 86400);
                remainingSeconds %= 86400;
                let hours = Math.floor(remainingSeconds / 3600);
                remainingSeconds %= 3600;
                let minutes = Math.ceil(remainingSeconds / 60);

                let etaParts = [];
                if (days > 0) etaParts.push(`${days}d`);
                if (hours > 0) etaParts.push(`${hours}h`);
                if (minutes > 0) etaParts.push(`${minutes}min`);
                const etaFormatted = etaParts.length > 0 ? `~${etaParts.join(' ')}` : '0min';

                // ------------------------
                // Update DOM
                // ------------------------
                document.getElementById('current-speed').innerText = `${currentSpeedKmh.toFixed(1)} km/h`;
                document.getElementById('distance-traveled').innerText = `${(distanceFromPickupMeters / 1000).toFixed(2)} km`;
                document.getElementById('current-altitude').innerText = altitude !== null ? `${altitude.toFixed(0)} m` : 'N/A';
                document.getElementById('edr-info').innerText = `${(distanceRemainingMeters / 1000).toFixed(2)} km`;
                document.getElementById('etr-info').innerText = etaFormatted;

                previousPosition = { lat, lng, timestamp };

                // ------------------------
                // Step instructions (optional)
                // ------------------------
                if (currentStep < allSteps.length) {
                    const step = allSteps[currentStep];
                    const stepEnd = step.end_location;
                    const distanceToStepEnd = google.maps.geometry.spherical.computeDistanceBetween(currentLatLng, stepEnd);

                    if (distanceToStepEnd < 80) { // 80 meters threshold
                        showInstruction(step.instructions);
                        speak(step.instructions);
                        currentStep++;
                    }
                }

            },
            error => {
                console.error("Geolocation error:", error);
            },
            {
                enableHighAccuracy: true,
                maximumAge: 2000,
                timeout: 10000
            }
        );
    }

    function speak(text) {
        const cleanedText = text.replace(/<[^>]+>/g, '');
        const utterance = new SpeechSynthesisUtterance(cleanedText);
        utterance.lang = 'en-US';
        speechSynthesis.speak(utterance);
    }

    function showInstruction(html) {
        $('#instruction-alert').html(html).fadeIn();
        setTimeout(() => {
            $('#instruction-alert').fadeOut();
        }, 8000);
    }

    function redirectToGoogleMaps() {
        const origin = encodeURIComponent($('#origin').val());
        const encodedDest = encodeURIComponent($('#destination').val());

        const isAndroid = /android/i.test(navigator.userAgent);
        const isIOS = /iphone|ipad|ipod/i.test(navigator.userAgent);

        if (isAndroid) {
            window.location.href = `intent://maps.google.com/maps?daddr=${encodedDest}&dirflg=d#Intent;scheme=https;package=com.google.android.apps.maps;end`;
        } else if (isIOS) {
            window.location.href = `comgooglemaps://?daddr=${encodedDest}&directionsmode=driving`;
        } else {
            window.location.href = `https://www.google.com/maps/dir/?api=1&destination=${encodedDest}&travelmode=driving`;
        }
    }
</script>


<!-- PWA: Manifest + Service Worker -->
<link rel="manifest" href="manifest.json">
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js')
            .then(() => console.log("Service Worker registered"))
            .catch(err => console.error("Service Worker error:", err));
    }
</script>
</body>
</html>
