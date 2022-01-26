<?php

namespace App\Http\Controllers;

use App\HomeDepartment;
use App\HumanRightDepartment;
use App\InteriorMinistry;
use App\Petition;

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
}
