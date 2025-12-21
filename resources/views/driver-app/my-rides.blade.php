<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes envois - Je confie</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8fafc;
            color: #1a1a1a;
        }

        /* Variables */
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

        /* Container */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Header */
        .page-header {
            background: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark);
        }

        .add-btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, var(--secondary), var(--eco-green));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(6, 182, 212, 0.3);
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            gap: 12px;
            padding: 20px 0;
            border-bottom: 1px solid var(--border);
        }

        .filter-tab {
            padding: 10px 20px;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 100px;
            font-weight: 600;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-tab.active {
            background: var(--secondary);
            color: white;
            border-color: var(--secondary);
        }

        /* Shipment Cards Grid */
        .shipments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 24px;
            margin-top: 32px;
        }

        .shipment-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            cursor: pointer;
        }

        .shipment-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .shipment-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .status-searching {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .status-transit {
            background: rgba(6, 182, 212, 0.1);
            color: var(--secondary);
        }

        .status-delivered {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .shipment-route {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .shipment-location {
            font-weight: 600;
            color: var(--dark);
            font-size: 18px;
        }

        .shipment-arrow {
            color: var(--gray);
        }

        .shipment-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }

        .shipment-detail {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray);
            font-size: 14px;
        }

        .shipment-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .action-btn {
            flex: 1;
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .action-btn:hover {
            background: var(--light);
            border-color: var(--secondary);
            color: var(--secondary);
        }

        .action-btn.primary {
            background: var(--secondary);
            color: white;
            border-color: var(--secondary);
        }

        .action-btn.primary:hover {
            background: var(--primary-dark);
        }

        /* Stats Summary */
        .stats-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-box {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 8px;
        }

        .stat-label {
            color: var(--gray);
            font-size: 14px;
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .lang-btn {
            padding: 8px 16px;
            border: none;
            background: transparent;
            border-radius: 100px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .lang-btn.active {
            background: var(--secondary);
            color: white;
        }

        /* Back Button */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            margin-bottom: 20px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 8px;
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: var(--light);
            border-color: var(--secondary);
            color: var(--secondary);
        }

        @media (max-width: 768px) {
            .shipments-grid {
                grid-template-columns: 1fr;
            }

            .shipment-details {
                grid-template-columns: 1fr;
            }

            .stats-summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

@php
    $icons = [
                                                'pedestrian' => '🚶',
                                                'Car' => '🚗',
                                                'Taxi / VTC' => '🚕',
                                                'bus' => '🚌',
                                                'coach' => '🚐',
                                                'Van' => '🚐',
                                                'bicycle' => '🚲',
                                                'motorcycle' => '🛵',
                                                'Truck' => '🚜',
                                                '4×4' => '🚙',
                                                'plane' => '✈️',
                                                'Helicopter' => '🚁',
                                                'Ferry/cruise ship' => '🚢',
                                                'Cargo/cargo ship' => '⛴️',
                                                'Speedboat' => '🚤',
                                                'Kayak/canoe' => '🛶',
                                                'train' => '🚆',
                                                'TGV' => '🚄',
                                                'Tram' => '🚈',
                                                'Metro' => '🚇',
                                            ];
@endphp

    <!-- Language Switcher -->
<div class="lang-switcher">
    <button class="lang-btn active" onclick="switchLanguage('fr')">FR</button>
    <button class="lang-btn" onclick="switchLanguage('en')">EN</button>
</div>

<div class="container">
    <!-- Back Button -->
    <a href="{{ url('driver/dashboard') }}" class="back-btn">
        <span>←</span>
        <span class="lang-content fr active">Retour au tableau de bord</span>
        <span class="lang-content en">Back to dashboard</span>
    </a>

    <!-- Page Header -->
    <div class="page-header">
        <div class="header-top">
            <h1 class="page-title">
                <span class="lang-content fr active">Mes envois</span>
                <span class="lang-content en">My shipments</span>
            </h1>
            <button class="add-btn">
                <span class="lang-content fr active">+ Nouvel envoi</span>
                <span class="lang-content en">+ New shipment</span>
            </button>
        </div>

        <!-- Stats Summary -->
        <div class="stats-summary">
            <div class="stat-box">
                <div class="stat-value">{{ count($pending_offers) }}</div>
                <div class="stat-label">
                    <span class="lang-content fr active">En recherche</span>
                    <span class="lang-content en">Searching</span>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-value">{{ count($pending_rides) + count($active_rides) }}</div>
                <div class="stat-label">
                    <span class="lang-content fr active">En transit</span>
                    <span class="lang-content en">In transit</span>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-value">{{ count($completed_rides) }}</div>
                <div class="stat-label">
                    <span class="lang-content fr active">Livrés</span>
                    <span class="lang-content en">Delivered</span>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-value">€785</div>
                <div class="stat-label">
                    <span class="lang-content fr active">Économies totales</span>
                    <span class="lang-content en">Total savings</span>
                </div>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <button class="filter-tab active" onclick="filterShipments('all',event)">
                <span class="lang-content fr active">Tous</span>
                <span class="lang-content en">All</span>
            </button>
            <button class="filter-tab" onclick="filterShipments('in-progress', event)">
                <span class="lang-content fr active">In Progress</span>
                <span class="lang-content en">In Progress</span>
                <span class="filter-count">{{ count($active_rides) }}</span>
            </button>
            <button class="filter-tab" onclick="filterShipments('accepted', event)">
                <span class="lang-content fr active">Accepted</span>
                <span class="lang-content en">Accepted</span>
                <span class="filter-count">{{ count($pending_rides) }}</span>
            </button>
            <button class="filter-tab" onclick="filterShipments('on_hold', event)">
                <span class="lang-content fr active">En recherche</span>
                <span class="lang-content en">Searching</span>
                <span class="filter-count">{{ count($pending_offers) }}</span>
            </button>
            <button class="filter-tab" onclick="filterShipments('finished', event)">
                <span class="lang-content fr active">Finished</span>
                <span class="lang-content en">Finished</span>
                <span class="filter-count">{{ count($completed_rides) }}</span>
            </button>
            <button class="filter-tab" onclick="filterShipments('cancelled', event)">
                <span class="lang-content fr active">Cancelled</span>
                <span class="lang-content en">Cancelled</span>
                <span class="filter-count">{{ count($cancelled_rides) }}</span>
            </button>
        </div>
    </div>

    <!-- Shipments Grid -->
    <div class="shipments-grid">

        <!-- Shipment Card 2 - In Transit -->
        @foreach($active_rides as $ride)
            @php
                $message = $ride->message;
                $badgeClass = 'badge'; // base class
                $badgeText = '';

                switch ($message) {
                    case 'On the way to pickup':
                        $badgeClass .= ' badge-success'; // yellow
                        $badgeText = 'On the way to pickup';
                        break;
                    case 'delivery in progress':
                        $badgeClass .= ' badge-success'; // blue
                        $badgeText = 'Package Being Delivered';
                        break;
                        case 'Parcel returned':
                        $badgeClass .= ' badge-success'; // blue
                        $badgeText = 'Parcel returned';
                        break;
                        case 'transport completed awaiting validation':
                        $badgeClass .= ' badge-success'; // blue
                        $badgeText = 'Transport Completed Awaiting Validation';
                        break;
                    case 'package delivered':
                        $badgeClass .= ' badge-success'; // green
                        $badgeText = 'Package Delivered';
                        break;
                    case 'finished':
                        $badgeClass .= ' badge-secondary'; // gray
                        $badgeText = 'Finished';
                        break;
                    default:
                        $badgeClass .= ' badge-light'; // fallback
                        $badgeText = ucfirst(str_replace('_', ' ', $message));
                        break;
                }
                $transportName = ucfirst(strtolower($ride->userriderequest->vehicle_type_needed ?? ''));
                $icon = $icons[$transportName] ?? '❓'; // default fallback
            @endphp
            <div class="shipment-card" data-status="in-progress">
                <span class="shipment-status status-transit">
                    <span class="lang-content fr active">{{ $icon }} {{ $badgeText }}</span>
                    <span class="lang-content en">{{ $icon }} {{ $badgeText }}</span>
                </span>
                <div class="shipment-route">
                    <span class="shipment-location">{{ $ride->pickup_city }}</span>
                    <span class="shipment-arrow">→</span>
                    <span class="shipment-location">{{ $ride->destination_city }}</span>
                </div>
                @php
                    $packages = json_decode($ride->userriderequest->packages_json, true);
                    $totalWeight = collect($packages)->sum('weight');
                @endphp
                <div class="shipment-details">
                    <div class="shipment-detail">📦 Documents</div>
                    <div class="shipment-detail">⚖️ {{ $totalWeight }}kg</div>
                    <div class="shipment-detail">
                        📅 {{ \Carbon\Carbon::parse($ride->date_and_time_of_followup)->translatedFormat('d F Y') }}</div>
                    <div class="shipment-detail">💰 €{{ $ride->fare }}</div>
                    <div class="shipment-detail">👤 {{ $ride->driver->firstName . ' ' . $ride->driver->lastName }}.
                    </div>
                    <div class="shipment-detail">📍 Calais (50%)</div>
                </div>

                @if(trim($ride->message) === 'Accepted, waiting for support')
                    <div class="shipment-actions">
                        <a href="{{ url('driver/track-ride/'. $ride->id) }}" class="action-btn"
                           style="color: black">
                            <span class="lang-content fr active">GPS navigation for Parcel
                        Pickup</span>
                            <span class="lang-content en">GPS navigation for Parcel
                        Pickup</span>
                        </a>
                        <a href="{{url('driver/start-ride/'.$ride->id)}}" class="action-btn"
                           style="color: black">
                            <span class="lang-content fr active">Start the Pickup of the Package</span>
                            <span class="lang-content en">Start the Pickup of the Package</span>
                        </a>
                    </div>
                @endif
                @if(trim($ride->message) === 'On the way to pickup')
                    <div class="shipment-actions">
                        <a href="{{ url('driver/track-ride/'. $ride->id) }}" class="action-btn"
                           style="color: black">
                            <span class="lang-content fr active">GPS navigation for Parcel
                        Pickup</span>
                            <span class="lang-content en">GPS navigation for Parcel
                        Pickup</span>
                        </a>
                        <a href="{{url('driver/start-delivery/'.$ride->id)}}" class="action-btn"
                           style="color: black">
                            <span class="lang-content fr active">Start the Delivery of the Package</span>
                            <span class="lang-content en">Start the Delivery of the Package</span>
                        </a>
                    </div>
                @endif
                @if(trim($ride->message) === 'delivery in progress')
                    <div class="shipment-actions">
                        <a href="{{ url('driver/track-ride/'. $active_ride->id) }}" class="action-btn"
                           style="color: black">
                            <span class="lang-content fr active">GPS navigation for Parcel
                        Delivery</span>
                            <span class="lang-content en">GPS navigation for Parcel
                        Delivery</span>
                        </a>
                        <a href="{{url('driver/ride-complete-request/'.$active_ride->id)}}" class="action-btn"
                           style="color: black">
                            <span class="lang-content fr active">Complete delivery</span>
                            <span class="lang-content en">Complete delivery</span>
                        </a>
                    </div>
                @endif

                @if($ride->status == 'carrier_cancelled_ride' || $ride->status == 'active')

                    @if($ride->message == 'Delivery in progress, parcel return requested' || $ride->message == 'Carrier Cancelled Ride' || $ride->message == 'User Cancelled Ride')
                        <div class="shipment-actions">
                            <a href="{{url('driver/start-parcel-return/'.$ride->id)}}" class="action-btn"
                               style="color: black">
                                <span class="lang-content fr active">Start Parcel Return</span>
                                <span class="lang-content en">Start Parcel Return</span>
                            </a>
                        </div>
                    @elseif($ride->message == "Package return in progress")
                        <div class="shipment-actions">
                            <a href="{{ url('driver/track-ride/'. $ride->id) }}" class="action-btn"
                               style="color: black">
                                <span class="lang-content fr active">GPS navigation for Parcel
                                                    Return</span>
                                <span class="lang-content en">GPS navigation for Parcel
                                                    Return</span>
                            </a>
                            <a href="{{url('driver/package-returned-request/'.$ride->id)}}" class="action-btn"
                               style="color: black">
                                <span class="lang-content fr active">Parcel Returned</span>
                                <span class="lang-content en">Parcel Returned</span>
                            </a>
                        </div>
                    @elseif($ride->message == 'Parcel returned')
                    @elseif(trim($ride->message) !== 'transport completed awaiting validation')
                        <div class="shipment-actions">
                            <form class="theme-form mt-0" action="{{url('driver/cancel-ride')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" class="offer_id" value="{{ $ride->id }}">
                                <input type="hidden" name="is_user_cancelled" value="false">
                                <button type="submit" class="action-btn" style="color: black">
                                    <span class="lang-content fr active">Cancel the Transport</span>
                                    <span class="lang-content en">Cancel the Transport</span>
                                </button>
                            </form>
                        </div>
                    @endif
                @endif
            </div>
        @endforeach

        <!-- Shipment Card 1 - Searching -->
        @foreach($pending_rides as $ride)
            <div class="shipment-card" data-status="accepted">
                <span class="shipment-status status-searching">
                    <span class="lang-content fr active">{{ $ride->message }}</span>
                    <span class="lang-content en">{{ $ride->message }}</span>
                </span>
                <div class="shipment-route">
                    <span class="shipment-location">{{ $ride->pickup_city }}</span>
                    <span class="shipment-arrow">→</span>
                    <span class="shipment-location">{{ $ride->destination_city }}</span>
                </div>
                @php
                    $packages = json_decode($ride->userriderequest->packages_json, true);
                    $totalWeight = collect($packages)->sum('weight');
                @endphp
                <div class="shipment-details">
                    <div class="shipment-detail">📦 Canapé 2 places</div>
                    <div class="shipment-detail">⚖️ ~{{ $totalWeight }}kg</div>
                    <div class="shipment-detail">
                        📅 {{ \Carbon\Carbon::parse($ride->date_and_time_of_followup)->translatedFormat('d F Y') }}</div>
                    <div class="shipment-detail">💰 Budget: €{{ $ride->fare }}</div>
                    <div class="shipment-detail">👁️ 3 offres reçues</div>
                    <div class="shipment-detail">
                        👤️ {{ $ride->driver->firstName . ' ' . $ride->driver->lastName }}</div>
                </div>
                <form class="theme-form mt-0" action="{{url('driver/cancel-ride')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id" value="{{ $ride->id }}">
                    <input type="hidden" name="is_user_cancelled" value="true">
                    <div class="shipment-actions">
                        <a href="{{url('user/ride-details?ride_id='.$ride->id)}}" class="action-btn"
                           style="color: black">
                            <span class="lang-content fr active">Details</span>
                            <span class="lang-content en">Details</span>
                        </a>
                        <button type="submit" class="action-btn primary">
                            <span class="lang-content fr active">Cancel the Transport</span>
                            <span class="lang-content en">Cancel the Transport</span>
                        </button>
                    </div>
                    <div class="shipment-actions">
                        <a href="{{ url('driver/start-ride/'.$ride->id) }}" class="action-btn" style="color: black">
                            <span class="lang-content fr active">Start the Collection of the Package</span>
                            <span class="lang-content en">Start the Collection of the Package</span>
                        </a>
                    </div>
                </form>
            </div>
        @endforeach

        <!-- Shipment Card 4 - Searching -->
        @foreach($pending_offers as $offer)
            <div class="shipment-card" data-status="on_hold">
                <span class="shipment-status status-searching">
                    <span class="lang-content fr active">🔍 En recherche</span>
                    <span class="lang-content en">🔍 Searching</span>
                </span>
                <div class="shipment-route">
                    <span class="shipment-location">{{ $offer->pickup_city }}</span>
                    <span class="shipment-arrow">→</span>
                    <span class="shipment-location">{{ $offer->destination_city }}</span>
                </div>
                @php
                    $packages = json_decode($offer->packages_json, true);
                    $totalWeight = collect($packages)->sum('weight');
                @endphp
                <div class="shipment-details">
                    <div class="shipment-detail">📦 Cartons déménagement</div>
                    <div class="shipment-detail">⚖️ {{ $totalWeight }}kg</div>
                    <div class="shipment-detail">
                        📅 {{ \Carbon\Carbon::parse($offer->date_and_time_of_followup)->translatedFormat('d F Y') }}</div>
                    <div class="shipment-detail">💰 Budget: €{{ $offer->fare }}</div>
                    <div class="shipment-detail">👁️ 1 offre reçue</div>
                    <div class="shipment-detail">
                        ⏱️ {{ \Carbon\Carbon::parse($offer->expiry)->translatedFormat('d F Y') }}</div>
                </div>
                <form class="theme-form mt-0" action="{{url('driver/cancel-offer')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" class="offer_id" value="{{ $offer->id }}">
                    <div class="shipment-actions">
                        <a href="{{ url('user/get-pending-driver-fare-request?userriderequest_id='.$offer->id) }}"
                           class="action-btn" style="color: black;">
                            <span class="lang-content fr active">Voir offres</span>
                            <span class="lang-content en">View offers</span>
                        </a>
                        <button type="submit" class="action-btn primary">
                            <span class="lang-content fr active">Cancel the Offer</span>
                            <span class="lang-content en">Cancel the Offer</span>
                        </button>
                    </div>
                </form>
            </div>
        @endforeach

        <!-- Shipment Card 3 - Delivered -->
        @foreach($completed_rides as $completed_ride)
            <div class="shipment-card" data-status="finished">
                <span class="shipment-status status-delivered">
                    <span class="lang-content fr active">✅ Livré</span>
                    <span class="lang-content en">✅ Delivered</span>
                </span>
                <div class="shipment-route">
                    <span class="shipment-location">{{ $completed_ride->pickup_city }}</span>
                    <span class="shipment-arrow">→</span>
                    <span class="shipment-location">{{ $completed_ride->destination_city }}</span>
                </div>
                @php
                    $packages = json_decode($completed_ride->userriderequest->packages_json, true);
                    $totalWeight = collect($packages)->sum('weight');
                @endphp
                <div class="shipment-details">
                    <div class="shipment-detail">📦 Valise</div>
                    <div class="shipment-detail">⚖️ {{ $totalWeight }}kg</div>
                    <div class="shipment-detail">
                        📅 {{ \Carbon\Carbon::parse($completed_ride->date_and_time_of_followup)->translatedFormat('d F Y') }}</div>
                    <div class="shipment-detail">💰 €{{ $completed_ride->fare }}</div>
                    <div class="shipment-detail">
                        👤 {{ $completed_ride->driver->firstName . ' ' . $completed_ride->driver->lastName }}.
                    </div>
                    <div class="shipment-detail">⭐ 5/5</div>
                </div>
                <div class="shipment-actions">
                    <a href="{{ url('user/ride-details?ride_id='.$completed_ride->id) }}" class="action-btn"
                       style="color: black">
                        <span class="lang-content fr active">Détails</span>
                        <span class="lang-content en">Details</span>
                    </a>
                </div>
            </div>
        @endforeach

        <!-- Shipment Card 4 - Searching -->
        @foreach($cancelled_rides as $cancelled_ride)
            <div class="shipment-card" data-status="cancelled">
                <span class="shipment-status status-searching">
                    <span class="lang-content fr active">× Cancelled</span>
                    <span class="lang-content en">× Cancelled</span>
                </span>
                <div class="shipment-route">
                    <span class="shipment-location">{{ $cancelled_ride->pickup_city }}</span>
                    <span class="shipment-arrow">→</span>
                    <span class="shipment-location">{{ $cancelled_ride->destination_city }}</span>
                </div>
                <div class="shipment-details">
                    <div class="shipment-detail">📦 Cartons déménagement</div>
                    <div class="shipment-detail">⚖️ 120kg</div>
                    <div class="shipment-detail">
                        📅 {{ \Carbon\Carbon::parse($cancelled_ride->date_and_time_of_followup)->translatedFormat('d F Y') }}</div>
                    <div class="shipment-detail">💰 Budget: €{{ $cancelled_ride->fare }}</div>
                    <div class="shipment-detail">👁️ 1 offre reçue</div>
                    <div class="shipment-detail">
                        ⏱️ {{ \Carbon\Carbon::parse($cancelled_ride->expiry_date)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="shipment-actions">
                    <a href="{{ url('user/ride-details?ride_id='.$cancelled_ride->id) }}" class="action-btn"
                       style="color: black">
                        <span class="lang-content fr active">Détails</span>
                        <span class="lang-content en">Details</span>
                    </a>
                </div>
            </div>
        @endforeach

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

    // Filter shipments
    function filterShipments(status, event) {
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        event.target.classList.add('active');

        const cards = document.querySelectorAll('.shipment-card');
        cards.forEach(card => {
            if (status === 'all' || card.dataset.status === status) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Initialize preferences
    document.addEventListener('DOMContentLoaded', function () {
        const preferredLang = localStorage.getItem('preferredLanguage');
        if (preferredLang === 'en') {
            document.querySelector('.lang-btn[onclick*="en"]').click();
        }
    });
</script>
</body>
</html>
