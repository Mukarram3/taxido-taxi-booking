<?php

use App\Http\Controllers\Driver\AuthController;
use App\Http\Controllers\Driver\GoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['prefix' => 'driver', 'as' => 'driver.'], function (){

    Route::middleware([\App\Http\Middleware\LoggedinDriver::class ])->group(function () {

        Route::get('/accept-ride/{id}', [\App\Http\Controllers\Driver\DriverfarerequestController::class, 'accept_ride'])->name('accept_ride');
        Route::post('/request-fare', [\App\Http\Controllers\Driver\DriverfarerequestController::class, 'request_fare'])->name('request_fare');
        Route::get('/accept-ride-confirmed/{userriderequest_id}', [\App\Http\Controllers\Driver\RidesbookedController::class, 'accept_ride_confirmed'])->name('accept_ride_confirmed');
        Route::get('/chatting', function (){
            return view('driver-app.chatting');
        });

        Route::post('/chat',[\App\Http\Controllers\User\RidesbookedController::class, 'chat'])->name('chat');

        Route::get('/driver-bank-details', function (){
            return view('driver-app.driver-bank-details');
        })->name('driver_bank_detail_view');
        Route::post('driver-bank-details', [\App\Http\Controllers\Driver\AuthController::class, 'driver_bank_details'])->name('driver_bank_details');

        Route::get('/driver-document-verify', function (){
            return view('driver-app.driver-document-verify');
        });
        Route::post('/driver-document-verify', [\App\Http\Controllers\Driver\AuthController::class, 'driver_document_verify'])->name('driver-document-verify');

        Route::get('/logout', [\App\Http\Controllers\Driver\AuthController::class, 'logout'])->name('logout');

        Route::get('/profile-setting', function (){
            return view('driver-app.profile-setting');
        });

        Route::post('/update_profile',[\App\Http\Controllers\Driver\AuthController::class,'update_profile'])->name('update_profile');

        Route::post('vehicle-registeration', [\App\Http\Controllers\Driver\AuthController::class,'vehicle_registeration'])->name('vehicle-registration');
        Route::get('/vehicle-registeration', function (){
            return view('driver-app.vehicle-registration');
        });

        Route::get('my-rides',[\App\Http\Controllers\Driver\RideController::class,'my_rides'])->name('my_rides');

        Route::get('/setting', function (){
            return view('driver-app.setting');
        });

    });

    Route::get('/home', [\App\Http\Controllers\Driver\DriverfarerequestController::class, 'home'])->name('home');
    Route::get('/get-driver-ride-request', [\App\Http\Controllers\Driver\RideController::class, 'get_driver_ride_request'])->name('get_driver_ride_request');

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::get('/accept-ride-details', function (){
        return view('driver-app.accept-ride-details');
    });

    Route::get('track-ride/{id}',[\App\Http\Controllers\Driver\RideController::class,'track_ride'])->name('track_ride');
    Route::get('get-driver-location/{id}',[\App\Http\Controllers\Driver\RideController::class,'get_driver_location'])->name('get_driver_location');
    Route::post('driver-location-update',[\App\Http\Controllers\Driver\RideController::class,'driver_location_update'])->name('driver-location-update');

    Route::get('/app-setting', function (){
        return view('driver-app.app-setting');
    });

    Route::get('/cancel-ride-details', function (){
        return view('driver-app.cancel-ride-details');
    });

    Route::get('/complete-ride-details', function (){
        return view('driver-app.complete-ride-details');
    });

    Route::get('/driver-bank-registeration-details', function (){
        return view('driver-app.driver-bank-registration-details');
    });

    Route::get('/driver-registeration-document', function (){
        return view('driver-app.driver-registration-document');
    });

    Route::get('/driver-vehicle-details', function (){
        return view('driver-app.driver-vehicle-details');
    });

    Route::get('/edit-offer', function (){
        return view('driver-app.edit-offer');
    });

    Route::get('/login', function (){
        return view('driver-app.login');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedDriver::class);
    Route::post('/login', [\App\Http\Controllers\Driver\AuthController::class, 'login_with_number'])->name('login_with_number');

    Route::get('/signup', function (){
        return view('driver-app.signup');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedDriver::class);
    Route::post('/signup', [\App\Http\Controllers\Driver\AuthController::class, 'register'])->name('register');

    Route::get('/index', function (){
        return view('driver-app.index');
    });

    Route::get('/notification', function (){

        return view('driver-app.notification');
    });

    Route::get('/offer', function (){
        return view('driver-app.offer');
    });

    Route::post('/send-verification-email', [AuthController::class, 'sendVerificationEmail'])->name('send.verification.email');
    Route::post('/verify-email-code', [AuthController::class, 'verifyEmailCode'])->name('verify.email.code');
    Route::post('/send-sms-code', [AuthController::class, 'sendSMSCode'])->name('send.sms.code');
    Route::post('/verify-sms-code', [AuthController::class, 'verifySMSCode'])->name('verify.sms.code');


    Route::post('/otp', [\App\Http\Controllers\Driver\AuthController::class,'sendotp'])->name('otplogin');
    Route::post('/verify-otp', [\App\Http\Controllers\Driver\AuthController::class,'verify_otp'])->name('verify_otp');

    Route::post('/otp-successfully', [\App\Http\Controllers\Driver\RidesbookedController::class, 'otp_successfully'])->name('otp_successfully');
    Route::post('/start-ride-otp-successfully',[\App\Http\Controllers\Driver\RidesbookedController::class,'start_ride_otp_successfully'])->name('start_ride_otp_successfully');

    Route::get('ride-complete-request/{id}',[\App\Http\Controllers\Driver\RidesbookedController::class,'ride_complete_request'])->name('ride_complete_request');
    Route::get('package-returned-request/{id}',[\App\Http\Controllers\Driver\RidesbookedController::class,'package_returned_request'])->name('package_returned_request');
    Route::get('package-returned/{id}',[\App\Http\Controllers\Driver\RidesbookedController::class,'package_returned'])->name('package_returned');
    Route::get('start-parcel-return/{id}',[\App\Http\Controllers\Driver\RidesbookedController::class,'start_return_parcel'])->name('start_return_parcel');

    Route::get('/page-listing', function (){
        return view('driver-app.page-listing');
    });

    Route::get('/pending-ride-details', function (){
        return view('driver-app.pending-ride-details');
    });

    Route::get('ride-details',[\App\Http\Controllers\Driver\RideController::class,'ride_details'])->name('ride_details');

    Route::get('/ride-on-way', function (){
        return view('driver-app.ride-on-way');
    });

    Route::get('/ride-verification/{userriderequest_id}', [\App\Http\Controllers\Driver\RidesbookedController::class, 'ride_verification'])->name('ride_verification');
    Route::get('/start-ride/{ride_id}', [\App\Http\Controllers\Driver\RidesbookedController::class, 'start_ride'])->name('start_ride');
    Route::get('/start-delivery/{ride_id}', [\App\Http\Controllers\Driver\RidesbookedController::class, 'start_delivery'])->name('start_delivery');
    Route::post('/cancel-ride', [\App\Http\Controllers\Driver\RidesbookedController::class, 'cancel_ride'])->name('cancel_ride');
    Route::post('/cancel-offer', [\App\Http\Controllers\User\UserriderequestController::class, 'cancel_offer'])->name('cancel_offer');
    Route::get('/return-parcel/{id}', [\App\Http\Controllers\Driver\RidesbookedController::class, 'return_parcel'])->name('return_parcel');

    Route::get('/topup-wallet', function (){
        return view('driver-app.topup-wallet');
    });

    Route::get('/wallet', [\App\Http\Controllers\Driver\DriverBalanceController::class,'wallet'])->name('wallet');

    Route::get('/withdraw', function (){
        return view('driver-app.withdraw');
    });
    Route::post('/mark-as-read', [\App\Http\Controllers\NotificationController::class,'markNotification'])->name('markNotification');
    Route::post('/mollie-webhook', [\App\Http\Controllers\Driver\MolliewebhookController::class,'mollie_webhook'])->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])->name('mollie_webhook');

//    Reservation based transportation system

    Route::get('/search-location', function (){
        return view('driver-app.search-location');
    });
    Route::get('/selact-ride', function (Request $request){
        return view('driver-app.selact-ride', ['request' => $request]);
    })->name('selact_ride');
    Route::post('/driver-fare-request', [\App\Http\Controllers\Driver\DriverriderequestController::class, 'driver_fare_request'])->name('driver_fare_request');
    Route::get('/get-pending-user-fare-request', [\App\Http\Controllers\Driver\DriverriderequestController::class, 'get_pending_user_fare_request'])->name('get_pending_user_fare_request');
    Route::get('/user-fare-requests', [\App\Http\Controllers\Driver\DriverriderequestController::class, 'user_fare_requests'])->name('user_fare_requests');
    Route::get('/get-user-fare-request', [\App\Http\Controllers\Driver\DriverriderequestController::class, 'get_user_fare_request'])->name('get_user_fare_request');
    Route::get('/accept-ride-details', [\App\Http\Controllers\Driver\RidesbookedController::class, 'accept_ride_details'])->name('accept_ride_details');
    Route::post('/cancel-driver-ride-request', [\App\Http\Controllers\Driver\DriverriderequestController::class, 'cancel_driver_ride_request'])->name('cancel_driver_ride_request');
    Route::get('reserved-kilo-ride-details',[\App\Http\Controllers\Driver\RideController::class,'reserved_kilo_ride_details'])->name('ride_details');
    Route::get('reserved-kilo-offer-details',[\App\Http\Controllers\Driver\RideController::class,'reserved_kilo_offer_details'])->name('reserved_kilo_offer_details');
    Route::get('confirm-package-collected/{id}',[\App\Http\Controllers\Driver\RideController::class,'confirm_package_collected'])->name('confirm_package_collected');
    Route::get('start-reserved-kilo-ride/{id}',[\App\Http\Controllers\Driver\RidesbookedController::class,'start_reserved_kilo_ride'])->name('start_reserved_kilo_ride');
    Route::get('reserved-kilo-ride-complete-request/{id}',[\App\Http\Controllers\Driver\RidesbookedController::class,'reserved_kilo_ride_complete_request'])->name('reserved_kilo_ride_complete_request');
    Route::get('reserved-kilo-package-returned-request/{id}',[\App\Http\Controllers\Driver\RidesbookedController::class,'reserved_kilo_package_returned_request'])->name('reserved_kilo_package_returned_request');
    Route::post('/cancel-reserved-kilo-ride', [\App\Http\Controllers\Driver\RidesbookedController::class, 'cancel_reserved_kilo_ride'])->name('cancel_reserved_kilo_ride');
    Route::get('/update-booking/{id}', [\App\Http\Controllers\Driver\RidesbookedController::class, 'update_booking'])->name('update_booking');
    Route::post('/update-datetime', [\App\Http\Controllers\Driver\RidesbookedController::class, 'updateDatetime'])->name('offers.update-datetime');


});

Route::get('/transportation-request', function (){
   return view('driver-app.traveler-offer-page');
});
