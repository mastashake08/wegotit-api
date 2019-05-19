<?php

namespace WeGotIt;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user(){
      return $this->belongsTo('WeGotIt\User');
    }

    public function business(){
      return $this->belongsTo('WeGotIt\Business');
    }
}
