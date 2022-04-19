<?php

namespace App\Http\Controllers;

use App\HomeDepartment;
use App\HumanRightDepartment;
use App\InteriorMinistry;
use App\Petition;
use Illuminate\Support\Facades\Auth;
use App\Province;
use App\Section;
use App\Jail;

use App\PhysicalStatus;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function acceptsearch(Request $request)
    {
        $search = trim($request->input('search'));

          $Accepted = Petition::where('status', 'Accepted')


->where(function($query) use ($search){
        $query->where('name', 'LIKE', '%'.$search.'%')
              ->orWhere('gender', 'LIKE', '%'.$search.'%')
              ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                          ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                          ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
              ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
              ->orWhere('nationality', 'LIKE', '%'.$search.'%')
              ->orWhere('phone', 'LIKE', '%'.$search.'%')
              ->orWhere('f_name', 'LIKE', '%'.$search.'%')
              ->orWhere('status', 'LIKE', '%'.$search.'%')
              ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
    })->paginate(6);





        return view('IGP.acceptsearch', compact('Accepted'));
  }
  public function compromisesearch(Request $request)
  {
      $search = trim($request->input('search'));

        $compromised = Petition::where('status', 'Compromise')


->where(function($query) use ($search){
      $query->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('gender', 'LIKE', '%'.$search.'%')
            ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                        ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                        ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
            ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
            ->orWhere('nationality', 'LIKE', '%'.$search.'%')
            ->orWhere('phone', 'LIKE', '%'.$search.'%')
            ->orWhere('f_name', 'LIKE', '%'.$search.'%')
            ->orWhere('status', 'LIKE', '%'.$search.'%')
            ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
  })->paginate(6);





      return view('IGP.compromisesearch', compact('compromised'));
}
public function prisonerdeathesearch(Request $request)
{
    $search = trim($request->input('search'));

      $prisonerdeath = Petition::where('status', 'Compromise')


->where(function($query) use ($search){
    $query->where('name', 'LIKE', '%'.$search.'%')
          ->orWhere('gender', 'LIKE', '%'.$search.'%')
          ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                      ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                      ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
          ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
          ->orWhere('nationality', 'LIKE', '%'.$search.'%')
          ->orWhere('phone', 'LIKE', '%'.$search.'%')
          ->orWhere('f_name', 'LIKE', '%'.$search.'%')
          ->orWhere('status', 'LIKE', '%'.$search.'%')
          ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
})->paginate(6);





    return view('IGP.prisonerdeathesearch', compact('prisonerdeath'));
}
        public function rejectsearch(Request $request)
    {
        $search = trim($request->input('search'));

          $Rejected = Petition::where('status', 'Rejected')


->where(function($query) use ($search){
        $query->where('name', 'LIKE', '%'.$search.'%')
              ->orWhere('gender', 'LIKE', '%'.$search.'%')
              ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                          ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                          ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
              ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
              ->orWhere('nationality', 'LIKE', '%'.$search.'%')
              ->orWhere('phone', 'LIKE', '%'.$search.'%')
              ->orWhere('f_name', 'LIKE', '%'.$search.'%')
              ->orWhere('status', 'LIKE', '%'.$search.'%')
              ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
    })->paginate(6);





        return view('IGP.rejectsearch', compact('Rejected'));
  }
    public function inprocess()
    {
      $dd=Auth::user()->getRoleNames()['0'];
    $role = Role::where('name',$dd)->first();
 

  
   if($role->name == 'Admin'){
   
    $Inprocess = Petition::where('province_id', '=', Auth::user()->province_id)->orWhere('status', 'pending')->orderBy("id", "desc")->paginate(5);
   }
  elseif($role->name == 'jail-supt'){

        $Inprocess = Petition::where('user_id', '=', Auth::user()->id)->where('province_id', '=', Auth::user()->province_id)->where('status', 'pending')->orderBy("id", "desc")->paginate(5);
   }
   
  elseif($role->name =='Homedept'){
    
    $Inprocess = Petition::where('user_id', '=', Auth::user()->id)->where('province_id', '=', Auth::user()->province_id)->Where('file_in_department', 'InteriorMinistry')->orderBy("id", "desc")->paginate(5);
   }
   else{
 
    $Inprocess = Petition::where('user_id', '=', Auth::user()->id)->Where('file_in_department', 'HumanRightDeparment')->orderBy("id", "desc")->paginate(5);
   }
   return view('IGP.inprocess', compact('Inprocess'));
    }
    
    public function view($id)
    {
        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();
        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        $humanrightpittions = HumanRightDepartment::with('humanrightfileattachements')->where('petition_id', $id)->first();

        $pets = Petition::with('fileattachements', 'sectionss','provinces','physicalstatus')->get();

        $petitions = $pets->find($id);
        $response = [
            'petitions' => $petitions,
            'homepititions' => $homepititions,
            'interiorpititions' => $interiorpititions,
            'humanrightpittions' => $humanrightpittions,
        ];

        return response()->json($response);

    }
    public function accepted()
    {
      if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $Accepted = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Accepted')->orderBy("id", "desc")->paginate(5);
       
    } elseif(!empty(Auth::user()->province_id)) {
     
        $Accepted = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Accepted')->orderBy("id", "desc")->paginate(5);
      
    }else{
      
        $Accepted = Petition::Where('status', 'Accepted')->orderBy("id", "desc")->paginate(5);

    }
   
        
        
        return view('IGP.accepted', compact('Accepted'));
    }
    public function compromised()
    {
      if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $compromised = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Compromise')->orderBy("id", "desc")->paginate(5);
       
    } elseif(!empty(Auth::user()->province_id)) {
     
        $compromised = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Compromise')->orderBy("id", "desc")->paginate(5);
      
    }else{
      
        $compromised = Petition::Where('status', 'Compromise')->orderBy("id", "desc")->paginate(5);

    }
   
        
        
        return view('IGP.compromised', compact('compromised'));
    }
    public function prisonerdeath()
    {
      if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $prisonerdeath = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Prisoner death')->orderBy("id", "desc")->paginate(5);
       
    } elseif(!empty(Auth::user()->province_id)) {
     
        $prisonerdeath = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Prisoner death')->orderBy("id", "desc")->paginate(5);
      
    }else{
      
        $prisonerdeath = Petition::Where('status', 'Prisoner death')->orderBy("id", "desc")->paginate(5);

    }
   
        
        
        return view('IGP.prisonerdeath', compact('prisonerdeath'));
    }
    public function staypetition()
    {
      if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
        $staypetition = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Stay')->orderBy("id", "desc")->paginate(5);
       
    } elseif(!empty(Auth::user()->province_id)) {
     
        $staypetition = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Stay')->orderBy("id", "desc")->paginate(5);
      
    }else{
      
        $staypetition = Petition::Where('status', 'Stay')->orderBy("id", "desc")->paginate(5);

    }
   
        
        
        return view('IGP.staypetition', compact('staypetition'));
    }
    public function rejected()
    {
      if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
        $Rejected = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Rejected')->orderBy("id", "desc")->paginate(5);
       
    } elseif(!empty(Auth::user()->province_id)) {
  
      $Rejected = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Rejected')->orderBy("id", "desc")->paginate(5);

    }else{
     
        $Rejected = Petition::Where('status', 'Rejected')->orderBy("id", "desc")->paginate(5);

    }
        return view('IGP.rejected', compact('Rejected'));
    }

    public function reportform()
    {
        // if (Auth::user()->confined_in_jail == "") {
        //     $petitions = Petition::orderBy("id", "desc")->get();
        // } else {
        //     $petitions = Petition::Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('status', 'IGP')->Where('received_from_department', 'IGP')->orderBy("id", "desc")->get();
        // }
        $provinces = Province::all();
        $section = Section::all();
        $jail = Jail::all();
        $physicalstatus = PhysicalStatus::all();
        $petitions = Petition::with('provinces', 'users','sectionss','physicalstatus')->orderBy("id", "desc")->get();
      
        return view('IGP.reportform', compact('petitions' ,'section' , 'provinces' , 'jail' , 'physicalstatus'));


    }
    public function searchreport(Request $request){
     
        $provinces = Province::all();
        $section = Section::all();
       
        $jail = Jail::all();
        $physicalstatus = PhysicalStatus::all();
        $fromdate = Carbon::parse($request->get('fromdate'))->format('Y-m-d');
        $todate = Carbon::parse($request->get('todate'))->format('Y-m-d');


        $gender = trim($request->input('gender'));
        $province = trim($request->input('province'));
        $status = trim($request->input('status'));
        $physicalstatuses = trim($request->input('physicalstatus'));
        $confinedinjail    = trim($request->input('confinedinjail'));
        $age_of_petitioner    = trim($request->input('age_of_petitioner'));
       $age = $age_of_petitioner." ".'years';
     
        if(!empty($request->get('undersection'))){
        $data = [];
        foreach($request->get('undersection') as $seat_id) {
            $data[] = 
                 $seat_id;
                
                //  $petitionsedit->section_id=$data;
                $sections = implode(',',$data);
        }
        $undersection = trim($sections);
      }
        $report = Petition::query();


        $searchs=[];
          if(!empty($confinedinjail))
          {
            $report->where('confined_in_jail', $confinedinjail)->get();
           //dd($searchs);
          }
          if(!empty($age_of_petitioner))
          {
            $report->where('age_of_petitioner', $age )->get();
           //dd($searchs);
          }
          if(!empty($gender)){
            $report->where('gender', $gender);
          }
          if(!empty($status)){
              if($status=='Accepted'){
                $report->where('status', $status);   
              }elseif($status=='Rejected'){
                $report->where('status', $status);   
              }else{
                $report->where('file_in_department', $status)->get(); 
              }
            
          }
       
          if(!empty($physicalstatuses)){
            $report->where('physicalstatus_id', $physicalstatuses)->get();
          }
          if(!empty($province))
          {
            $report->where('province_id', $province)->get();
          }
          if(!empty($undersection)){
            $report->where('section_id', $undersection)->get();
          }
          if(!empty($fromdate)){
            $report->orwherebetween('created_at',[$fromdate,$todate])->get();
          }
          $searchs = $report->with('provinces','users','physicalstatus')->get();

                return view('IGP.searchreportform', compact('searchs' , 'section' , 'provinces' , 'jail' , 'physicalstatus'));
}

public function stayupdate(Request $request,$id){
  $petitionstatusedit = Petition::where('id',$id)->first();
  $petitionstatusedit->status="pending";
  $petitionstatusedit->save();

 
  return redirect()->route('staypetition')->with('message', 'Petition Forward Successfully ');

  }


}
