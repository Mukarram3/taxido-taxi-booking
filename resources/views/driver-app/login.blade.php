<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Expéditeur - Je Confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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

        /* Split Layout */
        .login-container {
            display: flex;
            width: 100%;
        }

        /* Left Side - Illustration */
        .illustration-side {
            flex: 1;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--eco-green) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .illustration-side::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(-50%, -50%) rotate(0deg); }
            50% { transform: translate(-30%, -30%) rotate(180deg); }
        }

        .illustration-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .illustration-logo {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 32px;
            font-size: 36px;
            font-weight: 800;
            backdrop-filter: blur(10px);
        }

        .illustration-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .illustration-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 48px;
            max-width: 400px;
        }

        .illustration-svg {
            width: 300px;
            height: 300px;
            margin: 0 auto;
        }

        /* Right Side - Form */
        .form-side {
            flex: 1;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        /* Language Switcher */
        .lang-switcher {
            position: absolute;
            top: 20px;
            right: 20px;
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
            border-radius: 100px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--gray);
            font-size: 14px;
        }

        .lang-btn.active {
            background: var(--secondary);
            color: white;
        }

        /* Form Container */
        .form-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: var(--gray);
            font-size: 16px;
        }

        .form-subtitle a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
        }

        .form-subtitle a:hover {
            text-decoration: underline;
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
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(6,182,212,0.1);
        }

        .form-input.error {
            border-color: var(--danger);
        }

        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 4px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        /* Password Input Container */
        .password-input-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            padding: 4px;
        }

        .toggle-password:hover {
            color: var(--secondary);
        }

        /* Remember & Forgot */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            cursor: pointer;
        }

        .remember-me label {
            font-size: 14px;
            color: var(--dark);
            cursor: pointer;
        }

        .forgot-link {
            color: var(--secondary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, var(--secondary), var(--eco-green));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(6,182,212,0.3);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
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

        .btn-submit.loading .btn-text {
            display: none;
        }

        .btn-submit.loading .spinner {
            display: block;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 32px 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .divider-text {
            padding: 0 16px;
            color: var(--gray);
            font-size: 14px;
        }

        /* Social Login */
        .social-buttons {
            display: flex;
            gap: 12px;
        }

        .btn-social {
            flex: 1;
            padding: 12px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 12px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-social:hover {
            background: var(--light);
            border-color: var(--secondary);
        }

        /* Switch Mode */
        .switch-mode {
            text-align: center;
            margin-top: 32px;
            padding-top: 32px;
            border-top: 1px solid var(--border);
        }

        .switch-mode-text {
            color: var(--gray);
            font-size: 14px;
        }

        .switch-mode-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .switch-mode-link:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .illustration-side {
                display: none;
            }

            .form-side {
                background: linear-gradient(135deg, var(--secondary) 0%, var(--eco-green) 100%);
            }

            .form-container {
                background: white;
                padding: 32px;
                border-radius: 24px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            }
        }

        @media (max-width: 480px) {
            .form-side {
                padding: 20px;
            }

            .form-container {
                padding: 24px;
            }

            .form-title {
                font-size: 24px;
            }

            .social-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<div class="login-container">
    <!-- Left Side - Illustration -->
    <div class="illustration-side">
        <div class="illustration-content">
            <div class="illustration-logo">JC</div>
            <h1 class="illustration-title">
                <span class="lang-content fr active">Bienvenue, Transporteur !</span>
                <span class="lang-content en">Welcome, Carrier!</span>
            </h1>
            <p class="illustration-subtitle">
                <span class="lang-content fr active">Rentabilisez vos voyages et contribuez à un transport plus écologique</span>
                <span class="lang-content en">Make your trips more profitable and contribute to greener transportation</span>
            </p>

            <svg class="illustration-svg" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Animated package -->
                <g id="package-group">
                    <rect x="100" y="100" width="100" height="100" rx="10" fill="rgba(255,255,255,0.2)">
                        <animate attributeName="y" from="100" to="90" dur="2s" repeatCount="indefinite" begin="0s" fill="freeze" calcMode="spline" keySplines="0.5 0 0.5 1" keyTimes="0;1" />
                        <animate attributeName="y" from="90" to="100" dur="2s" repeatCount="indefinite" begin="2s" fill="freeze" calcMode="spline" keySplines="0.5 0 0.5 1" keyTimes="0;1" />
                    </rect>
                    <rect x="100" y="100" width="100" height="30" rx="5" fill="rgba(255,255,255,0.4)">
                        <animate attributeName="y" from="100" to="90" dur="2s" repeatCount="indefinite" begin="0s" fill="freeze" calcMode="spline" keySplines="0.5 0 0.5 1" keyTimes="0;1" />
                        <animate attributeName="y" from="90" to="100" dur="2s" repeatCount="indefinite" begin="2s" fill="freeze" calcMode="spline" keySplines="0.5 0 0.5 1" keyTimes="0;1" />
                    </rect>
                    <line x1="150" y1="100" x2="150" y2="200" stroke="white" stroke-width="2" opacity="0.6">
                        <animate attributeName="y1" from="100" to="90" dur="2s" repeatCount="indefinite" begin="0s" />
                        <animate attributeName="y2" from="200" to="190" dur="2s" repeatCount="indefinite" begin="0s" />
                        <animate attributeName="y1" from="90" to="100" dur="2s" repeatCount="indefinite" begin="2s" />
                        <animate attributeName="y2" from="190" to="200" dur="2s" repeatCount="indefinite" begin="2s" />
                    </line>
                    <line x1="100" y1="115" x2="200" y2="115" stroke="white" stroke-width="2" opacity="0.6">
                        <animate attributeName="y1" from="115" to="105" dur="2s" repeatCount="indefinite" begin="0s" />
                        <animate attributeName="y2" from="115" to="105" dur="2s" repeatCount="indefinite" begin="0s" />
                        <animate attributeName="y1" from="105" to="115" dur="2s" repeatCount="indefinite" begin="2s" />
                        <animate attributeName="y2" from="105" to="115" dur="2s" repeatCount="indefinite" begin="2s" />
                    </line>
                </g>
                <!-- Delivery path dots -->
                <circle cx="50" cy="150" r="5" fill="white" opacity="0.6">
                    <animate attributeName="opacity" from="0.6" to="1" dur="1s" repeatCount="indefinite"/>
                </circle>
                <circle cx="100" cy="150" r="5" fill="white" opacity="0.6">
                    <animate attributeName="opacity" from="0.6" to="1" dur="1s" begin="0.3s" repeatCount="indefinite"/>
                </circle>
                <circle cx="150" cy="150" r="5" fill="white" opacity="0.6">
                    <animate attributeName="opacity" from="0.6" to="1" dur="1s" begin="0.6s" repeatCount="indefinite"/>
                </circle>
                <circle cx="200" cy="150" r="5" fill="white" opacity="0.6">
                    <animate attributeName="opacity" from="0.6" to="1" dur="1s" begin="0.9s" repeatCount="indefinite"/>
                </circle>
                <circle cx="250" cy="150" r="5" fill="white" opacity="0.6">
                    <animate attributeName="opacity" from="0.6" to="1" dur="1s" begin="1.2s" repeatCount="indefinite"/>
                </circle>
            </svg>
        </div>
    </div>

    <!-- Right Side - Form -->
    <div class="form-side">
        <!-- Language Switcher -->
        <div class="lang-switcher">
            <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
            <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
        </div>

        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">
                    <span class="lang-content fr active">Connexion Transporteur</span>
                    <span class="lang-content en">Carrier Connection</span>
                </h2>
                <p class="form-subtitle">
                    <span class="lang-content fr active">Pas encore de compte ?</span>
                    <span class="lang-content en">Don't have an account?</span>
                    <a href="{{url('driver/signup')}}">
                        <span class="lang-content fr active">Inscrivez-vous</span>
                        <span class="lang-content en">Sign up</span>
                    </a>
                </p>
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

            <form id="loginForm" method="POST" action="{{url('driver/login')}}">
                @csrf
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Email</span>
                        <span class="lang-content en">Email</span>
                    </label>
                    <input type="email" name="email" class="form-input" id="email" required
                           placeholder="marie.laurent@example.com">
                    <span class="error-message" id="emailError">
                            <span class="lang-content fr active">Email invalide</span>
                            <span class="lang-content en">Invalid email</span>
                        </span>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Mot de passe</span>
                        <span class="lang-content en">Password</span>
                    </label>
                    <div class="password-input-container">
                        <input type="password" name="password" class="form-input" id="password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <span id="eyeIcon">👁️</span>
                        </button>
                    </div>
                    <span class="error-message" id="passwordError">
                            <span class="lang-content fr active">Mot de passe incorrect</span>
                            <span class="lang-content en">Incorrect password</span>
                        </span>
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            <span class="lang-content fr active">Se souvenir de moi</span>
                            <span class="lang-content en">Remember me</span>
                        </label>
                    </div>
                    <a href="{{url('driver/forgot-password')}}" class="forgot-link">
                        <span class="lang-content fr active">Mot de passe oublié ?</span>
                        <span class="lang-content en">Forgot password?</span>
                    </a>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                        <span class="btn-text">
                            <span class="lang-content fr active">Se connecter</span>
                            <span class="lang-content en">Sign in</span>
                        </span>
                    <div class="spinner"></div>
                </button>
            </form>

            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">
                        <span class="lang-content fr active">OU</span>
                        <span class="lang-content en">OR</span>
                    </span>
                <div class="divider-line"></div>
            </div>

            <div class="social-buttons">
                <a href="{{ url('driver/auth/google') }}" style="text-decoration: none" class="btn-social">
                    <span>🔵</span>
                    <span>Google</span>
                </a>
                <button class="btn-social">
                    <span>🔷</span>
                    <span>Facebook</span>
                </button>
            </div>

            <div class="switch-mode">
                <p class="switch-mode-text">
                    <span class="lang-content fr active">Vous êtes expéditeur ?</span>
                    <span class="lang-content en">Are you a shipper?</span>
                    <a href="{{ url('user/login') }}" class="switch-mode-link">
                        <span class="lang-content fr active">Connectez-vous ici</span>
                        <span class="lang-content en">Login here</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
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

    // Toggle password visibility
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            eyeIcon.textContent = '👁️';
        }
    }

    // Clear error messages on input
    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('error');
            this.parentElement.querySelector('.error-message')?.classList.remove('show');
        });
    });

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
