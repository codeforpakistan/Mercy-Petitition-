<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petition;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Carbon;
use Auth;
class DashboardController extends Controller
{
    public function dashboard(){


        // $today = Carbon::today();

        // $totalpetitions = Petition::get()->count();
        // $newpetitionToday = Petition::whereDate('created_at', '=', $today->toDateString())->count();
        if (Auth::user()->confined_in_jail == "") {
            $totalpetitions = Petition::where('province_id', '=', Auth::user()->province_id)->orderBy("id", "desc")->get()->count();
        } else {
            $totalpetitions = Petition::where('province_id', '=', Auth::user()->province_id)->where('confined_in_jail', '=', Auth::user()->confined_in_jail)->Where('file_in_department', 'Jail-Supt')->orderBy("id", "desc")->get()->count();

        }
      
    if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $Accepted = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Accepted')->orderBy("id", "desc")->get()->count();
       
    } elseif(!empty(Auth::user()->province_id)) {
     
        $Accepted = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Accepted')->orderBy("id", "desc")->count();
      
    }else{
      
        $Accepted = Petition::Where('status', 'Accepted')->orderBy("id", "desc")->count();

    }
    if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $compromised = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Compromise')->orderBy("id", "desc")->get()->count();
    
    } elseif(!empty(Auth::user()->province_id)) {
     
        $compromised = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Compromise')->orderBy("id", "desc")->count();
      
    }else{
      
        $compromised = Petition::Where('status', 'Compromise')->orderBy("id", "desc")->count();

    }
    if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $death = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Prisoner death')->orderBy("id", "desc")->get()->count();
       
    } elseif(!empty(Auth::user()->province_id)) {
     
        $death = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Prisoner death')->orderBy("id", "desc")->count();
      
    }else{
      
        $death = Petition::Where('status', 'Prisoner death')->orderBy("id", "desc")->count();

    }
    if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $staypetition = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Stay')->orderBy("id", "desc")->get()->count();
       
    } elseif(!empty(Auth::user()->province_id)) {
     
        $staypetition = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Stay')->orderBy("id", "desc")->count();
      
    }else{
      
        $staypetition = Petition::Where('status', 'Stay')->orderBy("id", "desc")->count();

    }
    if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
        $Rejected = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Rejected')->orderBy("id", "desc")->count();
       
    } elseif(!empty(Auth::user()->province_id)) {
  
      $Rejected = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Rejected')->orderBy("id", "desc")->count();

    }else{
     
        $Rejected = Petition::Where('status', 'Rejected')->orderBy("id", "desc")->count();

    }
    $dd=Auth::user()->getRoleNames()['0'];
    $role=Role::where('name',$dd)->first();
 

  
   if($role->name == 'Admin'){
    
    $Inprocess = Petition::where('province_id', '=', Auth::user()->province_id)->orWhere('status', 'pending')->orderBy("id", "desc")->count();
   }
  elseif($role->name == 'jail-supt'){
 
        $Inprocess = Petition::where('user_id', '=', Auth::user()->id)->where('province_id', '=', Auth::user()->province_id)->where('status', 'pending')->orderBy("id", "desc")->count();
   }
   
  elseif($role->name =='Homedept'){
    
    $Inprocess = Petition::where('user_id', '=', Auth::user()->id)->where('province_id', '=', Auth::user()->province_id)->Where('file_in_department', 'InteriorMinistry')->orderBy("id", "desc")->count();
   }
   else{
    
    $Inprocess = Petition::where('user_id', '=', Auth::user()->id)->where('province_id', '=', Auth::user()->province_id)->Where('file_in_department', 'HumanRightDeparment')->orderBy("id", "desc")->count();
   }
        $HomeDepartment = Petition::where('province_id', '=', Auth::user()->province_id)->Where('file_in_department', 'HomeDepartment')->orderBy("id", "desc")->get()->count();
        $InteriorMinistryDepartment = Petition::Where('status','pending')->Where('file_in_department', 'InteriorMinistry')->orderBy("id", "desc")->get()->count();
        $HumanRightDepartment = Petition::Where('file_in_department', 'HumanRightDepartment')->orderBy("id", "desc")->get()->count();
       
        return view('welcome' , compact(['totalpetitions','Inprocess','Accepted','compromised','death','staypetition','Rejected','HomeDepartment','InteriorMinistryDepartment','HumanRightDepartment']));


       }

       public function petitionstatusedit($id){
       $petitionstatusedit = Petition::find($id);
       return view('IGP.inprocessedit' , compact('petitionstatusedit'));

       }
      
       
       public function inprocesseditupdate(Request $request, $id){
        $inprocesseditupdate = Petition::find($id);
        $inprocesseditupdate->status = $request->get('status');
        $inprocesseditupdate->save();
        return redirect()->route('inprocess')->with('message', 'Petition Forward Successfully ');
 
        }
}