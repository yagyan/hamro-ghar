<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class state extends Model
{
    //

    use  HasApiTokens ;
    
    protected $fillable = [
        'name',
    ];
    public function districts()
    {
      return $this->hasMany('app\district');
    }
}
