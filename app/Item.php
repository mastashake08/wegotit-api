<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public $guarded = [];
    public function business(){
      return $this->belongsTo('App\Business');
    }
}
