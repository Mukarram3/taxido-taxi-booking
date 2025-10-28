<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Je confie - Envoyez moins cher, Voyagez utile | Transport Écologique</title>
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
            background: #ffffff;
            overflow-x: hidden;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Variables */
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

        /* Language Management */
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: inline-block;
        }

        .lang-block {
            display: none;
        }

        .lang-block.active {
            display: block;
        }

        /* Language Switcher */
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

        /* Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            z-index: 1000;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
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
            box-shadow: var(--shadow);
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 36px;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        /* Quick Actions Bar */
        .quick-actions-bar {
            position: fixed;
            top: 72px;
            width: 100%;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            z-index: 999;
            padding: 12px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .quick-actions-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .quick-action-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            background: white;
            color: var(--primary);
            border-radius: 100px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .quick-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .quick-action-btn.primary {
            background: var(--dark);
            color: white;
        }

        .btn {
            padding: 12px 24px;
            border-radius: var(--radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 14px;
        }

        .btn-ghost {
            background: transparent;
            color: var(--dark);
        }

        .btn-ghost:hover {
            background: var(--light);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-eco {
            background: linear-gradient(135deg, var(--eco-green), var(--success));
            color: white;
            box-shadow: var(--shadow);
        }

        .btn-eco:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #dc8a0a;
            transform: translateY(-2px);
        }

        .btn-large {
            padding: 16px 32px;
            font-size: 16px;
            border-radius: var(--radius-lg);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--primary);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--light);
            border-color: var(--primary);
        }

        .btn-white {
            background: white;
            color: var(--primary);
        }

        .btn-white:hover {
            background: var(--light);
        }

        .btn-outline-white {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline-white:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Hero Section */
        .hero {
            margin-top: 120px;
            padding: 60px 0 40px;
            background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--eco-green) 0%, transparent 70%);
            opacity: 0.05;
            top: -300px;
            right: -200px;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        .hero-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            color: var(--dark);
        }

        .hero-content h1 span {
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p {
            font-size: 1.25rem;
            color: var(--gray);
            margin-bottom: 32px;
            line-height: 1.8;
        }

        .eco-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: var(--eco-green);
            padding: 8px 16px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .hero-stats {
            display: flex;
            gap: 40px;
            margin-bottom: 40px;
        }

        .hero-stat {
            display: flex;
            flex-direction: column;
        }

        .hero-stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }

        .hero-stat-label {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .hero-actions {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        /* Hero Visual */
        .hero-visual {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .service-visual-card {
            background: white;
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            transition: all 0.3s ease;
        }

        .service-visual-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.2);
        }

        .visual-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .visual-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .visual-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            padding: 20px;
        }

        .visual-tag {
            display: inline-block;
            padding: 6px 12px;
            background: white;
            color: var(--dark);
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
        }

        .visual-content {
            padding: 24px;
        }

        .visual-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .visual-description {
            color: var(--gray);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .visual-features {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .visual-feature {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            background: var(--light);
            border-radius: var(--radius);
            font-size: 14px;
            font-weight: 500;
        }

        .feature-icon {
            font-size: 16px;
        }

        .visual-benefits {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .benefit-tag {
            padding: 6px 12px;
            background: linear-gradient(135deg, var(--eco-green), var(--success));
            color: white;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 600;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px;
        }

        .section-tag {
            display: inline-block;
            padding: 8px 16px;
            background: white;
            color: var(--primary);
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--gray);
            line-height: 1.8;
        }

        /* Concept Section */
        .concept-section {
            padding: 80px 0;
            background: white;
        }

        .concept-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .concept-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-top: 60px;
        }

        .concept-card {
            text-align: center;
            position: relative;
        }

        .concept-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, var(--light), white);
            border-radius: var(--radius-lg);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .concept-illustration {
            width: 200px;
            height: 200px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            box-shadow: var(--shadow-lg);
        }

        .concept-icon {
            font-size: 64px;
            margin-bottom: 12px;
        }

        .concept-step {
            position: absolute;
            top: -10px;
            left: -10px;
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            box-shadow: var(--shadow);
        }

        .concept-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .concept-description {
            color: var(--gray);
            line-height: 1.6;
        }

        /* Service Types Section */
        .service-types {
            padding: 60px 0;
            background: var(--light);
        }

        .service-types-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .service-cards {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two equal columns */
            gap: 2rem; /* space between cards */
            margin: 2rem 0;
        }

        .service-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--eco-green));
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .service-real-image {
            width: 100%;
            height: 180px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .service-real-image img {
            width: 100%;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .service-card-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .service-card h3 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .service-card-description {
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .service-highlight {
            background: var(--warning);
            color: white;
            padding: 12px 16px;
            border-radius: var(--radius);
            font-weight: 600;
            margin-bottom: 24px;
            text-align: center;
        }

        .service-features {
            list-style: none;
            margin-bottom: 32px;
        }

        .service-features li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 0;
            color: var(--dark);
        }

        .service-features li::before {
            content: '✔';
            width: 24px;
            height: 24px;
            background: var(--eco-green);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 12px;
        }

        .service-card-cta {
            display: flex;
            gap: 12px;
        }

        /* Promotional Banner */
        .promo-banner {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 24px;
            border-radius: var(--radius-lg);
            margin: 40px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .promo-banner::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .promo-banner h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .promo-banner p {
            font-size: 1rem;
            opacity: 0.95;
            margin-bottom: 16px;
        }

        /* Latest Offers Section */
        .latest-offers {
            padding: 60px 0;
            background: white;
        }

        .offers-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .offers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 24px;
        }

        .offer-card {
            background: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            border: 2px solid var(--border);
        }

        .offer-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .offer-type-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            padding: 6px 12px;
            background: var(--primary);
            color: white;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
            z-index: 1;
            text-transform: uppercase;
        }

        .offer-type-badge.cotransport {
            background: var(--warning);
        }

        .offer-badges {
            position: absolute;
            top: 16px;
            right: 16px;
            display: flex;
            gap: 8px; /* space between badges */
            z-index: 10;
        }

        .offer-badge {
            padding: 6px 12px;
            background: var(--success);
            color: white;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        /* Specific badge colors */
        .offer-badge.urgent {
            background: var(--danger);
        }

        .offer-badge.professional {
            background: var(--primary); /* or a custom color you like */
        }

        /* Make sure header has relative positioning for absolute badges */
        .offer-card {
            position: relative;
            overflow: hidden;
        }


        .offer-badge.eco {
            background: var(--eco-green);
        }

        .offer-header {
            padding: 16px;
            padding-top: 45px;
            border-bottom: 1px solid var(--border);
        }

        .offer-route {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 12px 0px;
        }

        .route-point {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
        }

        .route-arrow {
            color: var(--gray);
        }

        .offer-date {
            display: flex;
            flex-direction: column;
            gap: 4px;
            font-size: 12px;
        }

        .offer-body {
            padding: 16px;
        }

        .offer-details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }

        .offer-detail {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .detail-icon {
            width: 32px;
            height: 32px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            margin-bottom: 6px;
            font-size: 16px;
        }

        .detail-value {
            font-weight: 700;
            color: var(--dark);
            font-size: 13px;
        }

        .detail-label {
            font-size: 11px;
            color: var(--gray);
        }

        .offer-footer {
            padding: 16px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .offer-user {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 13px;
        }

        .user-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            color: var(--gray);
        }

        .star {
            color: var(--warning);
        }

        .profile-badges {
            display: flex;
            gap: 8px;
            margin-top: 6px;
        }

        .profile-badge {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            background: var(--light);
            border-radius: 100px;
            font-size: 11px;
            color: var(--dark);
        }

        .profile-badge.verified {
            background: #dbeafe;
            color: #1e40af;
        }

        .offer-price {
            text-align: right;
        }

        .price-value {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--primary);
        }

        .price-unit {
            font-size: 12px;
            color: var(--gray);
        }

        .price-eco {
            font-size: 10px;
            color: var(--eco-green);
            margin-top: 2px;
        }

        .offer-actions {
            padding: 0 16px 16px;
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .offer-actions .btn {
            flex: 1;
            min-width: 75px;
            padding: 7px 10px;
            font-size: 12px;
            justify-content: center;
        }

        /* Popular Destinations Section */
        .popular-destinations {
            padding: 60px 0;
            background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        }

        .destinations-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }

        .destination-card {
            background: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .destination-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .destination-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .destination-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .destination-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            padding: 20px;
        }

        .destination-info {
            padding: 20px;
        }

        /* How It Works */
        .how-it-works {
            padding: 60px 0;
            background: var(--light);
        }

        .steps-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            margin-bottom: 60px;
        }

        .step-section {
            background: white;
            border-radius: var(--radius-xl);
            padding: 40px;
        }

        .step-section h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 32px;
            color: var(--dark);
        }

        .step {
            display: flex;
            gap: 20px;
            margin-bottom: 24px;
        }

        .step-number {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }

        .step-content h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .step-content p {
            color: var(--gray);
            font-size: 15px;
            line-height: 1.6;
        }

        /* Features Section */
        .features {
            padding: 60px 0;
            background: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .feature-card {
            text-align: center;
        }

        .feature-icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--white), var(--light));
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: var(--shadow);
            font-size: 32px;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .feature-description {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.6;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 60px 0;
            background: var(--light);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .testimonial-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 32px;
            position: relative;
        }

        .testimonial-quote {
            font-size: 48px;
            color: var(--primary);
            opacity: 0.2;
            position: absolute;
            top: 20px;
            left: 24px;
            line-height: 1;
        }

        .testimonial-content {
            position: relative;
            z-index: 1;
            margin-bottom: 24px;
            color: var(--dark);
            line-height: 1.8;
            font-size: 15px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-info {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            font-weight: 600;
            color: var(--dark);
        }

        .author-role {
            font-size: 14px;
            color: var(--gray);
        }

        /* CTA Section */
        .cta {
            padding: 60px 0;
            background: linear-gradient(135deg, var(--primary), var(--eco-green));
            color: white;
            text-align: center;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 32px;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-brand h3 {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .footer-brand p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary);
        }

        .footer-section h4 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: transparent;
            border: none;
            font-size: 24px;
            color: var(--dark);
            cursor: pointer;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 72px;
            left: 0;
            right: 0;
            background: white;
            box-shadow: var(--shadow-lg);
            z-index: 998;
            max-height: calc(100vh - 72px);
            overflow-y: auto;
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-menu-content {
            padding: 20px;
        }

        .mobile-menu-links {
            list-style: none;
        }

        .mobile-menu-links li {
            margin-bottom: 16px;
        }

        .mobile-menu-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            display: block;
            padding: 12px;
            border-radius: var(--radius);
            transition: background 0.3s ease;
        }

        .mobile-menu-links a:hover {
            background: var(--light);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .steps-grid {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr 1fr;
            }

            .concept-grid {
                grid-template-columns: 1fr;
            }

            .service-cards {
                grid-template-columns: 1fr;
            }

            .offers-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .nav-menu,
            .nav-actions .btn {
                display: none;
            }

            .hero{
                margin-top: 0px;
            }
            .quick-actions-bar{
                position: relative;
                top: 0px;
                margin-top: 73px;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .hero-stats {
                gap: 24px;
            }

            .hero-stat-value {
                font-size: 1.5rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .destinations-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions-container {
                flex-direction: column;
                padding: 0 16px;
            }

            .quick-action-btn {
                width: 100%;
                justify-content: center;
            }

            .hero-actions {
                flex-direction: column;
            }

            .hero-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .cta h2 {
                font-size: 1.75rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .cta-buttons .btn {
                width: 100%;
            }

            .service-card-cta {
                flex-direction: column;
            }

            .service-card-cta .btn {
                width: 100%;
            }

            .offer-details {
                grid-template-columns: 1fr;
            }

            .nav-actions {
                gap: 8px;
            }

            .language-switcher {
                display: flex;
            }
        }

        @media (max-width: 480px) {

            .hero-content h1 {
                font-size: 1.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .concept-card,
            .feature-card,
            .testimonial-card,
            .service-card {
                padding: 20px;
            }

            .offer-card {
                margin: 0 -10px;
            }

            .offers-grid {
                gap: 16px;
            }
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="logo">
            <div class="logo-icon">JC</div>
            <span class="logo-text">Je confie</span>
        </a>

        <ul class="nav-menu">
            <li><a href="#services" class="nav-link">
                    <span class="lang-content fr active">Nos Services</span>
                    <span class="lang-content en">Our Services</span>
                </a></li>
            <li><a href="#comment" class="nav-link">
                    <span class="lang-content fr active">Comment ça marche</span>
                    <span class="lang-content en">How it works</span>
                </a></li>
            <li><a href="#concept" class="nav-link">
                    <span class="lang-content fr active">Le Concept</span>
                    <span class="lang-content en">The Concept</span>
                </a></li>
            <li><a href="#" class="nav-link">
                    <span class="lang-content fr active">Voir les annonces</span>
                    <span class="lang-content en">View listings</span>
                </a></li>
        </ul>

        <div class="nav-actions">
            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
            <a href="{{ url('user/login') }}" class="btn btn-ghost">
                <span class="lang-content fr active">Connexion</span>
                <span class="lang-content en">Login</span>
            </a>
            <a href="{{ url('user/signup') }}" class="btn btn-primary">
                <span class="lang-content fr active">Inscription</span>
                <span class="lang-content en">Sign up</span>
            </a>
        </div>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-content">
        <ul class="mobile-menu-links">
            <li><a href="#services" onclick="toggleMobileMenu()">
                    <span class="lang-content fr active">Nos Services</span>
                    <span class="lang-content en">Our Services</span>
                </a></li>
            <li><a href="#comment" onclick="toggleMobileMenu()">
                    <span class="lang-content fr active">Comment ça marche</span>
                    <span class="lang-content en">How it works</span>
                </a></li>
            <li><a href="#concept" onclick="toggleMobileMenu()">
                    <span class="lang-content fr active">Le Concept</span>
                    <span class="lang-content en">The Concept</span>
                </a></li>
            <li><a href="{{ url('/create-offer') }}" onclick="toggleMobileMenu()">
                    <span class="lang-content fr active">Créer une annonce</span>
                    <span class="lang-content en">Create a listing</span>
                </a></li>
            <li><a href="#" onclick="toggleMobileMenu()">
                    <span class="lang-content fr active">Connexion</span>
                    <span class="lang-content en">Login</span>
                </a></li>
            <li><a href="#" onclick="toggleMobileMenu()">
                    <span class="lang-content fr active">Inscription</span>
                    <span class="lang-content en">Sign up</span>
                </a></li>
        </ul>
        <div class="language-switcher" style="margin-top: 20px;">
            <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
            <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
        </div>
    </div>
</div>

<!-- Quick Actions Bar -->
<div class="quick-actions-bar">
    <div class="quick-actions-container">
        <a href="{{ url('/transportation-request') }}" class="quick-action-btn primary">
            ✈️
            <span class="lang-content fr active">Je voyage</span>
            <span class="lang-content en">I'm traveling</span>
        </a>
        <a href="{{ url('/create-offer') }}" class="quick-action-btn">
            📦
            <span class="lang-content fr active">Expédier</span>
            <span class="lang-content en">Ship</span>
        </a>
        <a href="{{ url('/search-listing') }}" class="quick-action-btn">
            🔍
            <span class="lang-content fr active">Voir toutes les annonces</span>
            <span class="lang-content en">View all listings</span>
        </a>
    </div>
</div>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <div class="eco-badge">
                🌱 <span class="lang-content fr active">Solution éco-responsable</span>
                <span class="lang-content en">Eco-friendly solution</span>
            </div>

            <h1>
                <span class="lang-content fr active">Rentabilisez vos trajets,<br></span>
                <span class="lang-content en">Monetize your trips,<br></span>
                <span>
                        <span class="lang-content fr active">Économisez vos envois</span>
                        <span class="lang-content en">Save on shipping</span>
                    </span>
            </h1>

            <p>
                <span class="lang-content fr active">Économisez jusqu'à 70% sur vos envois tout en réduisant votre empreinte carbone. Rejoignez 150 000+ utilisateurs qui ont déjà choisi le transport collaboratif.</span>
                <span class="lang-content en">Save up to 70% on shipping while reducing your carbon footprint. Join 150,000+ users who have already chosen collaborative transport.</span>
            </p>

            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="hero-stat-value">-70%</span>
                    <span class="hero-stat-label">
                            <span class="lang-content fr active">d'économies</span>
                            <span class="lang-content en">savings</span>
                        </span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">-85%</span>
                    <span class="hero-stat-label">CO2</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">4.8/5</span>
                    <span class="hero-stat-label">
                            <span class="lang-content fr active">Satisfaction</span>
                            <span class="lang-content en">Rating</span>
                        </span>
                </div>
            </div>

            <div class="hero-actions">
                <a href="{{ url('create-offer') }}" class="btn btn-primary btn-large">
                    📦
                    <span class="lang-content fr active">J'ai un colis à envoyer</span>
                    <span class="lang-content en">I have a package to send</span>
                </a>
                <a href="{{ url('create-offer') }}" class="btn btn-eco btn-large">
                    ✈️
                    <span class="lang-content fr active">Je voyage et j'ai de la place</span>
                    <span class="lang-content en">I'm traveling with space</span>
                </a>
            </div>
        </div>

        <div class="hero-visual">
            <div class="service-visual-card">
                <div class="visual-image-container">
                    <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=800&h=600" alt="Aéroport avec avion et passagers" class="visual-image">
                    <div class="visual-overlay">
                        <div class="visual-tag">✈️ Service Réservation</div>
                    </div>
                </div>
                <div class="visual-content">
                    <h3 class="visual-title">
                        <span class="lang-content fr active">Voyageurs avec espace bagage</span>
                        <span class="lang-content en">Travelers with luggage space</span>
                    </h3>
                    <p class="visual-description">
                        <span class="lang-content fr active">Les voyageurs transportent vos colis dans leurs valises lors de leurs déplacements</span>
                        <span class="lang-content en">Travelers transport your packages in their luggage during their trips</span>
                    </p>
                    <div class="visual-features">
                        <div class="visual-feature">
                            ✈️
                            Avion
                        </div>
                        <div class="visual-feature">
                            🚄
                            Train
                        </div>
                        <div class="visual-feature">
                            🚌
                            Bus
                        </div>
                        <div class="visual-feature">
                            🚢
                            Bateau
                        </div>
                    </div>
                    <div class="visual-benefits">
                        <span class="benefit-tag">💰 -70% vs transporteurs</span>
                        <span class="benefit-tag">🌱 -85% CO2</span>
                    </div>
                </div>
            </div>

            <div class="service-visual-card">
                <div class="visual-image-container">
                    <img src="{{ asset('assets/images/Transport-international-colis-entre-particulier-.jpeg') }}" alt="Chauffeur chargeant des bagages dans son van" class="visual-image">
                    <div class="visual-overlay">
                        <div class="visual-tag">🚗 Co-transport</div>
                    </div>
                </div>
                <div class="visual-content">
                    <h3 class="visual-title">
                        <span class="lang-content fr active">Conducteurs avec espace véhicule</span>
                        <span class="lang-content en">Drivers with vehicle space</span>
                    </h3>
                    <p class="visual-description">
                        <span class="lang-content fr active">Des conducteurs transportent vos gros colis et meubles dans leur véhicule</span>
                        <span class="lang-content en">Drivers transport your large packages and furniture in their vehicle</span>
                    </p>
                    <div class="visual-features">
                        <div class="visual-feature">
                            🛋️
                            Meubles
                        </div>
                        <div class="visual-feature">
                            📺
                            Électro
                        </div>
                        <div class="visual-feature">
                            📦
                            Déménagement
                        </div>
                    </div>
                    <div class="visual-benefits">
                        <span class="benefit-tag">🚚 Gros volumes</span>
                        <span class="benefit-tag">💬 Prix négociable</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How Concept Works Section -->
<section class="concept-section" id="concept">
    <div class="concept-container">
        <div class="section-header">
                <span class="section-tag">
                    <span class="lang-content fr active">💡 LE CONCEPT</span>
                    <span class="lang-content en">💡 THE CONCEPT</span>
                </span>
            <h2 class="section-title">
                <span class="lang-content fr active">Comment ça fonctionne ?</span>
                <span class="lang-content en">How does it work?</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">Un système gagnant-gagnant pour tous</span>
                <span class="lang-content en">A win-win system for everyone</span>
            </p>
        </div>

        <div class="concept-grid">
            <div class="concept-card">
                <span class="concept-step">1</span>
                <div class="concept-image">
                    <div class="concept-illustration">
                        <span class="concept-icon">🤝</span>
                        <span style="font-weight: 600; color: var(--dark);">
                                <span class="lang-content fr active">Connexion</span>
                                <span class="lang-content en">Connection</span>
                            </span>
                    </div>
                </div>
                <h3 class="concept-title">
                    <span class="lang-content fr active">Mise en relation</span>
                    <span class="lang-content en">Matchmaking</span>
                </h3>
                <p class="concept-description">
                    <span class="lang-content fr active">Les expéditeurs et voyageurs se connectent sur notre plateforme sécurisée pour partager l'espace disponible.</span>
                    <span class="lang-content en">Senders and travelers connect on our secure platform to share available space.</span>
                </p>
            </div>

            <div class="concept-card">
                <span class="concept-step">2</span>
                <div class="concept-image">
                    <div class="concept-illustration">
                        <span class="concept-icon">📦</span>
                        <span style="font-weight: 600; color: var(--dark);">
                                <span class="lang-content fr active">Transport</span>
                                <span class="lang-content en">Transport</span>
                            </span>
                    </div>
                </div>
                <h3 class="concept-title">
                    <span class="lang-content fr active">Voyage collaboratif</span>
                    <span class="lang-content en">Collaborative travel</span>
                </h3>
                <p class="concept-description">
                    <span class="lang-content fr active">Le voyageur transporte le colis dans ses bagages ou son véhicule, optimisant l'espace déjà utilisé.</span>
                    <span class="lang-content en">The traveler transports the package in their luggage or vehicle, optimizing already used space.</span>
                </p>
            </div>

            <div class="concept-card">
                <span class="concept-step">3</span>
                <div class="concept-image">
                    <div class="concept-illustration">
                        <span class="concept-icon">💚</span>
                        <span style="font-weight: 600; color: var(--dark);">
                                <span class="lang-content fr active">Impact positif</span>
                                <span class="lang-content en">Positive impact</span>
                            </span>
                    </div>
                </div>
                <h3 class="concept-title">
                    <span class="lang-content fr active">Bénéfices partagés</span>
                    <span class="lang-content en">Shared benefits</span>
                </h3>
                <p class="concept-description">
                    <span class="lang-content fr active">Économies pour l'expéditeur, revenus pour le voyageur, et réduction de l'empreinte carbone pour tous.</span>
                    <span class="lang-content en">Savings for the sender, income for the traveler, and carbon footprint reduction for everyone.</span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Service Types Section -->
<section class="service-types" id="services">
    <div class="service-types-container">
        <div class="section-header">
                <span class="section-tag">
                    <span class="lang-content fr active">🚀 NOS SERVICES</span>
                    <span class="lang-content en">🚀 OUR SERVICES</span>
                </span>
            <h2 class="section-title">
                <span class="lang-content fr active">Deux solutions adaptées à vos besoins</span>
                <span class="lang-content en">Two solutions adapted to your needs</span>
            </h2>
        </div>

        <div class="service-cards">
            <div class="service-card">
                <div class="service-real-image">
                    <img src="{{ asset('assets/images/istockphoto-1559912061-612x612.jpg') }}" alt="Avion au décollage">
                </div>
                <div class="service-card-icon">✈️</div>
                <h3>
                    <span class="lang-content fr active">Voyage par Réservation</span>
                    <span class="lang-content en">Travel by Reservation</span>
                </h3>
                <div class="service-highlight">
                    <span class="lang-content fr active">💼 Les voyageurs vendent leur espace bagage disponible !</span>
                    <span class="lang-content en">💼 Travelers sell their available luggage space!</span>
                </div>
                <p class="service-card-description">
                    <span class="lang-content fr active">Des particuliers qui voyagent en avion, train ou bus ont de la place dans leurs bagages. Ils transportent vos petits colis lors de leurs déplacements et rentabilisent leur voyage.</span>
                    <span class="lang-content en">Individuals traveling by plane, train or bus have space in their luggage. They transport your small packages during their trips and monetize their journey.</span>
                </p>
                <ul class="service-features">
                    <li>
                        <span class="lang-content fr active">Colis jusqu'à 30 kg dans les valises</span>
                        <span class="lang-content en">Packages up to 30 kg in suitcases</span>
                    </li>
                    <li>
                        <span class="lang-content fr active">Transport international rapide</span>
                        <span class="lang-content en">Fast international transport</span>
                    </li>
                    <li>
                        <span class="lang-content fr active">Idéal pour documents et petits objets</span>
                        <span class="lang-content en">Ideal for documents and small items</span>
                    </li>
                    <li>
                        <span class="lang-content fr active">Voyageurs gagnent jusqu'à 500€/voyage</span>
                        <span class="lang-content en">Travelers earn up to €500/trip</span>
                    </li>
                </ul>
                <div class="service-card-cta">
                    <a href="{{ url('/create-offer') }}" class="btn btn-primary">
                        <span class="lang-content fr active">Envoyer un colis</span>
                        <span class="lang-content en">Send a package</span>
                    </a>
                    <a href="{{ url('/create-offer') }}" class="btn btn-secondary">
                        <span class="lang-content fr active">Devenir voyageur</span>
                        <span class="lang-content en">Become a traveler</span>
                    </a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-real-image">
                    <img src="{{ asset('assets/images/courrier-anonyme-beaucoup-boites_23-2147767808.jpg') }}" alt="Chauffeur chargeant des bagages dans son van">
                </div>
                <div class="service-card-icon">🚛</div>
                <h3>Co-transport</h3>
                <p class="service-card-description">
                    <span class="lang-content fr active">Pour les objets volumineux et encombrants. Des conducteurs avec de l'espace disponible dans leur véhicule transportent vos gros colis et meubles.</span>
                    <span class="lang-content en">For bulky and large items. Drivers with available space in their vehicle transport your large packages and furniture.</span>
                </p>
                <ul class="service-features">
                    <li>
                        <span class="lang-content fr active">Meubles et électroménager</span>
                        <span class="lang-content en">Furniture and appliances</span>
                    </li>
                    <li>
                        <span class="lang-content fr active">Transport par voiture/camionnette</span>
                        <span class="lang-content en">Transport by car/van</span>
                    </li>
                    <li>
                        <span class="lang-content fr active">Déménagements partiels</span>
                        <span class="lang-content en">Partial moves</span>
                    </li>
                    <li>
                        <span class="lang-content fr active">Prix négociable directement</span>
                        <span class="lang-content en">Directly negotiable price</span>
                    </li>
                </ul>
                <div class="service-card-cta">
                    <a href="{{ url('/create-offer') }}" class="btn btn-primary">
                        <span class="lang-content fr active">Publier une annonce</span>
                        <span class="lang-content en">Post a listing</span>
                    </a>
                    <a href="{{ url('/create-offer') }}" class="btn btn-secondary">
                        <span class="lang-content fr active">Devenir transporteur</span>
                        <span class="lang-content en">Become a carrier</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotional Banner -->
<div class="promo-banner" style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">
    <h3>🎉 <span class="lang-content fr active">Offre de lancement : -20% sur votre première expédition !</span>
        <span class="lang-content en">Launch offer: -20% off your first shipment!</span></h3>
    <p><span class="lang-content fr active">Utilisez le code JECONFIE20 lors de votre réservation</span>
        <span class="lang-content en">Use code JECONFIE20 when booking</span></p>
    <a href="{{ url('/create-offer') }}" class="btn btn-large btn-white">
        <span class="lang-content fr active">J'en profite</span>
        <span class="lang-content en">Get started</span>
    </a>
</div>

<!-- Latest Offers Section -->
<section class="latest-offers" id="offers">
    <div class="offers-container">
        <div class="section-header">
                <span class="section-tag">
                    <span class="lang-content fr active">🔥 DERNIÈRES ANNONCES</span>
                    <span class="lang-content en">🔥 LATEST OFFERS</span>
                </span>
            <h2 class="section-title">
                <span class="lang-content fr active">Les 6 dernières offres publiées</span>
                <span class="lang-content en">The 6 latest published offers</span>
            </h2>
            <p class="section-subtitle">
                <span class="lang-content fr active">4 offres de réservation • 2 offres de co-transport</span>
                <span class="lang-content en">4 reservation offers • 2 co-transport offers</span>
            </p>
        </div>

        <div class="offers-grid">
            @foreach($userriderequests as $offer)
                @php
                    // Determine transport icon
                    $transportIcon = '🚛';
                    if($offer->transport_title) {
                        if(stripos($offer->transport_title, 'Avion') !== false) $transportIcon = '✈️';
                        elseif(stripos($offer->transport_title, 'Train') !== false || stripos($offer->transport_title, 'Eurostar') !== false) $transportIcon = '🚄';
                        elseif(stripos($offer->transport_title, 'Bus') !== false) $transportIcon = '🚌';
                        elseif(stripos($offer->transport_title, 'Vito') !== false) $transportIcon = '🚐';
                        else $transportIcon = '🚢';
                    }

                    $routeFrom = $offer->pickup_location ?? '-';
                    $routeTo = $offer->destination_location ? $offer->destination_location ?? '-' : '-';
                    $packageTypes = json_decode($offer->type_of_package) ?? [];
                @endphp

                <div class="offer-card">
            <span class="offer-type-badge {{ $offer->packages_json ? 'cotransport' : '' }}">
                {{ $offer->packages_json ? 'Co-transport' : 'Réservation' }}
            </span>
                    <div class="offer-badges">
                        @if($offer->is_urgent)
                            <span class="offer-badge urgent">Urgent</span>
                        @endif
                        @if($offer->is_professional)
                            <span class="offer-badge professional">🛡️ Professionnel</span>
                        @endif
                    </div>


                    <div class="offer-header">
                        <div class="offer-route">
                            <div class="route-point">
                                📍 {{ $routeFrom }}
                            </div>
                            <span class="route-arrow">→</span>
                            <div class="route-point">
                                📍 {{ $routeTo }}
                            </div>
                        </div>
                        <div class="offer-date">
                    <span style="color: var(--dark); font-weight: 600;">
                        📅 Départ : {{ $offer->pickup_date ?? '-' }}
                    </span>
                            <span style="color: var(--success); font-size: 12px; font-weight: 600;">
                        ✅ Arrivée : {{ $offer->delivery_date ?? '-' }}
                    </span>
                            <span style="color: var(--primary); font-size: 12px; font-weight: 600;">
                        {{ $transportIcon }} {{ $offer->transport_title ?? '-' }}
                    </span>
                            <span style="color: var(--danger); font-size: 11px; font-weight: 600;">
                        ⏰ Fin réservation : {{ $offer->expiry ?? '-' }}
                    </span>
                        </div>
                    </div>

                    <div class="offer-body">
                        <div class="offer-details">
                            <div class="offer-detail">
                                <div class="detail-icon">{{ $transportIcon }}</div>
                                <span class="detail-value">{{ $offer->transport_title ? explode(' ', $offer->transport_title)[0] : '-' }}</span>
                                <span class="detail-label">Transport</span>
                            </div>
                            <div class="offer-detail">
                                <div class="detail-icon">📦</div>
                                <span class="detail-value">
                                    @if($packageTypes)
                                        {{ implode(', ', $packageTypes) }}
                                    @else
                                        -
                                    @endif
                                </span>
                                <span class="detail-label">Type</span>
                            </div>
                            <div class="offer-detail">
                                <div class="detail-icon">⏱️</div>
                                <span class="detail-value">-</span>
                                <span class="detail-label">Durée</span>
                            </div>
                        </div>
                    </div>

                    <div class="offer-footer">
                        <div class="offer-user">
                            <img src="https://ui-avatars.com/api/?name={{ $offer->user->firstName }}" alt="{{ $offer->user->firstName }}" class="user-avatar">
                            <div class="user-info">
                                <span class="user-name">{{ $offer->user->firstName }}</span>
                                <span class="user-rating">
                            ⭐ {{ $offer->user->rating ?? 0 }} ({{ $offer->user->reviews ?? 0 }})
                        </span>
                                @if($offer->user->verified)
                                    <div class="profile-badges"><span class="profile-badge verified">✅ Vérifié</span></div>
                                @endif
                            </div>
                        </div>
                        <div class="offer-price">
                            <div class="price-value">{{ $offer->fare ?? 0 }}€</div>
                            <div class="price-unit">Total</div>
                            <div class="price-eco">-</div>
                        </div>
                    </div>

                    <div class="offer-actions">
                        <button class="btn btn-primary btn-sm">
                            {{ $offer->packages_json ? '🙋 Me proposer' : '🎫 Réserver' }}
                        </button>
                        <button class="btn btn-outline btn-sm">
                            👁️ Détails
                        </button>
                        <button class="btn btn-outline btn-sm">
                            💬 Chat
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="offers-grid" id="offersGrid">

        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="#" class="btn btn-primary btn-large">
                <span class="lang-content fr active">Voir toutes les annonces →</span>
                <span class="lang-content en">See all offers →</span>
            </a>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-it-works" id="comment">
    <div class="steps-container">
        <div class="section-header">
                <span class="section-tag">
                    <span class="lang-content fr active">📋 GUIDE PRATIQUE</span>
                    <span class="lang-content en">📋 PRACTICAL GUIDE</span>
                </span>
            <h2 class="section-title">
                <span class="lang-content fr active">Comment utiliser notre plateforme ?</span>
                <span class="lang-content en">How to use our platform?</span>
            </h2>
        </div>

        <div class="steps-grid">
            <div class="step-section">
                <h3>
                    <span class="lang-content fr active">Pour les expéditeurs</span>
                    <span class="lang-content en">For senders</span>
                </h3>
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>
                            <span class="lang-content fr active">Publiez votre annonce</span>
                            <span class="lang-content en">Post your listing</span>
                        </h4>
                        <p>
                            <span class="lang-content fr active">Décrivez votre colis, indiquez les lieux de départ et d'arrivée, et fixez votre budget.</span>
                            <span class="lang-content en">Describe your package, indicate departure and arrival locations, and set your budget.</span>
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>
                            <span class="lang-content fr active">Choisissez votre transporteur</span>
                            <span class="lang-content en">Choose your carrier</span>
                        </h4>
                        <p>
                            <span class="lang-content fr active">Recevez des propositions et sélectionnez le voyageur qui correspond à vos critères.</span>
                            <span class="lang-content en">Receive proposals and select the traveler that meets your criteria.</span>
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>
                            <span class="lang-content fr active">Payez en sécurité</span>
                            <span class="lang-content en">Pay securely</span>
                        </h4>
                        <p>
                            <span class="lang-content fr active">Le paiement est sécurisé et ne sera débloqué qu'après la livraison confirmée.</span>
                            <span class="lang-content en">Payment is secure and will only be released after confirmed delivery.</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="step-section">
                <h3>
                    <span class="lang-content fr active">Pour les voyageurs</span>
                    <span class="lang-content en">For travelers</span>
                </h3>
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>
                            <span class="lang-content fr active">Annoncez votre voyage</span>
                            <span class="lang-content en">Announce your trip</span>
                        </h4>
                        <p>
                            <span class="lang-content fr active">Indiquez votre itinéraire, vos dates et l'espace disponible dans vos bagages.</span>
                            <span class="lang-content en">Indicate your itinerary, dates, and available space in your luggage.</span>
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>
                            <span class="lang-content fr active">Acceptez des colis</span>
                            <span class="lang-content en">Accept packages</span>
                        </h4>
                        <p>
                            <span class="lang-content fr active">Consultez les annonces et acceptez celles qui correspondent à votre trajet.</span>
                            <span class="lang-content en">Browse listings and accept those that match your route.</span>
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>
                            <span class="lang-content fr active">Recevez votre paiement</span>
                            <span class="lang-content en">Receive your payment</span>
                        </h4>
                        <p>
                            <span class="lang-content fr active">Une fois la livraison confirmée, recevez votre rémunération directement sur votre compte.</span>
                            <span class="lang-content en">Once delivery is confirmed, receive your payment directly to your account.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="cta-container">
        <h2>
            <span class="lang-content fr active">Prêt à économiser et protéger la planète ?</span>
            <span class="lang-content en">Ready to save money and protect the planet?</span>
        </h2>
        <p>
            <span class="lang-content fr active">Rejoignez la révolution du transport collaboratif</span>
            <span class="lang-content en">Join the collaborative transport revolution</span>
        </p>
        <div class="cta-buttons">
            <a href="{{ url('/create-offer') }}" class="btn btn-white btn-large">
                📦
                <span class="lang-content fr active">Envoyer un colis</span>
                <span class="lang-content en">Send a package</span>
            </a>
            <a href="{{ url('/create-offer') }}" class="btn btn-outline-white btn-large">
                ✈️
                <span class="lang-content fr active">Devenir transporteur</span>
                <span class="lang-content en">Become a carrier</span>
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
            <h3>
                <span style="display: inline-block; width: 32px; height: 32px; background: linear-gradient(135deg, var(--primary), var(--eco-green)); border-radius: 8px; text-align: center; line-height: 32px; color: white; font-size: 16px;">JC</span>
                Je confie
            </h3>
            <p>
                <span class="lang-content fr active">La plateforme de confiance pour le transport collaboratif. Économique, écologique et sécurisé.</span>
                <span class="lang-content en">The trusted platform for collaborative transport. Economical, ecological and secure.</span>
            </p>
            <div class="footer-social">
                <a href="#" class="social-link">f</a>
                <a href="#" class="social-link">𝕏</a>
                <a href="#" class="social-link">in</a>
                <a href="#" class="social-link">📷</a>
            </div>
        </div>

        <div class="footer-section">
            <h4>Services</h4>
            <ul class="footer-links">
                <li><a href="{{ url('/transportation-request') }}">
                        <span class="lang-content fr active">Voyage par réservation</span>
                        <span class="lang-content en">Travel by reservation</span>
                    </a></li>
                <li><a href="{{ url('/create-offer') }}">Co-transport</a></li>
                <li><a href="{{ url('/become-carrier') }}">
                        <span class="lang-content fr active">Devenir transporteur</span>
                        <span class="lang-content en">Become carrier</span>
                    </a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>
                <span class="lang-content fr active">Entreprise</span>
                <span class="lang-content en">Company</span>
            </h4>
            <ul class="footer-links">
                <li><a href="{{ url('/about-jeconfie') }}">
                        <span class="lang-content fr active">À propos</span>
                        <span class="lang-content en">About</span>
                    </a></li>
                <li><a href="{{ url('/our-mission') }}">
                        <span class="lang-content fr active">Notre mission</span>
                        <span class="lang-content en">Our mission</span>
                    </a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>
                <span class="lang-content fr active">Ressources</span>
                <span class="lang-content en">Resources</span>
            </h4>
            <ul class="footer-links">
                <li><a href="{{ url('/help-center') }}">
                        <span class="lang-content fr active">Centre d'aide</span>
                        <span class="lang-content en">Help center</span>
                    </a></li>
                <li><a href="{{ url('/faq-jeconfie') }}">FAQ</a></li>
                <li><a href="{{ url('/contact-jeconfie') }}">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>
                <span class="lang-content fr active">Légal</span>
                <span class="lang-content en">Legal</span>
            </h4>
            <ul class="footer-links">
                <li><a href="{{ url('/cgu') }}">CGU</a></li>
                <li><a href="{{ url('/cgv') }}">CGV</a></li>
                <li><a href="{{ url('/legal-notice') }}">
                        <span class="lang-content fr active">Mentions Légales</span>
                        <span class="lang-content en">Legal Notice</span>
                    </a></li>
                <li><a href="{{ url('/privacy-policy-jeconfie') }}">
                        <span class="lang-content fr active">Politique de Confidentialité</span>
                        <span class="lang-content en">Privacy Policy</span>
                    </a></li>
                <li><a href="{{ url('/cookies-jeconfie') }}">Cookies</a></li>
                <li><a href="{{ url('/rgpd-jenonfie') }}">RGPD</a></li>
                <li><a href="{{ url('/special-intermediation-conditions') }}">Special Intermediation Conditions</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2025 Je confie - FRANCK JUBEL LOEMBET - 32 avenue Francis de Pressensé, 69200 Vénissieux |
            <span class="lang-content fr active">Tous droits réservés</span>
            <span class="lang-content en">All rights reserved</span>
        </p>
    </div>
</footer>

<!-- Scripts -->
<script>
    // Sample offers data
    const offersData = [
        {
            type: 'reservation',
            route: { from: 'Paris CDG', to: 'New York JFK' },
            date: '28 janvier - 14h30',
            arrival: '28 janvier - 16h30 (heure locale)',
            transport: 'Air France - Vol AF022',
            deadline: '26 janvier 23h59',
            transportType: 'Avion',
            capacity: '15 kg',
            duration: '8h',
            user: { name: 'Thomas M.', rating: 4.9, reviews: 127, verified: true },
            price: { value: 12, unit: 'par kg', savings: '-65% vs DHL' }
        },
        {
            type: 'reservation',
            route: { from: 'Marseille', to: 'Alger' },
            date: '2 février - 20h00',
            arrival: '3 février - 16h00',
            transport: 'Corsica Linea - Ferry Danielle Casanova',
            deadline: '31 janvier 23h59',
            transportType: 'Ferry',
            capacity: '30 kg',
            duration: '20h',
            user: { name: 'Ahmed K.', rating: 4.9, reviews: 156, verified: true },
            price: { value: 6, unit: 'par kg', savings: '-75% vs DHL' }
        },
        {
            type: 'reservation',
            route: { from: 'Paris Nord', to: 'Londres' },
            date: '30 janvier - 09h15',
            arrival: '30 janvier - 11h45',
            transport: 'Eurostar - Train 9015',
            deadline: '28 janvier 23h59',
            transportType: 'Eurostar',
            capacity: '10 kg',
            duration: '2h30',
            user: { name: 'Lucas B.', rating: 4.8, reviews: 203, verified: true },
            price: { value: 8, unit: 'par kg', savings: '-60% vs Chronopost' }
        },
        {
            type: 'reservation',
            route: { from: 'Lyon', to: 'Barcelone' },
            date: '5 février - 06h00',
            arrival: '5 février - 13h30',
            transport: 'FlixBus - Ligne 732',
            deadline: '3 février 23h59',
            transportType: 'FlixBus',
            capacity: '20 kg',
            duration: '7h30',
            user: { name: 'Emma R.', rating: 4.7, reviews: 89, verified: true },
            price: { value: 5, unit: 'par kg', savings: '-70% vs UPS' }
        },
        {
            type: 'cotransport',
            route: { from: 'Lyon', to: 'Marseille' },
            date: 'Demain',
            arrival: 'Demain soir (18h00)',
            transport: 'Mercedes Vito - Van 9 places',
            deadline: '8 heures',
            transportType: 'Mercedes Vito',
            capacity: 'Meuble',
            duration: '4h',
            user: { name: 'Marie D.', rating: 5.0, reviews: 89 },
            price: { value: 65, unit: 'Total', savings: '-70% vs pro' },
            urgent: true
        },
        {
            type: 'cotransport',
            route: { from: 'Paris', to: 'Lille' },
            date: '8 février',
            arrival: '8 février - 11h30',
            transport: 'Renault Master - Fourgon L3H2',
            deadline: '5 février 23h59',
            transportType: 'Renault Master',
            capacity: 'Électroménager',
            duration: '2h30',
            user: { name: 'Pierre L.', rating: 4.6, reviews: 45 },
            price: { value: 85, unit: 'Total', savings: '-60% vs déménageur' }
        }
    ];

    // Populate offers grid
    function populateOffers() {
        const grid = document.getElementById('offersGrid');
        if (!grid) return;

        const offersHTML = offersData.map(offer => {
            const transportIcon = offer.type === 'reservation' ?
                (offer.transportType.includes('Avion') ? '✈️' :
                    offer.transportType.includes('Train') || offer.transportType.includes('Eurostar') ? '🚄' :
                        offer.transportType.includes('Bus') ? '🚌' : '🚢') :
                (offer.transportType.includes('Vito') ? '🚐' : '🚛');

            return `
                    <div class="offer-card">
                        <span class="offer-type-badge ${offer.type === 'cotransport' ? 'cotransport' : ''}">
                            ${offer.type === 'reservation' ? 'Réservation' : 'Co-transport'}
                        </span>
                        ${offer.urgent ? '<span class="offer-badge urgent">Urgent</span>' : '<span class="offer-badge">🛡️ Assuré</span>'}

                        <div class="offer-header">
                            <div class="offer-route">
                                <div class="route-point">
                                    📍 ${offer.route.from}
                                </div>
                                <span class="route-arrow">→</span>
                                <div class="route-point">
                                    📍 ${offer.route.to}
                                </div>
                            </div>
                            <div class="offer-date">
                                <span style="color: var(--dark); font-weight: 600;">
                                    📅 Départ : ${offer.date}
                                </span>
                                <span style="color: var(--success); font-size: 12px; font-weight: 600;">
                                    ✅ Arrivée : ${offer.arrival}
                                </span>
                                <span style="color: var(--primary); font-size: 12px; font-weight: 600;">
                                    ${transportIcon} ${offer.transport}
                                </span>
                                <span style="color: var(--danger); font-size: 11px; font-weight: 600;">
                                    ⏰ Fin réservation : ${offer.deadline}
                                </span>
                            </div>
                        </div>

                        <div class="offer-body">
                            <div class="offer-details">
                                <div class="offer-detail">
                                    <div class="detail-icon">${transportIcon}</div>
                                    <span class="detail-value">${offer.transportType.split(' ')[0]}</span>
                                    <span class="detail-label">Transport</span>
                                </div>
                                <div class="offer-detail">
                                    <div class="detail-icon">${offer.type === 'reservation' ? '💼' : '📦'}</div>
                                    <span class="detail-value">${offer.capacity}</span>
                                    <span class="detail-label">${offer.type === 'reservation' ? 'Capacité' : 'Type'}</span>
                                </div>
                                <div class="offer-detail">
                                    <div class="detail-icon">⏱️</div>
                                    <span class="detail-value">${offer.duration}</span>
                                    <span class="detail-label">Durée</span>
                                </div>
                            </div>
                        </div>

                        <div class="offer-footer">
                            <div class="offer-user">
                                <img src="https://ui-avatars.com/api/?name=${offer.user.name}" alt="${offer.user.name}" class="user-avatar">
                                <div class="user-info">
                                    <span class="user-name">${offer.user.name}</span>
                                    <span class="user-rating">
                                        ⭐ ${offer.user.rating} (${offer.user.reviews})
                                    </span>
                                    ${offer.user.verified ? '<div class="profile-badges"><span class="profile-badge verified">✅ Vérifié</span></div>' : ''}
                                </div>
                            </div>
                            <div class="offer-price">
                                <div class="price-value">${offer.price.value}€</div>
                                <div class="price-unit">${offer.price.unit}</div>
                                <div class="price-eco">${offer.price.savings}</div>
                            </div>
                        </div>

                        <div class="offer-actions">
                            <button class="btn btn-primary btn-sm">
                                ${offer.type === 'reservation' ? '🎫 Réserver' : '🙋 Me proposer'}
                            </button>
                            <button class="btn btn-outline btn-sm">
                                👁️ Détails
                            </button>
                            <button class="btn btn-outline btn-sm">
                                💬 Chat
                            </button>
                        </div>
                    </div>
                `;
        }).join('');

        grid.innerHTML = offersHTML;
    }

    // Language switcher
    function switchLanguage(lang) {
        // Remove active class from all language buttons
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Find and activate the correct language button
        document.querySelectorAll('.lang-btn').forEach(btn => {
            if (btn.textContent === lang.toUpperCase()) {
                btn.classList.add('active');
            }
        });

        // Hide all language content
        document.querySelectorAll('.lang-content').forEach(content => {
            content.classList.remove('active');
        });

        // Show content for selected language
        document.querySelectorAll('.lang-content.' + lang).forEach(content => {
            content.classList.add('active');
        });

        // Save language preference
        localStorage.setItem('preferredLanguage', lang);
    }

    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        if (menu) {
            menu.classList.toggle('active');
        }
    }

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobileMenu');
                if (mobileMenu && mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                }
            }
        });
    });

    // Initialize on DOM load
    document.addEventListener('DOMContentLoaded', function() {
        // Set language preference
        const preferredLang = localStorage.getItem('preferredLanguage') || 'fr';
        switchLanguage(preferredLang);

        // Populate offers
        populateOffers();
    });
</script>
</body>
</html>
