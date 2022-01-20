<?php

namespace App\Http\Controllers;
use App\PhysicalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhysicalStatusController extends Controller
{


    public function index()
    {

        $physicalstatus= PhysicalStatus::all();
       return view('physicalstatus.index',['physicalstatus'=>$physicalstatus]);
    }

    public function create()
    {
        return view('physicalstatus.create');
    }

    public function store(Request $request)
    {
        $rules=[
            'physicalstatus'=>'required|min:3|max:100'
        ];

        $this->validate($request, $rules);
        $physicalstatus_data = [
            'physicalstatus' => $request->physicalstatus
        ];
        DB::table('physical_status')->insert($physicalstatus_data);
        return redirect()->route('physicalstatus.index')->with('success', 'physical status added successfully.');
    }

    public function edit($id)
    {
        $queryData = DB::table('physical_status')
        ->where('PSid', '=', $id)
        ->first();

        return view('physicalstatus.edit',  ['queryData'=>$queryData]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'PhysicalStatus'=>'required|min:3|max:100'

        ];
        $this->validate($request, $rules);
        $physicalstatus_data = [
            'PhysicalStatus' => $request->PhysicalStatus
        ];
        DB::table('physical_status')->where('PSid', $id)->update($physicalstatus_data);
        return redirect()->route('physicalstatus.index')->with('success', 'physicalstatus updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('physical_status')->where('PSid', $id)->delete();
        return redirect()->route('physicalstatus.index')
                    ->with('success','physicalstatus deleted successfully');
    }




   }

