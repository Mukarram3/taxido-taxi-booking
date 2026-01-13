<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expédier mes colis - Je confie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

        /* Navigation */
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

        /* Main Container */
        .main-container {
            max-width: 1280px;
            margin: 100px auto 40px;
            padding: 0 20px;
        }

        /* Language Content */
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: inline-block;
        }

        /* Header Section */
        .page-header {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            border-radius: var(--radius-xl);
            padding: 40px;
            color: white;
            text-align: center;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 35px,
                rgba(255,255,255,.05) 35px,
                rgba(255,255,255,.05) 70px
            );
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 16px;
            position: relative;
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.95;
            position: relative;
        }

        /* Form Container */
        .form-container {
            background: white;
            border-radius: var(--radius-xl);
            padding: 40px;
            box-shadow: var(--shadow);
            margin-bottom: 32px;
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
            background: var(--secondary);
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
            background: var(--secondary);
            border-color: var(--secondary);
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
            color: var(--secondary);
            font-weight: 600;
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
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
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
            border-color: var(--secondary);
        }

        .badge-option.selected {
            background: var(--secondary);
            border-color: var(--secondary);
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
            border-color: var(--secondary);
        }

        .package-category.selected {
            background: var(--secondary);
            border-color: var(--secondary);
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

        /* Subcategories Panel */
        .subcategories-panel {
            background: var(--light);
            border: 2px solid var(--secondary);
            border-radius: var(--radius);
            padding: 16px;
            margin-bottom: 16px;
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
            background: var(--secondary);
            color: white;
        }

        .subcategory-item.selected {
            background: var(--secondary);
            color: white;
            border-color: var(--secondary);
        }

        /* Package Dimensions */
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

        .dimension-inputs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        /* Vehicle Types */
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
            border-color: var(--secondary);
            transform: translateY(-2px);
        }

        .vehicle-type.selected {
            background: var(--secondary);
            border-color: var(--secondary);
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

        /* Prohibited Items */
        .prohibited-section {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border: 2px solid var(--danger);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 24px;
        }

        .prohibited-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            color: var(--danger);
            margin-bottom: 12px;
        }

        .prohibited-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .prohibited-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--dark);
        }

        /* Price Simulator Section */
        .simulator-section {
            background: linear-gradient(135deg, #e0f2fe, #dbeafe);
            border-radius: var(--radius-xl);
            padding: 32px;
            margin: 32px 0;
        }

        .simulator-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .simulator-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .simulator-subtitle {
            color: var(--gray);
        }

        .simulator-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }

        .simulator-inputs {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
        }

        .simulator-results {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
        }

        .price-display {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            border-radius: var(--radius-lg);
            padding: 24px;
            text-align: center;
            color: white;
            margin-bottom: 24px;
        }

        .price-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        .price-main {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .price-range {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Price Breakdown */
        .price-breakdown {
            background: var(--light);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 20px;
        }

        .breakdown-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
            font-size: 16px;
        }

        .breakdown-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
        }

        .breakdown-item:last-child {
            border-bottom: none;
            padding-top: 16px;
            margin-top: 8px;
            border-top: 2px solid var(--border);
            font-weight: 700;
        }

        .breakdown-label {
            color: var(--gray);
            font-size: 14px;
        }

        .breakdown-value {
            font-weight: 600;
            color: var(--dark);
        }

        .breakdown-item.vat-exempt {
            opacity: 0.6;
            font-style: italic;
        }

        /* Comparison Section */
        .comparison-section {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-top: 24px;
        }

        .comparison-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .comparison-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            background: var(--light);
            border-radius: var(--radius);
            margin-bottom: 8px;
        }

        .comparison-service {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .comparison-price {
            font-weight: 700;
            color: var(--dark);
        }

        .savings-badge {
            background: var(--success);
            color: white;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 8px;
        }

        /* Price Choice Section */
        .price-choice-section {
            background: white;
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-top: 24px;
            border: 2px solid var(--secondary);
        }

        .price-choice-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .price-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }

        .price-option {
            padding: 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .price-option:hover {
            border-color: var(--secondary);
        }

        .price-option.selected {
            background: var(--secondary);
            border-color: var(--secondary);
            color: white;
        }

        .price-option-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .price-option-label {
            font-size: 13px;
        }

        .custom-price-input {
            display: none;
            margin-top: 16px;
        }

        .custom-price-input.active {
            display: block;
        }

        /* Address Section */
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
            margin-top: 12px;
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
            background: var(--secondary);
            color: white;
        }

        .btn-primary:hover {
            background: #0891b2;
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

        /* Responsive */
        @media (max-width: 1024px) {
            .simulator-grid {
                grid-template-columns: 1fr;
            }

            .vehicle-types {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-container {
                margin-top: 80px;
            }

            .form-container {
                padding: 20px;
            }

            .package-categories {
                grid-template-columns: repeat(2, 1fr);
            }

            .price-options {
                grid-template-columns: 1fr;
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

            .prohibited-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.75rem;
            }

            .vehicle-types {
                grid-template-columns: 1fr;
            }

            .subcategories-grid {
                grid-template-columns: 1fr;
            }

            .dimension-inputs,
            .address-grid {
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

        /* Sender Requirements Styles */
        .requirements-section {
            margin-bottom: 32px;
            padding: 24px;
            background: #f9fafb;
            border-radius: var(--radius-lg);
        }

        .requirements-section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .requirements-section-description {
            color: var(--gray);
            margin-bottom: 20px;
            font-size: 14px;
        }

        .requirements-grid {
            display: grid;
            gap: 12px;
        }

        .requirement-item {
            background: white;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            padding: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .requirement-item:hover {
            border-color: var(--secondary);
            transform: translateX(4px);
        }

        .requirement-item.selected {
            border-color: var(--secondary);
            background: rgba(6, 182, 212, 0.05);
        }

        .requirement-checkbox {
            width: 24px;
            height: 24px;
            border: 2px solid var(--border);
            border-radius: 6px;
            flex-shrink: 0;
            transition: all 0.3s ease;
            position: relative;
            margin-top: 2px;
        }

        .requirement-item.selected .requirement-checkbox {
            background: var(--secondary);
            border-color: var(--secondary);
        }

        .requirement-item.selected .requirement-checkbox::after {
            content: '✓';
            position: absolute;
            color: white;
            font-weight: bold;
            font-size: 16px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .requirement-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .requirement-content {
            flex: 1;
        }

        .requirement-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 4px;
        }

        .requirement-title {
            font-weight: 600;
            color: var(--dark);
            font-size: 15px;
        }

        .requirement-description {
            color: var(--gray);
            font-size: 13px;
            line-height: 1.5;
        }

        .requirement-level {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid var(--border);
        }

        .level-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .level-select {
            width: 100%;
            padding: 8px 12px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            background: white;
        }

        .level-select:focus {
            outline: none;
            border-color: var(--secondary);
        }

        /* Image Upload Styles */
        .image-upload-section {
            margin-top: 32px;
            padding: 24px;
            background: #f9fafb;
            border-radius: var(--radius-lg);
        }

        .upload-area {
            border: 2px dashed var(--border);
            border-radius: var(--radius-lg);
            padding: 40px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .upload-area:hover {
            border-color: var(--secondary);
            background: rgba(6, 182, 212, 0.02);
        }

        .upload-area.drag-over {
            border-color: var(--secondary);
            background: rgba(6, 182, 212, 0.05);
        }

        .upload-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .upload-text {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .upload-hint {
            color: var(--gray);
            font-size: 14px;
        }

        .image-previews {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .image-preview {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            background: white;
            border: 2px solid var(--border);
            aspect-ratio: 1;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-image {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(239, 68, 68, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .remove-image:hover {
            background: var(--danger);
            transform: scale(1.1);
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
            <div class="language-switcher">
                <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
                <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
            </div>
        </div>
    </div>
</nav>

<!-- Main Container -->
<div class="main-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            📦 <span class="lang-content fr active">J'expédie - Recherche de transporteur</span>
            <span class="lang-content en">I'm shipping - Looking for carrier</span>
        </h1>
        <p>
                <span class="lang-content fr active">
                    Trouvez un transporteur fiable pour vos colis. Économisez jusqu'à 70% sur vos envois !
                </span>
            <span class="lang-content en">
                    Find a reliable carrier for your packages. Save up to 70% on your shipments!
                </span>
        </p>
    </div>

    <!-- Form Container -->
    <div class="form-container">
        <!-- Progress Steps -->
        <div class="progress-container">
            <div class="progress-steps">
                <div class="progress-line" id="progressLine" style="width: 0%"></div>
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
                    <div class="step-title">Exigences</div>
                </div>
                <div class="step" data-step="5">
                    <div class="step-circle">5</div>
                    <div class="step-title">Simulateur</div>
                </div>
                <div class="step" data-step="6">
                    <div class="step-circle">6</div>
                    <div class="step-title">Budget</div>
                </div>
                <div class="step" data-step="7">
                    <div class="step-circle">7</div>
                    <div class="step-title">Confirmation</div>
                </div>
            </div>
        </div>

        <form class="mt-0" id="create_offer_form" method="post" action="{{ route('user.driver_fare_request') }}" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="badges" id="selectedBadges">
            <input type="hidden" name="distance" id="distance">
            <input type="hidden" name="budget_option" id="budget_option">
            <input type="hidden" name="suggested_fare" id="suggested_fare">
            <input type="hidden" name="packages_json" id="packages_json">
            <input type="hidden" name="categories" id="selectedCategories">
            <input type="hidden" name="subcategories" id="selectedSubcategories">
            <input type="hidden" name="vehicle_type_needed" id="vehicle_type_needed">
            <input type="hidden" name="payment_method" id="payment_method">
            <input type="hidden" name="pickup_location_latitude" id="pickup_location_latitude">
            <input type="hidden" name="pickup_location_longitude" id="pickup_location_longitude">

            <!-- Step 1: Package Details -->
            <div class="form-section active" id="step1">
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
                    <div class="badge-option" onclick="toggleBadge(this, 'professional')">
                        <span class="lang-content fr active">💼 Professionnel</span>
                        <span class="lang-content en">💼 Professional</span>
                    </div>
                    <div class="badge-option" onclick="toggleBadge(this, 'personal')">
                        <span class="lang-content fr active">👤 Particulier</span>
                        <span class="lang-content en">👤 Personal</span>
                    </div>
                </div>

                <!-- Package Categories with Subcategories -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Type de colis</span>
                        <span class="lang-content en">Package type</span>
                        <span class="required">*</span>
                    </label>
                    <div class="package-categories">
                        <div class="package-category" onclick="toggleCategory(this, 'documents')">
                            <div class="category-icon">📄</div>
                            <div class="category-name">
                                <span class="lang-content fr active">Documents</span>
                                <span class="lang-content en">Documents</span>
                            </div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'furniture')">
                            <div class="category-icon">🛋️</div>
                            <div class="category-name">
                                <span class="lang-content fr active">Meubles</span>
                                <span class="lang-content en">Furniture</span>
                            </div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'appliances')">
                            <div class="category-icon">📺</div>
                            <div class="category-name">
                                <span class="lang-content fr active">Électroménager</span>
                                <span class="lang-content en">Appliances</span>
                            </div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'boxes')">
                            <div class="category-icon">📦</div>
                            <div class="category-name">
                                <span class="lang-content fr active">Cartons/Déménagement</span>
                                <span class="lang-content en">Boxes/Moving</span>
                            </div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'sports')">
                            <div class="category-icon">🚲</div>
                            <div class="category-name">
                                <span class="lang-content fr active">Vélos/Sport</span>
                                <span class="lang-content en">Bikes/Sports</span>
                            </div>
                        </div>
                        <div class="package-category" onclick="toggleCategory(this, 'other')">
                            <div class="category-icon">🔧</div>
                            <div class="category-name">
                                <span class="lang-content fr active">Autres</span>
                                <span class="lang-content en">Other</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subcategories Container -->
                <div id="subcategoriesContainer">
                    <!-- Subcategories will be dynamically added here -->
                </div>

                <!-- Prohibited Items Warning -->
                <div class="prohibited-section">
                    <div class="prohibited-title">
                        ⚠️ <span class="lang-content fr active">Articles interdits au transport</span>
                        <span class="lang-content en">Items prohibited for transport</span>
                    </div>
                    <div class="prohibited-grid">
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Armes et munitions</span><span class="lang-content en">Weapons and ammunition</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Drogues et stupéfiants</span><span class="lang-content en">Drugs and narcotics</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Matières explosives</span><span class="lang-content en">Explosive materials</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Produits chimiques dangereux</span><span class="lang-content en">Dangerous chemicals</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Animaux vivants</span><span class="lang-content en">Live animals</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Objets contrefaits</span><span class="lang-content en">Counterfeit items</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Espèces > 10000€</span><span class="lang-content en">Cash > €10000</span></div>
                        <div class="prohibited-item">❌ <span class="lang-content fr active">Matières radioactives</span><span class="lang-content en">Radioactive materials</span></div>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Description de votre envoi</span>
                        <span class="lang-content en">Description of your shipment</span>
                        <span class="required">*</span>
                    </label>
                    <textarea class="form-textarea" name="shipment_description" id="packageDescription" minlength="10" required placeholder="Ex: Canapé 3 places, cartons de déménagement, documents urgents..."></textarea>
                </div>

                <!-- Package Dimensions -->
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
                            <input type="number" name="weight" class="form-input" placeholder="Poids (kg)" style="margin-top: 12px;" required>
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
                    <input type="number" name="total_declared_value" class="form-input" id="packageValue" placeholder="Valeur totale de votre envoi" required>
                    <div class="form-helper">
                        <span class="lang-content fr active">Important pour l'assurance</span>
                        <span class="lang-content en">Important for insurance</span>
                    </div>
                </div>
            </div>

            <!-- Step 2: Route -->
            <div class="form-section" id="step2">
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
                            <input type="text" class="form-input" name="pickup_house_no" id="pickupCity" placeholder="Ville" required>
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
                            <input type="text" class="form-input" name="destination_house_no" id="deliveryCity" placeholder="Ville" required>
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
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Date de prise en charge souhaitée</span>
                            <span class="lang-content en">Desired pickup date</span>
                            <span class="required">*</span>
                        </label>
                        <input type="date" name="pickup_date" class="form-input" id="pickupDate" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="lang-content fr active">Date de livraison souhaitée</span>
                            <span class="lang-content en">Desired delivery date</span>
                            <span class="required">*</span>
                        </label>
                        <input type="date" name="delivery_date" class="form-input" id="deliveryDate" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="timeSlot">
                        <span class="lang-content fr active">Créneau horaire préféré</span>
                        <span class="lang-content en">Preferred time slot</span>
                    </label>
                    <select class="form-select" name="preffered_time_slot" id="timeSlot">
                        <option value="">Choisir...</option>
                        <option value="morning">8h - 12h</option>
                        <option value="afternoon">12h - 17h</option>
                        <option value="evening">17h - 20h</option>
                        <option value="flexible">Flexible</option>
                    </select>
                </div>
            </div>

            <!-- Step 3: Recipient -->
            <div class="form-section" id="step3">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Informations du destinataire</span>
                    <span class="lang-content en">Recipient information</span>
                </h2>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Nom complet du destinataire</span>
                        <span class="lang-content en">Recipient full name</span>
                        <span class="required">*</span>
                    </label>
                    <input type="text" class="form-input" name="recipient_name" id="recipientName" placeholder="Prénom et nom" required>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Téléphone du destinataire</span>
                        <span class="lang-content en">Recipient phone number</span>
                        <span class="required">*</span>
                    </label>
                    <input type="tel" class="form-input" name="recipient_number" id="recipientPhone" placeholder="+33 6 XX XX XX XX" required>
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
                    <input type="email" class="form-input" name="recipient_email" id="recipientEmail" placeholder="email@example.com">
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Instructions spéciales pour le livreur</span>
                        <span class="lang-content en">Special instructions for delivery</span>
                    </label>
                    <textarea class="form-textarea" name="recipient_delivery_instrcutions" placeholder="Ex: Sonner au nom de Martin, laisser le colis au gardien si absent..."></textarea>
                </div>

                <!-- Transport Requirements -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Services requis</span>
                        <span class="lang-content en">Required services</span>
                    </label>
                    <div style="display: grid; gap: 12px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" name="is_homePickup" value="1" id="homePickup">
                            <span>
                                <span class="lang-content fr active">🏠 Enlèvement à domicile</span>
                                <span class="lang-content en">🏠 Home pickup</span>
                            </span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" name="is_homeDelivery" value="1" id="homeDelivery">
                            <span>
                                <span class="lang-content fr active">🏡 Livraison à domicile</span>
                                <span class="lang-content en">🏡 Home delivery</span>
                            </span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" name="is_needHelp" value="1" id="needHelp">
                            <span>
                                <span class="lang-content fr active">💪 Besoin d'aide pour charger/décharger</span>
                                <span class="lang-content en">💪 Need help loading/unloading</span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Step 4: Sender Requirements & Images -->
            <div class="form-section" id="step4">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">✓ Exigences du transporteur & Photos</span>
                    <span class="lang-content en">✓ Carrier Requirements & Photos</span>
                </h2>

                <!-- Professional Certifications Section -->
                <div class="requirements-section">
                    <h2 class="requirements-section-title">
                        🎓 <span class="lang-content fr active">Certifications professionnelles</span>
                        <span class="lang-content en">Professional certifications</span>
                    </h2>
                    <p class="requirements-section-description">
                        <span class="lang-content fr active">Sélectionnez les certifications requises pour votre transport</span>
                        <span class="lang-content en">Select the certifications required for your transport</span>
                    </p>

                    <div class="requirements-grid">
                        <div class="requirement-item" data-id="transport-license" onclick="toggleRequirement(this, event)">
                            <div class="requirement-checkbox"></div>
                            <div class="requirement-icon">🚛</div>
                            <div class="requirement-content">
                                <div class="requirement-header">
                                    <div class="requirement-title">
                                        <span class="lang-content fr active">Licence de transport</span>
                                        <span class="lang-content en">Transport license</span>
                                    </div>
                                </div>
                                <div class="requirement-description">
                                    <span class="lang-content fr active">
                                        Licence de transport valide délivrée par les autorités compétentes
                                    </span>
                                    <span class="lang-content en">
                                        Valid transport license issued by competent authorities
                                    </span>
                                </div>
                                <div class="requirement-level" style="display: none;">
                                    <div class="level-label">
                                        <span class="lang-content fr active">Niveau d'exigence :</span>
                                        <span class="lang-content en">Requirement level:</span>
                                    </div>
                                    <select class="level-select" name="requirement_transport_license_level" onclick="event.stopPropagation()">
                                        <option value="optional">Optionnel / Optional</option>
                                        <option value="mandatory">Obligatoire / Mandatory</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="requirement_transport_license" value="0">
                        </div>

                        <div class="requirement-item" data-id="insurance" onclick="toggleRequirement(this, event)">
                            <div class="requirement-checkbox"></div>
                            <div class="requirement-icon">🛡️</div>
                            <div class="requirement-content">
                                <div class="requirement-header">
                                    <div class="requirement-title">
                                        <span class="lang-content fr active">Assurance professionnelle</span>
                                        <span class="lang-content en">Professional insurance</span>
                                    </div>
                                </div>
                                <div class="requirement-description">
                                    <span class="lang-content fr active">
                                        Attestation d'assurance couvrant le transport de marchandises (minimum 5000€)
                                    </span>
                                    <span class="lang-content en">
                                        Insurance certificate covering goods transport (minimum €5000)
                                    </span>
                                </div>
                                <div class="requirement-level" style="display: none;">
                                    <div class="level-label">
                                        <span class="lang-content fr active">Niveau d'exigence :</span>
                                        <span class="lang-content en">Requirement level:</span>
                                    </div>
                                    <select class="level-select" name="requirement_insurance_level" onclick="event.stopPropagation()">
                                        <option value="optional">Optionnel / Optional</option>
                                        <option value="mandatory">Obligatoire / Mandatory</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="requirement_insurance" value="0">
                        </div>

                        <div class="requirement-item" data-id="identity" onclick="toggleRequirement(this, event)">
                            <div class="requirement-checkbox"></div>
                            <div class="requirement-icon">🆔</div>
                            <div class="requirement-content">
                                <div class="requirement-header">
                                    <div class="requirement-title">
                                        <span class="lang-content fr active">Pièce d'identité vérifiée</span>
                                        <span class="lang-content en">Verified ID</span>
                                    </div>
                                </div>
                                <div class="requirement-description">
                                    <span class="lang-content fr active">
                                        Le transporteur doit avoir validé son identité sur la plateforme
                                    </span>
                                    <span class="lang-content en">
                                        Carrier must have validated their identity on the platform
                                    </span>
                                </div>
                                <div class="requirement-level" style="display: none;">
                                    <div class="level-label">
                                        <span class="lang-content fr active">Niveau d'exigence :</span>
                                        <span class="lang-content en">Requirement level:</span>
                                    </div>
                                    <select class="level-select" name="requirement_identity_level" onclick="event.stopPropagation()">
                                        <option value="optional">Optionnel / Optional</option>
                                        <option value="mandatory">Obligatoire / Mandatory</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="requirement_identity" value="0">
                        </div>
                    </div>
                </div>

                <!-- Vehicle Section -->
                <div class="requirements-section">
                    <h2 class="requirements-section-title">
                        🚛 <span class="lang-content fr active">Véhicule et équipement</span>
                        <span class="lang-content en">Vehicle and equipment</span>
                    </h2>
                    <p class="requirements-section-description">
                        <span class="lang-content fr active">Définissez les critères liés au véhicule</span>
                        <span class="lang-content en">Define vehicle-related criteria</span>
                    </p>

                    <div class="requirements-grid">
                        <div class="requirement-item" data-id="vehicle" onclick="toggleRequirement(this, event)">
                            <div class="requirement-checkbox"></div>
                            <div class="requirement-icon">🚛</div>
                            <div class="requirement-content">
                                <div class="requirement-header">
                                    <div class="requirement-title">
                                        <span class="lang-content fr active">Véhicule utilitaire adapté</span>
                                        <span class="lang-content en">Suitable utility vehicle</span>
                                    </div>
                                </div>
                                <div class="requirement-description">
                                    <span class="lang-content fr active">
                                        Véhicule avec minimum 12m³ de volume de chargement
                                    </span>
                                    <span class="lang-content en">
                                        Vehicle with minimum 12m³ loading volume
                                    </span>
                                </div>
                                <div class="requirement-level" style="display: none;">
                                    <div class="level-label">
                                        <span class="lang-content fr active">Niveau d'exigence :</span>
                                        <span class="lang-content en">Requirement level:</span>
                                    </div>
                                    <select class="level-select" name="requirement_vehicle_level" onclick="event.stopPropagation()">
                                        <option value="optional">Optionnel / Optional</option>
                                        <option value="mandatory">Obligatoire / Mandatory</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="requirement_vehicle" value="0">
                        </div>

                        <div class="requirement-item" data-id="equipment" onclick="toggleRequirement(this, event)">
                            <div class="requirement-checkbox"></div>
                            <div class="requirement-icon">🧰</div>
                            <div class="requirement-content">
                                <div class="requirement-header">
                                    <div class="requirement-title">
                                        <span class="lang-content fr active">Équipement de protection</span>
                                        <span class="lang-content en">Protection equipment</span>
                                    </div>
                                </div>
                                <div class="requirement-description">
                                    <span class="lang-content fr active">
                                        Couvertures, sangles et matériel de protection pour le transport
                                    </span>
                                    <span class="lang-content en">
                                        Blankets, straps and protection material for transport
                                    </span>
                                </div>
                                <div class="requirement-level" style="display: none;">
                                    <div class="level-label">
                                        <span class="lang-content fr active">Niveau d'exigence :</span>
                                        <span class="lang-content en">Requirement level:</span>
                                    </div>
                                    <select class="level-select" name="requirement_equipment_level" onclick="event.stopPropagation()">
                                        <option value="optional">Optionnel / Optional</option>
                                        <option value="mandatory">Obligatoire / Mandatory</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="requirement_equipment" value="0">
                        </div>
                    </div>
                </div>

                <!-- Services Section -->
                <div class="requirements-section">
                    <h2 class="requirements-section-title">
                        💪 <span class="lang-content fr active">Services et assistance</span>
                        <span class="lang-content en">Services and assistance</span>
                    </h2>
                    <p class="requirements-section-description">
                        <span class="lang-content fr active">Sélectionnez les services requis</span>
                        <span class="lang-content en">Select required services</span>
                    </p>

                    <div class="requirements-grid">
                        <div class="requirement-item" data-id="loading-help" onclick="toggleRequirement(this, event)">
                            <div class="requirement-checkbox"></div>
                            <div class="requirement-icon">💪</div>
                            <div class="requirement-content">
                                <div class="requirement-header">
                                    <div class="requirement-title">
                                        <span class="lang-content fr active">Aide au chargement/déchargement</span>
                                        <span class="lang-content en">Loading/unloading assistance</span>
                                    </div>
                                </div>
                                <div class="requirement-description">
                                    <span class="lang-content fr active">
                                        Le transporteur doit participer activement au chargement et déchargement des articles
                                    </span>
                                    <span class="lang-content en">
                                        Carrier must actively participate in loading and unloading items
                                    </span>
                                </div>
                                <div class="requirement-level" style="display: none;">
                                    <div class="level-label">
                                        <span class="lang-content fr active">Niveau d'exigence :</span>
                                        <span class="lang-content en">Requirement level:</span>
                                    </div>
                                    <select class="level-select" name="requirement_loading_help_level" onclick="event.stopPropagation()">
                                        <option value="optional">Optionnel / Optional</option>
                                        <option value="mandatory">Obligatoire / Mandatory</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="requirement_loading_help" value="0">
                        </div>
                    </div>
                </div>

                <!-- Image Upload Section -->
                <div class="image-upload-section">
                    <h2 class="requirements-section-title" style="margin-bottom: 16px;">
                        📸 <span class="lang-content fr active">Photos du colis</span>
                        <span class="lang-content en">Package Photos</span>
                    </h2>
                    <p class="requirements-section-description">
                        <span class="lang-content fr active">Ajoutez des photos pour aider les transporteurs à mieux évaluer votre demande</span>
                        <span class="lang-content en">Add photos to help carriers better evaluate your request</span>
                    </p>

                    <div class="upload-area" id="uploadArea">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">
                            <span class="lang-content fr active">Cliquez ou glissez-déposez vos images ici</span>
                            <span class="lang-content en">Click or drag and drop your images here</span>
                        </div>
                        <div class="upload-hint">
                            <span class="lang-content fr active">PNG, JPG ou JPEG jusqu'à 10MB chacune</span>
                            <span class="lang-content en">PNG, JPG or JPEG up to 10MB each</span>
                        </div>
                        <input type="file" id="imageInput" name="images[]" multiple accept="image/*" style="display: none;">
                    </div>

                    <div class="image-previews" id="imagePreviews"></div>
                </div>
            </div>

            <!-- Step 5: Price Simulator -->
            <div class="form-section" id="step5">
                <div class="simulator-section">
                    <div class="simulator-header">
                        <h2 class="simulator-title">
                            💰 <span class="lang-content fr active">Simulateur de coût intelligent</span>
                            <span class="lang-content en">Smart cost simulator</span>
                        </h2>
                        <p class="simulator-subtitle">
                            <span class="lang-content fr active">Estimation précise basée sur les tarifs du marché</span>
                            <span class="lang-content en">Accurate estimate based on market rates</span>
                        </p>
                    </div>

                    <div class="simulator-grid">
                        <!-- Simulator Inputs -->
                        <div class="simulator-inputs">
                            <h3 style="margin-bottom: 20px;">
                                <span class="lang-content fr active">Paramètres de calcul</span>
                                <span class="lang-content en">Calculation parameters</span>
                            </h3>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Distance estimée (km)</span>
                                    <span class="lang-content en">Estimated distance (km)</span>
                                </label>
                                <input type="number" class="form-input" name="estimated_distance" id="simDistance" value="" onchange="calculateShippingPrice()">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Poids total (kg)</span>
                                    <span class="lang-content en">Total weight (kg)</span>
                                </label>
                                <input type="number" class="form-input" name="estimated_total_weight" id="simWeight" value="" onchange="calculateShippingPrice()">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Volume estimé (m³)</span>
                                    <span class="lang-content en">Estimated volume (m³)</span>
                                </label>
                                <input type="number" class="form-input" name="estimated_total_volume" id="simVolume" value="" step="0.1" onchange="calculateShippingPrice()">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Type de transport</span>
                                    <span class="lang-content en">Transport type</span>
                                </label>
                                <select class="form-select" id="transportType" name="transportType" onchange="calculateShippingPrice()">
                                    <option value="cotransport">Cotransport</option>
                                    <option value="dedicated">Transport dédié</option>
                                    <option value="groupage">Groupage</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="lang-content fr active">Urgence</span>
                                    <span class="lang-content en">Urgency</span>
                                </label>
                                <select class="form-select" preffered_time_slot id="urgency" onchange="calculateShippingPrice()">
                                    <option value="flexible">Flexible (5-7 jours)</option>
                                    <option value="normal">Normal (2-4 jours)</option>
                                    <option value="express">Express (24-48h)</option>
                                    <option value="urgent">Urgent (< 24h)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Simulator Results -->
                        <div class="simulator-results">
                            <div class="price-display">
                                <div class="price-label">
                                    <span class="lang-content fr active">Budget suggéré</span>
                                    <span class="lang-content en">Suggested budget</span>
                                </div>
                                <div class="price-main" id="suggestedBudget">85€</div>
                                <div class="price-range" id="priceRange">
                                    <span class="lang-content fr active">Fourchette: 70€ - 100€</span>
                                    <span class="lang-content en">Range: €70 - €100</span>
                                </div>
                            </div>

                            <div class="price-breakdown">
                                <div class="breakdown-title">
                                    <span class="lang-content fr active">Détail du calcul</span>
                                    <span class="lang-content en">Calculation details</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Transport de base</span>
                                        <span class="lang-content en">Base transport</span>
                                    </span>
                                    <span class="breakdown-value" id="baseTransport">50€</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Distance (100 km)</span>
                                        <span class="lang-content en">Distance (100 km)</span>
                                    </span>
                                    <span class="breakdown-value" id="distanceCost">+20€</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Poids/Volume</span>
                                        <span class="lang-content en">Weight/Volume</span>
                                    </span>
                                    <span class="breakdown-value" id="weightVolumeCost">+10€</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Urgence</span>
                                        <span class="lang-content en">Urgency</span>
                                    </span>
                                    <span class="breakdown-value" id="urgencyCost">+0€</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Services additionnels</span>
                                        <span class="lang-content en">Additional services</span>
                                    </span>
                                    <span class="breakdown-value" id="additionalServices">+5€</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Commission plateforme</span>
                                        <span class="lang-content en">Platform commission</span>
                                    </span>
                                    <span class="breakdown-value" id="platformCommission">15%</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">Frais de transaction (moy.)</span>
                                        <span class="lang-content en">Transaction fees (avg.)</span>
                                    </span>
                                    <span class="breakdown-value" id="simTransactionFees">1.3€</span>
                                </div>
                                <div class="breakdown-item vat-exempt">
                                    <span class="breakdown-label">
                                        <span class="lang-content fr active">TVA (exonérée*)</span>
                                        <span class="lang-content en">VAT (exempted*)</span>
                                    </span>
                                    <span class="breakdown-value">20%</span>
                                </div>
                                <div class="breakdown-item">
                                    <span class="breakdown-label">
                                        <strong>
                                            <span class="lang-content fr active">Total à payer</span>
                                            <span class="lang-content en">Total to pay</span>
                                        </strong>
                                    </span>
                                    <span class="breakdown-value" id="totalCost">85€</span>
                                </div>
                            </div>

                            <div style="background: #fef3c7; padding: 12px; border-radius: 8px; margin-top: 16px;">
                                <p style="font-size: 12px; color: #92400e;">
                                    <span class="lang-content fr active">
                                        * TVA affichée à titre indicatif. Actuellement exonérée car le CA < 25 000€
                                    </span>
                                    <span class="lang-content en">
                                        * VAT shown for information only. Currently exempted as revenue < €25,000
                                    </span>
                                </p>
                            </div>

                            <!-- Comparison with other services -->
                            <div class="comparison-section">
                                <h4 class="comparison-title">
                                    <span class="lang-content fr active">📊 Comparaison avec d'autres services</span>
                                    <span class="lang-content en">📊 Comparison with other services</span>
                                </h4>
                                <div class="comparison-item">
                                    <div class="comparison-service">
                                        <span>📦</span>
                                        <span>Je confie</span>
                                    </div>
                                    <div>
                                        <span class="comparison-price" id="jeconfiePrice">85€</span>
                                        <span class="savings-badge">-70%</span>
                                    </div>
                                </div>
                                <div class="comparison-item">
                                    <div class="comparison-service">
                                        <span>🚚</span>
                                        <span>Transport Pro</span>
                                    </div>
                                    <span class="comparison-price">280€</span>
                                </div>
                                <div class="comparison-item">
                                    <div class="comparison-service">
                                        <span>📮</span>
                                        <span>La Poste</span>
                                    </div>
                                    <span class="comparison-price">150€</span>
                                </div>
                                <div class="comparison-item">
                                    <div class="comparison-service">
                                        <span>🚛</span>
                                        <span>Express</span>
                                    </div>
                                    <span class="comparison-price">320€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 6: Budget & Options -->
            <div class="form-section" id="step6">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Budget et options</span>
                    <span class="lang-content en">Budget and options</span>
                </h2>

                <div class="price-choice-section">
                    <h3 class="price-choice-title">
                        <span class="lang-content fr active">💰 Définissez votre budget maximum</span>
                        <span class="lang-content en">💰 Set your maximum budget</span>
                    </h3>

                    <div class="price-options">
                        <div class="price-option" onclick="selectBudgetOption(this, 'suggested')">
                            <div class="price-option-value" id="suggestedBudgetOption">85€</div>
                            <div class="price-option-label">
                                <span class="lang-content fr active">Budget suggéré</span>
                                <span class="lang-content en">Suggested budget</span>
                            </div>
                        </div>
                        <div class="price-option" onclick="selectBudgetOption(this, 'custom')">
                            <div class="price-option-value">?€</div>
                            <div class="price-option-label">
                                <span class="lang-content fr active">Budget personnalisé</span>
                                <span class="lang-content en">Custom budget</span>
                            </div>
                        </div>
                    </div>

                    <div class="custom-price-input" id="customBudgetInput">
                        <label class="form-label">
                            <span class="lang-content fr active">Votre budget maximum (€)</span>
                            <span class="lang-content en">Your maximum budget (€)</span>
                        </label>
                        <input type="number" class="form-input" name="custom_fare" id="customBudget" placeholder="Ex: 100" min="1">
                        <div class="form-helper">
                            <span class="lang-content fr active">Les transporteurs pourront proposer leurs prix</span>
                            <span class="lang-content en">Carriers will be able to offer their prices</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Type de véhicule recherché</span>
                        <span class="lang-content en">Vehicle type needed</span>
                    </label>
                    <div class="vehicle-types">
                        <div class="vehicle-type" onclick="selectVehicle(this, 'any')">
                            <div class="vehicle-icon">✨</div>
                            <div class="vehicle-name">
                                <span class="lang-content fr active">Peu importe</span>
                                <span class="lang-content en">Any</span>
                            </div>
                        </div>
                        <div class="vehicle-type" onclick="selectVehicle(this, 'car')">
                            <div class="vehicle-icon">🚗</div>
                            <div class="vehicle-name">
                                <span class="lang-content fr active">Voiture</span>
                                <span class="lang-content en">Car</span>
                            </div>
                        </div>
                        <div class="vehicle-type" onclick="selectVehicle(this, 'van')">
                            <div class="vehicle-icon">🚐</div>
                            <div class="vehicle-name">Van</div>
                        </div>
                        <div class="vehicle-type" onclick="selectVehicle(this, 'truck')">
                            <div class="vehicle-icon">🚛</div>
                            <div class="vehicle-name">
                                <span class="lang-content fr active">Camion</span>
                                <span class="lang-content en">Truck</span>
                            </div>
                        </div>
                        <div class="vehicle-type" onclick="selectVehicle(this, 'traveler')">
                            <div class="vehicle-icon">✈️</div>
                            <div class="vehicle-name">
                                <span class="lang-content fr active">Voyageur</span>
                                <span class="lang-content en">Traveler</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Insurance Options -->
                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Assurance transport</span>
                        <span class="lang-content en">Transport insurance</span>
                    </label>
                    <select class="form-select" id="insurance" name="insurance">
                        <option value="basic">Basique (250€) - Inclus</option>
                        <option value="standard" selected>Standard (1000€) - +10€</option>
                        <option value="premium">Premium (5000€) - +25€</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="lang-content fr active">Conditions particulières (optionnel)</span>
                        <span class="lang-content en">Special conditions (optional)</span>
                    </label>
                    <textarea class="form-textarea" name="special_condition" placeholder="Ex: Fragile, besoin de 2 personnes pour porter, etc."></textarea>
                </div>
            </div>

            <!-- Step 7: Payment & Confirmation -->
            <div class="form-section" id="step7">
                <h2 style="margin-bottom: 24px;">
                    <span class="lang-content fr active">Paiement et confirmation</span>
                    <span class="lang-content en">Payment and confirmation</span>
                </h2>

                <!-- Request Summary -->
                <div style="background: var(--light); padding: 24px; border-radius: var(--radius); margin-bottom: 24px;">
                    <h3 style="margin-bottom: 16px;">
                        <span class="lang-content fr active">📋 Récapitulatif de votre demande</span>
                        <span class="lang-content en">📋 Request summary</span>
                    </h3>
                    <div id="requestSummary">
                        <!-- Summary will be populated dynamically -->
                    </div>
                </div>

                <!-- Financial Details -->
                <div class="price-breakdown">
                    <div class="breakdown-title">
                        <span class="lang-content fr active">Détail financier</span>
                        <span class="lang-content en">Financial details</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Budget maximum défini</span>
                            <span class="lang-content en">Maximum budget set</span>
                        </span>
                        <span class="breakdown-value" id="finalBudget">85€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Assurance sélectionnée</span>
                            <span class="lang-content en">Selected insurance</span>
                        </span>
                        <span class="breakdown-value" id="finalInsurance">Standard (1000€) +10€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Commission plateforme</span>
                            <span class="lang-content en">Platform commission</span>
                        </span>
                        <span class="breakdown-value" id="finalCommissionRate">15%</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Montant de la commission</span>
                            <span class="lang-content en">Commission amount</span>
                        </span>
                        <span class="breakdown-value" id="commissionAmount">13€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">Frais de transaction estimés</span>
                            <span class="lang-content en">Estimated transaction fees</span>
                        </span>
                        <span class="breakdown-value" id="transactionFees">2.6€</span>
                    </div>
                    <div class="breakdown-item vat-exempt">
                        <span class="breakdown-label">
                            <span class="lang-content fr active">TVA (20% - exonérée*)</span>
                            <span class="lang-content en">VAT (20% - exempted*)</span>
                        </span>
                        <span class="breakdown-value">0€</span>
                    </div>
                    <div class="breakdown-item">
                        <span class="breakdown-label">
                            <strong>
                                <span class="lang-content fr active">Total maximum à payer</span>
                                <span class="lang-content en">Maximum total to pay</span>
                            </strong>
                        </span>
                        <span class="breakdown-value" style="color: var(--secondary); font-size: 1.25rem;" id="totalMaximum">100.6€</span>
                    </div>
                </div>

                <div style="background: #fef3c7; padding: 12px; border-radius: 8px; margin: 16px 0;">
                    <p style="font-size: 12px; color: #92400e;">
                        <span class="lang-content fr active">
                            * TVA exonérée (CA < 25 000€). Les frais de transaction varient selon le mode de paiement choisi (1.2% à 2.9%).
                        </span>
                        <span class="lang-content en">
                            * VAT exempted (revenue < €25,000). Transaction fees vary based on payment method (1.2% to 2.9%).
                        </span>
                    </p>
                </div>

                <!-- Expiration Date -->
                <div class="form-group" style="background: white; padding: 20px; border-radius: var(--radius); border: 2px solid var(--warning);">
                    <label class="form-label">
                        ⏰ <span class="lang-content fr active">Date d'expiration de la demande</span>
                        <span class="lang-content en">Request expiration date</span>
                        <span class="required">*</span>
                    </label>
                    <input type="date" name="expiry_date" class="form-input" id="requestExpiration" required>
                    <div class="form-helper">
                        <span class="lang-content fr active">Après cette date, votre demande ne sera plus visible aux transporteurs</span>
                        <span class="lang-content en">After this date, your request will no longer be visible to carriers</span>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div style="background: linear-gradient(135deg, #e0f2fe, #dbeafe); padding: 24px; border-radius: var(--radius-lg); margin-top: 24px;">
                    <h3 style="margin-bottom: 20px;">
                        💳 <span class="lang-content fr active">Choisissez votre mode de paiement</span>
                        <span class="lang-content en">Choose your payment method</span>
                    </h3>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 20px;">
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'visa')">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">Visa</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: +1.4%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'mastercard')">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">Mastercard</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: +1.4%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'cb')">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">CB</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: +1.2%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'amex')">
                            <div style="font-size: 32px; margin-bottom: 8px;">💳</div>
                            <div style="font-size: 12px; font-weight: 600;">Amex</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: +2.5%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'applepay')">
                            <div style="font-size: 32px; margin-bottom: 8px;">🍎</div>
                            <div style="font-size: 12px; font-weight: 600;">Apple Pay</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: +1.5%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'googlepay')">
                            <div style="font-size: 32px; margin-bottom: 8px;">🇬</div>
                            <div style="font-size: 12px; font-weight: 600;">Google Pay</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: +1.5%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'paypal')">
                            <div style="font-size: 32px; margin-bottom: 8px;">🅿️</div>
                            <div style="font-size: 12px; font-weight: 600;">PayPal</div>
                            <div style="font-size: 10px; color: var(--gray);">Frais: +2.9%</div>
                        </div>
                        <div style="background: white; padding: 16px; border-radius: var(--radius); text-align: center; border: 2px solid var(--border); cursor: pointer;" onclick="selectPaymentMethod(this, 'bank')">
                            <div style="font-size: 32px; margin-bottom: 8px;">🏦</div>
                            <div style="font-size: 12px; font-weight: 600;">Virement</div>
                            <div style="font-size: 10px; color: var(--gray);">Sans frais</div>
                        </div>
                    </div>

                    <!-- Payment Form (shown when method selected) -->
                    <div id="paymentForm" style="display: none; background: white; padding: 20px; border-radius: var(--radius); margin-top: 16px;">
                        <h4 style="margin-bottom: 16px;">
                            <span class="lang-content fr active">Informations de paiement</span>
                            <span class="lang-content en">Payment information</span>
                        </h4>
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Nom du titulaire</span>
                                <span class="lang-content en">Cardholder name</span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-input" id="cardholderName" name="card_holdername" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <span class="lang-content fr active">Email pour la facture</span>
                                <span class="lang-content en">Email for invoice</span>
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input" id="billingEmail" name="invoice_email" required placeholder="email@example.com">
                        </div>
                    </div>

                    <div style="background: white; padding: 16px; border-radius: var(--radius); margin-top: 16px;">
                        <p style="font-size: 13px; color: var(--gray);">
                            <span class="lang-content fr active">
                                🔒 Paiement sécurisé par SSL • 💳 Données cryptées • ✅ Conformité PCI DSS
                            </span>
                            <span class="lang-content en">
                                🔒 Secure SSL payment • 💳 Encrypted data • ✅ PCI DSS compliant
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Terms Acceptance -->
                <div style="margin-top: 24px; padding: 20px; background: white; border-radius: var(--radius); border: 2px solid var(--border);">
                    <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                        <input type="checkbox" id="acceptTerms" style="margin-top: 2px;" required>
                        <span style="font-size: 14px;">
                            <span class="lang-content fr active">
                                J'accepte les <a href="#" style="color: var(--secondary);">conditions générales d'utilisation</a> et je confirme que ma demande est légitime. Je comprends que le paiement sera effectué uniquement après acceptation d'une offre de transporteur.
                            </span>
                            <span class="lang-content en">
                                I accept the <a href="#" style="color: var(--secondary);">terms and conditions</a> and confirm that my request is legitimate. I understand that payment will only be made after accepting a carrier's offer.
                            </span>
                        </span>
                    </label>
                </div>

                <!-- Invoice Notice -->
                <div style="background: #ecfdf5; padding: 16px; border-radius: var(--radius); margin-top: 16px;">
                    <p style="font-size: 14px; color: #065f46;">
                        📧 <span class="lang-content fr active">
                            Une facture détaillée sera envoyée à votre adresse email après validation et paiement
                        </span>
                        <span class="lang-content en">
                            A detailed invoice will be sent to your email address after validation and payment
                        </span>
                    </p>
                </div>

                <!-- Next Steps -->
                <div style="background: #e0f2fe; padding: 16px; border-radius: var(--radius); margin-top: 20px;">
                    <h4 style="margin-bottom: 8px;">
                        <span class="lang-content fr active">📢 Prochaines étapes après publication</span>
                        <span class="lang-content en">📢 Next steps after publication</span>
                    </h4>
                    <ol style="margin-left: 20px; font-size: 14px;">
                        <li>
                            <span class="lang-content fr active">Les transporteurs recevront votre demande instantanément</span>
                            <span class="lang-content en">Carriers will receive your request instantly</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Vous recevrez des offres dans les 24h</span>
                            <span class="lang-content en">You will receive offers within 24h</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Choisissez l'offre qui vous convient le mieux</span>
                            <span class="lang-content en">Choose the offer that suits you best</span>
                        </li>
                        <li>
                            <span class="lang-content fr active">Payez uniquement après acceptation de l'offre</span>
                            <span class="lang-content en">Pay only after accepting the offer</span>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="previousStep()">
                    <span class="lang-content fr active">← Retour</span>
                    <span class="lang-content en">← Back</span>
                </button>
                <button class="btn btn-primary" onclick="nextStep()" id="nextBtn">
                    <span class="lang-content fr active">Continuer →</span>
                    <span class="lang-content en">Continue →</span>
                </button>
            </div>

        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // Global state
    let currentStep = 1;
    const totalSteps = 7;
    let selectedBadges = [];
    let selectedCategories = [];
    let selectedSubcategories = {};
    let selectedBudgetOption = null;
    let selectedVehicle = null;
    let selectedPaymentMethod = null;
    let suggestedBudget = 85;
    let packageCount = 1;

    // Subcategories data for cotransport
    const subcategoriesData = {
        'documents': {
            'fr': ['Passeports', 'Diplômes', 'Contrats', 'Factures', 'Documents administratifs', 'Livres', 'Magazines', 'Archives'],
            'en': ['Passports', 'Diplomas', 'Contracts', 'Invoices', 'Administrative documents', 'Books', 'Magazines', 'Archives']
        },
        'furniture': {
            'fr': ['Canapés', 'Tables', 'Chaises', 'Armoires', 'Lits', 'Bureaux', 'Étagères', 'Commodes', 'Matelas'],
            'en': ['Sofas', 'Tables', 'Chairs', 'Wardrobes', 'Beds', 'Desks', 'Shelves', 'Dressers', 'Mattresses']
        },
        'appliances': {
            'fr': ['Réfrigérateur', 'Lave-linge', 'Lave-vaisselle', 'Four', 'Micro-ondes', 'Télévision', 'Aspirateur', 'Climatiseur'],
            'en': ['Refrigerator', 'Washing machine', 'Dishwasher', 'Oven', 'Microwave', 'Television', 'Vacuum cleaner', 'Air conditioner']
        },
        'boxes': {
            'fr': ['Cartons standards', 'Cartons livre', 'Cartons vaisselle', 'Cartons vêtements', 'Cartons fragile', 'Valises'],
            'en': ['Standard boxes', 'Book boxes', 'Dish boxes', 'Clothing boxes', 'Fragile boxes', 'Suitcases']
        },
        'sports': {
            'fr': ['Vélos', 'Skis', 'Planches de surf', 'Équipement de gym', 'Trottinettes', 'Matériel de camping', 'Kayak'],
            'en': ['Bikes', 'Skis', 'Surfboards', 'Gym equipment', 'Scooters', 'Camping gear', 'Kayak']
        },
        'other': {
            'fr': ['Outils', 'Matériaux de construction', 'Pièces détachées', 'Instruments de musique', 'Œuvres d\'art', 'Plantes'],
            'en': ['Tools', 'Building materials', 'Spare parts', 'Musical instruments', 'Artworks', 'Plants']
        }
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
        calculateShippingPrice();
    });

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

    // Toggle category
    function toggleCategory(element, categoryId) {
        element.classList.toggle('selected');
        const categoryName = element.querySelector('.category-name .lang-content.active').textContent.trim();

        if (element.classList.contains('selected')) {
            selectedCategories.push(categoryName);
            showSubcategories(categoryId);
        } else {
            selectedCategories = selectedCategories.filter(c => c !== categoryId);
            hideSubcategories(categoryId);
        }
        document.getElementById("selectedCategories").value = JSON.stringify(selectedCategories);

    }

    // Show subcategories
    function showSubcategories(categoryId) {
        const container = document.getElementById('subcategoriesContainer');
        if (!container || !subcategoriesData[categoryId]) return;

        const lang = localStorage.getItem('preferredLanguage') || 'fr';
        const subcategories = subcategoriesData[categoryId][lang] || subcategoriesData[categoryId]['fr'];

        const existingPanel = document.getElementById(`sub-${categoryId}`);
        if (existingPanel) {
            existingPanel.remove();
            return;
        }

        const panelHTML = `
                <div class="subcategories-panel" id="sub-${categoryId}">
                    <div class="subcategories-title">
                        ${lang === 'fr' ? 'Précisez les sous-catégories pour ' : 'Specify subcategories for '} ${categoryId}:
                    </div>
                    <div class="subcategories-grid">
                        ${subcategories.map(sub => `
                            <div class="subcategory-item" onclick="toggleSubcategory(this, '${categoryId}', '${sub}')">
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
        const panel = document.getElementById(`sub-${categoryId}`);
        if (panel) {
            panel.remove();
        }
        delete selectedSubcategories[categoryId];
    }

    // Toggle subcategory
    function toggleSubcategory(element, categoryId, subcategory) {
        element.classList.toggle('selected');

        if (!selectedSubcategories[categoryId]) {
            selectedSubcategories[categoryId] = [];
        }

        if (element.classList.contains('selected')) {
            if (!selectedSubcategories[categoryId].includes(subcategory)) {
                selectedSubcategories[categoryId].push(subcategory);
                console.log("➕ Added:", subcategory, "to", categoryId);
            }
        } else {
            selectedSubcategories[categoryId] = selectedSubcategories[categoryId].filter(s => s !== subcategory);

            selectedSubcategories[categoryId] = selectedSubcategories[categoryId].filter(s => s !== subcategory);
            console.log("➖ Removed:", subcategory, "from", categoryId);

            if (selectedSubcategories[categoryId].length === 0) {
                delete selectedSubcategories[categoryId];
                console.log("🗑️ Removed empty category:", categoryId);
            }
        }

        const hidden = document.getElementById("selectedSubcategories");
        hidden.value = JSON.stringify(selectedSubcategories);
        console.log("📥 Updated hidden input:", hidden.value);
    }

    document.addEventListener('input', function(e) {
        if (e.target.closest('#dimensionsList .dimension-item')) {
            buildPackagesJSON();
        }
    });

    function buildPackagesJSON() {
        const packages = [];
        let totalWeight = 0;
        let totalVolume = 0;
        document.querySelectorAll('#dimensionsList .dimension-item').forEach(item => {
            const length = item.querySelector('input[name="length"]').value;
            const width  = item.querySelector('input[name="width"]').value;
            const height = item.querySelector('input[name="height"]').value;
            const weight = item.querySelector('input[name="weight"]').value;

            totalWeight += parseFloat(weight);
            totalVolume += parseFloat(length) * parseFloat(width) * parseFloat(height); // cm³

            console.log(totalVolume);
            console.log(totalWeight);

            packages.push({
                length: parseFloat(length) || 0,
                width: parseFloat(width) || 0,
                height: parseFloat(height) || 0,
                weight: parseFloat(weight) || 0
            });
        });

        document.getElementById('packages_json').value = JSON.stringify(packages);
        document.getElementById('simWeight').value = totalWeight;
        document.getElementById('simVolume').value = totalVolume;
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

    // Calculate shipping price
    function calculateShippingPrice() {
        const distance = parseFloat(document.getElementById('simDistance')?.value) || 100;
        const weight = parseFloat(document.getElementById('simWeight')?.value) || 20;
        const volume = parseFloat(document.getElementById('simVolume')?.value) || 0.5;
        const transportType = document.getElementById('transportType')?.value || 'cotransport';
        const urgency = document.getElementById('urgency')?.value || 'flexible';

        // Base price calculation
        let basePrice = 30;

        // Transport type multipliers
        const transportMultipliers = {
            'cotransport': 1,
            'dedicated': 2.5,
            'groupage': 1.3
        };

        // Distance cost
        let distanceCost = distance * 0.2;

        // Weight/Volume cost (use the higher)
        let weightCost = weight * 0.8;
        let volumeCost = volume * 40;
        let weightVolumeCost = Math.max(weightCost, volumeCost);

        // Urgency multipliers
        const urgencyMultipliers = {
            'flexible': 1,
            'normal': 1.2,
            'express': 1.5,
            'urgent': 2
        };

        // Additional services
        let additionalServices = 0;
        if (document.getElementById('homePickup')?.checked) additionalServices += 10;
        if (document.getElementById('homeDelivery')?.checked) additionalServices += 10;
        if (document.getElementById('needHelp')?.checked) additionalServices += 15;

        // Calculate subtotal
        let subtotal = (basePrice + distanceCost + weightVolumeCost) * transportMultipliers[transportType] * urgencyMultipliers[urgency];
        subtotal += additionalServices;

        // Commission
        const commissionRate = subtotal > 100 ? 0.20 : 0.15;
        const commission = subtotal * commissionRate;

        // Transaction fees (average 1.5% if no method selected)
        const transactionFeeRate = selectedPaymentMethod ? getTransactionFeeRate(selectedPaymentMethod) : 0.015;
        const transactionFees = subtotal * transactionFeeRate;

        suggestedBudget = Math.round(subtotal + commission + transactionFees);

        // Update displays
        document.getElementById('suggestedBudget').textContent = suggestedBudget + '€';
        document.getElementById('suggestedBudgetOption').textContent = suggestedBudget + '€';

        // Update price range
        const minPrice = Math.round(suggestedBudget * 0.8);
        const maxPrice = Math.round(suggestedBudget * 1.2);
        const lang = localStorage.getItem('preferredLanguage') || 'fr';
        document.getElementById('priceRange').innerHTML = lang === 'fr' ?
            `Fourchette: ${minPrice}€ - ${maxPrice}€` :
            `Range: €${minPrice} - €${maxPrice}`;

        // Update breakdown
        document.getElementById('baseTransport').textContent = Math.round(basePrice * transportMultipliers[transportType]) + '€';
        document.getElementById('distanceCost').textContent = '+' + Math.round(distanceCost) + '€';
        document.getElementById('weightVolumeCost').textContent = '+' + Math.round(weightVolumeCost) + '€';
        document.getElementById('urgencyCost').textContent = urgencyMultipliers[urgency] > 1 ?
            '+' + Math.round(subtotal * (urgencyMultipliers[urgency] - 1)) + '€' :
            '+0€';
        document.getElementById('additionalServices').textContent = '+' + additionalServices + '€';
        document.getElementById('platformCommission').textContent = (commissionRate * 100) + '%';

        // Add transaction fees to breakdown
        const simTransactionFeesElement = document.getElementById('simTransactionFees');
        if (simTransactionFeesElement) {
            simTransactionFeesElement.textContent = Math.round(transactionFees * 10) / 10 + '€';
        }

        document.getElementById('totalCost').textContent = suggestedBudget + '€';
        document.getElementById('jeconfiePrice').textContent = suggestedBudget + '€';
        document.getElementById("suggested_fare").value = suggestedBudget;
    }

    // Select budget option
    function selectBudgetOption(element, option) {
        document.querySelectorAll('.price-option').forEach(opt => {
            opt.classList.remove('selected');
        });
        element.classList.add('selected');
        selectedBudgetOption = option;

        document.getElementById('budget_option').value = option;

        const customInput = document.getElementById('customBudgetInput');
        if (option === 'custom') {
            customInput.classList.add('active');
        } else {
            customInput.classList.remove('active');
        }
    }

    // Select vehicle
    function selectVehicle(element, type) {
        document.querySelectorAll('.vehicle-type').forEach(v => {
            v.classList.remove('selected');
        });
        element.classList.add('selected');
        selectedVehicle = type;

        document.getElementById('vehicle_type_needed').value = type;
    }

    // Select payment method
    function selectPaymentMethod(element, method) {
        // Remove selection from all methods
        document.querySelectorAll('[onclick^="selectPaymentMethod"]').forEach(el => {
            el.style.borderColor = 'var(--border)';
            el.style.background = 'white';
        });

        // Select current method
        element.style.borderColor = 'var(--secondary)';
        element.style.background = 'linear-gradient(135deg, #f0f9ff, #e0f2fe)';
        selectedPaymentMethod = method;

        // Show payment form
        document.getElementById('paymentForm').style.display = 'block';
        document.getElementById('payment_method').value = method;

        // Update transaction fees
        updateTransactionFees(method);
    }

    // Update transaction fees based on payment method
    function updateTransactionFees(method) {
        const fees = {
            'visa': 0.014,
            'mastercard': 0.014,
            'cb': 0.012,
            'amex': 0.025,
            'applepay': 0.015,
            'googlepay': 0.015,
            'paypal': 0.029,
            'bank': 0
        };

        const budget = parseFloat(document.getElementById('finalBudget')?.textContent) || suggestedBudget;
        const transactionFee = budget * (fees[method] || 0.015);

        document.getElementById('transactionFees').textContent = Math.round(transactionFee * 10) / 10 + '€';

        // Update total
        const insurance = document.getElementById('insurance')?.value || 'standard';
        let insuranceCost = insurance === 'standard' ? 10 : insurance === 'premium' ? 25 : 0;
        const total = budget + insuranceCost + transactionFee;

        document.getElementById('totalMaximum').textContent = Math.round(total * 10) / 10 + '€';
    }

    // Navigation
    function nextStep() {
        const eventObj = window.event;
        if (eventObj) eventObj.preventDefault();
        if (validateStep(currentStep)) {
            if (currentStep < totalSteps) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep++;
                document.getElementById(`step${currentStep}`).classList.add('active');
                updateProgress();

                if (currentStep === 4) {
                    calculateShippingPrice();
                } else if (currentStep === 6) {
                    generateSummary();
                }
            }
            else {
                // Validate and submit
                if (validateFinalStep()) {
                    submitRequest();
                }
            }
        }
    }

    function previousStep() {
        const eventObj = window.event;
        if (eventObj) eventObj.preventDefault();
        if (currentStep > 1) {
            document.getElementById(`step${currentStep}`).classList.remove('active');
            currentStep--;
            document.getElementById(`step${currentStep}`).classList.add('active');
            updateProgress();
        }
    }

    function updateProgress() {
        const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
        document.getElementById('progressLine').style.width = `${progress}%`;

        // Update step indicators
        document.querySelectorAll('.step').forEach((step, index) => {
            if (index < currentStep - 1) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (index === currentStep - 1) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('active', 'completed');
            }
        });

        // Update button text
        const btn = document.getElementById('nextBtn');
        if (currentStep === totalSteps) {
            btn.innerHTML = '✅ Publier la demande';
            btn.classList.add('btn-success');
        } else {
            const lang = localStorage.getItem('preferredLanguage') || 'fr';
            btn.innerHTML = lang === 'fr' ? 'Continuer →' : 'Continue →';
            btn.classList.remove('btn-success');
        }
    }

    function validateStep(step) {
        const lang = localStorage.getItem('preferredLanguage') || 'fr';

        switch(step) {
            case 1: // Package validation
                if (selectedCategories.length === 0) {
                    showError(lang === 'fr' ? 'Veuillez sélectionner au moins un type de colis' : 'Please select at least one package type');
                    return false;
                }
                const description = document.getElementById('packageDescription')?.value;
                if (!description || description.length < 10) {
                    showError(lang === 'fr' ? 'Veuillez décrire votre envoi (min. 10 caractères)' : 'Please describe your shipment (min. 10 characters)');
                    return false;
                }
                const packageValue = document.getElementById('packageValue')?.value;
                if (!packageValue || packageValue < 1) {
                    showError(lang === 'fr' ? 'Veuillez indiquer la valeur de votre envoi' : 'Please indicate the value of your shipment');
                    return false;
                }
                // Check dimensions
                const dimensions = document.querySelectorAll('#dimensionsList input[required]');
                for (let input of dimensions) {
                    if (!input.value) {
                        showError(lang === 'fr' ? 'Veuillez remplir toutes les dimensions des colis' : 'Please fill in all package dimensions');
                        return false;
                    }
                }
                break;

            case 2: // Route validation
                const pickupCity = document.getElementById('pickupCity')?.value;
                const deliveryCity = document.getElementById('deliveryCity')?.value;
                const pickupDate = document.getElementById('pickupDate')?.value;
                const deliveryDate = document.getElementById('deliveryDate')?.value;

                if (!pickupCity || !deliveryCity) {
                    showError(lang === 'fr' ? 'Veuillez remplir les villes de départ et d\'arrivée' : 'Please fill in pickup and delivery cities');
                    return false;
                }
                if (!pickupDate || !deliveryDate) {
                    showError(lang === 'fr' ? 'Veuillez remplir les dates souhaitées' : 'Please fill in desired dates');
                    return false;
                }
                // Check if dates are in the future
                if (new Date(pickupDate) <= new Date()) {
                    showError(lang === 'fr' ? 'La date de prise en charge doit être dans le futur' : 'Pickup date must be in the future');
                    return false;
                }
                break;

            case 3: // Recipient validation
                const recipientName = document.getElementById('recipientName')?.value;
                const recipientPhone = document.getElementById('recipientPhone')?.value;

                if (!recipientName) {
                    showError(lang === 'fr' ? 'Veuillez indiquer le nom du destinataire' : 'Please provide recipient name');
                    return false;
                }
                if (!recipientPhone) {
                    showError(lang === 'fr' ? 'Veuillez indiquer le téléphone du destinataire' : 'Please provide recipient phone');
                    return false;
                }
                break;

            case 4: // Requirements - optional, no validation needed
                break;

            case 6: // Budget validation
                if (!selectedBudgetOption) {
                    showError(lang === 'fr' ? 'Veuillez choisir une option de budget' : 'Please choose a budget option');
                    return false;
                }
                if (selectedBudgetOption === 'custom') {
                    const customBudget = document.getElementById('customBudget')?.value;
                    if (!customBudget || customBudget < 1) {
                        showError(lang === 'fr' ? 'Veuillez entrer un budget valide' : 'Please enter a valid budget');
                        return false;
                    }
                }
                break;
        }

        return true;
    }

    function validateFinalStep() {
        const lang = localStorage.getItem('preferredLanguage') || 'fr';

        // Check expiration date
        const expiration = document.getElementById('requestExpiration')?.value;
        if (!expiration) {
            showError(lang === 'fr' ? 'Veuillez définir une date d\'expiration pour la demande' : 'Please set an expiration date for the request');
            return false;
        }

        // Check if expiration is in the future
        if (new Date(expiration) <= new Date()) {
            showError(lang === 'fr' ? 'La date d\'expiration doit être dans le futur' : 'Expiration date must be in the future');
            return false;
        }

        // Check payment method
        if (!selectedPaymentMethod) {
            showError(lang === 'fr' ? 'Veuillez choisir un mode de paiement' : 'Please choose a payment method');
            return false;
        }

        // Check cardholder info
        const cardholderName = document.getElementById('cardholderName')?.value;
        const billingEmail = document.getElementById('billingEmail')?.value;
        if (!cardholderName || !billingEmail) {
            showError(lang === 'fr' ? 'Veuillez remplir les informations de paiement' : 'Please fill in payment information');
            return false;
        }

        // Check terms acceptance
        if (!document.getElementById('acceptTerms')?.checked) {
            showError(lang === 'fr' ? 'Veuillez accepter les conditions générales' : 'Please accept the terms and conditions');
            return false;
        }

        return true;
    }

    function showError(message) {
        // Create or update error message
        let errorDiv = document.getElementById('validationError');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.id = 'validationError';
            errorDiv.style.cssText = `
                    position: fixed;
                    top: 100px;
                    right: 20px;
                    background: #fee2e2;
                    color: #991b1b;
                    padding: 16px 24px;
                    border-radius: 12px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                    max-width: 400px;
                `;
            document.body.appendChild(errorDiv);
        }

        errorDiv.textContent = '⚠️ ' + message;

        // Auto-hide after 5 seconds
        setTimeout(() => {
            if (errorDiv) {
                errorDiv.remove();
            }
        }, 5000);
    }

    async function submitRequest() {
        const eventObj = window.event;
        if (eventObj) eventObj.preventDefault();

        const lang = localStorage.getItem('preferredLanguage') || 'fr';
        const form = document.getElementById('create_offer_form');
        const formData = new FormData(form);
        const url = form.action;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok || data.status === 'error') {
                console.warn("❌ Validation errors:", data.errors);

                const errorDiv = document.createElement('div');
                errorDiv.style.cssText = `
                        position: fixed;
                        top: 100px;
                        right: 20px;
                        background: #fee2e2;
                        color: #991b1b;
                        padding: 16px 24px;
                        border-radius: 12px;
                        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                        z-index: 9999;
                        animation: slideIn 0.3s ease;
                        max-width: 400px;
                    `;

                // Convert Laravel error bag to readable HTML list
                const errorMessages = Object.values(data.errors || {})
                    .flat()
                    .map(msg => `<li>${msg}</li>`)
                    .join('');

                errorDiv.innerHTML = `
                <strong>${lang === 'fr' ? '❌ Erreurs de validation :' : '❌ Validation errors:'}</strong>
                <ul>${errorMessages}</ul>
            `;
                document.body.appendChild(errorDiv);
                setTimeout(() => errorDiv.remove(), 6000);
                return;
            }

            console.log("✅ Success:", data);

            // ✅ Success Toast
            const successDiv = document.createElement('div');
            successDiv.style.cssText = `
                    position: fixed;
                    top: 100px;
                    right: 20px;
                    background: #d1fae5;
                    color: #065f46;
                    padding: 16px 24px;
                    border-radius: 12px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                    max-width: 400px;
                `;
            successDiv.innerHTML = lang === 'fr'
                ? '✅ Demande publiée avec succès !<br>📧 Une facture a été envoyée à votre email.<br>⏰ Les transporteurs vont vous contacter sous 24h.'
                : '✅ Request published successfully!<br>📧 An invoice has been sent to your email.<br>⏰ Carriers will contact you within 24h.';
            document.body.appendChild(successDiv);

            // Redirect after 4s
            setTimeout(() => {
                window.location.href = '/';
            }, 4000);

        } catch (error) {
            console.error("❌ Error:", error);
            const errorDiv = document.createElement('div');
            errorDiv.style.cssText = `
                    position: fixed;
                    top: 100px;
                    right: 20px;
                    background: #fee2e2;
                    color: #991b1b;
                    padding: 16px 24px;
                    border-radius: 12px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                    max-width: 400px;
                `;
            errorDiv.innerHTML = lang === 'fr'
                ? '❌ Une erreur est survenue. Veuillez réessayer.'
                : '❌ An error occurred. Please try again.';
            document.body.appendChild(errorDiv);
            setTimeout(() => errorDiv.remove(), 4000);
        }
    }

    function showErrorToast(lang) {
        const errorDiv = document.createElement('div');
        errorDiv.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: #fee2e2;
                color: #991b1b;
                padding: 16px 24px;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                z-index: 9999;
                animation: slideIn 0.3s ease;
                max-width: 400px;
            `;
        errorDiv.innerHTML = lang === 'fr'
            ? '❌ Une erreur est survenue. Veuillez réessayer.'
            : '❌ An error occurred. Please try again.';
        document.body.appendChild(errorDiv);

        setTimeout(() => errorDiv.remove(), 4000);
    }

    function generateSummary() {
        const finalBudget = selectedBudgetOption === 'custom' ?
            document.getElementById('customBudget')?.value || suggestedBudget :
            suggestedBudget;
        const commissionRate = finalBudget > 100 ? 0.20 : 0.15;
        const commission = Math.round(finalBudget * commissionRate);
        const insurance = document.getElementById('insurance')?.value || 'standard';
        let insuranceCost = 0;
        let insuranceText = '';

        switch(insurance) {
            case 'basic':
                insuranceText = 'Basique (250€) - Inclus';
                break;
            case 'standard':
                insuranceText = 'Standard (1000€) +10€';
                insuranceCost = 10;
                break;
            case 'premium':
                insuranceText = 'Premium (5000€) +25€';
                insuranceCost = 25;
                break;
        }

        // Calculate transaction fees (average 1.5% if no method selected yet)
        const transactionFeeRate = selectedPaymentMethod ? getTransactionFeeRate(selectedPaymentMethod) : 0.015;
        const transactionFees = finalBudget * transactionFeeRate;
        const total = parseFloat(finalBudget) + insuranceCost + transactionFees;

        // Update financial display
        document.getElementById('finalBudget').textContent = finalBudget + '€';
        document.getElementById('finalCommissionRate').textContent = (commissionRate * 100) + '%';
        document.getElementById('commissionAmount').textContent = commission + '€';
        document.getElementById('finalInsurance').textContent = insuranceText;
        document.getElementById('transactionFees').textContent = Math.round(transactionFees * 10) / 10 + '€';
        document.getElementById('totalMaximum').textContent = Math.round(total * 10) / 10 + '€';

        // Generate summary content
        const summary = document.getElementById('requestSummary');
        if (summary) {
            const badges = selectedBadges.map(b => {
                switch(b) {
                    case 'urgent': return '🚨 URGENT';
                    case 'professional': return '💼 Professionnel';
                    case 'personal': return '👤 Particulier';
                    default: return b;
                }
            }).join(', ');

            const expiration = document.getElementById('pickupDate')?.value || 'À définir';

            summary.innerHTML = `
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            ${badges ? `<p><strong>Type:</strong> ${badges}</p>` : ''}
                            <p><strong>Colis:</strong> ${selectedCategories.join(', ') || 'Non défini'}</p>
                            <p><strong>Nombre de colis:</strong> ${packageCount}</p>
                            <p><strong>Valeur déclarée:</strong> ${document.getElementById('packageValue')?.value || '0'}€</p>
                        </div>
                        <div>
                            <p><strong>Trajet:</strong> ${document.getElementById('pickupCity')?.value || 'Départ'} → ${document.getElementById('deliveryCity')?.value || 'Arrivée'}</p>
                            <p><strong>Date souhaitée:</strong> ${document.getElementById('pickupDate')?.value || 'À définir'}</p>
                            <p><strong>Expiration demande:</strong> ${expiration}</p>
                        </div>
                    </div>
                    <hr style="margin: 16px 0; border: none; border-top: 1px solid var(--border);">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <p><strong>Budget maximum:</strong> ${finalBudget}€</p>
                            <p><strong>Véhicule recherché:</strong> ${selectedVehicle || 'Peu importe'}</p>
                        </div>
                        <div>
                            <p><strong>Commission plateforme:</strong> ${(commissionRate * 100)}%</p>
                            <p><strong>Total maximum:</strong> ${Math.round(total * 10) / 10}€</p>
                        </div>
                    </div>
                `;
        }
    }

    // Get transaction fee rate based on payment method
    function getTransactionFeeRate(method) {
        const fees = {
            'visa': 0.014,
            'mastercard': 0.014,
            'cb': 0.012,
            'amex': 0.025,
            'applepay': 0.015,
            'googlepay': 0.015,
            'paypal': 0.029,
            'bank': 0
        };
        return fees[method] || 0.015;
    }
</script>

<script>

    document.addEventListener('DOMContentLoaded', function() {

        const pickup_date = document.getElementById("pickupDate");
        const delivery_date = document.getElementById("deliveryDate");
        const today = flatpickr.formatDate(new Date(), "Y-m-d");

        let pendingDate = today;
        let confirmedDate = today;
        pickup_date.value = today;
        delivery_date.value = today;

        flatpickr("#pickupDate", {
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
        flatpickr("#deliveryDate", {
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
        flatpickr("#requestExpiration", {
            enableTime: true,
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

        $('#timeSlot').select2({
            width: '100%'
        });
        $('#urgency').select2({
            width: '100%'
        });
        $('#insurance').select2({
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

        },
        error => {
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

                    if (types.includes("locality")) {
                        city = component.long_name;
                        document.getElementById("pickupCity").value = city;
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

                    if (types.includes("locality")) {
                        city = component.long_name;
                        document.getElementById("deliveryCity").value = city;
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
                const fare = distanceInKm * 2;
                console.log(`Total Driving Distance: ${distanceInKm} km`);
                document.getElementById("distance").value = `${distanceInKm}`;
                document.getElementById("simDistance").value = `${distanceInKm}`;
            } else {
                console.error('Directions request failed due to ', status);
            }
        });
    }

    // Requirement Toggle Function
    function toggleRequirement(element, event) {
        // Prevent the click from bubbling to child elements
        if (event && event.target.classList.contains('level-select')) {
            return;
        }

        element.classList.toggle('selected');
        const requirementLevel = element.querySelector('.requirement-level');
        const hiddenInput = element.querySelector('input[type="hidden"]');

        if (element.classList.contains('selected')) {
            requirementLevel.style.display = 'block';
            hiddenInput.value = '1';
        } else {
            requirementLevel.style.display = 'none';
            hiddenInput.value = '0';
        }
    }

    // Image Upload Functionality
    const uploadArea = document.getElementById('uploadArea');
    const imageInput = document.getElementById('imageInput');
    const imagePreviews = document.getElementById('imagePreviews');
    let selectedFiles = [];

    if (uploadArea && imageInput) {
        uploadArea.addEventListener('click', () => {
            imageInput.click();
        });

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('drag-over');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('drag-over');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('drag-over');
            const files = Array.from(e.dataTransfer.files);
            handleFiles(files);
        });

        imageInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            handleFiles(files);
        });
    }

    function handleFiles(files) {
        files.forEach(file => {
            if (file.type.startsWith('image/') && file.size <= 10 * 1024 * 1024) { // 10MB limit
                selectedFiles.push(file);
                displayImagePreview(file);
            } else if (file.size > 10 * 1024 * 1024) {
                const lang = localStorage.getItem('preferredLanguage') || 'fr';
                showError(lang === 'fr' ?
                    `Le fichier ${file.name} est trop volumineux (max 10MB)` :
                    `File ${file.name} is too large (max 10MB)`
                );
            }
        });
        updateFileInput();
    }

    function displayImagePreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const previewDiv = document.createElement('div');
            previewDiv.className = 'image-preview';

            const img = document.createElement('img');
            img.src = e.target.result;

            const removeBtn = document.createElement('button');
            removeBtn.className = 'remove-image';
            removeBtn.innerHTML = '×';
            removeBtn.type = 'button';
            removeBtn.onclick = (event) => {
                event.preventDefault();
                const index = selectedFiles.indexOf(file);
                if (index > -1) {
                    selectedFiles.splice(index, 1);
                }
                previewDiv.remove();
                updateFileInput();
            };

            previewDiv.appendChild(img);
            previewDiv.appendChild(removeBtn);
            if (imagePreviews) {
                imagePreviews.appendChild(previewDiv);
            }
        };
        reader.readAsDataURL(file);
    }

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => {
            dataTransfer.items.add(file);
        });
        if (imageInput) {
            imageInput.files = dataTransfer.files;
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>
</body>
</html>
