<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class municipality extends Model
{
    //
    use  HasApiTokens ;
    protected $fillable = [
        'name', 'state_id', 'district_id',
    ];
}
