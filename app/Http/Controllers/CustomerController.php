<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User, Customer, Order};
use Auth;
use Hash;
use Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
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
        $customers = User::orderBy('name', 'asc')->where('role', 'Customer')->withTrashed()->get();
        
        return view('customer.index', compact('customers'));
    }


    public function fetch(Request $request){
        if ($request->ajax()) {

         $search = $request->search;

         $search = str_replace(" ", "%", $search);

         $customers = User::orderBy('name', 'asc')->where('role', 'Customer')->where('name', 'LIKE', '%'. $search. '%')->withTrashed()->get();

         $view = view('customer.data', compact('customers'))->render();

         return response()->json([
            'status' => 1,
            'view'  => $view,
            'numberOfRows'  => count($customers)
        ]);
     }
 }

 public function fetchForm(Request $request)
 {
    if ($request->ajax()) {

        if ($request->id) {
            $customer = User::find($request->id);
        }else{
            $customer = null;
        }

        return view('customer.form', compact('customer'))->render();
    }
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $input['name'] = ucwords($request->input('name'));

        $input['password'] = Hash::make('adansj1');

        $input['orders'] = 0;

        User::create($input);

        return back()->withStatus(__('Customer successfully added.'));
    }


    public function actions(Request $request)
    {    
        if ($request->ajax()) {

         $action = $request->actions;

         for ($i=0; $i < count(request('customer')); $i++) { 

            $find = User::where('id', $request->customer[$i])->withTrashed();

            if ($action == 'allow') {
                $find->update(['deleted_at' => null]);
            }
            elseif ($action == 'deny') {
                $find->delete();
            }
        }
    }
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }


    public function validates(Request $request)
    {
     if ($request->ajax()) {

        $id = User::find($request->id);

        $validation = \Validator::make($request->all(),[
            'name'  => ['required','string', 'max:255'],
            'email'  => ['required','email', Rule::unique('users')->ignore($id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!$validation->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validation->errors()->toArray(),
                'error_length' => $validation->errors()->all(),
            ]);
        } 
    }
}
}
