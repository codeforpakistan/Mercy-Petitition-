<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    public function index()
    {

        $Province = Province::all();
        return view('province.index', ['Province' => $Province]);
    }

    public function create()
    {
        return view('province.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'province_name' => 'required|min:3|max:100',
        ];

        $this->validate($request, $rules);
        $province_data = [
            'province_name' => $request->province_name,
        ];
        DB::table('province')->insert($province_data);
        return redirect()->route('province.index')->with('success', 'province added successfully.');
    }

    public function edit($id)
    {
        $queryData = DB::table('province')
            ->where('id', '=', $id)
            ->first();

        return view('province.edit', ['queryData' => $queryData]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'province_name' => 'required|min:3|max:100',

        ];
        $this->validate($request, $rules);
        $province_data = [
            'province_name' => $request->province_name,
        ];
        DB::table('province')->where('id', $id)->update($province_data);
        return redirect()->route('province.index')->with('success', 'Province updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('province')->where('id', $id)->delete();
        return redirect()->route('province.index')
            ->with('success', 'province deleted successfully');
    }

}
