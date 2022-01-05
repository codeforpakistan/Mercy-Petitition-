<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petition;
use Illuminate\Support\Carbon;
class DashboardController extends Controller
{
    public function dashboard(){


        $today = Carbon::today();

        $totalpetitions = Petition::get()->count();
        $newpetitionToday = Petition::whereDate('created_at', '=', $today->toDateString())->count();
        return view('welcome' , ['totalpetitions' => $totalpetitions , 'newpetitionToday' => $newpetitionToday ]);


       }
}
