<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use Hash;
use Intervention\Image\ImageManager;
use Image;
use App\Models\{Category, Subcategory, Services, Rating};
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        
        $menu = Subcategory::orderBy('name', 'asc')->get();

        return view('menu.index', compact('categories', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'asc')->get();
        $subcategory = Subcategory::orderBy('name', 'asc')->get();

        return view('menu.create', compact('category', 'subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeData(Request $request)
    {
        $input     = $request->all();

        $input['title']     = ucwords($request->input('title'));

        $input['link'] = strtolower(str_replace(" ","-",$request->input('title')));

        $save = Services::create($input);
            
            return response()->json([
                'status' => "success",
                'id'     => $save->id
            ]);

      /*  $image    = $request->file('image');

        $path = public_path('/assets/img/menu/image/');

        if($image){

            $new_name = time() . '.' . $image->getClientOriginalExtension();          
            $new_img = Image::make($image->getRealPath())->resize(300, null, function ($contraint){
              $contraint->aspectRatio();
          });

            $new_img->save($path . $new_name, 100);
        } else{

            $img = public_path('/assets/img/');

            $image = Image::make($img . 'favicon.png');

            $new_name = time() . '.png';

            $new_img = Image::make($image)->resize(300, null, function ($contraint){
              $contraint->aspectRatio();
          });

            $new_img->save($path . $new_name, 100);            
        }

        $input['image'] = $new_name;

        

        return back()->withStatus(__('Item successfully added.'));

        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $services = Services::orderBy('title', 'asc')->get();

        return view('menu.show',compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $items)
    {
     $category = Category::orderBy('name', 'asc')->get();
     $subcategory = Subcategory::orderBy('name', 'asc')->get();

     return view('menu.edit', compact('category', 'subcategory', 'items'));
 }

 public function review(Services $items)
 {
     $category = Category::orderBy('name', 'asc')->get();
     $subcategory = Subcategory::orderBy('name', 'asc')->get();
     $rating = Rating::all();
     $review = Rating::where('services_id', $items->id)->latest()->get(); 

     return view('menu.review', compact('category', 'subcategory', 'items', 'review', 'rating'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMenuInfo(Request $request, Services $items)
    { 
        $this->validatesMenuInfo($request);

        $input = $request->all();

        $input['title']     = ucwords($request->input('title'));

        $input['link'] = strtolower(str_replace(" ","-",$request->input('title')));

        $items->fill($input)->save();

        return back()->withStatus(__('Item successfully updated.')); 
    }


    public function updateMenuImage(Request $request, Services $items)
    { 
        $this->validatesMenuImage($request);

        $input = $request->all();

        $path = public_path('/assets/img/menu/image/');

        \File::delete($path . $items->image);

        $image    = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        

        $new_img = Image::make($image->getRealPath())->resize(300, null, function ($contraint){
          $contraint->aspectRatio();
      });

        $new_img->save($path . $new_name, 100);      
        $input['image'] = $new_name;

        $items->fill($input)->save();

        return back()->withStatus(__('Item image successfully updated.')); 
    }

    public function removeImage(Services $items)
    { 

        $path = public_path('/assets/img/menu/image/');

        \File::delete($path . $items->logo);

        $img = public_path('/assets/img/');

        $image = Image::make($img . 'favicon.png');

        $new_name = time() . '.png';

        $new_img = Image::make($image)->resize(300, null, function ($contraint){
          $contraint->aspectRatio();
      });

        $new_img->save($path . $new_name, 100);         
        Services::where('id', $items->id)->update(['image' => $new_name]);

        return back()->withStatus(__('Item image successfully removed.')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $items)
    {
       Services::where('id', $items->id)->delete();

       return back()->withStatus(__('Item successfully removed.'));
   }

   public function destroyAll()
   {

       Services::where('deleted_at', null)->delete();

       return back()->withStatus(__('Items successfully removed.'));
   }


   public function validatesMenu($request)
   {
    $request->validate([
        'title'               => ['required', Rule::unique('services')->where('title', request('title'))->where('category_id', request('category_id'))->where('description', request('description'))],
        'category_id'         => 'required',
        'subcategory_id'         => 'required',
        'description'        => 'nullable',

        'price'            => 'required',
        'image'               => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ],
    [
        'title.unique'  => 'Item already exists.',
        'category_id.required' => 'The category field is required.',
        'subcategory_id.required' => 'The subcategory field is required.',   
    ]);
}

public function validatesMenuInfo($request)
{
    $request->validate([
        'title'               => ['required', Rule::unique('services')->where('title', request('title'))->where('category_id', request('category_id'))->where('description', request('description'))],
        'category_id'         => 'required',
        'subcategory_id'         => 'required',
        'description'        => 'nullable',

        'price'            => 'required',
    ],
    [
        'title.unique'  => 'Item already exists.',
        'category_id.required' => 'The category field is required.',
        'subcategory_id.required' => 'The subcategory field is required.',   
    ]);
}

public function validatesMenuImage($request)
{
    $request->validate([
        'image'               => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);
}

}
