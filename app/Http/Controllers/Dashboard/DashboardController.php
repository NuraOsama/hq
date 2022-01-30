<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Test;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $tests = Test::get()->count();
        $offers = Offer::get()->count();
        $visits = Visit::get()->count();

        $lastOffers = Offer::orderBy('id','DESC')->take(5)->get();
        $lastTests  = Test::orderBy('id','DESC')->take(5)->get();
        $lastVisit  = Visit::orderBy('id','DESC')->take(5)->get();
        return view('dashboard.index',compact('tests','offers','visits',
        'lastOffers','lastTests','lastVisit'));
    }
}
