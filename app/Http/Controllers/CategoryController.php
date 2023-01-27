<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User,Category,Subcategory, Services};
use Auth;
use Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('name', 'asc')->get();

        return view('category.manage.index', compact('categories'));
    }

    public function navIndex()
    {
        $categories = Category::get();
        return view('layouts.navbars.navs.guest', compact('categories'));
    }

    public function fetch(Request $request){
        if ($request->ajax()) {

         $search = $request->search;

         $search = str_replace(" ", "%", $search);

         $categories = Category::orderBy('name', 'asc')->where('name', 'LIKE', '%'. $search. '%')->get();

         $view = view('category.manage.data', compact('categories'))->render();

         return response()->json([
            'status' => 1,
            'view'  => $view,
            'numberOfRows'  => count($categories)
        ]);
     }
 }


 public function fetchForm(Request $request)
 {
    if ($request->ajax()) {

        if ($request->id) {
            $category = Category::find($request->id);
        }else{
            $category = null;
        }


        return view('category.manage.form', compact('category'))->render();
    }
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
        $input = $request->all();

        $input['name'] = ucwords($request->name);

        $link = strtolower($request->name);

        $input['link'] = str_replace(' ', '-', $link);

        Category::create($input);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('link', $id)->first();

        $items = Services::where('category_id', $category->id)->latest()->paginate(25);

        return view('category.show', compact('category', 'items'));
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

    public function update(Request $request, Category $category)
    { 
        if($request->ajax()){
            $input = $request->all();

            $input['name'] = ucwords($request->name);

            $link = strtolower($input['name']);

            $input['link'] = str_replace(" ","-", $link);

            $category->fill($input)->save();
        }
    }

    public function actions(Request $request)
    {    
        if ($request->ajax()) {

         $action = $request->actions;

         for ($i=0; $i < count(request('category')); $i++) { 
          if ($action == 'remove') {

              $find =   Category::find($request->category[$i]);

              $find->delete();
          }
      }
  }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
      //
    }

    public function validates(Request $request)
    {

     if ($request->ajax()) {

        $id = Category::find($request->id);


        $validation = \Validator::make($request->all(),[
            'name'  => ['required', Rule::unique('categories')->ignore($id)],
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
