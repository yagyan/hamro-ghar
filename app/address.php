<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    //
    protected $fillable = [
        'state_id', 'district_id','municipality_id','ward_id',
    ];
}
