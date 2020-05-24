<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    //
    protected $fillable = [
        'name', 'state_id',
    ];
    public function company()
    {
      return $this->belongsTo('app\state');
    }
  
}
