<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class usertype extends Model
{
    //
    use  HasApiTokens ;
    
    protected $fillable = [
        'name',
    ];
}
