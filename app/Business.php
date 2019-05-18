<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    public $fillable = ['name','city','state','zip','country'];

    public function items(){
      return $this->hasMany('App\Item');
    }
}
