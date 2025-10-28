<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Driverfarerequest;
use App\Models\Driverriderequest;
use App\Models\Otp;
use App\Models\ReservedKiloRidebooked;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userfarerequest;
use App\Models\Userriderequest;
use App\Notifications\RideBooked;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class RidesbookedController extends Controller
{
    public  function accept_ride_confirmed($userriderequest_id)
    {
        $userriderequest = Userriderequest::find($userriderequest_id);

        return view('driver-app.accept-ride-confirmed',['userriderequest' => $userriderequest])->with(['success' => 'Ride booked successfully']);
    }

    public function ride_verification($userriderequest_id)
    {
        $userriderequest = Userriderequest::find($userriderequest_id);

        if ($userriderequest->status == 'accepted') {
            return redirect()->route('driver.home')->with(['success' => 'Ride booked by another driver']);
        }
        $ridesbooked = Ridesbooked::where('userriderequest_id','=',$userriderequest_id)->first();
        if ($ridesbooked) {
            return redirect()->route('driver.home')->with(['success' => 'Ride booked by another driver']);
        }

        $ridesbooked = new Ridesbooked();
        $ridesbooked->userriderequest_id = $userriderequest->id;
        $ridesbooked->user_id = $userriderequest->user_id;
        $ridesbooked->driver_id = Auth::guard('driver')->id();
        $ridesbooked->receiver_name = $userriderequest->receiver_name;
        $ridesbooked->receiver_email = $userriderequest->receiver_email;
        $ridesbooked->receiver_phone = $userriderequest->receiver_phone;
        $ridesbooked->pickup_location = $userriderequest->pickup_location;
        $ridesbooked->destination_location = $userriderequest->destination_location;
        $ridesbooked->departure_date      = $userriderequest->departure_date; // assuming current time as departure
        $ridesbooked->transport_title      = $userriderequest->transport_title; // assuming current time as departure
        $ridesbooked->pick_up_time      = $userriderequest->pick_up_time; // assuming current time as departure
        $ridesbooked->delivery_time      = $userriderequest->delivery_time; // assuming current time as departure
        $ridesbooked->arrival_date        = $userriderequest->arrival_date;
        $ridesbooked->distance            = $userriderequest->distance ?? 0;
        $ridesbooked->type_of_package   = $userriderequest->type_of_package;
        $ridesbooked->sub_type_of_package   = $userriderequest->sub_type_of_package;
        $ridesbooked->length_of_package   = $userriderequest->length_of_package;
        $ridesbooked->width_of_package    = $userriderequest->width_of_package;
        $ridesbooked->weight_of_package    = $userriderequest->weight_of_package;
        $ridesbooked->quantity_of_package = $userriderequest->quantity_of_package;
        $ridesbooked->fare                = $userriderequest->fare;
        $ridesbooked->fare_currency                = $userriderequest->fare_currency;
        $ridesbooked->means_of_transport                = $userriderequest->means_of_transport;
        $ridesbooked->comments            = $userriderequest->comments;
        $ridesbooked->payment_method      = $userriderequest->payment_method;
        $ridesbooked->expiry = $userriderequest->expiry;
        $ridesbooked->parcel_pictures = $userriderequest->parcel_pictures;
        $ridesbooked->date_and_time_of_followup = Carbon::now();
        $ridesbooked->status = 'active';
        $ridesbooked->message = 'Accepted, waiting for support';
        $ridesbooked->is_urgent = $userriderequest->is_urgent;
        $ridesbooked->is_professional = $userriderequest->is_professional;

        $pickup = $userriderequest->pickup_location;
        $destination = $userriderequest->destination_location;
        if (is_string($destination) && $this->isJson($destination)) {
            $decoded = json_decode($destination, true);
            if (is_array($decoded) && isset($decoded[0])) {
                $destination = $decoded[0];
            }
        }

        $directions = $this->getRoutePolyline($pickup, $destination);
        if ($directions && isset($directions['overview_polyline']['points'])) {
            $ridesbooked->route_polyline = $directions['overview_polyline']['points'];
        }

        $ridesbooked->save();

        $userriderequest->status = 'accepted';
        $userriderequest->save();

        $user = User::find($ridesbooked->user_id);
        $driver = Driver::find(Auth::guard('driver')->id());
        $message = Carbon::now() . ' A ride has been booked with carrier '.$driver->name. ' and Sender ' .$user->name;
        if ($user && $user->email) {
            try {
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\RideBookedNotification($ridesbooked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->route('driver.home')->with(['success' => 'Ride booked Successfully']);
    }

    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    private function getRoutePolyline($origin, $destination)
    {

        $apiKey = 'AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE';
        $url = "https://maps.googleapis.com/maps/api/directions/json";

        if (is_array($destination)) {
            $destination = $destination[0];
        }

        $response = Http::get($url, [
            'origin' => $origin,
            'destination' => $destination,
            'key' => $apiKey,
        ]);

        $json = $response->json();

        if (!empty($json['routes'][0])) {
            return $json['routes'][0]; // contains 'overview_polyline'
        }

        return null;
    }

    public function start_ride($ride_id)
    {

        try {

            $ride_booked = Ridesbooked::find($ride_id);
            $ride_booked->status = 'active';
            $ride_booked->message = 'On the way to pickup';
            $ride_booked->date_and_time_of_followup = Carbon::now();
            $ride_booked->save();

            $user = User::find($ride_booked->user_id);
            $driver = Driver::find($ride_booked->driver_id);
            $message = Carbon::now() . ' Carrier '.$driver->name. ' Has just started Ride and is on the way to Pickup the Package';

            if ($user && $user->email) {
                try {
                    Notification::send($user, new \App\Notifications\RideBooked($message));
                    Mail::to($user->email)->send(new \App\Mail\RideStartedNotification($ride_booked));
                }
                catch (\Exception $e) {
                    Log::info($e->getMessage());
                }
            }
            return redirect()->route('driver.my_rides')->with('success', 'Ride Started successfully!');
        }
        catch (\Exception $e) {
            Log::error('User Registration Error: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }

    }

    public function start_delivery($ride_id)
    {

        try {

            $ride_booked = Ridesbooked::find($ride_id);
            $ride_booked->status = 'active';
            $ride_booked->message = 'delivery in progress';
            $ride_booked->date_and_time_of_followup = Carbon::now();
            $ride_booked->save();

            $user = User::find($ride_booked->user_id);
            $driver = Driver::find($ride_booked->driver_id);
            $message = Carbon::now() . ' Carrier '.$driver->name. ' is on its way to Deliver the Package';

            if ($user && $user->email) {
                try {
                    Notification::send($user, new \App\Notifications\RideBooked($message));
                    Mail::to($user->email)->send(new \App\Mail\RideDeliverNotification($ride_booked));
                }
                catch (\Exception $e) {
                    Log::info($e->getMessage());
                }
            }
            return redirect()->route('driver.my_rides')->with('success', 'Ride Started successfully!');
        }
        catch (\Exception $e) {
            Log::error('User Registration Error: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }

    }

    public function cancel_ride(Request $request)
    {

        $ride_booked = Ridesbooked::find($request->id);

//        $is_return = in_array(
//            $ride_booked->message,
//            ['carrier is on its way to pick up the package', 'delivery in progress ']
//        );

        if ($ride_booked->status =='active' && $ride_booked->message == 'Accepted, waiting for support'){

            $ride_booked->status = 'cancelled';
            $ride_booked->cancelled_notes = $request->reason;
            $ride_booked->message = $request->is_user_cancelled == 'true' ? 'User Cancelled Ride' : 'Carrier Cancelled Ride';
            $ride_booked->is_return = false;
            $ride_booked->date_and_time_of_followup = Carbon::now();
            $ride_booked->is_user_cancelled = $request->is_user_cancelled == 'true' ? true : false;
            $ride_booked->save();

            $user = User::find($ride_booked->user_id);
            $driver = Driver::find($ride_booked->driver_id);
            $message = $request->is_user_cancelled == 'true' ? \Illuminate\Support\Carbon::now() . ' User '.$user->name. ' has Cancelled the ride.' : \Illuminate\Support\Carbon::now() . ' Carrier '.$driver->name. ' has Cancelled the ride.';

            try {
                Notification::send($user, new RideBooked($message));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }
        else{

//            $ride_booked->status = $request->is_user_cancelled == 'true' ? 'user_cancelled_ride' : 'carrier_cancelled_ride';
            $ride_booked->status = 'active';
            $ride_booked->cancelled_notes = $request->reason;
            $ride_booked->message = $request->is_user_cancelled == 'true' ? 'User Cancelled Ride' : 'Carrier Cancelled Ride';
            $ride_booked->is_return = true;
            $ride_booked->date_and_time_of_followup = Carbon::now();
            $ride_booked->is_user_cancelled = $request->is_user_cancelled == 'true' ? true : false;
            $ride_booked->save();

            $user = User::find($ride_booked->user_id);
            $driver = Driver::find($ride_booked->driver_id);
            $message = \Illuminate\Support\Carbon::now() . ' Carrier '.$driver->name. ' has Cancelled the ride with You.';

            try {
                Notification::send($user, new RideBooked($message));
                Mail::to($ride_booked->user->email)->send(new \App\Mail\RideCancelledRequestNotification($ride_booked));
                Mail::to($ride_booked->receiver_email)->send(new \App\Mail\RideCancelledRequestNotification($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->route('driver.my_rides')->with('success', 'Ride Cancelled successfully!');
    }

    public function otp_successfully(Request $request)
    {
        if ($request->otp == session('verification_code')) {
            try {

                $userriderequest = Userriderequest::find($request->userriderequest_id);

                if ($userriderequest->status == 'accepted') {
                    return redirect()->route('driver.home')->with('success', 'Ride accepted by another driver');
                }

                $ridesbooked = new Ridesbooked();
                $ridesbooked->user_id = $userriderequest->user_id;
                $ridesbooked->driver_id = Auth::guard('driver')->id();
                $ridesbooked->receiver_name = $userriderequest->receiver_name;
                $ridesbooked->receiver_email = $userriderequest->receiver_email;
                $ridesbooked->receiver_phone = $userriderequest->receiver_phone;
                $ridesbooked->pickup_location = $userriderequest->pickup_location;
                $ridesbooked->destination_location = $userriderequest->destination_location;
                $ridesbooked->departure_date      = $userriderequest->departure_date; // assuming current time as departure
                $ridesbooked->transport_title      = $userriderequest->transport_title; // assuming current time as departure
                $ridesbooked->pick_up_time      = $userriderequest->pick_up_time; // assuming current time as departure
                $ridesbooked->delivery_time      = $userriderequest->delivery_time; // assuming current time as departure
                $ridesbooked->arrival_date        = $userriderequest->arrival_date;
                $ridesbooked->distance            = $userriderequest->distance ?? 0;
                $ridesbooked->type_of_package   = $userriderequest->type_of_package;
                $ridesbooked->sub_type_of_package   = $userriderequest->sub_type_of_package;
                $ridesbooked->length_of_package   = $userriderequest->length_of_package;
                $ridesbooked->width_of_package    = $userriderequest->width_of_package;
                $ridesbooked->weight_of_package    = $userriderequest->weight_of_package;
//                $ridesbooked->volume_of_package   = $userriderequest->volume_of_package;
                $ridesbooked->quantity_of_package = $userriderequest->quantity_of_package;
                $ridesbooked->fare                = $userriderequest->fare;
                $ridesbooked->fare_currency                = $userriderequest->fare_currency;
//                $ridesbooked->travel_company      = $userriderequest->travel_company;
//                $ridesbooked->comments            = $userriderequest->comments;
                $ridesbooked->payment_method      = $userriderequest->payment_method;
                $ridesbooked->date_and_time_of_followup = Carbon::now();
                $ridesbooked->expiry = $userriderequest->expiry;
                $ridesbooked->status = 'active';
                $ridesbooked->message = 'Accepted, waiting for support';
                $ridesbooked->is_urgent = $userriderequest->is_urgent;
                $ridesbooked->is_professional = $userriderequest->is_professional;
                $ridesbooked->save();

                $userriderequest->status = 'accepted';
                $userriderequest->save();

                Session::forget('verification_code');

                $user = User::find($ridesbooked->user_id);
                if ($user && $user->email) {
                    try {
                        Mail::to($user->email)->send(new \App\Mail\RideBookedNotification($ridesbooked));
                    }
                    catch (\Exception $e) {
                        Log::info($e->getMessage());
                    }
                }

                return view('driver-app.otp-successfully')->with('success', 'Ride booked successfully!');
            }
            catch (\Exception $e) {
                Log::error('User Registration Error: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong! Please try again.'. $e->getMessage());
            }
        }
        else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

    }
    public function start_ride_otp_successfully(Request $request)
    {
        if ($request->otp == session('verification_code')) {
            try {

                $ridesbooked = Ridesbooked::where('id', $request->booked_ride_id)->first();
                $ridesbooked->status = 'active';
                $ridesbooked->save();

                Session::forget('verification_code');

                $user = User::find($ridesbooked->user_id);
                if ($user && $user->email) {
                    try {
                        Mail::to($user->email)->send(new \App\Mail\RideStartedNotification($ridesbooked));
                    }
                    catch (\Exception $e) {
                        Log::info($e->getMessage());
                    }
                }

                return view('driver-app.otp-successfully')->with('success', 'Ride Started successfully!');
            }
            catch (\Exception $e) {
                Log::error('User Registration Error: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong! Please try again.');
            }
        }
        else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

    }

    public function ride_complete_request($ride_id)
    {
        $ride_booked = Ridesbooked::find($ride_id);
        $ride_booked->message = 'transport completed awaiting validation';
        $ride_booked->date_and_time_of_followup = Carbon::now();
        $ride_booked->save();

//        dd($ride_booked);
        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  Carbon::now() .'Carrier '.$driver->name. ' ' .$driver->email. ' wants to complete ride with you.';
        if ($ride_booked && $ride_booked->receiver_email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Mail::to($ride_booked->receiver_email)->send(new \App\Mail\RideCompleteRequestNotification($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Transport Completed Awaiting Validation');

    }

    public function package_returned_request($ride_id)
    {
        $ride_booked = Ridesbooked::find($ride_id);
        $ride_booked->message = 'Parcel returned';
        $ride_booked->date_and_time_of_followup = Carbon::now();
        $ride_booked->save();

//        dd($ride_booked);
        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  Carbon::now() .'Carrier '.$driver->name. ' ' .$driver->email. ' returned Parcel ride and awaiting validation';
        if ($ride_booked && $ride_booked->receiver_email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\PackageReturnRequestNotification($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Parcel returned');

    }
    public function package_returned($ride_id)
    {
        $ride_booked = Ridesbooked::find($ride_id);
        $ride_booked->message = 'package returned awaiting validation';
        $ride_booked->date_and_time_of_followup = Carbon::now();
        $ride_booked->save();

//        dd($ride_booked);
        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  Carbon::now() .'Carrier '.$driver->name. ' ' .$driver->email. ' Returned package to sender '. $user->name;
        if ($ride_booked && $ride_booked->receiver_email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Mail::to($ride_booked->receiver_email)->send(new \App\Mail\PackageReturnRequestNotification($ride_booked));
                Mail::to($user->email)->send(new \App\Mail\PackageReturnRequestNotification($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Package Returned Awaiting Validation');

    }

    public function return_parcel($ride_id)
    {
        $ride_booked = Ridesbooked::find($ride_id);
        $ride_booked->message = 'Delivery in progress, parcel return requested';
//        $ride_booked->message = 'User Requested to Return the Parcel';
        $ride_booked->is_return = true;
        $ride_booked->is_user_cancelled = true;
        $ride_booked->save();

//        dd($ride_booked);
        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  Carbon::now() .'User '.$user->name. ' ' .$user->email. ' Requested to Return the Parcel ';
        if ($ride_booked && $ride_booked->receiver_email) {
            try {
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($driver->email)->send(new \App\Mail\UserPackageReturnRequest($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Requested Package Return Awaiting Confirmation');

    }

    public function start_return_parcel($ride_id)
    {
        $ride_booked = Ridesbooked::find($ride_id);
        $ride_booked->message = "Package return in progress";
        $ride_booked->save();

//        dd($ride_booked);
        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  Carbon::now() .'Carrier '.$driver->name. ' ' .$driver->email. ' accepted to Return the Parcel ';
        if ($ride_booked && $ride_booked->receiver_email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\ParcelReturnStartedNotification($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Start Parcel Return');
    }

    public function accept_ride_details(Request $request)
    {
        $userfarerequest = Userfarerequest::where('id', $request->input('userfarerequest_id'))->first();
        $driverriderequest_id = $userfarerequest->driverriderequest_id;
        $driverriderequest = Driverriderequest::find($driverriderequest_id);

        $reserved_kilo = ReservedKiloRidebooked::where('driverriderequest_id','=',$driverriderequest_id)
            ->where('status','active')
            ->sum('reserved_kilo');

        if ($driverriderequest->total_transport_capacity < ($reserved_kilo + $userfarerequest->requested_kilos)){
            return redirect()->route('driver.home')->with(['success' => 'Total Luggage has been reserved or including you package it is overweight']);
        }

        $ridesbooked = new ReservedKiloRidebooked();
        $ridesbooked->reference_id = 'RSV-' . now()->year . '-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        $ridesbooked->driverriderequest_id = $driverriderequest->id;
        $ridesbooked->user_id = $userfarerequest->user_id;
        $ridesbooked->driver_id = $driverriderequest->driver_id;
        $ridesbooked->userfarerequest_id = $userfarerequest->id;
        $ridesbooked->price_per_kilo                = $userfarerequest->requested_fare;
        $ridesbooked->reserved_kilo                = $userfarerequest->requested_kilos;
        $ridesbooked->totale_fare                = $userfarerequest->requested_kilos * $userfarerequest->requested_fare;
        $ridesbooked->driver_lat = $userfarerequest->driver_location_latitude;
        $ridesbooked->driver_lng = $userfarerequest->driver_location_longitude;
        $ridesbooked->date_and_time_of_followup = Carbon::now();
        $ridesbooked->status = 'active';
        $ridesbooked->message = 'Package Awaiting Collection';

        $pickup = $driverriderequest->pickup_location;
        $destination = $driverriderequest->destination_location;
        if (is_string($destination) && $this->isJson($destination)) {
            $decoded = json_decode($destination, true);
            if (is_array($decoded) && isset($decoded[0])) {
                $destination = $decoded[0];
            }
        }

        $directions = $this->getRoutePolyline($pickup, $destination);
        if ($directions && isset($directions['overview_polyline']['points'])) {
            $ridesbooked->route_polyline = $directions['overview_polyline']['points'];
        }

        if ($driverriderequest->total_transport_capacity >= $reserved_kilo + $userfarerequest->requested_kilos){
            $ridesbooked->save();

            $userfarerequest->status = 'accepted';
            $userfarerequest->save();

            $reserved_kilo = ReservedKiloRidebooked::where('driverriderequest_id','=',$driverriderequest_id)
                ->where('status','active')
                ->sum('reserved_kilo');

            $driverriderequest->available_transport_capacity = $driverriderequest->available_transport_capacity - $userfarerequest->requested_kilos;
            $driverriderequest->save();
        }

        if ($driverriderequest->total_transport_capacity == $reserved_kilo) {
            $driverriderequest->status = 'accepted';
            $driverriderequest->save();
        }

        $user = User::find($ridesbooked->user_id);
        $driver = Driver::find($driverriderequest->driver_id);

        $message = Carbon::now() . ' A ride has been booked with carrier '.$driver->name. ' and Sender ' .$user->name;

        if ($user && $user->email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\ReservedKiloRideBookedNotification($ridesbooked));
                Mail::to($ridesbooked->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRideBookedNotification($ridesbooked));
                Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRideBookedNotification($ridesbooked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()
            ->back()
            ->with([
                'success' => 'Ride booked successfully',
                'ridesbooked' => $ridesbooked,
            ]);
    }


    public function start_reserved_kilo_ride($id)
    {

        try {

            $ride_booked = ReservedKiloRidebooked::find($id);
            $ride_booked->message = 'delivery in progress';
            $ride_booked->date_and_time_of_followup = Carbon::now();
            $ride_booked->save();

            $user = User::find($ride_booked->user_id);
            $driver = Driver::find($ride_booked->driver_id);
            $message = Carbon::now() . ' Carrier '.$driver->name. ' Has just started Ride and is on the way to Destination';

                try {
                    Notification::send($user, new \App\Notifications\RideBooked($message));
                    Notification::send($user, new \App\Notifications\RideBooked($message));
                    Mail::to($user->email)->send(new \App\Mail\CarrierStartedReservedKiloRide($ride_booked));
                    Mail::to($driver->email)->send(new \App\Mail\CarrierStartedReservedKiloRide($ride_booked));
                    Mail::to($ride_booked->userfarerequest->receiver_email)->send(new \App\Mail\CarrierStartedReservedKiloRide($ride_booked));
                }
                catch (\Exception $e) {
                    Log::info($e->getMessage());
                }

            return redirect()->route('driver.my_rides')->with('success', 'Ride Started successfully!');
        }
        catch (\Exception $e) {
            Log::error('User Registration Error: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function reserved_kilo_ride_complete_request($ride_id)
    {
        $ride_booked = ReservedKiloRidebooked::find($ride_id);
        $ride_booked->message = 'transport completed awaiting validation';
        $ride_booked->date_and_time_of_followup = Carbon::now();
        $ride_booked->save();

        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  Carbon::now() .'Carrier '.$driver->name. ' ' .$driver->email. ' wants to complete ride with you.';
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($ride_booked->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRideCompleteRequest($ride_booked));
                Mail::to($user->email)->send(new \App\Mail\ReservedKiloRideCompleteRequest($ride_booked));
                Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRideCompleteRequest($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }

        return redirect()->back()->with('success', 'Transport Completed Awaiting Validation');

    }

    public function reserved_kilo_package_returned_request($ride_id)
    {
        $ride_booked = ReservedKiloRidebooked::find($ride_id);
        $ride_booked->message = 'Parcel returned';
        $ride_booked->date_and_time_of_followup = Carbon::now();
        $ride_booked->save();

        $driver = Driver::find($ride_booked->driver_id);
        $user = User::find($ride_booked->user_id);
        $message =  Carbon::now() .'Carrier '.$driver->name. ' ' .$driver->email. ' returned Parcel and awaiting validation';

            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($ride_booked->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRidePackageReturnedRequest($ride_booked));
                Mail::to($user->email)->send(new \App\Mail\ReservedKiloRidePackageReturnedRequest($ride_booked));
                Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRidePackageReturnedRequest($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }

        return redirect()->back()->with('success', 'Parcel returned, Awaiting Confirmation');

    }

    public function cancel_reserved_kilo_ride(Request $request)
    {

        $ride_booked = ReservedKiloRidebooked::find($request->id);

//        $is_return = in_array(
//            $ride_booked->message,
//            ['carrier is on its way to pick up the package', 'delivery in progress ']
//        );

        if ($ride_booked->status =='active' && (in_array($ride_booked->message,['Package Awaiting Collection','delivery in progress to collection address','Package Collected Requested','Package Collected','delivery in progress']))){

            $ride_booked->status = 'cancelled';
            $ride_booked->cancelled_notes = $request->reason;
            $ride_booked->message = $request->is_user_cancelled == 'true' ? 'User Cancelled Ride' : 'Carrier Cancelled Ride';
            $ride_booked->is_return = false;
            $ride_booked->date_and_time_of_followup = Carbon::now();
            $ride_booked->is_user_cancelled = $request->is_user_cancelled == 'true' ? true : false;
            $ride_booked->save();

            $driver_ride_request = Driverriderequest::find($ride_booked->driverriderequest_id);
            $driver_ride_request->available_transport_capacity = $driver_ride_request->available_transport_capacity + (int) $ride_booked->reserved_kilo;
            $driver_ride_request->save();

            $driver = Driver::find($ride_booked->driver_id);
            $user = User::find($ride_booked->user_id);
            $message =  \Illuminate\Support\Carbon::now() .'Sender '.$user->name. ' ' .$user->email. ' ride has been cancelled with carrier '. $driver->name .' ' .$driver->email.'.';
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($ride_booked->userfarerequest->receiver_email)->send(new \App\Mail\ReservedKiloRideCancelled($ride_booked));
                Mail::to($user->email)->send(new \App\Mail\ReservedKiloRideCancelled($ride_booked));
                Mail::to($driver->email)->send(new \App\Mail\ReservedKiloRideCancelled($ride_booked));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }
        else{

//            $ride_booked->status = $request->is_user_cancelled == 'true' ? 'user_cancelled_ride' : 'carrier_cancelled_ride';
            $ride_booked->status = 'active';
            $ride_booked->cancelled_notes = $request->reason;
            $ride_booked->message = $request->is_user_cancelled == 'true' ? 'User Cancelled Ride' : 'Carrier Cancelled Ride';
            $ride_booked->is_return = true;
            $ride_booked->date_and_time_of_followup = Carbon::now();
            $ride_booked->is_user_cancelled = $request->is_user_cancelled == 'true' ? true : false;
            $ride_booked->save();

        }

        return redirect()->back()->with('success', 'Ride Cancelled successfully!');
    }

    public function updateDatetime(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:driverriderequests,id',
            'field' => 'required|in:departure_datetime,arrival_datetime,end_reservation_date',
            'value' => 'required|date',
        ]);

        $offer = Driverriderequest::findOrFail($request->id);
        $offer->{$request->field} = $request->value;
        $offer->save();

        return response()->json(['message' => ucfirst(str_replace('_', ' ', $request->field)) . ' updated successfully!']);
    }

    public function update_booking($id)
    {
        $ride = Driverriderequest::find($id);
        $ride->is_booking_closed = !$ride->is_booking_closed;
        $ride->save();
        return redirect()->back()->with('success', 'Ride Booking updated successfully!');
    }

}
