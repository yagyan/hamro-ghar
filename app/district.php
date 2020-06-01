<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class district extends Model
{
  use  HasApiTokens ;

    //
    protected $fillable = [
        'name', 'state_id',
    ];
    public function company()
    {
      return $this->belongsTo('app\state');
    }
  
}
