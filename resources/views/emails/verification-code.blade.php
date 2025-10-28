<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
            line-height: 1.6;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .templates-grid {
            display: grid;
            gap: 30px;
        }

        .template-section {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--primary);
        }

        .section-header {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .section-description {
            color: var(--text-light);
            font-size: 14px;
        }

        .email-template {
            max-width: 600px;
            margin: 0 auto 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .email-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 30px;
            text-align: center;
        }

        .email-logo {
            display: inline-block;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            margin: 0 auto 15px;
        }

        .email-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .email-subtitle {
            opacity: 0.9;
            font-size: 14px;
        }

        .email-body {
            padding: 30px;
        }

        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .notification-box {
            background: #f8fafc;
            border-left: 4px solid var(--primary);
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
        }

        .notification-box.success {
            border-left-color: var(--success);
            background: rgba(16, 185, 129, 0.05);
        }

        .notification-box.warning {
            border-left-color: var(--warning);
            background: rgba(245, 158, 11, 0.05);
        }

        .notification-box.info {
            border-left-color: var(--accent);
            background: rgba(6, 182, 212, 0.05);
        }

        .notification-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .notification-text {
            color: var(--text);
            font-size: 14px;
            line-height: 1.6;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: #f8fafc;
            border-radius: 8px;
            overflow: hidden;
        }

        .details-table th,
        .details-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .details-table th {
            background: var(--light);
            font-weight: 600;
            color: var(--text);
            font-size: 13px;
        }

        .details-table td {
            color: var(--dark);
            font-size: 14px;
        }

        .details-table tr:last-child th,
        .details-table tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-success {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .status-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .status-info {
            background: rgba(6, 182, 212, 0.1);
            color: #0891b2;
        }

        .status-pending {
            background: rgba(107, 114, 128, 0.1);
            color: #4b5563;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            margin: 20px 0;
            text-align: center;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        .cta-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            box-shadow: none;
        }

        .email-footer {
            background: #f8fafc;
            padding: 30px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }

        .footer-text {
            color: var(--text-light);
            font-size: 13px;
            line-height: 1.6;
        }

        .footer-links {
            margin-top: 20px;
        }

        .footer-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 13px;
            margin: 0 10px;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        .timeline {
            margin: 20px 0;
        }

        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .timeline-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .timeline-dot.completed {
            background: var(--success);
        }

        .timeline-dot.current {
            background: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
        }

        .timeline-dot.pending {
            background: #e5e7eb;
        }

        .timeline-text {
            color: var(--text);
        }

        .timeline-time {
            color: var(--text-light);
            font-size: 12px;
            margin-left: auto;
        }

        .price-highlight {
            background: linear-gradient(135deg, var(--success), #0d9488);
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
        }

        .price-amount {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .price-label {
            font-size: 13px;
            opacity: 0.9;
        }

        .template-preview {
            margin-bottom: 40px;
        }

        .preview-label {
            background: var(--primary);
            color: white;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 6px 6px 0 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
<!-- Template 7: Account Verification -->
<div class="template-preview">
    <div class="preview-label">Account Verification</div>
    <div class="email-template">
        <div class="email-header" style="background: linear-gradient(135deg, var(--accent), #0891b2);">
            <div class="email-logo">JC</div>
            <div class="email-title">Welcome to JeConfie</div>
            <div class="email-subtitle">Please verify your account</div>
        </div>
        <div class="email-body">
            <div class="greeting">Dear User/Carrier,</div>

            <div class="notification-box info">
                <div class="notification-text">Welcome to JeConfie! To start offering your transport services, please verify your email address by using following verification code.</div>
            </div>

            <table class="details-table">
                <p>Your verification code is:</p>
                <h1 style="color:#2c7be5;">{{ $code }}</h1>
                <p>This code will expire in 10 minutes.</p>
            </table>

        </div>
        <div class="email-footer">
            <p class="footer-text">
                If you didn't create this account, please ignore this email.<br>
                The verification code expires in 10 minutes.
            </p>
        </div>
    </div>
</div>
</body>
</html>
