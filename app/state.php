<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    public function districts()
    {
      return $this->hasMany('app\district');
    }
}
