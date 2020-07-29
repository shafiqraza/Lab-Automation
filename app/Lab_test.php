<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab_test extends Model
{
    protected $fillable = ['name','product_id','result','details'];

    public function product(){
    	return $this->belongsTo('App\Manufacture_product','product_id','id');
    } 

    public function cpriTest(){
    	return $this->hasMany('App\Cpri_test');
    }

    public function result()
    {
    	return $this->belongsTo('App\Result','result_id');
    }
}
