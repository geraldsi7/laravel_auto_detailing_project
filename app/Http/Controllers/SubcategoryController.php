<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User,Category,Subcategory, Services, Rating};
use Auth;
use Validator;
use Illuminate\Validation\Rule;

class SubcategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('name', 'asc')->where('link', '!=', null)->get();
        $subcategory = Subcategory::orderBy('name', 'asc')->where('link', '!=', null)->get();

        return view('menu.index', compact('category','subcategory'));
    }

    public function manage()
    {

        $subcategory = Subcategory::orderBy('name', 'asc')->get();

        return view('subcategory.manage', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'asc')->where('link', '!=', null)->get();

        return view('subcategory.create', compact('category'));
    }

    public function getSubcategoryList(Request $request)
    {
        $subcategory = Subcategory::where("category_id", $request->category_id)->orderBy('name', 'asc')->pluck("id", "name");

     return response()->json($subcategory);
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

        $input['link'] = strtolower(str_replace(" ","-",$request->input('name')));

        Subcategory::create($input);
        
        return back()->withStatus(__('Subcategory successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $id)
    {
        $subcategory = Subcategory::where('link', $id)->first();
        $post = Services::where('subcategory_id', $subcategory->id)->latest()->get();
        $rating = Rating::all();
        return view('subcategory.show', compact('subcategory','post', 'rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategories)
    {
        $category = Category::orderBy('name', 'asc')->where('link', '!=', null)->get();
        return view('subcategory.edit', compact('category','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategories)
    {
        $this->validates($request);

        $input = $request->all();

        $input['name'] = ucwords($request->input('name'));

        $input['link'] = strtolower(str_replace(" ","-",$request->input('name')));

        $subcategories->fill($input)->save();

        return back()->withStatus(__('Subcategory successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subcategory)
    {
        Services::where('subcategory_id', $subcategory)->delete();

        Subcategory::where('id', $subcategory)->delete();

        return back()->withStatus(__('Subcategory successfully deleted.'));
    }

    public function destroyAll()
    {
       Services::where('deleted_at', null)->delete();

       Subcategory::where('deleted_at', null)->delete();


       return back()->withStatus(__('Subcategories successfully removed.'));
   }



   public function validates($request)
   {
    $request->validate([
       'name'               => ['required', Rule::unique('subcategories')->where('name', request('name'))->where('category_id', request('category_id'))],

       'category_id'         => 'required',
   ],
   [
    'name.required' => 'Subcategory field is required.',

    'name.unique' => 'Subcategory already exists.',

    'category_id.required' => 'Category field is required.',
]
);
}
}
