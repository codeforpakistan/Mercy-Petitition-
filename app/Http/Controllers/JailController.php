<?php

namespace App\Http\Controllers;

use App\Jail;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JailController extends Controller
{
    public function index()
    {

        $jail = Jail::with('provinces')->get();
        // dd($jail);
        return view('jail.index', ['jail' => $jail]);
    }

    public function create()
    {
        $provinces = Province::all();
        return view('jail.create', compact('provinces'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $rules = [
            'jail_name' => 'required|min:3|max:100',
            // 'province_id' => 'required|min:3|max:100',
        ];

        $this->validate($request, $rules);
        // $jail_data = [
        //     'jail_name' => $request->jail_name,
        //     'province_id' => $request->province_id,
        // ];
        // dd($jail_data);
        $logPetitions =  new Jail([

            "jail_name" => $request->get('jail_name'),
            "province_id" => $request->get('province_id'),
        ]);
        $logPetitions->save();



        return redirect()->route('jail.index')->with('success', 'Jail added successfully.');
    }

    public function edit($id)

    {

        $provinces = Province::all();
        $queryData = DB::table('jails')
            ->where('id', '=', $id)
            ->first();

        return view('jail.edit', ['queryData' => $queryData , 'provinces' => $provinces ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'jail_name' => 'required|min:3|max:100',
            // 'province_id' => 'required|min:3|max:100',

        ];
        $this->validate($request, $rules);
        $jail_data = [
            'jail_name' => $request->jail_name,
            'province_id' => $request->province_name,
        ];
        DB::table('jails')->where('id', $id)->update($jail_data);
        return redirect()->route('jail.index')->with('success', 'Jail updated successfully.');
    }

    // public function destroy($id)
    // {
    //     DB::table('jails')->where('id', $id)->delete();
    //     return redirect()->route('jail.index')
    //         ->with('success', 'Jail deleted successfully');
    // }

}
