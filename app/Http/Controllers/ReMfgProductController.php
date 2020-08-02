<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Remanufacture_product;
use App\Result;
use App\Lab_test;
use App\Cpri_test;
use App\TrashedProduct;
use App\LaunchedProduct;
use App\Manufacture_product;


class ReMfgProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reMfgPro  = Remanufacture_product::all();
        return view('admin.reMfgProduct.index',compact('reMfgPro'));
        
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
        $reProduct = Remanufacture_product::find($id);
        $results  = Result::pluck('name','id')->all();
        return view('admin.reMfgProduct.edit',compact(['reProduct','results']));
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
        $product = Remanufacture_product::find($id);

        if ($request->result_id == 1) {

            $labTest = new Lab_test;

            if ($product->testable_type == 'App\Lab_test') {

                $reMfgCount = Remanufacture_product::where(['testable_id' => $product->testable_id,'testable_type' => $product->testable_type,'result_id' => 1]);

                if ($reMfgCount->count() <= 0) {
                    $labTest->name = $product->lab_test->product->name . ' Laboratory Test Repeat'; 
                    $labTest->product_id = $product->lab_test->product->id;
                    $labTest->test_count = 2;
                    $labTest->save();
                }

                

                // return 'This is from Laboratory Test';
            
            }elseif ($product->testable_type == 'App\Cpri_test') {

                $reMfgCount = Remanufacture_product::where(['testable_id' => $product->testable_id,'testable_type'=>$product->testable_type,'result_id'=> 2]);

                if ($reMfgCount->count() <= 0) {
                    $labTest->name = $product->cpri_test->lab_test->product->name . ' CPRI Test Repeat';
                    $labTest->product_id = $product->cpri_test->lab_test->product->id;
                    $labTest->test_count = 2;
                    $labTest->save();
                }

                

                // return 'This is from CPRI Test';
            }

            $product->result_id = $request->result_id;

            $product->save();

            // $trashProduct = new LaunchedProduct;
            // $trashProduct->remanufacture_id = $product->id;
            // $trashProduct->save();

            return redirect('admin/remfgproduct'); 
        


         }elseif($request->result_id == 2) {

            $reProductRepeat = Remanufacture_product::where(['testable_type' => $product->testable_type, 'testable_id' => $product->testable_id,'result_id' => 2]);

            if ($reProductRepeat->count() <= 0) {
                $trashProduct = new TrashedProduct;
                $trashProduct->testable_id = $product->id;
                $trashProduct->testable_type = 'Remanufacture Fault';
                $trashProduct->save();
            }

            // echo "Trashed return";

            if ($product->testable_type == 'App\Lab_test') {
                $lab_test = Lab_test::find($product->testable_id);
                $lab_test->details = 'Trashed Item';
                $lab_test->save();

                $mfgProduct = Manufacture_product::find($lab_test->product->id);
                $mfgProduct->description = 'Trashed Item';
                $mfgProduct->save();

                // echo "from Lab Test";

            }else{
                $cpri_test  = Cpri_test::find($product->testable_id);
                $cpri_test->details = 'Trashed Item';
                $cpri_test->save();

                $mfgProduct = Manufacture_product::find($cpri_test->lab_test->product->id);
                $mfgProduct->description = 'Trashed Item';
                
                $mfgProduct->save();
                // echo "CPRI test";
            }
        }
            $product->result_id = $request->result_id;

            $product->save();
            return redirect('admin/remfgproduct'); 

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
