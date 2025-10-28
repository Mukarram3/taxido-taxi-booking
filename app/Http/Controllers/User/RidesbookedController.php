<?php

namespace App\Http\Controllers\User;

use App\Events\MessageSent;
use App\Events\RideBooked;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Driverfarerequest;
use App\Models\Message;
use App\Models\ReservedKiloRidebooked;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class RidesbookedController extends Controller
{
    public function accept_ride_details(Request $request)
    {
        $driverfarerequest = Driverfarerequest::where('id', $request->input('driverfarerequest_id'))->first();
        $userriderequest_id = $driverfarerequest->userriderequest_id;
        $userriderequest = Userriderequest::find($userriderequest_id);

        $ridesbooked = Ridesbooked::where('userriderequest_id','=',$userriderequest_id)->first();
        if ($ridesbooked) {
            return redirect()->route('user.home')->with(['success' => 'Ride booked by a driver']);
        }

        $packages = json_decode($userriderequest->packages_json, true);
        $packageCount = count($packages);

        $ridesbooked = new Ridesbooked();
        $ridesbooked->reference_id = 'RSV-' . now()->year . '-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        $ridesbooked->userriderequest_id = $userriderequest->id;
        $ridesbooked->user_id = $userriderequest->user_id;
        $ridesbooked->driver_id = $request->driver_id;
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
        $ridesbooked->quantity_of_package = $packageCount;
        $ridesbooked->fare                = $driverfarerequest->requested_fare;
        $ridesbooked->means_of_transport                = $driverfarerequest->means_of_transport;
        $ridesbooked->payment_method      = $userriderequest->payment_method;
        $ridesbooked->expiry = $userriderequest->expiry_date;
        $ridesbooked->driver_lat = $driverfarerequest->driver_location_latitude;
        $ridesbooked->driver_lng = $driverfarerequest->driver_location_longitude;
        $ridesbooked->date_and_time_of_followup = Carbon::now();
        $ridesbooked->parcel_pictures = $userriderequest->parcel_pictures;
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

        $driverfarerequest->status = 'accepted';
        $driverfarerequest->save();
        $userriderequest->status = 'accepted';
        $userriderequest->fare = $driverfarerequest->requested_fare;
        $userriderequest->save();

        $user = User::find($ridesbooked->user_id);
        $driver = Driver::find($request->driver_id);
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

        return view('user-app.accept-ride-details',['ridesbooked' => $ridesbooked])->with(['success' => 'Ride booked successfully']);
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

    public function reject_ride_details(Request $request)
    {
        $driverfarerequest = Driverfarerequest::where('id', $request->input('driver_request_id'))->with('userriderequest')->first();
        $driverfarerequest->status = 'rejected';
        $driverfarerequest->save();

        $driverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->where('status','!=','rejected')
            ->get();
        $user = User::find($driverfarerequest->userriderequest->user_id);
        $driver = Driver::find($driverfarerequest->driver->id);
        $message = Carbon::now() . ' Sender '.$user->name.  ' rejected the requested price '. $driverfarerequest->requested_fare .' of Carrier ' .$driver->name;
        try {
            Notification::send($driver, new \App\Notifications\RideBooked($message));
            Mail::to($driver->email)->send(new \App\Mail\FareRejected($driverfarerequest));
        }
        catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Driver Fare request rejected successfully.'
        ]);
        return response()->json($driverFareRequests);
    }

    public function chat(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::guard('driver')->id(),
            'sender_type' => 'App\Models\Driver', // User or Driver
            'receiver_id' => '1',
            'receiver_type' => 'App\Models\User', // 'App\Models\User' or 'App\Models\Driver'
            'body' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['message' => $message]);
    }

    public function request_package_collected($id)
    {
        $reserved_ride_kilo = ReservedKiloRidebooked::find($id);
        $reserved_ride_kilo->message = 'Package Collected Requested';
        $reserved_ride_kilo->save();

        $user = User::find($reserved_ride_kilo->user_id);
        $driver = Driver::find($reserved_ride_kilo->driver_id);

        $message = Carbon::now() . ' Sender '.$user->name. ' asked for confirmation of package collected ';

        if ($user && $user->email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\SenderConfirmationPackageCollected($reserved_ride_kilo));
                Mail::to($reserved_ride_kilo->userfarerequest->receiver_email)->send(new \App\Mail\SenderConfirmationPackageCollected($reserved_ride_kilo));
                Mail::to($driver->email)->send(new \App\Mail\SenderConfirmationPackageCollected($reserved_ride_kilo));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Package Collected Requested');
    }

    public function start_package_delivery_collection_address($id)
    {
        $reserved_ride_kilo = ReservedKiloRidebooked::find($id);
        $reserved_ride_kilo->message = 'delivery in progress to collection address';
        $reserved_ride_kilo->save();

        $user = User::find($reserved_ride_kilo->user_id);
        $driver = Driver::find($reserved_ride_kilo->driver_id);

        $message = Carbon::now() . ' Sender '.$user->name. ' is on the way to deliver package to collection address ';

        if ($user && $user->email) {
            try {
                Notification::send($user, new \App\Notifications\RideBooked($message));
                Notification::send($driver, new \App\Notifications\RideBooked($message));
                Mail::to($user->email)->send(new \App\Mail\SenderStartedReservedKiloRide($reserved_ride_kilo));
                Mail::to($reserved_ride_kilo->userfarerequest->receiver_email)->send(new \App\Mail\SenderStartedReservedKiloRide($reserved_ride_kilo));
                Mail::to($driver->email)->send(new \App\Mail\SenderStartedReservedKiloRide($reserved_ride_kilo));
            }
            catch (\Exception $e) {
                Log::info($e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Delivery in Progress');
    }

}
