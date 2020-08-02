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

Auth::routes();


Route::group(['middleware' => 'isadmin'],function(){





			Route::get('/admin',function(){
				return view('admin/index');
			});
			// Route::get('/home', 'HomeController@index');
			Route::resource('/admin/users','UserController');
			Route::resource('/admin/manufacture_product','ManufactureProductController');
			Route::resource('/admin/labtest','LabTestController');
			Route::resource('/admin/cpritest','CpriTestController');
			Route::resource('/admin/remfgproduct','ReMfgProductController');
			Route::resource('/admin/roles','RoleController');
			Route::get('/admin/launchedproduct','LaunchedProductController@index');
			Route::resource('/admin/results','ResultsController');
			Route::get('admin/trashedproduct','TrashedProductController@index');
			Route::get('admin/feedback','FeedbackController@index');

});
