<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\{Category, Subcategory, Services};

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'admin.access']);
    }

    public function index()
    {

        $title = Category::orderBy('name', 'asc')->get();

        return view('title.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('title.create');
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

        Category::create($input);

        return back()->withStatus(__('Category successfully added.'));
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
    public function edit(Category $titles)
    {
        return view('title.edit', compact('titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $titles)
    { 
        $this->validates($request);

        $input = $request->all();

        $input['title'] = ucwords($request->input('name'));


        $titles->fill($input)->save();

        return back()->withStatus(__('Category successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $titles)
    {
     $subcategory = Subcategory::where('category_id', $titles->id)->first();

     Services::where('subcategory_id', $subcategory->id)->delete();

     Subcategory::where('category_id', $titles->id)->delete();

     Category::where('id', $titles->id)->delete();            


     return back()->withStatus(__('Category successfully removed.'));
 }

 public function destroyAll()
 {        
    Services::where('deleted_at', null)->delete();

    Subcategory::where('deleted_at', null)->delete();

    Category::where('deleted_at', null)->delete();  

    return back()->withStatus(__('Categories successfully removed.'));
}




public function validates($request)
{
    $request->validate([
     'name'               => 'required|unique:categories,name',
 ],
 [
    'name.required' => 'Category field is required.',

    'name.unique' => 'Category already exists.',
]
);
}
}
