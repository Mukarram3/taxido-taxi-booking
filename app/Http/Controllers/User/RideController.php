<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\ParcelCategory;
use App\Models\ReservedKiloRidebooked;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use App\Notifications\RideBooked;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class RideController extends Controller
{
    public function my_rides()
    {
        $pending_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
            ->where('message','Accepted, waiting for support')
            ->where('expiry', '>', Carbon::now())
            ->with('driver', 'user','vehicle_type')
            ->get();

        $pending_offers = Userriderequest::where('user_id', Auth::guard('user')->id())
            ->where('status', 'waiting')
            ->where('expiry_date', '>', Carbon::now())
            ->with('user')
            ->get();

        $expired_offers = Userriderequest::where('user_id', Auth::guard('user')->id())
            ->where('status', 'waiting')
            ->where('expiry_date', '<', Carbon::now())
            ->with('user')
            ->get();
        $completed_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'completed')
            ->with('driver', 'user')
            ->get();
        $reserved_kilo_completed_rides = ReservedKiloRidebooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'completed')
            ->with('driver','driverriderequest','userfarerequest')
            ->get();
        $cancelled_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'cancelled')
            ->with('driver', 'user')
            ->get();

        $reserved_kilo_cancelled_rides = ReservedKiloRidebooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'cancelled')
            ->with('driver','driverriderequest','userfarerequest')
            ->get();

        $active_rides = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where (function ($query){
                $query
                    ->where('status', 'user_cancelled_ride')
                    ->orwhere('status', 'carrier_cancelled_ride')
                    ->orwhere('status','active');
            })
            ->where( function ($query) {
                $query->where('message', 'On the way to pickup')
                    ->orwhere('message', 'delivery in progress')
                    ->orwhere('message', 'transport completed awaiting validation')
                    ->orwhere('message', 'package delivered')
                    ->orwhere('message', 'Parcel returned')
                    ->orwhere('message', 'Delivery in progress, parcel return requested')
                    ->orwhere('message', 'User Cancelled Ride')
                    ->orwhere('message', "Package return in progress")
                    ->orwhere('message', 'Carrier Cancelled Ride');
            })
            ->with('driver', 'user','vehicle_type')
            ->get();

        $pending_reserverd_kilo_rides = ReservedKiloRidebooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
            ->where( function ($query) {
                $query->where('message', 'Package Awaiting Collection')
                    ->orwhere('message', 'delivery in progress to collection address')
                    ->orwhere('message', 'Package Collected Requested')
                    ->orwhere('message', 'Package Collected');
            })
            ->with('driver','driverriderequest','userfarerequest')
            ->get();

        $active_reserved_kilo_rides = ReservedKiloRidebooked::where('user_id', Auth::guard('user')->id())
            ->where (function ($query){
                $query
                    ->where('status','active');
            })
            ->where( function ($query) {
                $query->where('message', 'delivery in progress')
                    ->orwhere('message', 'transport completed awaiting validation')
                    ->orwhere('message', 'package delivered')
                    ->orwhere('message', 'Parcel returned')
                    ->orwhere('message', 'Delivery in progress, parcel return requested')
                    ->orwhere('message', 'User Cancelled Ride')
                    ->orwhere('message', "Package return in progress")
                    ->orwhere('message', 'Carrier Cancelled Ride');
            })
            ->with('driver','driverriderequest','userfarerequest')
            ->get();

        return view('user-app.proposals-management', compact('pending_rides', 'completed_rides', 'cancelled_rides', 'active_rides','expired_offers','pending_offers','pending_reserverd_kilo_rides','active_reserved_kilo_rides','reserved_kilo_completed_rides','reserved_kilo_cancelled_rides'));
    }

    public function track_ride($id)
    {
        $track_ride = Ridesbooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
            ->where('id', $id)
            ->with('driver', 'user')
            ->first();
        return view('user-app.track-ride', [
            'pickup_location' => $track_ride->pickup_location,
            'destination_location' => $track_ride->destination_location
        ]);
    }
    public function track_reserved_kilo_ride($id)
    {
        $track_ride = ReservedKiloRidebooked::where('user_id', Auth::guard('user')->id())
            ->where('status', 'active')
            ->where('id', $id)
            ->with('driver', 'user','driverriderequest')
            ->first();
        $destination = $track_ride->driverriderequest->destination_location;

        return view('user-app.track-reserved-kilo-ride', [
            'pickup_location' => $track_ride->driverriderequest->pickup_location,
            'destination_location' => $destination
        ]);
    }

    public function get_driver_location($id)
    {
        $track_ride = Ridesbooked::where('id', $id)
            ->where('status', 'active')
            ->with('driver', 'user')
            ->first();

        if (!$track_ride || !$track_ride->driver_lat || !$track_ride->driver_lng) {
            return response()->json(['lat' => null, 'lng' => null]);
        }

        return response()->json([
            'lat' => $track_ride->driver_lat,
            'lng' => $track_ride->driver_lng
        ]);
    }

    public function ride_details(Request $request)
    {
        $ride_details = Ridesbooked::where('id', $request->ride_id)
            ->with('driver', 'user')
            ->first();
        return view('user-app.ride-details', ['ride_detail' => $ride_details]);
    }
    public function reserved_kilo_ride_details(Request $request)
    {
        $ride_details = ReservedKiloRidebooked::where('id', $request->ride_id)
            ->with('driver', 'user','userfarerequest','driverriderequest')
            ->first();
        return view('user-app.reserved-kilo-ride-details', ['ride_detail' => $ride_details]);
    }

    public function get_user_ride_request(Request $request)
    {
        $driver = Driver::find(Auth::guard('driver')->user()->id);
        $driverTransports = json_decode($driver->means_of_transport ?? '[]', true);

        $query = Userriderequest::with('user','packagetype','packagesubtype') // if you have these relationships
        ->where('status', 'waiting')
            ->whereNull('is_targetted')
            ->where('expiry', '>', Carbon::now());

        if ($request->filled('city')) {
            $query->where('destination_location', 'like', "%{$request->city}%");
        }
        if ($request->filled('country')) {
            $query->where('destination_location', 'like', "%{$request->country}%");
        }
        if ($request->filled('expiry')) {
            $query->whereDate('expiry', $request->expiry);
        }
        if ($request->filled('online_date')) {
            $query->whereDate('created_at', $request->online_date);
        }
        if ($request->urgent) {
            $query->where('is_urgent', 1);
        }
        if ($request->professional) {
            $query->where('is_professional', 1);
        }

        $driverFareRequests = $query->orderBy('id', 'desc')
            ->get();
//            ->filter(function ($request) use ($driverTransports) {
//                $requestTransports = json_decode($request->means_of_transport ?? '[]', true);
//                return !empty(array_intersect($driverTransports, $requestTransports));
//            });
        return response()->json($driverFareRequests);
    }

    public function get_personal_ride_request()
    {
        $driverFareRequests = Userriderequest::with('user','packagetype','packagesubtype') // if you have these relationships
        ->where('status', 'waiting')
            ->where('targetted_driver_id', Auth::guard('driver')->user()->id)
            ->where('is_targetted','1')
//            ->where('expiry', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($driverFareRequests);
    }

    public function markRidecomplete($ride_id)
    {
        $ride_detail = Ridesbooked::where('id', $ride_id)
            ->with('driver', 'user')
            ->first();
        $departure = Carbon::parse($ride_detail->departure_date);
        $diff = Carbon::now()->diff($departure);
        $result = "{$diff->d} days {$diff->h} hours {$diff->i} minutes";

        $ride_detail->status = 'completed';
        $ride_detail->message = 'package delivered';
        $ride_detail->arrival_date = Carbon::now();
        $ride_detail->transport_time = $result;
        $ride_detail->date_and_time_of_followup = Carbon::now();
        $ride_detail->save();
        session()->flash('success', 'Ride Completed Successfully!');
        if ($ride_detail->payment_method == 'online'){
            $user = User::find($ride_detail->user_id);
            $user->balance = $user->balance - $ride_detail->fare;
            $user->save();
            $driver = Driver::find($ride_detail->driver_id);
            $driver->balance = $driver->balance + $ride_detail->fare;
            $driver->save();
        }

        $user = User::find($ride_detail->user_id);
        $driver = Driver::find($ride_detail->driver_id);
        $message = \Illuminate\Support\Carbon::now() . ' Sender '.$user->name. ' has Just Accepted your Delivery.';

        if ($user && $user->email) {
            try {
                Notification::send($driver, new RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\RideCompletedNotification($ride_detail));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }
        return view('user-app.ride-details', [
            'ride_detail' => $ride_detail,
            'status' => 'completed'
        ]);
    }
    public function markPackageReturned($ride_id)
    {
        $ride_detail = Ridesbooked::where('id', $ride_id)
            ->with('driver', 'user')
            ->first();

        $ride_detail->status = 'cancelled';
        $ride_detail->message = 'Package Returned';
        $ride_detail->date_and_time_of_followup = \Illuminate\Support\Carbon::now();
        $ride_detail->save();
        session()->flash('success', 'Ride Cancelled Successfully!');

        $user = User::find($ride_detail->user_id);
        $driver = Driver::find($ride_detail->driver_id);
        $message = \Illuminate\Support\Carbon::now() . ' Sender '.$user->name. ' has Just Accepted your Cancellation and Package Returned.';

        if ($user && $user->email) {
            try {
                Notification::send($driver, new RideBooked($message));
                Mail::to($driver->email)->send(new \App\Mail\PackageReturnedNotification($ride_detail));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }
        return view('user-app.ride-details', [
            'ride_detail' => $ride_detail,
            'status' => 'completed'
        ]);
    }

    public function sub_categories(Request $request)
    {
        $category = ParcelCategory::with('sub_category')->find($request->category_id);
        return response()->json(['category' => $category]);
    }

    public function getNearbyDrivers(Request $request)
    {
        $latitude = floatval(request()->lat);    // e.g. 32.0836
        $longitude = floatval(request()->lng);  // e.g. 72.6711
        $distance = 20; // km

        $drivers = DB::table('drivers')
            ->select('*', DB::raw("
        (6371 * acos(
            cos(radians($latitude)) *
            cos(radians(latitude)) *
            cos(radians(longitude) - radians($longitude)) +
            sin(radians($latitude)) *
            sin(radians(latitude))
        )) AS distance
    "))
            ->having('distance', '<=', $distance)
            ->orderBy('distance', 'asc')
            ->get();

        return response()->json($drivers);
    }

    public function targeted_transport_route(Request $request)
    {
        $pickupAddress = $request->pickup_location;
        $destinationAddress = $request->desination_location;

        $pickupCoords = $this->geocodeAddress($pickupAddress);
        $destinationCoords = $this->geocodeAddress($destinationAddress);

        if (!$pickupCoords || !$destinationCoords) {
            return back()->with('error', 'Could not determine pickup or destination location.');
        }

        $toleranceMeters = 20000; // 20 km radius
        $matches = [];

        $minRideIds = Ridesbooked::whereNotNull('route_polyline')
            ->where('status','active')
            ->groupBy('driver_id')
            ->selectRaw('MIN(id) as id')
            ->pluck('id');

// Step 2: Fetch full ride records for those IDs
        $rides = Ridesbooked::with('driver','user')->whereIn('id', $minRideIds)->get();

        foreach ($rides as $ride) {
            $routeCoords = $this->decodePolyline($ride->route_polyline);

            $pickupMatch = $this->isPointNearRoute(
                $pickupCoords['lat'], $pickupCoords['lng'], $routeCoords, $toleranceMeters, 'Pickup'
            );
            $destinationMatch = $this->isPointNearRoute(
                $destinationCoords['lat'], $destinationCoords['lng'], $routeCoords, $toleranceMeters, 'Destination'
            );

            if ($pickupMatch && $destinationMatch) {
                $ride->match_type = 'both';
                $matches[] = $ride;
            } elseif ($pickupMatch) {
                $ride->match_type = 'pickup_only';
                $matches[] = $ride;
            } elseif ($destinationMatch) {
                $ride->match_type = 'destination_only';
                $matches[] = $ride;
            }
        }

        // ✅ Apply Filters
        $filteredMatches = collect($matches)->filter(function ($ride) use ($request) {
            if ($request->filled('city') && stripos($ride->pickup_location, $request->city) === false) {
                return false;
            }
            if ($request->filled('country') && stripos($ride->country ?? '', $request->country) === false) {
                return false;
            }
            if ($request->filled('expiry') && optional($ride->expiry)->toDateString() !== $request->expiry) {
                return false;
            }
            if ($request->filled('online_date') && optional($ride->created_at)->toDateString() !== $request->online_date) {
                return false;
            }
            if ($request->urgent && $ride->is_urgent != 1) {
                return false;
            }
            if ($request->professional && $ride->is_professional != 1) {
                return false;
            }
            return true;
        });

        return view('user-app.date-time-schedule', compact('matches','pickupAddress','destinationAddress'));
    }

    public function filtered_targeted_transport_route(Request $request)
    {
        // Decode matches JSON back into an array
        $matches = json_decode($request->matches, true);

        if (!$matches) {
            return response()->json(['error' => 'No matches provided']);
        }

        // Convert array back into collection for easy filtering
        $matchesCollection = collect($matches);

        // Apply filters
        $filtered = $matchesCollection->filter(function ($ride) use ($request) {
            // Example: urgent
            if ($request->urgent && ($ride['is_urgent'] ?? 0) != 1) {
                return false;
            }

            // Example: professional
            if ($request->professional && ($ride['is_professional'] ?? 0) != 1) {
                return false;
            }

            // Example: city (check inside pickup_location text)
            if ($request->filled('city') && stripos($ride['pickup_location'] ?? '', $request->city) === false) {
                return false;
            }

            // Example: country
            if ($request->filled('country') && stripos($ride['pickup_location'] ?? '', $request->country) === false) {
                return false;
            }

            // Example: expiry date
            if ($request->filled('expiry') && substr($ride['expiry'], 0, 10) !== $request->expiry) {
                return false;
            }

            // Example: online date (created_at)
            if ($request->filled('online_date') && substr($ride['created_at'], 0, 10) !== $request->online_date) {
                return false;
            }

            return true;
        })->values(); // reset array keys

        return response()->json([
            'matches' => $filtered,
            'pickupAddress' => $request->pickupAddress,
            'destinationAddress' => $request->destinationAddress,
        ]);
    }

    private function geocodeAddress($address)
    {
        $apiKey = 'AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE';
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=$apiKey";

        $response = Http::get($url)->json();

        if (!empty($response['results'][0]['geometry']['location'])) {
            return $response['results'][0]['geometry']['location']; // ['lat' => ..., 'lng' => ...]
        }

        return null;
    }

    private function decodePolyline($encoded)
    {
        $points = [];
        $index = $lat = $lng = 0;

        while ($index < strlen($encoded)) {
            $b = $shift = $result = 0;
            do {
                $b = ord($encoded[$index++]) - 63;
                $result |= ($b & 0x1f) << $shift;
                $shift += 5;
            } while ($b >= 0x20);
            $deltaLat = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lat += $deltaLat;

            $shift = $result = 0;
            do {
                $b = ord($encoded[$index++]) - 63;
                $result |= ($b & 0x1f) << $shift;
                $shift += 5;
            } while ($b >= 0x20);
            $deltaLng = (($result & 1) ? ~($result >> 1) : ($result >> 1));
            $lng += $deltaLng;

            $points[] = [
                'lat' => $lat * 1e-5,
                'lng' => $lng * 1e-5
            ];
        }

        return $points;
    }

    private function isPointNearRoute($pointLat, $pointLng, array $routeCoords, $toleranceMeters = 20000, $pointLabel = '')
    {
        $minDistance = INF;

        for ($i = 0; $i < count($routeCoords) - 1; $i++) {
            $start = $routeCoords[$i];
            $end = $routeCoords[$i + 1];
            $distance = $this->distanceToSegment($pointLat, $pointLng, $start, $end);

            if ($distance < $minDistance) {
                $minDistance = $distance;
            }

            if ($distance <= $toleranceMeters) {
                \Log::info("✅ $pointLabel is near the route. Distance: {$distance} m");
                return true;
            }
        }

        \Log::warning("❌ $pointLabel is NOT near the route. Closest distance: {$minDistance} m");
        return false;
    }


    private function distanceToSegment($px, $py, $start, $end)
    {
        $earthRadius = 6371000;

        $lat1 = deg2rad($start['lat']);
        $lng1 = deg2rad($start['lng']);
        $lat2 = deg2rad($end['lat']);
        $lng2 = deg2rad($end['lng']);
        $plat = deg2rad($px);
        $plng = deg2rad($py);

        $dx = $lng2 - $lng1;
        $dy = $lat2 - $lat1;

        $u = (($plat - $lat1) * $dy + ($plng - $lng1) * $dx) / ($dy * $dy + $dx * $dx);
        $u = max(min($u, 1), 0);

        $closestLat = $lat1 + $u * $dy;
        $closestLng = $lng1 + $u * $dx;

        return $this->haversineDistance(rad2deg($plat), rad2deg($plng), rad2deg($closestLat), rad2deg($closestLng));
    }


    private function haversineDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371000; // meters

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    public function markReserveKiloRidecomplete($ride_id)
    {
        $ride_detail = ReservedKiloRidebooked::where('id', $ride_id)
            ->with('driver', 'user','userfarerequest','driverriderequest')
            ->first();

        $ride_detail->status = 'completed';
        $ride_detail->message = 'package delivered';
        $ride_detail->driverriderequest->arrival_date = Carbon::now();
        $ride_detail->date_and_time_of_followup = Carbon::now();
        $ride_detail->save();
        session()->flash('success', 'Ride Completed Successfully!');
//        if ($ride_detail->payment_method == 'online'){
//            $user = User::find($ride_detail->user_id);
//            $user->balance = $user->balance - $ride_detail->fare;
//            $user->save();
//            $driver = Driver::find($ride_detail->driver_id);
//            $driver->balance = $driver->balance + $ride_detail->fare;
//            $driver->save();
//        }

        $driver = Driver::find($ride_detail->driver_id);
        $user = User::find($ride_detail->user_id);
        $message =  \Illuminate\Support\Carbon::now() .'Sender '.$user->name. ' ' .$user->email. ' completed ride with you.';
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($ride_detail->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRideCompleted($ride_detail));
                Mail::to($user->email)->send(new \App\Mail\ReservedKiloRideCompleted($ride_detail));
                Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRideCompleted($ride_detail));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        return view('user-app.reserved-kilo-ride-details', [
            'ride_detail' => $ride_detail,
            'status' => 'completed'
        ]);
    }

    public function return_reserved_kilo_parcel(Request $request)
    {
        $ride_booked = ReservedKiloRidebooked::find($request->id);
        $ride_booked->message = 'Delivery in progress, parcel return requested';
        $ride_booked->cancelled_notes = $request->reason;
        $ride_booked->is_return = true;
        $ride_booked->is_user_cancelled = true;
        $ride_booked->save();

            $driver = Driver::find($ride_booked->driver_id);
            $user = User::find($ride_booked->user_id);
            $message =  \Illuminate\Support\Carbon::now() .' Sender '.$user->name. ' ' .$user->email. ' requested for package return';
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($ride_booked->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRidePackageReturnRequest($ride_booked));
                Mail::to($user->email)->send(new \App\Mail\ReservedKiloRidePackageReturnRequest($ride_booked));
                Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRidePackageReturnRequest($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }

        return redirect()->back()->with('success', 'Requested Package Return Awaiting Confirmation');

    }

    public function start_reserved_kilo_return_parcel($ride_id)
    {
        $ride_booked = ReservedKiloRidebooked::find($ride_id);
        $ride_booked->message = "Package return in progress";
        $ride_booked->save();

        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  \Illuminate\Support\Carbon::now() .' Carrier '.$driver->name. ' ' .$driver->email. ' started his ride for package return';
        try {
            Notification::send($user, new \App\Notifications\RideBooked($message));
            Notification::send($driver, new \App\Notifications\RideBooked($message));
            Mail::to($ride_booked->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRideStartPackageReturn($ride_booked));
            Mail::to($user->email)->send(new \App\Mail\ReservedKiloRideStartPackageReturn($ride_booked));
            Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRideStartPackageReturn($ride_booked));
        }
        catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return redirect()->back()->with('success', 'Parcel Return Started');
    }

    public function markReservedKiloPackageReturned($ride_id)
    {
        $ride_detail = ReservedKiloRidebooked::where('id', $ride_id)
            ->with('driver', 'user')
            ->first();

        $ride_detail->status = 'cancelled';
        $ride_detail->message = 'Package Returned';
        $ride_detail->date_and_time_of_followup = \Illuminate\Support\Carbon::now();
        $ride_detail->save();
        session()->flash('success', 'Ride Cancelled Successfully!');

        $driver = Driver::find($ride_detail->driver_id);
        $user = User::find($ride_detail->user_id);
        $message =  \Illuminate\Support\Carbon::now() .'Sender '.$user->name. ' ' .$user->email. ' confirmed the parcel return';

        try {
            Notification::send($user, new \App\Notifications\RideBooked($message));
            Notification::send($driver, new \App\Notifications\RideBooked($message));
            Mail::to($ride_detail->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRidePackageReturned($ride_detail));
            Mail::to($user->email)->send(new \App\Mail\ReservedKiloRidePackageReturned($ride_detail));
            Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRidePackageReturned($ride_detail));
        }
        catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return view('user-app.reserved-kilo-ride-details', [
            'ride_detail' => $ride_detail,
            'status' => 'Cancelled'
        ]);
    }

}
