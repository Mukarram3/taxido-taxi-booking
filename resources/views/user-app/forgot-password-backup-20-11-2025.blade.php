<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - JeConfie</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .verification-container {
            text-align: center;
            margin: 24px 0;
        }
        .resend-btn {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            text-decoration: underline;
            font-size: 14px;
        }
        .verification-email {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
            margin-bottom: 16px;
        }
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

        .reset-container {
            max-width: 450px;
            width: 100%;
            margin: 0 24px;
        }

        /* RESET CARD */
        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .reset-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .reset-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
            color: white;
        }

        .reset-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .reset-subtitle {
            color: var(--text-light);
            font-size: 14px;
            line-height: 1.5;
        }

        /* FORM SECTIONS */
        .form-section {
            margin-bottom: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
        }

        .required {
            color: var(--danger);
        }

        .form-input {
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-input.error {
            border-color: var(--danger);
            background: rgba(239, 68, 68, 0.05);
        }

        .form-input.success {
            border-color: var(--success);
            background: rgba(16, 185, 129, 0.05);
        }

        /* FORM ACTIONS */
        .form-actions {
            margin-top: 32px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .btn-large {
            padding: 16px 24px;
            font-size: 16px;
            border-radius: 12px;
            width: 100%;
        }

        .back-link {
            text-align: center;
            font-size: 14px;
            color: var(--text-light);
        }

        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        /* ALERTS */
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            line-height: 1.5;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .alert-info {
            background: rgba(6, 182, 212, 0.1);
            color: #0891b2;
            border: 1px solid rgba(6, 182, 212, 0.3);
        }

        .alert-icon {
            font-size: 18px;
            margin-top: 1px;
            flex-shrink: 0;
        }

        /* STEP INDICATOR */
        .step-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .step {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--border);
            transition: all 0.3s ease;
        }

        .step.active {
            background: var(--primary);
            transform: scale(1.2);
        }

        .step.completed {
            background: var(--success);
        }

        /* LOADING ANIMATION */
        .loading {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
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

            .reset-card {
                padding: 32px 24px;
                margin: 0 16px;
            }

            .reset-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 20px 0;
            }

            .reset-container {
                margin: 0 12px;
            }

            .reset-card {
                padding: 24px 20px;
            }
        }

        /* HIDE/SHOW UTILITIES */
        .hidden {
            display: none !important;
        }

        /* PASSWORD STRENGTH INDICATOR */
        .password-strength {
            margin-top: 8px;
        }

        .strength-bar {
            height: 4px;
            background: var(--border);
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-text {
            font-size: 12px;
            margin-top: 4px;
            font-weight: 500;
        }

        .strength-weak { background: var(--danger); }
        .strength-medium { background: var(--warning); }
        .strength-strong { background: var(--success); }
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
            <li><a href="#" class="nav-link">Security</a></li>
            <li><a href="#" class="nav-link">Help</a></li>
        </ul>
        <div class="nav-actions">
            <a href="{{ url('user/login') }}" class="btn btn-ghost">Log in</a>
            <a href="{{ url('user/signup') }}" class="btn btn-ghost">Sign up</a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="main-content">
    <div class="reset-container">
        <div class="reset-card">
            <!-- RESET HEADER -->
            <div class="reset-header">
                <div class="reset-icon">🔑</div>
                <h1 class="reset-title">Reset Password</h1>
                <p class="reset-subtitle">Enter your email address to receive a verification code</p>
            </div>

            <!-- STEP INDICATOR -->
            <div class="step-indicator">
                <div class="step active" id="step-1"></div>
                <div class="step" id="step-2"></div>
                <div class="step" id="step-3"></div>
            </div>

            <!-- EMAIL REQUEST FORM (STEP 1) -->
            <div id="email-form" class="form-step active">
                <form id="reset-email-form">
                    <div class="form-group">
                        <label class="form-label" for="email">
                            Email address <span class="required">*</span>
                        </label>
                        <input type="email" id="email" class="form-input" placeholder="your@email.com" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-large" id="send-reset-btn">
                            Send reset code
                        </button>
                        <div class="back-link">
                            <a href="{{ url('user/login') }}">← Back to login</a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- EMAIL SENT CONFIRMATION (STEP 2) -->
            <div id="email-sent" class="form-step hidden">
                <div class="otp-verification-form" id="otp-verification">
                    <div class="verification-container">
                        <h3 class="section-title">📱 Enter Verification Code send to <span class="verification-email" id="verification-email">youremail@gmail.com</span></h3>

                        <div class="otp-container">
                            <input type="text" class="otp-input" maxlength="1" data-index="0">
                            <input type="text" class="otp-input" maxlength="1" data-index="1">
                            <input type="text" class="otp-input" maxlength="1" data-index="2">
                            <input type="text" class="otp-input" maxlength="1" data-index="3">
                            <input type="text" class="otp-input" maxlength="1" data-index="4">
                            <input type="text" class="otp-input" maxlength="1" data-index="5">
                        </div>

                        <div class="otp-info">
                            <div class="otp-info-text">verification code may take up to 2 minutes to arrive</div>
                            <div class="resend-timer" id="resend-timer">
                                Resend code in <span id="emailcountdown">60</span>s
                            </div>
                            <button type="button" class="resend-btn hidden" id="resend-email-btn">Resend code</button>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-primary btn-large" id="verify-otp-btn" onclick="simulateTokenReceived()">
                            Verify Code
                        </button>
                    </div>
                </div>
            </div>

            <!-- NEW PASSWORD FORM (STEP 3) -->
            <div id="new-password-form" class="form-step hidden">
                <div class="alert alert-info">
                    <span class="alert-icon">🔒</span>
                    <div>
                        Create a new secure password for your account.
                    </div>
                </div>

                <form id="reset-password-form">
                    <div class="form-group">
                        <label class="form-label" for="new-password">
                            New password <span class="required">*</span>
                        </label>
                        <input type="password" id="new-password" name="password" class="form-input" placeholder="Minimum 8 characters" required>
                        <div class="password-strength hidden" id="password-strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strength-fill"></div>
                            </div>
                            <div class="strength-text" id="strength-text"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="confirm-new-password">
                            Confirm password <span class="required">*</span>
                        </label>
                        <input type="password" id="confirm-new-password" name="confirm-password" class="form-input" placeholder="Re-enter your password" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-large" id="update-password-btn">
                            Update password
                        </button>
                        <div class="back-link">
                            <a href="{{ url('user/login') }}">← Back to login</a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- SUCCESS CONFIRMATION (STEP 4) -->
            <div id="success-confirmation" class="form-step hidden">
                <div class="reset-header">
                    <div class="reset-icon">✅</div>
                    <h2 class="reset-title">Password updated!</h2>
                    <p class="reset-subtitle">Your password has been changed successfully. You can now log in with your new password.</p>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-primary btn-large" onclick="goToLogin()">
                        Log in now
                    </button>
                    <div class="back-link">
                        <a href="#">← Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    console.log('Reset password page - Script started');

    // Global variables
    let currentStep = 1;
    let userEmail = '';
    let resendemailCountdown = 60;
    let resendTimer = null;

    // Initialization function
    function initializeResetForm() {
        console.log('Initializing reset form...');

        try {
            // Email form submission
            const emailForm = document.getElementById('reset-email-form');
            if (emailForm) {
                emailForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Email form submitted');

                    const email = document.getElementById('email');
                    const submitBtn = document.getElementById('send-reset-btn');

                    // Email validation
                    if (!email.value.trim() || !isValidEmail(email.value)) {
                        showError('Please enter a valid email address.');
                        email.classList.add('error');
                        return;
                    }

                    email.classList.remove('error');
                    userEmail = email.value;

                    // Button animation
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<div class="loading"><div class="spinner"></div>Sending...</div>';

                    var url = '{{ url('driver/send-verification-email') }}';

                    $.post(url, { email: email.value, _token: $('meta[name="csrf-token"]').attr('content') })
                        .done(function(res) {
                            document.getElementById('verification-email').textContent = email.value;
                            startemailResendCountdown();
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = 'Send reset code';
                                toastr.success('Send reset code.');
                                showEmailSent();
                        })
                        .fail(function(xhr) {
                            toastr.success('error', xhr.responseJSON.message || 'Failed to send verification email');
                        });

                    document.getElementById('resend-email-btn').addEventListener('click', function() {
                        var url = '{{ url('driver/send-verification-email') }}';

                        $.post(url, { email: email.value, _token: $('meta[name="csrf-token"]').attr('content') })
                            .done(function(res) {
                                document.getElementById('verification-email').textContent = email.value;
                                startemailResendCountdown();
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = 'Send reset code';
                                toastr.success('Send reset code.');
                                showEmailSent();
                            })
                            .fail(function(xhr) {
                                toastr.error('error', xhr.responseJSON.message || 'Failed to send verification email');
                            });
                    });
                });
            }

            // New password form submission
            const newPasswordForm = document.getElementById('reset-password-form');
            if (newPasswordForm) {
                newPasswordForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('New password form submitted');

                    const newPassword = document.getElementById('new-password');
                    const confirmPassword = document.getElementById('confirm-new-password');
                    const submitBtn = document.getElementById('update-password-btn');

                    // Password validation
                    if (!validatePasswords(newPassword.value, confirmPassword.value)) {
                        return;
                    }

                    // Button animation
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<div class="loading"><div class="spinner"></div>Updating...</div>';

                    const email = document.getElementById('email').value.trim();
                    var url = '{{url('user/update-password')}}';

                    $.post(url, { email: email, password: newPassword.value, confirm_password: confirmPassword.value, _token: $('meta[name="csrf-token"]').attr('content') })
                        .done(function(res) {
                                // submitBtn.disabled = false;
                                submitBtn.innerHTML = 'Update password';
                                toastr.success(res.message);
                                showSuccessConfirmation();
                        })
                        .fail(function(xhr) {
                            toastr.error(xhr.responseJSON.message);
                        });
                });
            }

            // Password strength indicator
            const newPasswordInput = document.getElementById('new-password');
            if (newPasswordInput) {
                newPasswordInput.addEventListener('input', function() {
                    updatePasswordStrength(this.value);
                });
            }

            // Password confirmation validation
            const confirmPasswordInput = document.getElementById('confirm-new-password');
            if (confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', function() {
                    validatePasswordMatch();
                });
            }

            console.log('Reset form initialization complete');

        } catch (error) {
            console.error('Error initializing reset form:', error);
        }
    }

    function resendVerificationEmail() {

        const email = document.getElementById('email').value.trim();
        document.getElementById('verification-email').textContent = email;

        var url = '{{ url('driver/send-verification-email') }}';

        $.post(url, { email: email, _token: $('meta[name="csrf-token"]').attr('content') })
            .done(function(res) {
                document.getElementById('verification-email').textContent = email.value;
                startemailResendCountdown();
                toastr.success('Send reset code.');
                showEmailSent();
            })
            .fail(function(xhr) {
                toastr.error('error', xhr.responseJSON.message || 'Failed to send verification email');
            });
    }

    function startemailResendCountdown() {
        resendCountdown = 60;
        const timerElement = document.getElementById('emailcountdown');
        const resendBtnElement = document.getElementById('resend-email-btn');

        resendBtnElement.classList.add('hidden');

        resendTimer = setInterval(() => {
            resendCountdown--;
            timerElement.textContent = resendCountdown;

            if (resendCountdown <= 0) {
                clearInterval(resendTimer);
                resendBtnElement.classList.remove('hidden');
            }
        }, 1000);
    }

    // Navigation functions
    function showEmailSent() {
        document.getElementById('email-form').classList.add('hidden');
        document.getElementById('email-sent').classList.remove('hidden');
        updateStepIndicator(2);
        console.log('Email sent step shown');
    }

    function showNewPasswordForm() {
        document.getElementById('email-sent').classList.add('hidden');
        document.getElementById('new-password-form').classList.remove('hidden');
        updateStepIndicator(3);
        console.log('New password form shown');
    }

    function showSuccessConfirmation() {
        document.getElementById('new-password-form').classList.add('hidden');
        document.getElementById('success-confirmation').classList.remove('hidden');
        updateStepIndicator(3, true);
        console.log('Success confirmation shown');
    }

    function resetForm() {
        document.getElementById('email-sent').classList.add('hidden');
        document.getElementById('email-form').classList.remove('hidden');
        document.getElementById('email').value = '';
        updateStepIndicator(1);
        console.log('Form reset');
    }

    function updateStepIndicator(step, completed = false) {
        const steps = document.querySelectorAll('.step');
        steps.forEach((stepEl, index) => {
            stepEl.classList.remove('active', 'completed');
            if (index + 1 < step) {
                stepEl.classList.add('completed');
            } else if (index + 1 === step) {
                stepEl.classList.add(completed ? 'completed' : 'active');
            }
        });
        currentStep = step;
    }

    // Utility functions
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePasswords(password, confirmPassword) {
        const newPasswordInput = document.getElementById('new-password');
        const confirmPasswordInput = document.getElementById('confirm-new-password');

        // Reset styles
        newPasswordInput.classList.remove('error', 'success');
        confirmPasswordInput.classList.remove('error', 'success');

        let isValid = true;

        // Password strength validation
        if (password.length < 8) {
            showError('Password must be at least 8 characters long.');
            newPasswordInput.classList.add('error');
            isValid = false;
        }

        // Match validation
        if (password !== confirmPassword) {
            showError('Passwords do not match.');
            confirmPasswordInput.classList.add('error');
            isValid = false;
        }

        if (isValid) {
            newPasswordInput.classList.add('success');
            confirmPasswordInput.classList.add('success');
        }

        return isValid;
    }

    function validatePasswordMatch() {
        const newPassword = document.getElementById('new-password').value;
        const confirmPassword = document.getElementById('confirm-new-password').value;
        const confirmInput = document.getElementById('confirm-new-password');

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

    function updatePasswordStrength(password) {
        const strengthContainer = document.getElementById('password-strength');
        const strengthFill = document.getElementById('strength-fill');
        const strengthText = document.getElementById('strength-text');

        if (!password) {
            strengthContainer.classList.add('hidden');
            return;
        }

        strengthContainer.classList.remove('hidden');

        let score = 0;
        let feedback = [];

        // Score calculation
        if (password.length >= 8) score += 1;
        else feedback.push('At least 8 characters');

        if (/[a-z]/.test(password)) score += 1;
        else feedback.push('Lowercase letters');

        if (/[A-Z]/.test(password)) score += 1;
        else feedback.push('Uppercase letters');

        if (/\d/.test(password)) score += 1;
        else feedback.push('Numbers');

        if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) score += 1;
        else feedback.push('Special characters');

        // Update display
        let strength, color, width;

        if (score < 3) {
            strength = 'Weak';
            color = 'strength-weak';
            width = '33%';
        } else if (score < 5) {
            strength = 'Medium';
            color = 'strength-medium';
            width = '66%';
        } else {
            strength = 'Strong';
            color = 'strength-strong';
            width = '100%';
        }

        strengthFill.className = `strength-fill ${color}`;
        strengthFill.style.width = width;

        if (feedback.length > 0 && score < 5) {
            strengthText.textContent = `${strength} - Add: ${feedback.join(', ')}`;
        } else {
            strengthText.textContent = `${strength} - Perfect!`;
        }
    }

    function showError(message) {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.alert-error');
        existingAlerts.forEach(alert => alert.remove());

        // Create new alert
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-error';
        alertDiv.innerHTML = `<span class="alert-icon">❌</span><div>${message}</div>`;

        // Insert before form
        const activeForm = document.querySelector('.form-step:not(.hidden)');
        if (activeForm) {
            activeForm.insertBefore(alertDiv, activeForm.firstChild);

            // Auto-remove after 5 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }
    }

    function resendEmail() {
        const btn = event.target;
        btn.disabled = true;
        btn.innerHTML = '<div class="loading"><div class="spinner"></div>Sending...</div>';

        setTimeout(() => {
            btn.disabled = false;
            btn.textContent = 'Resend email';

            // Show success message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success';
            alertDiv.innerHTML = '<span class="alert-icon">✅</span><div>Email resent successfully!</div>';

            const emailSentStep = document.getElementById('email-sent');
            emailSentStep.insertBefore(alertDiv, emailSentStep.firstChild);

            setTimeout(() => alertDiv.remove(), 3000);
        }, 1500);
    }

    function getEmailOTP() {
        const emailotpInputs = document.querySelectorAll('.otp-input');
        return Array.from(emailotpInputs).map(input => input.value.trim()).join('');
    }

    function simulateTokenReceived() {

        const email = document.getElementById('email').value.trim();
        const code = getEmailOTP();

        var url = '{{url('driver/verify-email-code')}}';

        $.post(url, { email: email, code: code, _token: $('meta[name="csrf-token"]').attr('content') })
            .done(function(res) {
                toastr.success('Verified Successfully.');
                showNewPasswordForm();
            })
            .fail(function(xhr) {
                toastr.error('Invalid code. Please try again.');
            });
    }

    function goToLogin() {
        alert('Redirecting to login page (to be implemented)');
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeResetForm);
    } else {
        initializeResetForm();
    }

    console.log('Reset password script loaded');
</script>

</body>
</html>
