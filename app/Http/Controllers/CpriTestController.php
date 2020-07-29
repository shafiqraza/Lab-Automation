<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cpri_test;
use App\Result;
use App\Remanufacture_product;
// use App\Remanufacture_product;
use App\TrashedProduct;
use App\Launched_product;

class CpriTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpriTest = Cpri_test::all();
        return view('admin.cpriTest.index',compact('cpriTest'));
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
        $cpriTest = Cpri_test::find($id);

        $result = Result::pluck('name','id')->all();

        return view('admin.cpriTest.edit',compact(['cpriTest','result']));
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
        $cpriTest =  Cpri_test::find($id);
        if ($request->result_id == 1) {

            $alreadyTakenTest = Cpri_test::where(['lab_test_id' => $cpriTest->lab_test->id,'result_id' => 1]);
            
            if ($alreadyTakenTest->count() <= 0) {
                $launchProduct = new Launched_product;
                $launchProduct->cpri_test_id = $cpriTest->id;
                $launchProduct->save();
            }
            

        }elseif ($request->result_id == 2) {

            $alreadyTakenTest = Cpri_test::where(['lab_test_id' => $cpriTest->lab_test->id,'result_id' => 2]);
            
            if ($alreadyTakenTest->count() <= 0) {

                $testCount2 = Cpri_test::where('test_count', 2);

                if ($testCount2->count() <= 0) {
                    $reProduct = new Remanufacture_product;
                    $reProduct->testable_id = $cpriTest->id;
                    $reProduct->testable_type = 'App\Cpri_test';
                    $reProduct->save();
                }else{
                    $trashedproduct  = new TrashedProduct;

                    $trashedproduct->testable_type = 'CPRI TEST';
                    $trashedProduct->testable_id = $cpriTest->id;
                    $trashedproduct->save();
                }

                   
            }
            
        }

        $cpriTest->result_id = $request->result_id;    
        $cpriTest->details = $request->details;
        $cpriTest->test_count = 1;
        $cpriTest->save();

        return redirect('admin/cpritest');    
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
