<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Driverriderequest;
use App\Models\ReservedKiloRidebooked;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class RideController extends Controller
{
    public function my_rides(){
        $active_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where (function ($query){
                $query
                    ->where('status', 'user_cancelled_ride')
                    ->orwhere('status', 'carrier_cancelled_ride')
                    ->orWhere('status','active');
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
            ->with('driver', 'user')
            ->get();
        $active_reserved_kilo_rides = ReservedKiloRidebooked::where('driver_id', Auth::guard('driver')->id())
            ->where (function ($query){
                $query
                    ->Where('status','active');
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
            ->with('driver', 'user','userfarerequest','driverriderequest')
            ->get();
        $pending_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
            ->where('expiry', '>', Carbon::now())
            ->where('message','Accepted, waiting for support')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user','mean_of_transport')
            ->get();
        $pending_reserved_kilo_rides = ReservedKiloRidebooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
            ->where(function ($query){
                $query->where('message', 'Package Awaiting Collection')
                    ->orwhere('message', 'delivery in progress to collection address')
                    ->orwhere('message', 'Package Collected Requested')
                    ->orwhere('message', 'Package Collected');
            })
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user','userfarerequest','driverriderequest')
            ->get();
        $completed_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'completed')
            ->with('driver', 'user')
            ->get();
        $completed_reserved_kilo_rides = ReservedKiloRidebooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'completed')
            ->with('driver', 'user','userfarerequest','driverriderequest')
            ->get();
        $cancelled_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'cancelled')
            ->with('driver', 'user')
            ->get();

        $cancelled_reserved_kilo_rides = ReservedKiloRidebooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'cancelled')
            ->with('driver', 'user','userfarerequest','driverriderequest')
            ->get();

        $personal_offers = Userriderequest::with('user','packagetype','packagesubtype')
            ->where('expiry', '>', Carbon::now())
            ->where('status', 'waiting')
            ->where('targetted_driver_id', Auth::guard('driver')->user()->id)
            ->where('is_targetted','1')
            ->orderBy('id', 'desc')
            ->get();

        $pending_offers = Driverriderequest::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'waiting')
            ->where('end_reservation_date', '>', Carbon::now())
            ->with('driver')
            ->get();

        return view('driver-app.my-rides', compact('active_rides','personal_offers','pending_rides', 'completed_rides', 'cancelled_rides','pending_offers','pending_reserved_kilo_rides','active_reserved_kilo_rides','completed_reserved_kilo_rides','cancelled_reserved_kilo_rides'));
    }

    public function active_rides()
    {
        $active_rides = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->get();
        return view('driver-app.active-ride', compact('active_rides'));
    }

    public function track_ride($id)
    {
        $track_ride = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
//            ->where('status', 'active')
            ->where('id', $id)
            ->with('driver', 'user')
            ->first();
        return view('driver-app.track-ride', compact('track_ride'));
    }

    public function driver_location_update(Request $request)
    {

        $driver = Driver::find(Auth::guard('driver')->id());
        $driver->latitude = $request->lat;
        $driver->longitude = $request->lng;
        $driver->save();

        $ride = Ridesbooked::where('driver_id', Auth::guard('driver')->id())
            ->where('status', 'active')
//            ->where('departure_date', '>=', Carbon::now())
            ->with('driver', 'user')
            ->first();
        if ($ride && $ride->status === 'active') {
            $ride->driver_lat = $request->lat;
            $ride->driver_lng = $request->lng;
            $ride->save();
        }

        $ride = ReservedKiloRidebooked::where('driver_id', Auth::guard('driver')->id())
            ->with('driver', 'user')
            ->first();
        if ($ride) {
            $ride->driver_lat = $request->lat;
            $ride->driver_lng = $request->lng;
            $ride->save();
        }

    }

    public function ride_details(Request $request)
    {
        $ride_detail = Ridesbooked::where('id', $request->ride_id)
            ->with('driver', 'user','packagetype','packagesubtype')
            ->first();
        return view('driver-app.ride-details', compact('ride_detail'));
    }

    public function reserved_kilo_ride_details(Request $request)
    {
        $ride_details = ReservedKiloRidebooked::where('id', $request->ride_id)
            ->with('driver', 'user','userfarerequest','driverriderequest')
            ->first();
        return view('driver-app.reserved-kilo-ride-details', ['ride_detail' => $ride_details]);
    }

    public function reserved_kilo_offer_details(Request $request)
    {
        $ride_details = Driverriderequest::where('id', $request->ride_id)
            ->with('driver')
            ->first();
        return view('driver-app.reserved-kilo-offer-details', ['ride_detail' => $ride_details]);
    }

    public function confirm_package_collected($id)
    {
        $reserved_ride_kilo = ReservedKiloRidebooked::find($id);
        $reserved_ride_kilo->message = 'Package Collected';
        $reserved_ride_kilo->save();

        $user = User::find($reserved_ride_kilo->user_id);
        $driver = Driver::find($reserved_ride_kilo->driver_id);

        $message = \Illuminate\Support\Carbon::now() . ' Carrier '.$driver->name. ' Confirmed Package received';

        if ($user && $user->email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\ConfirmedPackageCollection($reserved_ride_kilo));
                Mail::to($reserved_ride_kilo->userfarerequest->receiver_email)->send(new \App\Mail\ConfirmedPackageCollection($reserved_ride_kilo));
                Mail::to($driver->email)->send(new \App\Mail\ConfirmedPackageCollection($reserved_ride_kilo));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Package Collected Successfully');
    }

    public function get_driver_location($id)
    {

        $track_ride = ReservedKiloRidebooked::where('id', $id)
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

    public function get_driver_ride_request(Request $request)
    {
        $query = Driverriderequest::with('driver') // if you have these relationships
        ->where('status', 'waiting')
            ->where('end_reservation_date', '>', Carbon::now());

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

        $driverrideRequests = $query->orderBy('id', 'desc')
            ->get();
//            ->filter(function ($request) use ($driverTransports) {
//                $requestTransports = json_decode($request->means_of_transport ?? '[]', true);
//                return !empty(array_intersect($driverTransports, $requestTransports));
//            });
        return response()->json($driverrideRequests);
    }

}
