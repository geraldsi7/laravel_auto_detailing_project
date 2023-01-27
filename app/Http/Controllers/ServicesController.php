<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User,Region,City,Category,Subcategory, Services, Rating};
use Auth;
use Hash;
use Intervention\Image\ImageManager;
use Image;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class ServicesController extends Controller
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
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $category = $categories->first();

        $items = Services::where('category_id', $category->id)->orderBy('title', 'asc')->get();
        
        return view('item.manage.index', compact('categories', 'items'));
    }


    public function fetch(Request $request)
    {
     if ($request->ajax()) {
         $category = $request->category;

         $search = $request->search;

         $search = str_replace(" ", "%", $search);

         $items = Services::where('category_id', $category)->orderBy('title', 'asc')->where('title', 'LIKE', '%'. $search. '%')->get();

         $view = view('item.manage.data', compact('items'))->render();

         return response()->json([
            'status' => 1,
            'view'  => $view,
            'numberOfRows'  => count($items)
        ]);
     }
 }


 public function fetchForm(Request $request)
 {
    if ($request->ajax()) {

        $categories = Category::orderBy('name', 'asc')->get();

        if ($request->id) {
            $item = Services::find($request->id);
        }else{
            $item = null;
        }


        return view('item.manage.form', compact('categories', 'item'))->render();
    }
}


public function actions(Request $request)
{    
    if ($request->ajax()) {

     $action = $request->actions;

     $path = public_path('/assets/img/items/photos/');

     for ($i=0; $i < count(request('item')); $i++) { 
      if ($action == 'remove') {

         $find =   Services::find($request->item[$i]);

         for ($j=1; $j <= 4; $j++) { 

            $destination = $path . $find['image' . $j];

            if (\File::exists($destination)) {
               \File::delete($destination);
           }
       }

       $find->delete();
   }
}
}
}


public function search(Request $request)
{
    $request->validate([
        'region' => 'required',
        'city' => 'required',
        'category' => 'required',
        'subcategory' => 'required',
    ]);
    $sRegion = $request->input('region');
    $sCity = $request->input('city');
    $sCategory = $request->input('category');
    $sSubcategory = $request->input('subcategory');
    $service = Services::orderBy('created_at', 'asc')->where('city_id', $sCity)->where('subcategory_id', $sSubcategory)->where('status', 'authorized')->get();
    $category = Category::orderBy('name', 'asc')->get();
    $regions = Region::orderBy('name', 'asc')->get();
    return view ('pages.services-search', compact('service', 'category', 'regions'))->withDetails($service)->withQuery($sCity, $sSubcategory);
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
      $input     = $request->all();

      $input['title']     = ucwords($request->title);

      $link = strtolower($request->title);

      $input['link'] = str_replace(" ","-", $link . ' ' . time());

      $path = public_path('/assets/img/items/photos/');

      for ($i=1; $i <= 4; $i++) { 
          $image    = $request->file('image' . $i);

          if($request->hasfile('image' . $i)){

            $new_name = strtoupper(str_replace(" ","", $input['title']) . time()) . '_IMG' . $i . '.' . $image->getClientOriginalExtension();          
            $new_img = Image::make($image->getRealPath())->resize(300, null, function ($contraint){
              $contraint->aspectRatio();
          });

            $new_img->save($path . $new_name, 100);

            $input['image' . $i] = $new_name;
        }        
    }

    Services::create($input);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request)
    {
        $item = Rating::find($id);

        $countRating = count($rating);

        $avg = $rating->average('rate');

        $roundedAvg = round($avg, 1);

        $halfRating = $roundedAvg - floor($roundedAvg);

        $ratingRemainder = 5 - $roundedAvg;
    }

    public function removeItemImage(Request $request)
    {
        if ($request->ajax()) {

            $item = Services::find($request->id);

            $img = $request->img;

            $path = public_path('/assets/img/items/photos/');

            $destination = $path . $item[$img];

            if (\File::exists($destination)) {
             \File::delete($destination);
         }

         $item->update([
            $img => null
        ]);

         return view('item.manage.img-data', compact('item'))->render();

     }
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
    public function update(Request $request, Services $item)
    {

       if($request->ajax()){
         $input     = $request->all();

         $item = Services::find($request->id);

         $input['title']     = ucwords($request->title);

         $link = strtolower($request->title);

         $input['link'] = str_replace(" ","-", $link . ' ' . time());

         $path = public_path('/assets/img/items/photos/');

         for ($i=1; $i <= 4; $i++) { 
          $image    = $request->file('image' . $i);

          if($request->hasfile('image' . $i)){

            $destination = $path . $item['image' . $i];

            if (\File::exists($destination)) {
             \File::delete($destination);
         }

         $new_name = strtoupper(str_replace(" ","", $input['title']) . time()) . '_IMG' . $i . '.' . $image->getClientOriginalExtension();          
         $new_img = Image::make($image->getRealPath())->resize(300, null, function ($contraint){
          $contraint->aspectRatio();
      });

         $new_img->save($path . $new_name, 100);

         $input['image' . $i] = $new_name;
     }        
 }

 $item->fill($input)->save();
}
}

public function validates(Request $request)
{

 if ($request->ajax()) {

    $id = Services::find($request->id);

    $validation = \Validator::make($request->all(),[
        'title'               => 'required',
        'category_id'         => 'required',
        'description'        => 'nullable',
        'price'            => ['required', 'numeric', 'min:0'],
        'image1'               => 'nullable|image|mimes:jpeg,png,jpg',
        'image2'               => 'nullable|image|mimes:jpeg,png,jpg',
        'image3'               => 'nullable|image|mimes:jpeg,png,jpg',
        'image4'               => 'nullable|image|mimes:jpeg,png,jpg',
    ],
    [
        'title.unique'  => 'Item already exists.',
        'category_id.required' => 'The category field is required.',
        'image1.required' => 'At least an image is required.',
        'image1.image' => 'The field must be an image.',
        'image2.required' => 'The image field is required.',
        'image2.image' => 'The field must be an image.',
        'image2.required' => 'The image field is required.',
        'image2.image' => 'The field must be an image.',
        'image3.required' => 'The image field is required.',
        'image3.image' => 'The field must be an image.',
        'image4.required' => 'The image field is required.',
        'image4.image' => 'The field must be an image.',

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
