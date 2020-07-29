<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrashedProduct extends Model
{
    public function lab_test(){
    	return $this->belongsTo('App\Lab_test','testable_id');
    }

    public function cpri_test(){
    	return $this->belongsTo('App\Lab_test','testable_id');
    }

    public function remanufacture(){
    	return $this->belongsTo('App\Lab_test','testable_id');
    }
}
