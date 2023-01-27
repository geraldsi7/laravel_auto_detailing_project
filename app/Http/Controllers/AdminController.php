<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User,Customer};
use Auth;
use Hash;
use Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin.access']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $user = User::orderBy('name', 'asc')->where('role', '!=', 'Customer')->get();

        return view('users.index', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = User::orderBy('name', 'asc')->where('role', 'Customer')->get();
        
        return view('users.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validates($request);

        $input = $request->all();

        $input['name'] = ucwords($request->input('name'));

        $input['password'] = Hash::make('adansj1');

        $input['orders'] = 0;

        User::create($input);

        return back()->withStatus(__('User successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $users->fill($request->all())->save();

        return back()->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {

        User::where('id', $user)->delete();

        return back()->withStatus(__('Staff successfully removed.'));
    }

    public function destroyAll()
    {

        User::where('role', '!=', 'Customer')->where('id', '!=', Auth::user()->id)->delete();

        return back()->withStatus(__('Staff successfully removed.'));
    }

    public function validates($request)
    {
        $request->validate([
         'name'               => 'required',
         'email'             => 'required|unique:users,email,',
         'role'               => 'required'
     ]);
    }
}
