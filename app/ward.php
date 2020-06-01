<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class ward extends Model
{
    //
    use  HasApiTokens ;
    
    protected $fillable = [
        'name', 'state_id', 'district_id','municipality_id'
    ];
}
