<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
      'firstname',
      'lastname',
      'subject',
      'email',
      'msg'
    ];
}
