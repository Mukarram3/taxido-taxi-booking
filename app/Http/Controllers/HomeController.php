<?php

namespace App\Http\Controllers;

use App\Models\Userriderequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $userriderequests = Userriderequest::with(['user'])
            ->where('status', 'waiting')
            ->where('expiry_date', '>', \Carbon\Carbon::now())
            ->whereNull('is_targetted')
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        foreach ($userriderequests as $userriderequest) {
            $userriderequest->pickup_city = $this->getCityFromAddress($userriderequest->pickup_location);
            $userriderequest->destination_city = $this->getCityFromAddress($userriderequest->destination_location);
        }

        return view('home', compact('userriderequests'));
    }
    public function search_listing()
    {
        $userriderequests = Userriderequest::with(['user'])
            ->where('status', 'waiting')
            ->where('expiry_date', '>', \Carbon\Carbon::now())
            ->whereNull('is_targetted')
            ->orderByDesc('id')
            ->get();

        foreach ($userriderequests as $userriderequest) {
            $userriderequest->pickup_city = $this->getCityFromAddress($userriderequest->pickup_location);
            $userriderequest->destination_city = $this->getCityFromAddress($userriderequest->destination_location);
        }

        return view('search-listings', compact('userriderequests'));
    }

    protected function getCityFromAddress($address)
    {
        // Cache the result to avoid hitting Google API repeatedly
        return Cache::rememberForever('city_' . md5($address), function () use ($address) {
            $apiKey = config('services.google_maps.api_key');
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $address,
                'key' => $apiKey,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if (!empty($data['results'][0]['address_components'])) {
                    foreach ($data['results'][0]['address_components'] as $component) {
                        if (
                            in_array('locality', $component['types']) ||
                            in_array('administrative_area_level_2', $component['types'])
                        ) {
                            return $component['long_name']; // e.g., "Multan"
                        }
                    }
                }
            }

            // fallback if API fails
            $parts = explode(',', $address);
            return trim($parts[count($parts) - 2] ?? $address);
        });
    }

    public function offer_details($id){
        $user_ride_request = Userriderequest::with('user')->find($id);
        $user_ride_request->pickup_city = $this->getCityFromAddress($user_ride_request->pickup_location);
        $user_ride_request->destination_city = $this->getCityFromAddress($user_ride_request->destination_location);
        return view('user-app.cotransport_detail', compact('user_ride_request'));
    }
}
