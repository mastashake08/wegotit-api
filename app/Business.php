<?php

namespace WeGotIt;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    public $fillable = ['name','city','state','zip','country'];

    public function items(){
      return $this->hasMany('WeGotIt\Item');
    }

    public function orders(){
      return $this->hasMany('WeGotIt\Order');
    }

    public function locations(){
      return $this->hasMany('WeGotIt\WalkUpLocation');
    }

    public function business(){
      return $this->belongsTo('WeGotIt\User');
    }
}
