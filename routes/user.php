<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return redirect()->route('user.login');
})->name('login');

Route::group(['prefix' => 'user', 'as' => 'user.'], function (){

    Route::middleware([\App\Http\Middleware\LoggedinUser::class ])->group(function () {

        Route::get('/home', [\App\Http\Controllers\User\UserfarerequestController::class, 'home'])->name('home');
        Route::get('/dashboard', [\App\Http\Controllers\User\UserriderequestController::class, 'dashboard'])->name('home');

        Route::get('/accept-ride-details', [\App\Http\Controllers\User\RidesbookedController::class, 'accept_ride_details'])->name('accept_ride_details');
        Route::get('/reject-ride-details', [\App\Http\Controllers\User\RidesbookedController::class, 'reject_ride_details'])->name('reject_ride_details');

        Route::get('/bank-details', function (){
            return view('user-app.bank-details');
        });

        Route::post('user-bank-details', [\App\Http\Controllers\User\AuthController::class, 'user_bank_details'])->name('user_bank_details');

        Route::get('/category', function (){
            return view('user-app.category');
        });

        Route::get('/chatting', function (){
            return view('user-app.chatting');
        });

        Route::post('/driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'driver_fare_request'])->name('driver_fare_request');
        Route::get('/get-driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'get_driver_fare_request'])->name('get_driver_fare_request');
        Route::get('/get-pending-driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'get_pending_driver_fare_request'])->name('get_pending_driver_fare_request');
        Route::get('/get-targetted-driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'get_targetted_driver_fare_request'])->name('get_targetted_driver_fare_request');

        Route::post('/targetted-driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'targetted_driver_fare_request'])->name('targetted_driver_fare_request');
//        Route::get('/get-targetted-driver-fare-request', [\App\Http\Controllers\User\UserriderequestController::class, 'get_targetted_driver_fare_request'])->name('get_targetted_driver_fare_request');

        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/profile-setting', function (){
            return view('user-app.profile-setting');
        });

        Route::post('/update_profile',[\App\Http\Controllers\User\AuthController::class,'update_profile'])->name('update_profile');

        Route::get('/selact-ride', [\App\Http\Controllers\User\UserriderequestController::class, 'selact_ride'])->name('selact_ride');
        Route::post('/select-ride-targetted', [\App\Http\Controllers\User\UserriderequestController::class, 'selact_ride_targetted_transport_route'])->name('selact_ride_targetted');

        Route::get('/setting', function (){
            return view('user-app.setting');
        });

        Route::get('/app-setting', function (){
            return view('user-app.app-setting');
        });

        Route::get('my-rides',[\App\Http\Controllers\User\RideController::class, 'my_rides'])->name('my_rides');

    });

    Route::get('/login', function (){
        return view('user-app.login');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedUser::class);

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/otp', [\App\Http\Controllers\User\AuthController::class,'sendotp'])->name('otplogin');
    Route::post('/verify-otp', [\App\Http\Controllers\User\AuthController::class,'verify_otp'])->name('verify_otp');
    Route::get('/ride/complete/{ride}', [\App\Http\Controllers\User\RideController::class, 'markRidecomplete'])
        ->name('ride.complete')
        ->middleware('signed');

    Route::get('/package/returned/{ride}', [\App\Http\Controllers\User\RideController::class, 'markPackageReturned'])
        ->name('package.returned')
        ->middleware('signed');


    Route::get('/login-with-number', function (){
        return view('user-app.login-with-number');
    });

    Route::post('login-with-number',[AuthController::class,'login_with_number']);

    Route::get('/signup', function (){
        return view('user-app.signup');
    })->middleware(\App\Http\Middleware\RedirectIfAuthenticatedUser::class);

    Route::post('/verify-otp', [AuthController::class, 'verify_otp'])->name('verify_otp');
    Route::post('/signup', [AuthController::class, 'register'])->name('register');

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::post('/reset-password', [AuthController::class, 'reset_password'])->name('reset_password');
    Route::post('/update-password', [AuthController::class, 'update_password'])->name('update_password');

    Route::get('/verification',[ \App\Http\Controllers\User\AuthController::class, 'verification'])->name('verification');
    Route::get('/get-driver-ride-request-status/{id}',[ \App\Http\Controllers\Driver\DriverfarerequestController::class, 'get_driver_ride_request_status'])->name('get_driver_ride_request_status');
    Route::get('/get-package-sub_categories',[ \App\Http\Controllers\User\RideController::class, 'sub_categories'])->name('sub_categories');

    Route::get('/add-new-location', function (){
        return view('user-app.add-new-location');
    });

    Route::get('/add-new-rider', function (){
        return view('user-app.add-new-rider');
    });

    Route::get('/choose-rider', function (){
        return view('user-app.choose-rider');
    });

    Route::get('ride-details',[\App\Http\Controllers\User\RideController::class,'ride_details'])->name('ride_details');
    Route::get('reserved-kilo-ride-details',[\App\Http\Controllers\User\RideController::class,'reserved_kilo_ride_details'])->name('ride_details');
    Route::get('/get-user-ride-request', [\App\Http\Controllers\User\RideController::class, 'get_user_ride_request'])->name('get_user_ride_request');
    Route::get('/get-personal-ride-request', [\App\Http\Controllers\User\RideController::class, 'get_personal_ride_request'])->name('get_personal_ride_request');

    Route::get('/coupon', function (){
        return view('user-app.coupon');
    });

    Route::post('/targeted-transport-route',[\App\Http\Controllers\User\RideController::class,'targeted_transport_route']);
    Route::get('/filtered-targeted-transport-route',[\App\Http\Controllers\User\RideController::class,'filtered_targeted_transport_route']);

    Route::get('/driver-details', function (){
        return view('user-app.driver-details');
    });


    Route::get('/driver-review', function (){
        return view('user-app.driver-review');
    });

    Route::get('/empty-notification', function (){
        return view('user-app.empty-notification');
    });

    Route::get('/finding-driver', function (){
        return view('user-app.finding-driver');
    });

    Route::get('/forgot-password', function (){
        return view('user-app.forgot-password');
    });

    Route::get('/index', function (){
        return view('user-app.index');
    });

    Route::get('/location', function (){
        return view('user-app.location');
    });

    Route::get('track-ride/{id}',[\App\Http\Controllers\User\RideController::class, 'track_ride'])->name('track_ride');
    Route::get('track-reserved-kilo-ride/{id}',[\App\Http\Controllers\User\RideController::class, 'track_reserved_kilo_ride'])->name('track_ride');
    Route::get('get-driver-location/{id}',[\App\Http\Controllers\User\RideController::class,'get_driver_location'])->name('get_driver_location');

    Route::get('/notification', function (){
        return view('user-app.notification');
    });

    Route::get('/otp', function (){
        return view('user-app.otp');
    });

    Route::get('/outstation', function (){
        return view('user-app.outstation');
    });

    Route::get('/page-listing', function (){
        return view('user-app.page-listing');
    });

    Route::get('/payment-details', function (){
        return view('user-app.payment-details');
    });

    Route::get('/payment-method', function (){
        return view('user-app.payment-method');
    });

    Route::get('/rental', function (){
        return view('user-app.rental');
    });

    Route::get('/rental-selact-ride', function (){
        return view('user-app.rental-selact-ride');
    });

    Route::get('/rental-vehicle-details', function (){
        return view('user-app.rental-vehicle-details');
    });

    Route::get('/saved-location', function (){
        return view('user-app.saved-location');
    });

    Route::get('/search-location', function (){
        $ridebookeds = \App\Models\Ridesbooked::where('user_id', \Illuminate\Support\Facades\Auth::guard('user')->user()->id)->where('status','completed')->get();
        return view('user-app.search-location', compact('ridebookeds'));
    });

    Route::get('/nearby-drivers', [\App\Http\Controllers\User\RideController::class, 'getNearbyDrivers']);

    Route::post('/mark-as-read', [\App\Http\Controllers\NotificationController::class,'markUserNotification'])->name('markNotification');
    Route::get('/google_place_api', function (){
        return view('user-app.google_place_api');
    });
    Route::get('/accept-ride/{id}', [\App\Http\Controllers\User\UserfarerequestController::class, 'accept_ride'])->name('accept_ride');
    Route::get('cache-clear', function (){
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    });
    Route::post('/request-fare', [\App\Http\Controllers\User\UserfarerequestController::class, 'request_fare'])->name('request_fare');
    Route::get('/start-package-delivery-collection-address/{id}', [\App\Http\Controllers\User\RidesbookedController::class, 'start_package_delivery_collection_address'])->name('start_package_delivery_collection_address');
    Route::get('/request-package-collected/{id}', [\App\Http\Controllers\User\RidesbookedController::class, 'request_package_collected'])->name('request_package_collected');
    Route::get('/reserved-kilo-ride/complete/{ride}', [\App\Http\Controllers\User\RideController::class, 'markReserveKiloRidecomplete'])
        ->name('reserved_kilo_ride.complete');
    Route::post('/return-reserved-kilo-parcel', [\App\Http\Controllers\User\RideController::class, 'return_reserved_kilo_parcel'])->name('return_reserved_kilo_parcel');
    Route::get('start-reserved-kilo-parcel-return/{id}',[\App\Http\Controllers\User\RideController::class,'start_reserved_kilo_return_parcel'])->name('start_reserved_kilo_return_parcel');
    Route::get('/reserved-kilo-package/returned/{ride}', [\App\Http\Controllers\User\RideController::class, 'markReservedKiloPackageReturned'])
        ->name('reserved_kilo.package.returned');

});

Route::middleware([\App\Http\Middleware\LoggedinDriverOrUser::class])->group(function () {
    Route::get('/create-offer', function (){
        return view('user-app.create-offer');
    });
});

