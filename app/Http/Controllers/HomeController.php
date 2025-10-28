<?php

namespace App\Http\Controllers;

use App\Models\Userriderequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $userriderequests = Userriderequest::with(['user'])
            ->where('status', 'waiting')
//            ->where('expiry', '>', \Carbon\Carbon::now())
            ->whereNull('is_targetted')
            ->orderByDesc('id')
            ->limit(6)
            ->get();
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
        return view('search-listings', compact('userriderequests'));
    }
}
