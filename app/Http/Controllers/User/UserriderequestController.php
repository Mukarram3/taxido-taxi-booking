<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Driverfarerequest;
use App\Models\Driverriderequest;
use App\Models\Ridesbooked;
use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserriderequestController extends Controller
{

    public function dashboard(){
        return view('user-app.dashboard');
    }

    public function selact_ride(Request $request){
        return view('user-app.selact-ride', ['request' => $request]);
    }

    public function selact_ride_targetted_transport_route(Request $request)
    {
        return view('user-app.selact-ride-targetted-transport-route', ['request' => $request]);
    }

    public function driver_fare_request_backup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // Pickup & Destination
            'pickup_address'              => 'required|string|max:255',
            'pickup_zip_code'             => 'required|string|max:20',
            'pickup_house_no'             => 'nullable|string|max:50',
            'pickup_additional_info'      => 'nullable|string|max:500',

            'destination_address'         => 'required|string|max:255',
            'destination_zip_code'        => 'required|string|max:20',
            'destination_house_no'        => 'nullable|string|max:50',
            'destination_additional_info' => 'nullable|string|max:500',

            // Dates
            'pickup_date'                 => 'required|date|after_or_equal:today',
            'delivery_date'               => 'required|date|after_or_equal:pickup_date',
            'preffered_time_slot'         => 'nullable|string|in:morning,afternoon,evening,flexible',

            // Packages (JSON string)
            'packages_json'               => 'required|json',

            // Extra fields
            'categories'                  => 'required|json',
            'subcategories'               => 'required|json',
            'services'                    => 'required|json',
            'badges'                      => 'nullable|json',
            'insurance'                   => 'nullable|string|max:100',

            // Package values
            'total_declared_value'        => 'required|numeric|min:0',
            'fare'                        => 'required|numeric|min:0',
            'special_condition'           => 'nullable|string',

            // Receiver (renamed to match payload)
            'recipient_name'              => 'required|string|max:255',
            'recipient_email'             => 'required|email|max:255',
            'recipient_number'            => 'required|string|max:20',
            'recipient_delivery_instrcutions' => 'nullable|string|max:1000',

            // Optional coordinates
            'pickup_location_latitude'    => 'nullable|numeric|between:-90,90',
            'pickup_location_longitude'   => 'nullable|numeric|between:-180,180',

            // Shipment
            'shipment_description'        => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userriderequest = new Userriderequest();
        $userriderequest->reference_id = 'OFR-' . now()->year . '-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        $userriderequest->user_id             = Auth::guard('user')->id();
        $userriderequest->receiver_name   = $request->recipient_name;
        $userriderequest->receiver_email  = $request->recipient_email;
        $userriderequest->receiver_phone  = $request->recipient_number;
        $userriderequest->recipient_delivery_instructions = $request->recipient_delivery_instrcutions ?? null;
        $userriderequest->pickup_location        = $request->pickup_address;
        $userriderequest->pickup_zip_code       = $request->pickup_zip_code;
        $userriderequest->pickup_house_no       = $request->pickup_house_no ?? null;
        $userriderequest->pickup_additional_info= $request->pickup_additional_info ?? null;
        $userriderequest->destination_location   = $request->destination_address;
        $userriderequest->destination_zip_code  = $request->destination_zip_code;
        $userriderequest->destination_house_no  = $request->destination_house_no ?? null;
        $userriderequest->destination_additional_info = $request->destination_additional_info ?? null;
        $userriderequest->pickup_location_latitude  = $request->pickup_location_latitude;
        $userriderequest->pickup_location_longitude = $request->pickup_location_longitude;
        $userriderequest->pickup_date   = $request->pickup_date;
        $userriderequest->delivery_date = $request->delivery_date;
        $userriderequest->preferred_time_slot = $request->preffered_time_slot ?? null;
        $userriderequest->packages_json = $request->packages_json; // already JSON string
        $userriderequest->services  = $request->services ?? null;
        $userriderequest->insurance = $request->insurance ?? null;
        $userriderequest->shipment_description = $request->shipment_description;
        $userriderequest->fare                  = $request->fare;
        $userriderequest->total_declared_value  = $request->total_declared_value ?? null;
        $userriderequest->is_urgent       = in_array('urgent', json_decode($request->badges ?? '[]'));
        $userriderequest->is_professional = in_array('professional', json_decode($request->badges ?? '[]'));
        $userriderequest->message = 'Carrier search in progress';
        $userriderequest->payment_method      = 'online';
        $userriderequest->distance      = $request->distance;
        $userriderequest->type_of_package      = $request->categories;
        $userriderequest->sub_type_of_package      = $request->subcategories;
        if ($request->hasFile('parcel_pictures')) {
            $imagePaths = [];
            $imagePaths = [];
            $files = $request->file('parcel_pictures');

            if (!is_array($files)) {
                $files = [$files];
            }
            foreach ($files as $image) {
                try {
                    $path = $image->store('documents/parcel_pictures', 'public');
                    $imagePaths[] = $path;
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }

            $userriderequest->parcel_pictures = json_encode($imagePaths);
        }

        $userriderequest->save();
        return view('home');
    }

    public function driver_fare_request(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // Pickup & Destination
            'pickup_address'              => 'required|string|max:255',
            'pickup_zip_code'             => 'required|string|max:20',
            'pickup_house_no'             => 'nullable|string|max:50',
            'pickup_additional_info'      => 'nullable|string|max:500',

            'destination_address'         => 'required|string|max:255',
            'destination_zip_code'        => 'required|string|max:20',
            'destination_house_no'        => 'nullable|string|max:50',
            'destination_additional_info' => 'nullable|string|max:500',

            // Dates
            'pickup_date'                 => 'required|date|after_or_equal:today',
            'delivery_date'               => 'required|date|after_or_equal:pickup_date',
            'expiry_date'                 => 'required|date|after_or_equal:delivery_date',
            'preffered_time_slot'         => 'nullable|string|in:morning,afternoon,evening,flexible',

            // Packages (JSON string)
            'packages_json'               => 'required|json',

            // Extra fields
            'categories'                  => 'required|json',
            'subcategories'               => 'required|json',
            'vehicle_type_needed'                    => 'nullable',
            'badges'                      => 'nullable|json',
            'insurance'                   => 'nullable|string|max:100',

            // Package values
            'total_declared_value'        => 'required|numeric|min:0',
            'special_condition'           => 'nullable|string',

            // Receiver (renamed to match payload)
            'recipient_name'              => 'required|string|max:255',
            'recipient_email'             => 'required|email|max:255',
            'recipient_number'            => 'required|string|max:20',
            'recipient_delivery_instrcutions' => 'nullable|string|max:1000',

            // Optional coordinates
            'pickup_location_latitude'    => 'nullable|numeric|between:-90,90',
            'pickup_location_longitude'   => 'nullable|numeric|between:-180,180',

            // Shipment
            'shipment_description'        => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {

            $userriderequest = new Userriderequest();
            $userriderequest->reference_id = 'OFR-' . now()->year . '-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
            $userriderequest->user_id             = Auth::guard('user')->id();
            $userriderequest->receiver_name       = $request->recipient_name;
            $userriderequest->receiver_email      = $request->recipient_email;
            $userriderequest->receiver_phone      = $request->recipient_number;
            $userriderequest->recipient_delivery_instructions = $request->recipient_delivery_instrcutions ?? null;

            // Pickup & Destination
            $userriderequest->pickup_location         = $request->pickup_address;
            $userriderequest->pickup_zip_code         = $request->pickup_zip_code;
            $userriderequest->pickup_house_no         = $request->pickup_house_no ?? null;
            $userriderequest->pickup_additional_info  = $request->pickup_additional_info ?? null;
            $userriderequest->destination_location    = $request->destination_address;
            $userriderequest->destination_zip_code    = $request->destination_zip_code;
            $userriderequest->destination_house_no    = $request->destination_house_no ?? null;
            $userriderequest->destination_additional_info = $request->destination_additional_info ?? null;
            $userriderequest->pickup_location_latitude  = $request->pickup_location_latitude;
            $userriderequest->pickup_location_longitude = $request->pickup_location_longitude;

            $userriderequest->pickup_date   = $request->pickup_date;
            $userriderequest->delivery_date = $request->delivery_date;
            $userriderequest->expiry_date   = $request->expiry_date;
            $userriderequest->preferred_time_slot = $request->preffered_time_slot ?? null;

            // JSON Data
            $userriderequest->packages_json = $request->packages_json;
            $userriderequest->vehicle_type_needed      = $request->vehicle_type_needed ?? null;
            $userriderequest->insurance     = $request->insurance ?? null;

            // Shipment and fare details
            $userriderequest->shipment_description  = $request->shipment_description;
            $userriderequest->fare                  = $request->budget_option == 'suggested' ? $request->suggested_fare : $request->custom_fare;
            $userriderequest->total_declared_value  = $request->total_declared_value ?? null;
            $userriderequest->special_condition     = $request->special_condition ?? null;

            // Badges and flags
            $userriderequest->is_urgent       = in_array('urgent', json_decode($request->badges ?? '[]'));
            $userriderequest->is_professional = in_array('professional', json_decode($request->badges ?? '[]'));
            $userriderequest->is_personal = in_array('personal', json_decode($request->badges ?? '[]'));
            $userriderequest->is_homePickup  = $request->has('is_homePickup') ? 1 : 0;
            $userriderequest->is_homeDelivery = $request->has('is_homeDelivery') ? 1 : 0;
            $userriderequest->is_needHelp    = $request->has('is_needHelp') ? 1 : 0;

            // Misc
            $userriderequest->message          = 'Carrier search in progress';
            $userriderequest->payment_method   = $request->payment_method ?? 'online';
            $userriderequest->card_holdername   = $request->card_holdername ?? null;
            $userriderequest->invoice_email   = $request->invoice_email ?? null;
            $userriderequest->distance         = $request->distance;
            $userriderequest->type_of_package  = $request->categories;
            $userriderequest->sub_type_of_package = $request->subcategories;

            // Parcel images
            if ($request->hasFile('parcel_pictures')) {
                $imagePaths = [];
                $files = $request->file('parcel_pictures');
                if (!is_array($files)) $files = [$files];
                foreach ($files as $image) {
                    try {
                        $path = $image->store('documents/parcel_pictures', 'public');
                        $imagePaths[] = $path;
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                    }
                }
                $userriderequest->parcel_pictures = json_encode($imagePaths);
            }

            $userriderequest->save();
            return response()->json([
                'status'  => true,
                'message' => 'success',
            ]);

        }
        catch (\Exception $exception){
            return response()->json([
                'status'  => 'error',
                'message' => 'Server error: ' . $exception->getMessage(),
            ], 500);
        }
    }

    public function targetted_driver_fare_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pickup_location'           => 'required|string|max:255',

            'destination_location'      => 'required|array|min:1',
            'destination_location.*'    => 'required|string|max:255',

            'length_of_package'         => 'required|string|max:255',
            'width_of_package'          => 'required|string|max:255',
            'weight_of_package'         => 'required|string|max:255',
            'type_of_package'           => 'required|string|max:255',
            'sub_type_of_package'       => 'required|string|max:255',

            'quantity_of_package'       => 'required|string|max:255',
            'fare'                      => 'required|string|max:255',
            'fare_currency'             => 'required|string|max:255',

            'comments'                  => 'required|string',
            'parcel_pictures.*'         => 'image|mimes:jpg,jpeg,png',

            'payment_method'            => 'required|string|max:100',

            // Newly added validations:
            'receiver_name'             => 'required|string|max:255',
            'receiver_email'            => 'required|email|max:255',
            'receiver_phone'            => 'required|string|max:20',

            'pickup_location_latitude'  => 'required|numeric|between:-90,90',
            'pickup_location_longitude' => 'required|numeric|between:-180,180',

//            'departure_date'            => 'required|date|after_or_equal:today',
//            'arrival_date'              => 'required|date|after_or_equal:departure_date',

            'transport_title'           => 'required|string|max:255',

            'distance'                  => 'nullable',

//            'means_of_transport'        => 'required',
//            'means_of_transport.*'      => 'required|string|max:255',

            'deadline_date'             => 'required|date|after_or_equal:today',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userriderequest = new Userriderequest();
        $userriderequest->user_id             = Auth::guard('user')->id();
        $userriderequest->receiver_name     = $request->receiver_name;
        $userriderequest->receiver_email     = $request->receiver_email;
        $userriderequest->receiver_phone     = $request->receiver_phone;
        $userriderequest->pickup_location     = $request->pickup_location;
        $userriderequest->destination_location = json_encode($request->destination_location); // store as JSON
        $userriderequest->pickup_location_latitude      = $request->pickup_location_latitude; // assuming current time as departure
        $userriderequest->pickup_location_longitude      = $request->pickup_location_longitude; // assuming current time as departure
        $userriderequest->departure_date      = $request->departure_date; // assuming current time as departure
        $userriderequest->transport_title      = $request->transport_title; // assuming current time as departure
        $userriderequest->arrival_date        = $request->arrival_date;
        $userriderequest->distance            = $request->distance ?? 0;
        $userriderequest->type_of_package   = $request->type_of_package;
        $userriderequest->sub_type_of_package   = $request->sub_type_of_package;
        $userriderequest->length_of_package   = $request->length_of_package;
        $userriderequest->width_of_package    = $request->width_of_package;
        $userriderequest->weight_of_package    = $request->weight_of_package;
//        $userriderequest->volume_of_package   = $request->volume_of_package;
        $userriderequest->quantity_of_package = $request->quantity_of_package;
        $userriderequest->fare                = $request->fare;
        $userriderequest->fare_currency               = $request->fare_currency;
//        $userriderequest->travel_company      = $request->travel_company;
        $userriderequest->comments            = $request->comments;
        $userriderequest->message            = 'Carrier search in progress';
        $userriderequest->is_urgent = $request->is_urgent == 'is_urgent' ? true : false;
        $userriderequest->is_professional = $request->is_professional == 'is_urgent' ? true : false;

        $userriderequest->targetted_driver_id = $request->driver_id;
        $userriderequest->is_targetted = '1';

        if ($request->hasFile('parcel_pictures')) {
            $imagePaths = [];
            $imagePaths = [];
            $files = $request->file('parcel_pictures');

            if (!is_array($files)) {
                $files = [$files];
            }
            foreach ($files as $image) {
                try {
                    $path = $image->store('documents/parcel_pictures', 'public');
                    $imagePaths[] = $path;
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }

            $userriderequest->parcel_pictures = json_encode($imagePaths);
        }

//        dd($userriderequest);

        $userriderequest->payment_method      = $request->payment_method;
        $userriderequest->expiry              = $request->deadline_date;
        $userriderequest->save();
        return response()->json([
            'success' => true,
            'userriderequest_id' => $userriderequest->id,
        ]);
    }

    public function get_driver_fare_request(Request $request)
    {

        $userriderequest = Userriderequest::where('id',$request->input('userriderequest_id'))->first();

        $ridebooked = Ridesbooked::where('user_id',Auth::guard('user')->id())
            ->where('userriderequest_id',$userriderequest->id)
            ->where('pickup_location',$userriderequest->pickup_location)
            ->where('destination_location',$userriderequest->destination_location)
            ->where('fare',$userriderequest->fare)
            ->where('payment_method',$userriderequest->payment_method)
            ->where('departure_date',$userriderequest->departure_date)
            ->get();

        if ($ridebooked->isNotEmpty()) {
            return response()->json(['ridebooked' => true]);
        }

        Log::info($request->input('userriderequest_id'));
        $driverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->where('status','!=','rejected')
            ->orderBy('id', 'desc')
            ->get();
        $userLat = $userriderequest->pickup_location_latitude;
        $userLng = $userriderequest->pickup_location_longitude;

// Add user lat/lng to each item
        $driverFareRequests->transform(function ($item) use ($userLat, $userLng) {
            $item->user_lat = $userLat;
            $item->user_lng = $userLng;
            return $item;
        });
        return response()->json($driverFareRequests);
    }
    public function get_pending_driver_fare_request(Request $request)
    {

        $userriderequest = Userriderequest::where('id',$request->input('userriderequest_id'))->first();

        $driverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
            ->where('expiry', '>', Carbon::now())
            ->where('status','!=','rejected')
            ->orderBy('id', 'desc')
            ->get();

        $accepteddriverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
            ->where('status','accepted')
            ->orderBy('id', 'desc')
            ->get();

        $rejecteddriverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
            ->where('status','rejected')
            ->orderBy('id', 'desc')
            ->get();

        $expiredddriverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
            ->where('expiry', '<', Carbon::now())
            ->where('status', '!=','rejected')
            ->orderBy('id', 'desc')
            ->get();

        $userLat = $userriderequest->pickup_location_latitude;
        $userLng = $userriderequest->pickup_location_longitude;

        $driverFareRequests->transform(function ($item) use ($userLat, $userLng) {
            $item->user_lat = $userLat;
            $item->user_lng = $userLng;
            return $item;
        });
//        return view('user-app.pending-driver-fare-request', compact('driverFareRequests'),['userriderequest_id' => $userriderequest->id]);
        return view('user-app.negotiation-system', compact('driverFareRequests','accepteddriverFareRequests','rejecteddriverFareRequests','expiredddriverFareRequests'),['userriderequest_id' => $userriderequest->id]);
    }
    public function get_targetted_driver_fare_request(Request $request)
    {

        $userriderequest = Userriderequest::where('id',$request->input('userriderequest_id'))->first();

        $ridebooked = Ridesbooked::where('user_id',Auth::guard('user')->id())
            ->where('userriderequest_id',$userriderequest->id)
            ->where('pickup_location',$userriderequest->pickup_location)
            ->where('destination_location',$userriderequest->destination_location)
            ->where('fare',$userriderequest->fare)
            ->where('payment_method',$userriderequest->payment_method)
            ->where('departure_date',$userriderequest->departure_date)
            ->get();

        if ($ridebooked->isNotEmpty()) {
            return response()->json(['ridebooked' => true]);
        }

        Log::info($request->input('userriderequest_id'));
        $driverFareRequests = Driverfarerequest::with('driver', 'userriderequest') // if you have these relationships
        ->where('userriderequest_id', $request->input('userriderequest_id'))
//            ->where('expiry', '>', Carbon::now())
            ->where('status','!=','rejected')
            ->orderBy('id', 'desc')
            ->get();
        $userLat = $userriderequest->pickup_location_latitude;
        $userLng = $userriderequest->pickup_location_longitude;

// Add user lat/lng to each item
        $driverFareRequests->transform(function ($item) use ($userLat, $userLng) {
            $item->user_lat = $userLat;
            $item->user_lng = $userLng;
            return $item;
        });
        return response()->json($driverFareRequests);
    }

    public function cancel_offer(Request $request)
    {
        $offer = Userriderequest::find($request->id);
        $offer->status = 'cancelled';
        $offer->message = $request->reason;
        $offer->save();

        return redirect()->route('user.my_rides')->with('success', 'Ride Cancelled successfully!');
    }

}

