<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="taxido">
    <meta name="keywords" content="taxido">
    <meta name="author" content="taxido">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon">
    <title>Create Account - JeConfie</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .flatpickr-wrapper{
            display: inline-grid !important;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            color: #1a202c;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
        }

        /* VARIABLES */
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
        }

        /* NAVIGATION */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 72px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
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
            font-size: 18px;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 32px;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
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

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.4);
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

        /* MAIN CONTENT */
        .main-content {
            margin-top: 72px;
            min-height: calc(100vh - 72px);
            padding: 40px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-container {
            max-width: 650px;
            width: 100%;
            margin: 0 24px;
        }

        /* SIGNUP CARD */
        .signup-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* PROGRESS INDICATOR */
        .progress-container {
            margin-bottom: 32px;
        }

        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-bottom: 16px;
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
            font-size: 12px;
            color: var(--text-light);
            transition: all 0.3s ease;
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
            transition: all 0.3s ease;
        }

        .progress-line.completed {
            background: var(--success);
        }

        .progress-title {
            text-align: center;
            font-size: 14px;
            color: var(--text-light);
            font-weight: 600;
        }

        .language-switch {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 8px;
        }

        .lang-btn {
            padding: 6px 12px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .lang-btn.active {
            background: white;
            color: var(--primary);
        }

        .lang-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .signup-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .signup-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .signup-subtitle {
            color: var(--text-light);
            font-size: 14px;
        }

        /* STEP SECTIONS */
        .step-section {
            display: none;
        }

        .step-section.active {
            display: block;
        }

        /* ACCOUNT TYPE SELECTOR */
        .account-types {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        .account-type {
            border: 2px solid var(--border);
            border-radius: 16px;
            padding: 20px 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .account-type.selected {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        .account-type-icon {
            font-size: 2rem;
            margin-bottom: 8px;
        }

        .account-type-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
            font-size: 1rem;
        }

        .account-type-description {
            font-size: 12px;
            color: var(--text-light);
            line-height: 1.4;
        }

        /* PHOTO UPLOAD */
        .photo-upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 24px;
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
            margin-bottom: 16px;
            border: 4px solid white;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
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
            font-size: 14px;
            border: 3px solid white;
        }

        .photo-upload-input {
            display: none;
        }

        .photo-upload-btn {
            background: none;
            border: 2px dashed var(--border);
            border-radius: 8px;
            padding: 12px 24px;
            color: var(--primary);
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .photo-upload-btn:hover {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        /* EMAIL VERIFICATION */
        .verification-container {
            text-align: center;
            margin: 24px 0;
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
            margin: 0 auto 20px;
            box-shadow: 0 8px 24px rgba(6, 182, 212, 0.3);
        }

        .verification-email {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
            margin-bottom: 16px;
        }

        .verification-steps {
            background: var(--light);
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }

        .verification-step {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            font-size: 14px;
            color: var(--text);
        }

        .verification-step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            width: 24px;
            height: 24px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            flex-shrink: 0;
        }

        /* OTP VERIFICATION */
        .otp-container {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin: 24px 0;
        }

        .otp-input, .email-otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border: 2px solid var(--border);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .otp-input:focus, .email-otp-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .otp-info {
            background: rgba(6, 182, 212, 0.1);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin: 20px 0;
            text-align: center;
        }

        .otp-info-text {
            font-size: 13px;
            color: #0891b2;
            margin-bottom: 12px;
        }

        .resend-timer, .resend-email-timer {
            font-size: 14px;
            color: var(--text-light);
        }

        .resend-btn {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            text-decoration: underline;
            font-size: 14px;
        }

        .phone-display {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
            margin-bottom: 16px;
        }

        /* CAPTCHA */
        .captcha-container {
            background: var(--light);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        .captcha-display {
            font-family: 'Courier New', monospace;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 8px;
            color: var(--dark);
            background: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 16px;
            user-select: none;
            text-decoration: line-through;
            text-decoration-color: rgba(0,0,0,0.3);
        }

        .captcha-refresh {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-size: 14px;
            text-decoration: underline;
        }

        .captcha-refresh:hover {
            color: var(--primary-dark);
        }

        /* FORM ELEMENTS */
        .form-section {
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .form-grid.two-columns {
            grid-template-columns: 1fr 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

        .required {
            color: var(--danger);
        }

        .form-input, .form-select, .form-textarea {
            padding: 12px 14px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
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
            gap: 8px;
        }

        .country-select {
            flex: 0 0 100px;
        }

        .phone-number {
            flex: 1;
        }

        /* EXPERIENCE & PREFERENCES */
        .experience-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .experience-option {
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: 12px 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .experience-option.selected {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        .experience-title {
            font-weight: 600;
            font-size: 13px;
            color: var(--dark);
            margin-bottom: 2px;
        }

        .experience-description {
            font-size: 11px;
            color: var(--text-light);
        }

        .transport-preferences {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .transport-pref {
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .transport-pref.selected {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        .transport-icon {
            font-size: 1.5rem;
            margin-bottom: 4px;
        }

        .transport-name {
            font-size: 12px;
            font-weight: 600;
            color: var(--dark);
        }

        .frequency-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .frequency-option {
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: 16px 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .frequency-option.selected {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
        }

        .frequency-title {
            font-weight: 600;
            font-size: 14px;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .frequency-description {
            font-size: 11px;
            color: var(--text-light);
        }

        /* VERIFICATION INFO */
        .verification-info {
            background: rgba(6, 182, 212, 0.1);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin: 16px 0;
        }

        .verification-title {
            font-weight: 600;
            color: #0891b2;
            font-size: 14px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .verification-text {
            font-size: 13px;
            color: #0891b2;
            line-height: 1.4;
        }

        /* TERMS */
        .terms-section {
            margin: 24px 0;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid var(--border);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .checkbox.checked {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .checkbox-label {
            font-size: 13px;
            color: var(--text);
            line-height: 1.4;
            cursor: pointer;
        }

        .checkbox-label a {
            color: var(--primary);
            text-decoration: none;
        }

        .checkbox-label a:hover {
            text-decoration: underline;
        }

        /* FORM SPECIFIC SECTIONS */
        .traveler-form, .shipper-form {
            display: none;
        }

        .traveler-form.active, .shipper-form.active {
            display: block;
        }

        /* ALERTS */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 16px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
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

        /* FORM ACTIONS */
        .form-actions {
            margin-top: 32px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-large {
            padding: 16px 24px;
            font-size: 16px;
            border-radius: 12px;
            width: 100%;
        }

        .step-navigation {
            display: flex;
            gap: 12px;
        }

        .btn-back {
            flex: 1;
        }

        .btn-next {
            flex: 2;
        }

        .login-link {
            text-align: center;
            font-size: 14px;
            color: var(--text-light);
            margin-top: 16px;
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .signup-card {
                padding: 24px;
                margin: 0 16px;
            }

            .form-grid.two-columns {
                grid-template-columns: 1fr;
            }

            .account-types {
                grid-template-columns: 1fr;
            }

            .experience-options, .transport-preferences {
                grid-template-columns: 1fr;
            }

            .otp-container {
                gap: 8px;
            }

            .otp-input {
                width: 45px;
                height: 45px;
                font-size: 16px;
            }

            .email-otp-input {
                width: 45px;
                height: 45px;
                font-size: 16px;
            }

            .language-switch {
                position: static;
                justify-content: center;
                margin-bottom: 20px;
            }

            .progress-steps {
                gap: 4px;
            }

            .progress-step {
                width: 32px;
                height: 32px;
                font-size: 11px;
            }

            .progress-line {
                width: 20px;
            }
        }

        .hidden {
            display: none !important;
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

                <!-- STEP 1: ACCOUNT TYPE & PHOTO -->
                <div class="step-section active" id="step-section-1">
                    <!-- PHOTO UPLOAD -->
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
                                <input type="text" id="first-name" name="first-name" class="form-input" placeholder="Your first name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="last-name">
                                    Last Name <span class="required">*</span>
                                </label>
                                <input type="text" id="last-name" name="last-name" class="form-input" placeholder="Your last name" required>
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

                        <!-- CAPTCHA ANTI-SPAM -->
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
                            <button type="button" class="btn btn-primary btn-large btn-next" onclick="sendVerificationEmail()">
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

                        <!-- OTP VERIFICATION -->
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
                                <button type="button" class="btn btn-primary btn-large" id="verify-email-otp-btn" disabled onclick="verifyemailOTP()">
                                    Verify Code
                                </button>
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
                            <button type="button" class="btn btn-primary btn-large" onclick="sendOTPCode()">
                                Send SMS Code
                            </button>
                        </div>
                    </div>

                    <!-- OTP VERIFICATION -->
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
                                <button type="button" class="resend-btn hidden" id="resend-btn">Resend code</button>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-primary btn-large" id="verify-otp-btn" disabled onclick="verifyOTP()">
                                Verify Code
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 6: ACCOUNT PREFERENCES -->
                <div class="step-section" id="step-section-6">
                    <!-- SHIPPER PREFERENCES -->
                    <div class="shipper-form active">
                        <!-- SHIPPING PROFILE -->
                        <div class="form-section">
                            <h3 class="section-title">🏢 Shipping Profile</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="shipper-type">
                                        Account Type <span class="required">*</span>
                                    </label>
                                    <select id="shipper-type" class="form-select" required>
                                        <option value="">Select...</option>
                                        <option value="individual">Individual</option>
                                        <option value="business">Business</option>
                                        <option value="association">Association</option>
                                    </select>
                                </div>
                                <div class="form-group" id="company-name-group" style="display: none;">
                                    <label class="form-label" for="company-name">
                                        Company Name <span class="required">*</span>
                                    </label>
                                    <input type="text" id="company-name" class="form-input" placeholder="Your company name">
                                </div>
                            </div>
                        </div>

                        <!-- SHIPPING FREQUENCY -->
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

                        <!-- PACKAGE TYPES -->
                        <div class="form-section">
                            <h3 class="section-title">📋 Typical Package Types</h3>
                            <div class="form-group">
                                <label class="form-label" for="package-types">
                                    Describe your typical shipments
                                </label>
                                <textarea id="package-types" name="package_types" class="form-textarea" placeholder="Ex: Documents, handmade products, commercial samples, personal gifts..."></textarea>
                            </div>
                        </div>

                        <!-- SPECIAL REQUIREMENTS -->
                        <div class="form-section">
                            <h3 class="section-title">⚡ Specific Needs</h3>
                            <div class="form-group">
                                <label class="form-label" for="special-requirements">
                                    Special Requirements (optional)
                                </label>
                                <textarea id="special-requirements" class="form-textarea" placeholder="Ex: Express delivery, delicate handling, enhanced insurance..."></textarea>
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
                    <!-- PASSWORD SETUP -->
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
                                <input type="password" id="confirm-password" name="confirm-password" class="form-input" placeholder="Re-enter your password" required>
                            </div>
                        </div>
                    </div>

                    <!-- IDENTITY VERIFICATION INFO -->
                    <div class="verification-info">
                        <div class="verification-title">
                            🛡️ Identity Verification
                        </div>
                        <div class="verification-text">
                            To ensure everyone's safety, identity verification will be required after registration. You will receive an email with the steps to follow.
                        </div>
                    </div>

                    <!-- TERMS AND CONDITIONS -->
                    <div class="terms-section">
                        <div class="checkbox-group">
                            <div class="checkbox" data-checkbox="terms">✓</div>
                            <label class="checkbox-label" for="terms">
                                I accept the <a href="#" onclick="showLegalPage('terms-of-use')">Terms of Use</a> and <a href="#" onclick="showLegalPage('terms-of-sale')">Terms of Sale</a> of JeConfie.
                            </label>
                        </div>

                        <div class="checkbox-group">
                            <div class="checkbox" data-checkbox="privacy">✓</div>
                            <label class="checkbox-label" for="privacy">
                                I accept the <a href="#" onclick="showLegalPage('privacy-policy')">Privacy Policy</a> and the processing of my personal data in accordance with GDPR.
                            </label>
                        </div>

                        <div class="checkbox-group">
                            <div class="checkbox" data-checkbox="newsletter">✓</div>
                            <label class="checkbox-label" for="newsletter">
                                I want to receive JeConfie news and special offers by email (optional).
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="step-navigation">
                            <button type="button" class="btn btn-secondary btn-large btn-back" onclick="prevStep()">
                                Back
                            </button>
                            <button type="button" class="btn btn-primary btn-large btn-next" onclick="completeSignup()">
                                Create My Account
                            </button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    console.log('Complete integrated signup - Script started');

    // Variables
    let currentStep = 1;
    let selectedPhoto = null;
    let currentPhoneNumber = '';
    let resendCountdown = 60;
    let resendemailCountdown = 60;
    let resendTimer = null;
    let isEmailVerified = false;
    let isPhoneVerified = false;
    let currentEmailCaptcha = '';

    const stepTitles = [
        '', 'Account Type', 'Personal Info', 'Email Verification', 'Check Email', 'Phone Verification', 'Preferences', 'Complete Setup'
    ];

    // Initialization
    function initializeSignup() {
        generateEmailCaptcha();
        initializeOTPInputs();
        initializeEventListeners();
    }

    // Photo upload functions
    function triggerPhotoUpload() {
        document.getElementById('photo-upload').click();
    }

    function handlePhotoUpload(event) {
        const file = event.target.files[0];
        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                showAlert('error', 'File size must be less than 5MB.');
                return;
            }

            if (!file.type.startsWith('image/')) {
                showAlert('error', 'Please select an image file.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('photo-preview');
                preview.innerHTML = `<img src="${e.target.result}" alt="Profile picture"><div class="photo-overlay">📷</div>`;
                selectedPhoto = file;
            };
            reader.readAsDataURL(file);
        }
    }

    // Update profile preview with initials
    function updateProfilePreview() {
        const firstName = document.getElementById('first-name').value;
        const lastName = document.getElementById('last-name').value;

        if (firstName && lastName && !selectedPhoto) {
            const preview = document.getElementById('photo-preview');
            const initials = firstName.charAt(0).toUpperCase() + lastName.charAt(0).toUpperCase();
            if (!preview.querySelector('img')) {
                preview.innerHTML = `${initials}<div class="photo-overlay">📷</div>`;
            }
        }
    }

    // Language switch
    function switchToFrench() {
        alert('Switching to French version...');
    }

    // Progress management
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

        document.getElementById('progress-title').textContent = stepTitles[step];

        document.querySelectorAll('.step-section').forEach((section, index) => {
            section.classList.toggle('active', index + 1 === step);
        });
    }

    // Navigation
    function nextStep() {
        if (validateStep(currentStep)) {
            currentStep++;
            updateProgress(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            updateProgress(currentStep);
        }
    }

    // Step validation
    function validateStep(step) {
        switch (step) {
            case 1:
                return true; // Account type always selected by default

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

                if (emailCaptcha !== currentEmailCaptcha) {
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

                if (!termsCheckbox || !termsCheckbox.classList.contains('checked')) {
                    showAlert('error', 'You must accept the terms of use.');
                    return false;
                }

                if (!privacyCheckbox || !privacyCheckbox.classList.contains('checked')) {
                    showAlert('error', 'You must accept the privacy policy.');
                    return false;
                }
                return true;

            default:
                return true;
        }
    }

    // Captcha functions
    function generateEmailCaptcha() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let captcha = '';
        for (let i = 0; i < 6; i++) {
            captcha += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        currentEmailCaptcha = captcha;
        document.getElementById('email-captcha-display').textContent = captcha;
        document.getElementById('email-captcha-input').value = '';
    }

    // Email verification
    function sendVerificationEmail() {
        if (!validateStep(3)) return;

        const email = document.getElementById('email').value.trim();
        document.getElementById('verification-email').textContent = email;
        document.getElementById('email-verification').classList.remove('hidden');

        var url = '{{ url('driver/send-verification-email') }}';

        $.post(url, { email: email, _token: $('meta[name="csrf-token"]').attr('content') })
            .done(function(res) {
                document.getElementById('verification-email').textContent = email;
                document.getElementById('email-verification').classList.remove('hidden');
                showAlert('success', res.message);
                startemailResendCountdown();
                nextStep();
            })
            .fail(function(xhr) {
                showAlert('error', xhr.responseJSON.message || 'Failed to send verification email');
            });
        showAlert('success', 'Verification email sent!');
    }

    function getEmailOTP() {
        const emailotpInputs = document.querySelectorAll('.email-otp-input');
        return Array.from(emailotpInputs).map(input => input.value.trim()).join('');
    }

    function resendVerificationEmail() {

        const email = document.getElementById('email').value.trim();
        document.getElementById('verification-email').textContent = email;
        document.getElementById('email-verification').classList.remove('hidden');

        var url = '{{ url('driver/send-verification-email') }}';

        $.post(url, { email: email, _token: $('meta[name="csrf-token"]').attr('content') })
            .done(function(res) {
                document.getElementById('verification-email').textContent = email;
                document.getElementById('email-verification').classList.remove('hidden');
                startemailResendCountdown();
                showAlert('success', res.message);
            })
            .fail(function(xhr) {
                showAlert('error', xhr.responseJSON.message || 'Failed to send verification email');
            });
        showAlert('success', 'Verification email sent again!');
    }

    function simulateEmailVerification() {
        isEmailVerified = true;
        showAlert('success', 'Email verified successfully!');
        nextStep();
    }

    // Phone verification
    function sendOTPCode() {
        if (!validateStep(5)) return;

        const countryCode = document.getElementById('country-code').value;
        const phoneNumber = document.getElementById('phone-number').value.trim();
        currentPhoneNumber = countryCode + ' ' + phoneNumber;
        var url = '{{ url('driver/send-sms-code') }}';
        // Call backend
        $.post(url, {
            phone: currentPhoneNumber,
            _token: $('meta[name="csrf-token"]').attr('content')
        })
            .done(function(res) {
                document.getElementById('phone-display').textContent = currentPhoneNumber;
                document.querySelector('.phone-verification-form').classList.add('hidden');
                document.getElementById('otp-verification').classList.remove('hidden');
                showAlert('success', res.message);
                startResendCountdown();
                document.querySelector('.otp-input').focus();
            })
            .fail(function(xhr) {
                showAlert('error', xhr.responseJSON.message || 'Failed to send SMS');
            });
    }

    // OTP management
    function initializeOTPInputs() {
        const otpInputs = document.querySelectorAll('.otp-input');
        const emailotpInputs = document.querySelectorAll('.email-otp-input');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (e.target.value.length === 1) {
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }
                checkOTPComplete();
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });

        emailotpInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (e.target.value.length === 1) {
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }
                checkemailOTPComplete();
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    emailotpInputs[index - 1].focus();
                }
            });
        });
    }

    function checkOTPComplete() {
        const otpInputs = document.querySelectorAll('.otp-input');
        const verifyBtn = document.getElementById('verify-otp-btn');

        let isComplete = true;
        otpInputs.forEach(input => {
            if (input.value.length !== 1) {
                isComplete = false;
            }
        });

        verifyBtn.disabled = !isComplete;
    }

    function checkemailOTPComplete() {
        const otpInputs = document.querySelectorAll('.email-otp-input');
        const verifyBtn = document.getElementById('verify-email-otp-btn');

        let isComplete = true;
        otpInputs.forEach(input => {
            if (input.value.length !== 1) {
                isComplete = false;
            }
        });

        verifyBtn.disabled = !isComplete;
    }

    function verifyOTP() {
        const otpInputs = document.querySelectorAll('.otp-input');
        let otpCode = '';

        otpInputs.forEach(input => {
            otpCode += input.value;
        });

        if (otpCode.length !== otpInputs.length) {
            showAlert('error', 'Please enter the complete code');
            return;
        }
        var url = '{{ url('driver/verify-sms-code') }}';
        $.post(url, {
            phone: currentPhoneNumber,
            code: otpCode,
            _token: $('meta[name="csrf-token"]').attr('content')
        })
            .done(function(res) {
                showAlert('success', res.message);
                toastr.success('Verified Successfully.');
                isPhoneVerified = true; // mark verified
                document.getElementById('otp-verification').classList.add('hidden');
                nextStep();
            })
            .fail(function(xhr) {
                showAlert('error', 'Invalid code. Please try again.');
                otpInputs.forEach(input => input.value = '');
                otpInputs[0].focus();
                checkOTPComplete();
                toastr.error('Invalid code. Please try again.');
                showAlert('error', xhr.responseJSON.message || 'Invalid code');
            });
    }

    function verifyemailOTP() {

        const email = document.getElementById('email').value.trim();
        const code = getEmailOTP();

        var url = '{{url('driver/verify-email-code')}}';

        $.post(url, { email: email, code: code, _token: $('meta[name="csrf-token"]').attr('content') })
            .done(function(res) {
                showAlert('success', res.message);
                isPhoneVerified = true;
                document.getElementById('email-verification').classList.add('hidden');
                toastr.success('Verified Successfully.');
                nextStep();
            })
            .fail(function(xhr) {
                toastr.error('Invalid code. Please try again.');
                showAlert('error', 'Invalid code. Please try again.');
                checkemailOTPComplete();
            });
    }

    function startResendCountdown() {
        resendCountdown = 60;
        const timerElement = document.getElementById('countdown');
        const resendTimerElement = document.getElementById('resend-timer');
        const resendBtnElement = document.getElementById('resend-btn');

        resendBtnElement.classList.add('hidden');
        resendTimerElement.classList.remove('hidden');

        resendTimer = setInterval(() => {
            resendCountdown--;
            timerElement.textContent = resendCountdown;

            if (resendCountdown <= 0) {
                clearInterval(resendTimer);
                resendTimerElement.classList.add('hidden');
                resendBtnElement.classList.remove('hidden');
            }
        }, 1000);
    }
    function startemailResendCountdown() {
        resendCountdown = 60;
        const timerElement = document.getElementById('emailcountdown');
        const resendTimerElement = document.getElementById('resend-email-timer');
        const resendBtnElement = document.getElementById('resend-email-btn');

        resendBtnElement.classList.add('hidden');
        resendTimerElement.classList.remove('hidden');

        resendTimer = setInterval(() => {
            resendCountdown--;
            timerElement.textContent = resendCountdown;

            if (resendCountdown <= 0) {
                clearInterval(resendTimer);
                resendTimerElement.classList.add('hidden');
                resendBtnElement.classList.remove('hidden');
            }
        }, 1000);
    }

    // Final signup
    function completeSignup() {
        if (!validateStep(7)) return;
        let formElement = document.getElementById('signup-form');
        let formData = new FormData();

        formData.append('firstName', document.getElementById('first-name').value);
        formData.append('lastName', document.getElementById('last-name').value);
        formData.append('profession', document.getElementById('profession').value);
        formData.append('birthDate', document.getElementById('birth-date').value);
        formData.append('address', document.getElementById('address').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('shipperType', document.getElementById('shipper-type').value);
        formData.append('companyName', document.getElementById('company-name').value);
        formData.append('packageTypes', document.getElementById('package-types').value);
        formData.append('specialRequirements', document.getElementById('special-requirements').value);
        formData.append('phone', currentPhoneNumber);
        formData.append('password', document.getElementById('password').value);
        formData.append('emailVerified', isEmailVerified);
        formData.append('phoneVerified', isPhoneVerified);

        if (selectedPhoto) {
            formData.append('photo', selectedPhoto); // Must be a File object
        }
        const selectedfrequencyOption = document.querySelectorAll('.frequency-option.selected');
        if (selectedfrequencyOption.length > 0) {
            selectedfrequencyOption.forEach((el, i) => {
                formData.append(`frequencyOption[${i}]`, el.dataset.value || el.textContent);
            });
        }
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        console.log('Complete signup data:', formData);

        $.ajax({
            url: formElement.action,
            method: formElement.method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success){
                    showAlert('success', 'Account created successfully! Welcome to JeConfie!');
                    setTimeout(() => {
                        window.location.href = '/user/home';
                    }, 2000);
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let message = '';
                    for (const field in errors) {
                        message += errors[field].join('<br>') + '<br>';
                    }
                    toastr.error(message);
                    showAlert('error', message); // show all validation errors
                } else {
                    toastr.error('Something went wrong. Please try again.');
                    showAlert('error', 'Something went wrong. Please try again.');
                }
            }
        });
    }

    // Event listeners initialization
    function initializeEventListeners() {
        const shipperForm = document.querySelector('.shipper-form');

        shipperForm.classList.add('active');

        // Name inputs for profile preview
        document.getElementById('first-name').addEventListener('input', updateProfilePreview);
        document.getElementById('last-name').addEventListener('input', updateProfilePreview);

        // Shipping frequency
        document.querySelectorAll('.frequency-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.frequency-option').forEach(o => o.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Shipper type change
        const shipperTypeSelect = document.getElementById('shipper-type');
        if (shipperTypeSelect) {
            shipperTypeSelect.addEventListener('change', function() {
                const companyNameGroup = document.getElementById('company-name-group');
                const companyNameInput = document.getElementById('company-name');

                if (this.value === 'business' || this.value === 'association') {
                    companyNameGroup.style.display = 'block';
                    companyNameInput.setAttribute('required', 'required');
                } else {
                    companyNameGroup.style.display = 'none';
                    companyNameInput.removeAttribute('required');
                }
            });
        }

        // Checkboxes
        document.querySelectorAll('.checkbox').forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                this.classList.toggle('checked');
            });
        });

        // Resend button
        document.getElementById('resend-btn').addEventListener('click', function() {
            sendOTPCode();
        });
    }

    // Utility functions
    function showAlert(type, message) {
        document.querySelectorAll('.alert').forEach(alert => alert.remove());

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.innerHTML = `<span>${type === 'success' ? '✓' : type === 'error' ? '✗' : 'ℹ'}</span><span>${message}</span>`;

        const activeSection = document.querySelector('.step-section.active');
        activeSection.insertBefore(alertDiv, activeSection.firstChild);

        setTimeout(() => alertDiv.remove(), 5000);
    }

    function showLegalPage(pageType) {
        alert('Legal page: ' + pageType + ' (to be implemented)');
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeSignup);
    } else {
        initializeSignup();
    }

    $(document).ready(function (){
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
    });

    console.log('Complete signup script loaded');
</script>
</body>
</html>
