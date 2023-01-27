<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use Intervention\Image\ImageManager;
use Image;
use App\Models\{Category, Subcategory, Services, Rating, Order};
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('q'); 
        if($search){    
            $post = Services::latest()->where('title', 'LIKE', '%' .$search. '%')->get();
        }
        else{
         $post = Services::latest()->where('title', null)->get();
     }
     $rating = Rating::all();

     return view('item.search', compact('post', 'rating'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $r
     * @return \Illuminate\Http\Response
     */
    public function show($category, $post, $r)
    {

        $item = Services::find($r);

        $others = Services::where('id', '!=', $r)->where('category_id', $item->category->id)->inRandomOrder()->take(5)->get();

        $rating = Rating::where('services_id', $r)->latest()->get();

        $countRating = count($rating);

        $avg = $rating->average('rate');

        $roundedAvg = round($avg, 1);

        $halfRating = $roundedAvg - floor($roundedAvg);

        $ratingRemainder = 5 - $roundedAvg;

        if(Auth::user()){
          $userOrders = $item->order->where('user_id', Auth::user()->id)->where('status', 5);


          $userReview = $item->rating->where('user_id', Auth::user()->id);


          $user_rating = Rating::where('services_id', $r)->where('user_id', Auth::user()->id)->first();
      }
      else{
        $user_rating = Rating::where('services_id', $r)->get();

        $userOrders = null;

        $userReview = null;
    }

    return view('item.show', compact('item', 'others', 'rating', 'countRating', 'roundedAvg', 'halfRating', 'ratingRemainder', 'userOrders', 'userReview', 'user_rating'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($r)
    {
        //
    }
}
