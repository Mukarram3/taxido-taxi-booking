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
    <title>Login Account - JeConfie</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            max-width: 500px;
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

        /* ACCOUNT TYPE SELECTOR */
        .account-type-selector {
            margin-bottom: 32px;
        }

        .account-types {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
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

        /* FORM SECTIONS */
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
            display: flex;
            align-items: center;
            gap: 8px;
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

        /* SPECIFIC FORM SECTIONS */
        .traveler-form, .shipper-form {
            display: none;
        }

        .traveler-form.active, .shipper-form.active {
            display: block;
        }

        /* EXPERIENCE SELECTOR */
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

        /* TRANSPORT PREFERENCES */
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

        /* SHIPPING FREQUENCY */
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

        /* VERIFICATION SECTION */
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

        /* TERMS AND CONDITIONS */
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

        /* FORM ACTIONS */
        .form-actions {
            margin-top: 32px;
        }

        .btn-large {
            padding: 16px 24px;
            font-size: 16px;
            border-radius: 12px;
            width: 100%;
            margin-bottom: 16px;
        }

        .login-link {
            text-align: center;
            font-size: 14px;
            color: var(--text-light);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
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

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .signup-card {
                padding: 24px;
                margin: 0 16px;
            }

            .signup-title {
                font-size: 1.5rem;
            }

            .form-grid.two-columns {
                grid-template-columns: 1fr;
            }

            .account-types {
                grid-template-columns: 1fr;
            }

            .experience-options {
                grid-template-columns: 1fr;
            }

            .transport-preferences {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 20px 0;
            }

            .signup-container {
                margin: 0 12px;
            }

            .transport-preferences {
                grid-template-columns: 1fr;
            }
        }

        /* HIDE/SHOW UTILITIES */
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
            <a href="{{ url('user/signup') }}" class="btn btn-ghost">Sign up</a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="main-content">
    <div class="signup-container">
        <div class="signup-card">
            <!-- SIGNUP HEADER -->
            <div class="signup-header">
                <h1 class="signup-title">Join JeConfie</h1>
                <p class="signup-subtitle">Login In your account and start shipping with confidence</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- SIGNUP FORM -->
            <form id="login-form" method="POST" action="{{route('user.login')}}">
                @csrf
                <!-- BASIC INFORMATION -->
                <div class="form-section">

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="email">
                                Email Address <span class="required">*</span>
                            </label>
                            <input type="email" id="email" class="form-input" name="email" placeholder="your@email.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">
                                Password <span class="required">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="form-input" placeholder="Minimum 8 characters">
                        </div>
                        <a class="forgot" href="{{url('user/forgot-password')}}">Forgot password?</a>
                        <a href="{{ url('user/auth/google') }}" class="btn theme-btn google-btn w-50 flex-center gap-2" style="justify-content: center !important">
                            <img class="img-fluid google" src="{{asset('assets/images/svg/google.svg')}}" alt="google" /> with
                            Google</a>
                    </div>
                </div>

                <!-- FORM ACTIONS -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-large">
                        Sign In
                    </button>
                    <div class="login-link">
                        Don't have an account? <a href="{{url('user/signup')}}">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    console.log('Signup page - Script started');

    // Initialization function
    function initializeSignupForm() {
        console.log('Initializing signup form...');

        try {

            // Form submission
            const signupForm = document.getElementById('login-form');
            if (signupForm) {
                signupForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Form submission started');

                    // Basic validation
                    const requiredFields = ['email', 'password'];
                    let isValid = true;

                    requiredFields.forEach(function(fieldId) {
                        const field = document.getElementById(fieldId);
                        if (field && !field.value.trim()) {
                            field.style.borderColor = '#ef4444';
                            isValid = false;
                        } else if (field) {
                            field.style.borderColor = '#e5e7eb';
                        }
                    });

                    if (isValid) {

                        const formData = {
                            email: document.getElementById('email').value,
                            password: document.getElementById('password').value
                        };

                        signupForm.removeEventListener('submit', arguments.callee);
                        signupForm.submit();

                        // Show success message
                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'alert alert-success';
                        alertDiv.innerHTML = '<span>✓</span><span>Logged In successfully!</span>';

                        const formActions = document.querySelector('.form-actions');
                        formActions.parentNode.insertBefore(alertDiv, formActions);

                        // Scroll to top to show success message
                        document.querySelector('.signup-card').scrollIntoView({ behavior: 'smooth' });
                    }
                });
            }

            console.log('Signup form initialization complete');

        } catch (error) {
            console.error('Error initializing signup form:', error);
        }
    }

    // Legal pages function (placeholder)
    function showLegalPage(pageType) {
        alert('Legal page: ' + pageType + ' (to be implemented)');
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeSignupForm);
    } else {
        initializeSignupForm();
    }

    console.log('Signup script loaded');
</script>
</body>
</html>
