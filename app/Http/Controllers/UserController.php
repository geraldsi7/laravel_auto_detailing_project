<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User};
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin.access']);
    }
    

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::orderBy('name', 'asc')->where('role', '!=', 'Customer')->get();

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validates($request);
        $u = uniqid();
        $n = 20;
        
        $r = bin2hex(random_bytes($n)) . $u . bin2hex(random_bytes($n));

        $email = $request['email'];

        $name = ucwords($request['name']);

        VerifyUser::updateOrCreate([
            'email' => $email
        ],
        [
            'name' => $name,
            'email' => $email,
            'password' => $request['password'],
            'token' => $r,
            'expires_at' => strtotime('+2 hours'),
            'token' => $r,
        ]);

        $user = VerifyUser::where('email', $email)->first();

        $this->sendMail($request, $name, $email,  $r);

        return view('auth.verify',compact('user'));
    }

    public function update(Request $request, $user)
    {
        $this->validates($request);

        User::where('id', $user)->update([
            'name' => ucwords($request->input('name')),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'address' => $request->input('address'),
            'role' => $request->input('role'),
            'salary' => $request->input('salary'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
        ]
    );

        if (!empty($request->input('password'))) {

           User::where('id', $user)->update([
             'password' => Hash::make($request->input('password')),
         ]
     );
       }
       return back()->withStatus(__('User successfully edited.'));
   }




public function validates($request){
    $request->validate([
     'name' => 'required',
     'phone1' => 'required|digits:10',
     'phone2' => 'nullable|digits:10',
     'address' => 'required',
     'role' => 'required',
     'password' => 'nullable',
     'salary' => 'required|min:0',
     'gender' => 'required',
     'dob' => 'required',
 ]);
}
}
