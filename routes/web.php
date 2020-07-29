<?php

use Illuminate\Support\Facades\Route;

use App\Manufacture_Product;
use App\Lab_test;
use App\Cpri_test;
use App\Remanufacture_product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index', 'HomeController@index');
Route::post('/index', 'HomeController@store');

Route::get('/product',function(){
	

	// $product = Manufacture_product::find(1);

	// return $product->labTest->name;
	

	//return null
	// $product = Manufacture_Product::find(1);
	// dd($product->test);

	// $test = Lab_test::find(1);
	// return $test->product->name;

	// $test = Cpri_test::find(1);
	// return $test->Lab_test->product;

	// $rePro = Remanufacture_product::all();


	// return $rePro->lab_test->details;
	
		// foreach ($rePro as 	$product) {
		// if ($rePro->testable_type == 'App\Lab_test') {
		// // 	dd($rePro->lab_test->product);
		// }else
		// {
		// // 	dd($rePro->cpri_test->lab_test->product);
		// }

		// 	return $rePro;
		// }
	


	// return Cpri_test::find(1)->lab_test;

	// return Lab_test::find(1)->cpriTest;

	// $test = Lab_test::where(['product_id'=>5,'result'=>true])->get();

	// if ($test->count() <= 0) {
	// 	return $test;
	// }else{
	// 	return 'No DATA FOUND';
	// }

	// $cpriTest = Cpri_test::find(1);

	// $alreadyTestTaken = Cpri_test::where(['lab_test_id' => $cpriTest->lab_test->id,'result_id' => 2]);

	// if ($alreadyTestTaken->count() <= 0) {
	// 	return 'NO DATA FOUND';
	// }else{
	// 	$alreadyTestTaken;
	// }

	$testCount = Lab_test::where('test_count',2);
	if ($testCount->count() <= 0) {
		return "NO DATA FOUND";
	}else{
		 dd($testCount);
	}

});

// Route::group(['middleware' => 'auth'],function(){

// });

Route::get('/admin',function(){
	return view('admin/index');
});
Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::resource('/admin/manufacture_product','ManufactureProductController');
Route::resource('/admin/labtest','LabTestController');
Route::resource('/admin/cpritest','CpriTestController');
Route::resource('/admin/remfgproduct','ReMfgProductController');
Route::get('/admin/launchedproduct','LaunchedProductController@index');
Route::resource('/admin/results','ResultsController');
Route::get('admin/trashedproduct','TrashedProductController@index');