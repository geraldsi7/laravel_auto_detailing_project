<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Services, User, Wishlist};

use Auth;

class WishlistController extends Controller
{
 public function __construct()
 {
    $this->middleware(['auth']);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $wishlists = Wishlist::where('user_id', Auth::user()->id)->latest()->get();

     return view('wishlist.index', compact('wishlists'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     if($request->ajax()){
        $input = $request->all();

        $input['services_id'] = $request->id;

        $checkUserWishlist = Wishlist::where('user_id', Auth::user()->id)->where('services_id', $request->id)->first();

        if ($checkUserWishlist) {
         Wishlist::where('user_id', Auth::user()->id)->where('services_id', $request->id)->update([
            'updated_at' => date('Y-m-d H:i:s')
        ]);
         return response()->json([
            'msg' => 'Item already in wishlist'
        ]);
     }
     else{
        Auth::user()->wishlist()->create($input);

        return response()->json([
            'status' => 1,
            'msg' => 'Item added to wishlist',
        ]);
    }
}
}

public function actions(Request $request)
{    
    if ($request->ajax()) {

       $action = $request->actions;

       if(count(request('wishlist')) == 1){
        $row = 'Item';
    }
    else{
        $row = 'Items';
    }

    for ($i=0; $i < count(request('wishlist')); $i++) { 
        if ($action == 'allow') {
            Order::find($request->cart[$i])->update(['status' => 'allowed']);
        }
        elseif ($action == 'deny') {
            Order::find($request->cart[$i])->update(['status' => 'denied']);
        }
        elseif ($action == 'remove') {

          $find =   Wishlist::find($request->wishlist[$i]);

          $find->delete();

          $msg =   $row . " removed";
      }
  }

  $wishlists = Wishlist::where('user_id', Auth::user()->id)->latest()->get();

  $view = view('wishlist.data', compact('wishlists'))->render();

  return response()->json([
    'status' => 1,
    'msg' => $msg,
    'view'  => $view,
    'numberOfRows'  => count($wishlists)
]);
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
}
