<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Driverfarerequest;
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
        return view('driver-app.negotiation',['userriderequest'=>$userriderrequest]);
//        return view('driver-app.accept-ride',['userriderequest'=>$userriderrequest]);
    }
    public function request_fare(Request $request)
    {
        $driverId = Auth::guard('driver')->id();

        $driverfarerequest = Driverfarerequest::where('driver_id', $driverId)
            ->where('userriderequest_id', $request->userriderequest_id)
            ->where('status', 'waiting')
            ->orderBy('id', 'desc')
            ->first();

        if (!$driverfarerequest) {
            $driverfarerequest = new Driverfarerequest();
            $driverfarerequest->driver_id = $driverId;
        }
        $driverfarerequest->request_id = 'CT' . now()->year . '-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        $driverfarerequest->userriderequest_id = $request->userriderequest_id;
        $driverfarerequest->requested_fare = $request->requested_fare;
        $driverfarerequest->means_of_transport = $request->means_of_transport;
        $driverfarerequest->driver_location_latitude = $request->driver_location_latitude;
        $driverfarerequest->driver_location_longitude = $request->driver_location_longitude;
        $driverfarerequest->expiry = Carbon::now()->addMinutes(2);
        $driverfarerequest->status = 'waiting'; // Optional: set explicitly if required
        $driverfarerequest->save();

        $userriderequest = Userriderequest::find($request->userriderequest_id);
        $user = User::find($userriderequest->user_id);
        $driver = Driver::find($driverId);
        $message = \Illuminate\Support\Carbon::now() . ' Carrier '.$driver->name. ' send a Price negotiation for the offer from '. $userriderequest->pickup_location .' to '. $userriderequest->destination_location;

        try {
            Notification::send($user, new RideBooked($message));
            Notification::send($driver, new RideBooked($message));
            Mail::to($user->email)->send(new \App\Mail\PriceNegotiationSend($driverfarerequest));
            Mail::to($driver->email)->send(new \App\Mail\PriceNegotiationSend($driverfarerequest));
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
