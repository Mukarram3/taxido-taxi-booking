<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/driver.php';
require __DIR__ . '/user.php';

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/search-listing',[\App\Http\Controllers\HomeController::class,'search_listing'])->name('search_listing');
Route::get('/about-jeconfie', function (){
    return view('legal.about-jeconfie');
});
Route::get('/cgu', function (){
    return view('legal.cgu');
});
Route::get('/cgv', function (){
    return view('legal.cgv');
});
Route::get('/contact-jeconfie', function (){
    return view('legal.contact-jeconfie');
});
Route::get('/faq-jeconfie', function (){
    return view('legal.faq-jeconfie');
});
Route::get('/help-center', function (){
    return view('legal.Help-center');
});
Route::get('/legal-notice', function (){
    return view('legal.Legal-Notice');
});
Route::get('/our-mission', function (){
    return view('legal.Our-Mission');
});
Route::get('/rgpd-jenonfie', function (){
    return view('legal.rgpd-jeconfie');
});
Route::get('/special-intermediation-conditions', function (){
    return view('legal.SPECIAL-INTERMEDIATION-CONDITIONS');
});
Route::get('/become-carrier', function (){
    return view('legal.become-carrier-page');
});
Route::get('/cookies-jeconfie', function (){
    return view('legal.cookies-jeconfie');
});
Route::get('/privacy-policy-jeconfie', function (){
    return view('legal.privacy-policy-jeconfie');
});

Route::group([
    'prefix' => 'chat-user',
    'as' => 'chat_user.',
    'middleware' => [\App\Http\Middleware\LoggedinUser::class],
], function () {
    Route::get('/', [MessagesController::class, 'index'])->name(config('chatify.routes.prefix'));
    Route::post('/idInfo', [MessagesController::class, 'idFetchData']);
    Route::post('/sendMessage', [MessagesController::class, 'send'])->name('send.message');
    Route::post('/fetchMessages', [MessagesController::class, 'fetch'])->name('fetch.messages');
    Route::get('/download/{fileName}', [MessagesController::class, 'download'])->name(config('chatify.attachments.download_route_name'));
    Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('pusher.auth');
    Route::post('/makeSeen', [MessagesController::class, 'seen'])->name('messages.seen');
    Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('contacts.get');
    Route::post('/updateContacts', [MessagesController::class, 'updateContactItem'])->name('contacts.update');
    Route::post('/star', [MessagesController::class, 'favorite'])->name('star');
    Route::post('/favorites', [MessagesController::class, 'getFavorites'])->name('favorites');
    Route::get('/search', [MessagesController::class, 'search'])->name('search');
    Route::post('/shared', [MessagesController::class, 'sharedPhotos'])->name('shared');
    Route::post('/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('conversation.delete');
    Route::post('/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('message.delete');
    Route::post('/updateSettings', [MessagesController::class, 'updateSettings'])->name('avatar.update');
    Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('activeStatus.set');
    Route::get('/group/{id}', [MessagesController::class, 'index'])->name('group');
    Route::get('/{id}', [MessagesController::class, 'index'])->name('user');

});
