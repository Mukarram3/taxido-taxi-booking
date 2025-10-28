<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Driverriderequest;
use App\Models\ReservedKiloRidebooked;
use App\Models\User;
use App\Models\Userfarerequest;
use App\Notifications\RideBooked;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class UserfarerequestController extends Controller
{
    public function accept_ride($id){
        $driverriderrequest = Driverriderequest::findorfail($id);
        if ($driverriderrequest->status == 'accepted') {
            return redirect()->route('user.home')->with('success', 'Total kilos have been reserved');
        }
        $rserved_kilo_ride = ReservedKiloRidebooked::where('driverriderequest_id',$id)
            ->where('user_id', Auth::guard('user')->user()->id)
            ->where('status','active')
            ->first();

        if ($rserved_kilo_ride) {
            return redirect()->route('user.home')->with('success', 'Your Ride is Accepted');
        }
        return view('user-app.accept-ride',['driverriderrequest'=>$driverriderrequest]);
    }

    public function home()
    {

        $driverriderequests = Driverriderequest::with(['driver'])
            ->where('status', 'waiting')
            ->where('is_booking_closed', '0')
            ->where('end_reservation_date', '>', \Carbon\Carbon::now())
            ->orderByDesc('id')
            ->get();
        return view('user-app.home', compact('driverriderequests'));
    }

    public function request_fare(Request $request)
    {

        $userId = Auth::guard('user')->id();

        $Userfarerequest = Userfarerequest::where('user_id', $userId)
//            ->where('expiry', '>', Carbon::now()->subMinutes(2))
            ->where('status', 'waiting')
            ->orderBy('id', 'desc')
            ->first();

        if (!$Userfarerequest) {
            $Userfarerequest = new Userfarerequest();
            $Userfarerequest->user_id = $userId;
        }
        $Userfarerequest->driverriderequest_id = $request->driverriderequest_id;
        $Userfarerequest->requested_fare = $request->requested_fare;
        $Userfarerequest->requested_kilos = $request->requested_kilos;
        $Userfarerequest->driver_location_latitude = $request->driver_location_latitude;
        $Userfarerequest->driver_location_longitude = $request->driver_location_longitude;
        $Userfarerequest->receiver_name = $request->receiver_name;
        $Userfarerequest->receiver_email = $request->receiver_email;
        $Userfarerequest->receiver_phone = $request->receiver_phone;
        $Userfarerequest->expiry = Carbon::now()->addMinutes(2);
        $Userfarerequest->status = 'waiting'; // Optional: set explicitly if required
        $Userfarerequest->save();

        $Driverriderequest = Driverriderequest::find($request->driverriderequest_id);
        $user = User::find($userId);
        $driver = Driver::find($Driverriderequest->driver_id);
        $destination = is_array($Driverriderequest->destination_location)
            ? implode(', ', $Driverriderequest->destination_location)
            : $Driverriderequest->destination_location;

        $message = \Illuminate\Support\Carbon::now()
            . ' Sender ' . $user->name
            . ' send a Price negotiation for the offer from ' . $Driverriderequest->pickup_location
            . ' to ' . $destination;

        try {
            Notification::send($user, new RideBooked($message));
            Notification::send($driver, new RideBooked($message));
            Mail::to($user->email)->send(new \App\Mail\ReservedKiloPriceNegotiationSend($Userfarerequest));
            Mail::to($driver->email)->send(new \App\Mail\ReservedKiloPriceNegotiationSend($Userfarerequest));
        }
        catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return redirect()->back()->with(['success' => 'Driver Requested the Fare Successfully']);
    }
}
