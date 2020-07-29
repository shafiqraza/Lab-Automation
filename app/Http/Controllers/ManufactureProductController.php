<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Manufacture_product;

use App\Photo;

use App\Lab_test;

use Illuminate\Support\Facades\Storage;

class ManufactureProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MFG_product = Manufacture_product::all();
        return view('admin.mfg_product.index',compact('MFG_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mfg_product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo_id' => 'required',
            'description' => 'required'
        ]);

        $file = $request->file('photo_id');

        $imgFullName = $file->getClientOriginalName();

        $imgName =  pathinfo($imgFullName,PATHINFO_FILENAME);

        $imgEx = $file->getClientOriginalExtension();

        $imgUniqueName =  $imgName .'_'. time()  . '.' . $imgEx;
        
        $file->StoreAs('public/images',$imgUniqueName);

        $photo = Photo::create(['name' => $imgUniqueName]);

        $product = new Manufacture_product;

        $product->name = $request->name;
        $product->photo_id = $photo->id;
        $product->code = rand();
        $product->description = $request->description;

        $product->save();

        $labTest = new Lab_test;

        $labTest->name = $request->name . ' Lab Test';
        $labTest->product_id = $product->id;
        $labTest->test_count = 1;

        $labTest->save();

        return redirect('/admin/manufacture_product');
        // return $imgUniqueName;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Manufacture_product::find($id);

        return view('admin.mfg_product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Manufacture_product::find($id);

        return view('admin.mfg_product.edit',compact('product'));
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
        $product = Manufacture_product::find($id);
        if ($request->file('photo_id')) {

            Storage::delete('/public/images/'.$product->photo->name);

            $file = $request->file('photo_id');

            $imgFullName = $file->getClientOriginalName();

            $imgName =  pathinfo($imgFullName,PATHINFO_FILENAME);

            $imgEx = $file->getClientOriginalExtension();

            $imgUniqueName =  $imgName .'_'. time()  . '.' . $imgEx;
            
            $file->StoreAs('public/images',$imgUniqueName);

            // $photo = Photo::create(['name' => $imgUniqueName]);

            $photo = Photo::find($product->photo_id);

            $photo->update(['name' => $imgUniqueName]);

            $product->photo_id = $photo->id;

        }

        // $product->lab_test->name = $request->name . ' Test';

        $product->name = $request->name;
        


        $product->description = $request->description;
        $product->save();

        return redirect('admin/manufacture_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Manufacture_product::find($id);

        Storage::delete('/public/images/'.$product->photo->name);

        $photo = Photo::find($product->photo_id);

        $photo->delete();

        $product->delete();

        return redirect('admin/manufacture_product');
    }
}
