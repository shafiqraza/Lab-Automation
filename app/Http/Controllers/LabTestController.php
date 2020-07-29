<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lab_test;
use App\Cpri_test;
use App\Result;
use App\TrashedProduct;
use App\Remanufacture_product;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Lab_test::all();
        return view('admin.lab_test.index',compact('test'));
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
        $test = Lab_test::find($id);

        $result  = Result::pluck('name','id')->all();

        return view('admin/lab_test/edit',compact(['test','result']));
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
        $request->validate(['result_id' => 'required']);
        $test = Lab_test::find($id);
        

        if ($request->result_id == 1) {

           $alreadyAddedTest =  Lab_test::where(['product_id' => $test->product_id, 'result_id' => true])->get();

            if ($alreadyAddedTest->count() <= 0) {
                
                // $testCount2 = Lab_test::where(['test_count' => 2]);

                // if ($testCount2 <= 0) {
                //     # code...
                // }
            
                $cpriTest = new Cpri_test;
                $cpriTest->name = 'CPRI TEST';
                $cpriTest->lab_test_id = $test->id;
                $cpriTest->save();

            }
        
        }elseif ($request->result_id == 2) {

            $alreadyAddedTest = Lab_test::where(['product_id'=>$test->product_id,'result_id'=>2]);
            

            if ($alreadyAddedTest->count() <= 0) {

                $testCount2 = Lab_test::where(['test_count' => 2]);

                if ($testCount2->count() <= 0) {
                    
                    $reMfgProduct = new Remanufacture_product;

                    $reMfgProduct->testable_id = $test->id;

                    $reMfgProduct->testable_type = 'App\Lab_test';

                    $reMfgProduct->save();
                }else{
                    $trashedProduct = new TrashedProduct;
                    $trashedProduct->testable_type = 'LAB TEST';
                    $trashedProduct->testable_id = $test->id;
                    $trashedProduct->save();
                }
               
                
            }

            
 
        
        }


        $test->name = $request->name;

        $test->result_id = $request->result_id; 

        $test->details = $request->details;

        $test->save();

        return redirect('admin/labtest');


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
