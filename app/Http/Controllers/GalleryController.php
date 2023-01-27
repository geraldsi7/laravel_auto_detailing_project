<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        if ($request->ajax()) {

            $galleries = Gallery::latest()->get();

            $view = view('gallery.data', compact('galleries'))->render();

            return response()->json([
                'status' => 1,
                'view'  => $view,
                'numberOfRows'  => count($galleries)
            ]);
        }
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {

            if ($request->id) {
                $gallery = Gallery::find($request->id);
            } else {
                $gallery = null;
            }

            return view('gallery.form', compact('gallery'))->render();
        }
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
            $data = $request->all();

            $validation = \Validator::make(
                $data,
                [
                    'photo' => 'required|mimes:jpg,jpeg,png',

                ]
            );

            if (!$validation->passes()) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Something went wrong',
                    'error' => $validation->errors()->toArray(),
                    'error_length' => $validation->errors()->all(),
                ]);
            } else {
                $destination_path = 'public/img/gallery';
                $image = $request->file('photo');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs($destination_path, $image_name);
                $data['file'] = $image_name;

                Gallery::create($data);

                return response()->json([
                    'status' => 1,
                    'msg' => 'Photo successfully saved',
                ]);
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
    public function update(Request $request, Gallery $gallery)
    {
        if ($request->ajax()) {

            $data = $request->all();

            $validation = \Validator::make(
                $data,
                [
                    'photo' => 'required|mimes:jpg,jpeg,png',

                ]
            );

            if (!$validation->passes()) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Something went wrong',
                    'error' => $validation->errors()->toArray(),
                    'error_length' => $validation->errors()->all(),
                ]);
            }else{
                $destination_path = 'public/img/gallery'; 

                if($request->hasFile('photo')){
                    $destination = $destination_path . '/' . $gallery->file;
                     $image = $request->file('photo');
                     if (Storage::exists($destination)) {                
                        Storage::delete($destination);
                    }
                     $image_name = time() . '.' . $image->getClientOriginalExtension();
                     $path = $image->storeAs($destination_path, $image_name);
                     $data['file'] = $image_name;

                     $gallery->fill($data)->save();

                     return response()->json([
                        'status' => 1,
                        'msg' => 'Photo successfully updated',
                    ]);
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
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $data = Gallery::find($request->ref);

            $destination_path = 'public/img/gallery'; 

            $destination = $destination_path . '/' . $data->file;
            if (Storage::exists($destination)) {                
                Storage::delete($destination);
            }

            $data->delete();

            return response()->json([
                'status' => 1,
                'msg' => 'Photo successfully removed',
            ]);
        }
    }
}
