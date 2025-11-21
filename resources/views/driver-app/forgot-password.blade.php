<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe - Je Confie</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
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

        /* Language Management */
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: inline-block;
        }

        /* Language Switcher */
        .lang-switcher {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 4px;
            background: white;
            padding: 4px;
            border-radius: 100px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 100;
        }

        .lang-btn {
            padding: 8px 16px;
            border: none;
            background: transparent;
            border-radius: 100px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--gray);
        }

        .lang-btn.active {
            background: var(--primary);
            color: white;
        }

        /* Reset Container */
        .reset-container {
            width: 100%;
            max-width: 480px;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .reset-header {
            text-align: center;
            padding: 40px 40px 0;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 24px;
            box-shadow: 0 8px 24px rgba(80,70,229,0.3);
        }

        .logo-text {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Steps Indicator */
        .steps {
            display: flex;
            justify-content: center;
            padding: 20px 40px;
            margin-bottom: 20px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            color: var(--gray);
            background: white;
            transition: all 0.3s;
        }

        .step-circle.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .step-circle.completed {
            background: var(--success);
            border-color: var(--success);
            color: white;
        }

        .step-line {
            width: 60px;
            height: 2px;
            background: var(--border);
            transition: all 0.3s;
        }

        .step-line.completed {
            background: var(--success);
        }

        /* Form Content */
        .reset-content {
            padding: 0 40px 40px;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .section-description {
            color: var(--gray);
            margin-bottom: 32px;
            line-height: 1.6;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80,70,229,0.1);
        }

        .form-input.error {
            border-color: var(--danger);
        }

        .form-input.success {
            border-color: var(--success);
        }

        /* OTP Input */
        .otp-inputs {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-bottom: 24px;
        }

        .otp-input {
            width: 60px;
            height: 60px;
            border: 2px solid var(--border);
            border-radius: 12px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .otp-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80,70,229,0.1);
        }

        /* Password Requirements */
        .password-requirements {
            background: var(--light);
            border-radius: 12px;
            padding: 16px;
            margin-top: 12px;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 0;
            font-size: 13px;
            color: var(--gray);
        }

        .requirement.met {
            color: var(--success);
        }

        .requirement-icon {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 1px solid currentColor;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        /* Buttons */
        .btn-primary {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 16px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(80,70,229,0.3);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn-secondary {
            width: 100%;
            padding: 14px 24px;
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background: var(--light);
        }

        /* Success Message */
        .success-icon {
            width: 80px;
            height: 80px;
            background: var(--success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 40px;
            color: white;
            animation: scaleIn 0.5s ease;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* Resend Timer */
        .resend-timer {
            text-align: center;
            color: var(--gray);
            font-size: 14px;
            margin-top: 16px;
        }

        .resend-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .resend-link:hover {
            text-decoration: underline;
        }

        .resend-link.disabled {
            color: var(--gray);
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Loading Spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .btn-primary.loading .btn-text {
            display: none;
        }

        .btn-primary.loading .spinner {
            display: block;
        }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-info {
            background: rgba(6, 182, 212, 0.1);
            color: #0891b2;
            border: 1px solid rgba(6, 182, 212, 0.3);
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        /* Hidden utility */
        .hidden {
            display: none !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .lang-switcher {
                top: 10px;
                right: 10px;
            }

            .reset-container {
                margin: 10px;
            }

            .reset-header {
                padding: 32px 24px 0;
            }

            .reset-content {
                padding: 0 24px 24px;
            }

            .steps {
                padding: 20px 24px;
            }

            .step-line {
                width: 40px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .reset-container {
                margin: 0;
            }

            .reset-header {
                padding: 24px 20px 0;
            }

            .reset-content {
                padding: 0 20px 20px;
            }

            .logo-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }

            .logo-text {
                font-size: 24px;
            }

            .section-title {
                font-size: 20px;
            }

            .otp-inputs {
                gap: 8px;
            }

            .otp-input {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }

            .steps {
                padding: 16px 20px;
            }

            .step-circle {
                width: 28px;
                height: 28px;
                font-size: 12px;
            }

            .step-line {
                width: 30px;
            }
        }
    </style>
</head>
<body>
<!-- Language Switcher -->
<div class="lang-switcher">
    <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
    <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
</div>

<div class="reset-container">
    <!-- Header -->
    <div class="reset-header">
        <div class="logo">
            <div class="logo-icon">JC</div>
            <div class="logo-text">Je Confie</div>
        </div>
    </div>

    <!-- Steps Indicator -->
    <div class="steps">
        <div class="step">
            <div class="step-circle active" id="step1">1</div>
            <div class="step-line" id="line1"></div>
            <div class="step-circle" id="step2">2</div>
            <div class="step-line" id="line2"></div>
            <div class="step-circle" id="step3">3</div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="reset-content">
        <!-- Step 1: Email -->
        <div class="content-section active" id="section1">
            <a href="{{ url('driver/login') }}" class="back-link">
                <span>←</span>
                <span class="lang-content fr active">Retour à la connexion</span>
                <span class="lang-content en">Back to login</span>
            </a>

            <h2 class="section-title">
                <span class="lang-content fr active">Réinitialiser votre mot de passe</span>
                <span class="lang-content en">Reset your password</span>
            </h2>
            <p class="section-description">
                <span class="lang-content fr active">Entrez votre adresse email et nous vous enverrons un code de vérification.</span>
                <span class="lang-content en">Enter your email address and we'll send you a verification code.</span>
            </p>

            <form id="reset-email-form" onsubmit="handleStep1(event)">
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Adresse email</span>
                        <span class="lang-content en">Email address</span>
                    </label>
                    <input type="email" class="form-input" id="email" required
                           placeholder="exemple@email.com">
                </div>

                <button type="submit" class="btn-primary" id="btn1">
                    <span class="btn-text">
                        <span class="lang-content fr active">Envoyer le code</span>
                        <span class="lang-content en">Send code</span>
                    </span>
                    <div class="spinner"></div>
                </button>
            </form>
        </div>

        <!-- Step 2: Verification Code -->
        <div class="content-section" id="section2">
            <h2 class="section-title">
                <span class="lang-content fr active">Vérification</span>
                <span class="lang-content en">Verification</span>
            </h2>
            <p class="section-description">
                <span class="lang-content fr active">Nous avons envoyé un code à 6 chiffres à</span>
                <span class="lang-content en">We've sent a 6-digit code to</span>
                <strong id="display-email"></strong>
            </p>

            <div class="alert alert-info">
                <span>ℹ️</span>
                <span class="lang-content fr active">Le code peut prendre jusqu'à 2 minutes pour arriver</span>
                <span class="lang-content en">The code may take up to 2 minutes to arrive</span>
            </div>

            <form id="otp-form" onsubmit="handleStep2(event)">
                <div class="otp-inputs">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" required data-index="0">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" required data-index="1">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" required data-index="2">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" required data-index="3">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" required data-index="4">
                    <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" required data-index="5">
                </div>

                <button type="submit" class="btn-primary" id="btn2">
                    <span class="btn-text">
                        <span class="lang-content fr active">Vérifier le code</span>
                        <span class="lang-content en">Verify code</span>
                    </span>
                    <div class="spinner"></div>
                </button>
            </form>

            <div class="resend-timer">
                <span class="lang-content fr active">Vous n'avez pas reçu le code ?</span>
                <span class="lang-content en">Didn't receive the code?</span>
                <span id="timer">
                    <span class="lang-content fr active">Renvoyer dans</span>
                    <span class="lang-content en">Resend in</span>
                    <span id="countdown">60</span>s
                </span>
                <a href="#" class="resend-link disabled hidden" id="resendLink" onclick="resendCode(event)">
                    <span class="lang-content fr active">Renvoyer</span>
                    <span class="lang-content en">Resend</span>
                </a>
            </div>
        </div>

        <!-- Step 3: New Password -->
        <div class="content-section" id="section3">
            <h2 class="section-title">
                <span class="lang-content fr active">Nouveau mot de passe</span>
                <span class="lang-content en">New password</span>
            </h2>
            <p class="section-description">
                <span class="lang-content fr active">Créez un nouveau mot de passe sécurisé pour votre compte.</span>
                <span class="lang-content en">Create a new secure password for your account.</span>
            </p>

            <form id="reset-password-form" onsubmit="handleStep3(event)">
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Nouveau mot de passe</span>
                        <span class="lang-content en">New password</span>
                    </label>
                    <input type="password" class="form-input" id="newPassword" name="password" required
                           onkeyup="checkPassword()">
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Confirmer le mot de passe</span>
                        <span class="lang-content en">Confirm password</span>
                    </label>
                    <input type="password" class="form-input" id="confirmPassword" name="confirm-password" required
                           onkeyup="validatePasswordMatch()">
                </div>

                <div class="password-requirements">
                    <div class="requirement" id="req-length">
                        <span class="requirement-icon">✓</span>
                        <span class="lang-content fr active">Au moins 8 caractères</span>
                        <span class="lang-content en">At least 8 characters</span>
                    </div>
                    <div class="requirement" id="req-upper">
                        <span class="requirement-icon">✓</span>
                        <span class="lang-content fr active">Une lettre majuscule</span>
                        <span class="lang-content en">One uppercase letter</span>
                    </div>
                    <div class="requirement" id="req-number">
                        <span class="requirement-icon">✓</span>
                        <span class="lang-content fr active">Un chiffre</span>
                        <span class="lang-content en">One number</span>
                    </div>
                    <div class="requirement" id="req-special">
                        <span class="requirement-icon">✓</span>
                        <span class="lang-content fr active">Un caractère spécial</span>
                        <span class="lang-content en">One special character</span>
                    </div>
                </div>

                <button type="submit" class="btn-primary" id="btn3" style="margin-top: 24px;">
                    <span class="btn-text">
                        <span class="lang-content fr active">Réinitialiser le mot de passe</span>
                        <span class="lang-content en">Reset password</span>
                    </span>
                    <div class="spinner"></div>
                </button>
            </form>
        </div>

        <!-- Success -->
        <div class="content-section" id="sectionSuccess">
            <div class="success-icon">✓</div>
            <h2 class="section-title" style="text-align: center;">
                <span class="lang-content fr active">Mot de passe réinitialisé !</span>
                <span class="lang-content en">Password reset!</span>
            </h2>
            <p class="section-description" style="text-align: center;">
                <span class="lang-content fr active">Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.</span>
                <span class="lang-content en">Your password has been successfully reset. You can now log in with your new password.</span>
            </p>

            <a href="{{ url('driver/login') }}" class="btn-primary" style="display: block; text-align: center; text-decoration: none;">
                <span class="lang-content fr active">Se connecter</span>
                <span class="lang-content en">Sign in</span>
            </a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // Global variables
    let userEmail = '';
    let resendCountdown = 60;
    let resendTimer = null;

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

    // Step 1: Send code
    function handleStep1(event) {
        event.preventDefault();

        const emailInput = document.getElementById('email');
        const email = emailInput.value.trim();
        const btn = document.getElementById('btn1');

        // Email validation
        if (!email || !isValidEmail(email)) {
            toastr.error('Please enter a valid email address.');
            emailInput.classList.add('error');
            return;
        }

        emailInput.classList.remove('error');
        userEmail = email;

        // Show loading
        btn.classList.add('loading');
        btn.disabled = true;

        // Make API call
        var url = '{{ url('driver/send-verification-email') }}';

        $.post(url, {
            email: email,
            _token: $('meta[name="csrf-token"]').attr('content')
        })
            .done(function(res) {
                btn.classList.remove('loading');
                btn.disabled = false;

                // Check if response indicates success
                if (res.success === false) {
                    toastr.error(res.message || 'Failed to send verification email');
                    return;
                }

                toastr.success(res.message || 'Verification code sent successfully!');

                // Update display email
                document.getElementById('display-email').textContent = email;

                // Move to step 2
                moveToStep(2);
                startResendTimer();
            })
            .fail(function(xhr) {
                btn.classList.remove('loading');
                btn.disabled = false;

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Handle validation errors
                    const errors = xhr.responseJSON.errors;
                    const errorMessage = Object.values(errors).flat().join('<br>');
                    toastr.error(errorMessage);
                } else {
                    toastr.error('Failed to send verification email. Please try again.');
                }
            });
    }

    // Step 2: Verify code
    function handleStep2(event) {
        event.preventDefault();

        const btn = document.getElementById('btn2');
        const code = getOTPCode();

        if (code.length !== 6) {
            toastr.error('Please enter the complete 6-digit code');
            return;
        }

        // Show loading
        btn.classList.add('loading');
        btn.disabled = true;

        // Make API call
        var url = '{{ url('driver/verify-email-code') }}';

        $.post(url, {
            email: userEmail,
            code: code,
            _token: $('meta[name="csrf-token"]').attr('content')
        })
            .done(function(res) {
                btn.classList.remove('loading');
                btn.disabled = false;

                // Check if response indicates success
                if (res.success === false) {
                    toastr.error(res.message || 'Invalid code. Please try again.');
                    // Clear OTP inputs
                    document.querySelectorAll('.otp-input').forEach(input => {
                        input.value = '';
                    });
                    document.querySelector('.otp-input').focus();
                    return;
                }

                toastr.success(res.message || 'Code verified successfully!');

                // Clear timer
                if (resendTimer) {
                    clearInterval(resendTimer);
                }

                // Move to step 3
                moveToStep(3);
            })
            .fail(function(xhr) {
                btn.classList.remove('loading');
                btn.disabled = false;

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Handle validation errors
                    const errors = xhr.responseJSON.errors;
                    const errorMessage = Object.values(errors).flat().join('<br>');
                    toastr.error(errorMessage);
                } else {
                    toastr.error('Invalid code. Please try again.');
                }

                // Clear OTP inputs
                document.querySelectorAll('.otp-input').forEach(input => {
                    input.value = '';
                });
                document.querySelector('.otp-input').focus();
            });
    }

    // Step 3: Reset password
    function handleStep3(event) {
        event.preventDefault();

        const btn = document.getElementById('btn3');
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        // Validate passwords
        if (!validatePasswords(newPassword, confirmPassword)) {
            return;
        }

        // Show loading
        btn.classList.add('loading');
        btn.disabled = true;

        // Make API call
        var url = '{{ url('driver/update-password') }}';

        $.post(url, {
            email: userEmail,
            password: newPassword,
            confirm_password: confirmPassword,
            _token: $('meta[name="csrf-token"]').attr('content')
        })
            .done(function(res) {
                btn.classList.remove('loading');

                // Check if response indicates success
                if (res.success === false) {
                    btn.disabled = false;
                    toastr.error(res.message || 'Failed to update password');
                    return;
                }

                toastr.success(res.message || 'Password updated successfully!');

                // Show success
                document.getElementById('section3').classList.remove('active');
                document.getElementById('sectionSuccess').classList.add('active');
                document.getElementById('step3').classList.add('completed');
                document.getElementById('step3').innerHTML = '✓';
                document.getElementById('line2').classList.add('completed');
            })
            .fail(function(xhr) {
                btn.classList.remove('loading');
                btn.disabled = false;

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Handle validation errors
                    const errors = xhr.responseJSON.errors;
                    const errorMessage = Object.values(errors).flat().join('<br>');
                    toastr.error(errorMessage);
                } else {
                    toastr.error('Failed to update password. Please try again.');
                }
            });
    }

    // Move to step
    function moveToStep(step) {
        // Hide all sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.remove('active');
        });

        // Show current section
        document.getElementById('section' + step).classList.add('active');

        // Update steps indicator
        if (step === 2) {
            document.getElementById('step1').classList.remove('active');
            document.getElementById('step1').classList.add('completed');
            document.getElementById('step1').innerHTML = '✓';
            document.getElementById('line1').classList.add('completed');
            document.getElementById('step2').classList.add('active');
        } else if (step === 3) {
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step2').classList.add('completed');
            document.getElementById('step2').innerHTML = '✓';
            document.getElementById('line2').classList.add('completed');
            document.getElementById('step3').classList.add('active');
        }
    }

    // Get OTP code from inputs
    function getOTPCode() {
        const otpInputs = document.querySelectorAll('.otp-input');
        return Array.from(otpInputs).map(input => input.value.trim()).join('');
    }

    // Validate email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Validate passwords
    function validatePasswords(password, confirmPassword) {
        const newPasswordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');

        // Reset styles
        newPasswordInput.classList.remove('error', 'success');
        confirmPasswordInput.classList.remove('error', 'success');

        let isValid = true;

        // Password strength validation
        if (password.length < 8) {
            toastr.error('Password must be at least 8 characters long.');
            newPasswordInput.classList.add('error');
            isValid = false;
        }

        // Match validation
        if (password !== confirmPassword) {
            toastr.error('Passwords do not match.');
            confirmPasswordInput.classList.add('error');
            isValid = false;
        }

        if (isValid) {
            newPasswordInput.classList.add('success');
            confirmPasswordInput.classList.add('success');
        }

        return isValid;
    }

    // Validate password match
    function validatePasswordMatch() {
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const confirmInput = document.getElementById('confirmPassword');

        if (confirmPassword && newPassword !== confirmPassword) {
            confirmInput.classList.add('error');
            confirmInput.classList.remove('success');
        } else if (confirmPassword && newPassword === confirmPassword) {
            confirmInput.classList.remove('error');
            confirmInput.classList.add('success');
        } else {
            confirmInput.classList.remove('error', 'success');
        }
    }

    // OTP Input handling
    document.addEventListener('DOMContentLoaded', function() {
        const otpInputs = document.querySelectorAll('.otp-input');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (this.value && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && !this.value && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });

            // Only allow numbers
            input.addEventListener('keypress', function(e) {
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault();
                }
            });
        });
    });

    // Check password requirements
    function checkPassword() {
        const password = document.getElementById('newPassword').value;

        // Length
        if (password.length >= 8) {
            document.getElementById('req-length').classList.add('met');
        } else {
            document.getElementById('req-length').classList.remove('met');
        }

        // Uppercase
        if (/[A-Z]/.test(password)) {
            document.getElementById('req-upper').classList.add('met');
        } else {
            document.getElementById('req-upper').classList.remove('met');
        }

        // Number
        if (/[0-9]/.test(password)) {
            document.getElementById('req-number').classList.add('met');
        } else {
            document.getElementById('req-number').classList.remove('met');
        }

        // Special character
        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            document.getElementById('req-special').classList.add('met');
        } else {
            document.getElementById('req-special').classList.remove('met');
        }
    }

    // Resend timer
    function startResendTimer() {
        resendCountdown = 60;
        const timer = document.getElementById('timer');
        const resendLink = document.getElementById('resendLink');
        const countdownEl = document.getElementById('countdown');

        timer.style.display = 'inline';
        resendLink.classList.add('hidden');
        resendLink.classList.add('disabled');

        resendTimer = setInterval(() => {
            resendCountdown--;
            countdownEl.textContent = resendCountdown;

            if (resendCountdown <= 0) {
                clearInterval(resendTimer);
                timer.style.display = 'none';
                resendLink.classList.remove('hidden');
                resendLink.classList.remove('disabled');
            }
        }, 1000);
    }

    function resendCode(event) {
        event.preventDefault();
        const resendLink = document.getElementById('resendLink');

        if (resendLink.classList.contains('disabled')) {
            return;
        }

        // Make API call to resend
        var url = '{{ url('driver/send-verification-email') }}';

        $.post(url, {
            email: userEmail,
            _token: $('meta[name="csrf-token"]').attr('content')
        })
            .done(function(res) {
                // Check if response indicates success
                if (res.success === false) {
                    toastr.error(res.message || 'Failed to resend verification email');
                    return;
                }

                toastr.success(res.message || 'Verification code resent successfully!');
                startResendTimer();
            })
            .fail(function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Handle validation errors
                    const errors = xhr.responseJSON.errors;
                    const errorMessage = Object.values(errors).flat().join('<br>');
                    toastr.error(errorMessage);
                } else {
                    toastr.error('Failed to resend verification email. Please try again.');
                }
            });
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
