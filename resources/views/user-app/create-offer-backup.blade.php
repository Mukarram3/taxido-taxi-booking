<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une annonce - Je confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

        /* Navigation (simplified) */
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

        .nav-link {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
        }

        /* Main Container */
        .main-container {
            max-width: 1280px;
            margin: 100px auto 40px;
            padding: 0 20px;
        }

        /* Mode Selector */
        .mode-selector {
            background: white;
            border-radius: var(--radius-xl);
            padding: 40px;
            margin-bottom: 32px;
            box-shadow: var(--shadow);
        }

        .mode-selector h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .mode-subtitle {
            color: var(--gray);
            margin-bottom: 32px;
        }

        .transport-modes {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .mode-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            background: white;
        }

        .mode-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .mode-card.selected {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(80, 70, 229, 0.1);
        }

        .mode-card.selected::after {
            content: '✔';
            position: absolute;
            top: 16px;
            right: 16px;
            width: 28px;
            height: 28px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .mode-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .mode-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .mode-description {
            color: var(--gray);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .mode-features {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .mode-feature {
            padding: 4px 8px;
            background: var(--light);
            border-radius: 100px;
            font-size: 12px;
            color: var(--dark);
        }

        /* Form Container */
        .form-container {
            display: none;
            background: white;
            border-radius: var(--radius-xl);
            padding: 40px;
            box-shadow: var(--shadow);
            margin-bottom: 32px;
        }

        .form-container.active {
            display: block;
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

        /* Language Management */
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: inline-block;
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

        .form-error {
            font-size: 13px;
            color: var(--danger);
            margin-top: 4px;
            display: none;
        }

        .form-error.active {
            display: block;
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

        /* Purchase Location Selector */
        .purchase-location {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }

        .location-option {
            padding: 12px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
        }

        .location-option:hover {
            border-color: var(--primary);
        }

        .location-option.selected {
            background: var(--primary);
            border-color: var(--primary);
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

        /* Subcategories */
        .subcategories-panel {
            display: none;
            background: var(--light);
            border: 2px solid var(--primary);
            border-radius: var(--radius);
            padding: 16px;
            margin-top: 12px;
            margin-bottom: 24px;
        }

        .subcategories-panel.active {
            display: block;
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

        /* Dimension Inputs */
        .dimension-inputs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .package-dimensions-section {
            background: var(--light);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 24px;
        }

        .dimension-item {
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }

        .dimension-item:last-child {
            border-bottom: none;
        }

        /* Date Inputs */
        .date-inputs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .expiry-info {
            background: linear-gradient(135deg, #fef3c7, #fed7aa);
            border-radius: var(--radius);
            padding: 16px;
            margin-bottom: 20px;
        }

        .expiry-info h4 {
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 14px;
        }

        .expiry-info p {
            color: var(--gray);
            font-size: 13px;
        }

        /* Insurance Options */
        .insurance-options {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
        }

        .insurance-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .insurance-icon {
            font-size: 32px;
        }

        .insurance-plans {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .insurance-plan {
            background: white;
            border-radius: var(--radius);
            padding: 20px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .insurance-plan:hover {
            border-color: var(--eco-green);
            transform: translateY(-2px);
        }

        .insurance-plan.selected {
            border-color: var(--eco-green);
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
        }

        .insurance-plan.selected::after {
            content: '✔';
            position: absolute;
            top: 12px;
            right: 12px;
            width: 24px;
            height: 24px;
            background: var(--eco-green);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .plan-name {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .plan-coverage {
            font-size: 20px;
            font-weight: 800;
            color: var(--eco-green);
            margin-bottom: 8px;
        }

        .plan-price {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 12px;
        }

        .plan-features {
            font-size: 13px;
            color: var(--dark);
            line-height: 1.6;
        }

        /* Collection Options */
        .collection-options {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
        }

        .collection-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .collection-services {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .collection-service {
            background: white;
            border-radius: var(--radius);
            padding: 20px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .collection-service:hover {
            border-color: var(--warning);
            transform: translateY(-2px);
        }

        .collection-service.selected {
            border-color: var(--warning);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        }

        .service-price-tag {
            display: inline-block;
            background: var(--warning);
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            margin-left: 4px;
        }

        /* Vehicle Types for Cotransport */
        .vehicle-types {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .vehicle-type {
            padding: 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .vehicle-type:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .vehicle-type.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .vehicle-icon {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .vehicle-name {
            font-size: 14px;
            font-weight: 600;
        }

        /* Address Inputs */
        .address-section {
            background: var(--light);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 24px;
        }

        .address-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 12px;
            margin-top: 16px;
        }

        /* Recipient Section */
        .recipient-section {
            background: linear-gradient(135deg, #e0f2fe, #dbeafe);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 24px;
        }

        .recipient-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .recipient-icon {
            width: 40px;
            height: 40px;
            background: var(--secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        /* Badge Options */
        .badge-options {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .badge-option {
            padding: 8px 16px;
            border: 2px solid var(--border);
            border-radius: 100px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: white;
        }

        .badge-option:hover {
            border-color: var(--primary);
        }

        .badge-option.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .badge-option.urgent {
            border-color: var(--danger);
            color: var(--danger);
        }

        .badge-option.urgent.selected {
            background: var(--danger);
            color: white;
        }

        .badge-option.professional {
            border-color: var(--secondary);
            color: var(--secondary);
        }

        .badge-option.professional.selected {
            background: var(--secondary);
            color: white;
        }

        /* Postal Delivery Section */
        .postal-delivery-section {
            background: linear-gradient(135deg, #f3e8ff, #e9d5ff);
            border-radius: var(--radius);
            padding: 20px;
            margin-top: 16px;
            display: none;
        }

        .postal-delivery-section.active {
            display: block;
        }

        /* Price Summary */
        .price-summary {
            background: linear-gradient(135deg, var(--light), white);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-top: 32px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .price-row:last-child {
            border-bottom: none;
            padding-top: 16px;
        }

        .price-label {
            color: var(--gray);
            font-size: 14px;
        }

        .price-value {
            font-weight: 600;
            color: var(--dark);
        }

        .price-total {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
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

        /* Verification Methods */
        .verification-methods {
            display: grid;
            gap: 16px;
            margin-top: 16px;
        }

        .verification-method {
            background: white;
            border-radius: var(--radius);
            padding: 16px;
        }

        .verification-method-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--dark);
        }

        /* Loading State */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid var(--border);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .transport-modes {
                grid-template-columns: 1fr;
            }

            .transport-types {
                grid-template-columns: repeat(2, 1fr);
            }

            .insurance-plans {
                grid-template-columns: 1fr;
            }

            .collection-services {
                grid-template-columns: 1fr;
            }

            .vehicle-types {
                grid-template-columns: repeat(2, 1fr);
            }

            .package-categories {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-container {
                margin-top: 80px;
            }

            .mode-selector,
            .form-container {
                padding: 20px;
            }

            .nav-container {
                padding: 0 16px;
            }

            .nav-actions {
                gap: 8px;
            }

            .nav-link {
                display: none;
            }

            .transport-types,
            .package-categories {
                grid-template-columns: repeat(2, 1fr);
            }

            .date-inputs,
            .dimension-inputs,
            .address-grid {
                grid-template-columns: 1fr;
            }

            .purchase-location {
                grid-template-columns: 1fr;
            }

            .step-title {
                display: none;
            }

            .step-circle {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .form-actions {
                flex-direction: column;
                gap: 12px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .badge-options {
                flex-direction: column;
            }

            .badge-option {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .mode-selector h1 {
                font-size: 1.5rem;
            }

            .mode-icon {
                font-size: 36px;
            }

            .company-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .subcategories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <style>
        /* Rounded, shadowed calendar */
        .flatpickr-calendar {
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            font-family: "Inter", sans-serif;
            overflow: hidden;
        }

        .flatpickr-wrapper{
            display: block !important;
        }

        /* Month navigation */
        .flatpickr-months {
            background: #fff;
            padding: 8px;
            font-weight: 600;
        }
        .flatpickr-prev-month, .flatpickr-next-month {
            color: #333;
            font-size: 16px;
            padding: 6px;
            cursor: pointer;
        }

        /* Days grid */
        .flatpickr-day {
            border-radius: 8px;
            margin: 2px;
        }
        .flatpickr-day.selected,
        .flatpickr-day.startRange,
        .flatpickr-day.endRange {
            background: #1d3557;
            color: #fff;
        }
        .flatpickr-day:hover {
            background: #457b9d;
            color: #fff;
        }

        /* Footer */
        .flatpickr-footer {
            display: flex;
            justify-content: space-between;
            padding: 8px 12px;
            border-top: 1px solid #eee;
            background: #f9f9f9;
        }
        .fp-btn {
            flex: 1;
            margin: 0 4px;
            border: none;
            border-radius: 8px;
            padding: 8px;
            font-weight: 500;
            cursor: pointer;
        }
        .fp-btn.cancel {
            background: #eee;
            color: #333;
        }
        .fp-btn.select {
            background: #1d3557;
            color: #fff;
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo">
            <div class="logo-icon">JC</div>
            <span class="logo-text">Je confie</span>
        </a>

        <div class="nav-actions">
            <a href="{{ url('/') }}#services" class="nav-link">
                <span class="lang-content fr active">Nos Services</span>
                <span class="lang-content en">Our Services</span>
            </a>
            <a href="{{ url('/') }}" class="nav-link">
                <span class="lang-content fr active">Accueil</span>
                <span class="lang-content en">Home</span>
            </a>
            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
        </div>
    </div>
</nav>

<!-- Main Container -->
<div class="main-container">
    <!-- Cotransport Form -->
    <div class="form-container" id="cotransportForm">
        <!-- Progress Steps -->
        <div class="progress-container">
            <div class="progress-steps">
                <div class="progress-line" id="cotransportProgress" style="width: 0%"></div>
                <div class="step active" data-step="1">
                    <div class="step-circle">1</div>
                    <div class="step-title">Colis</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-circle">2</div>
                    <div class="step-title">Trajet</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-circle">3</div>
                    <div class="step-title">Destinataire</div>
                </div>
                <div class="step" data-step="4">
                    <div class="step-circle">4</div>
                    <div class="step-title">Options</div>
                </div>
                <div class="step" data-step="5">
                    <div class="step-circle">5</div>
                    <div class="step-title">Confirmation</div>
                </div>
            </div>
        </div>

        <form class="mt-0" method="post" action="{{ route('user.driver_fare_request') }}" enctype="multipart/form-data">

            @csrf

                <input type="hidden" name="badges" id="selectedBadges">
                <input type="hidden" name="distance" id="distance">
                <input type="hidden" name="packages_json" id="packages_json">
                <input type="hidden" name="categories" id="selectedCategories">
                <input type="hidden" name="subcategories" id="selectedSubcategories">
                <input type="hidden" name="services" id="selectedServices">
                <input type="hidden" name="insurance" id="selectedInsurance" value="standard">
                <input type="hidden" name="pickup_location_latitude" id="pickup_location_latitude">
                <input type="hidden" name="pickup_location_longitude" id="pickup_location_longitude">

                <!-- Step 1: Enhanced Package Type with Subcategories -->
                <div class="form-section active" id="cotransportStep1">
                    <h2 style="margin-bottom: 24px;">
                        <span class="lang-content fr active">Que souhaitez-vous expédier ?</span>
                        <span class="lang-content en">What do you want to ship?</span>
                    </h2>

                    <!-- Badge Options -->
                    <div class="badge-options">
                        <div class="badge-option urgent" onclick="toggleBadge(this, 'urgent')">
                            <span class="lang-content fr active">🚨 URGENT</span>
                            <span class="lang-content en">🚨 URGENT</span>
                        </div>
                        <div class="badge-option professional" onclick="toggleBadge(this, 'professional')">
                            <span class="lang-content fr active">💼 Professionnel</span>
                            <span class="lang-content en">💼 Professional</span>
                        </div>
                        <div class="badge-option" onclick="toggleBadge(this, 'personal')">
                            <span class="lang-content fr active">👤 Particulier</span>
                            <span class="lang-content en">👤 Personal</span>
                        </div>
                    </div>

                    <!-- Enhanced Package Categories with Subcategories -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Type de colis</span>
                            <span class="lang-content en">Package type</span>
                            <span class="required">*</span>
                        </label>
                        <div class="package-categories">
                            <div class="package-category" onclick="toggleCategoryWithSub(this, 'documents')">
                                <div class="category-icon">📄</div>
                                <div class="category-name">
                                    <span class="lang-content fr active">Documents</span>
                                    <span class="lang-content en">Documents</span>
                                </div>
                            </div>
                            <div class="package-category" onclick="toggleCategoryWithSub(this, 'furniture')">
                                <div class="category-icon">🛋️</div>
                                <div class="category-name">
                                    <span class="lang-content fr active">Meubles</span>
                                    <span class="lang-content en">Furniture</span>
                                </div>
                            </div>
                            <div class="package-category" onclick="toggleCategoryWithSub(this, 'appliances')">
                                <div class="category-icon">📺</div>
                                <div class="category-name">
                                    <span class="lang-content fr active">Électroménager</span>
                                    <span class="lang-content en">Appliances</span>
                                </div>
                            </div>
                            <div class="package-category" onclick="toggleCategoryWithSub(this, 'boxes')">
                                <div class="category-icon">📦</div>
                                <div class="category-name">
                                    <span class="lang-content fr active">Cartons/Déménagement</span>
                                    <span class="lang-content en">Boxes/Moving</span>
                                </div>
                            </div>
                            <div class="package-category" onclick="toggleCategoryWithSub(this, 'sports')">
                                <div class="category-icon">🚲</div>
                                <div class="category-name">
                                    <span class="lang-content fr active">Vélos/Sport</span>
                                    <span class="lang-content en">Bikes/Sports</span>
                                </div>
                            </div>
                            <div class="package-category" onclick="toggleCategoryWithSub(this, 'other')">
                                <div class="category-icon">🔧</div>
                                <div class="category-name">
                                    <span class="lang-content fr active">Autres</span>
                                    <span class="lang-content en">Other</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subcategories Container -->
                    <div id="subcategories-container">
                        <!-- Subcategories will be dynamically added here -->
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Description de votre envoi</span>
                            <span class="lang-content en">Description of your shipment</span>
                            <span class="required">*</span>
                        </label>
                        <textarea class="form-textarea" name="shipment_description" placeholder="Ex: Canapé 3 places, cartons de déménagement, documents urgents..."></textarea>
                    </div>

                    <!-- Mandatory Dimensions Section -->
                    <div class="package-dimensions-section">
                        <h4 style="margin-bottom: 16px; color: var(--dark);">
                            <span class="lang-content fr active">📐 Dimensions de chaque colis (obligatoire)</span>
                            <span class="lang-content en">📐 Dimensions of each package (required)</span>
                        </h4>

                        <div id="dimensionsList">
                            <div class="dimension-item">
                                <label class="form-label">
                                    <span class="lang-content fr active">Colis 1</span>
                                    <span class="lang-content en">Package 1</span>
                                    <span class="required">*</span>
                                </label>
                                <div class="dimension-inputs">
                                    <input type="number" name="length" class="form-input" placeholder="Longueur (cm)" required>
                                    <input type="number" name="width" class="form-input" placeholder="Largeur (cm)" required>
                                    <input type="number" name="height" class="form-input" placeholder="Hauteur (cm)" required>
                                </div>
                                <input type="number" class="form-input" name="weight" placeholder="Poids (kg)" style="margin-top: 12px;" required>
                            </div>
                        </div>

                        <button class="btn btn-secondary" style="margin-top: 12px;" onclick="addPackageDimension()">
                            <span class="lang-content fr active">➕ Ajouter un colis</span>
                            <span class="lang-content en">➕ Add a package</span>
                        </button>
                    </div>

                    <!-- Package Value -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Valeur déclarée totale (€)</span>
                            <span class="lang-content en">Total declared value (€)</span>
                            <span class="required">*</span>
                        </label>
                        <input type="number" name="total_declared_value" class="form-input" placeholder="Valeur totale de votre envoi" required>
                        <div class="form-helper">
                            <span class="lang-content fr active">Important pour l'assurance</span>
                            <span class="lang-content en">Important for insurance</span>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Enhanced Route with Addresses -->
                <div class="form-section" id="cotransportStep2">
                    <h2 style="margin-bottom: 24px;">
                        <span class="lang-content fr active">Votre trajet</span>
                        <span class="lang-content en">Your route</span>
                    </h2>

                    <!-- Pickup Address -->
                    <div class="address-section">
                        <h4 style="margin-bottom: 16px; color: var(--dark);">
                            <span class="lang-content fr active">📍 Adresse de prise en charge</span>
                            <span class="lang-content en">📍 Pickup address</span>
                        </h4>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Adresse complète</span>
                                <span class="lang-content en">Complete address</span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input" name="pickup_address" id="pac-input" placeholder="Numéro et nom de rue" required>
                            <div class="address-grid">
                                <input type="text" class="form-input" name="pickup_zip_code" id="pickup_zip_code" placeholder="Code postal" required>
                                <input type="text" class="form-input" name="pickup_house_no" placeholder="Ville" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Complément d'adresse</span>
                                <span class="lang-content en">Additional address info</span>
                            </label>
                            <input type="text" class="form-input" name="pickup_additional_info" placeholder="Bâtiment, étage, code d'accès...">
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="address-section">
                        <h4 style="margin-bottom: 16px; color: var(--dark);">
                            <span class="lang-content fr active">📍 Adresse de livraison</span>
                            <span class="lang-content en">📍 Delivery address</span>
                        </h4>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Adresse complète</span>
                                <span class="lang-content en">Complete address</span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input" name="destination_address" id="pac-input2" placeholder="Numéro et nom de rue" required>
                            <div class="address-grid">
                                <input type="text" class="form-input" name="destination_zip_code" id="destination_zip_code" placeholder="Code postal" required>
                                <input type="text" class="form-input" name="destination_house_no" placeholder="Ville" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Complément d'adresse</span>
                                <span class="lang-content en">Additional address info</span>
                            </label>
                            <input type="text" class="form-input" name="destination_additional_info" placeholder="Bâtiment, étage, code d'accès...">
                        </div>
                    </div>

                    <!-- Dates -->
                    <div class="date-inputs">
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Date de prise en charge souhaitée</span>
                                <span class="lang-content en">Desired pickup date</span>
                                <span class="required">*</span>
                            </label>
                            <input type="date" name="pickup_date" id="pickup_date" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Date de livraison souhaitée</span>
                                <span class="lang-content en">Desired delivery date</span>
                                <span class="required">*</span>
                            </label>
                            <input type="date" name="delivery_date" id="delivery_date" class="form-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Créneau horaire préféré</span>
                            <span class="lang-content en">Preferred time slot</span>
                        </label>
                        <select class="form-select" name="preffered_time_slot" id="preffered_time_slot">
                            <option value="">Choisir...</option>
                            <option value="morning">8h - 12h</option>
                            <option value="afternoon">12h - 17h</option>
                            <option value="evening">17h - 20h</option>
                            <option value="flexible">Flexible</option>
                        </select>
                    </div>
                </div>

                <!-- Step 3: Recipient Information -->
                <div class="form-section" id="cotransportStep3">
                    <h2 style="margin-bottom: 24px;">
                        <span class="lang-content fr active">Informations du destinataire</span>
                        <span class="lang-content en">Recipient information</span>
                    </h2>

                    <div class="recipient-section">
                        <div class="recipient-header">
                            <div class="recipient-icon">👤</div>
                            <div>
                                <h3 style="margin: 0; color: var(--dark);">
                                    <span class="lang-content fr active">Coordonnées du destinataire</span>
                                    <span class="lang-content en">Recipient contact details</span>
                                </h3>
                                <p style="margin: 4px 0 0; font-size: 14px; color: var(--gray);">
                                    <span class="lang-content fr active">Ces informations sont essentielles pour la livraison</span>
                                    <span class="lang-content en">This information is essential for delivery</span>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Nom complet du destinataire</span>
                                <span class="lang-content en">Recipient full name</span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input" name="recipient_name" placeholder="Prénom et nom" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Téléphone du destinataire</span>
                                <span class="lang-content en">Recipient phone number</span>
                                <span class="required">*</span>
                            </label>
                            <input type="tel" class="form-input" name="recipient_number" placeholder="+33 6 XX XX XX XX" required>
                            <div class="form-helper">
                                <span class="lang-content fr active">Le transporteur contactera le destinataire avant livraison</span>
                                <span class="lang-content en">The carrier will contact the recipient before delivery</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Email du destinataire</span>
                                <span class="lang-content en">Recipient email</span>
                            </label>
                            <input type="email" class="form-input" name="recipient_email" placeholder="email@example.com">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Instructions spéciales pour le livreur</span>
                                <span class="lang-content en">Special instructions for delivery</span>
                            </label>
                            <textarea class="form-textarea" name="recipient_delivery_instrcutions" placeholder="Ex: Sonner au nom de Martin, laisser le colis au gardien si absent..."></textarea>
                        </div>
                    </div>

                    <!-- Transport Requirements -->
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Exigences de transport</span>
                            <span class="lang-content en">Transport requirements</span>
                        </label>
                        <div class="collection-services">
                            <div class="collection-service" onclick="toggleService(this)">
                                <h4>🏠
                                    <span class="lang-content fr active">Enlèvement à domicile</span>
                                    <span class="lang-content en">Home pickup</span>
                                </h4>
                                <div style="font-size: 13px; color: var(--gray);">
                                    <span class="lang-content fr active">Besoin d'aide pour charger</span>
                                    <span class="lang-content en">Need help loading</span>
                                </div>
                            </div>
                            <div class="collection-service" onclick="toggleService(this)">
                                <h4>🏡
                                    <span class="lang-content fr active">Livraison à domicile</span>
                                    <span class="lang-content en">Home delivery</span>
                                </h4>
                                <div style="font-size: 13px; color: var(--gray);">
                                    <span class="lang-content fr active">Livraison porte à porte</span>
                                    <span class="lang-content en">Door to door delivery</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Options and Budget -->
                <div class="form-section" id="cotransportStep4">
                    <h2 style="margin-bottom: 24px;">
                        <span class="lang-content fr active">Budget et options</span>
                        <span class="lang-content en">Budget and options</span>
                    </h2>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Budget maximum (€)</span>
                            <span class="lang-content en">Maximum budget (€)</span>
                            <span class="required">*</span>
                        </label>
                        <input type="number" class="form-input" name="fare" placeholder="Ex: 100" min="1" required>
                        <div class="form-helper">
                            <span class="lang-content fr active">Les transporteurs pourront proposer leurs prix</span>
                            <span class="lang-content en">Carriers will be able to offer their prices</span>
                        </div>
                    </div>

                    <!-- Enhanced Insurance Options with Prices -->
                    <div class="insurance-options">
                        <div class="insurance-header">
                            <div class="insurance-icon">🛡️</div>
                            <div>
                                <h3 style="margin: 0; color: var(--dark);">
                                    <span class="lang-content fr active">Assurance transport</span>
                                    <span class="lang-content en">Transport insurance</span>
                                </h3>
                                <p style="margin: 4px 0 0; font-size: 14px; color: var(--gray);">
                                    <span class="lang-content fr active">Protection pour les objets transportés</span>
                                    <span class="lang-content en">Protection for transported items</span>
                                </p>
                            </div>
                        </div>

                        <div class="insurance-plans">
                            <div class="insurance-plan" onclick="selectInsurance(this, 'basic')">
                                <div class="plan-name">
                                    <span class="lang-content fr active">Basique</span>
                                    <span class="lang-content en">Basic</span>
                                </div>
                                <div class="plan-coverage">250€</div>
                                <div class="plan-price">
                                    <span class="lang-content fr active">Inclus</span>
                                    <span class="lang-content en">Included</span>
                                </div>
                                <div class="plan-features">
                                    <span class="lang-content fr active">• Couverture jusqu'à 250€<br>• Dommages majeurs</span>
                                    <span class="lang-content en">• Coverage up to €250<br>• Major damage</span>
                                </div>
                            </div>
                            <div class="insurance-plan selected" onclick="selectInsurance(this, 'standard')">
                                <div class="plan-name">Standard</div>
                                <div class="plan-coverage">1000€</div>
                                <div class="plan-price">
                                    <span class="service-price-tag">+10€</span>
                                </div>
                                <div class="plan-features">
                                    <span class="lang-content fr active">• Couverture jusqu'à 1000€<br>• Tous dommages</span>
                                    <span class="lang-content en">• Coverage up to €1000<br>• All damages</span>
                                </div>
                            </div>
                            <div class="insurance-plan" onclick="selectInsurance(this, 'premium')">
                                <div class="plan-name">Premium</div>
                                <div class="plan-coverage">5000€</div>
                                <div class="plan-price">
                                    <span class="service-price-tag">+25€</span>
                                </div>
                                <div class="plan-features">
                                    <span class="lang-content fr active">• Couverture jusqu'à 5000€<br>• Protection totale</span>
                                    <span class="lang-content en">• Coverage up to €5000<br>• Total protection</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Conditions particulières (optionnel)</span>
                            <span class="lang-content en">Special conditions (optional)</span>
                        </label>
                        <textarea class="form-textarea" name="special_condition" placeholder="Ex: Fragile, besoin de 2 personnes pour porter, etc."></textarea>
                    </div>
                </div>

                <!-- Step 5: Confirmation -->
                <div class="form-section" id="cotransportStep5">
                    <div class="success-message">
                        <div class="success-icon">✅</div>
                        <h2 class="success-title">
                            <span class="lang-content fr active">Demande prête !</span>
                            <span class="lang-content en">Request ready!</span>
                        </h2>
                        <p class="success-text">
                            <span class="lang-content fr active">Votre demande de transport sera publiée et les transporteurs pourront vous contacter</span>
                            <span class="lang-content en">Your transport request will be published and carriers can contact you</span>
                        </p>
                    </div>

                    <h2 style="margin-bottom: 24px;">
                        <span class="lang-content fr active">Récapitulatif de votre demande</span>
                        <span class="lang-content en">Request summary</span>
                    </h2>

                    <div id="cotransportSummary">
                        <!-- Summary will be populated dynamically -->
                    </div>

                    <div class="price-summary">
                        <div class="price-row">
                                <span class="price-label">
                                    <span class="lang-content fr active">Budget maximum</span>
                                    <span class="lang-content en">Maximum budget</span>
                                </span>
                            <span class="price-value" id="cotransportBudget">100€</span>
                        </div>
                        <div class="price-row">
                                <span class="price-label">
                                    <span class="lang-content fr active">Commission plateforme</span>
                                    <span class="lang-content en">Platform commission</span>
                                </span>
                            <span class="price-value">8%</span>
                        </div>
                        <div class="price-row">
                                <span class="price-label">
                                    <span class="lang-content fr active">Assurance sélectionnée</span>
                                    <span class="lang-content en">Selected insurance</span>
                                </span>
                            <span class="price-value" id="cotransportInsurance">Standard (+10€)</span>
                        </div>
                        <div class="price-row">
                                <span class="price-label">
                                    <span class="lang-content fr active">Transporteurs notifiés</span>
                                    <span class="lang-content en">Carriers to be notified</span>
                                </span>
                            <span class="price-total">15+ transporteurs</span>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button class="btn btn-secondary" onclick="previousStepCotransport()">
                        <span class="lang-content fr active">← Retour</span>
                        <span class="lang-content en">← Back</span>
                    </button>
                    <button type="button" class="btn btn-primary" id="cotransportNextBtn">
                        <span class="lang-content fr active">Continuer →</span>
                        <span class="lang-content en">Continue →</span>
                    </button>
                </div>

        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Scripts -->
<script>
    // Global variables
    let selectedMode = 'cotransport';
    let currentStepCotransport = 1;
    let selectedTransport = null;
    let selectedCompany = null;
    let selectedPurchaseLocation = null;
    let selectedInsurancePlan = 'standard';
    let selectedCategories = [];
    let selectedSubcategories = {};
    let selectedServices = [];
    let selectedBadges = [];
    let postalDeliveryEnabled = false;
    let packageCount = 1;

    // Subcategories data
    const subcategoriesData = {
        'documents': {
            'fr': ['Passeports', 'Diplômes', 'Contrats', 'Factures', 'Documents administratifs', 'Livres', 'Magazines'],
            'en': ['Passports', 'Diplomas', 'Contracts', 'Invoices', 'Administrative documents', 'Books', 'Magazines']
        },
        'documents-res': {
            'fr': ['Passeports', 'Diplômes', 'Contrats', 'Documents administratifs', 'Livres', 'Papiers importants'],
            'en': ['Passports', 'Diplomas', 'Contracts', 'Administrative documents', 'Books', 'Important papers']
        },
        'furniture': {
            'fr': ['Canapés', 'Tables', 'Chaises', 'Armoires', 'Lits', 'Bureaux', 'Étagères', 'Commodes'],
            'en': ['Sofas', 'Tables', 'Chairs', 'Wardrobes', 'Beds', 'Desks', 'Shelves', 'Dressers']
        },
        'appliances': {
            'fr': ['Réfrigérateur', 'Lave-linge', 'Lave-vaisselle', 'Four', 'Micro-ondes', 'Télévision', 'Aspirateur'],
            'en': ['Refrigerator', 'Washing machine', 'Dishwasher', 'Oven', 'Microwave', 'Television', 'Vacuum cleaner']
        },
        'boxes': {
            'fr': ['Cartons standards', 'Cartons livre', 'Cartons vaisselle', 'Cartons vêtements', 'Cartons fragile'],
            'en': ['Standard boxes', 'Book boxes', 'Dish boxes', 'Clothing boxes', 'Fragile boxes']
        },
        'sports': {
            'fr': ['Vélos', 'Skis', 'Planches de surf', 'Équipement de gym', 'Trottinettes', 'Matériel de camping'],
            'en': ['Bikes', 'Skis', 'Surfboards', 'Gym equipment', 'Scooters', 'Camping gear']
        },
        'electronics-res': {
            'fr': ['Ordinateurs', 'Tablettes', 'Téléphones', 'Appareils photo', 'Consoles de jeu', 'Écouteurs'],
            'en': ['Computers', 'Tablets', 'Phones', 'Cameras', 'Game consoles', 'Headphones']
        },
        'clothes-res': {
            'fr': ['Vêtements', 'Chaussures', 'Accessoires', 'Sacs', 'Valises', 'Textiles'],
            'en': ['Clothes', 'Shoes', 'Accessories', 'Bags', 'Luggage', 'Textiles']
        },
        'gifts-res': {
            'fr': ['Cadeaux emballés', 'Souvenirs', 'Artisanat', 'Bijoux', 'Parfums', 'Jouets'],
            'en': ['Wrapped gifts', 'Souvenirs', 'Crafts', 'Jewelry', 'Perfumes', 'Toys']
        },
        'food-res': {
            'fr': ['Produits secs', 'Conserves', 'Épices', 'Café/Thé', 'Chocolat', 'Produits locaux'],
            'en': ['Dry goods', 'Canned goods', 'Spices', 'Coffee/Tea', 'Chocolate', 'Local products']
        },
        'other': {
            'fr': ['Outils', 'Matériaux', 'Pièces détachées', 'Instruments de musique', 'Autres'],
            'en': ['Tools', 'Materials', 'Spare parts', 'Musical instruments', 'Other']
        },
        'other-res': {
            'fr': ['Instruments', 'Matériel médical', 'Équipement professionnel', 'Autres'],
            'en': ['Instruments', 'Medical equipment', 'Professional equipment', 'Other']
        }
    };

    // Companies and agencies data
    const transportCompanies = {
        plane: [
            {name: 'Air France', logo: '🇫🇷', type: 'company'},
            {name: 'Royal Air Maroc', logo: '🇲🇦', type: 'company'},
            {name: 'Air Algérie', logo: '🇩🇿', type: 'company'},
            {name: 'Tunisair', logo: '🇹🇳', type: 'company'},
            {name: 'Air Sénégal', logo: '🇸🇳', type: 'company'},
            {name: 'Air Côte d\'Ivoire', logo: '🇨🇮', type: 'company'},
            {name: 'Ethiopian Airlines', logo: '🇪🇹', type: 'company'},
            {name: 'EgyptAir', logo: '🇪🇬', type: 'company'},
            {name: 'Turkish Airlines', logo: '🇹🇷', type: 'company'},
            {name: 'Emirates', logo: '🇦🇪', type: 'company'},
            {name: 'Qatar Airways', logo: '🇶🇦', type: 'company'},
            {name: 'Lufthansa', logo: '🇩🇪', type: 'company'},
            {name: 'British Airways', logo: '🇬🇧', type: 'company'},
            {name: 'Iberia', logo: '🇪🇸', type: 'company'},
            {name: 'Agence Selectour', logo: '🏪', type: 'agency'},
            {name: 'Thomas Cook', logo: '🏪', type: 'agency'},
            {name: 'Havas Voyages', logo: '🏪', type: 'agency'},
            {name: 'Fram', logo: '🏪', type: 'agency'},
            {name: 'Carrefour Voyages', logo: '🏪', type: 'agency'},
            {name: 'Leclerc Voyages', logo: '🏪', type: 'agency'}
        ],
        train: [
            {name: 'SNCF', logo: '🚄', type: 'company'},
            {name: 'Eurostar', logo: '⭐', type: 'company'},
            {name: 'Thalys', logo: '🚅', type: 'company'},
            {name: 'TGV Lyria', logo: '🇨🇭', type: 'company'},
            {name: 'Renfe', logo: '🇪🇸', type: 'company'},
            {name: 'Trenitalia', logo: '🇮🇹', type: 'company'},
            {name: 'Deutsche Bahn', logo: '🇩🇪', type: 'company'},
            {name: 'ONCF Maroc', logo: '🇲🇦', type: 'company'},
            {name: 'Rail Europe', logo: '🏪', type: 'agency'},
            {name: 'Trainline', logo: '🏪', type: 'agency'}
        ],
        bus: [
            {name: 'FlixBus', logo: '🚌', type: 'company'},
            {name: 'BlaBlaBus', logo: '🚐', type: 'company'},
            {name: 'Eurolines', logo: '🚌', type: 'company'},
            {name: 'ALSA', logo: '🇪🇸', type: 'company'},
            {name: 'Megabus', logo: '🚌', type: 'company'},
            {name: 'Isilines', logo: '🚌', type: 'company'},
            {name: 'Ouibus', logo: '🚌', type: 'company'}
        ],
        boat: [
            {name: 'Corsica Linea', logo: '🚢', type: 'company'},
            {name: 'Corsica Ferries', logo: '⛴️', type: 'company'},
            {name: 'Algérie Ferries', logo: '🇩🇿', type: 'company'},
            {name: 'CTN Tunisia', logo: '🇹🇳', type: 'company'},
            {name: 'GNV', logo: '🇮🇹', type: 'company'},
            {name: 'Brittany Ferries', logo: '🇬🇧', type: 'company'},
            {name: 'DFDS Seaways', logo: '🚢', type: 'company'},
            {name: 'Balearia', logo: '🇪🇸', type: 'company'}
        ]
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

    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById('cotransportForm').classList.add('active');
        currentStepCotransport = 1;
        updateProgressCotransport();
    });

    // Toggle category with subcategories
    function toggleCategoryWithSub(element, categoryId) {
        element.classList.toggle('selected');
        const categoryName = element.querySelector('.category-name .lang-content.active').textContent.trim();

        if (element.classList.contains('selected')) {
            selectedCategories.push(categoryName);
            showSubcategories(element, categoryId); // ✅ pass element also
        } else {
            selectedCategories = selectedCategories.filter(c => c !== categoryName);
            hideSubcategories(categoryId);
        }

        document.getElementById("selectedCategories").value = JSON.stringify(selectedCategories);
    }

    // Show subcategories
    function showSubcategories(categoryElement, categoryId) {
        const container = document.getElementById(
            categoryId.includes('-res') ? 'subcategories-container-res' : 'subcategories-container'
        );
        if (!container || !subcategoriesData[categoryId]) return;

        const lang = localStorage.getItem('preferredLanguage') || 'fr';
        const subcategories = subcategoriesData[categoryId][lang] || subcategoriesData[categoryId]['fr'];

        // ✅ get category name from clicked element
        const categoryName = categoryElement.querySelector('.category-name .lang-content.active').textContent.trim();

        // Remove existing panel if any
        const existingPanel = container.querySelector(`#subcategory-${categoryId}`);
        if (existingPanel) {
            existingPanel.remove();
            return;
        }

        const panelHTML = `
        <div class="subcategories-panel active" id="subcategory-${categoryId}">
            <div class="subcategories-title">
                ${lang === 'fr' ? 'Sélectionnez les sous-catégories :' : 'Select subcategories:'}
            </div>
            <div class="subcategories-grid">
                ${subcategories.map(sub => `
                    <div class="subcategory-item"
                         data-category="${categoryName}"
                         data-subcategory="${sub}"
                         onclick="toggleSubcategory(this)">
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
        const panel = document.getElementById(`subcategory-${categoryId}`);
        if (panel) {
            panel.remove();
        }
    }

    // Toggle subcategory
    function toggleSubcategory(element) {
        element.classList.toggle('selected');

        const category = element.dataset.category;
        const subcategory = element.dataset.subcategory;

        console.log("➡️ toggleSubcategory CALLED with:", { category, subcategory, element });

        if (!category || !subcategory) {
            console.error("❌ Missing category or subcategory dataset on element:", element);
            return;
        }

        if (!selectedSubcategories[category]) {
            selectedSubcategories[category] = [];
        }

        if (element.classList.contains('selected')) {
            if (!selectedSubcategories[category].includes(subcategory)) {
                selectedSubcategories[category].push(subcategory);
                console.log("➕ Added:", subcategory, "to", category);
            }
        } else {
            selectedSubcategories[category] = selectedSubcategories[category].filter(s => s !== subcategory);
            console.log("➖ Removed:", subcategory, "from", category);

            if (selectedSubcategories[category].length === 0) {
                delete selectedSubcategories[category];
                console.log("🗑️ Removed empty category:", category);
            }
        }

        const hidden = document.getElementById("selectedSubcategories");
        hidden.value = JSON.stringify(selectedSubcategories);
        console.log("📥 Updated hidden input:", hidden.value);
    }

    // Toggle badge
    function toggleBadge(element, badge) {
        element.classList.toggle('selected');
        if (element.classList.contains('selected')) {
            if (!selectedBadges.includes(badge)) {
                selectedBadges.push(badge);
            }
        } else {
            selectedBadges = selectedBadges.filter(b => b !== badge);
        }

        // Update hidden input
        document.getElementById("selectedBadges").value = JSON.stringify(selectedBadges);
    }

    document.addEventListener('input', function(e) {
        if (e.target.closest('#dimensionsList .dimension-item')) {
            buildPackagesJSON();
        }
    });

    function buildPackagesJSON() {
        const packages = [];
        document.querySelectorAll('#dimensionsList .dimension-item').forEach(item => {
            const length = item.querySelector('input[name="length"]').value;
            const width  = item.querySelector('input[name="width"]').value;
            const height = item.querySelector('input[name="height"]').value;
            const weight = item.querySelector('input[name="weight"]').value;

            packages.push({
                length: parseFloat(length) || 0,
                width: parseFloat(width) || 0,
                height: parseFloat(height) || 0,
                weight: parseFloat(weight) || 0
            });
        });

        document.getElementById('packages_json').value = JSON.stringify(packages);
    }

    // Add package dimension
    function addPackageDimension() {
        packageCount++;
        const dimensionsList = document.getElementById('dimensionsList');
        const lang = localStorage.getItem('preferredLanguage') || 'fr';

        const newDimension = `
        <div class="dimension-item">
            <label class="form-label">
                <span class="lang-content ${lang} active">Colis ${packageCount}</span>
                <span class="lang-content ${lang === 'fr' ? 'en' : 'fr'}">Package ${packageCount}</span>
                <span class="required">*</span>
            </label>
            <div class="dimension-inputs">
                <input type="number" name="length" class="form-input" placeholder="Longueur (cm)" required>
                <input type="number" name="width" class="form-input" placeholder="Largeur (cm)" required>
                <input type="number" name="height" class="form-input" placeholder="Hauteur (cm)" required>
            </div>
            <input type="number" name="weight" class="form-input" placeholder="Poids (kg)" style="margin-top: 12px;" required>
        </div>
    `;

        dimensionsList.insertAdjacentHTML('beforeend', newDimension);
    }

    // Toggle service selection
    function toggleService(element) {
        element.classList.toggle('selected');

        // ✅ Extract the service name from the active span
        const serviceName = element.querySelector('h4 .lang-content.active').textContent.trim();

        if (element.classList.contains('selected')) {
            if (!selectedServices.includes(serviceName)) {
                selectedServices.push(serviceName);
            }
        } else {
            selectedServices = selectedServices.filter(s => s !== serviceName);
        }

        // ✅ Save to hidden input
        document.getElementById("selectedServices").value = JSON.stringify(selectedServices);
    }

    // Toggle postal delivery
    function togglePostalDelivery(element) {
        element.classList.toggle('selected');
        postalDeliveryEnabled = element.classList.contains('selected');

        const postalSection = document.getElementById('postalDeliverySection');
        if (postalSection) {
            if (postalDeliveryEnabled) {
                postalSection.classList.add('active');
            } else {
                postalSection.classList.remove('active');
            }
        }

        // Update price summary
        const postalFeeRow = document.getElementById('postalDeliveryFeeRow');
        if (postalFeeRow) {
            postalFeeRow.style.display = postalDeliveryEnabled ? 'flex' : 'none';
        }
    }

    // Toggle category selection
    function toggleCategory(element) {
        element.classList.toggle('selected');
        const categoryName = element.querySelector('.category-name').textContent;
        if (element.classList.contains('selected')) {
            selectedCategories.push(categoryName);
        } else {
            selectedCategories = selectedCategories.filter(c => c !== categoryName);
        }
    }

    // Select insurance
    function selectInsurance(element, plan) {
        selectedInsurancePlan = plan;

        document.querySelectorAll('.insurance-plan').forEach(p => p.classList.remove('selected'));
        element.classList.add('selected');

        document.getElementById("selectedInsurance").value = selectedInsurancePlan;

        updateInsuranceFee(plan);
    }

    // Update insurance fee
    function updateInsuranceFee(plan) {
        const insuranceFeeRow = document.getElementById('insuranceFeeRow');
        const insuranceFee = document.getElementById('insuranceFee');

        if (insuranceFeeRow && insuranceFee) {
            let fee = '';
            switch(plan) {
                case 'basic':
                    insuranceFeeRow.style.display = 'none';
                    break;
                case 'standard':
                    fee = '+8€';
                    insuranceFeeRow.style.display = 'flex';
                    insuranceFee.textContent = fee;
                    break;
                case 'premium':
                    fee = '+15€';
                    insuranceFeeRow.style.display = 'flex';
                    insuranceFee.textContent = fee;
                    break;
            }
        }
    }

    document.getElementById('cotransportNextBtn').addEventListener('click', function(e) {
        e.preventDefault(); // stop form submit
        nextStepCotransport();
    });

    // Update progress for cotransport
    function updateProgressCotransport() {
        const progress = ((currentStepCotransport - 1) / 4) * 100;
        document.getElementById('cotransportProgress').style.width = `${progress}%`;

        // Update step indicators
        document.querySelectorAll('#cotransportForm .step').forEach((step, index) => {
            if (index < currentStepCotransport - 1) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (index === currentStepCotransport - 1) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('active', 'completed');
            }
        });

        // Update button behavior
        const btn = document.getElementById('cotransportNextBtn');

        if (currentStepCotransport === 5) {
            btn.innerHTML = '✅ Publier l\'annonce';
            btn.classList.add('btn-success');
            btn.setAttribute('type', 'submit'); // 🔥 allow natural submit
            // Remove JS listener so preventDefault() is no longer called
            btn.replaceWith(btn.cloneNode(true));
        } else {
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            btn.innerHTML = lang === 'fr' ? 'Continuer →' : 'Continue →';
            btn.classList.remove('btn-success');
            btn.setAttribute('type', 'button');
        }
    }

    // Next step for cotransport
    function nextStepCotransport(event) {
        if (event) event.preventDefault(); // 🔥 stop form from submitting

        if (!validateCotransportStep(currentStepCotransport)) {
            return;
        }

        if (currentStepCotransport < 5) {
            document.getElementById(`cotransportStep${currentStepCotransport}`).classList.remove('active');
            currentStepCotransport++;
            document.getElementById(`cotransportStep${currentStepCotransport}`).classList.add('active');
            updateProgressCotransport();

            if (currentStepCotransport === 5) {
                generateCotransportSummary();
            }
        }
    }

    // Validate cotransport step
    function validateCotransportStep(step) {
        const lang = localStorage.getItem('preferredLanguage') || 'fr';

        switch(step) {
            case 1:
                // ✅ Must select at least one category
                if (selectedCategories.length === 0) {
                    toastr.error(lang === 'fr' ? 'Veuillez sélectionner au moins un type de colis' : 'Please select at least one package type');
                    return false;
                }

                // ✅ Shipment description
                const description = document.querySelector('textarea[name="shipment_description"]');
                if (!description.value.trim()) {
                    toastr.error(lang === 'fr' ? 'Veuillez entrer une description' : 'Please enter a description');
                    return false;
                }

                // ✅ Dimensions
                const dimensions = document.querySelectorAll('#dimensionsList .dimension-inputs input[required]');
                let dimensionsFilled = true;
                dimensions.forEach(input => {
                    if (!input.value) dimensionsFilled = false;
                });

                const weightInput = document.querySelector('#dimensionsList input[name="weight"]');
                if (!dimensionsFilled || !weightInput.value) {
                    toastr.error(lang === 'fr' ? 'Veuillez remplir toutes les dimensions et le poids' : 'Please fill in all package dimensions and weight');
                    return false;
                }

                // ✅ Declared value
                const declaredValue = document.querySelector('input[name="total_declared_value"]');
                if (!declaredValue.value) {
                    toastr.error(lang === 'fr' ? 'Veuillez entrer la valeur déclarée totale' : 'Please enter total declared value');
                    return false;
                }
                break;

            case 2:
                // ✅ Pickup and destination addresses
                const addressInputs = document.querySelectorAll('#cotransportStep2 input[required]');
                let addressesFilled = true;
                addressInputs.forEach(input => {
                    if (!input.value.trim()) addressesFilled = false;
                });
                if (!addressesFilled) {
                    toastr.error(lang === 'fr' ? 'Veuillez remplir toutes les adresses' : 'Please fill in all addresses');
                    return false;
                }

                // ✅ Pickup + Delivery dates
                const pickupDate = document.querySelector('input[name="pickup_date"]');
                const deliveryDate = document.querySelector('input[name="delivery_date"]');
                if (!pickupDate.value || !deliveryDate.value) {
                    toastr.error(lang === 'fr' ? 'Veuillez entrer les dates de prise en charge et de livraison' : 'Please enter pickup and delivery dates');
                    return false;
                }
                break;

            case 3:
                // ✅ Recipient info
                const recipientInputs = document.querySelectorAll('#cotransportStep3 input[required]');
                let recipientFilled = true;
                recipientInputs.forEach(input => {
                    if (!input.value.trim()) recipientFilled = false;
                });
                if (!recipientFilled) {
                    toastr.error(lang === 'fr' ? 'Veuillez remplir les informations du destinataire' : 'Please fill in recipient information');
                    return false;
                }

                // ✅ Validate phone format (basic check)
                const phone = document.querySelector('input[name="recipient_number"]');
                const phoneRegex = /^\+?\d{6,15}$/;
                if (phone && !phoneRegex.test(phone.value.trim())) {
                    toastr.error(lang === 'fr' ? 'Veuillez entrer un numéro de téléphone valide' : 'Please enter a valid phone number');
                    return false;
                }

                // ✅ Validate email if entered
                const email = document.querySelector('input[name="recipient_email"]');
                if (email.value.trim()) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email.value)) {
                        toastr.error(lang === 'fr' ? 'Veuillez entrer un email valide' : 'Please enter a valid email');
                        return false;
                    }
                }
                break;

            case 4:
                // ✅ Budget
                const budgetInput = document.querySelector('#cotransportStep4 input[name="fare"]');
                if (!budgetInput || !budgetInput.value || parseFloat(budgetInput.value) <= 0) {
                    toastr.error(lang === 'fr' ? 'Veuillez indiquer un budget valide' : 'Please enter a valid budget');
                    return false;
                }
                break;
        }

        return true;
    }

    // Previous step for cotransport
    function previousStepCotransport() {
        if (currentStepCotransport > 1) {
            document.getElementById(`cotransportStep${currentStepCotransport}`).classList.remove('active');
            currentStepCotransport--;
            document.getElementById(`cotransportStep${currentStepCotransport}`).classList.add('active');
            updateProgressCotransport();
        } else {
            // Go back to mode selection
            document.getElementById('cotransportForm').classList.remove('active');
        }
    }

    // Generate cotransport summary
    function generateCotransportSummary() {
        const summary = document.getElementById('cotransportSummary');
        if (summary) {
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            const badges = selectedBadges.map(b => {
                switch(b) {
                    case 'urgent': return '🚨 URGENT';
                    case 'professional': return '💼 Professionnel';
                    case 'personal': return '👤 Particulier';
                    default: return b;
                }
            }).join(', ');

            summary.innerHTML = `
                    <div style="background: var(--light); padding: 20px; border-radius: var(--radius); margin-bottom: 20px;">
                        <h3 style="margin-bottom: 16px;">${lang === 'fr' ? 'Détails de votre demande' : 'Request details'}</h3>
                        ${badges ? `<p><strong>Type:</strong> ${badges}</p>` : ''}
                        <p><strong>${lang === 'fr' ? 'Type d\'envoi:' : 'Shipment type:'}</strong> ${selectedCategories.join(', ') || 'Non défini'}</p>
                        ${selectedSubcategories.length > 0 ? `<p><strong>${lang === 'fr' ? 'Sous-catégories:' : 'Subcategories:'}</strong> ${selectedSubcategories.join(', ')}</p>` : ''}
                        <p><strong>${lang === 'fr' ? 'Nombre de colis:' : 'Number of packages:'}</strong> ${packageCount}</p>
                        <p><strong>Assurance:</strong> ${selectedInsurancePlan}</p>
                    </div>
                `;

            // Update cotransport insurance display
            const cotransportInsurance = document.getElementById('cotransportInsurance');
            if (cotransportInsurance) {
                let insuranceText = '';
                switch(selectedInsurancePlan) {
                    case 'basic':
                        insuranceText = 'Basique (Inclus)';
                        break;
                    case 'standard':
                        insuranceText = 'Standard (+10€)';
                        break;
                    case 'premium':
                        insuranceText = 'Premium (+25€)';
                        break;
                }
                cotransportInsurance.textContent = insuranceText;
            }
        }
    }
</script>
<script>

    document.addEventListener('DOMContentLoaded', function() {

        const pickup_date = document.getElementById("pickup_date");
        const delivery_date = document.getElementById("delivery_date");
        const today = flatpickr.formatDate(new Date(), "Y-m-d");

        let pendingDate = today;
        let confirmedDate = today;
        pickup_date.value = today;
        delivery_date.value = today;

        flatpickr("#pickup_date", {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
            clickOpens: true,
            closeOnSelect: false,
            static: true,
            defaultDate: today, // ✅ also sets flatpickr default
            onChange: function (selectedDates, dateStr, instance) {
                // Store temporary date, don't commit
                pendingDate = dateStr;
            },
            onClose: function (selectedDates, dateStr, fp) {
                // Always restore confirmed date if not explicitly saved
                fp.setDate(confirmedDate, true);
                pendingDate = confirmedDate;
            },
            onReady: function (_, __, fp) {
                // Add footer buttons
                const footer = document.createElement("div");
                footer.className = "flatpickr-footer";
                footer.innerHTML = `
            <button type="button" class="fp-btn cancel">Cancel</button>
            <button type="button" class="fp-btn select">Select</button>
        `;
                fp.calendarContainer.appendChild(footer);

                // Cancel → restore confirmed
                footer.querySelector(".cancel").addEventListener("click", () => {
                    fp.setDate(confirmedDate, true);
                    pendingDate = confirmedDate;
                    fp.close();
                });

                // Select → confirm pending date
                footer.querySelector(".select").addEventListener("click", () => {
                    if (pendingDate) {
                        confirmedDate = pendingDate;
                        fp.setDate(confirmedDate, true);
                    }
                    fp.close();
                });
            }
        });
        flatpickr("#delivery_date", {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
            clickOpens: true,
            closeOnSelect: false,
            static: true,
            defaultDate: today, // ✅ also sets flatpickr default
            onChange: function (selectedDates, dateStr, instance) {
                // Store temporary date, don't commit
                pendingDate = dateStr;
            },
            onClose: function (selectedDates, dateStr, fp) {
                // Always restore confirmed date if not explicitly saved
                fp.setDate(confirmedDate, true);
                pendingDate = confirmedDate;
            },
            onReady: function (_, __, fp) {
                // Add footer buttons
                const footer = document.createElement("div");
                footer.className = "flatpickr-footer";
                footer.innerHTML = `
            <button type="button" class="fp-btn cancel">Cancel</button>
            <button type="button" class="fp-btn select">Select</button>
        `;
                fp.calendarContainer.appendChild(footer);

                // Cancel → restore confirmed
                footer.querySelector(".cancel").addEventListener("click", () => {
                    fp.setDate(confirmedDate, true);
                    pendingDate = confirmedDate;
                    fp.close();
                });

                // Select → confirm pending date
                footer.querySelector(".select").addEventListener("click", () => {
                    if (pendingDate) {
                        confirmedDate = pendingDate;
                        fp.setDate(confirmedDate, true);
                    }
                    fp.close();
                });
            }
        });

        $('#preffered_time_slot').select2({
            width: '100%'
        });

    });

</script>
<script>
    let pickupLocation = null;
    let destinationLocation = null;

    navigator.geolocation.watchPosition(position => {

            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            $('#pickup_location_latitude').val(lat);
            $('#pickup_location_longitude').val(lng);

        }, error => {
            console.error("Geolocation error:", error);
        },
        {
            enableHighAccuracy: true,
            maximumAge: 5000,
            timeout: 10000
        });

    function preventFormSubmitOnEnter(inputElement) {
        inputElement.addEventListener("keydown", function (e) {
            if (e.key === "Enter") e.preventDefault();
        });
    }

    function initMap() {
        // Pickup Location
        const input1 = document.getElementById("pac-input");
        preventFormSubmitOnEnter(input1);
        const autocomplete1 = new google.maps.places.Autocomplete(input1, {
            fields: ["geometry", "address_components", "formatted_address"],
        });
        autocomplete1.addListener("place_changed", () => {
            const place = autocomplete1.getPlace();
            if (!place.geometry) return;
            pickupLocation = place;
            let zip = "";

            console.log(place.address_components);

            if (place.address_components) {
                place.address_components.forEach(component => {
                    const types = component.types;
                    if (types.includes("postal_code")) {
                        zip = component.long_name;
                        document.getElementById("pickup_zip_code").value = zip;
                    }
                });
            }

            calculateRouteDistance();
        });

        // Final Destination
        const input2 = document.getElementById("pac-input2");
        preventFormSubmitOnEnter(input2);
        const autocomplete2 = new google.maps.places.Autocomplete(input2, {
            fields: ["geometry", "address_components", "formatted_address"],
        });
        autocomplete2.addListener("place_changed", () => {
            const place = autocomplete2.getPlace();
            if (!place.geometry) return;
            destinationLocation = place;

            let zip = "";

            if (place.address_components) {
                place.address_components.forEach(component => {
                    const types = component.types;
                    if (types.includes("postal_code")) {
                        zip = component.long_name;
                        document.getElementById("destination_zip_code").value = zip;
                    }
                });
            }

            calculateRouteDistance();
        });
    }

    function calculateRouteDistance() {
        if (!pickupLocation || !destinationLocation) return;

        const directionsService = new google.maps.DirectionsService();

        const request = {
            origin: pickupLocation.formatted_address,
            destination: destinationLocation.formatted_address,
            travelMode: google.maps.TravelMode.DRIVING
        };

        directionsService.route(request, function (result, status) {
            if (status === 'OK') {
                let totalDistance = 0;

                result.routes[0].legs.forEach((leg, index) => {
                    console.log(`Segment ${index + 1}: ${leg.start_address} → ${leg.end_address} = ${leg.distance.text}`);
                    totalDistance += leg.distance.value; // meters
                });

                const distanceInKm = (totalDistance / 1000).toFixed(2);
                console.log(`Total Driving Distance: ${distanceInKm} km`);
                document.getElementById("distance").value = `${distanceInKm}`;
            } else {
                console.error('Directions request failed due to ', status);
            }
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>
</body>
</html>
