<?php

namespace App\Http\Controllers;

use App\HomeDepartment;
use App\HumanRightDepartment;
use App\InteriorMinistry;
use App\Petition;
use App\Province;
use App\Section;
use App\Jail;
use App\PhysicalStatus;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
    public function view($id)
    {
        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();
        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        $humanrightpittions = HumanRightDepartment::with('humanrightfileattachements')->where('petition_id', $id)->first();

        $pets = Petition::with('fileattachements', 'sectionss')->get();

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

        $Accepted = Petition::Where('status', 'Accepted')->orderBy("id", "desc")->paginate(5);

        return view('IGP.accepted', compact('Accepted'));
    }
    public function rejected()
    {

        $Rejected = Petition::Where('status', 'Rejected')->orderBy("id", "desc")->paginate(5);

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
        $petitions = Petition::orderBy("id", "desc")->paginate(5);
        // dd($provinces);
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
        $undersection = trim($request->input('undersection'));
        $report = Petition::query();

        
        $searchs=[];
          if(!empty($confinedinjail))
          {
            $report->where('confined_in_jail', $confinedinjail)->get();
           //dd($searchs);
          }
          if(!empty($gender)){
            $report->where('gender', $gender);
          }
          if(!empty($status)){
            $report->where('status', $status);
          }
          if(!empty($status)){
            $report->where('file_in_department', $status)->get();
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
          $searchs = $report->get();
           
                return view('IGP.searchreportform', compact('searchs' , 'section' , 'provinces' , 'jail' , 'physicalstatus'));
}

public function pdfview(Request $request)
{
    $petitions = DB::table("petitions")->get();
    view()->share('petitions',$petitions);


    if($request->has('download')){
        $pdf = PDF::loadView('IGP.reportformpdf');
        return $pdf->download('IGP.reportformpdf.pdf');
    }


    return view('reportformpdf');
}
}
