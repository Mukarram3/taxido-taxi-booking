<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Ridesbooked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverBalanceController extends Controller
{
    public function wallet(){
        $ridebookeds = Ridesbooked::with('user')
            ->where('driver_id', Auth::guard('driver')->user()->id)
            ->where('status','completed')
            ->get();
        return view('driver-app.wallet', compact('ridebookeds'));
    }
}
