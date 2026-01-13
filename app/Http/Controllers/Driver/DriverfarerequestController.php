<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Farerequest;
use App\Models\Ridesbooked;
use App\Models\User;
use App\Models\Userriderequest;
use App\Notifications\RideBooked;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class DriverfarerequestController extends Controller
{
    public function home()
    {

//       webhook secret token CEAtRB9r2CymSAUFbGhefT8QNjufecjD

//        $mollie = new \Mollie\Api\MollieApiClient();
//        $mollie->setApiKey("test_RVMhQjNtAFGt8Q8JSK9AtdpqFnEfce");
//
//        $payment = $mollie->payments->create([
//            "amount" => [
//                "currency" => "EUR",
//                "value" => "10.00"
//            ],
//            "description" => "My first API payment",
//            "redirectUrl" => "https://webshop.example.org/order/453/",
//            "webhookUrl"  => "https://webshop.example.org/mollie-webhook/",
//        ]);
//
//        $getpayment = $mollie->payments->get($payment->id);
//
//        dd($getpayment);

//        $driver = Driver::find(Auth::guard('driver')->user()->id);
//        $driverTransports = json_decode($driver->means_of_transport ?? '[]', true);

        $userriderequests = Userriderequest::with(['user', 'packagetype', 'packagesubtype'])
            ->where('status', 'waiting')
            ->where('expiry', '>', \Carbon\Carbon::now())
            ->whereNull('is_targetted')
            ->orderByDesc('id')
            ->get();
//            ->filter(function ($request) use ($driverTransports) {
//                $requestTransports = json_decode($request->means_of_transport ?? '[]', true);
//                return !empty(array_intersect($driverTransports, $requestTransports));
//            });
        return view('driver-app.home', compact('userriderequests'));
    }

    public function accept_ride($id){
        $userriderrequest = Userriderequest::findorfail($id);
        if ($userriderrequest->status == 'accepted') {
            return redirect()->route('driver.home')->with('success', 'Ride accepted by another driver');
        }
        $driver_fare_requests = Farerequest::where('riderequest_id', $id)->get();
        $lastUserFareRequest = $driver_fare_requests
            ->whereNotNull('user_id')
            ->sortBy('created_at')
            ->last();
        return view('driver-app.negotiation',
            compact('lastUserFareRequest'),
            [
                'userriderequest'=>$userriderrequest,
                'driver_fare_requests' => $driver_fare_requests
            ]);
    }

    public function user_negotiation($ride_request_id,$driver_id){

        $userriderrequest = Userriderequest::with('user')->findOrFail($ride_request_id);
        if ($userriderrequest->status == 'accepted') {
            return redirect()->route('user.dashboard')->with('success', 'Ride accepted by driver');
        }
        $driver_fare_requests = Farerequest::where('riderequest_id', $ride_request_id)
            ->where(function ($query) use ($driver_id){
                $query->where('driver_id', $driver_id)
                    ->orwhere('user_id', Auth::guard('user')->user()->id);
            })
            ->with('user')
            ->get();
        $lastUserFareRequest = $driver_fare_requests
            ->whereNotNull('driver_id')
            ->sortBy('created_at')
            ->last();

        return view('user-app.negotiation',
            compact('lastUserFareRequest'),
            ['userriderequest'=>$userriderrequest,
                'driver_fare_requests' => $driver_fare_requests,
                'driver_id' => $driver_id,
                'ride_request_id' => $ride_request_id
            ]);
    }

    public function request_fare(Request $request)
    {
        $driverId = Auth::guard('driver')->id();

        $Farerequest = new Farerequest();
        $Farerequest->driver_id = $driverId;
        $Farerequest->request_id = 'CT' . now()->year . '-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        $Farerequest->riderequest_id = $request->userriderequest_id;
        $Farerequest->requested_fare = $request->requested_fare;
        $Farerequest->driver_location_latitude = $request->driver_location_latitude;
        $Farerequest->driver_location_longitude = $request->driver_location_longitude;
        $Farerequest->expiry = Carbon::now()->addMinutes(10);
        $Farerequest->status = 'waiting'; // Optional: set explicitly if required
        $Farerequest->save();

        $userriderequest = Userriderequest::find($request->userriderequest_id);
        $user = User::find($userriderequest->user_id);
        $driver = Driver::find($driverId);
        $message = \Illuminate\Support\Carbon::now() . ' Carrier '.$driver->name. ' send a Price negotiation for the offer from '. $userriderequest->pickup_location .' to '. $userriderequest->destination_location;

        try {
            Notification::send($user, new RideBooked($message));
            Notification::send($driver, new RideBooked($message));
            Mail::to($user->email)->send(new \App\Mail\PriceNegotiationSend($Farerequest));
            Mail::to($driver->email)->send(new \App\Mail\PriceNegotiationSend($Farerequest));
        }
        catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return redirect()->back()->with(['success' => 'Driver Requested the Fare Successfully']);
    }

    public function get_driver_ride_request_status($id)
    {
        $driver_fare_request = Driverfarerequest::where('userriderequest_id',$id)
            ->where('driver_id', Auth::guard('driver')->id())
            ->orderBy('id','desc')
            ->first();
        $ride_status = Ridesbooked::where('userriderequest_id',$id)
            ->first();
        return response()->json([
            'status' => $driver_fare_request ? $driver_fare_request->status : null,
            'ride_status' => $ride_status ? $ride_status : null,
            'message' => 'Ride has been booked.'
        ]);
    }
}
