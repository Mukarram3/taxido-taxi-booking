<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MolliewebhookController extends Controller
{
    public function mollie_webhook(Request $request){
        Log::info($request->all());
    }
}
