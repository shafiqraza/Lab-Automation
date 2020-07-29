<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpri_test extends Model
{
    protected $fillable = ['name','lab_test_id','result','details'];

    public function lab_test(){
    	return $this->belongsTo('App\Lab_test','lab_test_id');
    } 

    public function result()
    {
    	return $this->belongsTo('App\Result','result_id');
    }
}
