<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Launched_product extends Model
{
    
    protected $fillable = [
    	'cpri_test_id'
    	// 'lab_test_id',
    	// 'cpri_test_id'
    ];

    // public function mProduct()
    // {
    // 	return $this->belongsTo('App\Manufacture_product','mProduct_id');
    // }

    // public function lab_test()
    // {
    // 	return $this->belongsTo('App\Lab_test','lab_test_id');
    // }

    public function cpri_test()
    {
    	return $this->belongsTo('App\Cpri_test','cpri_test_id');
    }
}
