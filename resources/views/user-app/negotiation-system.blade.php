<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Négociation - Je confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- jQuery (required for Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

        /* Language System */
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

        [data-lang] {
            display: none;
        }

        [data-lang].active {
            display: inline-block;
        }

        /* Main Container */
        .container {
            max-width: 1280px;
            margin: 100px auto 40px;
            padding: 0 20px;
        }

        /* Tabs Navigation */
        .tabs-nav {
            background: white;
            border-radius: var(--radius-xl);
            padding: 8px;
            margin-bottom: 32px;
            box-shadow: var(--shadow);
            display: flex;
            gap: 8px;
        }

        .tab-btn {
            flex: 1;
            padding: 12px 24px;
            border: none;
            background: transparent;
            border-radius: var(--radius-lg);
            font-weight: 600;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .tab-btn.active {
            background: var(--primary);
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Negotiation Card */
        .negotiation-card {
            background: white;
            border-radius: var(--radius-xl);
            padding: 32px;
            box-shadow: var(--shadow);
            margin-bottom: 24px;
        }

        .negotiation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .negotiation-status {
            display: flex;
            align-items: center;
            gap: 12px;
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

        .status-badge.active {
            background: var(--warning);
            color: white;
        }

        .status-badge.accepted {
            background: var(--success);
            color: white;
        }

        .status-badge.rejected {
            background: var(--danger);
            color: white;
        }

        .status-badge.expired {
            background: var(--gray);
            color: white;
        }

        .negotiation-timer {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #fef3c7, #fed7aa);
            border-radius: var(--radius-lg);
            font-weight: 600;
        }

        .timer-urgent {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: var(--danger);
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding: 20px 0 20px 40px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 16px;
            top: 30px;
            bottom: 30px;
            width: 2px;
            background: var(--border);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 24px;
            animation: slideIn 0.3s ease backwards;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -28px;
            top: 8px;
            width: 12px;
            height: 12px;
            background: white;
            border: 3px solid var(--primary);
            border-radius: 50%;
        }

        .timeline-item.sender::before {
            background: var(--primary);
        }

        .timeline-item.transporter::before {
            background: var(--warning);
            border-color: var(--warning);
        }

        .timeline-item.system::before {
            background: var(--gray);
            border-color: var(--gray);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .timeline-content {
            background: var(--light);
            border-radius: var(--radius-lg);
            padding: 16px;
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .timeline-author {
            font-weight: 600;
            color: var(--dark);
        }

        .timeline-time {
            font-size: 12px;
            color: var(--gray);
        }

        .timeline-offer {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 12px 0;
        }

        .offer-amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .offer-change {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 14px;
        }

        .offer-change.increase {
            color: var(--danger);
        }

        .offer-change.decrease {
            color: var(--success);
        }

        .timeline-message {
            padding: 12px;
            background: white;
            border-left: 3px solid var(--primary);
            border-radius: var(--radius);
            margin-top: 12px;
            font-size: 14px;
            line-height: 1.6;
            font-style: italic;
        }

        .timeline-actions {
            display: flex;
            gap: 8px;
            margin-top: 12px;
        }

        /* Negotiation Form */
        .negotiation-form {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-top: 24px;
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
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80, 70, 229, 0.1);
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
            border-color: var(--primary);
            background: var(--primary);
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

        .form-actions {
            display: flex;
            gap: 12px;
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

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #dc8a0a;
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
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 13px;
        }

        /* Notification Toast */
        .toast {
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 16px 20px;
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            transform: translateX(400px);
            transition: transform 0.3s ease;
            z-index: 1100;
            max-width: 350px;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .toast-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toast-icon.success {
            background: var(--success);
            color: white;
        }

        .toast-icon.warning {
            background: var(--warning);
            color: white;
        }

        .toast-icon.error {
            background: var(--danger);
            color: white;
        }

        .toast-title {
            font-weight: 600;
            color: var(--dark);
        }

        .toast-message {
            font-size: 14px;
            color: var(--gray);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1200;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }

        .modal.show {
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
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .modal-close {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: none;
            background: var(--light);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: var(--danger);
            color: white;
        }

        .modal-body {
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .modal-footer {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        /* Stats Grid */
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

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--gray);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                margin-top: 90px;
            }

            .tabs-nav {
                flex-direction: column;
            }

            .negotiation-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .timeline {
                padding-left: 30px;
            }

            .timeline::before {
                left: 10px;
            }

            .timeline-item::before {
                left: -22px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .toast {
                right: 10px;
                left: 10px;
                max-width: none;
            }
        }

        @media (max-width: 480px) {
            .negotiation-card {
                padding: 20px;
            }

            .price-input {
                font-size: 20px;
                padding: 12px 16px 12px 36px;
            }

            .price-suggestions {
                flex-direction: column;
            }

            .suggestion-chip {
                width: 100%;
                text-align: center;
            }
        }

        /* Loading State */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid var(--light);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Progress Bar */
        .progress-bar {
            height: 4px;
            background: var(--light);
            border-radius: 100px;
            overflow: hidden;
            margin: 20px 0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
            border-radius: 100px;
            transition: width 0.3s ease;
        }

        /* Chat Messages */
        .chat-container {
            max-height: 400px;
            overflow-y: auto;
            padding: 20px;
            background: var(--light);
            border-radius: var(--radius-lg);
            margin-bottom: 20px;
        }

        .chat-message {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            animation: slideIn 0.3s ease;
        }

        .chat-message.sent {
            flex-direction: row-reverse;
        }

        .chat-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .chat-bubble {
            max-width: 70%;
            padding: 12px 16px;
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
        }

        .chat-message.sent .chat-bubble {
            background: var(--primary);
            color: white;
        }

        .chat-time {
            font-size: 11px;
            color: var(--gray);
            margin-top: 4px;
        }

        .chat-message.sent .chat-time {
            color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
@php
    $userriderequest = \App\Models\Userriderequest::find($userriderequest_id);
@endphp
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="logo">
                <div class="logo-icon">JC</div>
                <span class="logo-text" data-lang="fr" class="active">Je confie</span>
                <span class="logo-text" data-lang="en">I entrust</span>
            </a>

            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Tabs Navigation -->
        <div class="tabs-nav">
            <button class="tab-btn active" onclick="switchTab('active')">
                🔥 <span data-lang="fr" class="active">Négociations actives</span>
                <span data-lang="en">Active negotiations</span>
                <span class="badge" id="activeCount">{{ count($driverFareRequests) }}</span>
            </button>
            <button class="tab-btn" onclick="switchTab('accepted')">
                ✅ <span data-lang="fr" class="active">Acceptées</span>
                <span data-lang="en">Accepted</span>
                <span class="badge" id="acceptedCount">{{ count($accepteddriverFareRequests) }}</span>
            </button>
            <button class="tab-btn" onclick="switchTab('rejected')">
                ❌ <span data-lang="fr" class="active">Refusées</span>
                <span data-lang="en">Rejected</span>
                <span class="badge" id="rejectedCount">{{ count($rejecteddriverFareRequests) }}</span>
            </button>
            <button class="tab-btn" onclick="switchTab('expired')">
                ⏰ <span data-lang="fr" class="active">Expirées</span>
                <span data-lang="en">Expired</span>
                <span class="badge" id="expiredCount">{{ count($expiredddriverFareRequests) }}</span>
            </button>
        </div>

        <!-- Tab Contents -->
        <div id="activeTab" class="tab-content active">

            <!-- Active Negotiation -->
            @foreach($driverFareRequests as $driverFareRequest)
            <div class="negotiation-card">
                <div class="negotiation-header">
                    <div class="negotiation-status">
                        <span class="status-badge active">
                            🤝 <span data-lang="fr" class="active">Négociation en cours</span>
                            <span data-lang="en">Ongoing negotiation</span>
                        </span>
                        <span style="color: var(--gray); font-size: 14px;">
                            #{{ $driverFareRequest->request_id }}
                        </span>
                    </div>
                    <div class="negotiation-timer" id="timer">
                        ⏱️ <span data-lang="fr" class="active">Expire dans:</span>
                        <span data-lang="en">Expires in:</span>
                        @php
                            $expiry = \Carbon\Carbon::parse($driverFareRequest->expiry);
                            $diffInMinutes = now()->diffInMinutes($expiry);
                            $hours = floor($diffInMinutes / 60);
                            $minutes = $diffInMinutes % 60;
                        @endphp
                        <span id="countdown">{{ $hours }}h {{ $minutes }}min</span>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 60%"></div>
                </div>

                <!-- Negotiation Form -->
                <div class="negotiation-form">

                    <textarea class="message-input"
                              id="messageInput"
                              data-placeholder-fr="Ajouter un message (optionnel)..."
                              data-placeholder-en="Add a message (optional)..."
                              placeholder="Ajouter un message (optionnel)..."></textarea>

                    <div class="form-actions">
                        <a href="{{ url('user/accept-ride-details') }}?driverfarerequest_id={{ $driverFareRequest->id }}&driver_id={{ $driverFareRequest->driver_id }}"
                           class="btn btn-success"
                           style="width: 50%;">
                            ✅
                            <span data-lang="fr" class="active">Accepter {{ $driverFareRequest->requested_fare }}€</span>
                            <span data-lang="en">Accept €{{ $driverFareRequest->requested_fare }}</span>
                        </a>
                        <a href="{{ url('user/reject-ride-details') }}?driver_request_id={{ $driverFareRequest->id }}" class="btn btn-danger" style="width: 50%;">
                            ❌ <span data-lang="fr" class="active">Refuser</span>
                            <span data-lang="en">Reject</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Accepted Tab -->
        <div id="acceptedTab" class="tab-content">
            @foreach($accepteddriverFareRequests as $accepteddriverFareRequest)
            <div class="negotiation-card">
                <div class="negotiation-header">
                    <div class="negotiation-status">
                        <span class="status-badge accepted">
                            ✅ <span data-lang="fr" class="active">Négociation acceptée</span>
                            <span data-lang="en">Negotiation accepted</span>
                        </span>
                        <span style="color: var(--gray); font-size: 14px;">
                            #{{ $accepteddriverFareRequest->request_id }}
                        </span>
                    </div>
                    <div>
                        <span data-lang="fr" class="active">Prix final:</span>
                        <span data-lang="en">Final price:</span>
                        <strong style="color: var(--success); font-size: 1.25rem;">55€</strong>
                    </div>
                </div>
                <p style="color: var(--gray); margin-top: 12px;">
                    <span data-lang="fr" class="active">Transport effectué avec succès le 15/10/2025</span>
                    <span data-lang="en">Transport completed successfully on 10/15/2025</span>
                </p>
            </div>
            @endforeach
        </div>

        <!-- Rejected Tab -->
        <div id="rejectedTab" class="tab-content">
            @foreach($rejecteddriverFareRequests as $rejecteddriverFareRequest)
            <div class="negotiation-card">
                <div class="negotiation-header">
                    <div class="negotiation-status">
                        <span class="status-badge rejected">
                            ❌ <span data-lang="fr" class="active">Négociation refusée</span>
                            <span data-lang="en">Negotiation rejected</span>
                        </span>
                        <span style="color: var(--gray); font-size: 14px;">
                            #{{ $rejecteddriverFareRequest->request_id }}
                        </span>
                    </div>
                </div>
                <p style="color: var(--gray); margin-top: 12px;">
                    <span data-lang="fr" class="active">Les parties n'ont pas pu trouver un accord sur le prix</span>
                    <span data-lang="en">The parties could not reach an agreement on the price</span>
                </p>
            </div>
            @endforeach
        </div>

        <!-- Expired Tab -->
        <div id="expiredTab" class="tab-content">
            @foreach($expiredddriverFareRequests as $expiredddriverFareRequest)
            <div class="negotiation-card">
                <div class="negotiation-header">
                    <div class="negotiation-status">
                        <span class="status-badge expired">
                            ⏰ <span data-lang="fr" class="active">Négociation expirée</span>
                            <span data-lang="en">Negotiation expired</span>
                        </span>
                        <span style="color: var(--gray); font-size: 14px;">
                            #{{ $expiredddriverFareRequest->request_id }}
                        </span>
                    </div>
                </div>
                <p style="color: var(--gray); margin-top: 12px;">
                    <span data-lang="fr" class="active">Le délai de négociation a expiré sans accord</span>
                    <span data-lang="en">The negotiation deadline expired without agreement</span>
                </p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="toast-header">
            <div class="toast-icon" id="toastIcon">✓</div>
            <div class="toast-title" id="toastTitle">Notification</div>
        </div>
        <div class="toast-message" id="toastMessage">Message</div>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Titre</h2>
                <button class="modal-close" onclick="closeModal()">✕</button>
            </div>
            <div class="modal-body" id="modalBody">
                Content
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal()">
                    <span data-lang="fr" class="active">Annuler</span>
                    <span data-lang="en">Cancel</span>
                </button>
                <button class="btn btn-primary" id="modalConfirm">
                    <span data-lang="fr" class="active">Confirmer</span>
                    <span data-lang="en">Confirm</span>
                </button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>

        $(document).ready(function() {
            @if(session('status') && session('message'))
            showToast(
                '{{ session('status') }}',
                currentLang === 'fr' ? "{{ session('message') }}" : "{{ session('message') }}",
                currentLang === 'en' ? "{{ session('message') }}" : "{{ session('message') }}"
            );
            @endif
        });

        // Language Management
        let currentLang = localStorage.getItem('preferredLanguage') || 'fr';

        // Negotiation Data Store
        let negotiations = {
            active: [],
            accepted: [],
            rejected: [],
            expired: []
        };

        // Current Negotiation State
        let currentNegotiation = {
            id: 'CT2024-0847',
            status: 'active',
            currentOffer: 65,
            lastProposer: 'sender',
            history: [],
            messages: [],
            expiryTime: Date.now() + (2 * 60 + 45) * 60 * 1000 // 2h45min
        };

        // Timer Management
        let timerInterval;

        function startTimer() {
            if (timerInterval) clearInterval(timerInterval);

            timerInterval = setInterval(() => {
                const now = Date.now();
                const remaining = currentNegotiation.expiryTime - now;

                if (remaining <= 0) {
                    clearInterval(timerInterval);
                    expireNegotiation();
                    return;
                }

                const hours = Math.floor(remaining / (1000 * 60 * 60));
                const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((remaining % (1000 * 60)) / 1000);

                let timeString = '';
                if (hours > 0) timeString += `${hours}h `;
                if (minutes > 0) timeString += `${minutes}min `;
                if (hours === 0 && minutes < 5) timeString += `${seconds}s`;

                // document.getElementById('countdown').textContent = timeString.trim();
                //
                // // Urgent state
                // const timer = document.getElementById('timer');
                // if (remaining < 10 * 60 * 1000) { // Less than 10 minutes
                //     timer.classList.add('timer-urgent');
                // }
            }, 1000);
        }

        // Language Switching
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

            updatePageTitle();
        }

        function updatePageTitle() {
            const titles = {
                fr: 'Système de Négociation - Je confie',
                en: 'Negotiation System - I entrust'
            };
            document.title = titles[currentLang];
        }

        // Tab Management
        function switchTab(tabName) {
            // Update tab buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Update tab content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            document.getElementById(`${tabName}Tab`).classList.add('active');
        }

        // Price Management
        function setPrice(price) {
            document.getElementById('priceInput').value = price;
            updateProposalButton();
        }

        function updateProposalButton() {
            const price = document.getElementById('priceInput').value;
            document.getElementById('proposalAmount').textContent = `${price}€`;
        }

        // Proposal Management
        function sendProposal() {
            const price = parseFloat(document.getElementById('priceInput').value);
            const message = document.getElementById('messageInput').value;

            if (!price || price <= 0) {
                showToast('error',
                    currentLang === 'fr' ? 'Erreur' : 'Error',
                    currentLang === 'fr' ? 'Veuillez entrer un prix valide' : 'Please enter a valid price'
                );
                return;
            }

            // Calculate price change
            const previousPrice = currentNegotiation.currentOffer;
            const change = ((price - previousPrice) / previousPrice * 100).toFixed(0);
            const changeType = price > previousPrice ? 'increase' : 'decrease';
            const changeIcon = price > previousPrice ? '↗️' : '↘️';

            // Add to timeline
            const timelineItem = document.createElement('div');
            timelineItem.className = 'timeline-item transporter';
            timelineItem.style.animationDelay = '0.1s';
            timelineItem.innerHTML = `
                <div class="timeline-content">
                    <div class="timeline-header">
                        <div class="timeline-author">
                            🚚 Pierre L.
                            <span style="color: var(--gray); font-weight: 400;">
                                (<span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Transporteur</span>
                                <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Transporter</span>)
                            </span>
                        </div>
                        <div class="timeline-time">
                            <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">À l'instant</span>
                            <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Just now</span>
                        </div>
                    </div>
                    <div class="timeline-offer">
                        <div class="offer-amount">${price}€</div>
                        <div class="offer-change ${changeType}">
                            ${changeIcon} ${change > 0 ? '+' : ''}${change}%
                        </div>
                    </div>
                    ${message ? `<div class="timeline-message">"${message}"</div>` : ''}
                    <div class="timeline-actions">
                        <button class="btn btn-sm btn-success" onclick="acceptOffer(${price})">
                            ✅ <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Accepter</span>
                            <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Accept</span>
                        </button>
                        <button class="btn btn-sm btn-warning" onclick="counterOffer(${price})">
                            💬 <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Contre-offre</span>
                            <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Counter</span>
                        </button>
                    </div>
                </div>
            `;

            document.getElementById('timeline').appendChild(timelineItem);

            // Update current negotiation
            currentNegotiation.currentOffer = price;
            currentNegotiation.lastProposer = 'transporter';

            // Clear form
            document.getElementById('messageInput').value = '';

            // Show notification
            showToast('success',
                currentLang === 'fr' ? 'Proposition envoyée' : 'Proposal sent',
                currentLang === 'fr' ? `Votre offre de ${price}€ a été envoyée` : `Your offer of €${price} has been sent`
            );

            // Simulate response after delay
            setTimeout(() => {
                simulateResponse(price);
            }, 3000 + Math.random() * 5000); // 3-8 seconds
        }

        function simulateResponse(lastPrice) {
            // AI negotiation logic
            const responses = [
                { type: 'accept', probability: 0.2 },
                { type: 'counter', probability: 0.6 },
                { type: 'reject', probability: 0.2 }
            ];

            const random = Math.random();
            let cumulative = 0;
            let response;

            for (const r of responses) {
                cumulative += r.probability;
                if (random < cumulative) {
                    response = r.type;
                    break;
                }
            }

            if (response === 'accept') {
                showToast('success',
                    currentLang === 'fr' ? 'Offre acceptée!' : 'Offer accepted!',
                    currentLang === 'fr' ? `Sophie a accepté votre offre de ${lastPrice}€` : `Sophie accepted your offer of €${lastPrice}`
                );
                acceptNegotiation(lastPrice);
            } else if (response === 'counter') {
                const counterPrice = Math.round(lastPrice * (0.85 + Math.random() * 0.3));
                addCounterOffer(counterPrice);
            } else {
                showToast('warning',
                    currentLang === 'fr' ? 'Offre refusée' : 'Offer rejected',
                    currentLang === 'fr' ? 'Sophie a refusé votre offre' : 'Sophie rejected your offer'
                );
            }
        }

        function addCounterOffer(price) {
            const timelineItem = document.createElement('div');
            timelineItem.className = 'timeline-item sender';
            timelineItem.style.animationDelay = '0.1s';
            timelineItem.innerHTML = `
                <div class="timeline-content">
                    <div class="timeline-header">
                        <div class="timeline-author">
                            👤 Sophie M.
                            <span style="color: var(--gray); font-weight: 400;">
                                (<span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Expéditeur</span>
                                <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Sender</span>)
                            </span>
                        </div>
                        <div class="timeline-time">
                            <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">À l'instant</span>
                            <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Just now</span>
                        </div>
                    </div>
                    <div class="timeline-offer">
                        <div class="offer-amount">${price}€</div>
                    </div>
                    <div class="timeline-actions">
                        <button class="btn btn-sm btn-success" onclick="acceptOffer(${price})">
                            ✅ <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Accepter</span>
                            <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Accept</span>
                        </button>
                    </div>
                </div>
            `;

            document.getElementById('timeline').appendChild(timelineItem);

            showToast('info',
                currentLang === 'fr' ? 'Nouvelle contre-offre' : 'New counter-offer',
                currentLang === 'fr' ? `Sophie propose ${price}€` : `Sophie offers €${price}`
            );

            currentNegotiation.currentOffer = price;
            currentNegotiation.lastProposer = 'sender';
        }

        function acceptOffer(price) {
            if (!price) price = currentNegotiation.currentOffer;

            showModal(
                currentLang === 'fr' ? 'Confirmer l\'acceptation' : 'Confirm acceptance',
                currentLang === 'fr' ?
                    `Êtes-vous sûr de vouloir accepter cette offre de ${price}€?` :
                    `Are you sure you want to accept this offer of €${price}?`,
                () => acceptNegotiation(price)
            );
        }

        function acceptCurrentOffer() {
            acceptOffer(currentNegotiation.currentOffer);
        }

        function acceptNegotiation(price) {
            currentNegotiation.status = 'accepted';

            // Move to accepted tab
            document.querySelector('.status-badge').classList.remove('active');
            document.querySelector('.status-badge').classList.add('accepted');
            document.querySelector('.status-badge').innerHTML = `
                ✅ <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Négociation acceptée</span>
                <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Negotiation accepted</span>
            `;

            showToast('success',
                currentLang === 'fr' ? 'Négociation terminée!' : 'Negotiation completed!',
                currentLang === 'fr' ? `Accord trouvé à ${price}€` : `Agreement reached at €${price}`
            );

            closeModal();

            // Redirect to payment after delay
            setTimeout(() => {
                window.location.href = '/payment?negotiation=' + currentNegotiation.id + '&price=' + price;
            }, 2000);
        }

        function rejectOffer() {
            showModal(
                currentLang === 'fr' ? 'Confirmer le refus' : 'Confirm rejection',
                currentLang === 'fr' ?
                    'Êtes-vous sûr de vouloir refuser cette offre et annuler la négociation?' :
                    'Are you sure you want to reject this offer and cancel the negotiation?',
                () => rejectNegotiation()
            );
        }

        function rejectNegotiation() {
            currentNegotiation.status = 'rejected';

            document.querySelector('.status-badge').classList.remove('active');
            document.querySelector('.status-badge').classList.add('rejected');
            document.querySelector('.status-badge').innerHTML = `
                ❌ <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Négociation refusée</span>
                <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Negotiation rejected</span>
            `;

            showToast('error',
                currentLang === 'fr' ? 'Négociation annulée' : 'Negotiation cancelled',
                currentLang === 'fr' ? 'La négociation a été annulée' : 'The negotiation has been cancelled'
            );

            closeModal();
        }

        function expireNegotiation() {
            currentNegotiation.status = 'expired';

            document.querySelector('.status-badge').classList.remove('active');
            document.querySelector('.status-badge').classList.add('expired');
            document.querySelector('.status-badge').innerHTML = `
                ⏰ <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">Négociation expirée</span>
                <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Negotiation expired</span>
            `;

            showToast('warning',
                currentLang === 'fr' ? 'Négociation expirée' : 'Negotiation expired',
                currentLang === 'fr' ? 'Le délai de négociation a expiré' : 'The negotiation deadline has expired'
            );
        }

        function counterOffer(price) {
            document.getElementById('priceInput').value = Math.round(price * 0.9);
            updateProposalButton();
            document.getElementById('priceInput').focus();
        }

        // Chat Management
        function sendMessage() {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();

            if (!message) return;

            const chatContainer = document.getElementById('chatContainer');
            const messageDiv = document.createElement('div');
            messageDiv.className = 'chat-message sent';
            messageDiv.innerHTML = `
                <img src="https://ui-avatars.com/api/?name=Sophie+M&background=10b981&color=fff" class="chat-avatar">
                <div class="chat-bubble">
                    <div>${message}</div>
                    <div class="chat-time">
                        <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">À l'instant</span>
                        <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Just now</span>
                    </div>
                </div>
            `;

            chatContainer.appendChild(messageDiv);
            chatContainer.scrollTop = chatContainer.scrollHeight;
            input.value = '';

            // Simulate response
            setTimeout(() => {
                const responses = [
                    currentLang === 'fr' ?
                        "D'accord, je peux m'adapter à vos besoins." :
                        "Okay, I can adapt to your needs.",
                    currentLang === 'fr' ?
                        "C'est noté, je vais voir ce que je peux faire." :
                        "Noted, I'll see what I can do.",
                    currentLang === 'fr' ?
                        "Merci pour cette information." :
                        "Thank you for this information."
                ];

                const response = responses[Math.floor(Math.random() * responses.length)];

                const responseDiv = document.createElement('div');
                responseDiv.className = 'chat-message';
                responseDiv.innerHTML = `
                    <img src="https://ui-avatars.com/api/?name=Pierre+L&background=5046e5&color=fff" class="chat-avatar">
                    <div class="chat-bubble">
                        <div>${response}</div>
                        <div class="chat-time">
                            <span data-lang="fr" class="${currentLang === 'fr' ? 'active' : ''}">À l'instant</span>
                            <span data-lang="en" class="${currentLang === 'en' ? 'active' : ''}">Just now</span>
                        </div>
                    </div>
                `;

                chatContainer.appendChild(responseDiv);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }, 1000 + Math.random() * 2000);
        }

        // Toast Notifications
        function showToast(type, title, message) {
            const toast = document.getElementById('toast');
            const toastIcon = document.getElementById('toastIcon');
            const toastTitle = document.getElementById('toastTitle');
            const toastMessage = document.getElementById('toastMessage');

            // Set icon and style based on type
            toastIcon.className = `toast-icon ${type}`;
            if (type === 'success') {
                toastIcon.textContent = '✓';
            } else if (type === 'error') {
                toastIcon.textContent = '✕';
            } else if (type === 'warning') {
                toastIcon.textContent = '⚠';
            } else {
                toastIcon.textContent = 'ℹ';
            }

            toastTitle.textContent = title;
            toastMessage.textContent = message;

            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        }

        // Modal Management
        function showModal(title, message, onConfirm) {
            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            const modalConfirm = document.getElementById('modalConfirm');

            modalTitle.textContent = title;
            modalBody.textContent = message;

            modalConfirm.onclick = onConfirm;

            modal.classList.add('show');
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('show');
        }

        // Badge Count Updates
        function updateBadgeCounts() {
            // document.getElementById('activeCount').textContent = '3';
            // document.getElementById('acceptedCount').textContent = '5';
            // document.getElementById('rejectedCount').textContent = '2';
            // document.getElementById('expiredCount').textContent = '1';
        }

        // Initialization
        document.addEventListener('DOMContentLoaded', function() {
            switchLanguage(currentLang);
            startTimer();
            updateBadgeCounts();

            // Price input listener
            document.getElementById('priceInput').addEventListener('input', updateProposalButton);

            // Initialize first proposal button text
            updateProposalButton();

            // Close modal on background click
            document.getElementById('modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            // Close toast on click
            document.getElementById('toast').addEventListener('click', function() {
                this.classList.remove('show');
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Simulate real-time updates
        function simulateRealTimeUpdates() {
            setInterval(() => {
                // Simulate random events
                const events = ['new_offer', 'price_update', 'message'];
                const event = events[Math.floor(Math.random() * events.length)];

                if (Math.random() < 0.1) { // 10% chance every interval
                    switch(event) {
                        case 'new_offer':
                            // Could trigger notification for new offer
                            break;
                        case 'price_update':
                            // Could update price statistics
                            break;
                        case 'message':
                            // Could show new message notification
                            break;
                    }
                }
            }, 30000); // Check every 30 seconds
        }

        // Start real-time simulation
        simulateRealTimeUpdates();
    </script>
</body>
</html>
