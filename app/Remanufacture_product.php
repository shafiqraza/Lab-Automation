<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remanufacture_product extends Model
{
    protected $fillable = ['testable_id','testable_type'];

    public function lab_test(){
    	return $this->belongsTo('App\Lab_test','testable_id','id');
    }
    public function cpri_test(){
    	return $this->belongsTo('App\Cpri_test','testable_id','id');
    }

    public function result()
    {
    	return $this->belongsTo('App\Result','result_id');
    }
}
