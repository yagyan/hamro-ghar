<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ward extends Model
{
    //
    protected $fillable = [
        'name', 'state_id', 'district_id','municipality_id'
    ];
}
