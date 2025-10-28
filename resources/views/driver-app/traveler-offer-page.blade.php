<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendre mon espace bagage - Je confie</title>
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
        }

        .nav-actions {
            display: flex;
            gap: 16px;
            align-items: center;
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

        /* Main Container */
        .main-container {
            max-width: 1280px;
            margin: 100px auto 40px;
            padding: 0 20px;
        }

        /* Language Content */
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: inline-block;
        }

        /* Header Section */
        .page-header {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: var(--radius-xl);
            padding: 40px;
            color: white;
            text-align: center;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 35px,
                rgba(255,255,255,.05) 35px,
                rgba(255,255,255,.05) 70px
            );
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 16px;
            position: relative;
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.95;
            position: relative;
        }

        /* Form Container */
        .form-container {
            background: white;
            border-radius: var(--radius-xl);
            padding: 40px;
            box-shadow: var(--shadow);
            margin-bottom: 32px;
        }

        /* Progress Steps */
        .progress-container {
            margin-bottom: 40px;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--border);
            z-index: 1;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            height: 2px;
            background: var(--primary);
            z-index: 2;
            transition: width 0.3s ease;
        }

        .step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 3;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 2px solid var(--border);
            margin: 0 auto 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .step.active .step-circle {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .step.completed .step-circle {
            background: var(--success);
            border-color: var(--success);
            color: white;
        }

        .step-title {
            font-size: 14px;
            color: var(--gray);
            font-weight: 500;
        }

        .step.active .step-title {
            color: var(--primary);
            font-weight: 600;
        }

        /* Form Sections */
        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .form-label .required {
            color: var(--danger);
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80, 70, 229, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-helper {
            font-size: 13px;
            color: var(--gray);
            margin-top: 4px;
        }

        /* Transport Type Selector */
        .transport-types {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .transport-type {
            padding: 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .transport-type:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .transport-type.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .transport-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .transport-name {
            font-size: 13px;
            font-weight: 600;
        }

        /* Company Grid */
        .company-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 12px;
            max-height: 300px;
            overflow-y: auto;
            padding: 12px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            margin-top: 12px;
        }

        .company-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 12px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .company-item:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .company-item.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .company-logo {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .company-name {
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }

        /* Verification Section */
        .verification-section {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
        }

        .verification-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .verification-icon {
            width: 48px;
            height: 48px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .verification-title {
            flex: 1;
        }

        .verification-title h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .verification-title p {
            font-size: 14px;
            color: var(--gray);
        }

        .verification-status {
            padding: 8px 16px;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 600;
        }

        .verification-status.pending {
            background: var(--warning);
            color: white;
        }

        .verification-status.success {
            background: var(--success);
            color: white;
        }

        .verification-status.error {
            background: var(--danger);
            color: white;
        }

        /* Package Categories */
        .package-categories {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .package-category {
            padding: 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
        }

        .package-category:hover {
            border-color: var(--primary);
        }

        .package-category.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .category-icon {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .category-name {
            font-size: 14px;
            font-weight: 600;
        }

        /* Subcategories Panel */
        .subcategories-panel {
            background: var(--light);
            border: 2px solid var(--primary);
            border-radius: var(--radius);
            padding: 16px;
            margin-bottom: 16px;
        }

        .subcategories-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .subcategories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 8px;
        }

        .subcategory-item {
            padding: 8px 12px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .subcategory-item:hover {
            background: var(--primary-light);
            color: white;
        }

        .subcategory-item.selected {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Prohibited Items */
        .prohibited-section {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border: 2px solid var(--danger);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 24px;
        }

        .prohibited-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            color: var(--danger);
            margin-bottom: 12px;
        }

        .prohibited-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .prohibited-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--dark);
        }

        /* Price Simulator Section */
        .simulator-section {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: var(--radius-xl);
            padding: 32px;
            margin: 32px 0;
        }

        .simulator-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .simulator-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .simulator-subtitle {
            color: var(--gray);
        }

        .simulator-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }

        .simulator-inputs {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
        }

        .simulator-results {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
        }

        .price-display {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: var(--radius-lg);
            padding: 24px;
            text-align: center;
            color: white;
            margin-bottom: 24px;
        }

        .price-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        .price-main {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .price-range {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Price Breakdown */
        .price-breakdown {
            background: var(--light);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 20px;
        }

        .breakdown-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
            font-size: 16px;
        }

        .breakdown-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
        }

        .breakdown-item:last-child {
            border-bottom: none;
            padding-top: 16px;
            margin-top: 8px;
            border-top: 2px solid var(--border);
            font-weight: 700;
        }

        .breakdown-label {
            color: var(--gray);
            font-size: 14px;
        }

        .breakdown-value {
            font-weight: 600;
            color: var(--dark);
        }

        .breakdown-item.vat-exempt {
            opacity: 0.6;
            font-style: italic;
        }

        /* Price Choice Section */
        .price-choice-section {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-top: 24px;
            border: 2px solid var(--primary);
        }

        .price-choice-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .price-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }

        .price-option {
            padding: 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .price-option:hover {
            border-color: var(--primary);
        }

        .price-option.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .price-option-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .price-option-label {
            font-size: 13px;
        }

        .custom-price-input {
            display: none;
            margin-top: 16px;
        }

        .custom-price-input.active {
            display: block;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 2px solid var(--border);
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
            text-decoration: none;
        }

        .btn-secondary {
            background: white;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--light);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
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

        /* Success Message */
        .success-message {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            border: 2px solid var(--success);
            border-radius: var(--radius-lg);
            padding: 24px;
            text-align: center;
            margin-bottom: 24px;
        }

        .success-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .success-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .success-text {
            color: var(--gray);
            margin-bottom: 16px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .simulator-grid {
                grid-template-columns: 1fr;
            }

            .transport-types {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-container {
                margin-top: 80px;
            }

            .form-container {
                padding: 20px;
            }

            .package-categories {
                grid-template-columns: repeat(2, 1fr);
            }

            .price-options {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
                gap: 12px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .prohibited-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.75rem;
            }

            .transport-types {
                grid-template-columns: repeat(2, 1fr);
            }

            .company-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .subcategories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="logo">
                <div class="logo-icon">JC</div>
                <span class="logo-text">Je confie</span>
            </a>
            
            <div class="nav-actions">
                <div class="language-switcher">
                    <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                    <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>
                ✈️ <span class="lang-content fr active">Je voyage - Vendre mon espace bagage</span>
                <span class="lang-content en">I'm traveling - Sell my luggage space</span>
            </h1>
            <p>
                <span class="lang-content fr active">
                    Rentabilisez votre voyage en transportant des colis. Gagnez jusqu'à 500€ par voyage !
                </span>
                <span class="lang-content en">
                    Monetize your trip by transporting packages. Earn up to €500 per trip!
                </span>
            </p>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <!-- Progress Steps -->
            <div class="progress-container">
                <div class="progress-steps">
                    <div class="progress-line" id="progressLine" style="width: 0%"></div>
                    <div class="step active" data-step="1">
                        <div class="step-circle">1</div>
                        <div class="step-title">Transport</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-circle">2</div>
                        <div class="step-title">Trajet</div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-circle">3</div>
                        <div class="step-title">Capacité</div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-circle">4</div>
                        <div class="step-title">Simulateur</div>
                    </div>
                    <div class="step" data-step="5">
                        <div class="step-circle">5</div>
                        <div class="step-title">Prix & Options</div>
                    </div>
                    <div class="step" data-step="6">
                        <div class="step-circle">6</div>
                        <div class="step-title">Confirmation</div>
                    </div>
                </div>
            </div>

            <!-- Step 1: Transport Type -->
            <div class="form-section active" id="step1">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Choisissez votre mode de transport</span>
                    <span class="lang-content en">Choose your transport mode</span>
                </h2>
                
                <div class="transport-types">
                    <div class="transport-type" onclick="selectTransport('plane')">
                        <div class="transport-icon">✈️</div>
                        <div class="transport-name">
                            <span class="lang-content fr active">Avion</span>
                            <span class="lang-content en">Plane</span>
                        </div>
                    </div>
                    <div class="transport-type" onclick="selectTransport('train')">
                        <div class="transport-icon">🚄</div>
                        <div class="transport-name">
                            <span class="lang-content fr active">Train</span>
                            <span class="lang-content en">Train</span>
                        </div>
                    </div>
                    <div class="transport-type" onclick="selectTransport('bus')">
                        <div class="transport-icon">🚌</div>
                        <div class="transport-name">
                            <span class="lang-content fr active">Bus</span>
                            <span class="lang-content en">Bus</span>
                        </div>
                    </div>
                    <div class="transport-type" onclick="selectTransport('boat')">
                        <div class="transport-icon">🚢</div>
                        <div class="transport-name">
                            <span class="lang-content fr active">Bateau</span>
                            <span class="lang-content en">Boat</span>
                        </div>
                    </div>
                </div>

                <!-- Company Selection -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Compagnie / Agence de voyage</span>
                        <span class="lang-content en">Company / Travel Agency</span>
                        <span class="required">*</span>
                    </label>
                    <input type="text" class="form-input" id="companySearch" placeholder="Rechercher une compagnie..." oninput="filterCompanies(this.value)">
                    <div class="company-grid" id="companyGrid">
                        <!-- Companies will be populated dynamically -->
                    </div>
                </div>

                <!-- Enhanced Ticket Verification -->
                <div class="verification-section">
                    <div class="verification-header">
                        <div class="verification-icon">🎫</div>
                        <div class="verification-title">
                            <h3>
                                <span class="lang-content fr active">Vérification du billet</span>
                                <span class="lang-content en">Ticket verification</span>
                            </h3>
                            <p>
                                <span class="lang-content fr active">Système de vérification automatique selon votre type de transport</span>
                                <span class="lang-content en">Automatic verification system based on your transport type</span>
                            </p>
                        </div>
                        <div class="verification-status pending" id="ticketStatus">
                            <span class="lang-content fr active">En attente</span>
                            <span class="lang-content en">Pending</span>
                        </div>
                    </div>
                    
                    <div style="display: grid; gap: 16px; margin-top: 20px;">
                        <div>
                            <label class="form-label">
                                <span class="lang-content fr active">Nom sur le billet</span>
                                <span class="lang-content en">Name on ticket</span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input" id="ticketName" placeholder="Nom et prénom comme sur le billet">
                        </div>

                        <div>
                            <label class="form-label">
                                <span class="lang-content fr active">Référence / Numéro de billet</span>
                                <span class="lang-content en">Reference / Ticket number</span>
                                <span class="required">*</span>
                            </label>
                            <div id="verificationFields">
                                <!-- Dynamic fields based on transport type -->
                            </div>
                        </div>

                        <button class="btn btn-primary" style="width: 100%;" onclick="verifyTicket()">
                            <span class="lang-content fr active">Vérifier automatiquement</span>
                            <span class="lang-content en">Verify automatically</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 2: Route -->
            <div class="form-section" id="step2">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Définissez votre trajet</span>
                    <span class="lang-content en">Define your route</span>
                </h2>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Ville de départ</span>
                            <span class="lang-content en">Departure city</span>
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-input" id="departureCity" placeholder="Paris, Lyon, Marseille...">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Ville d'arrivée</span>
                            <span class="lang-content en">Arrival city</span>
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-input" id="arrivalCity" placeholder="New York, Londres, Dakar...">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Date et heure de départ</span>
                            <span class="lang-content en">Departure date and time</span>
                            <span class="required">*</span>
                        </label>
                        <input type="datetime-local" class="form-input" id="departureDate">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Date et heure d'arrivée estimée</span>
                            <span class="lang-content en">Estimated arrival date and time</span>
                            <span class="required">*</span>
                        </label>
                        <input type="datetime-local" class="form-input" id="arrivalDate">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Numéro de vol/train/bus</span>
                        <span class="lang-content en">Flight/train/bus number</span>
                    </label>
                    <input type="text" class="form-input" id="transportNumber" placeholder="Ex: AF022 ou TGV 6201">
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Date d'expiration de l'annonce</span>
                        <span class="lang-content en">Listing expiration date</span>
                        <span class="required">*</span>
                    </label>
                    <input type="datetime-local" class="form-input" id="expirationDate">
                    <div class="form-helper">
                        <span class="lang-content fr active">L'annonce sera automatiquement fermée à cette date</span>
                        <span class="lang-content en">The listing will be automatically closed on this date</span>
                    </div>
                </div>
            </div>

            <!-- Step 3: Capacity -->
            <div class="form-section" id="step3">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Votre capacité de transport</span>
                    <span class="lang-content en">Your transport capacity</span>
                </h2>
                
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Espace bagage disponible (kg)</span>
                        <span class="lang-content en">Available luggage space (kg)</span>
                        <span class="required">*</span>
                    </label>
                    <input type="number" class="form-input" id="availableWeight" placeholder="Ex: 10, 20, 30" max="30" min="1">
                    <div class="form-helper">
                        <span class="lang-content fr active">Maximum 30 kg pour les bagages en soute</span>
                        <span class="lang-content en">Maximum 30 kg for checked luggage</span>
                    </div>
                </div>
                
                <!-- Package Categories with Subcategories -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Types de colis que vous acceptez</span>
                        <span class="lang-content en">Package types you accept</span>
                        <span class="required">*</span>
                    </label>
                    <div class="package-categories">
                        <div class="package-category" onclick="toggleCategory(this, 'documents')">
                            <div class="category-icon">📄</div>
                            <div class="category-name">Documents</div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'electronics')">
                            <div class="category-icon">💻</div>
                            <div class="category-name">Électronique</div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'clothes')">
                            <div class="category-icon">👕</div>
                            <div class="category-name">Vêtements</div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'gifts')">
                            <div class="category-icon">🎁</div>
                            <div class="category-name">Cadeaux</div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'food')">
                            <div class="category-icon">🍽️</div>
                            <div class="category-name">Alimentation</div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'other')">
                            <div class="category-icon">📦</div>
                            <div class="category-name">Autre</div>
                        </div>
                    </div>
                </div>

                <!-- Subcategories Container -->
                <div id="subcategoriesContainer">
                    <!-- Subcategories will be dynamically added here -->
                </div>

                <!-- Prohibited Items -->
                <div class="prohibited-section">
                    <div class="prohibited-title">
                        ⚠️ <span class="lang-content fr active">Articles interdits (ne jamais accepter)</span>
                        <span class="lang-content en">Prohibited items (never accept)</span>
                    </div>
                    <div class="prohibited-grid">
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Armes et munitions</span><span class="lang-content en">Weapons and ammunition</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Drogues et stupéfiants</span><span class="lang-content en">Drugs and narcotics</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Matières explosives</span><span class="lang-content en">Explosive materials</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Produits chimiques dangereux</span><span class="lang-content en">Dangerous chemicals</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Animaux vivants</span><span class="lang-content en">Live animals</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Objets contrefaits</span><span class="lang-content en">Counterfeit items</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Espèces et devises > 10000€</span><span class="lang-content en">Cash and currencies > €10000</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Matières radioactives</span><span class="lang-content en">Radioactive materials</span></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Dimensions maximales acceptées</span>
                        <span class="lang-content en">Maximum accepted dimensions</span>
                    </label>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                        <input type="number" class="form-input" id="maxLength" placeholder="Longueur (cm)">
                        <input type="number" class="form-input" id="maxWidth" placeholder="Largeur (cm)">
                        <input type="number" class="form-input" id="maxHeight" placeholder="Hauteur (cm)">
                    </div>
                </div>
            </div>

            <!-- Step 4: Price Simulator -->
            <div class="form-section" id="step4">
                <div class="simulator-section">
                    <div class="simulator-header">
                        <h2 class="simulator-title">
                            💰 <span class="lang-content fr active">Simulateur de prix intelligent</span>
                            <span class="lang-content en">Smart price simulator</span>
                        </h2>
                        <p class="simulator-subtitle">
                            <span class="lang-content fr active">Optimisez vos revenus avec notre calculateur avancé</span>
                            <span class="lang-content en">Optimize your income with our advanced calculator</span>
                        </p>
                    </div>

                    <div class="simulator-grid">
                        <!-- Simulator Inputs -->
                        <div class="simulator-inputs">
                            <h3 style="margin-bottom: 20px;">
                                <span class="lang-content fr active">Paramètres de calcul</span>
                                <span class="lang-content en">Calculation parameters</span>
                            </h3>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Distance estimée (km)</span>
                                    <span class="lang-content en">Estimated distance (km)</span>
                                </label>
                                <input type="number" class="form-input" id="simDistance" placeholder="470" onchange="calculatePrice()">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Type de trajet</span>
                                    <span class="lang-content en">Route type</span>
                                </label>
                                <select class="form-select" id="routeType" onchange="calculatePrice()">
                                    <option value="domestic">National</option>
                                    <option value="european">Europe</option>
                                    <option value="international">International</option>
                                    <option value="intercontinental">Intercontinental</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Popularité de la route</span>
                                    <span class="lang-content en">Route popularity</span>
                                </label>
                                <select class="form-select" id="routePopularity" onchange="calculatePrice()">
                                    <option value="low">Faible demande</option>
                                    <option value="medium">Demande moyenne</option>
                                    <option value="high">Forte demande</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Délai avant départ</span>
                                    <span class="lang-content en">Time before departure</span>
                                </label>
                                <select class="form-select" id="timeBeforeDeparture" onchange="calculatePrice()">
                                    <option value="urgent">< 24h (Urgent)</option>
                                    <option value="short">1-3 jours</option>
                                    <option value="medium">4-7 jours</option>
                                    <option value="long">> 7 jours</option>
                                </select>
                            </div>
                        </div>

                        <!-- Simulator Results -->
                        <div class="simulator-results">
                            <div class="price-display">
                                <div class="price-label">
                                    <span class="lang-content fr active">Prix suggéré par kg</span>
                                    <span class="lang-content en">Suggested price per kg</span>
                                </div>
                                <div class="price-main" id="suggestedPrice">12€</div>
                                <div class="price-range">
                                    <span class="lang-content fr active">Fourchette: 10€ - 15€</span>
                                    <span class="lang-content en">Range: €10 - €15</span>
                                </div>
                            </div>

                            <div class="price-breakdown">
                                <div class="breakdown-title">
                                    <span class="lang-content fr active">Détail du calcul</span>
                                    <span class="lang-content en">Calculation details</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Prix de base</span>
                                        <span class="lang-content en">Base price</span>
                                    </span>
                                    <span class="breakdown-value" id="basePrice">8€/kg</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Ajustement distance</span>
                                        <span class="lang-content en">Distance adjustment</span>
                                    </span>
                                    <span class="breakdown-value" id="distanceAdjust">+2€/kg</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Demande sur la route</span>
                                        <span class="lang-content en">Route demand</span>
                                    </span>
                                    <span class="breakdown-value" id="demandAdjust">+1€/kg</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Urgence</span>
                                        <span class="lang-content en">Urgency</span>
                                    </span>
                                    <span class="breakdown-value" id="urgencyAdjust">+1€/kg</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Commission plateforme</span>
                                        <span class="lang-content en">Platform commission</span>
                                    </span>
                                    <span class="breakdown-value" id="commission">-15%</span>
                                </div>
                                <div class="breakdown-item vat-exempt">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">TVA (exonérée*)</span>
                                        <span class="lang-content en">VAT (exempted*)</span>
                                    </span>
                                    <span class="breakdown-value">20%</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <strong>
                                            <span class="lang-content fr active">Votre gain net</span>
                                            <span class="lang-content en">Your net earnings</span>
                                        </strong>
                                    </span>
                                    <span class="breakdown-value" id="netEarnings">10.2€/kg</span>
                                </div>
                            </div>

                            <div style="background: #fef3c7; padding: 12px; border-radius: 8px; margin-top: 16px;">
                                <p style="font-size: 12px; color: #92400e;">
                                    <span class="lang-content fr active">
                                        * TVA affichée à titre indicatif. Actuellement exonérée car le CA < 25 000€
                                    </span>
                                    <span class="lang-content en">
                                        * VAT shown for information only. Currently exempted as revenue < €25,000
                                    </span>
                                </p>
                            </div>

                            <div style="margin-top: 20px; padding: 16px; background: var(--light); border-radius: var(--radius);">
                                <h4 style="margin-bottom: 12px;">
                                    <span class="lang-content fr active">💡 Gains potentiels totaux</span>
                                    <span class="lang-content en">💡 Total potential earnings</span>
                                </h4>
                                <p style="font-size: 24px; font-weight: 700; color: var(--success);" id="totalPotentialEarnings">
                                    240€
                                </p>
                                <p style="font-size: 13px; color: var(--gray);">
                                    <span class="lang-content fr active">Pour 20 kg transportés</span>
                                    <span class="lang-content en">For 20 kg transported</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5: Price Choice & Options -->
            <div class="form-section" id="step5">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Fixez votre prix et options</span>
                    <span class="lang-content en">Set your price and options</span>
                </h2>

                <div class="price-choice-section">
                    <h3 class="price-choice-title">
                        <span class="lang-content fr active">💰 Choisissez votre prix par kilogramme</span>
                        <span class="lang-content en">💰 Choose your price per kilogram</span>
                    </h3>
                    
                    <div class="price-options">
                        <div class="price-option" onclick="selectPriceOption(this, 'suggested')">
                            <div class="price-option-value" id="suggestedPriceOption">12€/kg</div>
                            <div class="price-option-label">
                                <span class="lang-content fr active">Prix suggéré</span>
                                <span class="lang-content en">Suggested price</span>
                            </div>
                        </div>
                        <div class="price-option" onclick="selectPriceOption(this, 'custom')">
                            <div class="price-option-value">?€/kg</div>
                            <div class="price-option-label">
                                <span class="lang-content fr active">Prix personnalisé</span>
                                <span class="lang-content en">Custom price</span>
                            </div>
                        </div>
                    </div>

                    <div class="custom-price-input" id="customPriceInput">
                        <label class="form-label">
                            <span class="lang-content fr active">Votre prix par kg (€)</span>
                            <span class="lang-content en">Your price per kg (€)</span>
                        </label>
                        <input type="number" class="form-input" id="customPrice" placeholder="Ex: 15" min="1">
                        <div class="form-helper">
                            <span class="lang-content fr active">Vous êtes libre de fixer votre prix</span>
                            <span class="lang-content en">You are free to set your price</span>
                        </div>
                    </div>
                </div>

                <!-- Service Options -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Options de remise</span>
                        <span class="lang-content en">Handover options</span>
                    </label>
                    <div style="display: grid; gap: 12px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" checked>
                            <span>
                                <span class="lang-content fr active">🛏️ Remise en main propre à l'aéroport/gare</span>
                                <span class="lang-content en">🛏️ Hand delivery at airport/station</span>
                            </span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox">
                            <span>
                                <span class="lang-content fr active">🏠 Je peux me déplacer (+10€)</span>
                                <span class="lang-content en">🏠 I can travel (+€10)</span>
                            </span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox">
                            <span>
                                <span class="lang-content fr active">📮 Livraison postale (+15€)</span>
                                <span class="lang-content en">📮 Postal delivery (+€15)</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Insurance -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Assurance expédition</span>
                        <span class="lang-content en">Shipping insurance</span>
                    </label>
                    <select class="form-select" id="insurance">
                        <option value="basic">Basique (500€) - Inclus</option>
                        <option value="standard" selected>Standard (1500€) - +8€</option>
                        <option value="premium">Premium (3000€) - +15€</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Informations complémentaires (optionnel)</span>
                        <span class="lang-content en">Additional information (optional)</span>
                    </label>
                    <textarea class="form-textarea" placeholder="Ex: Je voyage souvent sur cette ligne, j'ai l'habitude des contrôles douaniers, etc."></textarea>
                </div>
            </div>

            <!-- Step 6: Payment & Confirmation -->
            <div class="form-section" id="step6">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Paiement et confirmation</span>
                    <span class="lang-content en">Payment and confirmation</span>
                </h2>

                <!-- Offer Summary -->
                <div style="background: var(--light); padding: 24px; border-radius: var(--radius); margin-bottom: 24px;">
                    <h3 style="margin-bottom: 16px;">
                        <span class="lang-content fr active">📋 Récapitulatif de votre offre</span>
                        <span class="lang-content en">📋 Offer summary</span>
                    </h3>
                    <div id="offerSummary">
                        <!-- Summary will be populated dynamically -->
                    </div>
                </div>

                <!-- Financial Details -->
                <div class="price-breakdown">
                    <div class="breakdown-title">
                        <span class="lang-content fr active">Détail financier</span>
                        <span class="lang-content en">Financial details</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Prix choisi par kg</span>
                            <span class="lang-content en">Chosen price per kg</span>
                        </span>
                        <span class="breakdown-value" id="finalPricePerKg">12€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Capacité totale</span>
                            <span class="lang-content en">Total capacity</span>
                        </span>
                        <span class="breakdown-value" id="finalCapacity">20 kg</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Revenus bruts potentiels</span>
                            <span class="lang-content en">Potential gross income</span>
                        </span>
                        <span class="breakdown-value" id="grossIncome">240€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Commission plateforme</span>
                            <span class="lang-content en">Platform commission</span>
                        </span>
                        <span class="breakdown-value" id="finalCommission">-36€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Frais de transaction</span>
                            <span class="lang-content en">Transaction fees</span>
                        </span>
                        <span class="breakdown-value" id="transactionFees">-2.4€</span>
                    </div>
                    <div class="breakdown-item vat-exempt">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">TVA (20% - exonérée*)</span>
                            <span class="lang-content en">VAT (20% - exempted*)</span>
                        </span>
                        <span class="breakdown-value">0€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <strong>
                                <span class="lang-content fr active">Vos gains nets estimés</span>
                                <span class="lang-content en">Your estimated net earnings</span>
                            </strong>
                        </span>
                        <span class="breakdown-value" style="color: var(--success); font-size: 1.25rem;" id="netIncome">201.6€</span>
                    </div>
                </div>

                <div style="background: #fef3c7; padding: 12px; border-radius: 8px; margin: 16px 0;">
                    <p style="font-size: 12px; color: #92400e;">
                        <span class="lang-content fr active">
                            * TVA exonérée (CA < 25 000€). Les frais de transaction varient selon le mode de paiement choisi par l'expéditeur.
                        </span>
                        <span class="lang-content en">
                            * VAT exempted (revenue < €25,000). Transaction fees vary based on the payment method chosen by the shipper.
                        </span>
                    </p>
                </div>

                <!-- Expiration Date -->
                <div class="form-group" style="background: white; padding: 20px; border-radius: var(--radius); border: 2px solid var(--warning);">
                    <label class="form-label">
                        ⏰ <span class="lang-content fr active">Date d'expiration de l'offre</span>
                        <span class="lang-content en">Offer expiration date</span>
                        <span class="required">*</span>
                    </label>
                    <input type="datetime-local" class="form-input" id="offerExpiration" required>
                    <div class="form-helper">
                        <span class="lang-content fr active">L'offre sera automatiquement retirée après cette date</span>
                        <span class="lang-content en">The offer will be automatically removed after this date</span>
                    </div>
                </div>

                <!-- Payment Gateway -->
                <div style="background: linear-gradient(135deg, #f0f9ff, #e0f2fe); padding: 24px; border-radius: var(--radius-lg); margin-top: 24px;">
                    <h3 style="margin-bottom: 20px;">
                        💳 <span class="lang-content fr active">Modes de paiement acceptés pour vos clients</span>
                        <span class="lang-content en">Payment methods accepted for your customers</span>
                    </h3>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 20px;">
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">Visa</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 1.4%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">Mastercard</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 1.4%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">CB</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 1.2%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">Amex</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 2.5%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">🍎</div>
                            <div style="font-size: 12px; font-weight: 600;">Apple Pay</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 1.5%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">🇬</div>
                            <div style="font-size: 12px; font-weight: 600;">Google Pay</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 1.5%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">🅿️</div>
                            <div style="font-size: 12px; font-weight: 600;">PayPal</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 2.9%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--success);">
                            <div style="font-size: 32px; margin-bottom: 8px;">💶</div>
                            <div style="font-size: 12px; font-weight: 600;">Virement</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: 0%</div>
                        </div>
                    </div>

                    <div style="background: white; padding: 16px; border-radius: var(--radius);">
                        <p style="font-size: 13px; color: var(--gray);">
                            <span class="lang-content fr active">
                                ✅ Paiements sécurisés • ✅ Protection des données • ✅ Remboursement garanti
                            </span>
                            <span class="lang-content en">
                                ✅ Secure payments • ✅ Data protection • ✅ Guaranteed refund
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Terms Acceptance -->
                <div style="margin-top: 24px; padding: 20px; background: white; border-radius: var(--radius); border: 2px solid var(--border);">
                    <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                        <input type="checkbox" id="acceptTerms" style="margin-top: 2px;" required>
                        <span style="font-size: 14px;">
                            <span class="lang-content fr active">
                                J'accepte les <a href="#" style="color: var(--primary);">conditions générales d'utilisation</a> et confirme que mon billet de transport est valide. Je comprends que les frais de commission et de transaction seront déduits de mes gains.
                            </span>
                            <span class="lang-content en">
                                I accept the <a href="#" style="color: var(--primary);">terms and conditions</a> and confirm that my transport ticket is valid. I understand that commission and transaction fees will be deducted from my earnings.
                            </span>
                        </span>
                    </label>
                </div>

                <!-- Invoice Notice -->
                <div style="background: #ecfdf5; padding: 16px; border-radius: var(--radius); margin-top: 16px;">
                    <p style="font-size: 14px; color: #065f46;">
                        📧 <span class="lang-content fr active">
                            Une facture détaillée sera envoyée à votre adresse email après chaque transaction
                        </span>
                        <span class="lang-content en">
                            A detailed invoice will be sent to your email address after each transaction
                        </span>
                    </p>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="previousStep()">
                    <span class="lang-content fr active">← Retour</span>
                    <span class="lang-content en">← Back</span>
                </button>
                <button class="btn btn-primary" onclick="nextStep()" id="nextBtn">
                    <span class="lang-content fr active">Continuer →</span>
                    <span class="lang-content en">Continue →</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        // Global state
        let currentStep = 1;
        const totalSteps = 6;
        let selectedTransport = null;
        let selectedCompany = null;
        let selectedCategories = [];
        let selectedSubcategories = {};
        let selectedPriceOption = null;
        let suggestedPrice = 12;

        // Transport companies data
        const transportCompanies = {
            plane: [
                {name: 'Air France', logo: '🇫🇷', type: 'company'},
                {name: 'Royal Air Maroc', logo: '🇲🇦', type: 'company'},
                {name: 'Turkish Airlines', logo: '🇹🇷', type: 'company'},
                {name: 'Emirates', logo: '🇦🇪', type: 'company'},
                {name: 'Lufthansa', logo: '🇩🇪', type: 'company'}
            ],
            train: [
                {name: 'SNCF', logo: '🚄', type: 'company'},
                {name: 'Eurostar', logo: '⭐', type: 'company'},
                {name: 'Thalys', logo: '🚅', type: 'company'}
            ],
            bus: [
                {name: 'FlixBus', logo: '🚌', type: 'company'},
                {name: 'BlaBlaBus', logo: '🚐', type: 'company'},
                {name: 'Eurolines', logo: '🚌', type: 'company'}
            ],
            boat: [
                {name: 'Corsica Ferries', logo: '⛴️', type: 'company'},
                {name: 'Brittany Ferries', logo: '🚢', type: 'company'}
            ]
        };

        // Subcategories data
        const subcategoriesData = {
            'documents': {
                'fr': ['Passeports', 'Diplômes', 'Contrats', 'Documents administratifs', 'Livres', 'Papiers importants'],
                'en': ['Passports', 'Diplomas', 'Contracts', 'Administrative documents', 'Books', 'Important papers']
            },
            'electronics': {
                'fr': ['Ordinateurs portables', 'Tablettes', 'Téléphones', 'Appareils photo', 'Écouteurs', 'Petits appareils'],
                'en': ['Laptops', 'Tablets', 'Phones', 'Cameras', 'Headphones', 'Small devices']
            },
            'clothes': {
                'fr': ['Vêtements', 'Chaussures', 'Accessoires', 'Sacs', 'Textiles'],
                'en': ['Clothes', 'Shoes', 'Accessories', 'Bags', 'Textiles']
            },
            'gifts': {
                'fr': ['Cadeaux emballés', 'Souvenirs', 'Artisanat', 'Bijoux', 'Parfums'],
                'en': ['Wrapped gifts', 'Souvenirs', 'Crafts', 'Jewelry', 'Perfumes']
            },
            'food': {
                'fr': ['Produits secs', 'Conserves', 'Épices', 'Café/Thé', 'Chocolat', 'Produits locaux (non périssables)'],
                'en': ['Dry goods', 'Canned goods', 'Spices', 'Coffee/Tea', 'Chocolate', 'Local products (non-perishable)']
            },
            'other': {
                'fr': ['Instruments de musique', 'Matériel médical léger', 'Équipement sportif léger'],
                'en': ['Musical instruments', 'Light medical equipment', 'Light sports equipment']
            }
        };

        // Language switcher
        function switchLanguage(lang) {
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            event.currentTarget.classList.add('active');
            
            document.querySelectorAll('.lang-content').forEach(content => {
                content.classList.remove('active');
                if (content.classList.contains(lang)) {
                    content.classList.add('active');
                }
            });
            
            localStorage.setItem('preferredLanguage', lang);
        }

        // Initialize language
        document.addEventListener('DOMContentLoaded', function() {
            const preferredLang = localStorage.getItem('preferredLanguage') || 'fr';
            const langBtn = document.querySelector(`.lang-btn[onclick="switchLanguage('${preferredLang}')"]`);
            if (langBtn) {
                langBtn.click();
            }
        });

        // Transport selection
        function selectTransport(type) {
            selectedTransport = type;
            
            document.querySelectorAll('.transport-type').forEach(t => {
                t.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');
            
            loadCompanies(type);
            updateVerificationFields(type);
        }

        // Load companies
        function loadCompanies(transportType) {
            const grid = document.getElementById('companyGrid');
            if (grid && transportCompanies[transportType]) {
                const companies = transportCompanies[transportType];
                grid.innerHTML = companies.map(c => `
                    <div class="company-item" onclick="selectCompany('${c.name}')">
                        <div class="company-logo">${c.logo}</div>
                        <div class="company-name">${c.name}</div>
                    </div>
                `).join('');
            }
        }

        // Filter companies
        function filterCompanies(searchTerm) {
            const items = document.querySelectorAll('.company-item');
            items.forEach(item => {
                const name = item.querySelector('.company-name').textContent.toLowerCase();
                if (name.includes(searchTerm.toLowerCase())) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Select company
        function selectCompany(name) {
            selectedCompany = name;
            
            document.querySelectorAll('.company-item').forEach(item => {
                item.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');
        }

        // Update verification fields
        function updateVerificationFields(transportType) {
            const verificationFields = document.getElementById('verificationFields');
            if (!verificationFields) return;
            
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            let fieldsHTML = '';
            
            switch(transportType) {
                case 'plane':
                    fieldsHTML = `
                        <input type="text" class="form-input" id="ticketReference" 
                               placeholder="${lang === 'fr' ? 'Ex: ABC123 (PNR) ou numéro e-billet' : 'Ex: ABC123 (PNR) or e-ticket number'}">
                        <div class="form-helper">
                            ${lang === 'fr' ? 'Format: 6 caractères alphanumériques' : 'Format: 6 alphanumeric characters'}
                        </div>
                    `;
                    break;
                case 'train':
                    fieldsHTML = `
                        <input type="text" class="form-input" id="ticketReference" 
                               placeholder="${lang === 'fr' ? 'Ex: ABCDEF ou numéro de dossier' : 'Ex: ABCDEF or file number'}">
                    `;
                    break;
                case 'bus':
                    fieldsHTML = `
                        <input type="text" class="form-input" id="ticketReference" 
                               placeholder="${lang === 'fr' ? 'Ex: BUS123456' : 'Ex: BUS123456'}">
                    `;
                    break;
                case 'boat':
                    fieldsHTML = `
                        <input type="text" class="form-input" id="ticketReference" 
                               placeholder="${lang === 'fr' ? 'Ex: FER123456' : 'Ex: FER123456'}">
                    `;
                    break;
            }
            
            verificationFields.innerHTML = fieldsHTML;
        }

        // Verify ticket
        function verifyTicket() {
            const status = document.getElementById('ticketStatus');
            const name = document.getElementById('ticketName')?.value;
            const reference = document.getElementById('ticketReference')?.value;
            
            if (!name || !reference) {
                status.classList.remove('success', 'pending');
                status.classList.add('error');
                status.innerHTML = '✗ Informations manquantes';
                return;
            }
            
            // Simulate verification
            status.classList.remove('error', 'success');
            status.classList.add('pending');
            status.innerHTML = 'Vérification...';
            
            setTimeout(() => {
                status.classList.remove('pending', 'error');
                status.classList.add('success');
                status.innerHTML = '✓ Vérifié';
            }, 1500);
        }

        // Toggle category
        function toggleCategory(element, categoryId) {
            element.classList.toggle('selected');
            
            if (element.classList.contains('selected')) {
                selectedCategories.push(categoryId);
                showSubcategories(categoryId);
            } else {
                selectedCategories = selectedCategories.filter(c => c !== categoryId);
                hideSubcategories(categoryId);
            }
        }

        // Show subcategories
        function showSubcategories(categoryId) {
            const container = document.getElementById('subcategoriesContainer');
            if (!container || !subcategoriesData[categoryId]) return;
            
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            const subcategories = subcategoriesData[categoryId][lang] || subcategoriesData[categoryId]['fr'];
            
            const existingPanel = document.getElementById(`sub-${categoryId}`);
            if (existingPanel) {
                existingPanel.remove();
                return;
            }
            
            const panelHTML = `
                <div class="subcategories-panel" id="sub-${categoryId}">
                    <div class="subcategories-title">
                        ${lang === 'fr' ? 'Sous-catégories acceptées pour ' : 'Accepted subcategories for '} ${categoryId}:
                    </div>
                    <div class="subcategories-grid">
                        ${subcategories.map(sub => `
                            <div class="subcategory-item" onclick="toggleSubcategory(this, '${categoryId}', '${sub}')">
                                ${sub}
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', panelHTML);
        }

        // Hide subcategories
        function hideSubcategories(categoryId) {
            const panel = document.getElementById(`sub-${categoryId}`);
            if (panel) {
                panel.remove();
            }
            delete selectedSubcategories[categoryId];
        }

        // Toggle subcategory
        function toggleSubcategory(element, categoryId, subcategory) {
            element.classList.toggle('selected');
            
            if (!selectedSubcategories[categoryId]) {
                selectedSubcategories[categoryId] = [];
            }
            
            if (element.classList.contains('selected')) {
                selectedSubcategories[categoryId].push(subcategory);
            } else {
                selectedSubcategories[categoryId] = selectedSubcategories[categoryId].filter(s => s !== subcategory);
            }
        }

        // Calculate price
        function calculatePrice() {
            const distance = parseFloat(document.getElementById('simDistance')?.value) || 470;
            const routeType = document.getElementById('routeType')?.value || 'domestic';
            const popularity = document.getElementById('routePopularity')?.value || 'medium';
            const urgency = document.getElementById('timeBeforeDeparture')?.value || 'medium';
            const weight = parseFloat(document.getElementById('availableWeight')?.value) || 20;
            
            // Base price calculation
            let basePrice = 8;
            
            // Distance adjustment
            let distanceAdjust = Math.min(distance * 0.005, 5);
            
            // Route type multipliers
            const routeMultipliers = {
                'domestic': 1,
                'european': 1.3,
                'international': 1.5,
                'intercontinental': 2
            };
            
            // Popularity multipliers
            const popularityMultipliers = {
                'low': 0.8,
                'medium': 1,
                'high': 1.3
            };
            
            // Urgency multipliers
            const urgencyMultipliers = {
                'urgent': 1.5,
                'short': 1.2,
                'medium': 1,
                'long': 0.9
            };
            
            // Calculate suggested price
            suggestedPrice = basePrice * routeMultipliers[routeType] * popularityMultipliers[popularity] * urgencyMultipliers[urgency] + distanceAdjust;
            suggestedPrice = Math.round(suggestedPrice * 10) / 10;
            
            // Calculate commission
            const totalRevenue = suggestedPrice * weight;
            const commissionRate = totalRevenue > 100 ? 0.20 : 0.15;
            const commission = totalRevenue * commissionRate;
            const netEarnings = totalRevenue - commission;
            
            // Update displays
            document.getElementById('suggestedPrice').textContent = suggestedPrice + '€';
            document.getElementById('suggestedPriceOption').textContent = suggestedPrice + '€/kg';
            document.getElementById('basePrice').textContent = basePrice + '€/kg';
            document.getElementById('distanceAdjust').textContent = '+' + distanceAdjust.toFixed(1) + '€/kg';
            document.getElementById('demandAdjust').textContent = (popularityMultipliers[popularity] > 1 ? '+' : '') + ((popularityMultipliers[popularity] - 1) * basePrice).toFixed(1) + '€/kg';
            document.getElementById('urgencyAdjust').textContent = (urgencyMultipliers[urgency] > 1 ? '+' : '') + ((urgencyMultipliers[urgency] - 1) * basePrice).toFixed(1) + '€/kg';
            document.getElementById('commission').textContent = '-' + (commissionRate * 100) + '%';
            document.getElementById('netEarnings').textContent = (suggestedPrice * (1 - commissionRate)).toFixed(1) + '€/kg';
            document.getElementById('totalPotentialEarnings').textContent = Math.round(netEarnings) + '€';
        }

        // Select price option
        function selectPriceOption(element, option) {
            document.querySelectorAll('.price-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            element.classList.add('selected');
            
            selectedPriceOption = option;
            
            const customInput = document.getElementById('customPriceInput');
            if (option === 'custom') {
                customInput.classList.add('active');
            } else {
                customInput.classList.remove('active');
            }
        }

        // Navigation
        function nextStep() {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) {
                    document.getElementById(`step${currentStep}`).classList.remove('active');
                    currentStep++;
                    document.getElementById(`step${currentStep}`).classList.add('active');
                    updateProgress();
                    
                    if (currentStep === 4) {
                        calculatePrice();
                    } else if (currentStep === 6) {
                        generateSummary();
                    }
                } else {
                    // Validate final step and submit
                    if (validateFinalStep()) {
                        submitOffer();
                    }
                }
            }
        }

        function previousStep() {
            if (currentStep > 1) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep--;
                document.getElementById(`step${currentStep}`).classList.add('active');
                updateProgress();
            }
        }

        function updateProgress() {
            const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
            document.getElementById('progressLine').style.width = `${progress}%`;
            
            // Update step indicators
            document.querySelectorAll('.step').forEach((step, index) => {
                if (index < currentStep - 1) {
                    step.classList.add('completed');
                    step.classList.remove('active');
                } else if (index === currentStep - 1) {
                    step.classList.add('active');
                    step.classList.remove('completed');
                } else {
                    step.classList.remove('active', 'completed');
                }
            });
            
            // Update button text
            const btn = document.getElementById('nextBtn');
            if (currentStep === totalSteps) {
                btn.innerHTML = '✅ Publier l\'annonce';
                btn.classList.add('btn-success');
            } else {
                const lang = localStorage.getItem('preferredLanguage') || 'fr';
                btn.innerHTML = lang === 'fr' ? 'Continuer →' : 'Continue →';
                btn.classList.remove('btn-success');
            }
        }

        function validateStep(step) {
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            
            switch(step) {
                case 1: // Transport validation
                    if (!selectedTransport) {
                        showError(lang === 'fr' ? 'Veuillez sélectionner un mode de transport' : 'Please select a transport mode');
                        return false;
                    }
                    if (!selectedCompany) {
                        showError(lang === 'fr' ? 'Veuillez sélectionner une compagnie' : 'Please select a company');
                        return false;
                    }
                    const ticketName = document.getElementById('ticketName')?.value;
                    const ticketRef = document.getElementById('ticketReference')?.value;
                    if (!ticketName || !ticketRef) {
                        showError(lang === 'fr' ? 'Veuillez remplir les informations du billet' : 'Please fill in ticket information');
                        return false;
                    }
                    if (document.getElementById('ticketStatus')?.classList.contains('error')) {
                        showError(lang === 'fr' ? 'Veuillez vérifier votre billet avant de continuer' : 'Please verify your ticket before continuing');
                        return false;
                    }
                    break;
                    
                case 2: // Route validation
                    const depCity = document.getElementById('departureCity')?.value;
                    const arrCity = document.getElementById('arrivalCity')?.value;
                    const depDate = document.getElementById('departureDate')?.value;
                    const arrDate = document.getElementById('arrivalDate')?.value;
                    
                    if (!depCity || !arrCity) {
                        showError(lang === 'fr' ? 'Veuillez remplir les villes de départ et d\'arrivée' : 'Please fill in departure and arrival cities');
                        return false;
                    }
                    if (!depDate || !arrDate) {
                        showError(lang === 'fr' ? 'Veuillez remplir les dates de départ et d\'arrivée' : 'Please fill in departure and arrival dates');
                        return false;
                    }
                    break;
                    
                case 3: // Capacity validation
                    const weight = document.getElementById('availableWeight')?.value;
                    if (!weight || weight < 1 || weight > 30) {
                        showError(lang === 'fr' ? 'Le poids doit être entre 1 et 30 kg' : 'Weight must be between 1 and 30 kg');
                        return false;
                    }
                    if (selectedCategories.length === 0) {
                        showError(lang === 'fr' ? 'Veuillez sélectionner au moins un type de colis accepté' : 'Please select at least one accepted package type');
                        return false;
                    }
                    break;
                    
                case 5: // Price validation
                    if (!selectedPriceOption) {
                        showError(lang === 'fr' ? 'Veuillez choisir une option de prix' : 'Please choose a price option');
                        return false;
                    }
                    if (selectedPriceOption === 'custom') {
                        const customPrice = document.getElementById('customPrice')?.value;
                        if (!customPrice || customPrice < 1) {
                            showError(lang === 'fr' ? 'Veuillez entrer un prix valide' : 'Please enter a valid price');
                            return false;
                        }
                    }
                    break;
            }
            
            return true;
        }

        function validateFinalStep() {
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            
            // Check expiration date
            const expiration = document.getElementById('offerExpiration')?.value;
            if (!expiration) {
                showError(lang === 'fr' ? 'Veuillez définir une date d\'expiration pour l\'offre' : 'Please set an expiration date for the offer');
                return false;
            }
            
            // Check if expiration is in the future
            if (new Date(expiration) <= new Date()) {
                showError(lang === 'fr' ? 'La date d\'expiration doit être dans le futur' : 'Expiration date must be in the future');
                return false;
            }
            
            // Check terms acceptance
            if (!document.getElementById('acceptTerms')?.checked) {
                showError(lang === 'fr' ? 'Veuillez accepter les conditions générales' : 'Please accept the terms and conditions');
                return false;
            }
            
            return true;
        }

        function showError(message) {
            // Create or update error message
            let errorDiv = document.getElementById('validationError');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.id = 'validationError';
                errorDiv.style.cssText = `
                    position: fixed;
                    top: 100px;
                    right: 20px;
                    background: #fee2e2;
                    color: #991b1b;
                    padding: 16px 24px;
                    border-radius: 12px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                `;
                document.body.appendChild(errorDiv);
            }
            
            errorDiv.textContent = '⚠️ ' + message;
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                if (errorDiv) {
                    errorDiv.remove();
                }
            }, 5000);
        }

        function submitOffer() {
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            
            // Show success message
            const successDiv = document.createElement('div');
            successDiv.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: #d1fae5;
                color: #065f46;
                padding: 16px 24px;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                z-index: 9999;
                animation: slideIn 0.3s ease;
            `;
            successDiv.textContent = lang === 'fr' ? 
                '✅ Offre publiée avec succès ! Une facture a été envoyée à votre email.' : 
                '✅ Offer published successfully! An invoice has been sent to your email.';
            document.body.appendChild(successDiv);
            
            // Simulate redirect after 3 seconds
            setTimeout(() => {
                window.location.href = '#dashboard';
            }, 3000);
        }

        function generateSummary() {
            const finalPrice = selectedPriceOption === 'custom' ? 
                document.getElementById('customPrice')?.value || suggestedPrice : 
                suggestedPrice;
            const weight = document.getElementById('availableWeight')?.value || 20;
            const gross = finalPrice * weight;
            const commissionRate = gross > 100 ? 0.20 : 0.15;
            const commission = gross * commissionRate;
            
            // Calculate average transaction fees (estimated at 1.5% average)
            const transactionFees = gross * 0.015;
            const net = gross - commission - transactionFees;
            
            // Update financial display
            document.getElementById('finalPricePerKg').textContent = finalPrice + '€';
            document.getElementById('finalCapacity').textContent = weight + ' kg';
            document.getElementById('grossIncome').textContent = Math.round(gross) + '€';
            document.getElementById('finalCommission').textContent = '-' + Math.round(commission) + '€';
            document.getElementById('transactionFees').textContent = '-' + Math.round(transactionFees * 10) / 10 + '€';
            document.getElementById('netIncome').textContent = Math.round(net * 10) / 10 + '€';
            
            // Generate summary content
            const summary = document.getElementById('offerSummary');
            if (summary) {
                const expiration = document.getElementById('departureDate')?.value || 'À définir';
                summary.innerHTML = `
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <p><strong>Transport:</strong> ${selectedTransport || 'Non défini'}</p>
                            <p><strong>Compagnie:</strong> ${selectedCompany || 'Non définie'}</p>
                            <p><strong>N° de vol/train:</strong> ${document.getElementById('transportNumber')?.value || 'Non défini'}</p>
                        </div>
                        <div>
                            <p><strong>Trajet:</strong> ${document.getElementById('departureCity')?.value || 'Départ'} → ${document.getElementById('arrivalCity')?.value || 'Arrivée'}</p>
                            <p><strong>Date départ:</strong> ${document.getElementById('departureDate')?.value || 'À définir'}</p>
                            <p><strong>Expiration offre:</strong> ${expiration}</p>
                        </div>
                    </div>
                    <hr style="margin: 16px 0; border: none; border-top: 1px solid var(--border);">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <p><strong>Capacité:</strong> ${weight} kg à ${finalPrice}€/kg</p>
                            <p><strong>Types acceptés:</strong> ${selectedCategories.join(', ') || 'Tous'}</p>
                        </div>
                        <div>
                            <p><strong>Commission plateforme:</strong> ${(commissionRate * 100)}%</p>
                            <p><strong>Gains nets estimés:</strong> ${Math.round(net * 10) / 10}€</p>
                        </div>
                    </div>
                `;
            }
        }
    </script>
</body>
</html>