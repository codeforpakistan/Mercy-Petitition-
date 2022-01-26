<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petition;
use Illuminate\Support\Carbon;
use Auth;
class DashboardController extends Controller
{
    public function dashboard(){


        // $today = Carbon::today();

        // $totalpetitions = Petition::get()->count();
        // $newpetitionToday = Petition::whereDate('created_at', '=', $today->toDateString())->count();
        if (Auth::user()->confined_in_jail == "") {
            $totalpetitions = Petition::orderBy("id", "desc")->get()->count();
        } else {
            $totalpetitions = Petition::Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('status', 'IGP')->orderBy("id", "desc")->get()->count();

        }
        $Accepted = Petition::Where('status', 'Accepted')->orderBy("id", "desc")->get()->count();
        $Rejected = Petition::Where('status', 'Rejected')->orderBy("id", "desc")->get()->count();
        $HomeDepartment = Petition::Where('status', 'HomeDepartment')->orderBy("id", "desc")->get()->count();
        $InteriorMinistryDepartment = Petition::Where('status', 'InteriorMinistryDepartment')->orderBy("id", "desc")->get()->count();
        $HumanRightDepartment = Petition::Where('status', 'HumanRightDepartment')->orderBy("id", "desc")->get()->count();
       
        return view('welcome' , compact(['totalpetitions','Accepted','Rejected','HomeDepartment','InteriorMinistryDepartment','HumanRightDepartment']));


       }
}