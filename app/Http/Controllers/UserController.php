<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use App\Province;
use App\Jail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
	
    function __construct()
    {
         $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','store']]);
         $this->middleware('permission:users-create', ['only' => ['create','store']]);
         $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'old_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
            return redirect()->route('portal.users.password')->with('success', 'Password Change successfully');
        }
        return view('portal.users.password');
    }

    public function index(Request $request)
    {
        \Debugbar::info($request->input('search'));
        $search = $request->input('search');
        if ($request->input('search')) {
            $data = User::where('name', 'LIKE', '%' . $search . '%')->orderBy('id', 'DESC')->paginate(20)->onEachSide(2);
        } else {
            $data = User::where('status', '1')->orderBy('id', 'DESC')->paginate(20)->onEachSide(2);
        }
        return view('portal.users.index', compact('data', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $provinces=Province::all();
        $jails=Jail::all();
        return view('portal.users.create', compact('roles','provinces','jails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',

        ]);

        $input = $request->all();


        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->confined_in_jail = $request->get('confined_in_jail');
        if($request->get('province_id')){
            $user->province_id = $request->get('province_id');
        }else{
            $user->province_id = $request->get('province_id1');
        }



        $user->assignRole($request->input('roles'));

        $user->save();

        return redirect()->route('portal.users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jailview($id)
    {

        $pets = Jail::where('province_id', $id)->get();



        return response()->json($pets);

    }
    public function show($id)
    {
        $user = User::find($id);
        return view('portal.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('portal.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        \Debugbar::info($input);
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('portal.users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $useractive = User::find($id);
        $useractive->status = '0';
        $useractive->save();
        return redirect()->route('portal.users.index')
            ->with('success', 'User deleted successfully');
    }

    public function profile(Request $request, $id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($request->isMethod('post')) {
            return redirect()->route('portal.users.password');
        }
        return view('portal.users.profile', compact('user'));
    }

}
