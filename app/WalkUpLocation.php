<?php

namespace WeGotIt;

use Illuminate\Database\Eloquent\Model;

class WalkUpLocation extends Model
{
    //
    public $fillable = ['location'];

    public function business(){
      return $this->belongsTo('WeGotIt\Business');
    }
}
