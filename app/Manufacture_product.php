<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture_product extends Model
{

    protected $fillable = ['name','code','description'];

    public function labTest()
    {
    	return $this->hasMany('App\Lab_test');
    }

    

    public function photo()
    {
    	return $this->belongsTo('App\Photo','photo_id');
    }


}
