<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipality extends Model
{
    //
    protected $fillable = [
        'name', 'state_id', 'district_id',
    ];
}
