<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JeConfie - Create Account">
    <meta name="keywords" content="jeconfie, shipping, account">
    <meta name="author" content="JeConfie">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon">
    <title>Create Account - JeConfie</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* CSS Variables */
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #ec4899;
            --accent: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f8fafc;
            --border: #e5e7eb;
            --text: #374151;
            --text-light: #6b7280;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            color: var(--text);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
        }

        .flatpickr-wrapper {
            display: inline-grid !important;
        }

        /* ===== NAVIGATION ===== */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 72px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.125rem;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        /* ===== BUTTONS ===== */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            line-height: 1;
        }

        .btn-ghost {
            background: transparent;
            color: var(--text);
            border: 2px solid transparent;
        }

        .btn-ghost:hover {
            background: var(--light);
            color: var(--primary);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.4);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: white;
        }

        .btn-large {
            padding: 1rem 1.5rem;
            font-size: 1rem;
            width: 100%;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-top: 72px;
            min-height: calc(100vh - 72px);
            padding: 2.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-container {
            max-width: 650px;
            width: 100%;
            margin: 0 1.5rem;
        }

        .signup-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
        }

        /* ===== LANGUAGE SWITCH ===== */
        .language-switch {
            position: absolute;
            top: 1.25rem;
            right: 1.25rem;
            display: flex;
            gap: 0.5rem;
        }

        .lang-btn {
            padding: 0.375rem 0.75rem;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .lang-btn.active {
            background: white;
            color: var(--primary);
        }

        .lang-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* ===== PROGRESS INDICATOR ===== */
        .progress-container {
            margin-bottom: 2rem;
        }

        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .progress-step {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--light);
            border: 2px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.75rem;
            color: var(--text-light);
            transition: var(--transition);
        }

        .progress-step.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .progress-step.completed {
            background: var(--success);
            border-color: var(--success);
            color: white;
        }

        .progress-line {
            width: 30px;
            height: 2px;
            background: var(--border);
            transition: var(--transition);
        }

        .progress-line.completed {
            background: var(--success);
        }

        .progress-title {
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-light);
            font-weight: 600;
        }

        /* ===== SIGNUP HEADER ===== */
        .signup-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .signup-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .signup-subtitle {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        /* ===== STEP SECTIONS ===== */
        .step-section {
            display: none;
        }

        .step-section.active {
            display: block;
        }

        /* ===== PHOTO UPLOAD ===== */
        .photo-upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .photo-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            border: 4px solid white;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .photo-preview:hover {
            transform: scale(1.05);
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-overlay {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 32px;
            height: 32px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.875rem;
            border: 3px solid white;
        }

        .photo-upload-input {
            display: none;
        }

        .photo-upload-btn {
            background: none;
            border: 2px dashed var(--border);
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            color: var(--primary);
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .photo-upload-btn:hover {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        /* ===== FORM ELEMENTS ===== */
        .form-section {
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-grid {
            display: grid;
            gap: 1rem;
        }

        .form-grid.two-columns {
            grid-template-columns: 1fr 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.375rem;
        }

        .form-label {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--text);
        }

        .required {
            color: var(--danger);
        }

        .form-input,
        .form-select,
        .form-textarea {
            padding: 0.75rem 0.875rem;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 0.875rem;
            transition: var(--transition);
            background: white;
            font-family: inherit;
            width: 100%;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-textarea {
            min-height: 80px;
            resize: vertical;
        }

        .phone-input-group {
            display: flex;
            gap: 0.5rem;
        }

        .country-select {
            flex: 0 0 100px;
        }

        .phone-number {
            flex: 1;
        }

        /* ===== OTP INPUTS ===== */
        .otp-container {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            margin: 1.5rem 0;
        }

        .otp-input,
        .email-otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 1.125rem;
            font-weight: bold;
            border: 2px solid var(--border);
            border-radius: 12px;
            transition: var(--transition);
        }

        .otp-input:focus,
        .email-otp-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        /* ===== VERIFICATION ===== */
        .verification-container {
            text-align: center;
            margin: 1.5rem 0;
        }

        .verification-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin: 0 auto 1.25rem;
            box-shadow: 0 8px 24px rgba(6, 182, 212, 0.3);
        }

        .verification-email,
        .phone-display {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .otp-info {
            background: rgba(6, 182, 212, 0.1);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin: 1.25rem 0;
            text-align: center;
        }

        .otp-info-text {
            font-size: 0.8125rem;
            color: #0891b2;
            margin-bottom: 0.75rem;
        }

        .resend-timer,
        .resend-email-timer {
            font-size: 0.875rem;
            color: var(--text-light);
        }

        .resend-btn {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            text-decoration: underline;
            font-size: 0.875rem;
            padding: 0.5rem;
        }

        .resend-btn:hover {
            color: var(--primary-dark);
        }

        /* ===== CAPTCHA ===== */
        .captcha-container {
            background: var(--light);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 1.25rem;
            margin: 1.25rem 0;
            text-align: center;
        }

        .captcha-display {
            font-family: 'Courier New', monospace;
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 8px;
            color: var(--dark);
            background: white;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            user-select: none;
            text-decoration: line-through;
            text-decoration-color: rgba(0,0,0,0.3);
        }

        .captcha-refresh {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-size: 0.875rem;
            text-decoration: underline;
        }

        .captcha-refresh:hover {
            color: var(--primary-dark);
        }

        /* ===== FREQUENCY & OPTIONS ===== */
        .frequency-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .frequency-option {
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: 1rem 0.75rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: white;
        }

        .frequency-option.selected {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        .frequency-title {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .frequency-description {
            font-size: 0.6875rem;
            color: var(--text-light);
        }

        /* ===== ALERTS ===== */
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            font-size: 0.8125rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .alert-info {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        /* ===== VERIFICATION INFO ===== */
        .verification-info {
            background: rgba(6, 182, 212, 0.1);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin: 1rem 0;
        }

        .verification-title {
            font-weight: 600;
            color: #0891b2;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .verification-text {
            font-size: 0.8125rem;
            color: #0891b2;
            line-height: 1.4;
        }

        /* ===== CHECKBOXES ===== */
        .terms-section {
            margin: 1.5rem 0;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            min-width: 18px;
            min-height: 18px;
            border: 2px solid var(--border);
            border-radius: 4px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            margin-top: 0.125rem;
        }

        .checkbox.checked {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .checkbox-label {
            font-size: 0.8125rem;
            color: var(--text);
            line-height: 1.4;
            cursor: pointer;
            flex: 1;
        }

        .checkbox-label a {
            color: var(--primary);
            text-decoration: none;
        }

        .checkbox-label a:hover {
            text-decoration: underline;
        }

        /* ===== FORM ACTIONS ===== */
        .form-actions {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .step-navigation {
            display: flex;
            gap: 0.75rem;
        }

        .btn-back {
            flex: 1;
        }

        .btn-next {
            flex: 2;
        }

        .login-link {
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-light);
            margin-top: 1rem;
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* ===== UTILITY CLASSES ===== */
        .hidden {
            display: none !important;
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .signup-container {
                margin: 0 1rem;
            }

            .signup-card {
                padding: 1.5rem;
                border-radius: 16px;
            }

            .signup-title {
                font-size: 1.5rem;
            }

            .form-grid.two-columns {
                grid-template-columns: 1fr;
            }

            .frequency-options {
                grid-template-columns: 1fr;
            }

            .otp-container {
                gap: 0.5rem;
            }

            .otp-input,
            .email-otp-input {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }

            .language-switch {
                position: static;
                justify-content: center;
                margin-bottom: 1.25rem;
            }

            .progress-steps {
                gap: 0.25rem;
            }

            .progress-step {
                width: 32px;
                height: 32px;
                font-size: 0.6875rem;
            }

            .progress-line {
                width: 20px;
            }

            .section-title {
                font-size: 1rem;
            }

            .photo-preview {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }

            .verification-icon {
                width: 64px;
                height: 64px;
                font-size: 1.5rem;
            }

            .step-navigation {
                flex-direction: column;
            }

            .btn-back,
            .btn-next {
                flex: 1;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 1rem 0;
            }

            .signup-card {
                padding: 1.25rem;
            }

            .otp-input,
            .email-otp-input {
                width: 40px;
                height: 40px;
                font-size: 0.875rem;
            }

            .captcha-display {
                font-size: 1.25rem;
                letter-spacing: 4px;
            }
        }
    </style>
</head>
<body>
<!-- NAVIGATION -->
<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="logo">
            <div class="logo-icon">JC</div>
            JeConfie
        </a>
        <ul class="nav-menu">
            <li><a href="#" class="nav-link">Home</a></li>
            <li><a href="#" class="nav-link">How it works</a></li>
            <li><a href="#" class="nav-link">Safety</a></li>
            <li><a href="#" class="nav-link">Help</a></li>
        </ul>
        <div class="nav-actions">
            <a href="{{ url('user/login') }}" class="btn btn-ghost">Sign In</a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="main-content">
    <div class="signup-container">
        <div class="signup-card">
            <!-- LANGUAGE SWITCH -->
            <div class="language-switch">
                <a href="#" class="lang-btn" onclick="switchToFrench()">FR</a>
                <a href="#" class="lang-btn active">EN</a>
            </div>

            <!-- PROGRESS INDICATOR -->
            <div class="progress-container">
                <div class="progress-steps">
                    <div class="progress-step active" id="step-1">1</div>
                    <div class="progress-line" id="line-1"></div>
                    <div class="progress-step" id="step-2">2</div>
                    <div class="progress-line" id="line-2"></div>
                    <div class="progress-step" id="step-3">3</div>
                    <div class="progress-line" id="line-3"></div>
                    <div class="progress-step" id="step-4">4</div>
                    <div class="progress-line" id="line-4"></div>
                    <div class="progress-step" id="step-5">5</div>
                    <div class="progress-line" id="line-5"></div>
                    <div class="progress-step" id="step-6">6</div>
                    <div class="progress-line" id="line-6"></div>
                    <div class="progress-step" id="step-7">7</div>
                </div>
                <div class="progress-title" id="progress-title">Account Type</div>
            </div>

            <!-- SIGNUP HEADER -->
            <div class="signup-header">
                <h1 class="signup-title">Join JeConfie</h1>
                <p class="signup-subtitle">Create your account and start shipping with confidence</p>
            </div>

            <form action="{{route('user.verify_otp')}}" method="POST" id="signup-form">
                @csrf

                <!-- STEP 1: PHOTO -->
                <div class="step-section active" id="step-section-1">
                    <div class="photo-upload-container">
                        <div class="photo-preview" onclick="triggerPhotoUpload()" id="photo-preview">
                            👤
                            <div class="photo-overlay">📷</div>
                        </div>
                        <input type="file" id="photo-upload" name="profile" class="photo-upload-input" accept="image/*" onchange="handlePhotoUpload(event)">
                        <button type="button" class="photo-upload-btn" onclick="triggerPhotoUpload()">
                            📷 Add Photo (Optional)
                        </button>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-primary btn-large" onclick="nextStep()">
                            Continue
                        </button>
                        <div class="login-link">
                            Already have an account? <a href="{{ url('user/login') }}">Sign In</a>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: BASIC INFORMATION -->
                <div class="step-section" id="step-section-2">
                    <div class="form-section">
                        <h3 class="section-title">👤 Personal Information</h3>
                        <div class="form-grid two-columns">
                            <div class="form-group">
                                <label class="form-label" for="first-name">
                                    First Name <span class="required">*</span>
                                </label>
                                <input type="text" id="first-name" name="firstName" class="form-input" placeholder="Your first name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="last-name">
                                    Last Name <span class="required">*</span>
                                </label>
                                <input type="text" id="last-name" name="lastName" class="form-input" placeholder="Your last name" required>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="profession">
                                    Profession <span class="required">*</span>
                                </label>
                                <input type="text" id="profession" name="profession" class="form-input" placeholder="Your job/profession" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="birth-date">
                                    Date of Birth <span class="required">*</span>
                                </label>
                                <input type="date" id="birth-date" name="dob" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="address">
                                    Address
                                </label>
                                <input type="text" id="address" name="address" class="form-input" placeholder="Your complete address">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="step-navigation">
                            <button type="button" class="btn btn-secondary btn-large btn-back" onclick="prevStep()">
                                Back
                            </button>
                            <button type="button" class="btn btn-primary btn-large btn-next" onclick="nextStep()">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: EMAIL VERIFICATION -->
                <div class="step-section" id="step-section-3">
                    <div class="form-section">
                        <h3 class="section-title">📧 Email Verification</h3>
                        <div class="form-group">
                            <label class="form-label" for="email">
                                Email Address <span class="required">*</span>
                            </label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="your@email.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email-captcha-input">
                                Anti-spam verification <span class="required">*</span>
                            </label>
                            <div class="captcha-container">
                                <div class="captcha-display" id="email-captcha-display">ABC123</div>
                                <button type="button" class="captcha-refresh" onclick="generateEmailCaptcha()">🔄 New code</button>
                            </div>
                            <input type="text" id="email-captcha-input" class="form-input" placeholder="Enter the code above" required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="step-navigation">
                            <button type="button" class="btn btn-secondary btn-large btn-back" onclick="prevStep()">
                                Back
                            </button>
                            <button type="button" id="send-verification-btn" class="btn btn-primary btn-large btn-next" onclick="sendVerificationEmail()">
                                Send Verification Email
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: EMAIL VERIFICATION CONFIRMATION -->
                <div class="step-section" id="step-section-4">
                    <div class="verification-container">
                        <div class="verification-icon">📧</div>
                        <h3 class="section-title">Check your email</h3>
                        <div class="verification-email" id="verification-email">your@email.com</div>

                        <div class="email-verification-form hidden" id="email-verification">
                            <div class="verification-container">
                                <h3 class="section-title">📱 Enter Verification Code</h3>

                                <div class="otp-container">
                                    <input type="text" class="email-otp-input" maxlength="1" data-index="0">
                                    <input type="text" class="email-otp-input" maxlength="1" data-index="1">
                                    <input type="text" class="email-otp-input" maxlength="1" data-index="2">
                                    <input type="text" class="email-otp-input" maxlength="1" data-index="3">
                                    <input type="text" class="email-otp-input" maxlength="1" data-index="4">
                                    <input type="text" class="email-otp-input" maxlength="1" data-index="5">
                                </div>

                                <div class="otp-info">
                                    <div class="otp-info-text">Verification code may take up to 2 minutes to arrive</div>
                                    <div class="resend-email-timer" id="resend-email-timer">
                                        Resend code in <span id="emailcountdown">60</span>s
                                    </div>
                                    <button type="button" class="resend-btn hidden" id="resend-email-btn" onclick="resendVerificationEmail()">Resend code</button>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="step-navigation">
                                    <button type="button" class="btn btn-secondary btn-large btn-back" onclick="goBackFromEmailVerification()">
                                        Back
                                    </button>
                                    <button type="button" class="btn btn-primary btn-large btn-next" id="verify-email-otp-btn" disabled onclick="verifyEmailOTP()">
                                        Verify Code
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 5: PHONE VERIFICATION -->
                <div class="step-section" id="step-section-5">
                    <div class="phone-verification-form">
                        <div class="form-section">
                            <h3 class="section-title">📱 Phone Verification</h3>
                            <div class="form-group">
                                <label class="form-label" for="phone-number">
                                    Phone Number <span class="required">*</span>
                                </label>
                                <div class="phone-input-group">
                                    <select id="country-code" class="form-select country-select">
                                        <option value="+33" selected>🇫🇷 +33</option>
                                        <option value="+1">🇺🇸 +1</option>
                                        <option value="+44">🇬🇧 +44</option>
                                        <option value="+49">🇩🇪 +49</option>
                                        <option value="+39">🇮🇹 +39</option>
                                        <option value="+34">🇪🇸 +34</option>
                                        <option value="+32">🇧🇪 +32</option>
                                        <option value="+41">🇨🇭 +41</option>
                                    </select>
                                    <input type="tel" id="phone-number" name="phone" class="form-input phone-number" placeholder="6 12 34 56 78" required>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <span>📱</span>
                                <span>A verification code will be sent via SMS</span>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" id="send-sms-btn" class="btn btn-primary btn-large" onclick="sendOTPCode()">
                                Send SMS Code
                            </button>
                        </div>
                    </div>

                    <div class="otp-verification-form hidden" id="otp-verification">
                        <div class="verification-container">
                            <h3 class="section-title">📱 Enter Verification Code</h3>
                            <div class="phone-display" id="phone-display">+33 6 12 34 56 78</div>

                            <div class="otp-container">
                                <input type="text" class="otp-input" maxlength="1" data-index="0">
                                <input type="text" class="otp-input" maxlength="1" data-index="1">
                                <input type="text" class="otp-input" maxlength="1" data-index="2">
                                <input type="text" class="otp-input" maxlength="1" data-index="3">
                                <input type="text" class="otp-input" maxlength="1" data-index="4">
                                <input type="text" class="otp-input" maxlength="1" data-index="5">
                            </div>

                            <div class="otp-info">
                                <div class="otp-info-text">SMS code may take up to 2 minutes to arrive</div>
                                <div class="resend-timer" id="resend-timer">
                                    Resend code in <span id="countdown">60</span>s
                                </div>
                                <button type="button" class="resend-btn hidden" id="resend-btn" onclick="sendOTPCode()">Resend code</button>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="step-navigation">
                                <button type="button" class="btn btn-secondary btn-large btn-back" onclick="goBackFromPhoneVerification()">
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary btn-large btn-next" id="verify-otp-btn" disabled onclick="verifyOTP()">
                                    Verify Code
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 6: ACCOUNT PREFERENCES -->
                <div class="step-section" id="step-section-6">
                    <div class="shipper-form active">
                        <div class="form-section">
                            <h3 class="section-title">🏢 Shipping Profile</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="shipper-type">
                                        Account Type <span class="required">*</span>
                                    </label>
                                    <select id="shipper-type" name="shipperType" class="form-select" required>
                                        <option value="">Select...</option>
                                        <option value="individual">Individual</option>
                                        <option value="business">Business</option>
                                        <option value="association">Association</option>
                                    </select>
                                </div>
                                <div class="form-group hidden" id="company-name-group">
                                    <label class="form-label" for="company-name">
                                        Company Name <span class="required">*</span>
                                    </label>
                                    <input type="text" id="company-name" name="companyName" class="form-input" placeholder="Your company name">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">📦 Shipping Frequency</h3>
                            <div class="frequency-options">
                                <div class="frequency-option selected" data-frequency="occasional">
                                    <div class="frequency-title">Occasional</div>
                                    <div class="frequency-description">Few packages per year</div>
                                </div>
                                <div class="frequency-option" data-frequency="regular">
                                    <div class="frequency-title">Regular</div>
                                    <div class="frequency-description">Several times per month</div>
                                </div>
                                <div class="frequency-option" data-frequency="intensive">
                                    <div class="frequency-title">Intensive</div>
                                    <div class="frequency-description">Every week</div>
                                </div>
                                <div class="frequency-option" data-frequency="professional">
                                    <div class="frequency-title">Professional</div>
                                    <div class="frequency-description">Commercial use</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">📋 Typical Package Types</h3>
                            <div class="form-group">
                                <label class="form-label" for="package-types">
                                    Describe your typical shipments
                                </label>
                                <textarea id="package-types" name="packageTypes" class="form-textarea" placeholder="Ex: Documents, handmade products, commercial samples, personal gifts..."></textarea>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">⚡ Specific Needs</h3>
                            <div class="form-group">
                                <label class="form-label" for="special-requirements">
                                    Special Requirements (optional)
                                </label>
                                <textarea id="special-requirements" name="specialRequirements" class="form-textarea" placeholder="Ex: Express delivery, delicate handling, enhanced insurance..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="step-navigation">
                            <button type="button" class="btn btn-secondary btn-large btn-back" onclick="prevStep()">
                                Back
                            </button>
                            <button type="button" class="btn btn-primary btn-large btn-next" onclick="nextStep()">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 7: PASSWORD & FINALIZATION -->
                <div class="step-section" id="step-section-7">
                    <div class="form-section">
                        <h3 class="section-title">🔒 Account Security</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="password">
                                    Password <span class="required">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="form-input" placeholder="Minimum 8 characters" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="confirm-password">
                                    Confirm Password <span class="required">*</span>
                                </label>
                                <input type="password" id="confirm-password" name="confirm_password" class="form-input" placeholder="Re-enter your password" required>
                            </div>
                        </div>
                    </div>

                    <div class="verification-info">
                        <div class="verification-title">
                            🛡️ Identity Verification
                        </div>
                        <div class="verification-text">
                            To ensure everyone's safety, identity verification will be required after registration. You will receive an email with the steps to follow.
                        </div>
                    </div>

                    <div class="terms-section">
                        <div class="checkbox-group">
                            <div class="checkbox" data-checkbox="terms" onclick="toggleCheckbox(this)">✓</div>
                            <label class="checkbox-label" onclick="toggleCheckbox(this.previousElementSibling)">
                                I accept the <a href="#" onclick="event.stopPropagation(); showLegalPage('terms-of-use')">Terms of Use</a> and <a href="#" onclick="event.stopPropagation(); showLegalPage('terms-of-sale')">Terms of Sale</a> of JeConfie.
                            </label>
                        </div>

                        <div class="checkbox-group">
                            <div class="checkbox" data-checkbox="privacy" onclick="toggleCheckbox(this)">✓</div>
                            <label class="checkbox-label" onclick="toggleCheckbox(this.previousElementSibling)">
                                I accept the <a href="#" onclick="event.stopPropagation(); showLegalPage('privacy-policy')">Privacy Policy</a> and the processing of my personal data in accordance with GDPR.
                            </label>
                        </div>

                        <div class="checkbox-group">
                            <div class="checkbox" data-checkbox="newsletter" onclick="toggleCheckbox(this)">✓</div>
                            <label class="checkbox-label" onclick="toggleCheckbox(this.previousElementSibling)">
                                I want to receive JeConfie news and special offers by email (optional).
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="step-navigation">
                            <button type="button" class="btn btn-secondary btn-large btn-back" onclick="prevStep()">
                                Back
                            </button>
                            <button type="button" class="btn btn-primary btn-large btn-next" id="complete-signup-btn" onclick="completeSignup()">
                                Create My Account
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

<!-- External Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // ===== GLOBAL VARIABLES =====
    const CONFIG = {
        STEP_TITLES: ['', 'Account Type', 'Personal Info', 'Email Verification', 'Check Email', 'Phone Verification', 'Preferences', 'Complete Setup'],
        MAX_PHOTO_SIZE_MB: 2,
        RESEND_COUNTDOWN_SECONDS: 60,
        URLS: {
            SEND_EMAIL: '{{ url("user/send-verification-email") }}',
            VERIFY_EMAIL: '{{ url("driver/verify-email-code") }}',
            SEND_SMS: '{{ url("driver/send-sms-code") }}',
            VERIFY_SMS: '{{ url("driver/verify-sms-code") }}'
        }
    };

    const STATE = {
        currentStep: 1,
        selectedPhoto: null,
        currentPhoneNumber: '',
        isEmailVerified: false,
        isPhoneVerified: false,
        currentEmailCaptcha: '',
        resendTimer: null,
        resendEmailTimer: null
    };

    // ===== INITIALIZATION =====
    function initializeSignup() {
        generateEmailCaptcha();
        initializeOTPInputs();
        initializeEventListeners();
        initializeDatePicker();
    }

    function initializeDatePicker() {
        const today = flatpickr.formatDate(new Date(), "Y-m-d");
        flatpickr("#birth-date", {
            enableTime: false,
            dateFormat: "Y-m-d",
            maxDate: "today",
            clickOpens: true,
            closeOnSelect: false,
            static: true,
            defaultDate: today,
        });
    }

    // ===== PHOTO UPLOAD =====
    function triggerPhotoUpload() {
        document.getElementById('photo-upload').click();
    }

    function handlePhotoUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        // Validate size
        if (file.size > CONFIG.MAX_PHOTO_SIZE_MB * 1024 * 1024) {
            showAlert('error', `File size must be less than ${CONFIG.MAX_PHOTO_SIZE_MB} MB.`);
            event.target.value = '';
            STATE.selectedPhoto = null;
            return;
        }

        // Validate type
        if (!file.type.startsWith('image/')) {
            showAlert('error', 'Please select a valid image file (JPG, PNG, JPEG).');
            event.target.value = '';
            STATE.selectedPhoto = null;
            return;
        }

        // Show preview
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('photo-preview');
            preview.innerHTML = `
                    <img src="${e.target.result}" alt="Profile picture">
                    <div class="photo-overlay">📷</div>
                `;
            STATE.selectedPhoto = file;
        };
        reader.readAsDataURL(file);
    }

    function updateProfilePreview() {
        const firstName = document.getElementById('first-name').value.trim();
        const lastName = document.getElementById('last-name').value.trim();

        if (firstName && lastName && !STATE.selectedPhoto) {
            const preview = document.getElementById('photo-preview');
            const initials = firstName.charAt(0).toUpperCase() + lastName.charAt(0).toUpperCase();
            if (!preview.querySelector('img')) {
                preview.innerHTML = `${initials}<div class="photo-overlay">📷</div>`;
            }
        }
    }

    // ===== PROGRESS MANAGEMENT =====
    function updateProgress(step) {
        for (let i = 1; i <= 7; i++) {
            const stepEl = document.getElementById(`step-${i}`);
            const lineEl = document.getElementById(`line-${i}`);

            if (i < step) {
                stepEl.className = 'progress-step completed';
                stepEl.textContent = '✓';
            } else if (i === step) {
                stepEl.className = 'progress-step active';
                stepEl.textContent = i;
            } else {
                stepEl.className = 'progress-step';
                stepEl.textContent = i;
            }

            if (lineEl) {
                lineEl.className = i < step ? 'progress-line completed' : 'progress-line';
            }
        }

        document.getElementById('progress-title').textContent = CONFIG.STEP_TITLES[step];

        document.querySelectorAll('.step-section').forEach((section, index) => {
            section.classList.toggle('active', index + 1 === step);
        });

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // ===== NAVIGATION =====
    function nextStep() {
        if (validateStep(STATE.currentStep)) {
            STATE.currentStep++;
            updateProgress(STATE.currentStep);
        }
    }

    function prevStep() {
        if (STATE.currentStep > 1) {
            STATE.currentStep--;
            updateProgress(STATE.currentStep);
        }
    }

    function goBackFromEmailVerification() {
        // Clear email verification UI
        document.getElementById('email-verification').classList.add('hidden');
        clearOTPInputs('email');

        // Stop countdown timer
        if (STATE.resendEmailTimer) {
            clearInterval(STATE.resendEmailTimer);
            STATE.resendEmailTimer = null;
        }

        // Go back to email input step
        STATE.currentStep = 3;
        updateProgress(STATE.currentStep);
    }

    function goBackFromPhoneVerification() {
        // Clear phone verification UI
        document.getElementById('otp-verification').classList.add('hidden');
        document.querySelector('.phone-verification-form').classList.remove('hidden');
        clearOTPInputs('phone');

        // Stop countdown timer
        if (STATE.resendTimer) {
            clearInterval(STATE.resendTimer);
            STATE.resendTimer = null;
        }
    }

    // ===== VALIDATION =====
    function validateStep(step) {
        switch (step) {
            case 1:
                return true;

            case 2:
                const firstName = document.getElementById('first-name').value.trim();
                const lastName = document.getElementById('last-name').value.trim();
                const profession = document.getElementById('profession').value.trim();
                const birthDate = document.getElementById('birth-date').value;

                if (!firstName || !lastName || !profession || !birthDate) {
                    showAlert('error', 'Please fill in all required fields.');
                    return false;
                }
                return true;

            case 3:
                const email = document.getElementById('email').value.trim();
                const emailCaptcha = document.getElementById('email-captcha-input').value.trim().toUpperCase();

                if (!email || !email.includes('@')) {
                    showAlert('error', 'Please enter a valid email address.');
                    return false;
                }

                if (emailCaptcha !== STATE.currentEmailCaptcha) {
                    showAlert('error', 'Incorrect verification code.');
                    generateEmailCaptcha();
                    return false;
                }
                return true;

            case 5:
                const phoneNumber = document.getElementById('phone-number').value.trim();
                if (!phoneNumber) {
                    showAlert('error', 'Please enter a phone number.');
                    return false;
                }
                return true;

            case 7:
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm-password').value;
                const termsCheckbox = document.querySelector('.checkbox[data-checkbox="terms"]');
                const privacyCheckbox = document.querySelector('.checkbox[data-checkbox="privacy"]');

                if (!password || password.length < 8) {
                    showAlert('error', 'Password must be at least 8 characters.');
                    return false;
                }

                if (password !== confirmPassword) {
                    showAlert('error', 'Passwords do not match.');
                    return false;
                }

                if (!termsCheckbox.classList.contains('checked')) {
                    showAlert('error', 'You must accept the terms of use.');
                    return false;
                }

                if (!privacyCheckbox.classList.contains('checked')) {
                    showAlert('error', 'You must accept the privacy policy.');
                    return false;
                }
                return true;

            default:
                return true;
        }
    }

    // ===== CAPTCHA =====
    function generateEmailCaptcha() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let captcha = '';
        for (let i = 0; i < 6; i++) {
            captcha += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        STATE.currentEmailCaptcha = captcha;
        document.getElementById('email-captcha-display').textContent = captcha;
        document.getElementById('email-captcha-input').value = '';
    }

    // ===== EMAIL VERIFICATION =====
    async function sendVerificationEmail() {
        if (!validateStep(3)) return;

        const btn = document.getElementById('send-verification-btn');
        const email = document.getElementById('email').value.trim();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        btn.disabled = true;
        const originalText = btn.textContent;
        btn.textContent = 'Sending...';

        try {
            const response = await $.post(CONFIG.URLS.SEND_EMAIL, {
                email,
                _token: csrfToken
            });

            // Handle success response
            if (response.success) {
                document.getElementById('verification-email').textContent = email;
                document.getElementById('email-verification').classList.remove('hidden');
                showAlert('success', response.message || 'Verification email sent successfully!');
                toastr.success(response.message || 'Email sent!');
                startResendCountdown('email');
                nextStep();
            } else {
                // Email already registered
                showAlert('error', response.message || 'Email is already registered. Please sign in.');
                toastr.error(response.message || 'Email already exists');
            }
        } catch (xhr) {
            // Handle error response
            if (xhr.status === 422) {
                // Validation errors
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    const message = Object.values(errors).flat().join(', ');
                    showAlert('error', message);
                    toastr.error(message);
                } else {
                    showAlert('error', xhr.responseJSON?.message || 'Invalid email format');
                    toastr.error(xhr.responseJSON?.message || 'Invalid email');
                }
            } else if (xhr.responseJSON?.success === false) {
                // Email already registered
                showAlert('error', xhr.responseJSON.message || 'Email is already registered');
                toastr.error(xhr.responseJSON.message || 'Email already registered');
            } else {
                // Other errors
                const message = xhr.responseJSON?.message || 'Failed to send verification email. Please try again.';
                showAlert('error', message);
                toastr.error(message);
            }
        } finally {
            btn.disabled = false;
            btn.textContent = originalText;
        }
    }

    async function verifyEmailOTP() {
        const email = document.getElementById('email').value.trim();
        const code = getOTPCode('email');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        if (code.length !== 6) {
            showAlert('error', 'Please enter the complete code');
            return;
        }

        try {
            const response = await $.post(CONFIG.URLS.VERIFY_EMAIL, {
                email,
                code,
                _token: csrfToken
            });

            showAlert('success', response.message || 'Email verified successfully!');
            toastr.success('Email Verified!');
            STATE.isEmailVerified = true;
            document.getElementById('email-verification').classList.add('hidden');
            nextStep();
        } catch (xhr) {
            const message = xhr.responseJSON?.message || 'Invalid code. Please try again.';
            showAlert('error', message);
            toastr.error(message);
            clearOTPInputs('email');
        }
    }

    async function resendVerificationEmail() {
        const email = document.getElementById('email').value.trim();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        try {
            const response = await $.post(CONFIG.URLS.SEND_EMAIL, {
                email,
                _token: csrfToken
            });

            if (response.success) {
                showAlert('success', response.message || 'Verification email sent again!');
                toastr.success('Email resent!');
                startResendCountdown('email');
            } else {
                showAlert('error', response.message || 'Failed to resend email');
                toastr.error(response.message || 'Failed to resend');
            }
        } catch (xhr) {
            const message = xhr.responseJSON?.message || 'Failed to resend email';
            showAlert('error', message);
            toastr.error(message);
        }
    }

    // ===== PHONE VERIFICATION =====
    async function sendOTPCode() {
        if (!validateStep(5)) return;

        const btn = document.getElementById('send-sms-btn');
        const countryCode = document.getElementById('country-code').value.trim();
        const phoneNumber = document.getElementById('phone-number').value.trim();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        if (!phoneNumber) {
            showAlert('error', 'Please enter your phone number.');
            return;
        }

        const formattedPhone = `${countryCode}${phoneNumber.replace(/\s+/g, '')}`;
        STATE.currentPhoneNumber = formattedPhone;

        btn.disabled = true;
        const originalText = btn.textContent;
        btn.textContent = 'Sending...';

        try {
            const response = await $.post(CONFIG.URLS.SEND_SMS, {
                phone: formattedPhone,
                _token: csrfToken
            });

            document.getElementById('phone-display').textContent = formattedPhone;
            document.querySelector('.phone-verification-form').classList.add('hidden');
            document.getElementById('otp-verification').classList.remove('hidden');
            showAlert('success', response.message || 'Verification code sent successfully!');
            toastr.success('SMS sent!');
            startResendCountdown('phone');
            document.querySelector('.otp-input')?.focus();
        } catch (xhr) {
            const message = xhr.responseJSON?.message || 'Failed to send SMS code.';
            showAlert('error', message);
            toastr.error(message);
        } finally {
            btn.disabled = false;
            btn.textContent = originalText;
        }
    }

    async function verifyOTP() {
        const otpCode = getOTPCode('phone');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        if (otpCode.length !== 6) {
            showAlert('error', 'Please enter the complete code');
            return;
        }

        const phoneToVerify = STATE.currentPhoneNumber.replace(/\s+/g, '');

        try {
            const response = await $.post(CONFIG.URLS.VERIFY_SMS, {
                phone: phoneToVerify,
                code: otpCode,
                _token: csrfToken
            });

            showAlert('success', response.message || 'Phone verified successfully!');
            toastr.success('Phone Verified!');
            STATE.isPhoneVerified = true;
            document.getElementById('otp-verification').classList.add('hidden');
            nextStep();
        } catch (xhr) {
            const message = xhr.responseJSON?.message || 'Invalid code. Please try again.';
            showAlert('error', message);
            toastr.error(message);
            clearOTPInputs('phone');
        }
    }

    // ===== OTP MANAGEMENT =====
    function initializeOTPInputs() {
        setupOTPInputs('.otp-input', 'phone');
        setupOTPInputs('.email-otp-input', 'email');
    }

    function setupOTPInputs(selector, type) {
        const inputs = document.querySelectorAll(selector);

        inputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                const value = e.target.value;

                // Only allow digits
                e.target.value = value.replace(/[^0-9]/g, '');

                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                checkOTPComplete(type);
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, 6);

                pastedData.split('').forEach((char, i) => {
                    if (inputs[i]) {
                        inputs[i].value = char;
                    }
                });

                checkOTPComplete(type);
            });
        });
    }

    function checkOTPComplete(type) {
        const selector = type === 'email' ? '.email-otp-input' : '.otp-input';
        const btnId = type === 'email' ? 'verify-email-otp-btn' : 'verify-otp-btn';

        const inputs = document.querySelectorAll(selector);
        const verifyBtn = document.getElementById(btnId);

        const isComplete = Array.from(inputs).every(input => input.value.length === 1);
        verifyBtn.disabled = !isComplete;
    }

    function getOTPCode(type) {
        const selector = type === 'email' ? '.email-otp-input' : '.otp-input';
        const inputs = document.querySelectorAll(selector);
        return Array.from(inputs).map(input => input.value.trim()).join('');
    }

    function clearOTPInputs(type) {
        const selector = type === 'email' ? '.email-otp-input' : '.otp-input';
        const inputs = document.querySelectorAll(selector);
        inputs.forEach(input => input.value = '');
        inputs[0]?.focus();
        checkOTPComplete(type);
    }

    // ===== RESEND COUNTDOWN =====
    function startResendCountdown(type) {
        let countdown = CONFIG.RESEND_COUNTDOWN_SECONDS;
        const countdownId = type === 'email' ? 'emailcountdown' : 'countdown';
        const timerId = type === 'email' ? 'resend-email-timer' : 'resend-timer';
        const btnId = type === 'email' ? 'resend-email-btn' : 'resend-btn';

        const timerElement = document.getElementById(countdownId);
        const resendTimerElement = document.getElementById(timerId);
        const resendBtnElement = document.getElementById(btnId);

        resendBtnElement.classList.add('hidden');
        resendTimerElement.classList.remove('hidden');

        const timer = setInterval(() => {
            countdown--;
            timerElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(timer);
                resendTimerElement.classList.add('hidden');
                resendBtnElement.classList.remove('hidden');
            }
        }, 1000);

        if (type === 'email') {
            STATE.resendEmailTimer = timer;
        } else {
            STATE.resendTimer = timer;
        }
    }

    // ===== FINAL SIGNUP =====
    async function completeSignup() {
        if (!validateStep(7)) return;

        const btn = document.getElementById('complete-signup-btn');
        const formElement = document.getElementById('signup-form');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        btn.disabled = true;
        const originalText = btn.textContent;
        btn.textContent = 'Creating account...';

        try {
            const formData = new FormData();

            // Basic fields mapping
            const fieldMap = {
                'first-name': 'firstName',
                'last-name': 'lastName',
                'profession': 'profession',
                'birth-date': 'dob',
                'address': 'address',
                'email': 'email',
                'shipper-type': 'shipperType',
                'company-name': 'companyName',
                'package-types': 'packageTypes',
                'special-requirements': 'specialRequirements',
                'password': 'password'
            };

            Object.entries(fieldMap).forEach(([id, name]) => {
                const el = document.getElementById(id);
                if (el && el.value) {
                    formData.append(name, el.value.trim());
                }
            });

            // Additional data
            formData.append('phone', STATE.currentPhoneNumber || '');
            formData.append('emailVerified', STATE.isEmailVerified);
            formData.append('phoneVerified', STATE.isPhoneVerified);
            formData.append('_token', csrfToken);

            // Photo upload
            const photoInput = document.getElementById('photo-upload');
            if (photoInput?.files.length > 0) {
                const file = photoInput.files[0];
                if (file.size > CONFIG.MAX_PHOTO_SIZE_MB * 1024 * 1024) {
                    showAlert('error', `Profile photo must be smaller than ${CONFIG.MAX_PHOTO_SIZE_MB}MB.`);
                    return;
                }
                if (!file.type.startsWith('image/')) {
                    showAlert('error', 'Please upload a valid image file.');
                    return;
                }
                formData.append('profile', file);
            }

            // Frequency
            const selectedFrequency = document.querySelector('.frequency-option.selected');
            if (selectedFrequency) {
                formData.append('frequency', selectedFrequency.dataset.frequency);
            }

            // Newsletter
            const newsletterCheckbox = document.querySelector('.checkbox[data-checkbox="newsletter"]');
            formData.append('newsletter', newsletterCheckbox?.classList.contains('checked') ? '1' : '0');

            const response = await $.ajax({
                url: formElement.action,
                method: formElement.method,
                data: formData,
                processData: false,
                contentType: false
            });

            if (response.success) {
                showAlert('success', 'Account created successfully! Welcome to JeConfie!');
                toastr.success('Welcome to JeConfie!');
                setTimeout(() => {
                    window.location.href = response.redirect || '/';
                }, 1500);
            } else {
                showAlert('error', response.message || 'Something went wrong.');
                toastr.error(response.message || 'Error occurred');
            }
        } catch (xhr) {
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                const errors = xhr.responseJSON.errors;
                const message = Object.values(errors).flat().join('<br>');
                showAlert('error', message);
                toastr.error(Object.values(errors).flat()[0]);
            } else {
                const message = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                showAlert('error', message);
                toastr.error(message);
            }
        } finally {
            btn.disabled = false;
            btn.textContent = originalText;
        }
    }

    // ===== EVENT LISTENERS =====
    function initializeEventListeners() {
        // Name inputs
        document.getElementById('first-name')?.addEventListener('input', updateProfilePreview);
        document.getElementById('last-name')?.addEventListener('input', updateProfilePreview);

        // Frequency options
        document.querySelectorAll('.frequency-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.frequency-option').forEach(o => o.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Shipper type
        const shipperTypeSelect = document.getElementById('shipper-type');
        if (shipperTypeSelect) {
            shipperTypeSelect.addEventListener('change', function() {
                const companyNameGroup = document.getElementById('company-name-group');
                const companyNameInput = document.getElementById('company-name');

                if (this.value === 'business' || this.value === 'association') {
                    companyNameGroup.classList.remove('hidden');
                    companyNameInput.setAttribute('required', 'required');
                } else {
                    companyNameGroup.classList.add('hidden');
                    companyNameInput.removeAttribute('required');
                    companyNameInput.value = '';
                }
            });
        }
    }

    // ===== UTILITY FUNCTIONS =====
    function toggleCheckbox(checkbox) {
        checkbox.classList.toggle('checked');
    }

    function showAlert(type, message) {
        // Remove existing alerts
        document.querySelectorAll('.alert').forEach(alert => alert.remove());

        const iconMap = {
            success: '✓',
            error: '✗',
            info: 'ℹ'
        };

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.innerHTML = `<span>${iconMap[type] || 'ℹ'}</span><span>${message}</span>`;

        const activeSection = document.querySelector('.step-section.active');
        if (activeSection) {
            activeSection.insertBefore(alertDiv, activeSection.firstChild);
            setTimeout(() => alertDiv.remove(), 5000);
        }
    }

    function showLegalPage(pageType) {
        // Implement modal or redirect to legal page
        alert('Legal page: ' + pageType + ' (to be implemented)');
    }

    function switchToFrench() {
        alert('Switching to French version...');
    }

    // ===== INITIALIZE ON DOM READY =====
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeSignup);
    } else {
        initializeSignup();
    }

    console.log('Optimized signup script loaded successfully');
</script>
</body>
</html>
