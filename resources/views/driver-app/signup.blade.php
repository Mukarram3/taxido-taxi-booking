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
            <a href="{{ url('driver/login') }}" class="btn btn-ghost">Sign In</a>
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
                <p class="signup-subtitle">Create your account and start traveling with confidence</p>
            </div>

            <form action="{{url('driver/otp')}}" method="POST" id="signup-form">
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
                            Already have an account? <a href="{{ url('driver/login') }}">Sign In</a>
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
                            <button type="button" class="btn btn-primary btn-large btn-next"  id="send-verification-btn" onclick="sendVerificationEmail()">
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
                                    <input type="tel" id="phone-number"  name="phone" class="form-input phone-number" placeholder="6 12 34 56 78" required>
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
                    <!-- TRAVELER PREFERENCES -->
                    <div class="traveler-form active">
                        <!-- TRAVEL EXPERIENCE -->
                        <div class="form-section">
                            <h3 class="section-title">🎒 Travel Experience</h3>
                            <div class="experience-options">
                                <div class="experience-option selected" data-experience="beginner">
                                    <div class="experience-title">Beginner</div>
                                    <div class="experience-description">First trips</div>
                                </div>
                                <div class="experience-option" data-experience="intermediate">
                                    <div class="experience-title">Intermediate</div>
                                    <div class="experience-description">Regular travel</div>
                                </div>
                                <div class="experience-option" data-experience="expert">
                                    <div class="experience-title">Expert</div>
                                    <div class="experience-description">Frequent traveler</div>
                                </div>
                            </div>
                        </div>

                        <!-- TRANSPORT PREFERENCES -->
                        <div class="form-section">
                            <h3 class="section-title">🚀 Preferred Transport Methods</h3>
                            <div class="transport-preferences">
                                <div class="transport-pref" data-transport="flight">
                                    <div class="transport-icon">✈️</div>
                                    <div class="transport-name">Plane</div>
                                </div>
                                <div class="transport-pref" data-transport="ship">
                                    <div class="transport-icon">🚢</div>
                                    <div class="transport-name">Ferry</div>
                                </div>
                                <div class="transport-pref" data-transport="train">
                                    <div class="transport-icon">🚂</div>
                                    <div class="transport-name">Train</div>
                                </div>
                                <div class="transport-pref" data-transport="bus">
                                    <div class="transport-icon">🚌</div>
                                    <div class="transport-name">Bus</div>
                                </div>
                                <div class="transport-pref" data-transport="car">
                                    <div class="transport-icon">🚗</div>
                                    <div class="transport-name">Car</div>
                                </div>
                                <div class="transport-pref" data-transport="other">
                                    <div class="transport-icon">🛴</div>
                                    <div class="transport-name">Other</div>
                                </div>
                            </div>
                        </div>

                        <!-- TRAVEL FREQUENCY -->
                        <div class="form-section">
                            <h3 class="section-title">📅 Travel Frequency</h3>
                            <div class="form-group">
                                <select id="travel-frequency" class="form-select">
                                    <option value="">Select...</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="quarterly">Every 3 months</option>
                                    <option value="occasionally">Occasionally</option>
                                    <option value="rarely">Rarely</option>
                                </select>
                            </div>
                        </div>

                        <!-- DESTINATIONS -->
                        <div class="form-section">
                            <h3 class="section-title">🌍 Frequent Destinations</h3>
                            <div class="form-group">
                                <label class="form-label" for="destinations">
                                    Destinations (optional)
                                </label>
                                <textarea id="destinations" class="form-textarea" placeholder="List your usual destinations (ex: Paris, London, New York...)"></textarea>
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
    $(document).ready(function () {
        console.log('Complete integrated signup - Script started');

        // ---------- State ----------
        let currentStep = 1;
        let selectedPhoto = null;
        let currentPhoneNumber = '';
        let resendPhoneCountdown = 60;
        let resendEmailCountdown = 60;
        let resendPhoneTimer = null;
        let resendEmailTimer = null;
        let isEmailVerified = false;
        let isPhoneVerified = false;
        let currentEmailCaptcha = '';

        const stepTitles = [
            '', 'Account Type', 'Personal Info', 'Email Verification', 'Check Email', 'Phone Verification', 'Preferences', 'Complete Setup'
        ];

        // ---------- Helpers ----------
        function getCsrfToken() {
            // prefer meta tag via DOM; fallback to jQuery if present
            const meta = document.querySelector('meta[name="csrf-token"]');
            if (meta && meta.content) return meta.content;
            try {
                return $('meta[name="csrf-token"]').attr('content');
            } catch (e) {
                return '';
            }
        }

        function showAlert(type, message) {
            document.querySelectorAll('.alert').forEach(alert => alert.remove());

            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            alertDiv.innerHTML = `<span>${type === 'success' ? '✓' : type === 'error' ? '✗' : 'ℹ'}</span><span>${message}</span>`;

            const activeSection = document.querySelector('.step-section.active') || document.body;
            activeSection.insertBefore(alertDiv, activeSection.firstChild);

            setTimeout(() => {
                if (alertDiv.parentNode) alertDiv.remove();
            }, 5000);
        }

        // ---------- Progress ----------
        function updateProgress(step) {
            for (let i = 1; i <= 7; i++) {
                const stepEl = document.getElementById(`step-${i}`);
                const lineEl = document.getElementById(`line-${i}`);

                if (stepEl) {
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
                }

                if (lineEl) {
                    lineEl.className = i < step ? 'progress-line completed' : 'progress-line';
                }
            }

            const titleEl = document.getElementById('progress-title');
            if (titleEl) titleEl.textContent = stepTitles[step] || '';

            document.querySelectorAll('.step-section').forEach((section, index) => {
                section.classList.toggle('active', index + 1 === step);
            });
        }

        // ---------- Navigation (public) ----------
        function nextStep() {
            if (validateStep(currentStep)) {
                currentStep = Math.min(currentStep + 1, 7);
                updateProgress(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateProgress(currentStep);
            }
        }

        // Expose navigation for inline onclick handlers
        window.nextStep = nextStep;
        window.prevStep = prevStep;

        // ---------- Validation ----------
        function validateStep(step) {
            switch (step) {
                case 1:
                    return true; // assume account type preselected
                case 2: {
                    const firstName = (document.getElementById('first-name') || {}).value || '';
                    const lastName = (document.getElementById('last-name') || {}).value || '';
                    const profession = (document.getElementById('profession') || {}).value || '';
                    const birthDate = (document.getElementById('birth-date') || {}).value || '';

                    if (!firstName.trim() || !lastName.trim() || !profession.trim() || !birthDate.trim()) {
                        showAlert('error', 'Please fill in all required fields.');
                        return false;
                    }
                    return true;
                }
                case 3: {
                    const email = (document.getElementById('email') || {}).value || '';
                    const emailCaptcha = (document.getElementById('email-captcha-input') || {}).value || '';
                    if (!email.trim() || !email.includes('@')) {
                        showAlert('error', 'Please enter a valid email address.');
                        return false;
                    }
                    if (emailCaptcha.trim().toUpperCase() !== currentEmailCaptcha) {
                        showAlert('error', 'Incorrect verification code.');
                        generateEmailCaptcha();
                        return false;
                    }
                    return true;
                }
                case 5: {
                    const phoneNumber = (document.getElementById('phone-number') || {}).value || '';
                    if (!phoneNumber.trim()) {
                        showAlert('error', 'Please enter a phone number.');
                        return false;
                    }
                    return true;
                }
                case 7: {
                    const password = (document.getElementById('password') || {}).value || '';
                    const confirmPassword = (document.getElementById('confirm-password') || {}).value || '';
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
                }
                default:
                    return true;
            }
        }

        // ---------- Captcha ----------
        function generateEmailCaptcha() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let captcha = '';
            for (let i = 0; i < 6; i++) {
                captcha += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            currentEmailCaptcha = captcha;
            const display = document.getElementById('email-captcha-display');
            if (display) display.textContent = captcha;
            const input = document.getElementById('email-captcha-input');
            if (input) input.value = '';
        }

        // ---------- Photo upload ----------
        function triggerPhotoUpload() {
            const el = document.getElementById('photo-upload');
            if (el) el.click();
        }

        function handlePhotoUpload(event) {
            const input = event && event.target;
            if (!input) return;
            const file = input.files && input.files[0];
            if (!file) return;

            const MAX_SIZE_MB = 2;
            if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                showAlert('error', `File size must be less than ${MAX_SIZE_MB} MB.`);
                input.value = '';
                selectedPhoto = null;
                return;
            }

            if (!file.type.startsWith('image/')) {
                showAlert('error', 'Please select a valid image file (JPG, PNG, JPEG).');
                input.value = '';
                selectedPhoto = null;
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('photo-preview');
                if (!preview) return;
                preview.innerHTML = `
                <img src="${e.target.result}" alt="Profile picture" class="rounded-xl shadow-md">
                <div class="photo-overlay">📷</div>
            `;
                selectedPhoto = file;
            };
            reader.readAsDataURL(file);
        }

        // Expose photo helpers
        window.triggerPhotoUpload = triggerPhotoUpload;
        window.handlePhotoUpload = handlePhotoUpload;

        // ---------- Profile preview ----------
        function updateProfilePreview() {
            const firstName = (document.getElementById('first-name') || {}).value || '';
            const lastName = (document.getElementById('last-name') || {}).value || '';

            const preview = document.getElementById('photo-preview');
            if (!preview) return;

            if (firstName && lastName && !selectedPhoto) {
                const initials = firstName.charAt(0).toUpperCase() + lastName.charAt(0).toUpperCase();
                // Replace only when there's no img
                if (!preview.querySelector('img')) {
                    preview.innerHTML = `${initials}<div class="photo-overlay">📷</div>`;
                }
            }
        }

        // ---------- Email verification (send/resend/verify) ----------
        function sendVerificationEmail() {
            if (!validateStep(3)) return;

            const email = (document.getElementById('email') || {}).value || '';
            const btn = document.getElementById('send-verification-btn');
            const emailDisplay = document.getElementById('verification-email');
            const emailVerificationSection = document.getElementById('email-verification');
            const csrfToken = getCsrfToken();
            const url = '{{ url('driver/send-verification-email') }}';

            if (!email.trim()) {
                showAlert('error', 'Please enter a valid email address');
                return;
            }

            if (btn) {
                btn.disabled = true;
                btn.textContent = 'Sending...';
            }

            $.post(url, { email: email, _token: csrfToken })
                .done(function (res) {
                    if (emailDisplay) emailDisplay.textContent = email;
                    if (emailVerificationSection) emailVerificationSection.classList.remove('hidden');
                    showAlert('success', res.message || 'Verification email sent!');
                    startEmailResendCountdown();
                    nextStep();
                })
                .fail(function (xhr) {
                    const message = xhr.responseJSON?.message || 'Failed to send verification email';
                    showAlert('error', message);
                })
                .always(function () {
                    if (btn) {
                        btn.disabled = false;
                        btn.textContent = 'Send Verification Email';
                    }
                });
        }

        function resendVerificationEmail() {
            const email = (document.getElementById('email') || {}).value || '';
            if (!email.trim()) {
                showAlert('error', 'No email found to resend to.');
                return;
            }

            const url = '{{ url('driver/send-verification-email') }}';
            const csrfToken = getCsrfToken();

            $.post(url, { email: email, _token: csrfToken })
                .done(function (res) {
                    const emailDisplay = document.getElementById('verification-email');
                    const emailVerificationSection = document.getElementById('email-verification');
                    if (emailDisplay) emailDisplay.textContent = email;
                    if (emailVerificationSection) emailVerificationSection.classList.remove('hidden');
                    startEmailResendCountdown();
                    showAlert('success', res.message || 'Verification email sent again!');
                })
                .fail(function (xhr) {
                    showAlert('error', xhr.responseJSON?.message || 'Failed to send verification email');
                });
        }

        // wrapper name used in your event listeners
        function sendemailOTPCode() {
            // alias to resendVerificationEmail (preserves prior behavior)
            resendVerificationEmail();
        }

        function getEmailOTP() {
            const inputs = document.querySelectorAll('.email-otp-input');
            return Array.from(inputs).map(i => i.value.trim()).join('');
        }

        function verifyemailOTP() {
            const email = (document.getElementById('email') || {}).value || '';
            const code = getEmailOTP();

            if (!code || code.length === 0) {
                showAlert('error', 'Please enter the code.');
                return;
            }

            const url = '{{ url('driver/verify-email-code') }}';
            const csrfToken = getCsrfToken();

            $.post(url, { email: email, code: code, _token: csrfToken })
                .done(function (res) {
                    showAlert('success', res.message || 'Email verified!');
                    isEmailVerified = true;
                    const emailVerification = document.getElementById('email-verification');
                    if (emailVerification) emailVerification.classList.add('hidden');
                    if (window.toastr) toastr.success('Verified Successfully.');
                    nextStep();
                })
                .fail(function (xhr) {
                    const msg = xhr.responseJSON?.message || 'Invalid code. Please try again.';
                    showAlert('error', msg);
                    if (window.toastr) toastr.error(msg);
                });
        }

        // Expose email functions for inline usage
        window.sendVerificationEmail = sendVerificationEmail;
        window.resendVerificationEmail = resendVerificationEmail;
        window.sendemailOTPCode = sendemailOTPCode;
        window.verifyemailOTP = verifyemailOTP;

        // ---------- Phone verification (send/resend/verify) ----------
        function sendOTPCode() {
            if (!validateStep(5)) return;

            const btn = document.getElementById('send-sms-btn');
            const countryCode = (document.getElementById('country-code') || {}).value || '';
            const phoneNumber = (document.getElementById('phone-number') || {}).value || '';
            const phoneDisplay = document.getElementById('phone-display');
            const csrfToken = getCsrfToken();
            const url = '{{ url('driver/send-sms-code') }}';
            const phoneVerificationForm = document.querySelector('.phone-verification-form');
            const otpVerification = document.getElementById('otp-verification');

            if (!phoneNumber.trim()) {
                showAlert('error', 'Please enter your phone number');
                return;
            }

            const formattedPhone = `${countryCode}${phoneNumber.replace(/\s+/g, '')}`;

            if (btn) {
                btn.disabled = true;
                btn.textContent = 'Sending...';
            }

            $.post(url, { phone: formattedPhone, _token: csrfToken })
                .done(function (res) {
                    currentPhoneNumber = formattedPhone;
                    if (phoneDisplay) phoneDisplay.textContent = formattedPhone;
                    if (phoneVerificationForm) phoneVerificationForm.classList.add('hidden');
                    if (otpVerification) otpVerification.classList.remove('hidden');
                    showAlert('success', res.message || 'Verification code sent!');
                    startPhoneResendCountdown();
                    const firstOtp = document.querySelector('.otp-input');
                    if (firstOtp) firstOtp.focus();
                })
                .fail(function (xhr) {
                    const message = xhr.responseJSON?.message || 'Failed to send SMS code';
                    showAlert('error', message);
                })
                .always(function () {
                    if (btn) {
                        btn.disabled = false;
                        btn.textContent = 'Send SMS Code';
                    }
                });
        }

        function getPhoneOTP() {
            const inputs = document.querySelectorAll('.otp-input');
            return Array.from(inputs).map(i => i.value.trim()).join('');
        }

        function verifyOTP() {
            const otpInputs = document.querySelectorAll('.otp-input');
            const otpCode = getPhoneOTP();

            if (!otpCode || otpCode.length !== otpInputs.length) {
                showAlert('error', 'Please enter the complete code');
                return;
            }

            const csrfToken = getCsrfToken();
            const url = '{{ url('driver/verify-sms-code') }}';
            const phoneToVerify = (currentPhoneNumber || '').replace(/\s+/g, '');

            $.post(url, { phone: phoneToVerify, code: otpCode, _token: csrfToken })
                .done(function (res) {
                    showAlert('success', res.message || 'Phone verified successfully!');
                    if (window.toastr) toastr.success('Verified Successfully.');
                    isPhoneVerified = true;
                    const otpVerification = document.getElementById('otp-verification');
                    if (otpVerification) otpVerification.classList.add('hidden');
                    nextStep();
                })
                .fail(function (xhr) {
                    const message = xhr.responseJSON?.message || 'Invalid code. Please try again.';
                    showAlert('error', message);
                    if (window.toastr) toastr.error(message);
                    otpInputs.forEach(input => input.value = '');
                    if (otpInputs[0]) otpInputs[0].focus();
                });
        }

        // expose phone functions
        window.sendOTPCode = sendOTPCode;
        window.verifyOTP = verifyOTP;

        // ---------- OTP inputs handling ----------
        function initializeOTPInputs() {
            const otpInputs = Array.from(document.querySelectorAll('.otp-input'));
            const emailOtpInputs = Array.from(document.querySelectorAll('.email-otp-input'));

            function wireInputs(inputs, onCompleteCheck) {
                inputs.forEach((input, index) => {
                    input.setAttribute('maxlength', '1');
                    input.addEventListener('input', function (e) {
                        const v = e.target.value;
                        if (v.length >= 1 && index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
                        onCompleteCheck && onCompleteCheck();
                    });

                    input.addEventListener('keydown', function (e) {
                        if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                            inputs[index - 1].focus();
                        }
                    });
                });
            }

            wireInputs(otpInputs, checkOTPComplete);
            wireInputs(emailOtpInputs, checkEmailOTPComplete);
        }

        function checkOTPComplete() {
            const otpInputs = document.querySelectorAll('.otp-input');
            const verifyBtn = document.getElementById('verify-otp-btn');
            let isComplete = true;
            otpInputs.forEach(input => {
                if ((input.value || '').length !== 1) isComplete = false;
            });
            if (verifyBtn) verifyBtn.disabled = !isComplete;
        }

        function checkEmailOTPComplete() {
            const otpInputs = document.querySelectorAll('.email-otp-input');
            const verifyBtn = document.getElementById('verify-email-otp-btn');
            let isComplete = true;
            otpInputs.forEach(input => {
                if ((input.value || '').length !== 1) isComplete = false;
            });
            if (verifyBtn) verifyBtn.disabled = !isComplete;
        }

        // ---------- Resend countdowns ----------
        function startPhoneResendCountdown() {
            // clear existing
            if (resendPhoneTimer) clearInterval(resendPhoneTimer);
            resendPhoneCountdown = 60;

            const timerElement = document.getElementById('countdown');
            const resendTimerElement = document.getElementById('resend-timer');
            const resendBtnElement = document.getElementById('resend-btn');

            if (resendBtnElement) resendBtnElement.classList.add('hidden');
            if (resendTimerElement) resendTimerElement.classList.remove('hidden');

            resendPhoneTimer = setInterval(() => {
                resendPhoneCountdown--;
                if (timerElement) timerElement.textContent = resendPhoneCountdown;
                if (resendPhoneCountdown <= 0) {
                    clearInterval(resendPhoneTimer);
                    if (resendTimerElement) resendTimerElement.classList.add('hidden');
                    if (resendBtnElement) resendBtnElement.classList.remove('hidden');
                }
            }, 1000);
        }

        function startEmailResendCountdown() {
            if (resendEmailTimer) clearInterval(resendEmailTimer);
            resendEmailCountdown = 60;

            const timerElement = document.getElementById('emailcountdown');
            const resendTimerElement = document.getElementById('resend-email-timer');
            const resendBtnElement = document.getElementById('resend-email-btn');

            if (resendBtnElement) resendBtnElement.classList.add('hidden');
            if (resendTimerElement) resendTimerElement.classList.remove('hidden');

            resendEmailTimer = setInterval(() => {
                resendEmailCountdown--;
                if (timerElement) timerElement.textContent = resendEmailCountdown;
                if (resendEmailCountdown <= 0) {
                    clearInterval(resendEmailTimer);
                    if (resendTimerElement) resendTimerElement.classList.add('hidden');
                    if (resendBtnElement) resendBtnElement.classList.remove('hidden');
                }
            }, 1000);
        }

        // ---------- Final signup ----------
        async function completeSignup() {
            if (!validateStep(7)) return;

            const formElement = document.getElementById('signup-form');
            if (!formElement) {
                showAlert('error', 'Signup form not found.');
                return;
            }
            const btn = document.getElementById('complete-signup-btn');
            const formData = new FormData(formElement);

            formData.set('phone', (currentPhoneNumber || '').replace(/\s+/g, ''));
            formData.set('emailVerified', isEmailVerified ? 'true' : 'false');
            formData.set('phoneVerified', isPhoneVerified ? 'true' : 'false');
            formData.append('_token', getCsrfToken());

            // experience
            const selectedExperience = document.querySelector('.experience-option.selected');
            if (selectedExperience) {
                formData.set('experience', (selectedExperience.dataset.value || selectedExperience.textContent).trim());
            }

            // transports
            const selectedTransports = document.querySelectorAll('.transport-pref.selected');
            // remove any existing 'transports' keys (FormData doesn't have delete for keys with indexes reliably),
            // we'll append fresh fields.
            let idx = 0;
            selectedTransports.forEach(el => {
                formData.append(`transports[${idx}]`, (el.dataset.value || el.textContent).trim());
                idx++;
            });

            // optional file
            if (selectedPhoto instanceof File) {
                formData.set('profile', selectedPhoto);
            }

            if (btn) {
                btn.disabled = true;
                btn.textContent = 'Submitting...';
            }

            $.ajax({
                url: formElement.action,
                method: formElement.method || 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    showAlert('success', response.success || 'Account created successfully! Welcome!');
                    setTimeout(() => { window.location.href = '/'; }, 1500);
                },
                error: function (xhr) {
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        let message = '';
                        for (const [field, msgs] of Object.entries(xhr.responseJSON.errors)) {
                            message += msgs.join('<br>') + '<br>';
                        }
                        if (window.toastr) toastr.error(message);
                        showAlert('error', message);
                    } else {
                        if (window.toastr) toastr.error('Something went wrong. Please try again.');
                        showAlert('error', 'Something went wrong. Please try again.');
                    }
                },
                complete: function () {
                    if (btn) {
                        btn.disabled = false;
                        btn.textContent = 'Complete Signup';
                    }
                }
            });
        }

        // Expose completeSignup
        window.completeSignup = completeSignup;

        // ---------- Initialization ----------
        function initializeEventListeners() {
            try {
                const travelerForm = document.querySelector('.traveler-form');
                if (travelerForm) travelerForm.classList.add('active');

                const firstNameEl = document.getElementById('first-name');
                const lastNameEl = document.getElementById('last-name');
                if (firstNameEl) firstNameEl.addEventListener('input', updateProfilePreview);
                if (lastNameEl) lastNameEl.addEventListener('input', updateProfilePreview);

                document.querySelectorAll('.experience-option').forEach(option => {
                    option.addEventListener('click', function () {
                        document.querySelectorAll('.experience-option').forEach(o => o.classList.remove('selected'));
                        this.classList.add('selected');
                    });
                });

                document.querySelectorAll('.transport-pref').forEach(pref => {
                    pref.addEventListener('click', function () {
                        this.classList.toggle('selected');
                    });
                });

                document.querySelectorAll('.frequency-option').forEach(option => {
                    option.addEventListener('click', function () {
                        document.querySelectorAll('.frequency-option').forEach(o => o.classList.remove('selected'));
                        this.classList.add('selected');
                    });
                });

                const shipperTypeSelect = document.getElementById('shipper-type');
                if (shipperTypeSelect) {
                    shipperTypeSelect.addEventListener('change', function () {
                        const companyNameGroup = document.getElementById('company-name-group');
                        const companyNameInput = document.getElementById('company-name');
                        if (this.value === 'business' || this.value === 'association') {
                            if (companyNameGroup) companyNameGroup.style.display = 'block';
                            if (companyNameInput) companyNameInput.setAttribute('required', 'required');
                        } else {
                            if (companyNameGroup) companyNameGroup.style.display = 'none';
                            if (companyNameInput) companyNameInput.removeAttribute('required');
                        }
                    });
                }

                document.querySelectorAll('.checkbox').forEach(checkbox => {
                    checkbox.addEventListener('click', function () {
                        this.classList.toggle('checked');
                    });
                });

                const resendBtn = document.getElementById('resend-btn');
                if (resendBtn) resendBtn.addEventListener('click', sendOTPCode);

                const resendEmailBtn = document.getElementById('resend-email-btn');
                if (resendEmailBtn) resendEmailBtn.addEventListener('click', sendemailOTPCode);

                // file input change
                const photoInput = document.getElementById('photo-upload');
                if (photoInput) photoInput.addEventListener('change', handlePhotoUpload);

                // OTP initialize
                initializeOTPInputs();

                // If you have inline buttons (onclick="..."), they will still work because we exposed via window.*
            } catch (e) {
                console.error('Error initializing event listeners', e);
            }
        }

        // Flatpickr init (single place)
        try {
            if (typeof flatpickr !== 'undefined') {
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
        } catch (e) {
            console.warn('flatpickr init failed', e);
        }

        // generate captcha and initialize
        function initializeSignup() {
            generateEmailCaptcha();
            initializeEventListeners();
            updateProgress(currentStep);
        }

        // initialize immediately
        initializeSignup();

        console.log('Complete signup script loaded');
    });
</script>

</body>
</html>
