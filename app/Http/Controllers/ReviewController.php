<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\{Rating, Services};

class ReviewController extends Controller
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
        //
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
        if ($request->ajax()) {
            $input = $request->all();
            $input['services_id'] = $request->services_id;

            $checkUserRating = Rating::where('user_id', Auth::user()->id)->where('services_id', $request->services_id)->first();

            if ($checkUserRating) {
             Rating::where('user_id', Auth::user()->id)->where('services_id', $request->services_id)->update([
                'rate' => $request->rate,
                'review' => $request->review
            ]);
         }
         else{
            Auth::user()->rating()->create($input);     
        }

        $rating = Rating::where('services_id', $request->services_id)->latest()->get();

        $item = Services::find($request->services_id);

        return view('rating.data', compact('rating', 'item'))->render();
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
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();


            Rating::where('id', $request->id)->delete();

            $rating = Rating::where('services_id', $request->itemID)->latest()->get();

            $item = Services::find($request->itemID);
            return view('rating.data', compact('rating', 'item'))->render();

        } 
    }

    public function validatesReview($request)
    {
         $rating = Rating::where('services_id', $id)->latest()->get();

        $countRating = count($rating);

        $avg = $rating->average('rate');

        $roundedAvg = round($avg, 1);

        $halfRating = $roundedAvg - floor($roundedAvg);

        $ratingRemainder = 5 - $roundedAvg;

        $userOrders = $item->order->where('user_id', Auth::user()->id)->where('status', 5);

        $userReview = $item->rating->where('user_id', Auth::user()->id);
    }
}
