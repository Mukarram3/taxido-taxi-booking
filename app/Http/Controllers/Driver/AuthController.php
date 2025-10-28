<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    // Display the login/register form
    public function showAuthForm()
    {
        // If the user is already authenticated, redirect to profile
        if (Auth::check()) {
            return redirect('/profile');
        }

        return view('auth'); // Ensure this view contains your HTML form
    }

    // Handle registration
    public function register(Request $request)
    {

        if ($request->otp == session('verification_code')) {
            try {
                $userData = json_decode($request->input('user_data'), true);
                // Create the user
                $user = Driver::create([
                    'name' => $userData['name'],
                    'phone' => $userData['phone'],
                    'email' => $userData['email'],
                    'password' => Hash::make($userData['password']),
                ]);

                Session::forget('verification_code');

                Auth::guard('driver')->login($user);

                return redirect()->to('driver/driver-document-verify')->with(['user' => $user,'success' => 'Registration successful!']);
            } catch (\Exception $e) {
                Log::error('User Registration Error: ' . $e->getMessage());
                return back()->with('error', 'Something went wrong! Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

    }

    public function driver_document_verify(Request $request)
    {
//        dd($request->all());

        $driver = Driver::where('id', $request->user_id)->firstOrFail();

        if ($request->hasFile('birth_certificate')) {
            $path = $request->file('birth_certificate')->store('documents/birth_certificates', 'public');
            $driver->birth_certificate = $path;
        }

        if ($request->hasFile('registeration_certificate')) {
            $path = $request->file('registeration_certificate')->store('documents/registration_certificates', 'public');
            $driver->registeration_certificate = $path;
        }

        if ($request->hasFile('driving_license')) {
            $path = $request->file('driving_license')->store('documents/driving_licenses', 'public');
            $driver->driving_license = $path;
        }

        if ($request->hasFile('national_id')) {
            $path = $request->file('national_id')->store('documents/national_ids', 'public');
            $driver->national_id = $path;
        }

        if ($request->hasFile('pan_card')) {
            $path = $request->file('pan_card')->store('documents/pan_cards', 'public');
            $driver->pan_card = $path;
        }

        $driver->save();
        return redirect('driver/vehicle-registeration', ['user_id' => $request->user_id]);
    }

    public function vehicle_registeration(Request $request)
    {
        $driver = Driver::where('id', $request->user_id)->firstOrFail();
        $driver->vehicle_name = $request->vehicle_name;
        $driver->registeration_date = $request->registeration_date;
        $driver->vehicle_type = $request->vehicle_type;
        $driver->vehicle_color = $request->vehicle_color;
        $driver->means_of_transport = json_encode($request->input('means_of_transport',[]));
        $driver->max_seats = $request->max_seats;
        $driver->rules = json_encode($request->input('rule', []));

        if ($request->hasFile('vehicle_pictures')) {
            $imagePaths = [];
            $files = $request->file('vehicle_pictures');

            if (!is_array($files)) {
                $files = [$files];
            }
            foreach ($files as $image) {
                try {
                    $path = $image->store('documents/vehicle_pictures', 'public');
                    $imagePaths[] = $path;
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }

            $driver->vehicle_pictures = json_encode($imagePaths);
        }

        $driver->save();
        return redirect()->route('driver.driver_bank_detail_view', ['user_id' => $driver->id]);
    }

    public function driver_bank_details(Request $request)
    {
        $driver = Driver::where('id', $request->user_id)->firstOrFail();
        $driver->bank_name = $request->bank_name;
        $driver->holder_name = $request->holder_name;
        $driver->account_number = $request->account_number;
        $driver->branch_name = $request->branch_name;
        $driver->ifsc_code = $request->ifsc_code;
        $driver->save();
        return redirect('driver/login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::guard('driver')->attempt($credentials, true)) {
            $request->session()->regenerate();

            // Redirect to /profile after successful login
            return redirect('/driver/home');
        }

        // If authentication fails, redirect back with errors
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function login_with_number(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('driver')->attempt($credentials)) {
            return redirect('/driver/home');
        }
        else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(){
        Auth::guard('driver')->logout();
        return redirect('/driver/login');
    }

    public function sendotp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstName'       => ['required', 'string', 'max:255'],
            'lastName'        => ['required', 'string', 'max:255'],
            'profession'      => ['nullable', 'string', 'max:255'],
            'birthDate'       => ['nullable', 'date'],
            'address'         => ['nullable', 'string', 'max:255'],
            'email'           => ['required', 'email', 'unique:drivers,email'],
            'phone'           => [
                'required',
                'string',
                'max:20',
                function ($attribute, $value, $fail) {
                    if (User::where('phone', $value)->exists() || Driver::where('phone', $value)->exists()) {
                        $fail('The phone number has already been taken.');
                    }
                },
            ],
            'password'        => ['required', 'string', 'min:8'],
            'experience'      => ['nullable', 'string'],
            'transports'      => ['nullable', 'array'],
            'travelFrequency' => ['nullable', 'string', 'max:255'],
            'destinations'    => ['nullable', 'string'],
            'profile'           => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $user = Driver::where('phone', $validated["phone"])->first();

        if ($user) {
            return redirect()->back()->with('error', 'Already Registered. Please login yourself');
        }
        else {
            $verificationCode = rand(10000, 99999);
            $message = "Your verification code is: $verificationCode";


            $driver = new Driver();
            $driver->firstName       = $validated['firstName'];
            $driver->lastName        = $validated['lastName'];
            $driver->profession      = $validated['profession'] ?? null;
            $driver->birthDate       = $validated['birthDate'] ?? null;
            $driver->address         = $validated['address'] ?? null;
            $driver->email           = $validated['email'];
            $driver->phone           = $validated['phone'];
            $driver->password        = Hash::make($validated['password']);
            $driver->emailVerified   = filter_var($request->input('emailVerified'), FILTER_VALIDATE_BOOLEAN);
            $driver->phoneVerified   = filter_var($request->input('phoneVerified'), FILTER_VALIDATE_BOOLEAN);
            $experience = $request->input('experience');
            if ($experience) {
                $experienceList = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $experience)));
                // e.g. ["Expert", "Frequent traveler"]
            } else {
                $experienceList = [];
            }
            $driver->experience      = !empty($experienceList) ? json_encode($experienceList) : null;;
            $transports = $request->input('transports', []);
            $transportsClean = array_map(function ($item) {
                return trim(preg_replace('/\s+/', ' ', $item));
            }, $transports);
            $driver->transports = !empty($transportsClean) ? json_encode($transportsClean, JSON_UNESCAPED_UNICODE) : null;
            $driver->travelFrequency = $validated['travelFrequency'] ?? null;
            $driver->destinations    = $validated['destinations'] ?? null;

// Handle file upload
            if ($request->hasFile('profile')) {
                $path = $request->file('profile')->store('documents/profile', 'public');
                $driver->profile = $path;
            }

            $driver->save();

            $credentials = $request->only('email', 'password');

            if (Auth::guard('driver')->attempt($credentials)) {
                return response()->json(['success' => 'Account created successfully!']);
            }

//            $account_sid = env('TWILIO_SID_KEY');
//            $auth_token = env('TWILIO_AUTH_TOKEN');
//            $twilio_number =  env('TWILIO_NUMBER');
//
//            $client = new Client($account_sid, $auth_token);
//            $client->messages->create(
//                '+'.$request->phone,
//                array(
//                    'from' => $twilio_number,
//                    'body' => $message
//                )
//            );
            session(['verification_code' => $verificationCode]);

            $expiresAt = Carbon::now()->addMinutes(5);
            Otp::create([
//                'user_id' => $user->id, // or however you're identifying the user
                'otp' => $verificationCode,
                'expires_at' => $expiresAt,
            ]);

            return view('driver-app.otp',['requestData' => $request->all()]);
        }
    }

    public function verify_otp(Request $request)
    {

        $otp = Otp::where('user_id', $request->user_id)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if ($otp) {
            $user = Driver::where('id', $request->user_id)->first();
            Auth::guard('driver')->login($user, true);
            return redirect('/driver/home');
        } else {
            dd('invalid otp');
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    }

    public function update_profile(Request $request)
    {
        $driver = Driver::where('id', Auth::guard('driver')->id())->first();
        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('documents/profile', 'public');
            $driver->profile = $path;
        }
        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function sendVerificationEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $code = rand(100000, 999999); // 6-digit code
        $email = $request->email;

        // store code temporarily (e.g. 10 minutes)
        Cache::put('email_verification_'.$email, $code, now()->addMinutes(10));

        try {
            Mail::send('emails.verification-code', ['code' => $code], function ($message) use ($email) {
                $message->to($email)->subject('Your Verification Code');
            });
            return response()->json(['success' => true, 'message' => 'Verification email sent']);
        }
        catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => $e->getMessage()]);
        }
    }

    public function verifyEmailCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code'  => 'required|string',
        ]);

        $cachedCode = Cache::get('email_verification_'.$request->email);

        if ($cachedCode && $cachedCode == $request->code) {
            // mark as verified (you can store in session)
            session(['email_verified' => true]);

            return response()->json(['success' => true, 'message' => 'Email verified']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid or expired code'], 422);
    }

    public function sendSMSCode(Request $request)
    {
        $request->validate(['phone' => 'required|string']);

        $code = rand(100000, 999999);
        $phone = $request->phone;

        // Save code for 10 minutes
        Cache::put('sms_verification_'.$phone, $code, now()->addMinutes(10));

        $message = 'Your verification code is: ' . $code;

        try {
            $account_sid = env('TWILIO_SID_KEY');
            $auth_token = env('TWILIO_AUTH_TOKEN');
            $twilio_number =  env('TWILIO_NUMBER');

            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                '+'.$request->phone,
                array(
                    'from' => $twilio_number,
                    'body' => $message
                )
            );
            return response()->json(['success' => true, 'message' => 'SMS code sent']);
        }
        catch (\Exception $exception){
            return response()->json(['error' => true, 'message' => 'error: ' . $exception->getMessage()]);
        }
    }

    public function verifySMSCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code'  => 'required|string',
        ]);

        $cachedCode = Cache::get('sms_verification_'.$request->phone);

        if ($cachedCode && $cachedCode == $request->code) {
            session(['phone_verified' => true]);
            return response()->json(['success' => true, 'message' => 'Phone verified']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid or expired code'], 422);
    }

}
