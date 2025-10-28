<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Driverriderequest;
use App\Models\ReservedKiloRidebooked;
use App\Models\User;
use App\Models\Userfarerequest;
use App\Models\Userriderequest;
use App\Notifications\RideBooked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class DriverriderequestController extends Controller
{
    public function driver_fare_request(Request $request)
    {

        $validator = Validator::make($request->all(),[
            // Hidden pickup/destination
            'pickup_location'          => 'required|string|max:255',
            'pickup_location_latitude' => 'nullable|numeric',
            'pickup_location_longitude'=> 'nullable|numeric',
            'destination_location'     => 'required|array|min:1',
            'distance'                 => 'nullable|numeric',
            'travel_category'          => 'required|in:air_travel,sea_travel',
            'departure_datetime'       => 'required|date|after:now',
            'arrival_datetime'       => 'required|date|after:now',
            'endbooking_datetime'       => 'required|date|after:now',
            'end_reservation_date'     => 'required|date|after:now',
            'total_transport_capacity'       => 'required|integer|min:1',
            'price_per_kilo'           => 'required',
            'price_currency'           => 'required',
            'collection_address'       => 'required|array|min:1',
            'delivery_address'         => 'required|string|max:255',
            'package_receiving_method' => 'required|in:hand,postal',
            'excluded_packages'        => 'nullable|array',
            'excluded_packages.*'      => 'string|in:explosives,flammable_liquids,weapons,drugs,perishable_foods,chemicals,radioactive_materials,other',
            'other_excluded'           => 'nullable|string|max:500',
            'payment_method'           => 'required|in:online',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $validated['driver_id'] = Auth::guard('driver')->id();
        $validated['available_transport_capacity'] = $validated['total_transport_capacity'];
        $validated['airline'] = $request->airline ? : '';
        $validated['maritimes'] = $request->maritimes ? : '';
        $validated['reference_id'] = 'OFR-' . now()->year . '-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);

        $rideRequest = Driverriderequest::create($validated);

        $users = User::all();
        $driver = Driver::find($rideRequest->driver_id);
        $message = \Illuminate\Support\Carbon::now() . ' Carrier '.$driver->name. ' has Just Posted an offer';

        foreach($users as $user){
            try {
                Notification::send($user, new RideBooked($message));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return view('driver-app.driver-fare-request', ['rideRequest' => $rideRequest->id]);
    }

    public function get_pending_user_fare_request(Request $request)
    {

        $Driverriderequest = Driverriderequest::where('id',$request->input('driverriderequest_id'))->first();

        $Userfarerequest = Userfarerequest::with('user', 'driverriderequest') // if you have these relationships
        ->where('driverriderequest_id', $request->input('driverriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->where('status','!=','rejected')
            ->orderBy('id', 'desc')
            ->get();
        $userLat = $Driverriderequest->pickup_location_latitude;
        $userLng = $Driverriderequest->pickup_location_longitude;

// Add user lat/lng to each item
        $Userfarerequest->transform(function ($item) use ($userLat, $userLng) {
            $item->user_lat = $userLat;
            $item->user_lng = $userLng;
            return $item;
        });
        return view('driver-app.pending-user-fare-request', compact('Userfarerequest'),['driverriderequest_id' => $Driverriderequest->id]);
    }

    public function get_user_fare_request(Request $request)
    {
        $driverriderequest = Driverriderequest::find($request->input('driverriderequest_id'));

        if ($driverriderequest && $driverriderequest->status == 'accepted') {
            return response()->json(['ridebooked' => true]);
        }

        Log::info($request->input('driverriderequest_id'));
        $UserFareRequests = Userfarerequest::with('user', 'driverriderequest') // if you have these relationships
        ->where('driverriderequest_id', $request->input('driverriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->where('status','!=','rejected')
            ->where('status','!=','accepted')
            ->orderBy('id', 'desc')
            ->get();
        $userLat = $driverriderequest->pickup_location_latitude;
        $userLng = $driverriderequest->pickup_location_longitude;

// Add user lat/lng to each item
        $UserFareRequests->transform(function ($item) use ($userLat, $userLng) {
            $item->user_lat = $userLat;
            $item->user_lng = $userLng;
            return $item;
        });
        return response()->json($UserFareRequests);
    }
    public function user_fare_requests(Request $request)
    {

        $driverriderequest = Driverriderequest::find($request->input('id'));

        if ($driverriderequest && $driverriderequest->status == 'accepted') {
            return redirect()->back()->with(['success' => 'Ride is accepted']);
        }

        Log::info($request->input('driverriderequest_id'));
        $UserFareRequests = Userfarerequest::with('user', 'driverriderequest') // if you have these relationships
        ->where('driverriderequest_id', $request->input('driverriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->where('status','!=','rejected')
            ->where('status','!=','accepted')
            ->orderBy('id', 'desc')
            ->get();
        $userLat = $driverriderequest->pickup_location_latitude;
        $userLng = $driverriderequest->pickup_location_longitude;

// Add user lat/lng to each item
        $UserFareRequests->transform(function ($item) use ($userLat, $userLng) {
            $item->user_lat = $userLat;
            $item->user_lng = $userLng;
            return $item;
        });
        return view('driver-app.driver-fare-request', ['rideRequest' => $driverriderequest->id]);
    }

    public function cancel_driver_ride_request(Request $request)
    {

        $offer = Driverriderequest::find($request->driver_ride_request_id);

        $offer->status = 'cancelled';
        $offer->message = $request->reason;
        $offer->save();

        return redirect()->route('driver.my_rides')->with('success', 'Offer Cancelled successfully!');
    }

}
